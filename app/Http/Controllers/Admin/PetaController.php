<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peta;
use Illuminate\Support\Facades\Storage;

class PetaController extends Controller
{
    public function index()
    {
        try {
            $peta = Peta::orderBy('created_at', 'desc')->paginate(10);

            // Stats
            $totalPeta = Peta::count();
            $petaAktif = Peta::where('aktif', true)->count();

            return view('admin.peta.index', compact('peta', 'totalPeta', 'petaAktif'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data peta');
        }
    }

    public function create()
    {
        try {
            return view('admin.peta.create');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat form');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string|max:1000',
                'alamat' => 'required|string|max:255',
                'koordinat_lat' => 'required|string|max:50',
                'koordinat_lng' => 'required|string|max:50',
                'zoom_level' => 'required|string|max:10',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'informasi_tambahan' => 'nullable|string|max:1000',
                'aktif' => 'boolean'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');

            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('assets/img/peta'), $gambarName);
                $data['gambar'] = 'assets/img/peta/' . $gambarName;
            }

            Peta::create($data);

            return redirect()->route('admin.peta.index')
                ->with('success', 'Data peta berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data peta');
        }
    }

    public function show(Peta $peta)
    {
        try {
            return view('admin.peta.show', compact('peta'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat detail peta');
        }
    }

    public function edit(Peta $peta)
    {
        try {
            return view('admin.peta.edit', compact('peta'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat form edit');
        }
    }

    public function update(Request $request, Peta $peta)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string|max:1000',
                'alamat' => 'required|string|max:255',
                'koordinat_lat' => 'required|string|max:50',
                'koordinat_lng' => 'required|string|max:50',
                'zoom_level' => 'required|string|max:10',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'informasi_tambahan' => 'nullable|string|max:1000',
                'aktif' => 'boolean'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');

            if ($request->hasFile('gambar')) {
                // Delete old image
                if ($peta->gambar && file_exists(public_path($peta->gambar))) {
                    unlink(public_path($peta->gambar));
                }

                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('assets/img/peta'), $gambarName);
                $data['gambar'] = 'assets/img/peta/' . $gambarName;
            }

            $peta->update($data);

            return redirect()->route('admin.peta.index')
                ->with('success', 'Data peta berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui data peta');
        }
    }

    public function destroy(Peta $peta)
    {
        try {
            if ($peta->gambar && file_exists(public_path($peta->gambar))) {
                unlink(public_path($peta->gambar));
            }

            $peta->delete();

            return redirect()->route('admin.peta.index')
                ->with('success', 'Data peta berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data peta');
        }
    }

    public function toggleStatus(Peta $peta)
    {
        try {
            $peta->update(['aktif' => !$peta->aktif]);

            return response()->json([
                'success' => true,
                'message' => 'Status peta berhasil diubah',
                'aktif' => $peta->aktif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status'
            ], 500);
        }
    }
}

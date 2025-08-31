<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilDesa;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        try {
            $profil = ProfilDesa::orderBy('urutan', 'asc')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            // Stats
            $totalProfil = ProfilDesa::count();
            $profilAktif = ProfilDesa::where('aktif', true)->count();
            $jenisProfil = ProfilDesa::distinct('jenis')->count('jenis');

            return view('admin.profil.index', compact('profil', 'totalProfil', 'profilAktif', 'jenisProfil'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data profil desa');
        }
    }

    public function create()
    {
        try {
            return view('admin.profil.create');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat form');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'jenis' => 'required|string|max:255',
                'judul' => 'required|string|max:255',
                'konten' => 'required|string|max:5000',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'urutan' => 'nullable|integer|min:0',
                'aktif' => 'boolean'
            ]);

            $data = $request->all();
            $data['urutan'] = $request->urutan ?? 0;
            $data['aktif'] = $request->has('aktif');

            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('assets/img/profil'), $gambarName);
                $path = 'assets/img/profil/' . $gambarName;
                $data['gambar'] = $path;
            }

            ProfilDesa::create($data);

            return redirect()->route('admin.profil.index')
                ->with('success', 'Profil desa berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan profil desa');
        }
    }

    public function show(ProfilDesa $profil)
    {
        try {
            return view('admin.profil.show', compact('profil'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat detail profil desa');
        }
    }

    public function edit(ProfilDesa $profil)
    {
        try {
            return view('admin.profil.edit', compact('profil'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat form edit');
        }
    }

    public function update(Request $request, ProfilDesa $profil)
    {
        try {
            $request->validate([
                'jenis' => 'required|string|max:255',
                'judul' => 'required|string|max:255',
                'konten' => 'required|string|max:5000',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'urutan' => 'nullable|integer|min:0',
                'aktif' => 'boolean'
            ]);

            $data = $request->all();
            $data['urutan'] = $request->urutan ?? 0;
            $data['aktif'] = $request->has('aktif');

            if ($request->hasFile('gambar')) {
                // Delete old image
                if ($profil->gambar && file_exists(public_path($profil->gambar))) {
                    unlink(public_path($profil->gambar));
                }

                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('assets/img/profil'), $gambarName);
                $path = 'assets/img/profil/' . $gambarName;
                $data['gambar'] = $path;
            }

            $profil->update($data);

            return redirect()->route('admin.profil.index')
                ->with('success', 'Profil desa berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui profil desa');
        }
    }

    public function destroy(ProfilDesa $profil)
    {
        try {
            if ($profil->gambar && file_exists(public_path($profil->gambar))) {
                unlink(public_path($profil->gambar));
            }

            $profil->delete();

            return redirect()->route('admin.profil.index')
                ->with('success', 'Profil desa berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus profil desa');
        }
    }

    public function toggleStatus(ProfilDesa $profil)
    {
        try {
            $profil->update(['aktif' => !$profil->aktif]);

            return response()->json([
                'success' => true,
                'message' => 'Status profil desa berhasil diubah',
                'aktif' => $profil->aktif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status'
            ], 500);
        }
    }
}

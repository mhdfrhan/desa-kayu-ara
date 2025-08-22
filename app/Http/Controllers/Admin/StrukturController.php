<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StrukturController extends Controller
{
    public function index()
    {
        try {
            $struktur = StrukturOrganisasi::orderBy('urutan', 'asc')->paginate(10);
            return view('admin.struktur.index', compact('struktur'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data struktur organisasi');
        }
    }

    public function create()
    {
        try {
            return view('admin.struktur.create');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman tambah struktur organisasi');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'periode' => 'required|string|max:255',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'deskripsi_tugas' => 'required|string|max:1000',
                'warna_badge' => 'required|string|max:50',
                'urutan' => 'nullable|integer|min:1',
                'aktif' => 'boolean'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['urutan'] = $request->urutan ?? 0;

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $imageName = time() . '_' . Str::random(10) . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('assets/img/struktur'), $imageName);
                $data['foto'] = 'assets/img/struktur/' . $imageName;
            }

            StrukturOrganisasi::create($data);

            return redirect()->route('admin.struktur.index')
                ->with('success', 'Struktur organisasi berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan struktur organisasi');
        }
    }

    public function show(StrukturOrganisasi $struktur)
    {
        try {
            return view('admin.struktur.show', compact('struktur'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat detail struktur organisasi');
        }
    }

    public function edit(StrukturOrganisasi $struktur)
    {
        try {
            return view('admin.struktur.edit', compact('struktur'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman edit struktur organisasi');
        }
    }

    public function update(Request $request, StrukturOrganisasi $struktur)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'periode' => 'required|string|max:255',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'deskripsi_tugas' => 'required|string|max:1000',
                'warna_badge' => 'required|string|max:50',
                'urutan' => 'nullable|integer|min:1',
                'aktif' => 'boolean'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['urutan'] = $request->urutan ?? 0;

            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($struktur->foto && file_exists(public_path($struktur->foto))) {
                    unlink(public_path($struktur->foto));
                }

                $foto = $request->file('foto');
                $imageName = time() . '_' . Str::random(10) . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('assets/img/struktur'), $imageName);
                $data['foto'] = 'assets/img/struktur/' . $imageName;
            }

            $struktur->update($data);

            return redirect()->route('admin.struktur.index')
                ->with('success', 'Struktur organisasi berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui struktur organisasi');
        }
    }

    public function destroy(StrukturOrganisasi $struktur)
    {
        try {
            // Hapus foto jika ada
            if ($struktur->foto && file_exists(public_path($struktur->foto))) {
                unlink(public_path($struktur->foto));
            }

            $struktur->delete();

            return redirect()->route('admin.struktur.index')
                ->with('success', 'Struktur organisasi berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus struktur organisasi');
        }
    }

    public function toggleStatus(StrukturOrganisasi $struktur)
    {
        try {
            $struktur->update(['aktif' => !$struktur->aktif]);

            return response()->json([
                'success' => true,
                'message' => 'Status struktur organisasi berhasil diubah',
                'aktif' => $struktur->aktif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status struktur organisasi'
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriGaleri;
use Illuminate\Support\Str;

class KategoriGaleriController extends Controller
{
    public function index()
    {
        try {
            $kategoriGaleri = KategoriGaleri::withCount('galeri')->orderBy('urutan', 'asc')->paginate(10);
            return view('admin.kategori-galeri.index', compact('kategoriGaleri'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data kategori galeri');
        }
    }

    public function create()
    {
        try {
            return view('admin.kategori-galeri.create');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman tambah kategori galeri');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:kategori_galeri',
                'deskripsi' => 'nullable|string|max:1000',
                'warna' => 'required|string|max:7',
                'icon' => 'nullable|string|max:255',
                'urutan' => 'nullable|integer|min:0',
                'aktif' => 'boolean'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['slug'] = $request->slug ?: Str::slug($request->nama);

            KategoriGaleri::create($data);

            return redirect()->route('admin.kategori-galeri.index')
                ->with('success', 'Kategori galeri berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan kategori galeri');
        }
    }

    public function show(KategoriGaleri $kategoriGaleri)
    {
        try {
            return view('admin.kategori-galeri.show', compact('kategoriGaleri'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat detail kategori galeri');
        }
    }

    public function edit(KategoriGaleri $kategoriGaleri)
    {
        try {
            return view('admin.kategori-galeri.edit', compact('kategoriGaleri'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman edit kategori galeri');
        }
    }

    public function update(Request $request, KategoriGaleri $kategoriGaleri)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:kategori_galeri,slug,' . $kategoriGaleri->id,
                'deskripsi' => 'nullable|string|max:1000',
                'warna' => 'required|string|max:7',
                'icon' => 'nullable|string|max:255',
                'urutan' => 'nullable|integer|min:0',
                'aktif' => 'boolean'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['slug'] = $request->slug ?: Str::slug($request->nama);

            $kategoriGaleri->update($data);

            return redirect()->route('admin.kategori-galeri.index')
                ->with('success', 'Kategori galeri berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui kategori galeri');
        }
    }

    public function destroy(KategoriGaleri $kategoriGaleri)
    {
        try {
            // Cek apakah ada galeri yang menggunakan kategori ini
            if ($kategoriGaleri->galeri()->count() > 0) {
                return redirect()->route('admin.kategori-galeri.index')
                    ->with('error', 'Tidak dapat menghapus kategori yang masih memiliki galeri');
            }

            $kategoriGaleri->delete();

            return redirect()->route('admin.kategori-galeri.index')
                ->with('success', 'Kategori galeri berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus kategori galeri');
        }
    }

    public function toggleStatus(KategoriGaleri $kategoriGaleri)
    {
        try {
            $kategoriGaleri->update(['aktif' => !$kategoriGaleri->aktif]);

            return response()->json([
                'success' => true,
                'message' => 'Status kategori galeri berhasil diubah',
                'aktif' => $kategoriGaleri->aktif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status kategori galeri'
            ], 500);
        }
    }
}

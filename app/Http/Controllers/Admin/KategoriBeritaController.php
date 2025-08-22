<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use Illuminate\Support\Str;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        try {
            $kategoriBerita = KategoriBerita::withCount('berita')->orderBy('urutan', 'asc')->paginate(10);
            return view('admin.kategori-berita.index', compact('kategoriBerita'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data kategori berita');
        }
    }

    public function create()
    {
        try {
            return view('admin.kategori-berita.create');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman tambah kategori');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:kategori_berita',
                'deskripsi' => 'nullable|string|max:1000',
                'warna' => 'required|string|max:7',
                'icon' => 'nullable|string|max:255',
                'urutan' => 'nullable|integer|min:0',
                'aktif' => 'boolean'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['slug'] = $request->slug ?: Str::slug($request->nama);

            KategoriBerita::create($data);

            return redirect()->route('admin.kategori-berita.index')
                ->with('success', 'Kategori berita berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan kategori berita');
        }
    }

    public function show(KategoriBerita $kategoriBerita)
    {
        try {
            return view('admin.kategori-berita.show', compact('kategoriBerita'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat detail kategori');
        }
    }

    public function edit(KategoriBerita $kategoriBerita)
    {
        try {
            return view('admin.kategori-berita.edit', compact('kategoriBerita'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman edit kategori');
        }
    }

    public function update(Request $request, KategoriBerita $kategoriBerita)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:kategori_berita,slug,' . $kategoriBerita->id,
                'deskripsi' => 'nullable|string|max:1000',
                'warna' => 'required|string|max:7',
                'icon' => 'nullable|string|max:255',
                'urutan' => 'nullable|integer|min:0',
                'aktif' => 'boolean'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['slug'] = $request->slug ?: Str::slug($request->nama);

            $kategoriBerita->update($data);

            return redirect()->route('admin.kategori-berita.index')
                ->with('success', 'Kategori berita berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui kategori berita');
        }
    }

    public function destroy(KategoriBerita $kategoriBerita)
    {
        try {
            // Cek apakah ada berita yang menggunakan kategori ini
            if ($kategoriBerita->berita()->count() > 0) {
                return redirect()->route('admin.kategori-berita.index')
                    ->with('error', 'Tidak dapat menghapus kategori yang masih memiliki berita');
            }

            $kategoriBerita->delete();

            return redirect()->route('admin.kategori-berita.index')
                ->with('success', 'Kategori berita berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus kategori berita');
        }
    }

    public function toggleStatus(KategoriBerita $kategoriBerita)
    {
        try {
            $kategoriBerita->update(['aktif' => !$kategoriBerita->aktif]);

            return response()->json([
                'success' => true,
                'message' => 'Status kategori berita berhasil diubah',
                'aktif' => $kategoriBerita->aktif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status kategori berita'
            ], 500);
        }
    }
}

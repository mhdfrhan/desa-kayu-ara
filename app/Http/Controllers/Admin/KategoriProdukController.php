<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use Illuminate\Support\Str;

class KategoriProdukController extends Controller
{
    public function index()
    {
        try {
            $kategoriProduk = KategoriProduk::withCount('produk')->orderBy('urutan', 'asc')->paginate(10);
            return view('admin.kategori-produk.index', compact('kategoriProduk'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data kategori produk');
        }
    }

    public function create()
    {
        try {
            return view('admin.kategori-produk.create');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman tambah kategori');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:kategori_produk',
                'deskripsi' => 'nullable|string|max:1000',
                'warna' => 'required|string|max:7',
                'icon' => 'nullable|string|max:255',
                'urutan' => 'nullable|integer|min:0',
                'aktif' => 'boolean'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['slug'] = $request->slug ?: Str::slug($request->nama);

            KategoriProduk::create($data);

            return redirect()->route('admin.kategori-produk.index')
                ->with('success', 'Kategori produk berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan kategori produk');
        }
    }

    public function show(KategoriProduk $kategoriProduk)
    {
        try {
            return view('admin.kategori-produk.show', compact('kategoriProduk'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat detail kategori');
        }
    }

    public function edit(KategoriProduk $kategoriProduk)
    {
        try {
            return view('admin.kategori-produk.edit', compact('kategoriProduk'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman edit kategori');
        }
    }

    public function update(Request $request, KategoriProduk $kategoriProduk)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:kategori_produk,slug,' . $kategoriProduk->id,
                'deskripsi' => 'nullable|string|max:1000',
                'warna' => 'required|string|max:7',
                'icon' => 'nullable|string|max:255',
                'urutan' => 'nullable|integer|min:0',
                'aktif' => 'boolean'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['slug'] = $request->slug ?: Str::slug($request->nama);

            $kategoriProduk->update($data);

            return redirect()->route('admin.kategori-produk.index')
                ->with('success', 'Kategori produk berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui kategori produk');
        }
    }

    public function destroy(KategoriProduk $kategoriProduk)
    {
        try {
            // Cek apakah ada produk yang menggunakan kategori ini
            if ($kategoriProduk->produk()->count() > 0) {
                return redirect()->route('admin.kategori-produk.index')
                    ->with('error', 'Tidak dapat menghapus kategori yang masih memiliki produk');
            }

            $kategoriProduk->delete();

            return redirect()->route('admin.kategori-produk.index')
                ->with('success', 'Kategori produk berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus kategori produk');
        }
    }

    public function toggleStatus(KategoriProduk $kategoriProduk)
    {
        try {
            $kategoriProduk->update(['aktif' => !$kategoriProduk->aktif]);

            return response()->json([
                'success' => true,
                'message' => 'Status kategori produk berhasil diubah',
                'aktif' => $kategoriProduk->aktif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status kategori produk'
            ], 500);
        }
    }
}

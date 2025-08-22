<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProdukDesa;
use App\Models\KategoriProduk;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index()
    {
        try {
            $produk = ProdukDesa::with('kategori')->latest()->paginate(10);
            $kategoriProduk = KategoriProduk::aktif()->get();
            return view('admin.produk.index', compact('produk', 'kategoriProduk'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data produk');
        }
    }

    public function create()
    {
        try {
            $kategoriProduk = KategoriProduk::aktif()->get();
            return view('admin.produk.create', compact('kategoriProduk'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman tambah produk');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:produk_desa',
                'deskripsi' => 'required|string|max:2000',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'kategori_id' => 'nullable|exists:kategori_produk,id',
                'harga' => 'required|numeric|min:0',
                'satuan' => 'required|string|max:50',
                'harga_diskon' => 'nullable|numeric|min:0',
                'persentase_diskon' => 'nullable|integer|min:0|max:100',
                'nomor_wa' => 'required|string|max:20',
                'pesan_wa' => 'required|string|max:500',
                'rating' => 'nullable|numeric|min:0|max:5',
                'terjual' => 'nullable|integer|min:0',
                'featured' => 'boolean',
                'best_seller' => 'boolean',
                'aktif' => 'boolean',
                'urutan' => 'nullable|integer|min:0'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['featured'] = $request->has('featured');
            $data['best_seller'] = $request->has('best_seller');
            $data['slug'] = $request->slug ?: Str::slug($request->nama);

            // Handle image upload
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $imageName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('assets/img/produk'), $imageName);
                $data['gambar'] = $imageName;
            }

            ProdukDesa::create($data);

            return redirect()->route('admin.produk.index')
                ->with('success', 'Produk berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan produk');
        }
    }

    public function show(ProdukDesa $produk)
    {
        try {
            return view('admin.produk.show', compact('produk'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat detail produk');
        }
    }

    public function edit(ProdukDesa $produk)
    {
        try {
            $kategoriProduk = KategoriProduk::aktif()->get();
            return view('admin.produk.edit', compact('produk', 'kategoriProduk'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman edit produk');
        }
    }

    public function update(Request $request, ProdukDesa $produk)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:produk_desa,slug,' . $produk->id,
                'deskripsi' => 'required|string|max:2000',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'kategori_id' => 'nullable|exists:kategori_produk,id',
                'harga' => 'required|numeric|min:0',
                'satuan' => 'required|string|max:50',
                'harga_diskon' => 'nullable|numeric|min:0',
                'persentase_diskon' => 'nullable|integer|min:0|max:100',
                'nomor_wa' => 'required|string|max:20',
                'pesan_wa' => 'required|string|max:500',
                'rating' => 'nullable|numeric|min:0|max:5',
                'terjual' => 'nullable|integer|min:0',
                'featured' => 'boolean',
                'best_seller' => 'boolean',
                'aktif' => 'boolean',
                'urutan' => 'nullable|integer|min:0'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['featured'] = $request->has('featured');
            $data['best_seller'] = $request->has('best_seller');
            $data['slug'] = $request->slug ?: Str::slug($request->nama);

            // Handle image upload
            if ($request->hasFile('gambar')) {
                // Delete old image
                if ($produk->gambar && file_exists(public_path('assets/img/produk/' . $produk->gambar))) {
                    unlink(public_path('assets/img/produk/' . $produk->gambar));
                }

                $gambar = $request->file('gambar');
                $imageName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('assets/img/produk'), $imageName);
                $data['gambar'] = $imageName;
            }

            $produk->update($data);

            return redirect()->route('admin.produk.index')
                ->with('success', 'Produk berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui produk');
        }
    }

    public function destroy(ProdukDesa $produk)
    {
        try {
            // Delete image
            if ($produk->gambar && file_exists(public_path('assets/img/produk/' . $produk->gambar))) {
                unlink(public_path('assets/img/produk/' . $produk->gambar));
            }

            $produk->delete();

            return redirect()->route('admin.produk.index')
                ->with('success', 'Produk berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus produk');
        }
    }

    public function toggleStatus(ProdukDesa $produk)
    {
        try {
            $produk->update(['aktif' => !$produk->aktif]);

            return response()->json([
                'success' => true,
                'message' => 'Status produk berhasil diubah',
                'aktif' => $produk->aktif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status produk'
            ], 500);
        }
    }

    public function toggleFeatured(ProdukDesa $produk)
    {
        try {
            $produk->update(['featured' => !$produk->featured]);

            return response()->json([
                'success' => true,
                'message' => 'Status featured produk berhasil diubah',
                'featured' => $produk->featured
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status featured produk'
            ], 500);
        }
    }

    public function toggleBestSeller(ProdukDesa $produk)
    {
        try {
            $produk->update(['best_seller' => !$produk->best_seller]);

            return response()->json([
                'success' => true,
                'message' => 'Status best seller produk berhasil diubah',
                'best_seller' => $produk->best_seller
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status best seller produk'
            ], 500);
        }
    }
}

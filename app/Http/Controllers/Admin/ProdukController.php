<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProdukDesa;
use App\Models\KategoriProduk;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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
            // Validasi input
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
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
            ], [
                'nama.required' => 'Nama produk wajib diisi',
                'nama.max' => 'Nama produk maksimal 255 karakter',
                'slug.unique' => 'Slug produk sudah digunakan',
                'slug.max' => 'Slug produk maksimal 255 karakter',
                'deskripsi.required' => 'Deskripsi produk wajib diisi',
                'deskripsi.max' => 'Deskripsi produk maksimal 2000 karakter',
                'gambar.required' => 'Gambar produk wajib diupload',
                'gambar.image' => 'File yang diupload harus berupa gambar',
                'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau webp',
                'gambar.max' => 'Ukuran gambar maksimal 2MB (2048 KB)',
                'kategori_id.exists' => 'Kategori produk tidak valid',
                'harga.required' => 'Harga produk wajib diisi',
                'harga.numeric' => 'Harga produk harus berupa angka',
                'harga.min' => 'Harga produk minimal 0',
                'satuan.required' => 'Satuan produk wajib diisi',
                'satuan.max' => 'Satuan produk maksimal 50 karakter',
                'harga_diskon.numeric' => 'Harga diskon harus berupa angka',
                'harga_diskon.min' => 'Harga diskon minimal 0',
                'persentase_diskon.integer' => 'Persentase diskon harus berupa angka bulat',
                'persentase_diskon.min' => 'Persentase diskon minimal 0',
                'persentase_diskon.max' => 'Persentase diskon maksimal 100',
                'nomor_wa.required' => 'Nomor WhatsApp wajib diisi',
                'nomor_wa.max' => 'Nomor WhatsApp maksimal 20 karakter',
                'pesan_wa.required' => 'Pesan WhatsApp wajib diisi',
                'pesan_wa.max' => 'Pesan WhatsApp maksimal 500 karakter',
                'rating.numeric' => 'Rating harus berupa angka',
                'rating.min' => 'Rating minimal 0',
                'rating.max' => 'Rating maksimal 5',
                'terjual.integer' => 'Jumlah terjual harus berupa angka bulat',
                'terjual.min' => 'Jumlah terjual minimal 0',
                'urutan.integer' => 'Urutan harus berupa angka bulat',
                'urutan.min' => 'Urutan minimal 0'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Mohon perbaiki kesalahan berikut:');
            }

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['featured'] = $request->has('featured');
            $data['best_seller'] = $request->has('best_seller');
            $data['slug'] = Str::slug($request->nama);

            // Handle image upload
            if ($request->hasFile('gambar')) {
                try {
                    $gambar = $request->file('gambar');

                    // Cek ukuran file
                    if ($gambar->getSize() > 2048 * 1024) { // 2MB dalam bytes
                        return redirect()->back()
                            ->withInput()
                            ->with('error', 'Ukuran gambar terlalu besar. Maksimal 2MB.');
                    }

                    // Cek ekstensi file
                    $allowedExtensions = ['jpeg', 'png', 'jpg', 'gif', 'webp'];
                    $fileExtension = strtolower($gambar->getClientOriginalExtension());
                    if (!in_array($fileExtension, $allowedExtensions)) {
                        return redirect()->back()
                            ->withInput()
                            ->with('error', 'Format gambar tidak didukung. Gunakan: ' . implode(', ', $allowedExtensions));
                    }

                    $imageName = time() . '_' . Str::random(10) . '.' . $fileExtension;
                    $uploadPath = public_path('assets/img/produk');

                    // Cek apakah direktori ada, jika tidak buat
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0755, true);
                    }

                    $gambar->move($uploadPath, $imageName);
                    $path = 'assets/img/produk/' . $imageName;
                    $data['gambar'] = $path;
                } catch (\Exception $e) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Gagal mengupload gambar: ' . $e->getMessage());
                }
            }

            ProdukDesa::create($data);

            return redirect()->route('admin.produk.index')
                ->with('success', 'Produk berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Validasi gagal: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error creating produk: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
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
            // Validasi input
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
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
            ], [
                'nama.required' => 'Nama produk wajib diisi',
                'nama.max' => 'Nama produk maksimal 255 karakter',
                'slug.unique' => 'Slug produk sudah digunakan',
                'slug.max' => 'Slug produk maksimal 255 karakter',
                'deskripsi.required' => 'Deskripsi produk wajib diisi',
                'deskripsi.max' => 'Deskripsi produk maksimal 2000 karakter',
                'gambar.image' => 'File yang diupload harus berupa gambar',
                'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau webp',
                'gambar.max' => 'Ukuran gambar maksimal 2MB (2048 KB)',
                'kategori_id.exists' => 'Kategori produk tidak valid',
                'harga.required' => 'Harga produk wajib diisi',
                'harga.numeric' => 'Harga produk harus berupa angka',
                'harga.min' => 'Harga produk minimal 0',
                'satuan.required' => 'Satuan produk wajib diisi',
                'satuan.max' => 'Satuan produk maksimal 50 karakter',
                'harga_diskon.numeric' => 'Harga diskon harus berupa angka',
                'harga_diskon.min' => 'Harga diskon minimal 0',
                'persentase_diskon.integer' => 'Persentase diskon harus berupa angka bulat',
                'persentase_diskon.min' => 'Persentase diskon minimal 0',
                'persentase_diskon.max' => 'Persentase diskon maksimal 100',
                'nomor_wa.required' => 'Nomor WhatsApp wajib diisi',
                'nomor_wa.max' => 'Nomor WhatsApp maksimal 20 karakter',
                'pesan_wa.required' => 'Pesan WhatsApp wajib diisi',
                'pesan_wa.max' => 'Pesan WhatsApp maksimal 500 karakter',
                'rating.numeric' => 'Rating harus berupa angka',
                'rating.min' => 'Rating minimal 0',
                'rating.max' => 'Rating maksimal 5',
                'terjual.integer' => 'Jumlah terjual harus berupa angka bulat',
                'terjual.min' => 'Jumlah terjual minimal 0',
                'urutan.integer' => 'Urutan harus berupa angka bulat',
                'urutan.min' => 'Urutan minimal 0'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Mohon perbaiki kesalahan berikut:');
            }

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['featured'] = $request->has('featured');
            $data['best_seller'] = $request->has('best_seller');
            $data['slug'] = Str::slug($request->nama);

            // Handle image upload
            if ($request->hasFile('gambar')) {
                try {
                    $gambar = $request->file('gambar');

                    // Cek ukuran file
                    if ($gambar->getSize() > 2048 * 1024) { // 2MB dalam bytes
                        return redirect()->back()
                            ->withInput()
                            ->with('error', 'Ukuran gambar terlalu besar. Maksimal 2MB.');
                    }

                    // Cek ekstensi file
                    $allowedExtensions = ['jpeg', 'png', 'jpg', 'gif', 'webp'];
                    $fileExtension = strtolower($gambar->getClientOriginalExtension());
                    if (!in_array($fileExtension, $allowedExtensions)) {
                        return redirect()->back()
                            ->withInput()
                            ->with('error', 'Format gambar tidak didukung. Gunakan: ' . implode(', ', $allowedExtensions));
                    }

                    // Delete old image
                    if ($produk->gambar && file_exists(public_path($produk->gambar))) {
                        unlink(public_path($produk->gambar));
                    }

                    $imageName = time() . '_' . Str::random(10) . '.' . $fileExtension;
                    $uploadPath = public_path('assets/img/produk');

                    // Cek apakah direktori ada, jika tidak buat
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0755, true);
                    }

                    $gambar->move($uploadPath, $imageName);
                    $path = 'assets/img/produk/' . $imageName;
                    $data['gambar'] = $path;
                } catch (\Exception $e) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Gagal mengupload gambar: ' . $e->getMessage());
                }
            }

            $produk->update($data);

            return redirect()->route('admin.produk.index')
                ->with('success', 'Produk berhasil diperbarui');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Validasi gagal: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error updating produk: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    public function destroy(ProdukDesa $produk)
    {
        try {
            // Delete image
            if ($produk->gambar && file_exists(public_path($produk->gambar))) {
                try {
                    unlink(public_path($produk->gambar));
                } catch (\Exception $e) {
                    Log::warning('Gagal menghapus file gambar produk: ' . $e->getMessage());
                    // Lanjutkan proses meskipun gagal menghapus file
                }
            }

            $produk->delete();

            return redirect()->route('admin.produk.index')
                ->with('success', 'Produk berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Error deleting produk: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan sistem saat menghapus produk: ' . $e->getMessage());
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

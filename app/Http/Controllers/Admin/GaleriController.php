<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\KategoriGaleri;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class GaleriController extends Controller
{
    public function index()
    {
        try {
            $galeri = Galeri::with('kategori')->latest()->paginate(10);
            $kategoriGaleri = KategoriGaleri::aktif()->get();
            return view('admin.galeri.index', compact('galeri', 'kategoriGaleri'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data galeri');
        }
    }

    public function create()
    {
        try {
            $kategoriGaleri = KategoriGaleri::aktif()->get();
            return view('admin.galeri.create', compact('kategoriGaleri'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman tambah galeri');
        }
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string|max:2000',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'kategori_id' => 'nullable|exists:kategori_galeri,id',
                'featured' => 'boolean',
                'aktif' => 'boolean',
                'urutan' => 'nullable|integer|min:0'
            ], [
                'judul.required' => 'Judul galeri wajib diisi',
                'judul.max' => 'Judul galeri maksimal 255 karakter',
                'deskripsi.required' => 'Deskripsi galeri wajib diisi',
                'deskripsi.max' => 'Deskripsi galeri maksimal 2000 karakter',
                'gambar.required' => 'Gambar galeri wajib diupload',
                'gambar.image' => 'File yang diupload harus berupa gambar',
                'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau webp',
                'gambar.max' => 'Ukuran gambar maksimal 2MB (2048 KB)',
                'kategori_id.exists' => 'Kategori galeri tidak valid',
                'urutan.integer' => 'Urutan harus berupa angka',
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
            $data['slug'] = Str::slug($request->judul);

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
                    $uploadPath = public_path('assets/img/galeri');

                    // Cek apakah direktori ada, jika tidak buat
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0755, true);
                    }

                    $gambar->move($uploadPath, $imageName);
                    $path = 'assets/img/galeri/' . $imageName;
                    $data['gambar'] = $path;
                } catch (\Exception $e) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Gagal mengupload gambar: ' . $e->getMessage());
                }
            }

            Galeri::create($data);

            return redirect()->route('admin.galeri.index')
                ->with('success', 'Galeri berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Validasi gagal: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error creating galeri: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    public function show(Galeri $galeri)
    {
        try {
            return view('admin.galeri.show', compact('galeri'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat detail galeri');
        }
    }

    public function edit(Galeri $galeri)
    {
        try {
            $kategoriGaleri = KategoriGaleri::aktif()->get();
            return view('admin.galeri.edit', compact('galeri', 'kategoriGaleri'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman edit galeri');
        }
    }

    public function update(Request $request, Galeri $galeri)
    {
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string|max:2000',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'kategori_id' => 'nullable|exists:kategori_galeri,id',
                'featured' => 'boolean',
                'aktif' => 'boolean',
                'urutan' => 'nullable|integer|min:0'
            ], [
                'judul.required' => 'Judul galeri wajib diisi',
                'judul.max' => 'Judul galeri maksimal 255 karakter',
                'deskripsi.required' => 'Deskripsi galeri wajib diisi',
                'deskripsi.max' => 'Deskripsi galeri maksimal 2000 karakter',
                'gambar.image' => 'File yang diupload harus berupa gambar',
                'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau webp',
                'gambar.max' => 'Ukuran gambar maksimal 2MB (2048 KB)',
                'kategori_id.exists' => 'Kategori galeri tidak valid',
                'urutan.integer' => 'Urutan harus berupa angka',
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
            $data['slug'] = Str::slug($request->judul);

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
                    if ($galeri->gambar && file_exists(public_path($galeri->gambar))) {
                        unlink(public_path($galeri->gambar));
                    }

                    $imageName = time() . '_' . Str::random(10) . '.' . $fileExtension;
                    $uploadPath = public_path('assets/img/galeri');

                    // Cek apakah direktori ada, jika tidak buat
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0755, true);
                    }

                    $gambar->move($uploadPath, $imageName);
                    $path = 'assets/img/galeri/' . $imageName;
                    $data['gambar'] = $path;
                } catch (\Exception $e) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Gagal mengupload gambar: ' . $e->getMessage());
                }
            }

            $galeri->update($data);

            return redirect()->route('admin.galeri.index')
                ->with('success', 'Galeri berhasil diperbarui');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Validasi gagal: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error updating galeri: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    public function destroy(Galeri $galeri)
    {
        try {
            // Delete image
            if ($galeri->gambar && file_exists(public_path($galeri->gambar))) {
                try {
                    unlink(public_path($galeri->gambar));
                } catch (\Exception $e) {
                    Log::warning('Gagal menghapus file gambar: ' . $e->getMessage());
                    // Lanjutkan proses meskipun gagal menghapus file
                }
            }

            $galeri->delete();

            return redirect()->route('admin.galeri.index')
                ->with('success', 'Galeri berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Error deleting galeri: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan sistem saat menghapus galeri: ' . $e->getMessage());
        }
    }

    public function toggleStatus(Galeri $galeri)
    {
        try {
            $galeri->update(['aktif' => !$galeri->aktif]);

            return response()->json([
                'success' => true,
                'message' => 'Status galeri berhasil diubah',
                'aktif' => $galeri->aktif
            ]);
        } catch (\Exception $e) {
            Log::error('Error toggling galeri status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem saat mengubah status galeri: ' . $e->getMessage()
            ], 500);
        }
    }

    public function toggleFeatured(Galeri $galeri)
    {
        try {
            $galeri->update(['featured' => !$galeri->featured]);

            return response()->json([
                'success' => true,
                'message' => 'Status featured galeri berhasil diubah',
                'featured' => $galeri->featured
            ]);
        } catch (\Exception $e) {
            Log::error('Error toggling galeri featured: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem saat mengubah status featured galeri: ' . $e->getMessage()
            ], 500);
        }
    }
}

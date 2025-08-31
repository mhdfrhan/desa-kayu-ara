<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Traits\ErrorHandler;

class BeritaController extends Controller
{
    use ErrorHandler;
    public function index()
    {
        try {
            $berita = Berita::with('kategori')->latest()->paginate(10);
            $kategoriBerita = KategoriBerita::aktif()->get();
            return view('admin.berita.index', compact('berita', 'kategoriBerita'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data berita');
        }
    }

    public function create()
    {
        try {
            $kategoriBerita = KategoriBerita::aktif()->get();
            return view('admin.berita.create', compact('kategoriBerita'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman tambah berita');
        }
    }

    public function store(Request $request)
    {
        try {
            // Validasi input dengan pesan error yang jelas
            $rules = [
                'judul' => 'required|string|max:255',
                'ringkasan' => 'required|string|max:1000',
                'konten' => 'required|string|min:1',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'kategori_id' => 'nullable|exists:kategori_berita,id',
                'featured' => 'boolean',
                'aktif' => 'boolean',
                'tanggal_publikasi' => 'nullable|date'
            ];

            $messages = array_merge($this->getCommonValidationMessages(), [
                'judul.required' => 'Judul berita wajib diisi',
                'judul.max' => 'Judul berita maksimal 255 karakter',
                'ringkasan.required' => 'Ringkasan berita wajib diisi',
                'ringkasan.max' => 'Ringkasan berita maksimal 1000 karakter',
                'konten.required' => 'Konten berita wajib diisi',
                'konten.min' => 'Konten berita minimal 1 karakter',
                'gambar.required' => 'Gambar berita wajib diupload',
                'gambar.max' => 'Ukuran gambar maksimal 2MB (2048 KB)',
                'kategori_id.exists' => 'Kategori berita tidak valid',
                'tanggal_publikasi.date' => 'Tanggal publikasi harus berupa tanggal yang valid'
            ]);

            $this->validateWithCustomMessages($request, $rules, $messages);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['featured'] = $request->has('featured');
            $data['slug'] = Str::slug($request->judul);

            // Handle image upload
            if ($request->hasFile('gambar')) {
                $fileName = $this->handleFileUpload(
                    $request->file('gambar'),
                    public_path('assets/img/berita')
                );
                $data['gambar'] = 'assets/img/berita/' . $fileName;
            }

            Berita::create($data);

            return redirect()->route('admin.berita.index')
                ->with('success', 'Berita berhasil ditambahkan');
        } catch (\Exception $e) {
            return $this->handleException($e, 'Error creating berita');
        }
    }

    public function show(Berita $berita)
    {
        try {
            return view('admin.berita.show', compact('berita'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat detail berita');
        }
    }

    public function edit(Berita $berita)
    {
        try {
            $kategoriBerita = KategoriBerita::aktif()->get();
            return view('admin.berita.edit', compact('berita', 'kategoriBerita'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman edit berita');
        }
    }

    public function update(Request $request, Berita $berita)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'ringkasan' => 'required|string|max:1000',
                'konten' => 'required|string|min:1',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'kategori_id' => 'nullable|exists:kategori_berita,id',
                'featured' => 'boolean',
                'aktif' => 'boolean',
                'tanggal_publikasi' => 'nullable|date'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['featured'] = $request->has('featured');
            $data['slug'] = Str::slug($request->judul);

            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($berita->gambar && file_exists(public_path($berita->gambar))) {
                    unlink(public_path($berita->gambar));
                }

                $gambar = $request->file('gambar');
                $imageName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('assets/img/berita'), $imageName);
                $path = 'assets/img/berita/' . $imageName;
                $data['gambar'] = $path;
            }

            $berita->update($data);

            return redirect()->route('admin.berita.index')
                ->with('success', 'Berita berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui berita');
        }
    }

    public function destroy(Berita $berita)
    {
        try {
            // Hapus gambar jika ada
            if ($berita->gambar && file_exists(public_path($berita->gambar))) {
                unlink(public_path($berita->gambar));
            }

            $berita->delete();

            return redirect()->route('admin.berita.index')
                ->with('success', 'Berita berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus berita');
        }
    }

    public function toggleStatus(Berita $berita)
    {
        try {
            $berita->update(['aktif' => !$berita->aktif]);

            return response()->json([
                'success' => true,
                'message' => 'Status berita berhasil diubah',
                'aktif' => $berita->aktif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status berita'
            ], 500);
        }
    }

    public function toggleFeatured(Berita $berita)
    {
        try {
            $berita->update(['featured' => !$berita->featured]);

            return response()->json([
                'success' => true,
                'message' => 'Status featured berita berhasil diubah',
                'featured' => $berita->featured
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status featured berita'
            ], 500);
        }
    }
}

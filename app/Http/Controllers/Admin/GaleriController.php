<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\KategoriGaleri;
use Illuminate\Support\Str;

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
            $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string|max:2000',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'kategori_id' => 'nullable|exists:kategori_galeri,id',
                'likes' => 'nullable|integer|min:0',
                'featured' => 'boolean',
                'aktif' => 'boolean',
                'urutan' => 'nullable|integer|min:0'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['featured'] = $request->has('featured');

            // Handle image upload
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $imageName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('assets/img/galeri'), $imageName);
                $data['gambar'] = $imageName;
            }

            Galeri::create($data);

            return redirect()->route('admin.galeri.index')
                ->with('success', 'Galeri berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan galeri');
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
            $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string|max:2000',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'kategori_id' => 'nullable|exists:kategori_galeri,id',
                'likes' => 'nullable|integer|min:0',
                'featured' => 'boolean',
                'aktif' => 'boolean',
                'urutan' => 'nullable|integer|min:0'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['featured'] = $request->has('featured');

            // Handle image upload
            if ($request->hasFile('gambar')) {
                // Delete old image
                if ($galeri->gambar && file_exists(public_path('assets/img/galeri/' . $galeri->gambar))) {
                    unlink(public_path('assets/img/galeri/' . $galeri->gambar));
                }

                $gambar = $request->file('gambar');
                $imageName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('assets/img/galeri'), $imageName);
                $data['gambar'] = $imageName;
            }

            $galeri->update($data);

            return redirect()->route('admin.galeri.index')
                ->with('success', 'Galeri berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui galeri');
        }
    }

    public function destroy(Galeri $galeri)
    {
        try {
            // Delete image
            if ($galeri->gambar && file_exists(public_path('assets/img/galeri/' . $galeri->gambar))) {
                unlink(public_path('assets/img/galeri/' . $galeri->gambar));
            }

            $galeri->delete();

            return redirect()->route('admin.galeri.index')
                ->with('success', 'Galeri berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus galeri');
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
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status galeri'
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
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status featured galeri'
            ], 500);
        }
    }
}

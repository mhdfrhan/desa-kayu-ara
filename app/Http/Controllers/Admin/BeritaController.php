<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
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
            $request->validate([
                'judul' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:berita',
                'ringkasan' => 'required|string|max:1000',
                'konten' => 'required|string',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'kategori_id' => 'nullable|exists:kategori_berita,id',
                'featured' => 'boolean',
                'aktif' => 'boolean',
                'tanggal_publikasi' => 'nullable|date'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['featured'] = $request->has('featured');
            $data['slug'] = $request->slug ?: Str::slug($request->judul);

            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $imageName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('assets/img/berita'), $imageName);
                $data['gambar'] = 'assets/img/berita/' . $imageName;
            }

            Berita::create($data);

            return redirect()->route('admin.berita.index')
                ->with('success', 'Berita berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan berita');
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
                'slug' => 'nullable|string|max:255|unique:berita,slug,' . $berita->id,
                'ringkasan' => 'required|string|max:1000',
                'konten' => 'required|string',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'kategori_id' => 'nullable|exists:kategori_berita,id',
                'featured' => 'boolean',
                'aktif' => 'boolean',
                'tanggal_publikasi' => 'nullable|date'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['featured'] = $request->has('featured');
            $data['slug'] = $request->slug ?: Str::slug($request->judul);

            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($berita->gambar && file_exists(public_path($berita->gambar))) {
                    unlink(public_path($berita->gambar));
                }

                $gambar = $request->file('gambar');
                $imageName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('assets/img/berita'), $imageName);
                $data['gambar'] = 'assets/img/berita/' . $imageName;
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

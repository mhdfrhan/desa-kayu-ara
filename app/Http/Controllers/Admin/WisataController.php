<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WisataAlam;
use Illuminate\Support\Str;

class WisataController extends Controller
{
    public function index()
    {
        try {
            $wisata = WisataAlam::latest()->paginate(10);
            return view('admin.wisata.index', compact('wisata'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data wisata alam');
        }
    }

    public function create()
    {
        try {
            return view('admin.wisata.create');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman tambah wisata alam');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:wisata_alam',
                'deskripsi' => 'required|string|max:2000',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'kategori' => 'required|string|max:255',
                'lokasi' => 'required|string|max:255',
                'fasilitas' => 'nullable|string|max:1000',
                'cara_menuju' => 'nullable|string|max:1000',
                'jam_operasional' => 'nullable|string|max:255',
                'harga_tiket' => 'nullable|string|max:255',
                'kontak' => 'nullable|string|max:255',
                'featured' => 'boolean',
                'aktif' => 'boolean',
                'urutan' => 'nullable|integer|min:0'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['featured'] = $request->has('featured');
            $data['slug'] = $request->slug ?: Str::slug($request->nama);

            // Handle image upload
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $imageName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('assets/img/wisata'), $imageName);
                $data['gambar'] = $imageName;
            }

            WisataAlam::create($data);

            return redirect()->route('admin.wisata.index')
                ->with('success', 'Wisata alam berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan wisata alam');
        }
    }

    public function show(WisataAlam $wisata)
    {
        try {
            return view('admin.wisata.show', compact('wisata'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat detail wisata alam');
        }
    }

    public function edit(WisataAlam $wisata)
    {
        try {
            return view('admin.wisata.edit', compact('wisata'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat halaman edit wisata alam');
        }
    }

    public function update(Request $request, WisataAlam $wisata)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:wisata_alam,slug,' . $wisata->id,
                'deskripsi' => 'required|string|max:2000',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'kategori' => 'required|string|max:255',
                'lokasi' => 'required|string|max:255',
                'fasilitas' => 'nullable|string|max:1000',
                'cara_menuju' => 'nullable|string|max:1000',
                'jam_operasional' => 'nullable|string|max:255',
                'harga_tiket' => 'nullable|string|max:255',
                'kontak' => 'nullable|string|max:255',
                'featured' => 'boolean',
                'aktif' => 'boolean',
                'urutan' => 'nullable|integer|min:0'
            ]);

            $data = $request->all();
            $data['aktif'] = $request->has('aktif');
            $data['featured'] = $request->has('featured');
            $data['slug'] = $request->slug ?: Str::slug($request->nama);

            // Handle image upload
            if ($request->hasFile('gambar')) {
                // Delete old image
                if ($wisata->gambar && file_exists(public_path('assets/img/wisata/' . $wisata->gambar))) {
                    unlink(public_path('assets/img/wisata/' . $wisata->gambar));
                }

                $gambar = $request->file('gambar');
                $imageName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('assets/img/wisata'), $imageName);
                $data['gambar'] = $imageName;
            }

            $wisata->update($data);

            return redirect()->route('admin.wisata.index')
                ->with('success', 'Wisata alam berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui wisata alam');
        }
    }

    public function destroy(WisataAlam $wisata)
    {
        try {
            // Delete image
            if ($wisata->gambar && file_exists(public_path('assets/img/wisata/' . $wisata->gambar))) {
                unlink(public_path('assets/img/wisata/' . $wisata->gambar));
            }

            $wisata->delete();

            return redirect()->route('admin.wisata.index')
                ->with('success', 'Wisata alam berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus wisata alam');
        }
    }

    public function toggleStatus(WisataAlam $wisata)
    {
        try {
            $wisata->update(['aktif' => !$wisata->aktif]);

            return response()->json([
                'success' => true,
                'message' => 'Status wisata alam berhasil diubah',
                'aktif' => $wisata->aktif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status wisata alam'
            ], 500);
        }
    }

    public function toggleFeatured(WisataAlam $wisata)
    {
        try {
            $wisata->update(['featured' => !$wisata->featured]);

            return response()->json([
                'success' => true,
                'message' => 'Status featured wisata alam berhasil diubah',
                'featured' => $wisata->featured
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status featured wisata alam'
            ], 500);
        }
    }
}

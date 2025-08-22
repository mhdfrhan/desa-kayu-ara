<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::orderBy('urutan', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'tombol_teks' => 'nullable|string|max:100',
            'tombol_link' => 'nullable|url|max:255',
            'aktif' => 'boolean',
            'urutan' => 'nullable|integer|min:1'
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $imageName = 'banner_' . time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                // Move to public/assets/img/banners
                $image->move(public_path('assets/img/banners'), $imageName);
                $validated['gambar'] = 'assets/img/banners/' . $imageName;
            }

            // Set default values
            $validated['aktif'] = $request->has('aktif');
            $validated['urutan'] = $validated['urutan'] ?? Banner::max('urutan') + 1;

            Banner::create($validated);

            return redirect()->route('admin.banner.index')
                ->with('success', 'Banner berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan banner: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return view('admin.banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'tombol_teks' => 'nullable|string|max:100',
            'tombol_link' => 'nullable|url|max:255',
            'aktif' => 'boolean',
            'urutan' => 'nullable|integer|min:1'
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('gambar')) {
                // Delete old image
                if ($banner->gambar && file_exists(public_path($banner->gambar))) {
                    unlink(public_path($banner->gambar));
                }

                $image = $request->file('gambar');
                $imageName = 'banner_' . time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                // Move to public/assets/img/banners
                $image->move(public_path('assets/img/banners'), $imageName);
                $validated['gambar'] = 'assets/img/banners/' . $imageName;
            }

            // Set default values
            $validated['aktif'] = $request->has('aktif');
            $validated['urutan'] = $validated['urutan'] ?? $banner->urutan;

            $banner->update($validated);

            return redirect()->route('admin.banner.index')
                ->with('success', 'Banner berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui banner: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        try {
            // Delete image file
            if ($banner->gambar && file_exists(public_path($banner->gambar))) {
                unlink(public_path($banner->gambar));
            }

            $banner->delete();

            return redirect()->route('admin.banner.index')
                ->with('success', 'Banner berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus banner: ' . $e->getMessage());
        }
    }

    /**
     * Toggle banner status
     */
    public function toggleStatus(Banner $banner)
    {
        try {
            $banner->update(['aktif' => !$banner->aktif]);

            $status = $banner->aktif ? 'diaktifkan' : 'dinonaktifkan';
            return response()->json([
                'success' => true,
                'message' => "Banner berhasil {$status}",
                'aktif' => $banner->aktif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status banner'
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Statistik;
use Illuminate\Support\Str;

class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $statistik = Statistik::orderBy('urutan', 'asc')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('admin.statistik.index', compact('statistik'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data statistik');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.statistik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'kategori' => 'required|string|max:255',
                'sub_kategori' => 'nullable|string|max:255',
                'judul' => 'required|string|max:255',
                'nilai' => 'required|string|max:255',
                'satuan' => 'required|string|max:50',
                'deskripsi' => 'nullable|string|max:1000',
                'warna' => 'required|string|max:50',
                'icon' => 'nullable|string|max:255',
                'urutan' => 'nullable|integer|min:0',
                'aktif' => 'boolean'
            ]);

            // Set default values
            $validated['urutan'] = $validated['urutan'] ?? 0;
            $validated['aktif'] = $request->has('aktif');

            Statistik::create($validated);

            return redirect()->route('admin.statistik.index')
                ->with('success', 'Data statistik berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan data statistik');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Statistik $statistik)
    {
        try {
            return view('admin.statistik.show', compact('statistik'));
        } catch (\Exception $e) {
            return redirect()->route('admin.statistik.index')
                ->with('error', 'Terjadi kesalahan saat memuat detail statistik');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statistik $statistik)
    {
        try {
            return view('admin.statistik.edit', compact('statistik'));
        } catch (\Exception $e) {
            return redirect()->route('admin.statistik.index')
                ->with('error', 'Terjadi kesalahan saat memuat form edit');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Statistik $statistik)
    {
        try {
            $validated = $request->validate([
                'kategori' => 'required|string|max:255',
                'sub_kategori' => 'nullable|string|max:255',
                'judul' => 'required|string|max:255',
                'nilai' => 'required|string|max:255',
                'satuan' => 'required|string|max:50',
                'deskripsi' => 'nullable|string|max:1000',
                'warna' => 'required|string|max:50',
                'icon' => 'nullable|string|max:255',
                'urutan' => 'nullable|integer|min:0',
                'aktif' => 'boolean'
            ]);

            // Set default values
            $validated['urutan'] = $validated['urutan'] ?? 0;
            $validated['aktif'] = $request->has('aktif');

            $statistik->update($validated);

            return redirect()->route('admin.statistik.index')
                ->with('success', 'Data statistik berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui data statistik');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistik $statistik)
    {
        try {
            $statistik->delete();

            return redirect()->route('admin.statistik.index')
                ->with('success', 'Data statistik berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus data statistik');
        }
    }

    /**
     * Toggle status of statistik
     */
    public function toggleStatus(Statistik $statistik)
    {
        try {
            $statistik->update([
                'aktif' => !$statistik->aktif
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diubah',
                'aktif' => $statistik->aktif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status'
            ], 500);
        }
    }
}

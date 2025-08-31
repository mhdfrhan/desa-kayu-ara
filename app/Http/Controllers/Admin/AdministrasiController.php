<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdministrasiPenduduk;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;











class AdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $administrasi = AdministrasiPenduduk::orderBy('urutan', 'asc')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('admin.administrasi.index', compact('administrasi'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data administrasi penduduk');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.administrasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'jenis' => 'required|string|max:255',
                'nilai' => 'required|string|max:255',
                'satuan' => 'required|string|max:50',
                'deskripsi' => 'required|string|max:1000',
                'warna_icon' => 'required|string|max:50',
                'icon' => 'nullable|string|max:255',
                'urutan' => 'nullable|integer|min:0',
                'aktif' => 'boolean'
            ]);

            // Set default values
            $validated['urutan'] = $validated['urutan'] ?? 0;
            $validated['aktif'] = $request->has('aktif');

            AdministrasiPenduduk::create($validated);

            return redirect()->route('admin.administrasi.index')
                ->with('success', 'Data administrasi penduduk berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan data administrasi penduduk ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AdministrasiPenduduk $administrasi)
    {
        try {
            return view('admin.administrasi.show', compact('administrasi'));
        } catch (\Exception $e) {
            return redirect()->route('admin.administrasi.index')
                ->with('error', 'Terjadi kesalahan saat memuat detail administrasi penduduk');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdministrasiPenduduk $administrasi)
    {
        try {
            return view('admin.administrasi.edit', compact('administrasi'));
        } catch (\Exception $e) {
            return redirect()->route('admin.administrasi.index')
                ->with('error', 'Terjadi kesalahan saat memuat form edit');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdministrasiPenduduk $administrasi)
    {
        try {
            $validated = $request->validate([
                'kategori' => 'required|string|max:255',
                'nilai' => 'required|string|max:255',
                'satuan' => 'required|string|max:50',
                'deskripsi' => 'required|string|max:1000',
                'warna_icon' => 'required|string|max:50',
                'icon' => 'nullable|string|max:255',
                'urutan' => 'nullable|integer|min:0',
                'aktif' => 'boolean'
            ]);

            // Set default values
            $validated['urutan'] = $validated['urutan'] ?? 0;
            $validated['aktif'] = $request->has('aktif');

            $administrasi->update($validated);

            return redirect()->route('admin.administrasi.index')
                ->with('success', 'Data administrasi penduduk berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui data administrasi penduduk');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdministrasiPenduduk $administrasi)
    {
        try {
            $administrasi->delete();

            return redirect()->route('admin.administrasi.index')
                ->with('success', 'Data administrasi penduduk berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus data administrasi penduduk');
        }
    }

    /**
     * Toggle status of administrasi penduduk
     */
    public function toggleStatus(AdministrasiPenduduk $administrasi)
    {
        try {
            $administrasi->update([
                'aktif' => !$administrasi->aktif
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diubah',
                'aktif' => $administrasi->aktif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status'
            ], 500);
        }
    }
}

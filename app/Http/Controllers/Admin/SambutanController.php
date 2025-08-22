<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SambutanKepalaDesa;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SambutanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $sambutan = SambutanKepalaDesa::with('strukturOrganisasi')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            return view('admin.sambutan.index', compact('sambutan'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data sambutan');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            // Ambil data kepala desa dari struktur organisasi
            $kepalaDesa = StrukturOrganisasi::where('jabatan', 'like', '%kepala desa%')
                ->aktif()
                ->get();

            return view('admin.sambutan.create', compact('kepalaDesa'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat form');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'struktur_organisasi_id' => 'required|exists:struktur_organisasi,id',
                'sambutan' => 'required|string|max:1000',
                'quote' => 'nullable|string|max:500',
                'konten_lengkap' => 'required|string|max:5000',
                'aktif' => 'boolean'
            ]);

            $data = $request->all();

            // Set default values
            $data['aktif'] = $request->has('aktif');

            // Check if sambutan already exists for this struktur organisasi
            $existingSambutan = SambutanKepalaDesa::where('struktur_organisasi_id', $data['struktur_organisasi_id'])->first();
            if ($existingSambutan) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Sambutan untuk kepala desa ini sudah ada');
            }

            SambutanKepalaDesa::create($data);

            return redirect()->route('admin.sambutan.index')
                ->with('success', 'Sambutan kepala desa berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan sambutan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SambutanKepalaDesa $sambutan)
    {
        $sambutan->load('strukturOrganisasi');
        return view('admin.sambutan.show', compact('sambutan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SambutanKepalaDesa $sambutan)
    {
        try {
            // Ambil data kepala desa dari struktur organisasi
            $kepalaDesa = StrukturOrganisasi::where('jabatan', 'like', '%kepala desa%')
                ->aktif()
                ->get();

            $sambutan->load('strukturOrganisasi');
            return view('admin.sambutan.edit', compact('sambutan', 'kepalaDesa'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat form');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SambutanKepalaDesa $sambutan)
    {
        try {
            $request->validate([
                'struktur_organisasi_id' => 'required|exists:struktur_organisasi,id',
                'sambutan' => 'required|string|max:1000',
                'quote' => 'nullable|string|max:500',
                'konten_lengkap' => 'required|string|max:5000',
                'aktif' => 'boolean'
            ]);

            $data = $request->all();

            // Set default values
            $data['aktif'] = $request->has('aktif');

            // Check if sambutan already exists for this struktur organisasi (excluding current)
            $existingSambutan = SambutanKepalaDesa::where('struktur_organisasi_id', $data['struktur_organisasi_id'])
                ->where('id', '!=', $sambutan->id)
                ->first();
            if ($existingSambutan) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Sambutan untuk kepala desa ini sudah ada');
            }

            $sambutan->update($data);

            return redirect()->route('admin.sambutan.index')
                ->with('success', 'Sambutan kepala desa berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui sambutan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SambutanKepalaDesa $sambutan)
    {
        try {
            $sambutan->delete();

            return redirect()->route('admin.sambutan.index')
                ->with('success', 'Sambutan kepala desa berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus sambutan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle status sambutan
     */
    public function toggleStatus(SambutanKepalaDesa $sambutan)
    {
        try {
            $sambutan->update(['aktif' => !$sambutan->aktif]);

            return response()->json([
                'success' => true,
                'message' => 'Status sambutan berhasil diubah',
                'aktif' => $sambutan->aktif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status sambutan'
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdministrasiPenduduk;

class AdministrasiController extends Controller
{
    public function index()
    {
        $administrasi = AdministrasiPenduduk::orderBy('urutan', 'asc')->paginate(10);
        return view('admin.administrasi.index', compact('administrasi'));
    }

    public function create()
    {
        return view('admin.administrasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'nilai' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'warna_icon' => 'required|string|max:50',
            'icon' => 'nullable|string|max:255',
            'urutan' => 'integer|min:0',
            'aktif' => 'boolean'
        ]);

        AdministrasiPenduduk::create($request->all());

        return redirect()->route('admin.administrasi.index')
            ->with('success', 'Data administrasi penduduk berhasil ditambahkan');
    }

    public function show(AdministrasiPenduduk $administrasi)
    {
        return view('admin.administrasi.show', compact('administrasi'));
    }

    public function edit(AdministrasiPenduduk $administrasi)
    {
        return view('admin.administrasi.edit', compact('administrasi'));
    }

    public function update(Request $request, AdministrasiPenduduk $administrasi)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'nilai' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'warna_icon' => 'required|string|max:50',
            'icon' => 'nullable|string|max:255',
            'urutan' => 'integer|min:0',
            'aktif' => 'boolean'
        ]);

        $administrasi->update($request->all());

        return redirect()->route('admin.administrasi.index')
            ->with('success', 'Data administrasi penduduk berhasil diperbarui');
    }

    public function destroy(AdministrasiPenduduk $administrasi)
    {
        $administrasi->delete();

        return redirect()->route('admin.administrasi.index')
            ->with('success', 'Data administrasi penduduk berhasil dihapus');
    }
}

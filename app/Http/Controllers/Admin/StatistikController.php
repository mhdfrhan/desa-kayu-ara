<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Statistik;

class StatistikController extends Controller
{
    public function index()
    {
        $statistik = Statistik::orderBy('urutan', 'asc')->paginate(10);
        return view('admin.statistik.index', compact('statistik'));
    }

    public function create()
    {
        return view('admin.statistik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'sub_kategori' => 'nullable|string|max:255',
            'judul' => 'required|string|max:255',
            'nilai' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'warna' => 'required|string|max:50',
            'icon' => 'nullable|string|max:255',
            'urutan' => 'integer|min:0',
            'aktif' => 'boolean'
        ]);

        Statistik::create($request->all());

        return redirect()->route('admin.statistik.index')
            ->with('success', 'Data statistik berhasil ditambahkan');
    }

    public function show(Statistik $statistik)
    {
        return view('admin.statistik.show', compact('statistik'));
    }

    public function edit(Statistik $statistik)
    {
        return view('admin.statistik.edit', compact('statistik'));
    }

    public function update(Request $request, Statistik $statistik)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'sub_kategori' => 'nullable|string|max:255',
            'judul' => 'required|string|max:255',
            'nilai' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'warna' => 'required|string|max:50',
            'icon' => 'nullable|string|max:255',
            'urutan' => 'integer|min:0',
            'aktif' => 'boolean'
        ]);

        $statistik->update($request->all());

        return redirect()->route('admin.statistik.index')
            ->with('success', 'Data statistik berhasil diperbarui');
    }

    public function destroy(Statistik $statistik)
    {
        $statistik->delete();

        return redirect()->route('admin.statistik.index')
            ->with('success', 'Data statistik berhasil dihapus');
    }
}

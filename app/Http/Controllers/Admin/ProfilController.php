<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilDesa;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = ProfilDesa::orderBy('urutan', 'asc')->paginate(10);
        return view('admin.profil.index', compact('profil'));
    }

    public function create()
    {
        return view('admin.profil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'urutan' => 'integer|min:0',
            'aktif' => 'boolean'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('profil', 'public');
            $data['gambar'] = $gambarPath;
        }

        ProfilDesa::create($data);

        return redirect()->route('admin.profil.index')
            ->with('success', 'Profil desa berhasil ditambahkan');
    }

    public function show(ProfilDesa $profil)
    {
        return view('admin.profil.show', compact('profil'));
    }

    public function edit(ProfilDesa $profil)
    {
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, ProfilDesa $profil)
    {
        $request->validate([
            'jenis' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'urutan' => 'integer|min:0',
            'aktif' => 'boolean'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($profil->gambar) {
                Storage::disk('public')->delete($profil->gambar);
            }
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('profil', 'public');
            $data['gambar'] = $gambarPath;
        }

        $profil->update($data);

        return redirect()->route('admin.profil.index')
            ->with('success', 'Profil desa berhasil diperbarui');
    }

    public function destroy(ProfilDesa $profil)
    {
        if ($profil->gambar) {
            Storage::disk('public')->delete($profil->gambar);
        }

        $profil->delete();

        return redirect()->route('admin.profil.index')
            ->with('success', 'Profil desa berhasil dihapus');
    }
}

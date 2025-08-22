<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peta;
use Illuminate\Support\Facades\Storage;

class PetaController extends Controller
{
    public function index()
    {
        $peta = Peta::latest()->paginate(10);
        return view('admin.peta.index', compact('peta'));
    }

    public function create()
    {
        return view('admin.peta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string|max:255',
            'koordinat_lat' => 'required|string|max:50',
            'koordinat_lng' => 'required|string|max:50',
            'zoom_level' => 'required|string|max:10',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'informasi_tambahan' => 'nullable|string',
            'aktif' => 'boolean'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('peta', 'public');
            $data['gambar'] = $gambarPath;
        }

        Peta::create($data);

        return redirect()->route('admin.peta.index')
            ->with('success', 'Data peta berhasil ditambahkan');
    }

    public function show(Peta $peta)
    {
        return view('admin.peta.show', compact('peta'));
    }

    public function edit(Peta $peta)
    {
        return view('admin.peta.edit', compact('peta'));
    }

    public function update(Request $request, Peta $peta)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string|max:255',
            'koordinat_lat' => 'required|string|max:50',
            'koordinat_lng' => 'required|string|max:50',
            'zoom_level' => 'required|string|max:10',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'informasi_tambahan' => 'nullable|string',
            'aktif' => 'boolean'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($peta->gambar) {
                Storage::disk('public')->delete($peta->gambar);
            }
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('peta', 'public');
            $data['gambar'] = $gambarPath;
        }

        $peta->update($data);

        return redirect()->route('admin.peta.index')
            ->with('success', 'Data peta berhasil diperbarui');
    }

    public function destroy(Peta $peta)
    {
        if ($peta->gambar) {
            Storage::disk('public')->delete($peta->gambar);
        }

        $peta->delete();

        return redirect()->route('admin.peta.index')
            ->with('success', 'Data peta berhasil dihapus');
    }
}

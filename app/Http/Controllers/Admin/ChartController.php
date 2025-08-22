<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChartStatistik;

class ChartController extends Controller
{
    public function index()
    {
        $chart = ChartStatistik::withCount('dataChart')->orderBy('urutan', 'asc')->paginate(10);
        return view('admin.chart.index', compact('chart'));
    }

    public function create()
    {
        return view('admin.chart.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:chart_statistik',
            'deskripsi' => 'nullable|string',
            'tipe_chart' => 'required|in:pie,bar,line,doughnut,radar,polarArea',
            'konfigurasi' => 'nullable|json',
            'warna_primary' => 'required|string|max:7',
            'warna_secondary' => 'required|string|max:7',
            'urutan' => 'integer|min:0',
            'aktif' => 'boolean'
        ]);

        ChartStatistik::create($request->all());

        return redirect()->route('admin.chart.index')
            ->with('success', 'Chart statistik berhasil ditambahkan');
    }

    public function show(ChartStatistik $chart)
    {
        return view('admin.chart.show', compact('chart'));
    }

    public function edit(ChartStatistik $chart)
    {
        return view('admin.chart.edit', compact('chart'));
    }

    public function update(Request $request, ChartStatistik $chart)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:chart_statistik,slug,' . $chart->id,
            'deskripsi' => 'nullable|string',
            'tipe_chart' => 'required|in:pie,bar,line,doughnut,radar,polarArea',
            'konfigurasi' => 'nullable|json',
            'warna_primary' => 'required|string|max:7',
            'warna_secondary' => 'required|string|max:7',
            'urutan' => 'integer|min:0',
            'aktif' => 'boolean'
        ]);

        $chart->update($request->all());

        return redirect()->route('admin.chart.index')
            ->with('success', 'Chart statistik berhasil diperbarui');
    }

    public function destroy(ChartStatistik $chart)
    {
        $chart->delete();

        return redirect()->route('admin.chart.index')
            ->with('success', 'Chart statistik berhasil dihapus');
    }
}

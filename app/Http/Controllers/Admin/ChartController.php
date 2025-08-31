<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChartStatistik;
use Illuminate\Support\Str;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $chart = ChartStatistik::withCount('dataChart')
                ->orderBy('urutan', 'asc')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('admin.chart.index', compact('chart'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data chart statistik');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.chart.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:chart_statistik',
                'deskripsi' => 'nullable|string|max:1000',
                'tipe_chart' => 'required|in:pie,bar,line,doughnut,radar,polarArea',
                'warna_primary' => 'required|string|max:7',
                'warna_secondary' => 'required|string|max:7',
                'urutan' => 'nullable|integer|min:0',
                'aktif' => 'boolean'
            ]);

            // Set default values
            $validated['urutan'] = $validated['urutan'] ?? 0;
            $validated['aktif'] = $request->has('aktif');

            ChartStatistik::create($validated);

            return redirect()->route('admin.chart.index')
                ->with('success', 'Chart statistik berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan chart statistik');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ChartStatistik $chart)
    {
        try {
            $chart->load('dataChart.urutkan');
            return view('admin.chart.show', compact('chart'));
        } catch (\Exception $e) {
            return redirect()->route('admin.chart.index')
                ->with('error', 'Terjadi kesalahan saat memuat detail chart statistik');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChartStatistik $chart)
    {
        try {
            return view('admin.chart.edit', compact('chart'));
        } catch (\Exception $e) {
            return redirect()->route('admin.chart.index')
                ->with('error', 'Terjadi kesalahan saat memuat form edit');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChartStatistik $chart)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:chart_statistik,slug,' . $chart->id,
                'deskripsi' => 'nullable|string|max:1000',
                'tipe_chart' => 'required|in:pie,bar,line,doughnut,radar,polarArea',
                'warna_primary' => 'required|string|max:7',
                'warna_secondary' => 'required|string|max:7',
                'urutan' => 'nullable|integer|min:0',
                'aktif' => 'boolean'
            ]);

            // Set default values
            $validated['urutan'] = $validated['urutan'] ?? 0;
            $validated['aktif'] = $request->has('aktif');

            $chart->update($validated);

            return redirect()->route('admin.chart.index')
                ->with('success', 'Chart statistik berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui chart statistik');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChartStatistik $chart)
    {
        try {
            $chart->delete();

            return redirect()->route('admin.chart.index')
                ->with('success', 'Chart statistik berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus chart statistik');
        }
    }

    /**
     * Toggle status of chart statistik
     */
    public function toggleStatus(ChartStatistik $chart)
    {
        try {
            $chart->update([
                'aktif' => !$chart->aktif
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diubah',
                'aktif' => $chart->aktif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status'
            ], 500);
        }
    }
}

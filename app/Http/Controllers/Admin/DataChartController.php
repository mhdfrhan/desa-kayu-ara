<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataChart;
use App\Models\ChartStatistik;

class DataChartController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      try {
         $dataCharts = DataChart::with('chart')
            ->orderBy('urutan', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

         return view('admin.data-chart.index', compact('dataCharts'));
      } catch (\Exception $e) {
         return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data chart');
      }
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      try {
         $charts = ChartStatistik::where('aktif', true)
            ->orderBy('nama', 'asc')
            ->get();

         return view('admin.data-chart.create', compact('charts'));
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
         $validated = $request->validate([
            'chart_id' => 'required|exists:chart_statistik,id',
            'label' => 'required|string|max:255',
            'nilai' => 'required|numeric|min:0',
            'warna' => 'nullable|string|max:7',
            'deskripsi' => 'nullable|string|max:1000',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'boolean'
         ]);

         // Set default values
         $validated['urutan'] = $validated['urutan'] ?? 0;
         $validated['aktif'] = $request->has('aktif');

         DataChart::create($validated);

         return redirect()->route('admin.data-chart.index')
            ->with('success', 'Data chart berhasil ditambahkan');
      } catch (\Exception $e) {
         return redirect()->back()
            ->withInput()
            ->with('error', 'Terjadi kesalahan saat menambahkan data chart');
      }
   }

   /**
    * Display the specified resource.
    */
   public function show(DataChart $dataChart)
   {
      try {
         $dataChart->load('chart');
         return view('admin.data-chart.show', compact('dataChart'));
      } catch (\Exception $e) {
         return redirect()->route('admin.data-chart.index')
            ->with('error', 'Terjadi kesalahan saat memuat detail data chart');
      }
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(DataChart $dataChart)
   {
      try {
         $charts = ChartStatistik::where('aktif', true)
            ->orderBy('nama', 'asc')
            ->get();

         return view('admin.data-chart.edit', compact('dataChart', 'charts'));
      } catch (\Exception $e) {
         return redirect()->route('admin.data-chart.index')
            ->with('error', 'Terjadi kesalahan saat memuat form edit');
      }
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, DataChart $dataChart)
   {
      try {
         $validated = $request->validate([
            'chart_id' => 'required|exists:chart_statistik,id',
            'label' => 'required|string|max:255',
            'nilai' => 'required|numeric|min:0',
            'warna' => 'nullable|string|max:7',
            'deskripsi' => 'nullable|string|max:1000',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'boolean'
         ]);

         // Set default values
         $validated['urutan'] = $validated['urutan'] ?? 0;
         $validated['aktif'] = $request->has('aktif');

         $dataChart->update($validated);

         return redirect()->route('admin.data-chart.index')
            ->with('success', 'Data chart berhasil diperbarui');
      } catch (\Exception $e) {
         return redirect()->back()
            ->withInput()
            ->with('error', 'Terjadi kesalahan saat memperbarui data chart');
      }
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(DataChart $dataChart)
   {
      try {
         $dataChart->delete();

         return redirect()->route('admin.data-chart.index')
            ->with('success', 'Data chart berhasil dihapus');
      } catch (\Exception $e) {
         return redirect()->back()
            ->with('error', 'Terjadi kesalahan saat menghapus data chart');
      }
   }

   /**
    * Toggle status of data chart
    */
   public function toggleStatus(DataChart $dataChart)
   {
      try {
         $dataChart->update([
            'aktif' => !$dataChart->aktif
         ]);

         return response()->json([
            'success' => true,
            'message' => 'Status berhasil diubah',
            'aktif' => $dataChart->aktif
         ]);
      } catch (\Exception $e) {
         return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan saat mengubah status'
         ], 500);
      }
   }

   /**
    * Get data chart by chart ID
    */
   public function getByChart($chartId)
   {
      try {
         $dataCharts = DataChart::where('chart_id', $chartId)
            ->where('aktif', true)
            ->orderBy('urutan', 'asc')
            ->get();

         return response()->json($dataCharts);
      } catch (\Exception $e) {
         return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan saat memuat data'
         ], 500);
      }
   }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\ProdukDesa;
use App\Models\Galeri;
use App\Models\WisataAlam;
use App\Models\Banner;
use App\Models\KategoriBerita;
use App\Models\KategoriProduk;
use App\Models\KategoriGaleri;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'statistics' => $this->getStatistics(),
            'growthData' => $this->getGrowthData(),
            'recentData' => $this->getRecentData(),
            'activities' => $this->getRecentActivities(),
            'categoryStats' => $this->getCategoryStats(),
            'todayContent' => $this->getTodayContent(),
        ];

        return view('admin.dashboard', $data);
    }

    /**
     * Get basic statistics
     */
    private function getStatistics(): array
    {
        return [
            'totalBerita' => Berita::count(),
            'totalProduk' => ProdukDesa::count(),
            'totalGaleri' => Galeri::count(),
            'totalWisata' => WisataAlam::count(),
            'totalBanner' => Banner::count(),
            'totalKategoriBerita' => KategoriBerita::count(),
            'totalKategoriProduk' => KategoriProduk::count(),
            'totalKategoriGaleri' => KategoriGaleri::count(),
        ];
    }

    /**
     * Get growth data for monthly comparison
     */
    private function getGrowthData(): array
    {
        $bulanLalu = now()->subMonth();

        $beritaBulanLalu = Berita::where('created_at', '<', $bulanLalu)->count();
        $beritaBulanIni = Berita::where('created_at', '>=', $bulanLalu)->count();
        $pertumbuhanBerita = $beritaBulanLalu > 0
            ? round((($beritaBulanIni - $beritaBulanLalu) / $beritaBulanLalu) * 100, 1)
            : 100;

        $produkBulanLalu = ProdukDesa::where('created_at', '<', $bulanLalu)->count();
        $produkBulanIni = ProdukDesa::where('created_at', '>=', $bulanLalu)->count();
        $pertumbuhanProduk = $produkBulanLalu > 0
            ? round((($produkBulanIni - $produkBulanLalu) / $produkBulanLalu) * 100, 1)
            : 100;

        $galeriBulanLalu = Galeri::where('created_at', '<', $bulanLalu)->count();
        $galeriBulanIni = Galeri::where('created_at', '>=', $bulanLalu)->count();
        $pertumbuhanGaleri = $galeriBulanLalu > 0
            ? round((($galeriBulanIni - $galeriBulanLalu) / $galeriBulanLalu) * 100, 1)
            : 100;

        $wisataBulanLalu = WisataAlam::where('created_at', '<', $bulanLalu)->count();
        $wisataBulanIni = WisataAlam::where('created_at', '>=', $bulanLalu)->count();
        $pertumbuhanWisata = $wisataBulanLalu > 0
            ? round((($wisataBulanIni - $wisataBulanLalu) / $wisataBulanLalu) * 100, 1)
            : 100;

        return [
            'pertumbuhanBerita' => $pertumbuhanBerita,
            'pertumbuhanProduk' => $pertumbuhanProduk,
            'pertumbuhanGaleri' => $pertumbuhanGaleri,
            'pertumbuhanWisata' => $pertumbuhanWisata,
        ];
    }

    /**
     * Get recent data for display
     */
    private function getRecentData(): array
    {
        return [
            'recentBerita' => Berita::with('kategori')->latest()->take(5)->get(),
            'recentProduk' => ProdukDesa::with('kategori')->latest()->take(5)->get(),
            'recentGaleri' => Galeri::latest()->take(5)->get(),
        ];
    }

    /**
     * Get recent activities from all content types
     */
    private function getRecentActivities(): Collection
    {
        $activities = collect();

        // Add recent news
        $recentBerita = Berita::latest()->take(5)->get();
        foreach ($recentBerita as $berita) {
            $activities->push([
                'type' => 'berita',
                'title' => 'Berita baru ditambahkan',
                'description' => $berita->judul,
                'time' => $berita->created_at,
                'icon' => 'fas fa-newspaper',
                'color' => 'blue',
            ]);
        }

        // Add recent products
        $recentProduk = ProdukDesa::latest()->take(5)->get();
        foreach ($recentProduk as $produk) {
            $activities->push([
                'type' => 'produk',
                'title' => 'Produk baru ditambahkan',
                'description' => $produk->nama,
                'time' => $produk->created_at,
                'icon' => 'fas fa-box',
                'color' => 'green',
            ]);
        }

        // Add recent gallery
        $recentGaleri = Galeri::latest()->take(5)->get();
        foreach ($recentGaleri as $galeri) {
            $activities->push([
                'type' => 'galeri',
                'title' => 'Foto galeri diupload',
                'description' => $galeri->judul ?? 'Foto baru',
                'time' => $galeri->created_at,
                'icon' => 'fas fa-image',
                'color' => 'yellow',
            ]);
        }

        // Sort by time and take top 8
        return $activities->sortByDesc('time')->take(8);
    }

    /**
     * Get category statistics
     */
    private function getCategoryStats(): array
    {
        return [
            'kategoriBeritaStats' => KategoriBerita::withCount('berita')
                ->orderBy('berita_count', 'desc')
                ->take(5)
                ->get(),
            'kategoriProdukStats' => KategoriProduk::withCount('produk')
                ->orderBy('produk_count', 'desc')
                ->take(5)
                ->get(),
        ];
    }

    /**
     * Get today's content count
     */
    private function getTodayContent(): int
    {
        return Berita::whereDate('created_at', today())->count() +
            ProdukDesa::whereDate('created_at', today())->count() +
            Galeri::whereDate('created_at', today())->count() +
            WisataAlam::whereDate('created_at', today())->count();
    }
}

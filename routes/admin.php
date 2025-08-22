<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\SambutanController;
use App\Http\Controllers\Admin\StrukturController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KategoriBeritaController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\KategoriGaleriController;
use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\Admin\AdministrasiController;
use App\Http\Controllers\Admin\StatistikController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\PetaController;

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Banner
    Route::resource('banner', BannerController::class);
    Route::patch('banner/{banner}/toggle-status', [BannerController::class, 'toggleStatus'])->name('banner.toggle-status');

    // Sambutan Kepala Desa
    Route::resource('sambutan', SambutanController::class);
    Route::patch('sambutan/{sambutan}/toggle-status', [SambutanController::class, 'toggleStatus'])->name('sambutan.toggle-status');

    // Struktur Organisasi
    Route::resource('struktur', StrukturController::class);
    Route::patch('struktur/{struktur}/toggle-status', [StrukturController::class, 'toggleStatus'])->name('struktur.toggle-status');

    // Berita
    Route::resource('berita', BeritaController::class);
    Route::patch('berita/{berita}/toggle-status', [BeritaController::class, 'toggleStatus'])->name('berita.toggle-status');
    Route::patch('berita/{berita}/toggle-featured', [BeritaController::class, 'toggleFeatured'])->name('berita.toggle-featured');
    Route::resource('kategori-berita', KategoriBeritaController::class)->parameters(['kategori-berita' => 'kategoriBerita']);
    Route::patch('kategori-berita/{kategoriBerita}/toggle-status', [KategoriBeritaController::class, 'toggleStatus'])->name('kategori-berita.toggle-status');

    // Produk Desa
    Route::resource('produk', ProdukController::class)->parameters(['produk' => 'produk']);
    Route::patch('produk/{produk}/toggle-status', [ProdukController::class, 'toggleStatus'])->name('produk.toggle-status');
    Route::patch('produk/{produk}/toggle-featured', [ProdukController::class, 'toggleFeatured'])->name('produk.toggle-featured');
    Route::patch('produk/{produk}/toggle-best-seller', [ProdukController::class, 'toggleBestSeller'])->name('produk.toggle-best-seller');
    Route::resource('kategori-produk', KategoriProdukController::class)->parameters(['kategori-produk' => 'kategoriProduk']);
    Route::patch('kategori-produk/{kategoriProduk}/toggle-status', [KategoriProdukController::class, 'toggleStatus'])->name('kategori-produk.toggle-status');

    // Galeri
    Route::resource('galeri', GaleriController::class)->parameters(['galeri' => 'galeri']);
    Route::patch('galeri/{galeri}/toggle-status', [GaleriController::class, 'toggleStatus'])->name('galeri.toggle-status');
    Route::patch('galeri/{galeri}/toggle-featured', [GaleriController::class, 'toggleFeatured'])->name('galeri.toggle-featured');
    Route::resource('kategori-galeri', KategoriGaleriController::class)->parameters(['kategori-galeri' => 'kategoriGaleri']);
    Route::patch('kategori-galeri/{kategoriGaleri}/toggle-status', [KategoriGaleriController::class, 'toggleStatus'])->name('kategori-galeri.toggle-status');

    // Wisata Alam
    Route::resource('wisata', WisataController::class)->parameters(['wisata' => 'wisata']);
    Route::patch('wisata/{wisata}/toggle-status', [WisataController::class, 'toggleStatus'])->name('wisata.toggle-status');
    Route::patch('wisata/{wisata}/toggle-featured', [WisataController::class, 'toggleFeatured'])->name('wisata.toggle-featured');

    // Administrasi Penduduk
    Route::resource('administrasi', AdministrasiController::class);

    // Statistik
    Route::resource('statistik', StatistikController::class);

    // Chart Statistik
    Route::resource('chart', ChartController::class);

    // Profil Desa
    Route::resource('profil', ProfilController::class);

    // Peta
    Route::resource('peta', PetaController::class);
});

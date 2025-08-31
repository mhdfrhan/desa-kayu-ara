<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/profil-kampung', 'profilDesa')->name('profil-desa');
    Route::get('/berita', 'berita')->name('berita');
    Route::get('/berita/{berita:slug}', 'beritaDetail')->name('berita.show');
    Route::get('/produk', 'produk')->name('produk');
    Route::get('/produk/{slug}', 'produkDetail')->name('produk.show');
    Route::get('/galeri', 'galeri')->name('galeri');
    Route::get('/galeri/{slug}', 'galeriDetail')->name('galeri.show');
    Route::post('/galeri/{slug}/like', 'galeriLike')->name('galeri.like');
    Route::get('/wisata', 'wisata')->name('wisata');
    Route::get('/wisata/{slug}', 'wisataDetail')->name('wisata.show');
    Route::get('/statistik', 'statistik')->name('statistik');
    Route::get('/peta', 'peta')->name('peta');
    Route::get('/struktur', 'struktur')->name('struktur-organisasi');
    Route::get('/tata-kerja', 'tataKerja')->name('tata-kerja');
});





// Include Admin Routes
require __DIR__ . '/admin.php';

require __DIR__ . '/auth.php';

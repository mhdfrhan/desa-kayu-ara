<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/profil-desa', 'profilDesa')->name('profil-desa');
    Route::get('/berita', 'berita')->name('berita');
    Route::get('/produk', 'produk')->name('produk');
    Route::get('/galeri', 'galeri')->name('galeri');
    Route::get('/statistik', 'statistik')->name('statistik');
    Route::get('/peta', 'peta')->name('peta');
    Route::get('/struktur', 'struktur')->name('struktur-organisasi');
    Route::get('/tata-kerja', 'tataKerja')->name('tata-kerja');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

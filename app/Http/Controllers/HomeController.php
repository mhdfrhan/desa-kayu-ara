<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function berita()
    {
        return view('home.berita');
    }

    public function profilDesa()
    {
        return view('home.profil-desa');
    }

    public function produk()
    {
        return view('home.produk');
    }

    public function galeri()
    {
        return view('home.galeri');
    }

    public function peta()
    {
        return view('home.peta');
    }

    public function statistik()
    {
        return view('home.statistik');
    }
}

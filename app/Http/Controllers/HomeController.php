<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\SambutanKepalaDesa;
use App\Models\StrukturOrganisasi;
use App\Models\Berita;
use App\Models\ProdukDesa;
use App\Models\Galeri;
use App\Models\GaleriLike;
use App\Models\Statistik;
use App\Models\WisataAlam;
use App\Models\ProfilDesa;
use App\Models\AdministrasiPenduduk;
use App\Models\ChartStatistik;
use App\Models\KategoriBerita;
use App\Models\KategoriGaleri;
use App\Models\KategoriProduk;
use App\Models\Peta;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // Banner untuk hero section
            $banners = Banner::aktif()->urutkan()->get();

            // Sambutan kepala desa
            $sambutan = SambutanKepalaDesa::aktif()->with('strukturOrganisasi')->first();

            // Struktur organisasi (tim)
            $strukturOrganisasi = StrukturOrganisasi::aktif()->urutkan()->get();

            // Berita highlight/featured
            $beritaHighlight = Berita::aktif()
                // ->featured()
                ->terbaru()
                ->with('kategori')
                ->limit(3)
                ->get();

            // Produk unggulan
            $produkUnggulan = ProdukDesa::aktif()
                // ->featured()
                ->urutkan()
                ->with('kategori')
                ->limit(6)
                ->get();

            // Galeri featured
            $galeriFeatured = Galeri::aktif()
                // ->featured()
                ->urutkan()
                ->with('kategori')
                ->limit(6)
                ->get();

            // Statistik untuk cards
            $statistikCards = Statistik::aktif()
                ->kategori('cards')
                ->urutkan()
                ->limit(4)
                ->get();

            // Wisata alam featured
            $wisataFeatured = WisataAlam::aktif()
                ->featured()
                ->limit(3)
                ->get();

            // Wisata untuk banner section
            $wisataBanner = WisataAlam::aktif()
                ->featured()
                ->limit(3)
                ->get();

            // Profil desa untuk section tertentu
            $profilVisi = ProfilDesa::aktif()->jenis('visi')->first();
            $profilMisi = ProfilDesa::aktif()->jenis('misi')->first();
            $profilSejarah = ProfilDesa::aktif()->jenis('sejarah')->first();

            // Data administrasi penduduk
            $dataPenduduk = AdministrasiPenduduk::aktif()->get();

            // Statistik untuk halaman statistik
            $statistik = Statistik::aktif()->urutkan()->get();
            $chartStatistik = ChartStatistik::aktif()
                ->with(['dataChart' => function ($query) {
                    $query->aktif()->urutkan();
                }])
                ->get();

            // Galeri untuk halaman galeri
            $galeri = Galeri::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriGaleri = KategoriGaleri::aktif()->get();

            // Produk untuk halaman produk
            $produk = ProdukDesa::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriProduk = KategoriProduk::aktif()->get();

            return view('home.index', compact(
                'banners',
                'sambutan',
                'strukturOrganisasi',
                'beritaHighlight',
                'produkUnggulan',
                'galeriFeatured',
                'statistikCards',
                'wisataFeatured',
                'wisataBanner',
                'profilVisi',
                'profilMisi',
                'profilSejarah',
                'dataPenduduk',
                'statistik',
                'chartStatistik',
                'galeri',
                'kategoriGaleri',
                'produk',
                'kategoriProduk'
            ));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            // Fallback jika terjadi error
            return view('home.index', [
                'banners' => collect(),
                'sambutan' => null,
                'strukturOrganisasi' => collect(),
                'beritaHighlight' => collect(),
                'produkUnggulan' => collect(),
                'galeriFeatured' => collect(),
                'statistikCards' => collect(),
                'wisataFeatured' => collect(),
                'wisataBanner' => collect(),
                'profilVisi' => null,
                'profilMisi' => null,
                'profilSejarah' => null,
                'dataPenduduk' => collect(),
                'statistik' => collect(),
                'chartStatistik' => collect(),
                'galeri' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriGaleri' => collect(),
                'produk' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriProduk' => collect()
            ]);
        }
    }

    public function berita(Request $request)
    {
        try {
            $query = Berita::aktif()
                ->terbaru()
                ->with('kategori');

            // Filter berdasarkan kategori
            if ($request->has('kategori') && $request->kategori != '') {
                $query->whereHas('kategori', function ($q) use ($request) {
                    $q->where('slug', $request->kategori);
                });
            }

            $berita = $query->paginate(12)->withQueryString();

            $kategoriBerita = KategoriBerita::aktif()->get();

            // Statistik untuk halaman berita
            $statistik = Statistik::aktif()->urutkan()->get();
            $chartStatistik = ChartStatistik::aktif()
                ->with(['dataChart' => function ($query) {
                    $query->aktif()->urutkan();
                }])
                ->get();

            // Galeri untuk halaman berita
            $galeri = Galeri::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriGaleri = KategoriGaleri::aktif()->get();

            // Produk untuk halaman berita
            $produk = ProdukDesa::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriProduk = KategoriProduk::aktif()->get();

            return view('home.berita', compact('berita', 'kategoriBerita', 'statistik', 'chartStatistik', 'galeri', 'kategoriGaleri', 'produk', 'kategoriProduk'));
        } catch (\Exception $e) {
            return view('home.berita', [
                'berita' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriBerita' => collect(),
                'statistik' => collect(),
                'chartStatistik' => collect(),
                'galeri' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriGaleri' => collect(),
                'produk' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriProduk' => collect()
            ]);
        }
    }

    public function beritaDetail(Berita $berita)
    {
        try {
            // Pastikan berita aktif
            if (!$berita->aktif) {
                abort(404);
            }

            // Berita terkait (berdasarkan kategori yang sama)
            $beritaTerkait = Berita::aktif()
                ->where('id', '!=', $berita->id)
                ->where('kategori_id', $berita->kategori_id)
                ->terbaru()
                ->with('kategori')
                ->limit(3)
                ->get();

            // Jika berita terkait kurang dari 3, tambahkan berita terbaru lainnya
            if ($beritaTerkait->count() < 3) {
                $beritaLainnya = Berita::aktif()
                    ->where('id', '!=', $berita->id)
                    ->whereNotIn('id', $beritaTerkait->pluck('id'))
                    ->terbaru()
                    ->with('kategori')
                    ->limit(3 - $beritaTerkait->count())
                    ->get();

                $beritaTerkait = $beritaTerkait->merge($beritaLainnya);
            }

            // Berita terbaru untuk sidebar
            $beritaTerbaru = Berita::aktif()
                ->where('id', '!=', $berita->id)
                ->terbaru()
                ->with('kategori')
                ->limit(5)
                ->get();

            // Kategori berita untuk sidebar
            $kategoriBerita = KategoriBerita::aktif()->get();

            return view('home.berita-detail', compact(
                'berita',
                'beritaTerkait',
                'beritaTerbaru',
                'kategoriBerita'
            ));
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function profilDesa()
    {
        try {
            $profilDesa = ProfilDesa::aktif()->urutkan()->get();
            $lokasiPeta = Peta::aktif()->get();

            // Statistik untuk halaman profil desa
            $statistik = Statistik::aktif()->urutkan()->get();
            $chartStatistik = ChartStatistik::aktif()
                ->with(['dataChart' => function ($query) {
                    $query->aktif()->urutkan();
                }])
                ->get();

            // Galeri untuk halaman profil desa
            $galeri = Galeri::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriGaleri = KategoriGaleri::aktif()->get();

            // Produk untuk halaman profil desa
            $produk = ProdukDesa::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriProduk = KategoriProduk::aktif()->get();

            return view('home.profil-desa', compact('profilDesa', 'lokasiPeta', 'statistik', 'chartStatistik', 'galeri', 'kategoriGaleri', 'produk', 'kategoriProduk'));
        } catch (\Exception $e) {
            return view('home.profil-desa', [
                'profilDesa' => collect(),
                'lokasiPeta' => collect(),
                'statistik' => collect(),
                'chartStatistik' => collect(),
                'galeri' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriGaleri' => collect(),
                'produk' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriProduk' => collect()
            ]);
        }
    }

    public function produk(Request $request)
    {
        try {
            $query = ProdukDesa::aktif()
                ->urutkan()
                ->with('kategori');

            // Filter berdasarkan kategori
            if ($request->has('kategori') && $request->kategori != '') {
                $query->whereHas('kategori', function ($q) use ($request) {
                    $q->where('slug', $request->kategori);
                });
            }

            $produk = $query->paginate(12)->withQueryString();

            $kategoriProduk = KategoriProduk::aktif()->get();

            // Statistik untuk halaman produk
            $statistik = Statistik::aktif()->urutkan()->get();
            $chartStatistik = ChartStatistik::aktif()
                ->with(['dataChart' => function ($query) {
                    $query->aktif()->urutkan();
                }])
                ->get();

            // Galeri untuk halaman produk
            $galeri = Galeri::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriGaleri = KategoriGaleri::aktif()->get();

            return view('home.produk', compact('produk', 'kategoriProduk', 'statistik', 'chartStatistik', 'galeri', 'kategoriGaleri'));
        } catch (\Exception $e) {
            return view('home.produk', [
                'produk' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriProduk' => collect(),
                'statistik' => collect(),
                'chartStatistik' => collect(),
                'galeri' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriGaleri' => collect()
            ]);
        }
    }

    public function galeri(Request $request)
    {
        try {
            $query = Galeri::aktif()
                ->urutkan()
                ->with('kategori');

            // Filter berdasarkan kategori
            if ($request->has('kategori') && $request->kategori != '') {
                $query->whereHas('kategori', function ($q) use ($request) {
                    $q->where('slug', $request->kategori);
                });
            }

            $galeri = $query->paginate(12)->withQueryString();

            $kategoriGaleri = KategoriGaleri::aktif()->get();

            // Statistik untuk halaman galeri
            $statistik = Statistik::aktif()->urutkan()->get();
            $chartStatistik = ChartStatistik::aktif()
                ->with(['dataChart' => function ($query) {
                    $query->aktif()->urutkan();
                }])
                ->get();

            return view('home.galeri', compact('galeri', 'kategoriGaleri', 'statistik', 'chartStatistik'));
        } catch (\Exception $e) {
            return view('home.galeri', [
                'galeri' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriGaleri' => collect(),
                'statistik' => collect(),
                'chartStatistik' => collect()
            ]);
        }
    }

    public function wisata()
    {
        try {
            // Ambil wisata utama (featured)
            $wisataUtama = WisataAlam::aktif()
                ->featured()
                ->first();

            // Ambil wisata lainnya
            $wisataLainnya = WisataAlam::aktif()
                ->where('id', '!=', $wisataUtama?->id)
                ->orderBy('urutan')
                ->paginate(12);

            return view('home.wisata', compact('wisataUtama', 'wisataLainnya'));
        } catch (\Exception $e) {
            return view('home.wisata', [
                'wisataUtama' => null,
                'wisataLainnya' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12)
            ]);
        }
    }

    public function wisataDetail($slug)
    {
        try {
            // Ambil wisata berdasarkan slug
            $wisata = WisataAlam::aktif()
                ->where('slug', $slug)
                ->first();

            if (!$wisata) {
                return view('home.wisata-detail', [
                    'wisata' => null,
                    'relatedWisata' => collect()
                ]);
            }

            // Ambil wisata terkait
            $relatedWisata = WisataAlam::aktif()
                ->where('id', '!=', $wisata->id)
                ->inRandomOrder()
                ->limit(6)
                ->get();

            return view('home.wisata-detail', compact('wisata', 'relatedWisata'));
        } catch (\Exception $e) {
            return view('home.wisata-detail', [
                'wisata' => null,
                'relatedWisata' => collect()
            ]);
        }
    }

    public function peta()
    {
        try {
            $lokasiPeta = Peta::aktif()->urutkan()->get();

            // mapping lokasi untuk JSON di blade
            $locations = $lokasiPeta->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->judul,
                    'coordinates' => [(float) $item->koordinat_lng, (float) $item->koordinat_lat],
                    'description' => $item->deskripsi,
                    'address' => $item->alamat,
                    'zoom_level' => (int) $item->zoom_level,
                    'additional_info' => $item->informasi_tambahan,
                    'image' => $item->gambar,
                    'color' => '#10B981', // default color
                ];
            })->toArray();

            // Statistik untuk halaman peta
            $statistik = Statistik::aktif()->urutkan()->get();
            $chartStatistik = ChartStatistik::aktif()
                ->with(['dataChart' => function ($query) {
                    $query->aktif()->urutkan();
                }])
                ->get();

            // Galeri untuk halaman peta
            $galeri = Galeri::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriGaleri = KategoriGaleri::aktif()->get();

            // Produk untuk halaman peta
            $produk = ProdukDesa::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriProduk = KategoriProduk::aktif()->get();

            return view('home.peta', compact(
                'lokasiPeta',
                'locations',
                'statistik',
                'chartStatistik',
                'galeri',
                'kategoriGaleri',
                'produk',
                'kategoriProduk'
            ));
        } catch (\Exception $e) {
            return view('home.peta', [
                'lokasiPeta' => collect(),
                'locations' => [],
                'statistik' => collect(),
                'chartStatistik' => collect(),
                'galeri' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriGaleri' => collect(),
                'produk' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriProduk' => collect()
            ]);
        }
    }


    public function statistik()
    {
        try {
            $statistik = Statistik::aktif()->urutkan()->get();
            $chartStatistik = ChartStatistik::aktif()
                ->with(['dataChart' => function ($query) {
                    $query->aktif()->urutkan();
                }])
                ->get();

            // Galeri untuk halaman statistik
            $galeri = Galeri::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriGaleri = KategoriGaleri::aktif()->get();

            // Produk untuk halaman statistik
            $produk = ProdukDesa::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriProduk = KategoriProduk::aktif()->get();

            return view('home.statistik', compact('statistik', 'chartStatistik', 'galeri', 'kategoriGaleri', 'produk', 'kategoriProduk'));
        } catch (\Exception $e) {
            return view('home.statistik', [
                'statistik' => collect(),
                'chartStatistik' => collect(),
                'galeri' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriGaleri' => collect(),
                'produk' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriProduk' => collect()
            ]);
        }
    }

    public function struktur()
    {
        try {
            $strukturOrganisasi = StrukturOrganisasi::aktif()->urutkan()->get();

            // Statistik untuk halaman struktur
            $statistik = Statistik::aktif()->urutkan()->get();
            $chartStatistik = ChartStatistik::aktif()
                ->with(['dataChart' => function ($query) {
                    $query->aktif()->urutkan();
                }])
                ->get();

            // Galeri untuk halaman struktur
            $galeri = Galeri::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriGaleri = KategoriGaleri::aktif()->get();

            // Produk untuk halaman struktur
            $produk = ProdukDesa::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriProduk = KategoriProduk::aktif()->get();

            return view('home.struktur', compact('strukturOrganisasi', 'statistik', 'chartStatistik', 'galeri', 'kategoriGaleri', 'produk', 'kategoriProduk'));
        } catch (\Exception $e) {
            return view('home.struktur', [
                'strukturOrganisasi' => collect(),
                'statistik' => collect(),
                'chartStatistik' => collect(),
                'galeri' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriGaleri' => collect(),
                'produk' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriProduk' => collect()
            ]);
        }
    }

    public function tataKerja()
    {
        try {
            $tataKerja = ProfilDesa::aktif()->jenis('tata-kerja')->first();

            // Statistik untuk halaman tata kerja
            $statistik = Statistik::aktif()->urutkan()->get();
            $chartStatistik = ChartStatistik::aktif()
                ->with(['dataChart' => function ($query) {
                    $query->aktif()->urutkan();
                }])
                ->get();

            // Galeri untuk halaman tata kerja
            $galeri = Galeri::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriGaleri = KategoriGaleri::aktif()->get();

            // Produk untuk halaman tata kerja
            $produk = ProdukDesa::aktif()
                ->urutkan()
                ->with('kategori')
                ->paginate(12);

            $kategoriProduk = KategoriProduk::aktif()->get();

            return view('home.tata-kerja', compact('tataKerja', 'statistik', 'chartStatistik', 'galeri', 'kategoriGaleri', 'produk', 'kategoriProduk'));
        } catch (\Exception $e) {
            return view('home.tata-kerja', [
                'tataKerja' => null,
                'statistik' => collect(),
                'chartStatistik' => collect(),
                'galeri' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriGaleri' => collect(),
                'produk' => new \Illuminate\Pagination\LengthAwarePaginator(collect(), 0, 12),
                'kategoriProduk' => collect()
            ]);
        }
    }

    public function produkDetail($slug)
    {
        try {
            // Ambil produk berdasarkan slug
            $produk = ProdukDesa::aktif()
                ->where('slug', $slug)
                ->with('kategori')
                ->first();

            if (!$produk) {
                return view('home.produk-detail', [
                    'produk' => null,
                    'relatedProducts' => collect()
                ]);
            }

            // Ambil produk terkait berdasarkan kategori yang sama
            $relatedProducts = ProdukDesa::aktif()
                ->where('id', '!=', $produk->id)
                ->where('kategori_id', $produk->kategori_id)
                ->with('kategori')
                ->limit(4)
                ->get();

            // Jika tidak ada produk terkait dengan kategori yang sama, ambil produk random
            if ($relatedProducts->count() == 0) {
                $relatedProducts = ProdukDesa::aktif()
                    ->where('id', '!=', $produk->id)
                    ->with('kategori')
                    ->inRandomOrder()
                    ->limit(4)
                    ->get();
            }

            return view('home.produk-detail', compact('produk', 'relatedProducts'));
        } catch (\Exception $e) {
            return view('home.produk-detail', [
                'produk' => null,
                'relatedProducts' => collect()
            ]);
        }
    }

    public function galeriDetail($slug)
    {
        try {
            // Ambil galeri berdasarkan slug
            $galeri = Galeri::aktif()
                ->where('slug', $slug)
                ->with(['kategori', 'galeriLikes'])
                ->first();

            if (!$galeri) {
                return view('home.galeri-detail', [
                    'galeri' => null,
                    'relatedGaleri' => collect(),
                    'hasLiked' => false
                ]);
            }

            // Cek apakah user sudah like galeri ini berdasarkan IP
            $userIp = request()->ip();
            $hasLiked = GaleriLike::where('galeri_id', $galeri->id)
                ->where('ip_address', $userIp)
                ->exists();

            // Ambil galeri terkait berdasarkan kategori yang sama
            $relatedGaleri = Galeri::aktif()
                ->where('id', '!=', $galeri->id)
                ->where('kategori_id', $galeri->kategori_id)
                ->with('kategori')
                ->limit(6)
                ->get();

            // Jika tidak ada galeri terkait dengan kategori yang sama, ambil galeri random
            if ($relatedGaleri->count() == 0) {
                $relatedGaleri = Galeri::aktif()
                    ->where('id', '!=', $galeri->id)
                    ->with('kategori')
                    ->inRandomOrder()
                    ->limit(6)
                    ->get();
            }

            return view('home.galeri-detail', compact('galeri', 'relatedGaleri', 'hasLiked'));
        } catch (\Exception $e) {
            return view('home.galeri-detail', [
                'galeri' => null,
                'relatedGaleri' => collect(),
                'hasLiked' => false
            ]);
        }
    }

    public function galeriLike($slug)
    {
        try {
            // Ambil galeri berdasarkan slug
            $galeri = Galeri::aktif()
                ->where('slug', $slug)
                ->first();

            if (!$galeri) {
                return response()->json([
                    'success' => false,
                    'message' => 'Galeri tidak ditemukan'
                ], 404);
            }

            $userIp = request()->ip();
            $userAgent = request()->userAgent();

            // Cek apakah user sudah like galeri ini
            $existingLike = GaleriLike::where('galeri_id', $galeri->id)
                ->where('ip_address', $userIp)
                ->first();

            if ($existingLike) {
                // User sudah like, unlike
                $existingLike->delete();
                $message = 'Like berhasil dihapus';
                $liked = false;
            } else {
                // User belum like, tambahkan like
                GaleriLike::create([
                    'galeri_id' => $galeri->id,
                    'ip_address' => $userIp,
                    'user_agent' => $userAgent
                ]);
                $message = 'Berhasil menyukai galeri';
                $liked = true;
            }

            // Ambil total likes terbaru
            $totalLikes = $galeri->galeriLikes()->count();

            return response()->json([
                'success' => true,
                'message' => $message,
                'liked' => $liked,
                'total_likes' => $totalLikes
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem'
            ], 500);
        }
    }
}

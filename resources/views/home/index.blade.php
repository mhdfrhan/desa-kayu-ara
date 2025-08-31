@php use Illuminate\Support\Str; @endphp

<x-main-layout>
    <x-slot name="title">Beranda</x-slot>

    @push('styles')
        <link href="{{ asset('css/splide.min.css') }}" rel="stylesheet">
        <style>
            /* Custom Splide Styles */
            .splide__pagination {
                bottom: 2rem;
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                z-index: 30;
            }

            .splide__pagination__page {
                width: 12px;
                height: 12px;
                background: rgba(255, 255, 255, 0.4);
                border: 2px solid rgba(255, 255, 255, 0.6);
                border-radius: 50%;
                margin: 0 6px;
                transition: all 0.3s ease;
                cursor: pointer;
            }

            .splide__pagination__page.is-active {
                background: #16a34a;
                border-color: #16a34a;
                transform: scale(1.2);
            }

            .splide__pagination__page:hover {
                background: rgba(255, 255, 255, 0.8);
                border-color: rgba(255, 255, 255, 0.8);
            }

            /* Fade transition enhancement */
            .splide--fade .splide__slide {
                opacity: 0;
                transition: opacity 0.8s ease;
            }

            .splide--fade .splide__slide.is-active {
                opacity: 1;
            }

            /* Team Slider Custom Styles */
            .team-slider .splide__track {
                overflow: visible;
            }

            .team-slider .splide__slide {
                opacity: 1;
                transform: scale(1);
                transition: all 0.4s ease;
            }

            .team-slider .splide__slide.is-active {
                opacity: 1;
                transform: scale(1);
            }

            .team-slider .splide__slide.is-prev,
            .team-slider .splide__slide.is-next {
                opacity: 1;
                transform: scale(1);
            }


            .team-slider .splide__track {
                overflow: visible;
            }

            .team-slider .splide__list {
                display: flex;
                gap: 2rem;
            }

            .team-slider .splide__slide {
                flex-shrink: 0;
                opacity: 1 !important;
                transform: scale(1) !important;
                visibility: visible !important;
            }

            /* Ensure all slides are visible */
            .team-slider .splide__slide.is-active,
            .team-slider .splide__slide.is-prev,
            .team-slider .splide__slide.is-next {
                opacity: 1 !important;
                transform: scale(1) !important;
                visibility: visible !important;
            }

            /* Force all slides to be visible */
            .team-slider .splide__slide {
                display: block !important;
            }

            /* Custom Navigation Arrows */
            .team-slider .splide__arrow {
                background: white;
                border: 2px solid #e5e7eb;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                width: 48px;
                height: 48px;
                opacity: 1;
                transition: all 0.3s ease;
            }

            .team-slider .splide__arrow:hover {
                background: #10b981;
                border-color: #10b981;
                transform: scale(1.1);
            }

            .team-slider .splide__arrow svg {
                fill: #6b7280;
                width: 20px;
                height: 20px;
                transition: fill 0.3s ease;
            }

            .team-slider .splide__arrow:hover svg {
                fill: white;
            }

            .team-slider .splide__arrow--prev {
                left: -24px;
            }

            .team-slider .splide__arrow--next {
                right: -24px;
            }

            /* Custom Pagination */
            .team-slider .splide__pagination {
                bottom: -40px;
            }

            .team-slider .splide__pagination__page {
                background: #d1d5db;
                border: none;
                border-radius: 50%;
                width: 12px;
                height: 12px;
                margin: 0 4px;
                transition: all 0.3s ease;
            }

            .team-slider .splide__pagination__page.is-active {
                background: #10b981;
                transform: scale(1.2);
            }

            .team-slider .splide__pagination__page:hover {
                background: #10b981;
                transform: scale(1.1);
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .team-slider .splide__arrow {
                    width: 40px;
                    height: 40px;
                }

                .team-slider .splide__arrow svg {
                    width: 16px;
                    height: 16px;
                }

                .team-slider .splide__arrow--prev {
                    left: -20px;
                }

                .team-slider .splide__arrow--next {
                    right: -20px;
                }
            }
        </style>
    @endpush

    <!-- Hero Banner Section -->
    <section class="relative -mt-16 pt-16">
        @if ($banners->count() > 0)
            <div class="splide" id="hero-banner" aria-label="Banner Utama">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($banners as $banner)
                            <li class="splide__slide">
                                <div class="relative h-[500px] md:h-[600px] lg:h-screen overflow-hidden">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-transparent z-10">
                                    </div>

                                    @if ($banner->gambar)
                                        <img src="{{ asset($banner->gambar) }}" alt="{{ $banner->judul }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-green-600 to-green-800"></div>
                                    @endif

                                    <div class="absolute inset-0 z-20 flex items-center">
                                        <x-container>
                                            <div class="max-w-2xl">
                                                <h1
                                                    class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight">
                                                    {!! nl2br(e($banner->judul)) !!}
                                                </h1>
                                                <p class="text-lg md:text-xl text-white/90 mb-8 leading-relaxed">
                                                    {{ $banner->deskripsi }}
                                                </p>
                                                <div class="flex flex-col sm:flex-row gap-4">
                                                    @if ($banner->tombol_teks && $banner->tombol_link)
                                                        <a href="{{ $banner->tombol_link }}">
                                                            <x-primary-button>
                                                                {{ $banner->tombol_teks }}
                                                            </x-primary-button>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </x-container>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Pagination -->
                <div class="splide__pagination"></div>
            </div>
        @else
            <!-- Fallback Banner jika tidak ada data -->
            <div class="relative h-[500px] md:h-[600px] lg:h-screen overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-transparent z-10"></div>
                <div class="w-full h-full bg-gradient-to-br from-green-600 to-green-800"></div>
                <div class="absolute inset-0 z-20 flex items-center">
                    <x-container>
                        <div class="max-w-2xl">
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight">
                                Selamat Datang di
                                <span class="text-green-400">Desa Sungai Kayu Ara</span>
                            </h1>
                            <p class="text-lg md:text-xl text-white/90 mb-8 leading-relaxed">
                                Desa yang kaya akan budaya, alam yang indah, dan masyarakat yang ramah.
                                Temukan keindahan alam dan keramahan warga desa kami.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="#tentang">
                                    <x-primary-button>
                                        Jelajahi Desa
                                    </x-primary-button>
                                </a>
                                <a href="#galeri">
                                    <x-outline-button>
                                        Lihat Galeri
                                    </x-outline-button>
                                </a>
                            </div>
                        </div>
                    </x-container>
                </div>
            </div>
        @endif

        <div class="absolute left-0 top-0 right-0 h-1/3 bg-gradient-to-b from-neutral-900/90 to-transparent z-10"></div>
    </section>

    {{-- sambutan kepala desa --}}
    @if ($sambutan)
        <section class="py-20 bg-gradient-to-br from-neutral-50 to-green-50/30">
            <x-container>
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Foto dan Info Kepala Desa -->
                    <div class="relative">
                        <!-- Background Decoration -->
                        <div class="absolute -top-6 -left-6 w-24 h-24 bg-green-600/10 rounded-full blur-xl"></div>
                        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-green-500/10 rounded-full blur-xl"></div>

                        <!-- Foto Kepala Desa -->
                        <div class="relative">
                            <div class="relative lg:w-1/2 mx-auto">
                                <!-- Background Pattern -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-yellow-600 to-yellow-700 rounded-3xl transform rotate-3 scale-105 opacity-20">
                                </div>

                                <!-- Main Photo -->
                                <div class="relative w-full h-full rounded-3xl overflow-hidden shadow-2xl">
                                    @if ($sambutan->foto)
                                        <img src="{{ asset($sambutan->foto) }}"
                                            alt="{{ $sambutan->nama ?? 'Kepala Desa Sungai Kayu Ara' }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                            <i class="fas fa-user text-white text-4xl"></i>
                                        </div>
                                    @endif

                                    <!-- Overlay Gradient -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                    </div>

                                    <!-- Info Badge -->
                                    <div class="absolute bottom-4 left-4 right-4">
                                        <div class="bg-white/95 backdrop-blur-sm rounded-2xl p-4 shadow-lg">
                                            <h3 class="font-bold text-lg text-neutral-800">
                                                {{ $sambutan->nama ?? 'Kepala Desa' }}</h3>
                                            <p class="text-sm text-neutral-600">
                                                {{ $sambutan->jabatan ?? 'Kepala Desa Sungai Kayu Ara' }}</p>
                                            @if ($sambutan->periode)
                                                <p class="text-xs text-neutral-500 mt-1">Periode
                                                    {{ $sambutan->periode }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sambutan -->
                    <div class="space-y-8">
                        <!-- Header -->
                        <div class="space-y-4">
                            <div
                                class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-medium">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Sambutan Kepala Desa
                            </div>

                            <h2 class="text-xl  font-bold text-neutral-800 leading-tight">
                                {!! nl2br(e($sambutan->sambutan)) !!}
                            </h2>
                        </div>

                        @if ($sambutan->quote)
                            <!-- Quote -->
                            <div class="relative">
                                <div
                                    class="absolute -left-4 top-0 bottom-0 w-1 bg-gradient-to-b from-yellow-600 to-yellow-400 rounded-full">
                                </div>
                                <blockquote class="pl-8 text-xl text-neutral-700 italic leading-relaxed">
                                    "{{ $sambutan->quote }}"
                                </blockquote>
                            </div>
                        @endif

                        @if ($sambutan->konten_lengkap)
                            <!-- Content -->
                            <div class="space-y-4 text-neutral-600 leading-relaxed">
                                {!! nl2br(e($sambutan->konten_lengkap)) !!}
                            </div>
                        @endif

                        <!-- CTA -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-6">
                            <a href="{{ route('profil-desa') }}">
                                <x-primary-button>
                                    Lihat Profil Lengkap
                                </x-primary-button>
                            </a>
                            <a href="{{ route('peta') }}">
                                <x-outline-button color="yellow">
                                    Lokasi Desa
                                </x-outline-button>
                            </a>
                        </div>
                    </div>
                </div>
            </x-container>
        </section>
    @endif

    {{-- jelajahi desa --}}
    <section class="py-20 bg-white">
        <x-container>
            <!-- Header Section -->
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-medium mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Jelajahi Desa
                </div>

                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Temukan Keindahan
                    <span class="text-green-600">Desa Kami</span>
                </h2>

                <p class="text-lg text-neutral-600 max-w-3xl mx-auto leading-relaxed">
                    Jelajahi berbagai aspek menarik dari Desa Sungai Kayu Ara. Dari data statistik yang akurat hingga
                    galeri foto yang menakjubkan, temukan semua informasi yang Anda butuhkan.
                </p>
            </div>

            <!-- Cards Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Statistik Card -->
                <div class="group relative">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-green-800 to-green-900 p-8 text-white shadow-xl transition-all duration-300 hover:shadow-2xl hover:scale-105">
                        <!-- Background Pattern -->
                        <div class="absolute inset-0 bg-gradient-to-br from-green-400/20 to-green-600/20"></div>
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>

                        <!-- Icon -->
                        <div class="relative z-10 mb-6">
                            <div
                                class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                <i class="fa-solid fa-chart-simple text-2xl"></i>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold mb-2">Statistik Desa</h3>
                            <p class="text-green-100 mb-6 leading-relaxed">
                                Lihat data statistik terkini tentang penduduk, ekonomi, dan perkembangan desa kami.
                            </p>

                            <!-- Stats Preview -->
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="text-center">
                                    <div class="text-2xl font-bold">
                                        {{ $statistikCards->count() > 0 ? $statistikCards->first()->nilai : '0' }}
                                    </div>
                                    <div class="text-xs text-green-100">
                                        {{ $statistikCards->count() > 0 ? $statistikCards->first()->label : 'Data' }}
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold">
                                        {{ $statistikCards->count() > 1 ? $statistikCards->get(1)->nilai : '0' }}</div>
                                    <div class="text-xs text-green-100">
                                        {{ $statistikCards->count() > 1 ? $statistikCards->get(1)->label : 'Data' }}
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('statistik') }}"
                                class="inline-flex items-center gap-2 text-green-100 hover:text-white font-semibold transition-colors duration-300">
                                Lihat Statistik
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Galeri Card -->
                <div class="group relative">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-green-800 to-green-900 p-8 text-white shadow-xl transition-all duration-300 hover:shadow-2xl hover:scale-105">
                        <!-- Background Pattern -->
                        <div class="absolute inset-0 bg-gradient-to-br from-green-500/20 to-green-700/20"></div>
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>

                        <!-- Icon -->
                        <div class="relative z-10 mb-6">
                            <div
                                class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                <i class="fa-solid fa-images text-2xl"></i>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold mb-2">Galeri Foto</h3>
                            <p class="text-green-100 mb-6 leading-relaxed">
                                Jelajahi keindahan alam dan aktivitas warga desa melalui koleksi foto yang menakjubkan.
                            </p>

                            <!-- Gallery Preview -->
                            <div class="grid grid-cols-3 gap-2 mb-6">
                                @if ($galeriFeatured->count() > 0)
                                    @foreach ($galeriFeatured->take(3) as $galeri)
                                        <div class="w-full h-12 bg-white/20 rounded-lg overflow-hidden">
                                            @if ($galeri->gambar)
                                                <img src="{{ asset($galeri->gambar) }}" alt="{{ $galeri->judul }}"
                                                    class="w-full h-full object-cover">
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    <div class="w-full h-12 bg-white/20 rounded-lg"></div>
                                    <div class="w-full h-12 bg-white/20 rounded-lg"></div>
                                    <div class="w-full h-12 bg-white/20 rounded-lg"></div>
                                @endif
                            </div>

                            <a href="{{ route('galeri') }}"
                                class="inline-flex items-center gap-2 text-green-100 hover:text-white font-semibold transition-colors duration-300">
                                Lihat Galeri
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Berita Card -->
                <div class="group relative">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-green-800 to-green-900 p-8 text-white shadow-xl transition-all duration-300 hover:shadow-2xl hover:scale-105">
                        <!-- Background Pattern -->
                        <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 to-green-800/20"></div>
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>

                        <!-- Icon -->
                        <div class="relative z-10 mb-6">
                            <div
                                class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                <i class="fa-solid fa-newspaper text-2xl"></i>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold mb-2">Berita Desa</h3>
                            <p class="text-green-100 mb-6 leading-relaxed">
                                Dapatkan informasi terbaru tentang kegiatan, program, dan perkembangan desa kami.
                            </p>

                            <!-- News Preview -->
                            <div class="space-y-3 mb-6">
                                @if ($beritaHighlight->count() > 0)
                                    @foreach ($beritaHighlight->take(2) as $berita)
                                        <div class="flex items-center gap-3">
                                            <div class="w-2 h-2 bg-white/60 rounded-full"></div>
                                            <span
                                                class="text-sm text-green-100">{{ Str::limit($berita->judul, 25) }}</span>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex items-center gap-3">
                                        <div class="w-2 h-2 bg-white/60 rounded-full"></div>
                                        <span class="text-sm text-green-100">Belum ada berita</span>
                                    </div>
                                @endif
                            </div>

                            <a href="{{ route('berita') }}"
                                class="inline-flex items-center gap-2 text-green-100 hover:text-white font-semibold transition-colors duration-300">
                                Baca Berita
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Produk Card -->
                <div class="group relative">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-green-800 to-green-900 p-8 text-white shadow-xl transition-all duration-300 hover:shadow-2xl hover:scale-105">
                        <!-- Background Pattern -->
                        <div class="absolute inset-0 bg-gradient-to-br from-green-700/20 to-green-900/20"></div>
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>

                        <!-- Icon -->
                        <div class="relative z-10 mb-6">
                            <div
                                class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                <i class="fa-solid fa-boxes-stacked text-2xl"></i>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold mb-2">Produk Desa</h3>
                            <p class="text-green-100 mb-6 leading-relaxed">
                                Temukan produk unggulan desa kami yang berkualitas tinggi dan hasil karya warga.
                            </p>

                            <!-- Products Preview -->
                            <div class="grid grid-cols-2 gap-3 mb-6">
                                @if ($produkUnggulan->count() > 0)
                                    @foreach ($produkUnggulan->take(2) as $produk)
                                        <div class="text-center">
                                            <div class="w-8 h-8 bg-white/20 rounded-lg mx-auto mb-1 overflow-hidden">
                                                @if ($produk->gambar)
                                                    <img src="{{ asset($produk->gambar) }}"
                                                        alt="{{ $produk->nama }}" class="w-full h-full object-cover">
                                                @endif
                                            </div>
                                            <div class="text-xs text-green-100">{{ Str::limit($produk->nama, 8) }}
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center">
                                        <div class="w-8 h-8 bg-white/20 rounded-lg mx-auto mb-1"></div>
                                        <div class="text-xs text-green-100">Belum ada</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="w-8 h-8 bg-white/20 rounded-lg mx-auto mb-1"></div>
                                        <div class="text-xs text-green-100">produk</div>
                                    </div>
                                @endif
                            </div>

                            <a href="{{ route('produk') }}"
                                class="inline-flex items-center gap-2 text-green-100 hover:text-white font-semibold transition-colors duration-300">
                                Lihat Produk
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </section>

    <!-- Struktur Organisasi dan Tata Kerja Desa Section -->
    <section class="py-20 bg-gradient-to-br from-neutral-50 to-green-50/30 overflow-hidden">
        <x-container>
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-neutral-800 mb-4">
                    Struktur Organisasi &
                    <span class="text-green-600">Tata Kerja Desa</span>
                </h2>
                <p class="text-lg text-neutral-600 max-w-3xl mx-auto leading-relaxed">
                    Kenali tim organisasi desa yang transparan dan profesional dalam melayani masyarakat dengan tata
                    kerja yang terstruktur dan efisien.
                </p>
            </div>

            <!-- Team Cards -->
            <div class="mb-16">
                @if ($strukturOrganisasi->count() > 0)
                    @if ($strukturOrganisasi->count() <= 3)
                        <!-- Grid layout for 3 or fewer items -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($strukturOrganisasi as $struktur)
                                <div class="group relative">
                                    <div
                                        class="relative overflow-hidden rounded-2xl bg-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105">
                                        <!-- Background Image -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-green-600 to-green-700">
                                            @if ($struktur->foto)
                                                <img src="{{ asset($struktur->foto) }}" alt="{{ $struktur->nama }}"
                                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                            @else
                                                <div
                                                    class="w-full h-full bg-gradient-to-br from-green-600 to-green-700 flex items-center justify-center">
                                                    <i class="fas fa-user text-white text-4xl"></i>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Gradient Overlay -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent">
                                        </div>

                                        <!-- Position Badge -->
                                        <div class="absolute top-4 right-4 z-10">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/20 backdrop-blur-sm text-white border border-white/30">
                                                {{ $struktur->jabatan }}
                                            </span>
                                        </div>

                                        <!-- Content -->
                                        <div class="absolute bottom-0 left-0 right-0 p-6 z-10">
                                            <h3 class="text-2xl font-bold text-white mb-1">
                                                {{ $struktur->nama }}
                                            </h3>
                                            @if ($struktur->periode)
                                                <p class="text-green-200 text-sm font-medium">
                                                    Periode {{ $struktur->periode }}
                                                </p>
                                            @endif
                                            @if ($struktur->deskripsi)
                                                <div class="flex items-center gap-2 mt-3">
                                                    <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                                    <span
                                                        class="text-green-200 text-sm">{{ Str::limit($struktur->deskripsi, 30) }}</span>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Hover Overlay -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-green-600/90 via-green-600/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Slider for more than 3 items -->
                        <div class="splide team-slider" role="group" aria-label="Tim Organisasi Desa">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($strukturOrganisasi as $struktur)
                                        <li class="splide__slide">
                                            <div class="group relative">
                                                <div
                                                    class="relative overflow-hidden rounded-2xl bg-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105 h-96">
                                                    <!-- Background Image -->
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-br from-green-600 to-green-700">
                                                        @if ($struktur->foto)
                                                            <img src="{{ asset($struktur->foto) }}"
                                                                alt="{{ $struktur->nama }}"
                                                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                                        @else
                                                            <div
                                                                class="w-full h-full bg-gradient-to-br from-green-600 to-green-700 flex items-center justify-center">
                                                                <i class="fas fa-user text-white text-4xl"></i>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <!-- Gradient Overlay -->
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent">
                                                    </div>

                                                    <!-- Position Badge -->
                                                    <div class="absolute top-4 right-4 z-10">
                                                        <span
                                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/20 backdrop-blur-sm text-white border border-white/30">
                                                            {{ $struktur->jabatan }}
                                                        </span>
                                                    </div>

                                                    <!-- Content -->
                                                    <div class="absolute bottom-0 left-0 right-0 p-6 z-10">
                                                        <h3 class="text-2xl font-bold text-white mb-1">
                                                            {{ $struktur->nama }}
                                                        </h3>
                                                        @if ($struktur->periode)
                                                            <p class="text-green-200 text-sm font-medium">
                                                                Periode {{ $struktur->periode }}
                                                            </p>
                                                        @endif
                                                        @if ($struktur->deskripsi)
                                                            <div class="flex items-center gap-2 mt-3">
                                                                <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                                                <span
                                                                    class="text-green-200 text-sm">{{ Str::limit($struktur->deskripsi, 30) }}</span>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <!-- Hover Overlay -->
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-green-600/90 via-green-600/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @else
                    <!-- Fallback jika tidak ada data -->
                    <div class="text-center">
                        <div class="relative overflow-hidden rounded-2xl bg-white shadow-lg h-96 max-w-md mx-auto">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-green-600 to-green-700 flex items-center justify-center">
                                <div class="text-center text-white">
                                    <i class="fas fa-users text-6xl mb-4"></i>
                                    <p class="text-lg">Belum ada data struktur organisasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </x-container>
    </section>

    <!-- Administrasi Penduduk & APB Desa Section -->
    <section class="py-20 bg-white">
        <x-container>
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-neutral-800 mb-4">
                    Administrasi Penduduk
                </h2>
                <p class="text-lg text-neutral-600 max-w-3xl mx-auto leading-relaxed">
                    Data terkini administrasi penduduk dan Anggaran Pendapatan Belanja Desa tahun 2024 untuk
                    transparansi dan akuntabilitas.
                </p>
            </div>

            <!-- Data Penduduk Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <!-- Total Penduduk -->
                <div class="group relative">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-green-500 to-green-600 p-8 text-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-400/20 to-green-600/20"></div>
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>

                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <div
                                    class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="text-right">
                                    <div class="text-3xl font-bold">
                                        {{ $dataPenduduk->where('jenis', 'total_penduduk')->first()->nilai ?? '0' }}
                                    </div>
                                    <div class="text-green-100 text-sm">Jiwa</div>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold mb-2">Total Penduduk</h3>
                            <p class="text-green-100 text-sm">Jumlah penduduk terdaftar di Desa Sungai Kayu Ara</p>
                        </div>
                    </div>
                </div>

                <!-- Kepala Keluarga -->
                <div class="group relative">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-yellow-500 to-yellow-600 p-8 text-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/20 to-yellow-600/20"></div>
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>

                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <div
                                    class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                </div>
                                <div class="text-right">
                                    <div class="text-3xl font-bold">
                                        {{ $dataPenduduk->where('jenis', 'kepala_keluarga')->first()->nilai ?? '0' }}
                                    </div>
                                    <div class="text-yellow-100 text-sm">KK</div>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold mb-2">Kepala Keluarga</h3>
                            <p class="text-yellow-100 text-sm">Jumlah kepala keluarga terdaftar</p>
                        </div>
                    </div>
                </div>

                <!-- Penduduk Sementara -->
                <div class="group relative">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-red-500 to-red-600 p-8 text-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-400/20 to-red-600/20"></div>
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>

                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <div
                                    class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="text-right">
                                    <div class="text-3xl font-bold">
                                        {{ $dataPenduduk->where('jenis', 'penduduk_sementara')->first()->nilai ?? '0' }}
                                    </div>
                                    <div class="text-red-100 text-sm">Jiwa</div>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold mb-2">Penduduk Sementara</h3>
                            <p class="text-red-100 text-sm">Penduduk yang belum memiliki KTP</p>
                        </div>
                    </div>
                </div>

                <!-- Laki-Laki -->
                <div class="group relative">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-green-500 to-green-600 p-8 text-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-500/20 to-green-700/20"></div>
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>

                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <div
                                    class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="text-right">
                                    <div class="text-3xl font-bold">
                                        {{ $dataPenduduk->where('jenis', 'laki_laki')->first()->nilai ?? '0' }}</div>
                                    <div class="text-green-100 text-sm">Jiwa</div>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold mb-2">Laki-Laki</h3>
                            <p class="text-green-100 text-sm">Jumlah penduduk laki-laki</p>
                        </div>
                    </div>
                </div>

                <!-- Perempuan -->
                <div class="group relative">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-yellow-500 to-yellow-600 p-8 text-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/20 to-yellow-700/20"></div>
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>

                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <div
                                    class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="text-right">
                                    <div class="text-3xl font-bold">
                                        {{ $dataPenduduk->where('jenis', 'perempuan')->first()->nilai ?? '0' }}</div>
                                    <div class="text-yellow-100 text-sm">Jiwa</div>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold mb-2">Perempuan</h3>
                            <p class="text-yellow-100 text-sm">Jumlah penduduk perempuan</p>
                        </div>
                    </div>
                </div>

                <!-- Mutasi Penduduk -->
                <div class="group relative">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-red-500 to-red-600 p-8 text-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-500/20 to-red-700/20"></div>
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>

                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <div
                                    class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </div>
                                <div class="text-right">
                                    <div class="text-3xl font-bold">
                                        {{ $dataPenduduk->where('jenis', 'mutasi_penduduk')->first()->nilai ?? '0' }}
                                    </div>
                                    <div class="text-red-100 text-sm">Tahun 2024</div>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold mb-2">Mutasi Penduduk</h3>
                            <p class="text-red-100 text-sm">Pertumbuhan penduduk tahun ini</p>
                        </div>
                    </div>
                </div>
            </div>


        </x-container>
    </section>

    <!-- Highlight Berita Section -->
    <section class="py-20 bg-gradient-to-br from-green-50 via-white to-green-50/30">
        <x-container>
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-newspaper"></i>
                    Berita Terkini
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Highlight <span class="text-green-500">Berita</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Dapatkan informasi terbaru seputar kegiatan, perkembangan, dan berita menarik dari Desa Sungai Kayu
                    Ara.
                </p>
            </div>

            @if ($beritaHighlight->count() > 0)
                <!-- Featured News Card -->
                <div class="mb-16">
                    @foreach ($beritaHighlight->take(1) as $berita)
                        <div
                            class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                            <div class="grid lg:grid-cols-2 gap-0">
                                <div class="relative overflow-hidden">
                                    @if ($berita->gambar)
                                        <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                            <i class="fas fa-newspaper text-white text-4xl"></i>
                                        </div>
                                    @endif
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                    </div>
                                    @if ($berita->featured)
                                        <div class="absolute top-6 left-6">
                                            <span
                                                class="bg-green-500 text-white px-4 py-2 rounded-2xl text-sm font-bold">FEATURED</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-8 lg:p-12 flex flex-col justify-center">
                                    <div class="flex items-center gap-4 mb-4">
                                        @if ($berita->kategori)
                                            <span
                                                class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">{{ $berita->kategori->nama }}</span>
                                        @endif
                                        <div class="flex items-center gap-2 text-neutral-400 text-sm">
                                            <i class="fa-solid fa-calendar"></i>
                                            <span>{{ $berita->created_at->format('d F Y') }}</span>
                                        </div>
                                    </div>
                                    <h3
                                        class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4 group-hover:text-green-500 transition-colors duration-300">
                                        {{ $berita->judul }}
                                    </h3>
                                    <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                        {{ Str::limit(strip_tags($berita->konten), 200) }}
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-neutral-800">Admin Desa</p>
                                                <p class="text-sm text-neutral-500">Tim Redaksi</p>
                                            </div>
                                        </div>
                                        <a href="{{ route('berita.show', $berita->slug) }}">
                                            <x-primary-button>
                                                Baca Selengkapnya
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </x-primary-button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Fallback jika tidak ada berita -->
                <div class="mb-16">
                    <div
                        class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                        <div class="grid lg:grid-cols-2 gap-0">
                            <div class="relative overflow-hidden">
                                <div
                                    class="w-full h-full bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                    <i class="fas fa-newspaper text-white text-6xl"></i>
                                </div>
                            </div>
                            <div class="p-8 lg:p-12 flex flex-col justify-center">
                                <h3 class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4">
                                    Belum ada berita tersedia
                                </h3>
                                <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                    Berita terbaru akan segera ditampilkan di sini.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- News Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @if ($beritaHighlight->count() > 1)
                    @foreach ($beritaHighlight->skip(1)->take(6) as $berita)
                        <article
                            class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                            <div class="relative overflow-hidden">
                                @if ($berita->gambar)
                                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}"
                                        class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-48 bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-white text-4xl"></i>
                                    </div>
                                @endif
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent">
                                </div>
                                @if ($berita->kategori)
                                    <div class="absolute top-4 left-4">
                                        <span
                                            class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-medium">{{ $berita->kategori->nama }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-2 text-neutral-400 text-sm mb-3">
                                    <i class="fa-solid fa-calendar"></i>
                                    <span>{{ $berita->created_at->format('d F Y') }}</span>
                                </div>
                                <h3
                                    class="text-xl font-bold text-neutral-800 mb-3 group-hover:text-green-500 transition-colors duration-300 line-clamp-2">
                                    {{ $berita->judul }}
                                </h3>
                                <p class="text-neutral-500 mb-4 leading-relaxed line-clamp-3">
                                    {{ Str::limit(strip_tags($berita->konten), 150) }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                                            <i class="fas fa-user text-white text-xs"></i>
                                        </div>
                                        <span class="text-sm font-medium text-neutral-700">Admin Desa</span>
                                    </div>
                                    <a href="{{ route('berita.show', $berita->slug) }}"
                                        class="inline-flex items-center gap-2 text-green-500 font-semibold transition-colors duration-300 hover:text-green-600">
                                        Baca
                                        <i class="fa-solid fa-arrow-right text-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @else
                    <!-- Fallback jika tidak ada berita tambahan -->
                    <div class="col-span-full">
                        <div class="text-center py-12">
                            <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-600 mb-2">Belum ada berita lainnya</h3>
                            <p class="text-gray-500">Berita terbaru akan segera ditampilkan di sini.</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- View All News Button -->
            <div class="text-center">
                <a href="{{ route('berita') }}">
                    <x-primary-button>
                        <i class="fa-solid fa-newspaper"></i>
                        Lihat Semua Berita
                    </x-primary-button>
                </a>
            </div>
        </x-container>
    </section>

    <!-- Wisata Desa Banner Section -->
    <section class="relative py-20 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1626014405949-cd273e5048b2?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Wisata Desa" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 h-full min-h-[600px] flex items-center">
            <x-container>
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Left Content -->
                    <div class="text-white space-y-8">
                        <div
                            class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium">
                            <i class="fa-solid fa-mountain"></i>
                            Destinasi Wisata
                        </div>

                        <div class="space-y-6">
                            <h2 class="text-4xl lg:text-6xl font-bold leading-tight">
                                Wisata <span class="text-green-400">Alam</span>
                            </h2>
                            <p class="text-xl lg:text-2xl text-white/90 leading-relaxed max-w-2xl">
                                Jelajahi keindahan alam dan destinasi wisata yang menakjubkan di Desa Sungai Kayu Ara.
                                Dari hutan mangrove yang rindang hingga spot memancing yang tenang.
                            </p>
                        </div>

                    </div>

                    <!-- Right Content - Hidden on mobile, shown on desktop -->
                    <div class="hidden lg:block">
                        <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20">
                            <h3 class="text-2xl font-bold text-white mb-4">Destinasi Unggulan</h3>
                            <div class="space-y-4">
                                @if ($wisataBanner->count() > 0)
                                    @foreach ($wisataBanner->take(3) as $wisata)
                                        <div class="flex items-center gap-4 p-4 bg-white/10 rounded-2xl">
                                            <div
                                                class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center shrink-0">
                                                <i class="fa-solid fa-mountain text-white text-lg"></i>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-white">{{ $wisata->nama }}</h4>
                                                <p class="text-sm text-white/80">
                                                    {{ Str::limit($wisata->deskripsi, 100) }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <!-- Fallback jika tidak ada data wisata -->
                                    <div class="flex items-center gap-4 p-4 bg-white/10 rounded-2xl">
                                        <div
                                            class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center shrink-0">
                                            <i class="fa-solid fa-mountain text-white text-lg"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-white">Destinasi Wisata</h4>
                                            <p class="text-sm text-white/80">Informasi destinasi wisata akan segera
                                                ditampilkan.</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </x-container>
        </div>
    </section>

    <!-- Highlight Produk Desa Section -->
    <section class="py-20 bg-gradient-to-br from-red-50 via-white to-red-50/30">
        <x-container>
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 bg-red-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    Produk Unggulan
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Highlight <span class="text-red-500">Produk Desa</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Temukan berbagai produk unggulan desa kami yang berkualitas tinggi, dari hasil pertanian hingga
                    kerajinan tangan warga.
                </p>
            </div>

            @if ($produkUnggulan->count() > 0)
                <!-- Featured Product Hero -->
                <div class="mb-16">
                    @foreach ($produkUnggulan->take(1) as $produk)
                        <div
                            class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                            <div class="grid lg:grid-cols-2 gap-0">
                                <div class="relative overflow-hidden">
                                    @if ($produk->gambar)
                                        <img src="{{ asset($produk->gambar) }}" alt="{{ $produk->nama }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center">
                                            <i class="fas fa-box text-white text-4xl"></i>
                                        </div>
                                    @endif
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                    </div>
                                    @if ($produk->best_seller)
                                        <div class="absolute top-6 left-6">
                                            <span
                                                class="bg-red-500 text-white px-4 py-2 rounded-2xl text-sm font-bold">BEST
                                                SELLER</span>
                                        </div>
                                    @endif
                                    <div class="absolute top-6 right-6">
                                        <div
                                            class="bg-white/90 backdrop-blur-sm text-neutral-800 px-3 py-1 rounded-full text-sm font-bold flex items-center gap-1">
                                            <i class="fa-solid fa-star text-yellow-500 text-xs"></i>
                                            {{ $produk->rating ?? '4.5' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="p-8 lg:p-12 flex flex-col justify-center">
                                    <div class="flex items-center gap-4 mb-4">
                                        @if ($produk->kategori)
                                            <span
                                                class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">{{ $produk->kategori->nama }}</span>
                                        @endif
                                        <div class="flex items-center gap-2 text-neutral-400 text-sm">
                                            <i class="fa-solid fa-fire"></i>
                                            <span>Terlaris</span>
                                        </div>
                                    </div>
                                    <h3
                                        class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4 group-hover:text-red-500 transition-colors duration-300">
                                        {{ $produk->nama }}
                                    </h3>
                                    <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                        {{ Str::limit($produk->deskripsi, 200) }}
                                    </p>
                                    <div class="flex items-center gap-6 mb-6">
                                        <div class="text-center">
                                            <p class="text-3xl font-bold text-red-500">
                                                {{ $produk->harga ? 'Rp ' . number_format($produk->harga, 0, ',', '.') : 'Rp 0' }}
                                            </p>
                                            <p class="text-sm text-neutral-500">per unit</p>
                                        </div>
                                        <div class="text-center">
                                            <p class="text-2xl font-bold text-green-500">
                                                {{ $produk->jumlah_terjual ?? '0' }}+</p>
                                            <p class="text-sm text-neutral-500">Terjual</p>
                                        </div>
                                        <div class="text-center">
                                            <p class="text-2xl font-bold text-green-500">
                                                {{ $produk->rating ?? '4.5' }}</p>
                                            <p class="text-sm text-neutral-500">Rating</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4">

                                        <a href="{{ route('produk.show', $produk->slug) }}"
                                            class="flex-1 inline-flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105">
                                            <i class="fa-solid fa-eye"></i>
                                            Lihat Detail
                                        </a>
                                        <a href="#"
                                            class="inline-flex items-center justify-center w-12 h-12 bg-gray-100 hover:bg-gray-200 text-neutral-600 rounded-2xl transition-all duration-300">
                                            <i class="fa-solid fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Fallback jika tidak ada produk -->
                <div class="mb-16">
                    <div
                        class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                        <div class="grid lg:grid-cols-2 gap-0">
                            <div class="relative overflow-hidden">
                                <div
                                    class="w-full h-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center">
                                    <i class="fas fa-box text-white text-6xl"></i>
                                </div>
                            </div>
                            <div class="p-8 lg:p-12 flex flex-col justify-center">
                                <h3 class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4">
                                    Belum ada produk tersedia
                                </h3>
                                <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                    Produk unggulan desa akan segera ditampilkan di sini.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Produk Slider -->
            <div class="splide produk-slider" aria-label="Produk Unggulan Desa">
                <div class="splide__track pb-16">
                    <ul class="splide__list">
                        @if ($produkUnggulan->count() > 1)
                            @foreach ($produkUnggulan->skip(1)->take(6) as $produk)
                                <li class="splide__slide">
                                    <div
                                        class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 h-full transform hover:-translate-y-2">
                                        <div class="relative overflow-hidden">
                                            @if ($produk->gambar)
                                                <img src="{{ asset($produk->gambar) }}" alt="{{ $produk->nama }}"
                                                    class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-700">
                                            @else
                                                <div
                                                    class="w-full h-56 bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center">
                                                    <i class="fas fa-box text-white text-4xl"></i>
                                                </div>
                                            @endif
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent">
                                            </div>
                                            @if ($produk->kategori)
                                                <div class="absolute top-4 left-4">
                                                    <span
                                                        class="bg-red-500 text-white px-4 py-2 rounded-2xl text-sm font-medium">{{ $produk->kategori->nama }}</span>
                                                </div>
                                            @endif
                                            <div class="absolute top-4 right-4">
                                                <div
                                                    class="bg-white/90 backdrop-blur-sm text-neutral-800 px-3 py-1 rounded-full text-sm font-bold flex items-center gap-1">
                                                    <i class="fa-solid fa-star text-yellow-500 text-xs"></i>
                                                    {{ $produk->rating ?? '4.5' }}
                                                </div>
                                            </div>
                                            <div class="absolute bottom-4 left-4 right-4">
                                                <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-3">
                                                    <div class="flex items-center justify-between">
                                                        <span class="text-lg font-bold text-red-500">Rp
                                                            {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                                        <span
                                                            class="text-sm text-neutral-500">{{ $produk->terjual ?? 0 }}
                                                            terjual</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-6">
                                            <a href="{{ route('produk.show', $produk->slug) }}">
                                                <h3
                                                    class="text-xl font-bold text-neutral-800 mb-3 group-hover:text-red-500 transition-colors duration-300">
                                                    {{ $produk->nama }}
                                                </h3>
                                            </a>
                                            <p class="text-neutral-500 mb-4 leading-relaxed">
                                                {{ Str::limit($produk->deskripsi, 100) }}
                                            </p>
                                            <div class="flex items-center justify-between">
                                                <span class="text-lg font-bold text-red-500">Rp
                                                    {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                                @if ($produk->nomor_wa)
                                                    <a href="https://wa.me/{{ $produk->nomor_wa }}?text=Saya tertarik dengan produk {{ $produk->nama }} - {{ url()->current() }}"
                                                        target="_blank"
                                                        class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-shopping-cart"></i>
                                                        Beli
                                                    </a>
                                                @else
                                                    <span
                                                        class="inline-flex items-center gap-2 bg-gray-400 text-white px-6 py-3 rounded-2xl font-semibold">
                                                        <i class="fa-solid fa-shopping-cart"></i>
                                                        Beli
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <!-- Fallback jika tidak ada produk tambahan -->
                            <li class="splide__slide">
                                <div
                                    class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 h-full transform hover:-translate-y-2">
                                    <div class="relative overflow-hidden">
                                        <div
                                            class="w-full h-56 bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center">
                                            <i class="fas fa-box text-white text-4xl"></i>
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-lg font-bold text-neutral-800 mb-2">Belum ada produk lainnya
                                        </h3>
                                        <p class="text-neutral-500 text-sm">Produk unggulan akan segera ditampilkan.
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <!-- View All Products Button -->
            <div class="text-center mt-6">
                <a href="{{ route('produk') }}"
                    class="inline-flex items-center gap-3 bg-red-500 hover:bg-red-600 text-white px-8 py-4 rounded-2xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <i class="fa-solid fa-store"></i>
                    Lihat Semua Produk
                </a>
            </div>
        </x-container>
    </section>

    <!-- Highlight Galeri Desa Section -->
    <section class="py-20 bg-gradient-to-br from-yellow-50 via-white to-yellow-50/30">
        <x-container>
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 bg-yellow-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-images"></i>
                    Galeri Desa
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Highlight <span class="text-yellow-500">Galeri Desa</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Jelajahi keindahan alam dan aktivitas warga desa melalui koleksi foto yang menakjubkan.
                </p>
            </div>

            @if ($galeriFeatured->count() > 0)
                <!-- Featured Gallery Hero -->
                <div class="mb-16">
                    @foreach ($galeriFeatured->take(1) as $galeri)
                        <div
                            class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                            <div class="grid lg:grid-cols-2 gap-0">
                                <div class="relative overflow-hidden">
                                    @if ($galeri->gambar)
                                        <img src="{{ asset($galeri->gambar) }}" alt="{{ $galeri->judul }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-yellow-600 to-yellow-800 flex items-center justify-center">
                                            <i class="fas fa-images text-white text-4xl"></i>
                                        </div>
                                    @endif
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                    </div>
                                    @if ($galeri->featured)
                                        <div class="absolute top-6 left-6">
                                            <span
                                                class="bg-yellow-500 text-white px-4 py-2 rounded-2xl text-sm font-bold">FEATURED</span>
                                        </div>
                                    @endif
                                    <div class="absolute bottom-6 left-6 right-6">
                                        <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-4">
                                            <div class="flex items-center justify-between">
                                                <div class="text-center">
                                                    <p class="text-2xl font-bold text-yellow-500">
                                                        {{ $galeriFeatured->count() }}+</p>
                                                    <p class="text-sm text-neutral-600">Foto</p>
                                                </div>
                                                <div class="text-center">
                                                    <p class="text-2xl font-bold text-yellow-500">
                                                        {{ $galeriFeatured->pluck('kategori_id')->unique()->count() }}
                                                    </p>
                                                    <p class="text-sm text-neutral-600">Kategori</p>
                                                </div>
                                                <div class="text-center">
                                                    <p class="text-2xl font-bold text-yellow-500">
                                                        {{ $galeri->likes ?? '0' }}+</p>
                                                    <p class="text-sm text-neutral-600">Likes</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-8 lg:p-12 flex flex-col justify-center">
                                    <div class="flex items-center gap-4 mb-4">
                                        @if ($galeri->kategori)
                                            <span
                                                class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-medium">{{ $galeri->kategori->nama }}</span>
                                        @endif
                                        <div class="flex items-center gap-2 text-neutral-400 text-sm">
                                            <i class="fa-solid fa-camera"></i>
                                            <span>Foto Terbaik</span>
                                        </div>
                                    </div>
                                    <h3
                                        class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4 group-hover:text-yellow-500 transition-colors duration-300">
                                        {{ $galeri->judul }}
                                    </h3>
                                    <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                        {{ Str::limit($galeri->deskripsi, 200) }}
                                    </p>
                                    <div class="grid grid-cols-2 gap-4 mb-6">
                                        <div class="bg-yellow-50 rounded-2xl p-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-10 h-10 bg-yellow-500 rounded-xl flex items-center justify-center">
                                                    <i class="fa-solid fa-mountain text-white"></i>
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-neutral-800">Pemandangan</p>
                                                    <p class="text-sm text-neutral-500">Alam & Gunung</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-yellow-50 rounded-2xl p-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-10 h-10 bg-yellow-500 rounded-xl flex items-center justify-center">
                                                    <i class="fa-solid fa-users text-white"></i>
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-neutral-800">Kegiatan</p>
                                                    <p class="text-sm text-neutral-500">Warga Desa</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('galeri') }}"
                                        class="inline-flex items-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105">
                                        Jelajahi Galeri
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Gallery Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                    @if ($galeriFeatured->count() > 1)
                        @foreach ($galeriFeatured->skip(1)->take(8) as $galeri)
                            <div
                                class="group relative overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 cursor-pointer border border-gray-100 transform hover:-translate-y-2">
                                @if ($galeri->gambar)
                                    <img src="{{ asset($galeri->gambar) }}" alt="{{ $galeri->judul }}"
                                        class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-48 bg-gradient-to-br from-yellow-600 to-yellow-800 flex items-center justify-center">
                                        <i class="fas fa-images text-white text-4xl"></i>
                                    </div>
                                @endif

                                <!-- Overlay with Info -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                                    @if ($galeri->kategori)
                                        <div class="absolute top-4 left-4">
                                            <span
                                                class="bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-medium">{{ $galeri->kategori->nama }}</span>
                                        </div>
                                    @endif
                                    <div class="absolute top-4 right-4">
                                        <div
                                            class="bg-white/90 backdrop-blur-sm text-neutral-800 px-3 py-1 rounded-full text-sm font-bold flex items-center gap-1">
                                            <i class="fa-solid fa-heart text-red-500 text-xs"></i>
                                            {{ $galeri->likes ?? '0' }}
                                        </div>
                                    </div>
                                    <div
                                        class="absolute bottom-0 left-0 right-0 p-4 text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                        <h3 class="font-bold text-lg mb-2">{{ $galeri->judul }}</h3>
                                        <p class="text-sm text-white/90 leading-relaxed">
                                            {{ Str::limit($galeri->deskripsi, 100) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Fallback jika tidak ada galeri tambahan -->
                        <div class="col-span-full">
                            <div class="text-center py-12">
                                <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                                <h3 class="text-xl font-bold text-gray-600 mb-2">Belum ada galeri lainnya</h3>
                                <p class="text-gray-500">Galeri foto akan segera ditampilkan di sini.</p>
                            </div>
                        </div>
                    @endif

                </div>

                <!-- View All Gallery Button -->
                <div class="text-center">
                    <a href="{{ route('galeri') }}"
                        class="inline-flex items-center gap-3 bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-4 rounded-2xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                        <i class="fa-solid fa-images"></i>
                        Lihat Semua Galeri
                    </a>
                </div>
            @else
                <!-- Fallback jika tidak ada galeri -->
                <div class="mb-16">
                    <div
                        class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                        <div class="grid lg:grid-cols-2 gap-0">
                            <div class="relative overflow-hidden">
                                <div
                                    class="w-full h-full bg-gradient-to-br from-yellow-600 to-yellow-800 flex items-center justify-center">
                                    <i class="fas fa-images text-white text-6xl"></i>
                                </div>
                            </div>
                            <div class="p-8 lg:p-12 flex flex-col justify-center">
                                <h3 class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4">
                                    Belum ada galeri tersedia
                                </h3>
                                <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                    Galeri foto desa akan segera ditampilkan di sini.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </x-container>
    </section>

    @push('scripts')
        <!-- Splide JS -->
        <script src="{{ asset('js/splide.min.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Simple initialization with basic options
                try {
                    const splide = new Splide('#hero-banner', {
                        type: 'fade',
                        autoplay: true,
                        interval: 5000,
                        pauseOnHover: true,
                        arrows: false,
                        pagination: true,
                        perPage: 1,
                        height: 'auto',
                        cover: true,
                        speed: 800
                    });

                    splide.mount();
                } catch (error) {
                    const slides = document.querySelectorAll('.splide__slide');
                    if (slides.length > 0) {
                        slides.forEach((slide, index) => {
                            if (index === 0) {
                                slide.style.display = 'block';
                            } else {
                                slide.style.display = 'none';
                            }
                        });
                    }
                }

                // Initialize Team Slider (only if more than 3 items)
                const teamSlider = document.querySelector('.team-slider');
                if (teamSlider) {
                    const slideCount = teamSlider.querySelectorAll('.splide__slide').length;

                    // Initialize slider if there are slides (more than 0)
                    if (slideCount > 0) {
                        const splide = new Splide('.team-slider', {
                            type: 'slide',
                            perPage: 3,
                            perMove: 1,
                            autoplay: false,
                            interval: 5000,
                            gap: '2rem',
                            padding: '2rem',
                            pauseOnHover: true,
                            pauseOnFocus: true,
                            arrows: true,
                            pagination: true,
                            drag: true,
                            snap: true,
                            rewind: false,
                            speed: 600,
                            easing: 'cubic-bezier(0.25, 1, 0.5, 1)',
                            focus: 'center',
                            updateOnMove: true,
                            width: '100%',
                            height: 'auto',
                            breakpoints: {
                                1024: {
                                    perPage: 2,
                                    gap: '1.5rem',
                                    padding: '1.5rem',
                                },
                                768: {
                                    perPage: 1,
                                    gap: '1rem',
                                    padding: '1rem',
                                }
                            }
                        });

                        splide.mount();
                    }
                }

                // Initialize Produk Slider
                const produkSlider = document.querySelector('.produk-slider');
                if (produkSlider) {
                    new Splide('.produk-slider', {
                        type: 'loop',
                        perPage: 3,
                        perMove: 1,
                        autoplay: true,
                        interval: 4000,
                        gap: '2rem',
                        padding: '2rem',
                        pauseOnHover: true,
                        pauseOnFocus: true,
                        arrows: true,
                        pagination: true,
                        drag: true,
                        snap: true,
                        rewind: true,
                        speed: 600,
                        easing: 'cubic-bezier(0.25, 1, 0.5, 1)',
                        breakpoints: {
                            1024: {
                                perPage: 2,
                                gap: '1.5rem',
                                padding: '1.5rem',
                            },
                            768: {
                                perPage: 1,
                                gap: '1rem',
                                padding: '1rem',
                            }
                        }
                    }).mount();
                }


            });
        </script>
    @endpush
</x-main-layout>

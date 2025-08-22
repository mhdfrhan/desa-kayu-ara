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
                opacity: 0.7;
                transform: scale(0.9);
                transition: all 0.4s ease;
            }

            .team-slider .splide__slide.is-active {
                opacity: 1;
                transform: scale(1);
            }

            .team-slider .splide__slide.is-prev,
            .team-slider .splide__slide.is-next {
                opacity: 0.8;
                transform: scale(0.95);
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
        <div class="splide" id="hero-banner" aria-label="Banner Utama">
            <div class="splide__track">
                <ul class="splide__list">
                    <!-- Slide 1 -->
                    <li class="splide__slide">
                        <div class="relative h-[500px] md:h-[600px] lg:h-screen overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-transparent z-10">
                            </div>
                            <img src="https://images.unsplash.com/photo-1671080749889-19f8a69deb2b?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Desa Sungai Kayu Ara" class="w-full h-full object-cover">
                            <div class="absolute inset-0 z-20 flex items-center">
                                <x-container>
                                    <div class="max-w-2xl">
                                        <h1
                                            class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight">
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
                    </li>

                    <!-- Slide 2 -->
                    <li class="splide__slide">
                        <div class="relative h-[500px] md:h-[600px] lg:h-screen overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-transparent z-10">
                            </div>
                            <img src="https://images.unsplash.com/photo-1643870358098-3549ac3bca46?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Alam Desa" class="w-full h-full object-cover">
                            <div class="absolute inset-0 z-20 flex items-center">
                                <x-container>
                                    <div class="max-w-2xl">
                                        <h1
                                            class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight">
                                            Keindahan Alam yang
                                            <span class="text-green-400">Mempesona</span>
                                        </h1>
                                        <p class="text-lg md:text-xl text-white/90 mb-8 leading-relaxed">
                                            Nikmati pemandangan alam yang menakjubkan dengan sawah hijau,
                                            sungai yang jernih, dan udara segar yang menyegarkan.
                                        </p>
                                        <div class="flex flex-col sm:flex-row gap-4">
                                            <a href="#alam">
                                                <x-primary-button>
                                                    Jelajahi Alam
                                                </x-primary-button>
                                            </a>
                                            <a href="#wisata">
                                                <x-outline-button>
                                                    Wisata Desa
                                                </x-outline-button>
                                            </a>
                                        </div>
                                    </div>
                                </x-container>
                            </div>
                        </div>
                    </li>

                    <!-- Slide 3 -->
                    <li class="splide__slide">
                        <div class="relative h-[500px] md:h-[600px] lg:h-screen overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-transparent z-10">
                            </div>
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80"
                                alt="Produk Desa" class="w-full h-full object-cover">
                            <div class="absolute inset-0 z-20 flex items-center">
                                <x-container>
                                    <div class="max-w-2xl">
                                        <h1
                                            class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight">
                                            Produk Unggulan
                                            <span class="text-green-400">Desa</span>
                                        </h1>
                                        <p class="text-lg md:text-xl text-white/90 mb-8 leading-relaxed">
                                            Temukan berbagai produk unggulan desa kami yang berkualitas tinggi,
                                            dari hasil pertanian hingga kerajinan tangan warga.
                                        </p>
                                        <div class="flex flex-col sm:flex-row gap-4">
                                            <a href="#produk">
                                                <x-primary-button>
                                                    Lihat Produk
                                                </x-primary-button>
                                            </a>
                                            <a href="#belanja">
                                                <x-outline-button>
                                                    Belanja Online
                                                </x-outline-button>
                                            </a>
                                        </div>
                                    </div>
                                </x-container>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Pagination -->
            <div class="splide__pagination"></div>
        </div>

        <div class="absolute left-0 top-0 right-0 h-1/3 bg-gradient-to-b from-neutral-900/90 to-transparent z-10"></div>
    </section>

    {{-- sambutan kepala desa --}}
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
                        <div class="relative lg:w-1/2  mx-auto">
                            <!-- Background Pattern -->
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-yellow-600 to-yellow-700 rounded-3xl transform rotate-3 scale-105 opacity-20">
                            </div>

                            <!-- Main Photo -->
                            <div class="relative w-full h-full rounded-3xl overflow-hidden shadow-2xl">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                                    alt="Kepala Desa Sungai Kayu Ara" class="w-full h-full object-cover">

                                <!-- Overlay Gradient -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                </div>

                                <!-- Info Badge -->
                                <div class="absolute bottom-4 left-4 right-4">
                                    <div class="bg-white/95 backdrop-blur-sm rounded-2xl p-4 shadow-lg">
                                        <h3 class="font-bold text-lg text-neutral-800">Ahmad Rizki</h3>
                                        <p class="text-sm text-neutral-600">Kepala Desa Sungai Kayu Ara</p>
                                        <p class="text-xs text-neutral-500 mt-1">Periode 2021 - 2026</p>
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

                        <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 leading-tight">
                            Selamat Datang di
                            <span class="text-green-600">Desa Kami</span>
                        </h2>

                        <p class="text-lg text-neutral-600 leading-relaxed">
                            Sebagai Kepala Desa, saya mengucapkan selamat datang kepada semua pengunjung website resmi
                            Desa Sungai Kayu Ara.
                        </p>
                    </div>

                    <!-- Quote -->
                    <div class="relative">
                        <div
                            class="absolute -left-4 top-0 bottom-0 w-1 bg-gradient-to-b from-yellow-600 to-yellow-400 rounded-full">
                        </div>
                        <blockquote class="pl-8 text-xl text-neutral-700 italic leading-relaxed">
                            "Desa Sungai Kayu Ara adalah desa yang kaya akan potensi alam, budaya, dan sumber daya
                            manusia yang berkualitas. Kami berkomitmen untuk mengembangkan desa ini menjadi desa yang
                            maju, mandiri, dan sejahtera."
                        </blockquote>
                    </div>

                    <!-- Content -->
                    <div class="space-y-4 text-neutral-600 leading-relaxed">
                        <p>
                            Desa kami memiliki berbagai potensi unggulan mulai dari sektor pertanian, peternakan, hingga
                            wisata alam yang indah. Dengan dukungan dari seluruh warga desa dan pemerintah, kami terus
                            berupaya untuk meningkatkan kesejahteraan masyarakat.
                        </p>

                        <p>
                            Melalui website ini, kami ingin memberikan informasi yang transparan dan akurat kepada
                            masyarakat, serta mempromosikan potensi desa kami kepada dunia luar. Semoga website ini
                            dapat menjadi jembatan komunikasi yang efektif antara pemerintah desa dan masyarakat.
                        </p>
                    </div>

                    <!-- CTA -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6">
                        <x-primary-button>
                            Lihat Profil Lengkap
                        </x-primary-button>
                        <x-outline-button color="yellow">
                            Lokasi Desa
                        </x-outline-button>
                    </div>
                </div>
            </div>
        </x-container>
    </section>

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
                                    <div class="text-2xl font-bold">2.5K+</div>
                                    <div class="text-xs text-green-100">Penduduk</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold">15+</div>
                                    <div class="text-xs text-green-100">Program</div>
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
                                <div class="w-full h-12 bg-white/20 rounded-lg"></div>
                                <div class="w-full h-12 bg-white/20 rounded-lg"></div>
                                <div class="w-full h-12 bg-white/20 rounded-lg"></div>
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
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 bg-white/60 rounded-full"></div>
                                    <span class="text-sm text-green-100">Program Pemberdayaan UMKM</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 bg-white/60 rounded-full"></div>
                                    <span class="text-sm text-green-100">Festival Budaya Desa</span>
                                </div>
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
                                <div class="text-center">
                                    <div class="w-8 h-8 bg-white/20 rounded-lg mx-auto mb-1"></div>
                                    <div class="text-xs text-green-100">Pertanian</div>
                                </div>
                                <div class="text-center">
                                    <div class="w-8 h-8 bg-white/20 rounded-lg mx-auto mb-1"></div>
                                    <div class="text-xs text-green-100">Kerajinan</div>
                                </div>
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

            <!-- Team Cards Slider -->
            <div class="mb-16">
                <div class="splide team-slider" role="group" aria-label="Tim Organisasi Desa">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <!-- Kepala Desa -->
                            <li class="splide__slide">
                                <div class="group relative">
                                    <div
                                        class="relative overflow-hidden rounded-2xl bg-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105 h-96">
                                        <!-- Background Image -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-green-600 to-green-700">
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                                                alt="Kepala Desa"
                                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        </div>

                                        <!-- Gradient Overlay -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent">
                                        </div>

                                        <!-- Position Badge -->
                                        <div class="absolute top-4 right-4 z-10">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/20 backdrop-blur-sm text-white border border-white/30">
                                                Kepala Desa
                                            </span>
                                        </div>

                                        <!-- Content -->
                                        <div class="absolute bottom-0 left-0 right-0 p-6 z-10">
                                            <h3 class="text-2xl font-bold text-white mb-1">
                                                Ahmad Supriyadi, S.Pd
                                            </h3>
                                            <p class="text-green-200 text-sm font-medium">
                                                Periode 2021-2027
                                            </p>
                                            <div class="flex items-center gap-2 mt-3">
                                                <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                                <span class="text-green-200 text-sm">Pemimpin Tertinggi</span>
                                            </div>
                                        </div>

                                        <!-- Hover Overlay -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-green-600/90 via-green-600/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!-- Sekretaris Desa -->
                            <li class="splide__slide">
                                <div class="group relative">
                                    <div
                                        class="relative overflow-hidden rounded-2xl bg-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105 h-96">
                                        <!-- Background Image -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-green-600 to-green-700">
                                            <img src="https://images.unsplash.com/photo-1479936343636-73cdc5aae0c3?q=80&w=1160&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                alt="Sekretaris Desa"
                                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        </div>

                                        <!-- Gradient Overlay -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent">
                                        </div>

                                        <!-- Position Badge -->
                                        <div class="absolute top-4 right-4 z-10">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/20 backdrop-blur-sm text-white border border-white/30">
                                                Sekretaris
                                            </span>
                                        </div>

                                        <!-- Content -->
                                        <div class="absolute bottom-0 left-0 right-0 p-6 z-10">
                                            <h3 class="text-2xl font-bold text-white mb-1">
                                                Siti Nurhaliza, S.E
                                            </h3>
                                            <p class="text-yellow-200 text-sm font-medium">
                                                Sekretaris Desa
                                            </p>
                                            <div class="flex items-center gap-2 mt-3">
                                                <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                                                <span class="text-yellow-200 text-sm">Administrasi & Koordinasi</span>
                                            </div>
                                        </div>

                                        <!-- Hover Overlay -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-yellow-600/90 via-yellow-600/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!-- Kasi Pemerintahan -->
                            <li class="splide__slide">
                                <div class="group relative">
                                    <div
                                        class="relative overflow-hidden rounded-2xl bg-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105 h-96">
                                        <!-- Background Image -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-green-600 to-green-700">
                                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                alt="Kasi Pemerintahan"
                                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        </div>

                                        <!-- Gradient Overlay -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent">
                                        </div>

                                        <!-- Position Badge -->
                                        <div class="absolute top-4 right-4 z-10">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/20 backdrop-blur-sm text-white border border-white/30">
                                                Kasi
                                            </span>
                                        </div>

                                        <!-- Content -->
                                        <div class="absolute bottom-0 left-0 right-0 p-6 z-10">
                                            <h3 class="text-2xl font-bold text-white mb-1">
                                                Bambang Sutrisno
                                            </h3>
                                            <p class="text-red-200 text-sm font-medium">
                                                Kasi Pemerintahan
                                            </p>
                                            <div class="flex items-center gap-2 mt-3">
                                                <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                                                <span class="text-red-200 text-sm">Pelayanan Publik</span>
                                            </div>
                                        </div>

                                        <!-- Hover Overlay -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-red-600/90 via-red-600/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!-- Kasi Kesejahteraan -->
                            <li class="splide__slide">
                                <div class="group relative">
                                    <div
                                        class="relative overflow-hidden rounded-2xl bg-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105 h-96">
                                        <!-- Background Image -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-green-600 to-green-700">
                                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                alt="Kasi Kesejahteraan"
                                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        </div>

                                        <!-- Gradient Overlay -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent">
                                        </div>

                                        <!-- Position Badge -->
                                        <div class="absolute top-4 right-4 z-10">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/20 backdrop-blur-sm text-white border border-white/30">
                                                Kasi
                                            </span>
                                        </div>

                                        <!-- Content -->
                                        <div class="absolute bottom-0 left-0 right-0 p-6 z-10">
                                            <h3 class="text-2xl font-bold text-white mb-1">
                                                Dewi Sartika
                                            </h3>
                                            <p class="text-green-200 text-sm font-medium">
                                                Kasi Kesejahteraan
                                            </p>
                                            <div class="flex items-center gap-2 mt-3">
                                                <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                                <span class="text-green-200 text-sm">Kesehatan & Pendidikan</span>
                                            </div>
                                        </div>

                                        <!-- Hover Overlay -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-green-600/90 via-green-600/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!-- Kasi Pelayanan -->
                            <li class="splide__slide">
                                <div class="group relative">
                                    <div
                                        class="relative overflow-hidden rounded-2xl bg-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105 h-96">
                                        <!-- Background Image -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-green-600 to-green-700">
                                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                                                alt="Kasi Pelayanan"
                                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        </div>

                                        <!-- Gradient Overlay -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent">
                                        </div>

                                        <!-- Position Badge -->
                                        <div class="absolute top-4 right-4 z-10">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/20 backdrop-blur-sm text-white border border-white/30">
                                                Kasi
                                            </span>
                                        </div>

                                        <!-- Content -->
                                        <div class="absolute bottom-0 left-0 right-0 p-6 z-10">
                                            <h3 class="text-2xl font-bold text-white mb-1">
                                                Rudi Hartono
                                            </h3>
                                            <p class="text-yellow-200 text-sm font-medium">
                                                Kasi Pelayanan
                                            </p>
                                            <div class="flex items-center gap-2 mt-3">
                                                <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                                                <span class="text-yellow-200 text-sm">Pelayanan Masyarakat</span>
                                            </div>
                                        </div>

                                        <!-- Hover Overlay -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-yellow-600/90 via-yellow-600/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
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
                                    <div class="text-3xl font-bold">2,847</div>
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
                                    <div class="text-3xl font-bold">685</div>
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
                                    <div class="text-3xl font-bold">127</div>
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
                                    <div class="text-3xl font-bold">1,423</div>
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
                                    <div class="text-3xl font-bold">1,424</div>
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
                                    <div class="text-3xl font-bold">+23</div>
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

            <!-- Featured News Card -->
            <div class="mb-16">
                <div
                    class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                    <div class="grid lg:grid-cols-2 gap-0">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80"
                                alt="Berita Utama"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                            </div>
                            <div class="absolute top-6 left-6">
                                <span
                                    class="bg-green-500 text-white px-4 py-2 rounded-2xl text-sm font-bold">FEATURED</span>
                            </div>
                        </div>
                        <div class="p-8 lg:p-12 flex flex-col justify-center">
                            <div class="flex items-center gap-4 mb-4">
                                <span
                                    class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Pembangunan</span>
                                <div class="flex items-center gap-2 text-neutral-400 text-sm">
                                    <i class="fa-solid fa-calendar"></i>
                                    <span>15 Desember 2024</span>
                                </div>
                            </div>
                            <h3
                                class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4 group-hover:text-green-500 transition-colors duration-300">
                                Pembangunan Jembatan Desa Selesai, Akses Transportasi Semakin Lancar
                            </h3>
                            <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                Setelah 6 bulan pembangunan, jembatan penghubung antar dusun di Desa Sungai Kayu Ara
                                akhirnya selesai dan siap digunakan. Jembatan ini akan memudahkan akses transportasi
                                warga dan meningkatkan perekonomian desa.
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80"
                                        alt="Penulis" class="w-10 h-10 rounded-full object-cover">
                                    <div>
                                        <p class="font-semibold text-neutral-800">Ahmad Rizki</p>
                                        <p class="text-sm text-neutral-500">Kepala Desa</p>
                                    </div>
                                </div>
                                <a href="#">
                                    <x-primary-button>
                                        Baca Selengkapnya
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </x-primary-button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- News Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @php
                    $berita = [
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1643870358098-3549ac3bca46?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Pertanian',
                            'title' => 'Program Peningkatan Produksi Padi Berhasil Tingkatkan Hasil Panen',
                            'date' => '12 Desember 2024',
                            'excerpt' =>
                                'Program peningkatan produksi padi yang diluncurkan pemerintah desa berhasil meningkatkan hasil panen hingga 30%.',
                            'author' => 'Siti Nurhaliza',
                            'author_avatar' =>
                                'https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1671080749889-19f8a69deb2b?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Wisata',
                            'title' => 'Destinasi Wisata Air Terjun Diresmikan, Siap Terima Pengunjung',
                            'date' => '10 Desember 2024',
                            'excerpt' =>
                                'Destinasi wisata air terjun Sungai Kayu Ara resmi dibuka untuk umum dengan fasilitas yang lengkap.',
                            'author' => 'Budi Santoso',
                            'author_avatar' =>
                                'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80',
                            'category' => 'Ekonomi',
                            'title' => 'UMKM Desa Raih Penghargaan di Festival Produk Lokal',
                            'date' => '8 Desember 2024',
                            'excerpt' =>
                                'Tiga UMKM dari Desa Sungai Kayu Ara berhasil meraih penghargaan di Festival Produk Lokal tingkat kabupaten.',
                            'author' => 'Dewi Sartika',
                            'author_avatar' =>
                                'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1643870358098-3549ac3bca46?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Pendidikan',
                            'title' => 'Program Beasiswa Desa Berhasil Kirim 15 Siswa ke Perguruan Tinggi',
                            'date' => '5 Desember 2024',
                            'excerpt' =>
                                'Program beasiswa desa berhasil mengirim 15 siswa berprestasi untuk melanjutkan pendidikan ke perguruan tinggi.',
                            'author' => 'Rina Marlina',
                            'author_avatar' =>
                                'https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1671080749889-19f8a69deb2b?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Kesehatan',
                            'title' => 'Posyandu Lansia Desa Raih Penghargaan Terbaik Se-Kecamatan',
                            'date' => '3 Desember 2024',
                            'excerpt' =>
                                'Posyandu lansia Desa Sungai Kayu Ara berhasil meraih penghargaan sebagai posyandu terbaik se-kecamatan.',
                            'author' => 'Nurul Hidayah',
                            'author_avatar' =>
                                'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80',
                            'category' => 'Lingkungan',
                            'title' => 'Program Penghijauan Desa Berhasil Tanam 1000 Pohon',
                            'date' => '1 Desember 2024',
                            'excerpt' =>
                                'Program penghijauan desa berhasil menanam 1000 pohon di berbagai lokasi strategis untuk menjaga kelestarian lingkungan.',
                            'author' => 'Ahmad Fauzi',
                            'author_avatar' =>
                                'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                        ],
                    ];
                @endphp

                @foreach ($berita as $item)
                    <article
                        class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-700">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent">
                            </div>
                            <div class="absolute top-4 left-4">
                                <span
                                    class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-medium">{{ $item['category'] }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-neutral-400 text-sm mb-3">
                                <i class="fa-solid fa-calendar"></i>
                                <span>{{ $item['date'] }}</span>
                            </div>
                            <h3
                                class="text-xl font-bold text-neutral-800 mb-3 group-hover:text-green-500 transition-colors duration-300 line-clamp-2">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-neutral-500 mb-4 leading-relaxed line-clamp-3">
                                {{ $item['excerpt'] }}
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $item['author_avatar'] }}" alt="{{ $item['author'] }}"
                                        class="w-8 h-8 rounded-full object-cover">
                                    <span class="text-sm font-medium text-neutral-700">{{ $item['author'] }}</span>
                                </div>
                                <a href="#"
                                    class="inline-flex items-center gap-2 text-green-500 font-semibold transition-colors duration-300 hover:text-green-600">
                                    Baca
                                    <i class="fa-solid fa-arrow-right text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
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
                                <div class="flex items-center gap-4 p-4 bg-white/10 rounded-2xl">
                                    <div
                                        class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center shrink-0">
                                        <i class="fa-solid fa-tree text-white text-lg"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-white">Jungle Track</h4>
                                        <p class="text-sm text-white/80">Menyusuri hutan mangrove yang rindang dan
                                            sejuk, hingga mencapai hamparan Selat Lalang, dengan pemandangan menghadap
                                            ke Pulau Padang.</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 p-4 bg-white/10 rounded-2xl">
                                    <div
                                        class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center shrink-0">
                                        <i class="fa-solid fa-campground text-white text-lg"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-white">Kemah Budaya</h4>
                                        <p class="text-sm text-white/80">Pengalaman bermalam di hutan mangrove yang
                                            menstimulasi kreativitas anak muda melalui kegiatan berbasis ide dan
                                            inovasi.</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 p-4 bg-white/10 rounded-2xl">
                                    <div
                                        class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center shrink-0">
                                        <i class="fa-solid fa-fish text-white text-lg"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-white">Spot Pancing</h4>
                                        <p class="text-sm text-white/80">Cocok untuk yang ingin menikmati memancing
                                            siang atau malam di area alami nan tenang.</p>
                                    </div>
                                </div>
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

            <!-- Featured Product Hero -->
            <div class="mb-16">
                <div
                    class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                    <div class="grid lg:grid-cols-2 gap-0">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80"
                                alt="Produk Utama"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                            </div>
                            <div class="absolute top-6 left-6">
                                <span class="bg-red-500 text-white px-4 py-2 rounded-2xl text-sm font-bold">BEST
                                    SELLER</span>
                            </div>
                            <div class="absolute top-6 right-6">
                                <div
                                    class="bg-white/90 backdrop-blur-sm text-neutral-800 px-3 py-1 rounded-full text-sm font-bold flex items-center gap-1">
                                    <i class="fa-solid fa-star text-yellow-500 text-xs"></i>
                                    4.9
                                </div>
                            </div>
                        </div>
                        <div class="p-8 lg:p-12 flex flex-col justify-center">
                            <div class="flex items-center gap-4 mb-4">
                                <span
                                    class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">Pertanian</span>
                                <div class="flex items-center gap-2 text-neutral-400 text-sm">
                                    <i class="fa-solid fa-fire"></i>
                                    <span>Terlaris</span>
                                </div>
                            </div>
                            <h3
                                class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4 group-hover:text-red-500 transition-colors duration-300">
                                Beras Organik Premium
                            </h3>
                            <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                Beras organik berkualitas tinggi hasil panen petani lokal dengan rasa yang enak dan
                                bergizi. Diproduksi tanpa pestisida kimia dan menggunakan metode pertanian tradisional
                                yang ramah lingkungan.
                            </p>
                            <div class="flex items-center gap-6 mb-6">
                                <div class="text-center">
                                    <p class="text-3xl font-bold text-red-500">Rp 25.000</p>
                                    <p class="text-sm text-neutral-500">per kg</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-green-500">500+</p>
                                    <p class="text-sm text-neutral-500">Terjual</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-green-500">4.9</p>
                                    <p class="text-sm text-neutral-500">Rating</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <a href="#"
                                    class="flex-1 inline-flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105">
                                    <i class="fa-solid fa-shopping-cart"></i>
                                    Beli Sekarang
                                </a>
                                <a href="#"
                                    class="inline-flex items-center justify-center w-12 h-12 bg-gray-100 hover:bg-gray-200 text-neutral-600 rounded-2xl transition-all duration-300">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produk Slider -->
            <div class="splide produk-slider" aria-label="Produk Unggulan Desa">
                <div class="splide__track pb-16">
                    <ul class="splide__list">
                        @php
                            $produk = [
                                [
                                    'image' =>
                                        'https://images.unsplash.com/photo-1643870358098-3549ac3bca46?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                    'title' => 'Kerajinan Bambu',
                                    'category' => 'Kerajinan',
                                    'price' => 'Rp 150.000',
                                    'description' =>
                                        'Kerajinan bambu tangan yang indah dan berkualitas, dibuat oleh pengrajin lokal berpengalaman.',
                                    'rating' => '4.8',
                                    'sold' => '120',
                                ],
                                [
                                    'image' =>
                                        'https://images.unsplash.com/photo-1671080749889-19f8a69deb2b?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                    'title' => 'Madu Murni',
                                    'category' => 'Peternakan',
                                    'price' => 'Rp 85.000/botol',
                                    'description' =>
                                        'Madu murni alami hasil ternak lebah lokal, tanpa campuran dan pengawet.',
                                    'rating' => '4.9',
                                    'sold' => '200',
                                ],
                                [
                                    'image' =>
                                        'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80',
                                    'title' => 'Kopi Robusta',
                                    'category' => 'Pertanian',
                                    'price' => 'Rp 45.000/kg',
                                    'description' =>
                                        'Kopi robusta premium dengan aroma yang kuat dan rasa yang khas dari tanah desa.',
                                    'rating' => '4.7',
                                    'sold' => '180',
                                ],
                                [
                                    'image' =>
                                        'https://images.unsplash.com/photo-1643870358098-3549ac3bca46?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                    'title' => 'Batik Tulis',
                                    'category' => 'Kerajinan',
                                    'price' => 'Rp 350.000',
                                    'description' =>
                                        'Batik tulis tradisional dengan motif khas desa, dibuat dengan teknik turun temurun.',
                                    'rating' => '4.9',
                                    'sold' => '85',
                                ],
                                [
                                    'image' =>
                                        'https://images.unsplash.com/photo-1671080749889-19f8a69deb2b?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                    'title' => 'Sayuran Organik',
                                    'category' => 'Pertanian',
                                    'price' => 'Rp 15.000/kg',
                                    'description' =>
                                        'Sayuran organik segar hasil kebun warga, bebas pestisida dan sehat.',
                                    'rating' => '4.6',
                                    'sold' => '300',
                                ],
                            ];
                        @endphp

                        @foreach ($produk as $item)
                            <li class="splide__slide">
                                <div
                                    class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 h-full transform hover:-translate-y-2">
                                    <div class="relative overflow-hidden">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                                            class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-700">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent">
                                        </div>
                                        <div class="absolute top-4 left-4">
                                            <span
                                                class="bg-red-500 text-white px-4 py-2 rounded-2xl text-sm font-medium">{{ $item['category'] }}</span>
                                        </div>
                                        <div class="absolute top-4 right-4">
                                            <div
                                                class="bg-white/90 backdrop-blur-sm text-neutral-800 px-3 py-1 rounded-full text-sm font-bold flex items-center gap-1">
                                                <i class="fa-solid fa-star text-yellow-500 text-xs"></i>
                                                {{ $item['rating'] }}
                                            </div>
                                        </div>
                                        <div class="absolute bottom-4 left-4 right-4">
                                            <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-3">
                                                <div class="flex items-center justify-between">
                                                    <span
                                                        class="text-lg font-bold text-red-500">{{ $item['price'] }}</span>
                                                    <span class="text-sm text-neutral-500">{{ $item['sold'] }}
                                                        terjual</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <h3
                                            class="text-xl font-bold text-neutral-800 mb-3 group-hover:text-red-500 transition-colors duration-300">
                                            {{ $item['title'] }}
                                        </h3>
                                        <p class="text-neutral-500 mb-4 leading-relaxed">
                                            {{ $item['description'] }}
                                        </p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-lg font-bold text-red-500">{{ $item['price'] }}</span>
                                            <a href="#"
                                                class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105">
                                                <i class="fa-solid fa-shopping-cart"></i>
                                                Beli
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- View All Products Button -->
            <div class="text-center mt-6">
                <a href="#"
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

            <!-- Featured Gallery Hero -->
            <div class="mb-16">
                <div
                    class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                    <div class="grid lg:grid-cols-2 gap-0">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80"
                                alt="Galeri Utama"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                            </div>
                            <div class="absolute top-6 left-6">
                                <span
                                    class="bg-yellow-500 text-white px-4 py-2 rounded-2xl text-sm font-bold">FEATURED</span>
                            </div>
                            <div class="absolute bottom-6 left-6 right-6">
                                <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-4">
                                    <div class="flex items-center justify-between">
                                        <div class="text-center">
                                            <p class="text-2xl font-bold text-yellow-500">50+</p>
                                            <p class="text-sm text-neutral-600">Foto</p>
                                        </div>
                                        <div class="text-center">
                                            <p class="text-2xl font-bold text-yellow-500">8</p>
                                            <p class="text-sm text-neutral-600">Kategori</p>
                                        </div>
                                        <div class="text-center">
                                            <p class="text-2xl font-bold text-yellow-500">1000+</p>
                                            <p class="text-sm text-neutral-600">Views</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-8 lg:p-12 flex flex-col justify-center">
                            <div class="flex items-center gap-4 mb-4">
                                <span
                                    class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-medium">Alam</span>
                                <div class="flex items-center gap-2 text-neutral-400 text-sm">
                                    <i class="fa-solid fa-camera"></i>
                                    <span>Foto Terbaik</span>
                                </div>
                            </div>
                            <h3
                                class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4 group-hover:text-yellow-500 transition-colors duration-300">
                                Keindahan Alam Desa yang Memukau
                            </h3>
                            <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                Koleksi foto terbaik yang menampilkan keindahan alam, aktivitas warga, dan momen-momen
                                berharga di Desa Sungai Kayu Ara. Setiap foto menceritakan kisah unik tentang kehidupan
                                desa.
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
                            <a href="#"
                                class="inline-flex items-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105">
                                Jelajahi Galeri
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                @php
                    $galeri = [
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80',
                            'title' => 'Pemandangan Sawah',
                            'description' =>
                                'Keindahan sawah hijau yang membentang luas dengan pemandangan gunung di kejauhan.',
                            'category' => 'Alam',
                            'likes' => '125',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1643870358098-3549ac3bca46?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'title' => 'Kegiatan Warga',
                            'description' =>
                                'Warga desa yang sedang bekerja sama dalam kegiatan gotong royong membangun desa.',
                            'category' => 'Kegiatan',
                            'likes' => '89',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1671080749889-19f8a69deb2b?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'title' => 'Wisata Alam',
                            'description' =>
                                'Destinasi wisata alam yang menakjubkan dengan air terjun dan hutan yang asri.',
                            'category' => 'Wisata',
                            'likes' => '156',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80',
                            'title' => 'Produk Desa',
                            'description' =>
                                'Berbagai produk unggulan desa yang berkualitas tinggi dan hasil karya warga.',
                            'category' => 'Produk',
                            'likes' => '78',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1643870358098-3549ac3bca46?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'title' => 'Budaya Tradisional',
                            'description' =>
                                'Kegiatan budaya tradisional yang masih dilestarikan oleh masyarakat desa.',
                            'category' => 'Budaya',
                            'likes' => '92',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1671080749889-19f8a69deb2b?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'title' => 'Infrastruktur',
                            'description' =>
                                'Pembangunan infrastruktur desa yang terus berkembang untuk kesejahteraan warga.',
                            'category' => 'Infrastruktur',
                            'likes' => '67',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80',
                            'title' => 'Kegiatan Desa',
                            'description' => 'Berbagai kegiatan desa yang menunjukkan semangat gotong royong warga.',
                            'category' => 'Kegiatan',
                            'likes' => '134',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1643870358098-3549ac3bca46?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'title' => 'Keindahan Alam',
                            'description' => 'Keindahan alam desa yang masih terjaga dengan pemandangan yang memukau.',
                            'category' => 'Alam',
                            'likes' => '201',
                        ],
                    ];
                @endphp

                @foreach ($galeri as $item)
                    <div
                        class="group relative overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 cursor-pointer border border-gray-100 transform hover:-translate-y-2">
                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                            class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700">

                        <!-- Overlay with Info -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                            <div class="absolute top-4 left-4">
                                <span
                                    class="bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-medium">{{ $item['category'] }}</span>
                            </div>
                            <div class="absolute top-4 right-4">
                                <div
                                    class="bg-white/90 backdrop-blur-sm text-neutral-800 px-3 py-1 rounded-full text-sm font-bold flex items-center gap-1">
                                    <i class="fa-solid fa-heart text-red-500 text-xs"></i>
                                    {{ $item['likes'] }}
                                </div>
                            </div>
                            <div
                                class="absolute bottom-0 left-0 right-0 p-4 text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <h3 class="font-bold text-lg mb-2">{{ $item['title'] }}</h3>
                                <p class="text-sm text-white/90 leading-relaxed">{{ $item['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Gallery Button -->
            <div class="text-center">
                <a href="#"
                    class="inline-flex items-center gap-3 bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-4 rounded-2xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <i class="fa-solid fa-images"></i>
                    Lihat Semua Galeri
                </a>
            </div>
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

                // Initialize Team Slider
                const teamSlider = document.querySelector('.team-slider');
                if (teamSlider) {
                    new Splide('.team-slider', {
                        type: 'loop',
                        perPage: 3,
                        perMove: 1,
                        autoplay: true,
                        interval: 5000,
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

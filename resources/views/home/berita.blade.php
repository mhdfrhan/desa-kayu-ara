@php use Illuminate\Support\Str; @endphp

<x-main-layout>
    <x-slot name="title">Berita</x-slot>

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-green-700 to-green-800">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-green-600/10 via-transparent to-transparent"></div>
        </div>
        <x-container>
            <div class="text-center py-20">
                <div
                    class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-newspaper"></i>
                    Berita Desa
                </div>
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
                    Berita Desa
                </h1>
                <p class="text-lg text-neutral-200 max-w-3xl mx-auto leading-relaxed">
                    Dapatkan informasi terbaru seputar kegiatan, perkembangan, dan berita menarik dari Desa Sungai Kayu
                    Ara.
                </p>
            </div>
        </x-container>
    </section>

    <!-- Featured News Section -->
    <section class="py-20 bg-white">
        <x-container>
            @if ($berita->count() > 0)
                <div class="mb-16">
                    @foreach ($berita->take(1) as $beritaUtama)
                        <div
                            class="group bg-gradient-to-br from-green-50 to-green-100/30 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-green-100 transform hover:-translate-y-2">
                            <div class="grid lg:grid-cols-2 gap-0">
                                <div class="relative overflow-hidden">
                                    @if ($beritaUtama->gambar)
                                        <img src="{{ asset($beritaUtama->gambar) }}" alt="{{ $beritaUtama->judul }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                            <i class="fas fa-newspaper text-white text-6xl"></i>
                                        </div>
                                    @endif
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                    </div>
                                    @if ($beritaUtama->featured)
                                        <div class="absolute top-6 left-6">
                                            <span
                                                class="bg-green-500 text-white px-4 py-2 rounded-2xl text-sm font-bold">FEATURED</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-8 lg:p-12 flex flex-col justify-center">
                                    <div class="flex items-center gap-4 mb-4">
                                        @if ($beritaUtama->kategori)
                                            <span
                                                class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">{{ $beritaUtama->kategori->nama }}</span>
                                        @endif
                                        <div class="flex items-center gap-2 text-neutral-400 text-sm">
                                            <i class="fa-solid fa-calendar"></i>
                                            <span>{{ $beritaUtama->created_at->format('d F Y') }}</span>
                                        </div>
                                    </div>
                                    <h3
                                        class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4 group-hover:text-green-500 transition-colors duration-300">
                                        {{ $beritaUtama->judul }}
                                    </h3>
                                    <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                        {{ Str::limit(strip_tags($beritaUtama->konten), 200) }}
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
                                        <a href="{{ route('berita.show', $beritaUtama->slug) }}">
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
                        class="group bg-gradient-to-br from-green-50 to-green-100/30 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-green-100 transform hover:-translate-y-2">
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
        </x-container>
    </section>

    <!-- News Grid Section -->
    <section class="py-20 bg-gradient-to-br from-green-50 via-white to-green-50/30">
        <x-container>
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Berita <span class="text-green-500">Terkini</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Kumpulan berita terbaru seputar kegiatan dan perkembangan Desa Sungai Kayu Ara.
                </p>
            </div>

            <!-- Filter Kategori -->
            @if ($kategoriBerita->count() > 0)
                <div class="mb-12">
                    <div class="flex flex-wrap justify-center gap-3">
                        <a href="{{ route('berita') }}"
                            class="px-6 py-3 rounded-2xl font-medium transition-all duration-300 {{ request('kategori') == '' ? 'bg-green-500 text-white shadow-lg' : 'bg-white text-neutral-600 hover:bg-green-50 border border-gray-200' }}">
                            Semua Kategori
                        </a>
                        @foreach ($kategoriBerita as $kategori)
                            <a href="{{ route('berita', ['kategori' => $kategori->slug]) }}"
                                class="px-6 py-3 rounded-2xl font-medium transition-all duration-300 {{ request('kategori') == $kategori->slug ? 'bg-green-500 text-white shadow-lg' : 'bg-white text-neutral-600 hover:bg-green-50 border border-gray-200' }}">
                                {{ $kategori->nama }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- News Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if ($berita->count() > 1)
                    @foreach ($berita->skip(1) as $item)
                        <article
                            class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                            <div class="relative overflow-hidden">
                                @if ($item->gambar)
                                    <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}"
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
                                @if ($item->kategori)
                                    <div class="absolute top-4 left-4">
                                        <span
                                            class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-medium">{{ $item->kategori->nama }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-2 text-neutral-400 text-sm mb-3">
                                    <i class="fa-solid fa-calendar"></i>
                                    <span>{{ $item->created_at->format('d F Y') }}</span>
                                </div>
                                <h3
                                    class="text-xl font-bold text-neutral-800 mb-3 group-hover:text-green-500 transition-colors duration-300 line-clamp-2">
                                    {{ $item->judul }}
                                </h3>
                                <p class="text-neutral-500 mb-4 leading-relaxed line-clamp-3">
                                    {{ Str::limit(strip_tags($item->konten), 150) }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                                            <i class="fas fa-user text-white text-xs"></i>
                                        </div>
                                        <span class="text-sm font-medium text-neutral-700">Admin Desa</span>
                                    </div>
                                    <a href="{{ route('berita.show', $item->slug) }}"
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
                            <h3 class="text-xl font-bold text-gray-600 mb-2">Belum ada berita tambahan</h3>
                            <p class="text-gray-500">Berita tambahan akan segera ditampilkan di sini.</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Pagination -->
            @if ($berita->hasPages())
                <div class="mt-16 flex justify-center">
                    <nav class="flex items-center gap-2">
                        {{-- Previous Page Link --}}
                        @if ($berita->onFirstPage())
                            <span
                                class="w-10 h-10 bg-gray-200 text-gray-400 rounded-lg flex items-center justify-center cursor-not-allowed">
                                <i class="fa-solid fa-chevron-left"></i>
                            </span>
                        @else
                            <a href="{{ $berita->previousPageUrl() }}"
                                class="w-10 h-10 bg-green-500 text-white rounded-lg flex items-center justify-center hover:bg-green-600 transition-colors duration-300">
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($berita->getUrlRange(1, $berita->lastPage()) as $page => $url)
                            @if ($page == $berita->currentPage())
                                <span
                                    class="w-10 h-10 bg-green-500 text-white rounded-lg flex items-center justify-center font-semibold">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                    class="w-10 h-10 bg-white text-neutral-600 rounded-lg flex items-center justify-center hover:bg-green-50 transition-colors duration-300 border border-gray-200">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($berita->hasMorePages())
                            <a href="{{ $berita->nextPageUrl() }}"
                                class="w-10 h-10 bg-green-500 text-white rounded-lg flex items-center justify-center hover:bg-green-600 transition-colors duration-300">
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        @else
                            <span
                                class="w-10 h-10 bg-gray-200 text-gray-400 rounded-lg flex items-center justify-center cursor-not-allowed">
                                <i class="fa-solid fa-chevron-right"></i>
                            </span>
                        @endif
                    </nav>
                </div>
            @endif
        </x-container>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 bg-gradient-to-br from-green-600 to-green-700">
        <x-container>
            <div class="text-center">
                <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
                    Dapatkan Berita Terbaru
                </h2>
                <p class="text-lg text-green-100 mb-8 max-w-2xl mx-auto">
                    Berlangganan newsletter untuk mendapatkan informasi terbaru seputar kegiatan dan perkembangan Desa
                    Sungai Kayu Ara.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input type="email" placeholder="Masukkan email Anda"
                        class="flex-1 px-6 py-3 rounded-2xl border-0 focus:ring-2 focus:ring-green-300 focus:outline-none">
                    <button
                        class="bg-white text-green-600 px-8 py-3 rounded-2xl font-semibold hover:bg-green-50 transition-colors duration-300">
                        Berlangganan
                    </button>
                </div>
            </div>
        </x-container>
    </section>
</x-main-layout>

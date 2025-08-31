<x-main-layout>
    <x-slot name="title">Galeri Desa</x-slot>

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-green-700 to-green-800">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-green-600/10 via-transparent to-transparent"></div>
        </div>
        <x-container>
            <div class="text-center py-20">
                <div
                    class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-images"></i>
                    Galeri Desa
                </div>
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
                    Galeri Desa
                </h1>
                <p class="text-lg text-neutral-200 max-w-3xl mx-auto leading-relaxed">
                    Dokumentasi visual kegiatan, acara, dan momen berharga dari Desa Sungai Kayu Ara yang menampilkan
                    keindahan dan semangat masyarakat desa.
                </p>
            </div>
        </x-container>
    </section>

    <!-- Gallery Categories Section -->
    <section class="py-20 bg-white">
        <x-container>
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Kategori <span class="text-green-500">Galeri</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Pilih kategori galeri untuk melihat dokumentasi sesuai minat Anda.
                </p>
            </div>

            <!-- Category Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                @if ($kategoriGaleri->count() > 0)
                    @foreach ($kategoriGaleri as $kategori)
                        <div
                            class="group bg-white rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 transform hover:-translate-y-2 cursor-pointer">
                            <div class="text-center">
                                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4 group-hover:scale-110 transition-transform duration-300"
                                    style="background-color: {{ $kategori->warna ?? '#10B981' }}">
                                    <i class="{{ $kategori->icon ?? 'fa-solid fa-images' }} text-white text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-neutral-800 mb-2">{{ $kategori->nama }}</h3>
                                <p class="text-neutral-500">{{ $kategori->galeri_count ?? 0 }} Foto</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback jika tidak ada kategori -->
                    <div class="col-span-full">
                        <div class="text-center py-12">
                            <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-600 mb-2">Belum ada kategori galeri</h3>
                            <p class="text-gray-500">Kategori galeri akan segera ditampilkan di sini.</p>
                        </div>
                    </div>
                @endif
            </div>
        </x-container>
    </section>

    <!-- Featured Gallery Section -->
    <section class="py-20 bg-gradient-to-br from-green-50 via-white to-green-50/30">
        <x-container>
            @if ($galeri->count() > 0)
                @foreach ($galeri->take(1) as $galeriUtama)
                    <div class="mb-16">
                        <div
                            class="group bg-gradient-to-br from-green-50 to-green-100/30 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-green-100 transform hover:-translate-y-2">
                            <div class="grid lg:grid-cols-2 gap-0">
                                <div class="relative overflow-hidden">
                                    @if ($galeriUtama->gambar)
                                        <img src="{{ asset($galeriUtama->gambar) }}" alt="{{ $galeriUtama->judul }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                            <i class="fas fa-images text-white text-6xl"></i>
                                        </div>
                                    @endif
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                    </div>
                                    @if ($galeriUtama->featured)
                                        <div class="absolute top-6 left-6">
                                            <span
                                                class="bg-green-500 text-white px-4 py-2 rounded-2xl text-sm font-bold">FEATURED</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-8 lg:p-12 flex flex-col justify-center">
                                    <div class="flex items-center gap-4 mb-4">
                                        @if ($galeriUtama->kategori)
                                            <span
                                                class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">{{ $galeriUtama->kategori->nama }}</span>
                                        @endif
                                        <div class="flex items-center gap-2 text-neutral-400 text-sm">
                                            <i class="fa-solid fa-calendar"></i>
                                            <span>{{ $galeriUtama->created_at->format('d F Y') }}</span>
                                        </div>
                                    </div>
                                    <h3
                                        class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4 group-hover:text-green-500 transition-colors duration-300">
                                        {{ $galeriUtama->judul }}
                                    </h3>
                                    <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                        {{ Str::limit(strip_tags($galeriUtama->deskripsi), 200) }}
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center">
                                                <i class="fas fa-camera text-white text-sm"></i>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-neutral-800">Admin Desa</p>
                                                <p class="text-sm text-neutral-500">Fotografer Desa</p>
                                            </div>
                                        </div>
                                        <a href="{{ route('galeri.show', $galeriUtama->slug) }}"
                                            class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105">
                                            Lihat Album
                                            <i class="fa-solid fa-images"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Fallback jika tidak ada galeri -->
                <div class="mb-16">
                    <div
                        class="group bg-gradient-to-br from-green-50 to-green-100/30 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-green-100 transform hover:-translate-y-2">
                        <div class="grid lg:grid-cols-2 gap-0">
                            <div class="relative overflow-hidden">
                                <div
                                    class="w-full h-full bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                    <i class="fas fa-images text-white text-6xl"></i>
                                </div>
                            </div>
                            <div class="p-8 lg:p-12 flex flex-col justify-center">
                                <h3 class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4">
                                    Belum ada galeri tersedia
                                </h3>
                                <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                    Galeri foto akan segera ditampilkan di sini.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </x-container>
    </section>

    <!-- Gallery Grid Section -->
    <section class="py-20 bg-white">
        <x-container>
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Galeri <span class="text-green-500">Foto</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Kumpulan foto terbaik yang menampilkan berbagai aspek kehidupan dan keindahan Desa Sungai Kayu Ara.
                </p>
            </div>

            <!-- Filter Kategori -->
            @if ($kategoriGaleri->count() > 0)
                <div class="mb-12">
                    <div class="flex flex-wrap justify-center gap-3">
                        <a href="{{ route('galeri') }}"
                            class="px-6 py-3 rounded-2xl font-medium transition-all duration-300 {{ request('kategori') == '' ? 'bg-green-500 text-white shadow-lg' : 'bg-white text-neutral-600 hover:bg-green-50 border border-gray-200' }}">
                            Semua Kategori
                        </a>
                        @foreach ($kategoriGaleri as $kategori)
                            <a href="{{ route('galeri', ['kategori' => $kategori->slug]) }}"
                                class="px-6 py-3 rounded-2xl font-medium transition-all duration-300 {{ request('kategori') == $kategori->slug ? 'bg-green-500 text-white shadow-lg' : 'bg-white text-neutral-600 hover:bg-green-50 border border-gray-200' }}">
                                {{ $kategori->nama }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Gallery Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @if ($galeri->count() > 1)
                    @foreach ($galeri->skip(1) as $item)
                        <div
                            class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                            <div class="relative overflow-hidden">
                                @if ($item->gambar)
                                    <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}"
                                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-64 bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                        <i class="fas fa-images text-white text-4xl"></i>
                                    </div>
                                @endif
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                                @if ($item->kategori)
                                    <div class="absolute top-4 left-4">
                                        <span
                                            class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-medium">{{ $item->kategori->nama }}</span>
                                    </div>
                                @endif
                                <div
                                    class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-4 mx-4 text-center">
                                        <h4 class="font-bold text-neutral-800 mb-2">{{ $item->judul }}</h4>
                                        <p class="text-sm text-neutral-600">
                                            {{ Str::limit(strip_tags($item->deskripsi), 100) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-2 text-neutral-400 text-sm mb-3">
                                    <i class="fa-solid fa-calendar"></i>
                                    <span>{{ $item->created_at->format('d F Y') }}</span>
                                </div>
                                <h3
                                    class="text-lg font-bold text-neutral-800 mb-3 group-hover:text-green-500 transition-colors duration-300 line-clamp-2">
                                    {{ $item->judul }}
                                </h3>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <i class="fa-solid fa-camera text-green-500"></i>
                                        <span class="text-sm font-medium text-neutral-700">Admin Desa</span>
                                    </div>
                                    <a href="{{ route('galeri.show', $item->slug) }}"
                                        class="inline-flex items-center gap-2 text-green-500 font-semibold transition-colors duration-300 hover:text-green-600">
                                        Lihat
                                        <i class="fa-solid fa-eye text-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback jika tidak ada galeri tambahan -->
                    <div class="col-span-full">
                        <div class="text-center py-12">
                            <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-600 mb-2">Belum ada galeri tambahan</h3>
                            <p class="text-gray-500">Galeri tambahan akan segera ditampilkan di sini.</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Pagination -->
            @if ($galeri instanceof \Illuminate\Pagination\LengthAwarePaginator && $galeri->hasPages())
                <div class="mt-16 flex justify-center">
                    <nav class="flex items-center gap-2">
                        {{-- Previous Page Link --}}
                        @if ($galeri->onFirstPage())
                            <span
                                class="w-10 h-10 bg-gray-200 text-gray-400 rounded-lg flex items-center justify-center cursor-not-allowed">
                                <i class="fa-solid fa-chevron-left"></i>
                            </span>
                        @else
                            <a href="{{ $galeri->previousPageUrl() }}"
                                class="w-10 h-10 bg-green-500 text-white rounded-lg flex items-center justify-center hover:bg-green-600 transition-colors duration-300">
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($galeri->getUrlRange(1, $galeri->lastPage()) as $page => $url)
                            @if ($page == $galeri->currentPage())
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
                        @if ($galeri->hasMorePages())
                            <a href="{{ $galeri->nextPageUrl() }}"
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
</x-main-layout>

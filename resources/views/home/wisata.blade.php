<x-main-layout>
    <x-slot name="title">Wisata Alam</x-slot>

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-green-700 to-green-800">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-green-600/10 via-transparent to-transparent"></div>
        </div>
        <x-container>
            <div class="text-center py-20">
                <div
                    class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-mountain"></i>
                    Wisata Alam
                </div>
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
                    Wisata Alam
                </h1>
                <p class="text-lg text-neutral-200 max-w-3xl mx-auto leading-relaxed">
                    Jelajahi keindahan alam dan destinasi wisata menarik di Desa Sungai Kayu Ara yang menawarkan
                    pengalaman
                    liburan yang tak terlupakan.
                </p>
            </div>
        </x-container>
    </section>

    <!-- Featured Wisata Section -->
    @if ($wisataUtama)
        <section class="py-20 bg-gradient-to-br from-green-50 via-white to-green-50/30">
            <x-container>
                <div class="mb-16">
                    <div
                        class="group bg-gradient-to-br from-green-50 to-green-100/30 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-green-100 transform hover:-translate-y-2">
                        <div class="grid lg:grid-cols-2 gap-0">
                            <div class="relative overflow-hidden">
                                @if ($wisataUtama->gambar)
                                    <img src="{{ asset($wisataUtama->gambar) }}" alt="{{ $wisataUtama->nama }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                        <i class="fas fa-mountain text-white text-6xl"></i>
                                    </div>
                                @endif
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                </div>
                                @if ($wisataUtama->featured)
                                    <div class="absolute top-6 left-6">
                                        <span
                                            class="bg-green-500 text-white px-4 py-2 rounded-2xl text-sm font-bold">FEATURED</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-8 lg:p-12 flex flex-col justify-center">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="flex items-center gap-2 text-green-500">
                                        <i class="fa-solid fa-mountain"></i>
                                        <span class="text-sm font-medium">Wisata Alam</span>
                                    </div>
                                    @if ($wisataUtama->featured)
                                        <div class="flex items-center gap-2 text-yellow-500">
                                            <i class="fa-solid fa-star"></i>
                                            <span class="text-sm font-medium">Featured</span>
                                        </div>
                                    @endif
                                </div>

                                <h2 class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4">
                                    {{ $wisataUtama->nama }}
                                </h2>

                                <p class="text-neutral-600 mb-6 leading-relaxed">
                                    {{ Str::limit($wisataUtama->deskripsi, 200) }}
                                </p>

                                <div class="flex items-center gap-6 mb-8">
                                    @if ($wisataUtama->lokasi)
                                        <div class="flex items-center gap-2 text-neutral-600">
                                            <i class="fa-solid fa-map-marker-alt text-green-500"></i>
                                            <span class="text-sm">{{ $wisataUtama->lokasi }}</span>
                                        </div>
                                    @endif
                                    @if ($wisataUtama->jam_operasional)
                                        <div class="flex items-center gap-2 text-neutral-600">
                                            <i class="fa-solid fa-clock text-green-500"></i>
                                            <span class="text-sm">{{ $wisataUtama->jam_operasional }}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex gap-4">
                                    <a href="{{ route('wisata.show', $wisataUtama->slug) }}"
                                        class="inline-flex items-center gap-2 bg-green-600 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 hover:bg-green-700 hover:scale-105">
                                        Lihat Detail
                                        <i class="fa-solid fa-arrow-right text-sm"></i>
                                    </a>
                                    @if ($wisataUtama->harga_tiket)
                                        <div
                                            class="inline-flex items-center gap-2 bg-yellow-100 text-yellow-700 px-4 py-3 rounded-xl font-semibold">
                                            <i class="fa-solid fa-ticket"></i>
                                            Rp {{ number_format($wisataUtama->harga_tiket, 0, ',', '.') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-container>
        </section>
    @endif

    <!-- All Wisata Section -->
    <section class="py-20 bg-white">
        <x-container>
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Semua <span class="text-green-500">Wisata</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Temukan berbagai destinasi wisata menarik yang bisa Anda kunjungi di Desa Sungai Kayu Ara.
                </p>
            </div>

            @if ($wisataLainnya->count() > 0)
                <!-- Wisata Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                    @foreach ($wisataLainnya as $wisata)
                        <div
                            class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                            <!-- Image -->
                            <div class="relative overflow-hidden">
                                @if ($wisata->gambar)
                                    <img src="{{ asset($wisata->gambar) }}" alt="{{ $wisata->nama }}"
                                        class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-48 bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                        <i class="fas fa-mountain text-white text-4xl"></i>
                                    </div>
                                @endif
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                </div>
                                @if ($wisata->featured)
                                    <div class="absolute top-4 left-4">
                                        <span
                                            class="bg-green-500 text-white px-3 py-1 rounded-xl text-xs font-bold">FEATURED</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <div class="flex items-center gap-2 mb-3">
                                    <div class="flex items-center gap-1 text-green-500">
                                        <i class="fa-solid fa-mountain text-sm"></i>
                                        <span class="text-xs font-medium">Wisata Alam</span>
                                    </div>
                                    @if ($wisata->featured)
                                        <div class="flex items-center gap-1 text-yellow-500">
                                            <i class="fa-solid fa-star text-sm"></i>
                                            <span class="text-xs font-medium">Featured</span>
                                        </div>
                                    @endif
                                </div>

                                <h3 class="text-xl font-bold text-neutral-800 mb-3 line-clamp-2">
                                    {{ $wisata->nama }}
                                </h3>

                                <p class="text-neutral-600 text-sm mb-4 line-clamp-3 leading-relaxed">
                                    {{ Str::limit($wisata->deskripsi, 120) }}
                                </p>

                                <div class="flex items-center gap-4 mb-4">
                                    @if ($wisata->lokasi)
                                        <div class="flex items-center gap-1 text-neutral-500">
                                            <i class="fa-solid fa-map-marker-alt text-green-500 text-xs"></i>
                                            <span class="text-xs">{{ Str::limit($wisata->lokasi, 20) }}</span>
                                        </div>
                                    @endif
                                    @if ($wisata->jam_operasional)
                                        <div class="flex items-center gap-1 text-neutral-500">
                                            <i class="fa-solid fa-clock text-green-500 text-xs"></i>
                                            <span class="text-xs">{{ Str::limit($wisata->jam_operasional, 15) }}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex items-center justify-between">
                                    @if ($wisata->harga_tiket)
                                        <div class="text-green-600 font-semibold text-sm">
                                            Rp {{ number_format($wisata->harga_tiket, 0, ',', '.') }}
                                        </div>
                                    @endif
                                    <a href="{{ route('wisata.show', $wisata->slug) }}"
                                        class="inline-flex items-center gap-2 text-green-500 hover:text-green-600 font-semibold transition-colors duration-300">
                                        Lihat
                                        <i class="fa-solid fa-eye text-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if ($wisataLainnya->hasPages())
                    <div class="mt-16 flex justify-center">
                        <nav class="flex items-center gap-2">
                            {{-- Previous Page Link --}}
                            @if ($wisataLainnya->onFirstPage())
                                <span
                                    class="w-10 h-10 bg-gray-200 text-gray-400 rounded-lg flex items-center justify-center cursor-not-allowed">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </span>
                            @else
                                <a href="{{ $wisataLainnya->previousPageUrl() }}"
                                    class="w-10 h-10 bg-green-500 text-white rounded-lg flex items-center justify-center hover:bg-green-600 transition-colors duration-300">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($wisataLainnya->getUrlRange(1, $wisataLainnya->lastPage()) as $page => $url)
                                @if ($page == $wisataLainnya->currentPage())
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
                            @if ($wisataLainnya->hasMorePages())
                                <a href="{{ $wisataLainnya->nextPageUrl() }}"
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
            @else
                <!-- Empty State -->
                <div class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-green-100 rounded-full mb-6">
                        <i class="fas fa-mountain text-4xl text-green-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-neutral-800 mb-4">Belum ada wisata tersedia</h3>
                    <p class="text-neutral-500 max-w-md mx-auto">
                        Destinasi wisata akan segera ditambahkan. Silakan cek kembali nanti.
                    </p>
                </div>
            @endif
        </x-container>
    </section>

    <!-- Call to Action Section -->
    <section class="py-20 bg-gradient-to-br from-green-600 to-green-700">
        <x-container>
            <div class="text-center">
                <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
                    Siap untuk Berpetualang?
                </h2>
                <p class="text-lg text-green-100 max-w-2xl mx-auto mb-8 leading-relaxed">
                    Jelajahi keindahan alam Desa Sungai Kayu Ara dan nikmati pengalaman wisata yang tak terlupakan
                    bersama keluarga dan teman-teman.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 bg-white text-green-600 px-8 py-4 rounded-xl font-semibold transition-all duration-300 hover:bg-green-50 hover:scale-105">
                        <i class="fa-solid fa-home"></i>
                        Kembali ke Beranda
                    </a>
                    <a href="{{ route('peta') }}"
                        class="inline-flex items-center gap-2 bg-transparent text-white border-2 border-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 hover:bg-white hover:text-green-600 hover:scale-105">
                        <i class="fa-solid fa-map"></i>
                        Lihat Peta
                    </a>
                </div>
            </div>
        </x-container>
    </section>
</x-main-layout>

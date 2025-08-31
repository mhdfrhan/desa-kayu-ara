<x-main-layout>
    <x-slot name="title">Produk Desa</x-slot>

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-green-700 to-green-800">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-green-600/10 via-transparent to-transparent"></div>
        </div>
        <x-container>
            <div class="text-center py-20">
                <div
                    class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-shopping-bag"></i>
                    Produk Desa
                </div>
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
                    Produk Desa
                </h1>
                <p class="text-lg text-neutral-200 max-w-3xl mx-auto leading-relaxed">
                    Temukan berbagai produk unggulan hasil karya warga Desa Sungai Kayu Ara yang berkualitas dan
                    bernilai ekonomi tinggi.
                </p>
            </div>
        </x-container>
    </section>

    <!-- Featured Product Section -->
    <section class="py-20 bg-white">
        <x-container>
            @if ($produk->count() > 0)
                @foreach ($produk->take(1) as $produkUtama)
                    <div class="mb-16">
                        <div
                            class="group bg-gradient-to-br from-green-50 to-green-100/30 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-green-100 transform hover:-translate-y-2">
                            <div class="grid lg:grid-cols-2 gap-0">
                                <div class="relative overflow-hidden">
                                    @if ($produkUtama->gambar)
                                        <img src="{{ asset($produkUtama->gambar) }}" alt="{{ $produkUtama->nama }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                            <i class="fas fa-shopping-bag text-white text-6xl"></i>
                                        </div>
                                    @endif
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                    </div>
                                    @if ($produkUtama->featured)
                                        <div class="absolute top-6 left-6">
                                            <span
                                                class="bg-green-500 text-white px-4 py-2 rounded-2xl text-sm font-bold">FEATURED</span>
                                        </div>
                                    @endif
                                    @if ($produkUtama->best_seller)
                                        <div class="absolute top-6 right-6">
                                            <span
                                                class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">BEST
                                                SELLER</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-8 lg:p-12 flex flex-col justify-center">
                                    <div class="flex items-center gap-4 mb-4">
                                        @if ($produkUtama->kategori)
                                            <span
                                                class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">{{ $produkUtama->kategori->nama }}</span>
                                        @endif
                                        <div class="flex items-center gap-2 text-neutral-400 text-sm">
                                            <i class="fa-solid fa-star text-yellow-400"></i>
                                            <span>{{ $produkUtama->rating ?? '4.5' }}
                                                ({{ $produkUtama->jumlah_penjualan ?? 0 }}+ terjual)
                                            </span>
                                        </div>
                                    </div>
                                    <h3
                                        class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4 group-hover:text-green-500 transition-colors duration-300">
                                        {{ $produkUtama->nama }}
                                    </h3>
                                    <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                        {{ Str::limit(strip_tags($produkUtama->deskripsi), 200) }}
                                    </p>
                                    <div class="flex items-center gap-4 mb-6">
                                        <div class="text-3xl font-bold text-green-500">Rp
                                            {{ number_format($produkUtama->harga, 0, ',', '.') }}</div>
                                        @if ($produkUtama->harga_diskon && $produkUtama->harga_diskon < $produkUtama->harga)
                                            <div class="text-lg text-neutral-400 line-through">Rp
                                                {{ number_format($produkUtama->harga_diskon, 0, ',', '.') }}</div>
                                            @php
                                                $diskon = round(
                                                    (($produkUtama->harga - $produkUtama->harga_diskon) /
                                                        $produkUtama->harga) *
                                                        100,
                                                );
                                            @endphp
                                            <div class="bg-red-100 text-red-600 px-2 py-1 rounded text-sm font-medium">
                                                {{ $diskon }}% OFF</div>
                                        @endif
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="text-sm text-neutral-400">
                                            {{ $produkUtama->created_at->diffForHumans() }}</div>
                                        <a href="{{ route('produk.show', $produkUtama->slug) }}">
                                            <x-primary-button>
                                                Pesan Sekarang
                                                <i class="fa-solid fa-shopping-cart"></i>
                                            </x-primary-button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Fallback jika tidak ada produk -->
                <div class="mb-16">
                    <div
                        class="group bg-gradient-to-br from-green-50 to-green-100/30 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-green-100 transform hover:-translate-y-2">
                        <div class="grid lg:grid-cols-2 gap-0">
                            <div class="relative overflow-hidden">
                                <div
                                    class="w-full h-full bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                    <i class="fas fa-shopping-bag text-white text-6xl"></i>
                                </div>
                            </div>
                            <div class="p-8 lg:p-12 flex flex-col justify-center">
                                <h3 class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4">
                                    Belum ada produk tersedia
                                </h3>
                                <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                    Produk unggulan akan segera ditampilkan di sini.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </x-container>
    </section>

    <!-- Product Categories Section -->
    <section class="py-20 bg-gradient-to-br from-green-50 via-white to-green-50/30">
        <x-container>
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Kategori <span class="text-green-500">Produk</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Pilih kategori produk sesuai kebutuhan Anda.
                </p>
            </div>

            <!-- Category Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                @if ($kategoriProduk->count() > 0)
                    @foreach ($kategoriProduk as $kategori)
                        <div
                            class="group bg-white rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 transform hover:-translate-y-2 cursor-pointer">
                            <div class="text-center">
                                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4 group-hover:scale-110 transition-transform duration-300"
                                    style="background-color: {{ $kategori->warna ?? '#10B981' }}">
                                    <i
                                        class="{{ $kategori->icon ?? 'fa-solid fa-shopping-bag' }} text-white text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-neutral-800 mb-2">{{ $kategori->nama }}</h3>
                                <p class="text-neutral-500">{{ $kategori->produk_count ?? 0 }} Produk</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback jika tidak ada kategori -->
                    <div class="col-span-full">
                        <div class="text-center py-12">
                            <i class="fas fa-shopping-bag text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-600 mb-2">Belum ada kategori produk</h3>
                            <p class="text-gray-500">Kategori produk akan segera ditampilkan di sini.</p>
                        </div>
                    </div>
                @endif
            </div>
        </x-container>
    </section>

    <!-- Products Grid Section -->
    <section class="py-20 bg-white">
        <x-container>
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Produk <span class="text-green-500">Unggulan</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Kumpulan produk terbaik hasil karya warga Desa Sungai Kayu Ara.
                </p>
            </div>

            <!-- Filter Kategori -->
            @if ($kategoriProduk->count() > 0)
                <div class="mb-12">
                    <div class="flex flex-wrap justify-center gap-3">
                        <a href="{{ route('produk') }}"
                            class="px-6 py-3 rounded-2xl font-medium transition-all duration-300 {{ request('kategori') == '' ? 'bg-green-500 text-white shadow-lg' : 'bg-white text-neutral-600 hover:bg-green-50 border border-gray-200' }}">
                            Semua Kategori
                        </a>
                        @foreach ($kategoriProduk as $kategori)
                            <a href="{{ route('produk', ['kategori' => $kategori->slug]) }}"
                                class="px-6 py-3 rounded-2xl font-medium transition-all duration-300 {{ request('kategori') == $kategori->slug ? 'bg-green-500 text-white shadow-lg' : 'bg-white text-neutral-600 hover:bg-green-50 border border-gray-200' }}">
                                {{ $kategori->nama }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Products Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @if ($produk->count() > 1)
                    @foreach ($produk->skip(1) as $item)
                        <div
                            class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                            <div class="relative overflow-hidden">
                                @if ($item->gambar)
                                    <img src="{{ asset($item->gambar) }}" alt="{{ $item->nama }}"
                                        class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-48 bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                        <i class="fas fa-shopping-bag text-white text-4xl"></i>
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
                                @if ($item->harga_diskon && $item->harga_diskon < $item->harga)
                                    @php
                                        $diskon = round((($item->harga - $item->harga_diskon) / $item->harga) * 100);
                                    @endphp
                                    <div class="absolute top-4 right-4">
                                        <span
                                            class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-bold">{{ $diskon }}%
                                            OFF</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-2 text-neutral-400 text-sm mb-3">
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                    <span>{{ $item->rating ?? '4.5' }} ({{ $item->jumlah_penjualan ?? 0 }}+
                                        terjual)</span>
                                </div>
                                <h3
                                    class="text-lg font-bold text-neutral-800 mb-3 group-hover:text-green-500 transition-colors duration-300 line-clamp-2">
                                    {{ $item->nama }}
                                </h3>
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="text-xl font-bold text-green-500">Rp
                                        {{ number_format($item->harga, 0, ',', '.') }}</div>
                                    @if ($item->harga_diskon && $item->harga_diskon < $item->harga)
                                        <div class="text-sm text-neutral-400 line-through">Rp
                                            {{ number_format($item->harga_diskon, 0, ',', '.') }}</div>
                                    @endif
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-neutral-400">{{ $item->created_at->diffForHumans() }}
                                    </div>
                                    <a href="{{ route('produk.show', $item->slug) }}"
                                        class="inline-flex items-center gap-2 text-green-500 font-semibold transition-colors duration-300 hover:text-green-600">
                                        Beli
                                        <i class="fa-solid fa-shopping-cart text-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback jika tidak ada produk tambahan -->
                    <div class="col-span-full">
                        <div class="text-center py-12">
                            <i class="fas fa-shopping-bag text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-600 mb-2">Belum ada produk tambahan</h3>
                            <p class="text-gray-500">Produk tambahan akan segera ditampilkan di sini.</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Pagination -->
            @if ($produk instanceof \Illuminate\Pagination\LengthAwarePaginator && $produk->hasPages())
                <div class="mt-16 flex justify-center">
                    <nav class="flex items-center gap-2">
                        {{-- Previous Page Link --}}
                        @if ($produk->onFirstPage())
                            <span
                                class="w-10 h-10 bg-gray-200 text-gray-400 rounded-lg flex items-center justify-center cursor-not-allowed">
                                <i class="fa-solid fa-chevron-left"></i>
                            </span>
                        @else
                            <a href="{{ $produk->previousPageUrl() }}"
                                class="w-10 h-10 bg-green-500 text-white rounded-lg flex items-center justify-center hover:bg-green-600 transition-colors duration-300">
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($produk->getUrlRange(1, $produk->lastPage()) as $page => $url)
                            @if ($page == $produk->currentPage())
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
                        @if ($produk->hasMorePages())
                            <a href="{{ $produk->nextPageUrl() }}"
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

    <!-- Call to Action Section -->
    <section class="py-20 bg-gradient-to-br from-green-600 to-green-700">
        <x-container>
            <div class="text-center">
                <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
                    Ingin Menjual Produk Anda?
                </h2>
                <p class="text-lg text-green-100 mb-8 max-w-2xl mx-auto">
                    Bergabunglah dengan platform produk desa kami dan jual produk Anda ke seluruh Indonesia.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#"
                        class="inline-flex items-center gap-2 bg-white text-green-600 px-8 py-3 rounded-2xl font-semibold hover:bg-green-50 transition-colors duration-300">
                        Daftar UMKM
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="#"
                        class="inline-flex items-center gap-2 border-2 border-white text-white px-8 py-3 rounded-2xl font-semibold hover:bg-white hover:text-green-600 transition-colors duration-300">
                        Hubungi Kami
                        <i class="fa-solid fa-phone"></i>
                    </a>
                </div>
            </div>
        </x-container>
    </section>
</x-main-layout>

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
            <div class="mb-16">
                <div
                    class="group bg-gradient-to-br from-green-50 to-green-100/30 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-green-100 transform hover:-translate-y-2">
                    <div class="grid lg:grid-cols-2 gap-0">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1582735689369-4fe89db7114c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                                alt="Produk Unggulan"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                            </div>
                            <div class="absolute top-6 left-6">
                                <span
                                    class="bg-green-500 text-white px-4 py-2 rounded-2xl text-sm font-bold">FEATURED</span>
                            </div>
                            <div class="absolute top-6 right-6">
                                <span class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">BEST
                                    SELLER</span>
                            </div>
                        </div>
                        <div class="p-8 lg:p-12 flex flex-col justify-center">
                            <div class="flex items-center gap-4 mb-4">
                                <span
                                    class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Makanan</span>
                                <div class="flex items-center gap-2 text-neutral-400 text-sm">
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                    <span>4.9 (150+ ulasan)</span>
                                </div>
                            </div>
                            <h3
                                class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4 group-hover:text-green-500 transition-colors duration-300">
                                Keripik Singkong Balado
                            </h3>
                            <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                Keripik singkong balado dengan cita rasa pedas yang khas dan tekstur renyah. Dibuat dari
                                singkong pilihan dengan bumbu balado tradisional yang diracik khusus.
                            </p>
                            <div class="flex items-center gap-4 mb-6">
                                <div class="text-3xl font-bold text-green-500">Rp 15.000</div>
                                <div class="text-lg text-neutral-400 line-through">Rp 20.000</div>
                                <div class="bg-red-100 text-red-600 px-2 py-1 rounded text-sm font-medium">25% OFF</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-neutral-400">3 Hari yang lalu</div>
                                <a href="#">
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
                @php
                    $categories = [
                        [
                            'name' => 'Makanan',
                            'icon' => 'fa-solid fa-utensils',
                            'count' => '24',
                            'color' => 'bg-orange-500',
                        ],
                        [
                            'name' => 'Kerajinan',
                            'icon' => 'fa-solid fa-hands-holding',
                            'count' => '18',
                            'color' => 'bg-blue-500',
                        ],
                        [
                            'name' => 'Pertanian',
                            'icon' => 'fa-solid fa-seedling',
                            'count' => '32',
                            'color' => 'bg-green-500',
                        ],
                        [
                            'name' => 'Fashion',
                            'icon' => 'fa-solid fa-tshirt',
                            'count' => '15',
                            'color' => 'bg-purple-500',
                        ],
                    ];
                @endphp

                @foreach ($categories as $category)
                    <div
                        class="group bg-white rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 transform hover:-translate-y-2 cursor-pointer">
                        <div class="text-center">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 {{ $category['color'] }} rounded-2xl mb-4 group-hover:scale-110 transition-transform duration-300">
                                <i class="{{ $category['icon'] }} text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-neutral-800 mb-2">{{ $category['name'] }}</h3>
                            <p class="text-neutral-500">{{ $category['count'] }} Produk</p>
                        </div>
                    </div>
                @endforeach
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

            <!-- Products Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @php
                    $products = [
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                            'category' => 'Makanan',
                            'name' => 'Keripik Singkong Balado',
                            'price' => '15000',
                            'original_price' => '20000',
                            'discount' => '25',
                            'rating' => '4.9',
                            'reviews' => '150',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80',
                            'category' => 'Kerajinan',
                            'name' => 'Tas Anyaman Bambu',
                            'price' => '85000',
                            'original_price' => '100000',
                            'discount' => '15',
                            'rating' => '4.8',
                            'reviews' => '89',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1643870358098-3549ac3bca46?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Pertanian',
                            'name' => 'Beras Organik Premium',
                            'price' => '25000',
                            'original_price' => '30000',
                            'discount' => '17',
                            'rating' => '4.9',
                            'reviews' => '234',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1671080749889-19f8a69deb2b?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Fashion',
                            'name' => 'Batik Tulis Sungai Kayu',
                            'price' => '350000',
                            'original_price' => '400000',
                            'discount' => '13',
                            'rating' => '5.0',
                            'reviews' => '67',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                            'category' => 'Makanan',
                            'name' => 'Dodol Betawi',
                            'price' => '25000',
                            'original_price' => '30000',
                            'discount' => '17',
                            'rating' => '4.7',
                            'reviews' => '112',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80',
                            'category' => 'Kerajinan',
                            'name' => 'Vas Bambu Ukir',
                            'price' => '120000',
                            'original_price' => '150000',
                            'discount' => '20',
                            'rating' => '4.8',
                            'reviews' => '45',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1643870358098-3549ac3bca46?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Pertanian',
                            'name' => 'Sayur Organik Segar',
                            'price' => '15000',
                            'original_price' => '18000',
                            'discount' => '17',
                            'rating' => '4.9',
                            'reviews' => '178',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1671080749889-19f8a69deb2b?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Fashion',
                            'name' => 'Sarung Tenun',
                            'price' => '180000',
                            'original_price' => '220000',
                            'discount' => '18',
                            'rating' => '4.7',
                            'reviews' => '93',
                        ],
                    ];
                @endphp

                @foreach ($products as $product)
                    <div
                        class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent">
                            </div>
                            <div class="absolute top-4 left-4">
                                <span
                                    class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-medium">{{ $product['category'] }}</span>
                            </div>
                            @if ($product['discount'] > 0)
                                <div class="absolute top-4 right-4">
                                    <span
                                        class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-bold">{{ $product['discount'] }}%
                                        OFF</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-neutral-400 text-sm mb-3">
                                <i class="fa-solid fa-star text-yellow-400"></i>
                                <span>{{ $product['rating'] }} ({{ $product['reviews'] }}+ ulasan)</span>
                            </div>
                            <h3
                                class="text-lg font-bold text-neutral-800 mb-3 group-hover:text-green-500 transition-colors duration-300 line-clamp-2">
                                {{ $product['name'] }}
                            </h3>
                            <div class="flex items-center gap-3 mb-4">
                                <div class="text-xl font-bold text-green-500">Rp
                                    {{ number_format($product['price'], 0, ',', '.') }}</div>
                                @if ($product['original_price'] > $product['price'])
                                    <div class="text-sm text-neutral-400 line-through">Rp
                                        {{ number_format($product['original_price'], 0, ',', '.') }}</div>
                                @endif
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-neutral-400">3 Hari yang lalu</div>
                                <a href="#"
                                    class="inline-flex items-center gap-2 text-green-500 font-semibold transition-colors duration-300 hover:text-green-600">
                                    Beli
                                    <i class="fa-solid fa-shopping-cart text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-16 flex justify-center">
                <nav class="flex items-center gap-2">
                    <a href="#"
                        class="w-10 h-10 bg-green-500 text-white rounded-lg flex items-center justify-center hover:bg-green-600 transition-colors duration-300">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-green-500 text-white rounded-lg flex items-center justify-center hover:bg-green-600 transition-colors duration-300">
                        1
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-white text-neutral-600 rounded-lg flex items-center justify-center hover:bg-green-50 transition-colors duration-300 border border-gray-200">
                        2
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-white text-neutral-600 rounded-lg flex items-center justify-center hover:bg-green-50 transition-colors duration-300 border border-gray-200">
                        3
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-white text-neutral-600 rounded-lg flex items-center justify-center hover:bg-green-50 transition-colors duration-300 border border-gray-200">
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </nav>
            </div>
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






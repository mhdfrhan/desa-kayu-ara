<x-main-layout>
    <x-slot name="title">{{ $produk->nama ?? 'Detail Produk' }}</x-slot>

    @push('styles')
        <style>
            /* Custom styles for product detail */
            .product-gallery {
                position: relative;
            }

            .product-gallery .main-image {
                transition: all 0.3s ease;
            }



            .product-info {
                position: sticky;
                top: 2rem;
            }

            .price-tag {
                background: linear-gradient(135deg, #10b981, #059669);
                color: white;
                padding: 0.5rem 1rem;
                border-radius: 1rem;
                font-weight: bold;
                display: inline-block;
            }

            .discount-badge {
                background: linear-gradient(135deg, #ef4444, #dc2626);
                color: white;
                padding: 0.25rem 0.75rem;
                border-radius: 0.5rem;
                font-size: 0.875rem;
                font-weight: bold;
            }

            .feature-badge {
                background: linear-gradient(135deg, #f59e0b, #d97706);
                color: white;
                padding: 0.25rem 0.75rem;
                border-radius: 0.5rem;
                font-size: 0.875rem;
                font-weight: bold;
            }



            .related-product {
                transition: all 0.3s ease;
            }

            .related-product:hover {
                transform: translateY(-4px);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }

            .breadcrumb-item {
                transition: all 0.3s ease;
            }

            .breadcrumb-item:hover {
                color: #10b981;
            }



            @media (max-width: 768px) {
                .product-info {
                    position: static;
                }
            }
        </style>
    @endpush

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-green-700 to-green-800">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-green-600/10 via-transparent to-transparent"></div>
        </div>
        <x-container>
            <div class="text-center pt-20 pb-12">
                <div
                    class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-shopping-bag"></i>
                    Produk Detail
                </div>
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
                    {{ $produk->nama }}
                </h1>
            </div>
        </x-container>
    </section>

    <!-- Breadcrumb Section -->
    <section class="bg-gradient-to-r from-green-50 to-green-100/50 py-8">
        <x-container>
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="breadcrumb-item text-neutral-600 hover:text-green-600">
                    <i class="fa-solid fa-home"></i>
                    Beranda
                </a>
                <span class="text-neutral-400">
                    <i class="fa-solid fa-chevron-right"></i>
                </span>
                <a href="{{ route('produk') }}" class="breadcrumb-item text-neutral-600 hover:text-green-600">
                    Produk Desa
                </a>
                <span class="text-neutral-400">
                    <i class="fa-solid fa-chevron-right"></i>
                </span>
                <span class="text-green-600 font-medium">{{ $produk->nama ?? 'Detail Produk' }}</span>
            </nav>
        </x-container>
    </section>

    @if ($produk)
        <!-- Product Detail Section -->
        <section class="py-16 bg-white">
            <x-container>
                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Product Gallery -->
                    <div class="product-gallery">
                        <div class="mb-6">
                            <div class="relative overflow-hidden rounded-3xl shadow-lg">
                                @if ($produk->gambar)
                                    <img id="mainImage" src="{{ asset($produk->gambar) }}" alt="{{ $produk->nama }}"
                                        class="main-image w-full h-96 lg:h-[500px] object-cover">
                                @else
                                    <div
                                        class="w-full h-96 lg:h-[500px] bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                        <i class="fas fa-box text-white text-6xl"></i>
                                    </div>
                                @endif

                                <!-- Badges -->
                                <div class="absolute top-4 left-4 flex flex-col gap-2">
                                    @if ($produk->featured)
                                        <span class="feature-badge">
                                            <i class="fa-solid fa-star"></i>
                                            FEATURED
                                        </span>
                                    @endif
                                    @if ($produk->best_seller)
                                        <span class="discount-badge">
                                            <i class="fa-solid fa-fire"></i>
                                            BEST SELLER
                                        </span>
                                    @endif
                                </div>

                                @if ($produk->rating)
                                    <div class="absolute top-4 right-4">
                                        <div
                                            class="bg-white/90 backdrop-blur-sm rounded-full px-3 py-2 flex items-center gap-2">
                                            <i class="fa-solid fa-star text-yellow-500"></i>
                                            <span class="font-bold text-neutral-800">{{ $produk->rating }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>


                    </div>

                    <!-- Product Info -->
                    <div class="product-info">
                        <!-- Category Badge -->
                        @if ($produk->kategori)
                            <div class="mb-4">
                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-medium">
                                    <i class="fa-solid fa-tag"></i>
                                    {{ $produk->kategori->nama }}
                                </span>
                            </div>
                        @endif

                        <!-- Product Title -->
                        <h1 class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4">
                            {{ $produk->nama }}
                        </h1>

                        <!-- Rating and Reviews -->
                        @if ($produk->rating || $produk->jumlah_terjual)
                            <div class="flex items-center gap-4 mb-6">
                                @if ($produk->rating)
                                    <div class="flex items-center gap-2">
                                        <div class="flex items-center">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i
                                                    class="fa-solid fa-star {{ $i <= $produk->rating ? 'text-yellow-500' : 'text-gray-300' }}"></i>
                                            @endfor
                                        </div>
                                        <span class="text-neutral-600 font-medium">{{ $produk->rating }}/5</span>
                                    </div>
                                @endif
                                @if ($produk->terjual)
                                    <div class="flex items-center gap-2 text-neutral-600">
                                        <i class="fa-solid fa-shopping-cart"></i>
                                        <span>{{ $produk->terjual }}+ terjual</span>
                                    </div>
                                @endif
                            </div>
                        @endif

                        <!-- Price Section -->
                        <div class="mb-8">
                            @if ($produk->harga_diskon && $produk->harga_diskon < $produk->harga)
                                <div class="flex items-center gap-4 mb-2">
                                    <span class="price-tag text-2xl">
                                        Rp {{ number_format($produk->harga_diskon, 0, ',', '.') }}
                                    </span>
                                    <span class="text-xl text-neutral-400 line-through">
                                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                    </span>
                                    @php
                                        $diskon = round(
                                            (($produk->harga - $produk->harga_diskon) / $produk->harga) * 100,
                                        );
                                    @endphp
                                    <span class="discount-badge">
                                        {{ $diskon }}% OFF
                                    </span>
                                </div>
                            @else
                                <div class="mb-2">
                                    <span class="price-tag text-3xl">
                                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                    </span>
                                </div>
                            @endif
                            <p class="text-sm text-neutral-500">Harga per unit</p>
                        </div>

                        <!-- Product Description -->
                        @if ($produk->deskripsi)
                            <div class="mb-8">
                                <h3 class="text-xl font-bold text-neutral-800 mb-4">
                                    <i class="fa-solid fa-info-circle text-green-500"></i>
                                    Deskripsi Produk
                                </h3>
                                <div class="prose prose-neutral max-w-none">
                                    {!! nl2br(e($produk->deskripsi)) !!}
                                </div>
                            </div>
                        @endif



                        <!-- Action Buttons -->
                        <div class="space-y-4">
                            @if ($produk->nomor_wa)
                                <a href="https://wa.me/{{ $produk->nomor_wa }}?text=Saya tertarik dengan produk {{ $produk->nama }} - {{ url()->current() }}"
                                    target="_blank" class="block">
                                    <x-primary-button class="w-full justify-center">
                                        <i class="fa-brands fa-whatsapp"></i>
                                        Beli via WhatsApp
                                    </x-primary-button>
                                </a>
                            @endif
                        </div>

                        <!-- Seller Info -->
                        <div class="mt-8 p-6 bg-green-50 rounded-2xl border border-green-100">
                            <h3 class="text-lg font-bold text-neutral-800 mb-4">
                                <i class="fa-solid fa-store text-green-500"></i>
                                Informasi Penjual
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-neutral-800">Warga Desa Sungai Kayu Ara</p>
                                        <p class="text-sm text-neutral-600">Produk Lokal Berkualitas</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </x-container>
        </section>

        <!-- Related Products Section -->
        @if ($relatedProducts && $relatedProducts->count() > 0)
            <section class="py-20 bg-gradient-to-br from-green-50 to-green-100/30">
                <x-container>
                    <div class="text-center mb-12">
                        <h2 class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4">
                            Produk <span class="text-green-600">Terkait</span>
                        </h2>
                        <p class="text-lg text-neutral-600 max-w-2xl mx-auto">
                            Temukan produk serupa yang mungkin menarik bagi Anda
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                        @foreach ($relatedProducts->take(4) as $relatedProduct)
                            <div
                                class="related-product group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100">
                                <div class="relative overflow-hidden">
                                    @if ($relatedProduct->gambar)
                                        <img src="{{ asset($relatedProduct->gambar) }}"
                                            alt="{{ $relatedProduct->nama }}"
                                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-700">
                                    @else
                                        <div
                                            class="w-full h-48 bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                            <i class="fas fa-box text-white text-4xl"></i>
                                        </div>
                                    @endif

                                    @if ($relatedProduct->kategori)
                                        <div class="absolute top-4 left-4">
                                            <span
                                                class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-medium">
                                                {{ $relatedProduct->kategori->nama }}
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <div class="p-6">
                                    <h3
                                        class="text-lg font-bold text-neutral-800 mb-2 group-hover:text-green-500 transition-colors duration-300">
                                        {{ $relatedProduct->nama }}
                                    </h3>
                                    <p class="text-neutral-500 text-sm mb-4 line-clamp-2">
                                        {{ Str::limit($relatedProduct->deskripsi, 100) }}
                                    </p>

                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-green-500">
                                            Rp {{ number_format($relatedProduct->harga, 0, ',', '.') }}
                                        </span>
                                        <a href="{{ route('produk.show', $relatedProduct->slug) }}"
                                            class="inline-flex items-center gap-2 text-green-500 hover:text-green-600 font-semibold transition-colors duration-300">
                                            Lihat
                                            <i class="fa-solid fa-arrow-right text-sm"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-container>
            </section>
        @endif
    @else
        <!-- Product Not Found -->
        <section class="py-20 bg-white">
            <x-container>
                <div class="text-center">
                    <div class="mb-8">
                        <i class="fas fa-box-open text-6xl text-gray-300 mb-4"></i>
                        <h1 class="text-3xl font-bold text-gray-600 mb-4">Produk Tidak Ditemukan</h1>
                        <p class="text-gray-500 mb-8">Maaf, produk yang Anda cari tidak tersedia atau telah dihapus.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('produk') }}"
                            class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-2xl font-semibold transition-all duration-300">
                            <i class="fa-solid fa-arrow-left"></i>
                            Kembali ke Produk
                        </a>
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center gap-2 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-2xl font-semibold transition-all duration-300">
                            <i class="fa-solid fa-home"></i>
                            Beranda
                        </a>
                    </div>
                </div>
            </x-container>
        </section>
    @endif


</x-main-layout>

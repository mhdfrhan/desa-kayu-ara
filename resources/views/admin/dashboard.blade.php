@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="space-y-8">
        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-green-600 to-green-700 rounded-2xl p-8 text-white shadow-xl">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Selamat Datang, Admin! 👋</h1>
                    <p class="text-green-100 text-lg">Kelola website Kampung Sungai Kayu Ara dengan mudah dan efisien</p>
                    <div class="mt-4 flex items-center space-x-6 text-sm">
                        <div class="flex items-center">
                            <i class="fas fa-calendar-day mr-2"></i>
                            <span>{{ now()->format('d F Y') }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-plus-circle mr-2"></i>
                            <span>{{ $todayContent }} konten ditambahkan hari ini</span>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <div class="w-24 h-24 bg-white/10 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-chart-line text-4xl text-white/80"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Berita -->
            <div
                class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div
                                class="p-4 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-newspaper text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Berita</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $statistics['totalBerita'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="mt-4 flex items-center text-sm {{ $growthData['pertumbuhanBerita'] >= 0 ? 'text-green-600' : 'text-red-600' }}">
                        <i class="fas fa-{{ $growthData['pertumbuhanBerita'] >= 0 ? 'arrow-up' : 'arrow-down' }} mr-1"></i>
                        <span>{{ $growthData['pertumbuhanBerita'] >= 0 ? '+' : '' }}{{ $growthData['pertumbuhanBerita'] }}%
                            dari bulan lalu</span>
                    </div>
                </div>
            </div>

            <!-- Total Produk -->
            <div
                class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div
                                class="p-4 rounded-2xl bg-gradient-to-br from-green-500 to-green-600 text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-boxes-stacked text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Produk</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $statistics['totalProduk'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="mt-4 flex items-center text-sm {{ $growthData['pertumbuhanProduk'] >= 0 ? 'text-green-600' : 'text-red-600' }}">
                        <i class="fas fa-{{ $growthData['pertumbuhanProduk'] >= 0 ? 'arrow-up' : 'arrow-down' }} mr-1"></i>
                        <span>{{ $growthData['pertumbuhanProduk'] >= 0 ? '+' : '' }}{{ $growthData['pertumbuhanProduk'] }}%
                            dari bulan lalu</span>
                    </div>
                </div>
            </div>

            <!-- Total Galeri -->
            <div
                class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div
                                class="p-4 rounded-2xl bg-gradient-to-br from-yellow-500 to-yellow-600 text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-images text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Galeri</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $statistics['totalGaleri'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="mt-4 flex items-center text-sm {{ $growthData['pertumbuhanGaleri'] >= 0 ? 'text-green-600' : 'text-red-600' }}">
                        <i class="fas fa-{{ $growthData['pertumbuhanGaleri'] >= 0 ? 'arrow-up' : 'arrow-down' }} mr-1"></i>
                        <span>{{ $growthData['pertumbuhanGaleri'] >= 0 ? '+' : '' }}{{ $growthData['pertumbuhanGaleri'] }}%
                            dari bulan lalu</span>
                    </div>
                </div>
            </div>

            <!-- Total Wisata -->
            <div
                class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div
                                class="p-4 rounded-2xl bg-gradient-to-br from-purple-500 to-purple-600 text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-mountain text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Wisata</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $statistics['totalWisata'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="mt-4 flex items-center text-sm {{ $growthData['pertumbuhanWisata'] >= 0 ? 'text-green-600' : 'text-red-600' }}">
                        <i class="fas fa-{{ $growthData['pertumbuhanWisata'] >= 0 ? 'arrow-up' : 'arrow-down' }} mr-1"></i>
                        <span>{{ $growthData['pertumbuhanWisata'] >= 0 ? '+' : '' }}{{ $growthData['pertumbuhanWisata'] }}%
                            dari bulan lalu</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold text-gray-900">Aksi Cepat</h3>
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <i class="fas fa-bolt"></i>
                        <span>Akses cepat ke fitur utama</span>
                    </div>
                </div>
            </div>
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <a href="{{ route('admin.berita.create') }}"
                        class="group flex items-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl hover:from-blue-100 hover:to-blue-200 transition-all duration-300 border border-blue-200 hover:border-blue-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="p-3 rounded-xl bg-blue-500 text-white mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-plus text-lg"></i>
                        </div>
                        <div>
                            <span class="text-blue-900 font-semibold text-lg">Tambah Berita</span>
                            <p class="text-blue-700 text-sm">Publikasikan berita terbaru</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.produk.create') }}"
                        class="group flex items-center p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl hover:from-green-100 hover:to-green-200 transition-all duration-300 border border-green-200 hover:border-green-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="p-3 rounded-xl bg-green-500 text-white mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-plus text-lg"></i>
                        </div>
                        <div>
                            <span class="text-green-900 font-semibold text-lg">Tambah Produk</span>
                            <p class="text-green-700 text-sm">Tambah produk unggulan</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.galeri.create') }}"
                        class="group flex items-center p-6 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-2xl hover:from-yellow-100 hover:to-yellow-200 transition-all duration-300 border border-yellow-200 hover:border-yellow-300 hover:shadow-lg hover:-translate-y-1">
                        <div
                            class="p-3 rounded-xl bg-yellow-500 text-white mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-plus text-lg"></i>
                        </div>
                        <div>
                            <span class="text-yellow-900 font-semibold text-lg">Tambah Galeri</span>
                            <p class="text-yellow-700 text-sm">Upload foto kegiatan</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.wisata.create') }}"
                        class="group flex items-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl hover:from-purple-100 hover:to-purple-200 transition-all duration-300 border border-purple-200 hover:border-purple-300 hover:shadow-lg hover:-translate-y-1">
                        <div
                            class="p-3 rounded-xl bg-purple-500 text-white mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-plus text-lg"></i>
                        </div>
                        <div>
                            <span class="text-purple-900 font-semibold text-lg">Tambah Wisata</span>
                            <p class="text-purple-700 text-sm">Tambah destinasi wisata</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Berita Terbaru -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-gray-900">Berita Terbaru</h3>
                        <a href="{{ route('admin.berita.index') }}"
                            class="text-green-600 hover:text-green-700 font-medium text-sm">
                            Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @forelse($recentData['recentBerita'] as $berita)
                            <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-colors">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-900 line-clamp-1">{{ $berita->judul }}</h4>
                                    <p class="text-sm text-gray-500">{{ $berita->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        {{ $berita->kategori->nama ?? 'Umum' }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <div
                                    class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-newspaper text-gray-400 text-xl"></i>
                                </div>
                                <p class="text-gray-500">Belum ada berita</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Aktivitas Terbaru -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-gray-900">Aktivitas Terbaru</h3>
                        <span class="text-gray-500 text-sm">{{ now()->format('d M Y') }}</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @forelse($activities as $activity)
                            <div
                                class="flex items-center space-x-4 p-4 rounded-xl bg-{{ $activity['color'] }}-50 border border-{{ $activity['color'] }}-100">
                                <div
                                    class="w-10 h-10 bg-{{ $activity['color'] }}-500 rounded-full flex items-center justify-center text-white">
                                    <i class="{{ $activity['icon'] }} text-sm"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-900">{{ $activity['title'] }}</p>
                                    <p class="text-sm text-gray-500">{{ Str::limit($activity['description'], 30) }}</p>
                                    <p class="text-xs text-gray-400">{{ $activity['time']->diffForHumans() }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <div
                                    class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-clock text-gray-400 text-xl"></i>
                                </div>
                                <p class="text-gray-500">Belum ada aktivitas</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Kategori -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Kategori Berita Terpopuler -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                    <h3 class="text-xl font-semibold text-gray-900">Kategori Berita Terpopuler</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @forelse($categoryStats['kategoriBeritaStats'] as $kategori)
                            <div
                                class="flex items-center justify-between p-4 rounded-xl bg-blue-50 border border-blue-100">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center text-white mr-3">
                                        <i class="fas fa-tag text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $kategori->nama }}</p>
                                        <p class="text-sm text-gray-500">{{ $kategori->berita_count }} berita</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-2xl font-bold text-blue-600">{{ $kategori->berita_count }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <div
                                    class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-tags text-gray-400 text-xl"></i>
                                </div>
                                <p class="text-gray-500">Belum ada kategori berita</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Kategori Produk Terpopuler -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                    <h3 class="text-xl font-semibold text-gray-900">Kategori Produk Terpopuler</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @forelse($categoryStats['kategoriProdukStats'] as $kategori)
                            <div
                                class="flex items-center justify-between p-4 rounded-xl bg-green-50 border border-green-100">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center text-white mr-3">
                                        <i class="fas fa-tag text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $kategori->nama }}</p>
                                        <p class="text-sm text-gray-500">{{ $kategori->produk_count }} produk</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-2xl font-bold text-green-600">{{ $kategori->produk_count }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <div
                                    class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-tags text-gray-400 text-xl"></i>
                                </div>
                                <p class="text-gray-500">Belum ada kategori produk</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- System Status -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                <h3 class="text-xl font-semibold text-gray-900">Status Sistem</h3>
            </div>
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="flex items-center justify-between p-6 bg-green-50 rounded-2xl border border-green-200">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3 animate-pulse"></div>
                            <span class="font-medium text-gray-900">Server</span>
                        </div>
                        <span class="text-green-600 font-semibold">Online</span>
                    </div>

                    <div class="flex items-center justify-between p-6 bg-blue-50 rounded-2xl border border-blue-200">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                            <span class="font-medium text-gray-900">Database</span>
                        </div>
                        <span class="text-blue-600 font-semibold">Connected</span>
                    </div>

                    <div class="flex items-center justify-between p-6 bg-yellow-50 rounded-2xl border border-yellow-200">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></div>
                            <span class="font-medium text-gray-900">Total Kategori</span>
                        </div>
                        <span
                            class="text-yellow-600 font-semibold">{{ $statistics['totalKategoriBerita'] + $statistics['totalKategoriProduk'] + $statistics['totalKategoriGaleri'] }}</span>
                    </div>

                    <div class="flex items-center justify-between p-6 bg-purple-50 rounded-2xl border border-purple-200">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-purple-500 rounded-full mr-3"></div>
                            <span class="font-medium text-gray-900">Total Banner</span>
                        </div>
                        <span class="text-purple-600 font-semibold">{{ $statistics['totalBanner'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

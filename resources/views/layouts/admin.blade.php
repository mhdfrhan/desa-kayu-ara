<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - Desa Sungai Kayu Ara</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Custom Scrollbar for Sidebar */
        .scrollbar-thin::-webkit-scrollbar {
            width: 4px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background: transparent;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: rgba(34, 197, 94, 0.5);
            border-radius: 2px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background: rgba(34, 197, 94, 0.7);
        }

        /* Hide scrollbar for Firefox */
        .scrollbar-thin {
            scrollbar-width: thin;
            scrollbar-color: rgba(34, 197, 94, 0.5) transparent;
        }
    </style>

    @stack('styles')
</head>

<body class="font-sans antialiased bg-gray-50" x-data="{ sidebarOpen: false }">
    <div class="min-h-screen relative">
        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-600 bg-opacity-75 z-40 lg:hidden"
            @click="sidebarOpen = false"></div>

        <!-- Sidebar -->
        <div x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-green-800 to-green-900 shadow-2xl lg:translate-x-0 lg:fixed lg:inset-0">

            <!-- Sidebar Content -->
            <div class="flex flex-col h-full">
                <!-- Logo Section -->
                <div class="flex items-center justify-between p-6 border-b border-green-700/50 flex-shrink-0">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/20">
                            <i class="fas fa-home text-white text-xl"></i>
                        </div>
                        <div>
                            <h1 class="text-lg font-bold text-white">Admin Desa</h1>
                            <p class="text-green-200 text-sm">Sungai Kayu Ara</p>
                        </div>
                    </div>
                    <!-- Close button for mobile -->
                    <button @click="sidebarOpen = false" class="lg:hidden text-white/70 hover:text-white">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <!-- Navigation Menu -->
                <nav
                    class="flex-1 px-4 py-6 space-y-6 overflow-y-auto scrollbar-thin scrollbar-thumb-green-600 scrollbar-track-transparent">
                    <!-- Menu Utama -->
                    <div>
                        <h3 class="text-xs font-semibold text-green-300 uppercase tracking-wider mb-3 px-2">Menu Utama
                        </h3>
                        <ul class="space-y-1">
                            <li>
                                <a href="{{ route('admin.dashboard') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i
                                        class="fas fa-tachometer-alt w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.banner.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.banner.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i
                                        class="fas fa-images w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Banner</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.sambutan.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.sambutan.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i
                                        class="fas fa-user-tie w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Sambutan Kepala Desa</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.struktur.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.struktur.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i
                                        class="fas fa-sitemap w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Struktur Organisasi</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Konten -->
                    <div>
                        <h3 class="text-xs font-semibold text-green-300 uppercase tracking-wider mb-3 px-2">Konten</h3>
                        <ul class="space-y-1">
                            <li>
                                <a href="{{ route('admin.berita.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.berita.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i
                                        class="fas fa-newspaper w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Berita</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.kategori-berita.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.kategori-berita.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i class="fas fa-tags w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Kategori Berita</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.produk.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.produk.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i
                                        class="fas fa-boxes-stacked w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Produk Desa</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.kategori-produk.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.kategori-produk.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i class="fas fa-tags w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Kategori Produk</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.galeri.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.galeri.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i
                                        class="fas fa-images w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Galeri</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.kategori-galeri.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.kategori-galeri.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i class="fas fa-tags w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Kategori Galeri</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.wisata.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.wisata.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i
                                        class="fas fa-mountain w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Wisata Alam</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Data & Statistik -->
                    <div>
                        <h3 class="text-xs font-semibold text-green-300 uppercase tracking-wider mb-3 px-2">Data &
                            Statistik</h3>
                        <ul class="space-y-1">
                            <li>
                                <a href="{{ route('admin.administrasi.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.administrasi.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i class="fas fa-users w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Administrasi Penduduk</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.statistik.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.statistik.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i
                                        class="fas fa-chart-bar w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Statistik</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.chart.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.chart.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i
                                        class="fas fa-chart-pie w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Chart Statistik</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Informasi Desa -->
                    <div>
                        <h3 class="text-xs font-semibold text-green-300 uppercase tracking-wider mb-3 px-2">Informasi
                            Desa</h3>
                        <ul class="space-y-1">
                            <li>
                                <a href="{{ route('admin.profil.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.profil.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i
                                        class="fas fa-info-circle w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Profil Desa</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.peta.index') }}"
                                    class="flex items-center px-3 py-3 text-green-100 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.peta.*') ? 'bg-white/10 text-white shadow-lg' : '' }}">
                                    <i
                                        class="fas fa-map-marker-alt w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                                    <span class="font-medium">Peta Desa</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- User Profile Section -->
                <div class="p-4 border-t border-green-700/50 flex-shrink-0">
                    <div class="flex items-center space-x-3 p-3 bg-white/5 rounded-xl">
                        <img class="w-10 h-10 rounded-lg"
                            src="https://ui-avatars.com/api/?name=Admin&background=10b981&color=fff" alt="Admin">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-white">Admin</p>
                            <p class="text-xs text-green-200">Administrator</p>
                        </div>
                        <button class="text-green-200 hover:text-white">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:ml-64 min-h-screen">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-20">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <!-- Mobile menu button -->
                        <button @click="sidebarOpen = true"
                            class="lg:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100">
                            <i class="fas fa-bars text-xl"></i>
                        </button>

                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                            <p class="text-sm text-gray-500">Selamat datang di panel admin</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <div class="relative">
                            <button
                                class="relative p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
                                <i class="fas fa-bell text-lg"></i>
                                <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>
                        </div>

                        <!-- Search -->
                        <div class="relative hidden md:block">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" placeholder="Cari..."
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>

                        <!-- User Menu -->
                        <div class="relative">
                            <button
                                class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 transition-colors">
                                <img class="w-8 h-8 rounded-lg"
                                    src="https://ui-avatars.com/api/?name=Admin&background=10b981&color=fff"
                                    alt="Admin">
                                <div class="hidden md:block text-left">
                                    <p class="text-sm font-medium text-gray-700">Admin</p>
                                    <p class="text-xs text-gray-500">Administrator</p>
                                </div>
                                <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6 overflow-y-auto">
                @include('components.message')

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>

</html>

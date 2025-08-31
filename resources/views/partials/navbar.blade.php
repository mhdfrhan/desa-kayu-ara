<nav class="fixed z-50 rounded-2xl transition-all duration-500 ease-out border-b border-b-transparent"
    :class="{
        'top-3 left-10 right-10 bg-white/90 backdrop-blur-md  border-neutral-200': isScrolled,
        'left-0 right-0 top-0': !
            isScrolled
    }"
    x-data="{
        isOpen: false,
        isScrolled: false
    }" x-init="window.addEventListener('scroll', () => {
        isScrolled = window.scrollY > 20;
    });">

    <x-container>
        <div class="flex items-center py-4 justify-between">
            <!-- Logo -->
            <div class="flex-shrink-0" ">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('img/logo.png') }}" alt="logo {{ config('app.name') }}"
                        class="h-12 transition-transform duration-300 group-hover:scale-105">
                    <div>
                        <h2
                            class="text-xl font-semibold" :class="{
                                'text-green-700 transition-all duration-500 ease-out': isScrolled,
                                'text-white': !
                                    isScrolled
                            }">
                            Kampung Sungai Kayu Ara</h2>
                        <p class="text-xs" :class="{
                            'text-neutral-200': !
                                isScrolled,
                            'text-neutral-700 transition-all duration-500 ease-out': isScrolled
                        }">Kec. Sungai Apit, Kab. Siak, Provinsi Riau</p>
                    </div>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:block">
                <div class="flex items-center space-x-1 transition-all duration-500 ease-out"">
                <a href="{{ route('home') }}"
                    class="relative px-4 py-2 font-medium transition-all duration-300 ease-out hover:text-green-600 {{ request()->routeIs('home') ? '!text-green-600' : '' }}"
                    :class="{ '!text-white': !isScrolled, 'text-neutral-700': isScrolled }">
                    <span class="relative z-10">Beranda</span>
                </a>

                <a href="{{ route('profil-desa') }}"
                    class="relative px-4 py-2 font-medium transition-all duration-300 ease-out hover:text-green-600 {{ request()->routeIs('profil-desa') ? '!text-green-600' : '' }}"
                    :class="{ '!text-white': !isScrolled, 'text-neutral-700': isScrolled }">
                    <span class="relative z-10">Profil Kampung</span>
                </a>

                <a href="{{ route('berita') }}"
                    class="relative px-4 py-2 font-medium transition-all duration-300 ease-out hover:text-green-600 {{ request()->routeIs('berita') ? '!text-green-600' : '' }}"
                    :class="{ '!text-white': !isScrolled, 'text-neutral-700': isScrolled }">
                    <span class="relative z-10">Berita</span>
                </a>

                <a href="{{ route('produk') }}"
                    class="relative px-4 py-2 font-medium transition-all duration-300 ease-out hover:text-green-600 {{ request()->routeIs('produk') ? '!text-green-600' : '' }}"
                    :class="{ '!text-white': !isScrolled, 'text-neutral-700': isScrolled }">
                    <span class="relative z-10">Produk</span>
                </a>

                <a href="{{ route('galeri') }}"
                    class="relative px-4 py-2 font-medium transition-all duration-300 ease-out hover:text-green-600 {{ request()->routeIs('galeri') ? '!text-green-600' : '' }}"
                    :class="{ '!text-white': !isScrolled, 'text-neutral-700': isScrolled }">
                    <span class="relative z-10">Galeri</span>
                </a>

                <a href="{{ route('wisata') }}"
                    class="relative px-4 py-2 font-medium transition-all duration-300 ease-out hover:text-green-600 {{ request()->routeIs('wisata') ? '!text-green-600' : '' }}"
                    :class="{ '!text-white': !isScrolled, 'text-neutral-700': isScrolled }">
                    <span class="relative z-10">Wisata</span>
                </a>

                <a href="{{ route('statistik') }}"
                    class="relative px-4 py-2 font-medium transition-all duration-300 ease-out hover:text-green-600 {{ request()->routeIs('statistik') ? '!text-green-600' : '' }}"
                    :class="{ '!text-white': !isScrolled, 'text-neutral-700': isScrolled }">
                    <span class="relative z-10">Statistik</span>
                </a>

                <a href="{{ route('peta') }}"
                    class="relative px-4 py-2 font-medium transition-all duration-300 ease-out hover:text-green-600 {{ request()->routeIs('peta') ? '!text-green-600' : '' }}"
                    :class="{ '!text-white': !isScrolled, 'text-neutral-700': isScrolled }">
                    <span class="relative z-10">Peta</span>
                </a>
            </div>
        </div>

        <!-- Mobile menu button -->
        <div class="lg:hidden">
            <button @click="isOpen = !isOpen"
                class="relative w-10 h-10 flex items-center justify-center rounded-lg transition-all duration-300 hover:bg-neutral-100/80 backdrop-blur-sm"
                :class="{ 'bg-neutral-100/80': isOpen }">
                <div class="w-6 h-6 relative">
                    <span
                        class="absolute top-0 left-0 w-6 h-0.5 bg-neutral-500 transform transition-all duration-300 ease-out"
                        :class="{ 'rotate-45 translate-y-2.5': isOpen, 'translate-y-0': !isOpen }"></span>
                    <span
                        class="absolute top-2 left-0 w-6 h-0.5 bg-neutral-500 transform transition-all duration-300 ease-out"
                        :class="{ 'opacity-0': isOpen, 'opacity-100': !isOpen }"></span>
                    <span
                        class="absolute top-4 left-0 w-6 h-0.5 bg-neutral-500 transform transition-all duration-300 ease-out"
                        :class="{ '-rotate-45 -translate-y-1.5': isOpen, 'translate-y-0': !isOpen }"></span>
                </div>
            </button>
        </div>
        </div>
    </x-container>

    <!-- Mobile Menu -->
    <div class="lg:hidden overflow-hidden transition-all duration-500 ease-out"
        :class="{
            'opacity-100': isOpen,
            'max-h-0 opacity-0': !
                isOpen,
            'bg-white/95 backdrop-blur-md border border-neutral-200 px-4 space-y-3': isScrolled
        }">
        <div class="bg-white/95 backdrop-blur-md border-t border-neutral-100/50 px-4 py-4 space-y-3">
            @auth
                <a href="{{ route('admin.dashboard') }}"
                    class="block px-4 py-3 text-neutral-600 font-medium text-base transition-all duration-300 ease-out rounded-lg hover:bg-green-600 hover:text-white transform hover:translate-x-2 {{ request()->routeIs('admin.dashboard') ? 'bg-green-600 text-white' : '' }}"
                    @click="isOpen = false">
                    Dashboard Admin
                </a>
            @endauth
            <a href="{{ route('home') }}"
                class="block px-4 py-3 text-neutral-600 font-medium text-base transition-all duration-300 ease-out rounded-lg hover:bg-green-600 hover:text-white transform hover:translate-x-2 {{ request()->routeIs('home') ? 'bg-green-600 text-white' : '' }}"
                @click="isOpen = false">
                Beranda
            </a>

            <a href="#"
                class="block px-4 py-3 text-neutral-600 font-medium text-base transition-all duration-300 ease-out rounded-lg hover:bg-green-600 hover:text-white transform hover:translate-x-2"
                @click="isOpen = false">
                Profil Kampung
            </a>

            <a href="{{ route('berita') }}"
                class="block px-4 py-3 text-neutral-600 font-medium text-base transition-all duration-300 ease-out rounded-lg hover:bg-green-600 hover:text-white transform hover:translate-x-2 {{ request()->routeIs('berita') ? 'bg-green-600 text-white' : '' }}"
                @click="isOpen = false">
                Berita
            </a>

            <a href="#"
                class="block px-4 py-3 text-neutral-600 font-medium text-base transition-all duration-300 ease-out rounded-lg hover:bg-green-600 hover:text-white transform hover:translate-x-2"
                @click="isOpen = false">
                Produk
            </a>

            <a href="#"
                class="block px-4 py-3 text-neutral-600 font-medium text-base transition-all duration-300 ease-out rounded-lg hover:bg-green-600 hover:text-white transform hover:translate-x-2"
                @click="isOpen = false">
                Galeri
            </a>

            <a href="{{ route('wisata') }}"
                class="block px-4 py-3 text-neutral-600 font-medium text-base transition-all duration-300 ease-out rounded-lg hover:bg-green-600 hover:text-white transform hover:translate-x-2 {{ request()->routeIs('wisata') ? 'bg-green-600 text-white' : '' }}"
                @click="isOpen = false">
                Wisata
            </a>

            <a href="#"
                class="block px-4 py-3 text-neutral-600 font-medium text-base transition-all duration-300 ease-out rounded-lg hover:bg-green-600 hover:text-white transform hover:translate-x-2"
                @click="isOpen = false">
                Statistik
            </a>

            <a href="#"
                class="block px-4 py-3 text-neutral-600 font-medium text-base transition-all duration-300 ease-out rounded-lg hover:bg-green-600 hover:text-white transform hover:translate-x-2"
                @click="isOpen = false">
                Peta
            </a>
        </div>
    </div>
</nav>

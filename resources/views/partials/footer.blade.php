<!-- Footer -->
<footer class="bg-neutral-900 text-white py-16 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
            <!-- Brand Section -->
            <div class="lg:col-span-2">
                <div class="flex items-center space-x-3 mb-6">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-14 w-auto">
                    <div>
                        <h3 class="text-xl font-bold text-white">{{ config('app.name') }}</h3>
                        <p class="text-neutral-400 text-sm">Kec. Sungai Apit, Kab. Siak, Provinsi Riau</p>
                    </div>
                </div>
                <p class="text-neutral-300 leading-relaxed text-sm max-w-md">
                    Website resmi {{ config('app.name') }} yang menyediakan informasi lengkap tentang desa kami,
                    termasuk berita, produk unggulan, galeri, dan data statistik terkini.
                </p>
                <div class="flex space-x-4 mt-6">
                    <a href="#"
                        class="w-10 h-10 bg-neutral-800 rounded-lg flex items-center justify-center text-neutral-400 hover:bg-neutral-700 hover:text-white transition-all duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-neutral-800 rounded-lg flex items-center justify-center text-neutral-400 hover:bg-neutral-700 hover:text-white transition-all duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-neutral-800 rounded-lg flex items-center justify-center text-neutral-400 hover:bg-neutral-700 hover:text-white transition-all duration-300">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-neutral-800 rounded-lg flex items-center justify-center text-neutral-400 hover:bg-neutral-700 hover:text-white transition-all duration-300">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Kontak Section -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-6">Kontak</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-neutral-800 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-neutral-400 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-neutral-300 text-sm font-medium">Email</p>
                            <p class="text-neutral-400 text-sm">info@desasungaiayuara.com</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-neutral-800 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone text-neutral-400 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-neutral-300 text-sm font-medium">Telepon</p>
                            <p class="text-neutral-400 text-sm">(021) 1234-5678</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-neutral-800 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-neutral-400 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-neutral-300 text-sm font-medium">Alamat</p>
                            <p class="text-neutral-400 text-sm">{{ config('app.name') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tautan Cepat Section -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-6">Tautan Cepat</h3>
                <div class="space-y-3">
                    <a href="{{ route('home') }}"
                        class="block text-neutral-300 hover:text-white transition-colors duration-300 text-sm font-medium hover:translate-x-1 transform">
                        <i class="fas fa-home mr-2 text-neutral-400"></i>Beranda
                    </a>
                    <a href="{{ route('berita') }}"
                        class="block text-neutral-300 hover:text-white transition-colors duration-300 text-sm font-medium hover:translate-x-1 transform">
                        <i class="fas fa-newspaper mr-2 text-neutral-400"></i>Berita
                    </a>
                    <a href="{{ route('produk') }}"
                        class="block text-neutral-300 hover:text-white transition-colors duration-300 text-sm font-medium hover:translate-x-1 transform">
                        <i class="fas fa-shopping-bag mr-2 text-neutral-400"></i>Produk Desa
                    </a>
                    <a href="{{ route('galeri') }}"
                        class="block text-neutral-300 hover:text-white transition-colors duration-300 text-sm font-medium hover:translate-x-1 transform">
                        <i class="fas fa-images mr-2 text-neutral-400"></i>Galeri
                    </a>
                    <a href="{{ route('statistik') }}"
                        class="block text-neutral-300 hover:text-white transition-colors duration-300 text-sm font-medium hover:translate-x-1 transform">
                        <i class="fas fa-chart-bar mr-2 text-neutral-400"></i>Statistik
                    </a>
                    <a href="{{ route('peta') }}"
                        class="block text-neutral-300 hover:text-white transition-colors duration-300 text-sm font-medium hover:translate-x-1 transform">
                        <i class="fas fa-map mr-2 text-neutral-400"></i>Peta
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="border-t border-neutral-800 mt-12 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="text-neutral-400 text-sm">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. Semua hak dilindungi.
                </p>
                <div class="flex space-x-6 text-sm">
                    <a href="#" class="text-neutral-400 hover:text-white transition-colors duration-300">Kebijakan
                        Privasi</a>
                    <a href="#" class="text-neutral-400 hover:text-white transition-colors duration-300">Syarat &
                        Ketentuan</a>
                    <a href="#" class="text-neutral-400 hover:text-white transition-colors duration-300">Peta
                        Situs</a>
                </div>
            </div>
        </div>
    </div>
</footer>

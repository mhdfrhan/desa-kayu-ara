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
            <div class="mb-16">
                <div
                    class="group bg-gradient-to-br from-green-50 to-green-100/30 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-green-100 transform hover:-translate-y-2">
                    <div class="grid lg:grid-cols-2 gap-0">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80"
                                alt="Berita Utama"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                            </div>
                            <div class="absolute top-6 left-6">
                                <span
                                    class="bg-green-500 text-white px-4 py-2 rounded-2xl text-sm font-bold">FEATURED</span>
                            </div>
                        </div>
                        <div class="p-8 lg:p-12 flex flex-col justify-center">
                            <div class="flex items-center gap-4 mb-4">
                                <span
                                    class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Pembangunan</span>
                                <div class="flex items-center gap-2 text-neutral-400 text-sm">
                                    <i class="fa-solid fa-calendar"></i>
                                    <span>15 Desember 2024</span>
                                </div>
                            </div>
                            <h3
                                class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4 group-hover:text-green-500 transition-colors duration-300">
                                Pembangunan Jembatan Desa Selesai, Akses Transportasi Semakin Lancar
                            </h3>
                            <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                Setelah 6 bulan pembangunan, jembatan penghubung antar dusun di Desa Sungai Kayu Ara
                                akhirnya selesai dan siap digunakan. Jembatan ini akan memudahkan akses transportasi
                                warga dan meningkatkan perekonomian desa.
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80"
                                        alt="Penulis" class="w-10 h-10 rounded-full object-cover">
                                    <div>
                                        <p class="font-semibold text-neutral-800">Ahmad Rizki</p>
                                        <p class="text-sm text-neutral-500">Kepala Desa</p>
                                    </div>
                                </div>
                                <a href="#">
                                    <x-primary-button>
                                        Baca Selengkapnya
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </x-primary-button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

            <!-- News Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $berita = [
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1643870358098-3549ac3bca46?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Pertanian',
                            'title' => 'Program Peningkatan Produksi Padi Berhasil Tingkatkan Hasil Panen',
                            'date' => '12 Desember 2024',
                            'excerpt' =>
                                'Program peningkatan produksi padi yang diluncurkan pemerintah desa berhasil meningkatkan hasil panen hingga 30%.',
                            'author' => 'Siti Nurhaliza',
                            'author_avatar' =>
                                'https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1671080749889-19f8a69deb2b?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Wisata',
                            'title' => 'Destinasi Wisata Air Terjun Diresmikan, Siap Terima Pengunjung',
                            'date' => '10 Desember 2024',
                            'excerpt' =>
                                'Destinasi wisata air terjun Sungai Kayu Ara resmi dibuka untuk umum dengan fasilitas yang lengkap.',
                            'author' => 'Budi Santoso',
                            'author_avatar' =>
                                'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80',
                            'category' => 'Ekonomi',
                            'title' => 'UMKM Desa Raih Penghargaan di Festival Produk Lokal',
                            'date' => '8 Desember 2024',
                            'excerpt' =>
                                'Tiga UMKM dari Desa Sungai Kayu Ara berhasil meraih penghargaan di Festival Produk Lokal tingkat kabupaten.',
                            'author' => 'Dewi Sartika',
                            'author_avatar' =>
                                'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1643870358098-3549ac3bca46?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Pendidikan',
                            'title' => 'Program Beasiswa Desa Berhasil Kirim 15 Siswa ke Perguruan Tinggi',
                            'date' => '5 Desember 2024',
                            'excerpt' =>
                                'Program beasiswa desa berhasil mengirim 15 siswa berprestasi untuk melanjutkan pendidikan ke perguruan tinggi.',
                            'author' => 'Rina Marlina',
                            'author_avatar' =>
                                'https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1671080749889-19f8a69deb2b?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Kesehatan',
                            'title' => 'Posyandu Lansia Desa Raih Penghargaan Terbaik Se-Kecamatan',
                            'date' => '3 Desember 2024',
                            'excerpt' =>
                                'Posyandu lansia Desa Sungai Kayu Ara berhasil meraih penghargaan sebagai posyandu terbaik se-kecamatan.',
                            'author' => 'Nurul Hidayah',
                            'author_avatar' =>
                                'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80',
                            'category' => 'Lingkungan',
                            'title' => 'Program Penghijauan Desa Berhasil Tanam 1000 Pohon',
                            'date' => '1 Desember 2024',
                            'excerpt' =>
                                'Program penghijauan desa berhasil menanam 1000 pohon di berbagai lokasi strategis untuk menjaga kelestarian lingkungan.',
                            'author' => 'Ahmad Fauzi',
                            'author_avatar' =>
                                'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                        ],
                    ];
                @endphp

                @foreach ($berita as $item)
                    <article
                        class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent">
                            </div>
                            <div class="absolute top-4 left-4">
                                <span
                                    class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-medium">{{ $item['category'] }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-neutral-400 text-sm mb-3">
                                <i class="fa-solid fa-calendar"></i>
                                <span>{{ $item['date'] }}</span>
                            </div>
                            <h3
                                class="text-xl font-bold text-neutral-800 mb-3 group-hover:text-green-500 transition-colors duration-300 line-clamp-2">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-neutral-500 mb-4 leading-relaxed line-clamp-3">
                                {{ $item['excerpt'] }}
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $item['author_avatar'] }}" alt="{{ $item['author'] }}"
                                        class="w-8 h-8 rounded-full object-cover">
                                    <span class="text-sm font-medium text-neutral-700">{{ $item['author'] }}</span>
                                </div>
                                <a href="#"
                                    class="inline-flex items-center gap-2 text-green-500 font-semibold transition-colors duration-300 hover:text-green-600">
                                    Baca
                                    <i class="fa-solid fa-arrow-right text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </article>
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

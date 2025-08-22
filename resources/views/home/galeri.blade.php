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
                @php
                    $categories = [
                        [
                            'name' => 'Kegiatan Desa',
                            'icon' => 'fa-solid fa-users',
                            'count' => '45',
                            'color' => 'bg-blue-500',
                        ],
                        [
                            'name' => 'Wisata Alam',
                            'icon' => 'fa-solid fa-mountain',
                            'count' => '32',
                            'color' => 'bg-green-500',
                        ],
                        [
                            'name' => 'Pertanian',
                            'icon' => 'fa-solid fa-seedling',
                            'count' => '28',
                            'color' => 'bg-orange-500',
                        ],
                        [
                            'name' => 'Budaya',
                            'icon' => 'fa-solid fa-music',
                            'count' => '19',
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
                            <p class="text-neutral-500">{{ $category['count'] }} Foto</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-container>
    </section>

    <!-- Featured Gallery Section -->
    <section class="py-20 bg-gradient-to-br from-green-50 via-white to-green-50/30">
        <x-container>
            <div class="mb-16">
                <div
                    class="group bg-gradient-to-br from-green-50 to-green-100/30 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-green-100 transform hover:-translate-y-2">
                    <div class="grid lg:grid-cols-2 gap-0">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1626014405949-cd273e5048b2?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Galeri Unggulan"
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
                                    class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Wisata
                                    Alam</span>
                                <div class="flex items-center gap-2 text-neutral-400 text-sm">
                                    <i class="fa-solid fa-calendar"></i>
                                    <span>15 Desember 2024</span>
                                </div>
                            </div>
                            <h3
                                class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4 group-hover:text-green-500 transition-colors duration-300">
                                Keindahan Hutan Mangrove Sungai Kayu Ara
                            </h3>
                            <p class="text-neutral-500 mb-6 leading-relaxed text-lg">
                                Dokumentasi keindahan hutan mangrove yang menjadi salah satu destinasi wisata unggulan
                                Desa Sungai Kayu Ara. Hutan mangrove ini tidak hanya indah tetapi juga berfungsi sebagai
                                pelindung pantai dan habitat berbagai satwa liar.
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80"
                                        alt="Fotografer" class="w-10 h-10 rounded-full object-cover">
                                    <div>
                                        <p class="font-semibold text-neutral-800">Ahmad Rizki</p>
                                        <p class="text-sm text-neutral-500">Fotografer Desa</p>
                                    </div>
                                </div>
                                <a href="#"
                                    class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105">
                                    Lihat Album
                                    <i class="fa-solid fa-images"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

            <!-- Gallery Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @php
                    $gallery = [
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1626014405949-cd273e5048b2?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Wisata Alam',
                            'title' => 'Hutan Mangrove Sungai Kayu Ara',
                            'description' =>
                                'Keindahan hutan mangrove yang menjadi habitat berbagai satwa liar dan destinasi wisata unggulan desa.',
                            'date' => '15 Desember 2024',
                            'photographer' => 'Ahmad Rizki',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80',
                            'category' => 'Kegiatan Desa',
                            'title' => 'Gotong Royong Pembangunan Jembatan',
                            'description' =>
                                'Momen kebersamaan warga desa dalam kegiatan gotong royong pembangunan jembatan penghubung antar dusun.',
                            'date' => '12 Desember 2024',
                            'photographer' => 'Siti Nurhaliza',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1643870358098-3549ac3bca46?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Pertanian',
                            'title' => 'Panen Padi Bersama',
                            'description' =>
                                'Kegiatan panen padi yang dilakukan secara bersama-sama oleh petani Desa Sungai Kayu Ara.',
                            'date' => '10 Desember 2024',
                            'photographer' => 'Budi Santoso',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1671080749889-19f8a69deb2b?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Budaya',
                            'title' => 'Pertunjukan Tari Tradisional',
                            'description' =>
                                'Pertunjukan tari tradisional dalam acara perayaan hari besar di Desa Sungai Kayu Ara.',
                            'date' => '8 Desember 2024',
                            'photographer' => 'Dewi Sartika',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                            'category' => 'Wisata Alam',
                            'title' => 'Spot Memancing di Sungai',
                            'description' =>
                                'Spot memancing favorit warga desa yang berlokasi di sungai dengan pemandangan yang indah.',
                            'date' => '5 Desember 2024',
                            'photographer' => 'Rina Marlina',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80',
                            'category' => 'Kegiatan Desa',
                            'title' => 'Rapat Koordinasi Desa',
                            'description' =>
                                'Momentum rapat koordinasi antara pemerintah desa dengan tokoh masyarakat untuk membahas program pembangunan.',
                            'date' => '3 Desember 2024',
                            'photographer' => 'Nurul Hidayah',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1643870358098-3549ac3bca46?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Pertanian',
                            'title' => 'Kebun Sayur Organik',
                            'description' =>
                                'Kebun sayur organik yang dikelola oleh kelompok tani desa dengan hasil panen yang berkualitas.',
                            'date' => '1 Desember 2024',
                            'photographer' => 'Ahmad Fauzi',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1671080749889-19f8a69deb2b?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'category' => 'Budaya',
                            'title' => 'Festival Budaya Desa',
                            'description' =>
                                'Festival budaya tahunan yang menampilkan berbagai kesenian dan kuliner tradisional desa.',
                            'date' => '28 November 2024',
                            'photographer' => 'Sari Indah',
                        ],
                    ];
                @endphp

                @foreach ($gallery as $item)
                    <div
                        class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                                class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-700">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <div class="absolute top-4 left-4">
                                <span
                                    class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-medium">{{ $item['category'] }}</span>
                            </div>
                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-4 mx-4 text-center">
                                    <h4 class="font-bold text-neutral-800 mb-2">{{ $item['title'] }}</h4>
                                    <p class="text-sm text-neutral-600">{{ $item['description'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-neutral-400 text-sm mb-3">
                                <i class="fa-solid fa-calendar"></i>
                                <span>{{ $item['date'] }}</span>
                            </div>
                            <h3
                                class="text-lg font-bold text-neutral-800 mb-3 group-hover:text-green-500 transition-colors duration-300 line-clamp-2">
                                {{ $item['title'] }}
                            </h3>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <i class="fa-solid fa-camera text-green-500"></i>
                                    <span
                                        class="text-sm font-medium text-neutral-700">{{ $item['photographer'] }}</span>
                                </div>
                                <a href="#"
                                    class="inline-flex items-center gap-2 text-green-500 font-semibold transition-colors duration-300 hover:text-green-600">
                                    Lihat
                                    <i class="fa-solid fa-eye text-sm"></i>
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
</x-main-layout>







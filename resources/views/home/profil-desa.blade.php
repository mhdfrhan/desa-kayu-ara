<x-main-layout>
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-green-700 to-green-800">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-green-600/10 via-transparent to-transparent"></div>
        </div>
        <x-container>
            <div class="text-center py-20">
                <div
                    class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-info-circle"></i>
                    Informasi Desa
                </div>
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
                    Profil Desa
                </h1>
                <p class="text-lg text-neutral-200 max-w-3xl mx-auto leading-relaxed">
                    Kenali lebih dekat Desa Sungai Kayu Ara melalui visi, misi, struktur organisasi, sejarah, dan lokasi
                    geografis yang strategis.
                </p>
            </div>
        </x-container>
    </section>

    <!-- Visi Misi Section -->
    <section class="py-20 bg-white">
        <x-container>
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-bullseye"></i>
                    Visi & Misi Desa
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Visi & <span class="text-green-500">Misi</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Visi dan misi yang menjadi pedoman dalam pembangunan dan pengembangan Desa Sungai Kayu Ara.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Visi -->
                <div
                    class="group bg-gradient-to-br from-green-50 to-green-100/30 rounded-3xl p-8 border border-green-100 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="text-center mb-6">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 bg-green-500 rounded-2xl mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fa-solid fa-eye text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-neutral-800 mb-2">Visi Desa</h3>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-green-200">
                        @if ($profilDesa->where('jenis', 'visi')->first())
                            <p class="text-lg text-neutral-700 leading-relaxed italic text-center">
                                "{{ $profilDesa->where('jenis', 'visi')->first()->konten }}"
                            </p>
                        @else
                            <p class="text-lg text-neutral-700 leading-relaxed italic text-center">
                                "Terwujudnya Desa Sungai Kayu Ara yang Maju, Mandiri, dan Sejahtera melalui Pembangunan
                                Berkelanjutan yang Berwawasan Lingkungan"
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Misi -->
                <div
                    class="group bg-gradient-to-br from-green-50 to-green-100/30 rounded-3xl p-8 border border-green-100 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="text-center mb-6">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 bg-green-500 rounded-2xl mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fa-solid fa-bullseye text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-neutral-800 mb-2">Misi Desa</h3>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-green-200">
                        @if ($profilDesa->where('jenis', 'misi')->first())
                            <div class="space-y-3">
                                @php
                                    $misiContent = $profilDesa->where('jenis', 'misi')->first()->konten;
                                    $misiLines = explode("\n", $misiContent);
                                @endphp
                                @foreach ($misiLines as $line)
                                    @php
                                        $trimmedLine = trim($line);
                                    @endphp
                                    @if (!empty($trimmedLine))
                                        <div class="flex items-center gap-3">
                                            @if (preg_match('/^\d+\./', $trimmedLine))
                                                @php
                                                    $number = preg_replace('/^(\d+)\.\s*(.*)/', '$1', $trimmedLine);
                                                    $text = preg_replace('/^\d+\.\s*(.*)/', '$1', $trimmedLine);
                                                @endphp
                                                <div
                                                    class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm shrink-0 mt-1">
                                                    {{ $number }}
                                                </div>
                                                <p class="text-neutral-700 leading-relaxed text-sm flex-1">
                                                    {{ $text }}
                                                </p>
                                            @else
                                                <div
                                                    class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm shrink-0 mt-1">
                                                    {{ $loop->iteration }}
                                                </div>
                                                <p class="text-neutral-700 leading-relaxed text-sm flex-1">
                                                    {{ $trimmedLine }}
                                                </p>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <div class="space-y-3">
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm shrink-0 mt-1">
                                        1</div>
                                    <p class="text-neutral-700 leading-relaxed text-sm">
                                        Meningkatkan kualitas pendidikan dan kesehatan masyarakat desa melalui program
                                        pemberdayaan yang berkelanjutan.
                                    </p>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm shrink-0 mt-1">
                                        2</div>
                                    <p class="text-neutral-700 leading-relaxed text-sm">
                                        Mengembangkan ekonomi desa melalui pemberdayaan UMKM, pertanian modern, dan
                                        sektor pariwisata yang berwawasan lingkungan.
                                    </p>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm shrink-0 mt-1">
                                        3</div>
                                    <p class="text-neutral-700 leading-relaxed text-sm">
                                        Membangun infrastruktur desa yang memadai dan ramah lingkungan untuk
                                        meningkatkan kualitas hidup masyarakat.
                                    </p>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm shrink-0 mt-1">
                                        4</div>
                                    <p class="text-neutral-700 leading-relaxed text-sm">
                                        Melestarikan budaya dan kearifan lokal sambil mengembangkan inovasi untuk
                                        kemajuan desa.
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </x-container>
    </section>

    <!-- Bagan Desa Section -->
    <section class="py-20 bg-gradient-to-br from-yellow-50 via-white to-yellow-50/30">
        <x-container>
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 bg-yellow-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-sitemap"></i>
                    Struktur Organisasi
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Bagan <span class="text-yellow-500">Desa</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Struktur organisasi pemerintahan desa yang menunjukkan hierarki dan tanggung jawab masing-masing
                    komponen.
                </p>
            </div>

            @if ($profilDesa->where('jenis', 'struktur-organisasi')->count() > 0)
                @foreach ($profilDesa->where('jenis', 'struktur-organisasi') as $struktur)
                    <div class="mb-16">
                        <h3 class="text-2xl font-bold text-neutral-800 mb-8 text-center">
                            {{ $struktur->judul }}
                        </h3>
                        <div class="bg-white rounded-3xl shadow-lg p-8 border border-yellow-100">
                            <div class="flex justify-center">
                                @if ($struktur->gambar)
                                    <img src="{{ asset($struktur->gambar) }}" alt="{{ $struktur->judul }}"
                                        class="w-full max-w-4xl h-auto rounded-2xl shadow-md">
                                @else
                                    <div
                                        class="w-full max-w-4xl h-64 bg-gradient-to-br from-yellow-100 to-yellow-200 rounded-2xl flex items-center justify-center">
                                        <div class="text-center text-yellow-600">
                                            <i class="fas fa-sitemap text-6xl mb-4"></i>
                                            <p class="text-lg font-semibold">{{ $struktur->judul }}</p>
                                            <p class="text-sm">Gambar belum tersedia</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if ($struktur->konten)
                                <div class="mt-6 text-center">
                                    <p class="text-neutral-600 leading-relaxed">{{ $struktur->konten }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Fallback jika tidak ada data struktur organisasi -->
                <div class="mb-16">
                    <h3 class="text-2xl font-bold text-neutral-800 mb-8 text-center">
                        Struktur Organisasi Pemerintahan Desa
                    </h3>
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-yellow-100">
                        <div class="flex justify-center">
                            <div
                                class="w-full max-w-4xl h-64 bg-gradient-to-br from-yellow-100 to-yellow-200 rounded-2xl flex items-center justify-center">
                                <div class="text-center text-yellow-600">
                                    <i class="fas fa-sitemap text-6xl mb-4"></i>
                                    <p class="text-lg font-semibold">Struktur Organisasi</p>
                                    <p class="text-sm">Data belum tersedia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </x-container>
    </section>

    <!-- Sejarah Desa Section -->
    <section class="py-20 bg-white">
        <x-container>
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 bg-red-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-book-open"></i>
                    Sejarah Desa
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Sejarah <span class="text-red-500">Desa</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Perjalanan panjang Desa Sungai Kayu Ara dari masa lalu hingga menjadi desa yang maju dan berkembang
                    seperti sekarang.
                </p>
            </div>

            <!-- Sejarah Content -->
            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-to-br from-red-50 to-red-100/30 rounded-3xl p-8 lg:p-12 border border-red-100">
                    <div class="prose prose-lg max-w-none">
                        <h3 class="text-2xl font-bold text-neutral-800 mb-6 text-center">Perjalanan Desa Sungai Kayu Ara
                        </h3>

                        <div class="space-y-6 text-neutral-700 leading-relaxed">
                            @if ($profilDesa->where('jenis', 'sejarah')->first())
                                {!! nl2br(e($profilDesa->where('jenis', 'sejarah')->first()->konten)) !!}
                            @else
                                <p>
                                    Desa Sungai Kayu Ara memiliki sejarah yang panjang dan menarik. Bermula dari tahun
                                    1950,
                                    desa ini mulai terbentuk dari sekelompok keluarga yang bermukim di sekitar sungai
                                    dengan
                                    mata pencaharian utama sebagai petani dan nelayan. Nama "Sungai Kayu Ara" diambil
                                    dari
                                    nama sungai yang mengalir di tengah desa dan pohon kayu ara yang banyak tumbuh di
                                    sekitar sungai tersebut.
                                </p>

                                <p>
                                    Pada tahun 1980, desa ini mengalami perkembangan signifikan dengan dimulainya
                                    pembangunan infrastruktur dasar seperti jalan desa, jembatan, dan fasilitas umum.
                                    Pembangunan ini dilakukan untuk meningkatkan konektivitas antar dusun dan memudahkan
                                    akses warga ke berbagai layanan publik. Jembatan penghubung antar dusun menjadi
                                    salah
                                    satu pencapaian penting yang mengubah wajah desa.
                                </p>

                                <p>
                                    Memasuki tahun 2000, Desa Sungai Kayu Ara mulai mengembangkan program pemberdayaan
                                    ekonomi desa. Program ini meliputi pengembangan UMKM, pertanian modern, dan sektor
                                    pariwisata yang berwawasan lingkungan. Para petani mulai menerapkan teknologi
                                    pertanian
                                    modern, sementara sektor pariwisata mulai dikembangkan dengan memanfaatkan keindahan
                                    alam desa.
                                </p>

                                <p>
                                    Hingga tahun 2024, Desa Sungai Kayu Ara telah berkembang menjadi desa yang maju,
                                    mandiri, dan sejahtera. Berbagai prestasi telah diraih di bidang pembangunan dan
                                    pemberdayaan masyarakat. Desa ini telah berhasil mengembangkan berbagai sektor
                                    ekonomi,
                                    meningkatkan kualitas pendidikan dan kesehatan warga, serta melestarikan budaya dan
                                    kearifan lokal sambil mengembangkan inovasi untuk kemajuan desa.
                                </p>

                                <p>
                                    Saat ini, Desa Sungai Kayu Ara menjadi contoh desa yang berhasil mengembangkan
                                    potensi
                                    lokalnya dengan baik. Keberhasilan ini tidak lepas dari kerja keras dan gotong
                                    royong
                                    seluruh warga desa, serta dukungan dari berbagai pihak dalam pembangunan desa yang
                                    berkelanjutan dan berwawasan lingkungan.
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </section>

    <!-- Peta Lokasi Section -->
    <section class="py-20 bg-gradient-to-br from-green-50 via-white to-green-50/30">
        <x-container>
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-map-marker-alt"></i>
                    Lokasi Desa
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Peta <span class="text-green-500">Lokasi</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Lokasi strategis Desa Sungai Kayu Ara yang mudah dijangkau dan memiliki akses transportasi yang
                    memadai.
                </p>
            </div>

            <!-- Map Container -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-green-100">
                <div id="map" class="w-full h-96 lg:h-[500px]"></div>
            </div>

            <!-- Location Info -->
            <div class="mt-8 grid md:grid-cols-3 gap-6">
                @if ($lokasiPeta->count() > 0)
                    @foreach ($lokasiPeta->take(3) as $index => $lokasi)
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-green-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center">
                                    @if ($index == 0)
                                        <i class="fa-solid fa-map text-white"></i>
                                    @elseif($index == 1)
                                        <i class="fa-solid fa-road text-white"></i>
                                    @else
                                        <i class="fa-solid fa-clock text-white"></i>
                                    @endif
                                </div>
                                <h3 class="font-semibold text-neutral-800">{{ $lokasi->judul }}</h3>
                            </div>
                            <p class="text-neutral-600">{{ $lokasi->deskripsi }}</p>
                            @if ($lokasi->informasi_tambahan)
                                <p class="text-sm text-neutral-500 mt-2">{{ $lokasi->informasi_tambahan }}</p>
                            @endif
                        </div>
                    @endforeach
                @else
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-green-100">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-map text-white"></i>
                            </div>
                            <h3 class="font-semibold text-neutral-800">Koordinat</h3>
                        </div>
                        <p class="text-neutral-600">±1.1735° LU, 102.1939° BT</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-green-100">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-road text-white"></i>
                            </div>
                            <h3 class="font-semibold text-neutral-800">Luas / Populasi</h3>
                        </div>
                        <p class="text-neutral-600">±12,000 Ha / sekitar 1,039 jiwa</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-green-100">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-clock text-white"></i>
                            </div>
                            <h3 class="font-semibold text-neutral-800">Jarak dari Siak</h3>
                        </div>
                        <p class="text-neutral-600">±111 km, sekitar 1,5 jam perjalanan darat</p>
                    </div>
                @endif
            </div>
        </x-container>
    </section>

    @push('scripts')
        <script src='https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.js'></script>
        <link href='https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.css' rel='stylesheet' />
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if ($lokasiPeta->count() > 0)
                    @php
                        $lokasiUtama = $lokasiPeta->first();
                        $centerLat = $lokasiUtama->koordinat_lat ?? 1.1735;
                        $centerLng = $lokasiUtama->koordinat_lng ?? 102.1939;
                        $zoomLevel = $lokasiUtama->zoom_level ?? 12;
                    @endphp
                @else
                    @php
                        $centerLat = 1.1735;
                        $centerLng = 102.1939;
                        $zoomLevel = 12;
                    @endphp
                @endif

                const map = new maplibregl.Map({
                    container: 'map',
                    style: {
                        version: 8,
                        sources: {
                            'osm': {
                                type: 'raster',
                                tiles: ['https://tile.openstreetmap.org/{z}/{x}/{y}.png'],
                                tileSize: 256,
                                attribution: '© OpenStreetMap contributors'
                            }
                        },
                        layers: [{
                            id: 'osm-tiles',
                            type: 'raster',
                            source: 'osm',
                            minzoom: 0,
                            maxzoom: 22
                        }]
                    },
                    center: [{{ $centerLng }}, {{ $centerLat }}], // Koordinat dari database
                    zoom: {{ $zoomLevel }}
                });

                // Add markers for all locations
                map.on('load', function() {
                    @if ($lokasiPeta->count() > 0)
                        @foreach ($lokasiPeta as $index => $lokasi)
                            const marker{{ $index }} = new maplibregl.Marker({
                                    color: '#10B981',
                                    scale: 1.2
                                })
                                .setLngLat([{{ $lokasi->koordinat_lng }}, {{ $lokasi->koordinat_lat }}])
                                .addTo(map);

                            // Add popup for each location
                            const popup{{ $index }} = new maplibregl.Popup({
                                    closeButton: false,
                                    closeOnClick: false
                                })
                                .setLngLat([{{ $lokasi->koordinat_lng }}, {{ $lokasi->koordinat_lat }}])
                                .setHTML(`
                                    <div class="p-4">
                                        <h3 class="font-bold text-lg text-green-600 mb-2">{{ $lokasi->judul }}</h3>
                                        <p class="text-sm text-gray-600">{{ $lokasi->deskripsi }}</p>
                                        @if ($lokasi->alamat)
                                            <p class="text-xs text-gray-500 mt-1">{{ $lokasi->alamat }}</p>
                                        @endif
                                    </div>
                                `)
                                .addTo(map);
                        @endforeach
                    @else
                        // Default marker if no data
                        const marker = new maplibregl.Marker({
                                color: '#10B981',
                                scale: 1.2
                            })
                            .setLngLat([{{ $centerLng }}, {{ $centerLat }}])
                            .addTo(map);

                        // Add popup
                        const popup = new maplibregl.Popup({
                                closeButton: false,
                                closeOnClick: false
                            })
                            .setLngLat([{{ $centerLng }}, {{ $centerLat }}])
                            .setHTML(`
                                <div class="p-4">
                                    <h3 class="font-bold text-lg text-green-600 mb-2">Desa Sungai Kayu Ara</h3>
                                    <p class="text-sm text-gray-600">Kecamatan Sungai Apit, Kabupaten Siak, Riau</p>
                                </div>
                            `)
                            .addTo(map);
                    @endif

                    // Animate zoom to location
                    setTimeout(() => {
                        map.flyTo({
                            center: [{{ $centerLng }}, {{ $centerLat }}],
                            zoom: {{ $zoomLevel }},
                            duration: 3000,
                            curve: 1.42,
                            easing: function(t) {
                                return t * (2 - t);
                            }
                        });
                    }, 1000);
                });
            });
        </script>
    @endpush
</x-main-layout>

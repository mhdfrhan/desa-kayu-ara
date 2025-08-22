<x-main-layout>
    <x-slot name="title">Peta Desa</x-slot>

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-green-700 to-green-800">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-green-600/10 via-transparent to-transparent"></div>
        </div>
        <x-container>
            <div class="text-center py-20">
                <div
                    class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-map-location-dot"></i>
                    Peta Desa
                </div>
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
                    Peta Desa
                </h1>
                <p class="text-lg text-neutral-200 max-w-3xl mx-auto leading-relaxed">
                    Jelajahi lokasi strategis dan berbagai destinasi menarik di Desa Sungai Kayu Ara melalui peta
                    interaktif yang modern dan informatif.
                </p>
            </div>
        </x-container>
    </section>

    <!-- Map Section -->
    <section class="py-20 bg-white">
        <x-container>
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Peta <span class="text-green-500">Interaktif</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Peta digital yang menampilkan lokasi strategis, destinasi wisata, dan fasilitas penting di Desa
                    Sungai Kayu Ara.
                </p>
            </div>

            <!-- Map Container -->
            <div class="relative">
                <!-- Map Controls -->
                <div class="absolute top-4 left-4 z-10 flex flex-col gap-2">
                    <button id="zoomIn"
                        class="w-12 h-12 bg-white rounded-xl shadow-lg flex items-center justify-center hover:bg-green-50 transition-colors duration-300 border border-gray-200">
                        <i class="fa-solid fa-plus text-green-600"></i>
                    </button>
                    <button id="zoomOut"
                        class="w-12 h-12 bg-white rounded-xl shadow-lg flex items-center justify-center hover:bg-green-50 transition-colors duration-300 border border-gray-200">
                        <i class="fa-solid fa-minus text-green-600"></i>
                    </button>
                    <button id="resetView"
                        class="w-12 h-12 bg-white rounded-xl shadow-lg flex items-center justify-center hover:bg-green-50 transition-colors duration-300 border border-gray-200">
                        <i class="fa-solid fa-home text-green-600"></i>
                    </button>
                </div>

                <!-- Map Legend -->
                <div class="absolute top-4 right-4 z-10 bg-white rounded-2xl shadow-lg p-4 border border-gray-200">
                    <h3 class="font-semibold text-neutral-800 mb-3">Legenda</h3>
                    <div class="space-y-2">
                        <div class="flex items-center gap-3">
                            <div class="w-4 h-4 bg-green-500 rounded-full"></div>
                            <span class="text-sm text-neutral-600">Desa Sungai Kayu Ara</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-4 h-4 bg-blue-500 rounded-full"></div>
                            <span class="text-sm text-neutral-600">Wisata Alam</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-4 h-4 bg-orange-500 rounded-full"></div>
                            <span class="text-sm text-neutral-600">Fasilitas Umum</span>
                        </div>
                    </div>
                </div>

                <!-- Map Container -->
                <div id="map" class="w-full h-[600px] rounded-3xl shadow-xl border border-gray-200"></div>

                <!-- Location Info Panel -->
                <div id="locationInfo"
                    class="absolute bottom-4 left-4 z-10 bg-white rounded-2xl shadow-lg p-6 border border-gray-200 max-w-sm opacity-0 transform translate-y-4 transition-all duration-300">
                    <div class="flex items-start justify-between mb-3">
                        <h3 id="locationTitle" class="font-bold text-lg text-neutral-800"></h3>
                        <button id="closeInfo" class="text-neutral-400 hover:text-neutral-600">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    </div>
                    <p id="locationDescription" class="text-neutral-600 mb-4"></p>
                    <div class="flex items-center gap-2 text-sm text-neutral-500">
                        <i class="fa-solid fa-location-dot text-green-500"></i>
                        <span id="locationCoordinates"></span>
                    </div>
                </div>
            </div>
        </x-container>
    </section>

    <!-- MapLibre GL JS -->
    <script src="https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.js"></script>
    <link href="https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.css" rel="stylesheet" />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Map
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
                center: [102.1939, 1.1735], // Koordinat Desa Sungai Kayu Ara
                zoom: 12
            });

            // Location data
            const locations = [{
                    name: 'Desa Sungai Kayu Ara',
                    coordinates: [102.1939, 1.1735],
                    category: 'desa',
                    description: 'Pusat pemerintahan dan kehidupan masyarakat Desa Sungai Kayu Ara',
                    color: '#10B981'
                },
                {
                    name: 'Ekowisata Mangrove Tanjung Kuras',
                    coordinates: [102.178030, 1.230415],
                    category: 'wisata',
                    description: 'Objek wisata alam berupa hutan mangrove yang terletak di Desa Tanjung Kuras',
                    color: '#8B5CF6'
                },
                {
                    name: 'Kantor Desa',
                    coordinates: [102.185870, 1.095361],
                    category: 'fasilitas',
                    description: 'Pusat pemerintahan desa yang melayani administrasi warga',
                    color: '#F97316'
                },
                {
                    name: 'Mangrove Sungai Bersejarah Permai',
                    coordinates: [102.189869, 1.116041],
                    category: 'wisata',
                    description: 'Ekowisata Mangrove Sungai Bersejarah (MSB) atau Wisata Edukasi Mangrove Sungai Bersejarah adalah objek wisata alam yang terletak di Kampung Kayu Ara Permai',
                    color: '#8B5CF6'
                },
            ];

            // Add markers when map loads
            map.on('load', function() {
                locations.forEach((location, index) => {
                    // Add marker
                    const marker = new maplibregl.Marker({
                            color: location.color,
                            scale: 1.2
                        })
                        .setLngLat(location.coordinates)
                        .addTo(map);

                    // Add popup
                    const popup = new maplibregl.Popup({
                            closeButton: false,
                            closeOnClick: false,
                            maxWidth: '300px'
                        })
                        .setHTML(`
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-neutral-800 mb-2">${location.name}</h3>
                            <p class="text-sm text-neutral-600 mb-3">${location.description}</p>
                            <div class="flex items-center gap-2 text-sm text-neutral-500">
                                <i class="fa-solid fa-location-dot text-green-500"></i>
                                <span>${location.coordinates[1].toFixed(4)}° LU, ${location.coordinates[0].toFixed(4)}° BT</span>
                            </div>
                        </div>
                    `);

                    // Show popup on marker click
                    marker.setPopup(popup);

                    // Add click event to show location info panel
                    marker.getElement().addEventListener('click', function() {
                        showLocationInfo(location);
                    });

                    // Add border circle for main village location
                    if (location.name === 'Desa Sungai Kayu Ara') {
                        map.addSource('village-border', {
                            type: 'geojson',
                            data: {
                                type: 'Feature',
                                geometry: {
                                    type: 'Point',
                                    coordinates: location.coordinates
                                },
                                properties: {}
                            }
                        });


                    }
                });

                // Animate zoom to village location
                setTimeout(() => {
                    map.flyTo({
                        center: [102.1939, 1.1735],
                        zoom: 10,
                        duration: 3000,
                        curve: 1.42,
                        easing: function(t) {
                            return t * (2 - t);
                        }
                    });
                }, 1000);
            });

            // Map controls
            document.getElementById('zoomIn').addEventListener('click', () => {
                map.zoomIn({
                    duration: 500
                });
            });

            document.getElementById('zoomOut').addEventListener('click', () => {
                map.zoomOut({
                    duration: 500
                });
            });

            document.getElementById('resetView').addEventListener('click', () => {
                map.flyTo({
                    center: [102.1939, 1.1735],
                    zoom: 13,
                    duration: 2000,
                    curve: 1.42
                });
            });

            // Location info panel functions
            function showLocationInfo(location) {
                const panel = document.getElementById('locationInfo');
                const title = document.getElementById('locationTitle');
                const description = document.getElementById('locationDescription');
                const coordinates = document.getElementById('locationCoordinates');

                title.textContent = location.name;
                description.textContent = location.description;
                coordinates.textContent =
                    `${location.coordinates[1].toFixed(4)}° LU, ${location.coordinates[0].toFixed(4)}° BT`;

                panel.classList.remove('opacity-0', 'translate-y-4');
                panel.classList.add('opacity-100', 'translate-y-0');
            }

            document.getElementById('closeInfo').addEventListener('click', () => {
                const panel = document.getElementById('locationInfo');
                panel.classList.remove('opacity-100', 'translate-y-0');
                panel.classList.add('opacity-0', 'translate-y-4');
            });

            // Category filter functionality
            document.querySelectorAll('[data-category]').forEach(category => {
                category.addEventListener('click', () => {
                    const categoryName = category.getAttribute('data-category');
                    // Add filter logic here if needed
                    console.log('Filter by category:', categoryName);
                });
            });

            // Add smooth scroll behavior
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
</x-main-layout>

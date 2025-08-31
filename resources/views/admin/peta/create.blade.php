@extends('layouts.admin')

@section('title', 'Tambah Lokasi Peta')
@section('page-title', 'Tambah Lokasi Peta')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tambah Lokasi Peta</h1>
                <p class="mt-1 text-sm text-gray-600">Tambahkan lokasi penting yang akan ditampilkan di peta kampung</p>
            </div>
            <a href="{{ route('admin.peta.index') }}">
                <x-ghost-button>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </x-ghost-button>
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <form action="{{ route('admin.peta.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Lokasi</h3>
                </div>

                <div class="px-6 py-4 space-y-6">
                    <!-- Judul dan Deskripsi -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Lokasi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('judul') border-red-500 @enderror"
                                placeholder="Contoh: Kantor Kampung, Masjid, Sekolah, dll" required>
                            @error('judul')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="zoom_level" class="block text-sm font-medium text-gray-700 mb-2">
                                Level Zoom <span class="text-red-500">*</span>
                            </label>
                            <select name="zoom_level" id="zoom_level" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('zoom_level') border-red-500 @enderror">
                                <option value="">Pilih level zoom</option>
                                <option value="10" {{ old('zoom_level') == '10' ? 'selected' : '' }}>10 - Jauh</option>
                                <option value="11" {{ old('zoom_level') == '11' ? 'selected' : '' }}>11 - Sedang Jauh
                                </option>
                                <option value="12" {{ old('zoom_level') == '12' ? 'selected' : '' }}>12 - Sedang
                                </option>
                                <option value="13" {{ old('zoom_level') == '13' ? 'selected' : '' }}>13 - Sedang Dekat
                                </option>
                                <option value="14" {{ old('zoom_level') == '14' ? 'selected' : '' }}>14 - Dekat</option>
                                <option value="15" {{ old('zoom_level') == '15' ? 'selected' : '' }}>15 - Sangat Dekat
                                </option>
                                <option value="16" {{ old('zoom_level') == '16' ? 'selected' : '' }}>16 - Detail
                                </option>
                                <option value="17" {{ old('zoom_level') == '17' ? 'selected' : '' }}>17 - Sangat Detail
                                </option>
                                <option value="18" {{ old('zoom_level') == '18' ? 'selected' : '' }}>18 - Maksimal
                                    Detail</option>
                            </select>
                            @error('zoom_level')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi <span class="text-red-500">*</span>
                        </label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('deskripsi') border-red-500 @enderror"
                            placeholder="Masukkan deskripsi lengkap tentang lokasi ini">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 1000 karakter</p>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                            Alamat <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('alamat') border-red-500 @enderror"
                            placeholder="Masukkan alamat lengkap lokasi" required>
                        @error('alamat')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Koordinat -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="koordinat_lat" class="block text-sm font-medium text-gray-700 mb-2">
                                Latitude <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="koordinat_lat" id="koordinat_lat"
                                value="{{ old('koordinat_lat') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('koordinat_lat') border-red-500 @enderror"
                                placeholder="Contoh: 1.1735" required>
                            @error('koordinat_lat')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Koordinat latitude (garis lintang)</p>
                        </div>

                        <div>
                            <label for="koordinat_lng" class="block text-sm font-medium text-gray-700 mb-2">
                                Longitude <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="koordinat_lng" id="koordinat_lng"
                                value="{{ old('koordinat_lng') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('koordinat_lng') border-red-500 @enderror"
                                placeholder="Contoh: 102.1939" required>
                            @error('koordinat_lng')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Koordinat longitude (garis bujur)</p>
                        </div>
                    </div>

                    <!-- Koordinat Picker -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Pilih Koordinat di Peta
                        </label>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div id="mapPicker" class="w-full h-64 rounded-lg border border-gray-300"></div>
                            <p class="mt-2 text-xs text-gray-500">
                                Klik pada peta untuk memilih koordinat, atau masukkan manual di atas
                            </p>
                        </div>
                    </div>

                    <!-- Gambar -->
                    <div>
                        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                            Gambar Lokasi
                        </label>
                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <input type="file" name="gambar" id="gambar" accept="image/*"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('gambar') border-red-500 @enderror"
                                    onchange="previewImage(this)">
                                @error('gambar')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal 2MB.</p>
                            </div>
                            <div id="imagePreview" class="hidden">
                                <img id="preview" src="" alt="Preview"
                                    class="w-20 h-20 object-cover rounded-lg border border-gray-300">
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Tambahan -->
                    <div>
                        <label for="informasi_tambahan" class="block text-sm font-medium text-gray-700 mb-2">
                            Informasi Tambahan
                        </label>
                        <textarea name="informasi_tambahan" id="informasi_tambahan" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('informasi_tambahan') border-red-500 @enderror"
                            placeholder="Informasi tambahan seperti jam operasional, kontak, dll">{{ old('informasi_tambahan') }}</textarea>
                        @error('informasi_tambahan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 1000 karakter</p>
                    </div>

                    <!-- Status -->
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="checkbox" name="aktif" id="aktif" value="1"
                                {{ old('aktif') ? 'checked' : '' }}
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="aktif" class="ml-2 block text-sm text-gray-700">
                                Aktifkan lokasi ini
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.peta.index') }}">
                            <x-outline-button type="button" color="neutral">
                                Batal
                            </x-outline-button>
                        </a>
                        <x-primary-button type="submit">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Lokasi
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- MapLibre GL JS -->
    <script src="https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.js"></script>
    <link href="https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.css" rel="stylesheet" />

    <script>
        // Initialize map picker
        let mapPicker;
        let marker;

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize map
            mapPicker = new maplibregl.Map({
                container: 'mapPicker',
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
                center: [102.1939, 1.1735], // Default to Kampung Sungai Kayu Ara
                zoom: 12
            });

            // Add click event to map
            mapPicker.on('click', function(e) {
                const lngLat = e.lngLat;

                // Update input fields
                document.getElementById('koordinat_lat').value = lngLat.lat.toFixed(6);
                document.getElementById('koordinat_lng').value = lngLat.lng.toFixed(6);

                // Update marker
                if (marker) {
                    marker.remove();
                }

                marker = new maplibregl.Marker({
                        color: '#10B981',
                        scale: 1.2
                    })
                    .setLngLat([lngLat.lng, lngLat.lat])
                    .addTo(mapPicker);
            });

            // Add marker on map load
            mapPicker.on('load', function() {
                // Add default marker for Kampung Sungai Kayu Ara
                marker = new maplibregl.Marker({
                        color: '#10B981',
                        scale: 1.2
                    })
                    .setLngLat([102.1939, 1.1735])
                    .addTo(mapPicker);
            });
        });

        // Image preview
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                previewContainer.classList.add('hidden');
            }
        }

        // Auto-resize textarea
        document.getElementById('deskripsi').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        document.getElementById('informasi_tambahan').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const judul = document.getElementById('judul').value;
            const deskripsi = document.getElementById('deskripsi').value;
            const alamat = document.getElementById('alamat').value;
            const koordinat_lat = document.getElementById('koordinat_lat').value;
            const koordinat_lng = document.getElementById('koordinat_lng').value;
            const zoom_level = document.getElementById('zoom_level').value;

            if (!judul || !deskripsi || !alamat || !koordinat_lat || !koordinat_lng || !zoom_level) {
                e.preventDefault();
                alert('Mohon lengkapi semua field yang wajib diisi');
                return false;
            }
        });
    </script>
@endpush

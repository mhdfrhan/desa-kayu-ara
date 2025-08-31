@extends('layouts.admin')

@section('title', 'Edit Data Administrasi Penduduk')
@section('page-title', 'Edit Data Administrasi Penduduk')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Data Administrasi Penduduk</h1>
                <p class="mt-1 text-sm text-gray-600">Edit data administrasi dan statistik penduduk</p>
            </div>
            <a href="{{ route('admin.administrasi.index') }}">
                <x-ghost-button>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </x-ghost-button>
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <form action="{{ route('admin.administrasi.update', $administrasi) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Data Administrasi</h3>
                </div>

                <div class="px-6 py-4 space-y-6">
                    <!-- Kategori -->
                    <div>
                        <label for="jenis" class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="jenis" id="jenis"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('jenis') border-red-500 @enderror"
                            required>
                            <option value="">Pilih Kategori</option>
                            <option value="total_penduduk"
                                {{ old('jenis', $administrasi->jenis) == 'total_penduduk' ? 'selected' : '' }}>Total
                                Penduduk</option>
                            <option value="kepala_keluarga"
                                {{ old('jenis', $administrasi->jenis) == 'kepala_keluarga' ? 'selected' : '' }}>Kepala
                                Keluarga</option>
                            <option value="penduduk_sementara"
                                {{ old('jenis', $administrasi->jenis) == 'penduduk_sementara' ? 'selected' : '' }}>Penduduk
                                Sementara</option>
                            <option value="laki_laki"
                                {{ old('jenis', $administrasi->jenis) == 'laki_laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="perempuan"
                                {{ old('jenis', $administrasi->jenis) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            <option value="mutasi_penduduk"
                                {{ old('jenis', $administrasi->jenis) == 'mutasi_penduduk' ? 'selected' : '' }}>Mutasi
                                Penduduk</option>
                        </select>
                        @error('jenis')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Pilih kategori data administrasi penduduk</p>
                    </div>

                    <!-- Nilai dan Satuan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nilai" class="block text-sm font-medium text-gray-700 mb-2">
                                Nilai <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nilai" id="nilai"
                                value="{{ old('nilai', $administrasi->nilai) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('nilai') border-red-500 @enderror"
                                placeholder="Contoh: 1500, 75%, 25" required>
                            @error('nilai')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="satuan" class="block text-sm font-medium text-gray-700 mb-2">
                                Satuan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="satuan" id="satuan"
                                value="{{ old('satuan', $administrasi->satuan) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('satuan') border-red-500 @enderror"
                                placeholder="Contoh: Jiwa, KK, %, Tahun" required>
                            @error('satuan')
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
                            placeholder="Masukkan deskripsi lengkap tentang data ini" required>{{ old('deskripsi', $administrasi->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 1000 karakter</p>
                    </div>

                    <!-- Warna Icon dan Icon -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="warna_icon" class="block text-sm font-medium text-gray-700 mb-2">
                                Warna Icon <span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center space-x-3">
                                <input type="color" name="warna_icon" id="warna_icon"
                                    value="{{ old('warna_icon', $administrasi->warna_icon) }}"
                                    class="w-12 h-12 border border-gray-300 rounded-lg cursor-pointer @error('warna_icon') border-red-500 @enderror">
                                <input type="text" name="warna_text" id="warna_text"
                                    value="{{ old('warna_icon', $administrasi->warna_icon) }}"
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent font-mono text-sm"
                                    placeholder="#10B981">
                            </div>
                            @error('warna_icon')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">
                                Icon
                            </label>
                            <div
                                class="grid grid-cols-6 gap-2 mb-3 max-h-32 overflow-y-auto border border-gray-300 rounded-lg p-3">
                                @php
                                    $icons = [
                                        'fas fa-users',
                                        'fas fa-user-friends',
                                        'fas fa-home',
                                        'fas fa-building',
                                        'fas fa-chart-bar',
                                        'fas fa-chart-pie',
                                        'fas fa-chart-line',
                                        'fas fa-percentage',
                                        'fas fa-male',
                                        'fas fa-female',
                                        'fas fa-child',
                                        'fas fa-baby',
                                        'fas fa-graduation-cap',
                                        'fas fa-briefcase',
                                        'fas fa-heart',
                                        'fas fa-heartbeat',
                                        'fas fa-car',
                                        'fas fa-motorcycle',
                                        'fas fa-bicycle',
                                        'fas fa-walking',
                                        'fas fa-bus',
                                        'fas fa-train',
                                        'fas fa-plane',
                                        'fas fa-ship',
                                        'fas fa-phone',
                                        'fas fa-mobile-alt',
                                        'fas fa-laptop',
                                        'fas fa-desktop',
                                        'fas fa-tablet-alt',
                                        'fas fa-tv',
                                        'fas fa-wifi',
                                        'fas fa-signal',
                                        'fas fa-battery-full',
                                        'fas fa-battery-half',
                                        'fas fa-battery-empty',
                                        'fas fa-plug',
                                        'fas fa-bolt',
                                        'fas fa-sun',
                                        'fas fa-moon',
                                        'fas fa-cloud',
                                        'fas fa-cloud-rain',
                                        'fas fa-cloud-sun',
                                        'fas fa-wind',
                                        'fas fa-umbrella',
                                        'fas fa-thermometer-half',
                                        'fas fa-thermometer-full',
                                        'fas fa-thermometer-empty',
                                        'fas fa-thermometer-quarter',
                                        'fas fa-thermometer-three-quarters',
                                        'fas fa-thermometer-0',
                                        'fas fa-thermometer-1',
                                        'fas fa-thermometer-2',
                                        'fas fa-thermometer-3',
                                        'fas fa-thermometer-4',
                                    ];
                                @endphp
                                @foreach ($icons as $icon)
                                    <button type="button" onclick="selectIcon('{{ $icon }}')"
                                        class="icon-option w-8 h-8 border border-gray-300 rounded-lg flex items-center justify-center hover:border-green-500 hover:bg-green-50 transition-colors {{ $administrasi->icon === $icon ? 'border-green-500 bg-green-50' : '' }}"
                                        title="{{ $icon }}">
                                        <i class="{{ $icon }} text-sm text-gray-600"></i>
                                    </button>
                                @endforeach
                            </div>
                            <input type="text" name="icon" id="icon"
                                value="{{ old('icon', $administrasi->icon) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('icon') border-red-500 @enderror"
                                placeholder="Pilih icon dari daftar di atas atau ketik manual">
                            @error('icon')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">
                                <i class="fas fa-external-link-alt mr-1"></i>
                                Cari icon lainnya di <a href="https://fontawesome.com/search" target="_blank"
                                    class="text-green-600 hover:text-green-700 underline">FontAwesome Search</a>
                            </p>
                        </div>
                    </div>

                    <!-- Urutan -->
                    <div>
                        <label for="urutan" class="block text-sm font-medium text-gray-700 mb-2">
                            Urutan
                        </label>
                        <input type="number" name="urutan" id="urutan"
                            value="{{ old('urutan', $administrasi->urutan) }}" min="0"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('urutan') border-red-500 @enderror"
                            placeholder="0">
                        @error('urutan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Urutan tampilan data (0 = paling atas)</p>
                    </div>

                    <!-- Status Checkbox -->
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="checkbox" name="aktif" id="aktif" value="1"
                                {{ old('aktif', $administrasi->aktif) ? 'checked' : '' }}
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="aktif" class="ml-2 block text-sm text-gray-700">
                                Aktifkan data ini
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.administrasi.index') }}">
                            <x-outline-button type="button" color="neutral">
                                Batal
                            </x-outline-button>
                        </a>
                        <x-primary-button type="submit">
                            <i class="fas fa-save mr-2"></i>
                            Update Data
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Color picker synchronization
        document.getElementById('warna_icon').addEventListener('input', function() {
            document.getElementById('warna_text').value = this.value;
        });

        document.getElementById('warna_text').addEventListener('input', function() {
            document.getElementById('warna_icon').value = this.value;
        });

        // Icon selection
        function selectIcon(icon) {
            document.getElementById('icon').value = icon;

            // Remove previous selection
            document.querySelectorAll('.icon-option').forEach(btn => {
                btn.classList.remove('border-green-500', 'bg-green-50');
                btn.classList.add('border-gray-300');
            });

            // Highlight selected icon
            event.target.closest('.icon-option').classList.remove('border-gray-300');
            event.target.closest('.icon-option').classList.add('border-green-500', 'bg-green-50');
        }

        // Auto-resize textarea
        document.getElementById('deskripsi').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        // Auto-fill satuan based on kategori selection
        document.getElementById('jenis').addEventListener('change', function() {
            const satuanField = document.getElementById('satuan');
            const selectedValue = this.value;

            const satuanMap = {
                'total_penduduk': 'Jiwa',
                'kepala_keluarga': 'KK',
                'penduduk_sementara': 'Jiwa',
                'laki_laki': 'Jiwa',
                'perempuan': 'Jiwa',
                'mutasi_penduduk': 'Tahun 2024'
            };

            if (satuanMap[selectedValue]) {
                satuanField.value = satuanMap[selectedValue];
            }
        });

        // Auto-fill deskripsi based on kategori selection
        document.getElementById('jenis').addEventListener('change', function() {
            const deskripsiField = document.getElementById('deskripsi');
            const selectedValue = this.value;

            const deskripsiMap = {
                'total_penduduk': 'Jumlah penduduk terdaftar di Kampung Sungai Kayu Ara',
                'kepala_keluarga': 'Jumlah kepala keluarga terdaftar',
                'penduduk_sementara': 'Penduduk yang belum memiliki KTP',
                'laki_laki': 'Jumlah penduduk laki-laki',
                'perempuan': 'Jumlah penduduk perempuan',
                'mutasi_penduduk': 'Data mutasi penduduk tahun 2024'
            };

            if (deskripsiMap[selectedValue]) {
                deskripsiField.value = deskripsiMap[selectedValue];
                // Trigger auto-resize
                deskripsiField.style.height = 'auto';
                deskripsiField.style.height = (deskripsiField.scrollHeight) + 'px';
            }
        });
    </script>
@endpush

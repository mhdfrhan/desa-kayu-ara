@extends('layouts.admin')

@section('title', 'Tambah Chart Statistik')
@section('page-title', 'Tambah Chart Statistik')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tambah Chart Statistik</h1>
                <p class="mt-1 text-sm text-gray-600">Buat visualisasi chart dan grafik statistik baru</p>
            </div>
            <a href="{{ route('admin.chart.index') }}">
                <x-ghost-button>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </x-ghost-button>
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <form action="{{ route('admin.chart.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Chart</h3>
                </div>

                <div class="px-6 py-4 space-y-6">
                    <!-- Nama dan Slug -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Chart <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('nama') border-red-500 @enderror"
                                placeholder="Contoh: Statistik Penduduk Berdasarkan Usia" required>
                            @error('nama')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                                Slug
                            </label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('slug') border-red-500 @enderror"
                                placeholder="Akan dibuat otomatis dari nama">
                            @error('slug')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">URL-friendly identifier (opsional)</p>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('deskripsi') border-red-500 @enderror"
                            placeholder="Masukkan deskripsi lengkap tentang chart ini">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 1000 karakter</p>
                    </div>

                    <!-- Tipe Chart -->
                    <div>
                        <label for="tipe_chart" class="block text-sm font-medium text-gray-700 mb-2">
                            Tipe Chart <span class="text-red-500">*</span>
                        </label>
                        <select name="tipe_chart" id="tipe_chart" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('tipe_chart') border-red-500 @enderror">
                            <option value="">Pilih tipe chart</option>
                            <option value="pie" {{ old('tipe_chart') == 'pie' ? 'selected' : '' }}>Pie Chart</option>
                            <option value="bar" {{ old('tipe_chart') == 'bar' ? 'selected' : '' }}>Bar Chart</option>
                            <option value="line" {{ old('tipe_chart') == 'line' ? 'selected' : '' }}>Line Chart</option>
                            <option value="doughnut" {{ old('tipe_chart') == 'doughnut' ? 'selected' : '' }}>Doughnut Chart
                            </option>
                            <option value="radar" {{ old('tipe_chart') == 'radar' ? 'selected' : '' }}>Radar Chart
                            </option>
                            <option value="polarArea" {{ old('tipe_chart') == 'polarArea' ? 'selected' : '' }}>Polar Area
                                Chart</option>
                        </select>
                        @error('tipe_chart')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-3 gap-2">
                            <div class="chart-preview" data-type="pie" style="display: none;">
                                <div class="p-3 border border-gray-200 rounded-lg text-center">
                                    <i class="fas fa-chart-pie text-blue-500 text-xl mb-2"></i>
                                    <p class="text-xs text-gray-600">Pie Chart</p>
                                </div>
                            </div>
                            <div class="chart-preview" data-type="bar" style="display: none;">
                                <div class="p-3 border border-gray-200 rounded-lg text-center">
                                    <i class="fas fa-chart-bar text-green-500 text-xl mb-2"></i>
                                    <p class="text-xs text-gray-600">Bar Chart</p>
                                </div>
                            </div>
                            <div class="chart-preview" data-type="line" style="display: none;">
                                <div class="p-3 border border-gray-200 rounded-lg text-center">
                                    <i class="fas fa-chart-line text-purple-500 text-xl mb-2"></i>
                                    <p class="text-xs text-gray-600">Line Chart</p>
                                </div>
                            </div>
                            <div class="chart-preview" data-type="doughnut" style="display: none;">
                                <div class="p-3 border border-gray-200 rounded-lg text-center">
                                    <i class="fas fa-circle text-orange-500 text-xl mb-2"></i>
                                    <p class="text-xs text-gray-600">Doughnut Chart</p>
                                </div>
                            </div>
                            <div class="chart-preview" data-type="radar" style="display: none;">
                                <div class="p-3 border border-gray-200 rounded-lg text-center">
                                    <i class="fas fa-chart-radar text-red-500 text-xl mb-2"></i>
                                    <p class="text-xs text-gray-600">Radar Chart</p>
                                </div>
                            </div>
                            <div class="chart-preview" data-type="polarArea" style="display: none;">
                                <div class="p-3 border border-gray-200 rounded-lg text-center">
                                    <i class="fas fa-chart-area text-indigo-500 text-xl mb-2"></i>
                                    <p class="text-xs text-gray-600">Polar Area Chart</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Warna Primary dan Secondary -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="warna_primary" class="block text-sm font-medium text-gray-700 mb-2">
                                Warna Primary <span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center space-x-3">
                                <input type="color" name="warna_primary" id="warna_primary"
                                    value="{{ old('warna_primary', '#10B981') }}"
                                    class="w-12 h-12 border border-gray-300 rounded-lg cursor-pointer @error('warna_primary') border-red-500 @enderror">
                                <input type="text" name="warna_primary_text" id="warna_primary_text"
                                    value="{{ old('warna_primary', '#10B981') }}"
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent font-mono text-sm"
                                    placeholder="#10B981">
                            </div>
                            @error('warna_primary')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="warna_secondary" class="block text-sm font-medium text-gray-700 mb-2">
                                Warna Secondary <span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center space-x-3">
                                <input type="color" name="warna_secondary" id="warna_secondary"
                                    value="{{ old('warna_secondary', '#059669') }}"
                                    class="w-12 h-12 border border-gray-300 rounded-lg cursor-pointer @error('warna_secondary') border-red-500 @enderror">
                                <input type="text" name="warna_secondary_text" id="warna_secondary_text"
                                    value="{{ old('warna_secondary', '#059669') }}"
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent font-mono text-sm"
                                    placeholder="#059669">
                            </div>
                            @error('warna_secondary')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>



                    <!-- Urutan -->
                    <div>
                        <label for="urutan" class="block text-sm font-medium text-gray-700 mb-2">
                            Urutan
                        </label>
                        <input type="number" name="urutan" id="urutan" value="{{ old('urutan', 0) }}"
                            min="0"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('urutan') border-red-500 @enderror"
                            placeholder="0">
                        @error('urutan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Urutan tampilan chart (0 = paling atas)</p>
                    </div>

                    <!-- Status Checkbox -->
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="checkbox" name="aktif" id="aktif" value="1"
                                {{ old('aktif') ? 'checked' : '' }}
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="aktif" class="ml-2 block text-sm text-gray-700">
                                Aktifkan chart ini
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.chart.index') }}">
                            <x-outline-button type="button" color="neutral">
                                Batal
                            </x-outline-button>
                        </a>
                        <x-primary-button type="submit">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Chart
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Auto-generate slug from nama
        document.getElementById('nama').addEventListener('input', function() {
            const nama = this.value;
            const slug = nama.toLowerCase()
                .replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim('-');
            document.getElementById('slug').value = slug;
        });

        // Color picker synchronization
        document.getElementById('warna_primary').addEventListener('input', function() {
            document.getElementById('warna_primary_text').value = this.value;
        });

        document.getElementById('warna_primary_text').addEventListener('input', function() {
            document.getElementById('warna_primary').value = this.value;
        });

        document.getElementById('warna_secondary').addEventListener('input', function() {
            document.getElementById('warna_secondary_text').value = this.value;
        });

        document.getElementById('warna_secondary_text').addEventListener('input', function() {
            document.getElementById('warna_secondary').value = this.value;
        });

        // Chart type preview
        document.getElementById('tipe_chart').addEventListener('change', function() {
            const selectedType = this.value;

            // Hide all previews
            document.querySelectorAll('.chart-preview').forEach(preview => {
                preview.style.display = 'none';
            });

            // Show selected preview
            if (selectedType) {
                const selectedPreview = document.querySelector(`[data-type="${selectedType}"]`);
                if (selectedPreview) {
                    selectedPreview.style.display = 'block';
                }
            }
        });

        // Auto-resize textarea
        document.getElementById('deskripsi').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    </script>
@endpush

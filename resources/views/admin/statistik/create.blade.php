@extends('layouts.admin')

@section('title', 'Tambah Data Statistik')
@section('page-title', 'Tambah Data Statistik')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tambah Data Statistik</h1>
                <p class="mt-1 text-sm text-gray-600">Tambahkan data statistik dan informasi kependudukan baru</p>
            </div>
            <a href="{{ route('admin.statistik.index') }}">
                <x-ghost-button>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </x-ghost-button>
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <form action="{{ route('admin.statistik.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Data Statistik</h3>
                </div>

                <div class="px-6 py-4 space-y-6">
                    <!-- Kategori dan Sub Kategori -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('kategori') border-red-500 @enderror"
                                placeholder="Contoh: Demografi, Ekonomi, Pendidikan" required>
                            @error('kategori')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="sub_kategori" class="block text-sm font-medium text-gray-700 mb-2">
                                Sub Kategori
                            </label>
                            <input type="text" name="sub_kategori" id="sub_kategori" value="{{ old('sub_kategori') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('sub_kategori') border-red-500 @enderror"
                                placeholder="Contoh: Usia, Pekerjaan, Tingkat Pendidikan">
                            @error('sub_kategori')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Judul -->
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('judul') border-red-500 @enderror"
                            placeholder="Contoh: Jumlah Penduduk Usia Produktif" required>
                        @error('judul')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nilai dan Satuan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nilai" class="block text-sm font-medium text-gray-700 mb-2">
                                Nilai <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nilai" id="nilai" value="{{ old('nilai') }}"
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
                            <input type="text" name="satuan" id="satuan" value="{{ old('satuan') }}"
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
                            Deskripsi
                        </label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('deskripsi') border-red-500 @enderror"
                            placeholder="Masukkan deskripsi lengkap tentang data statistik ini">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 1000 karakter</p>
                    </div>

                    <!-- Warna dan Icon -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="warna" class="block text-sm font-medium text-gray-700 mb-2">
                                Warna <span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center space-x-3">
                                <input type="color" name="warna" id="warna" value="{{ old('warna', '#10B981') }}"
                                    class="w-12 h-12 border border-gray-300 rounded-lg cursor-pointer @error('warna') border-red-500 @enderror">
                                <input type="text" name="warna_text" id="warna_text"
                                    value="{{ old('warna', '#10B981') }}"
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent font-mono text-sm"
                                    placeholder="#10B981">
                            </div>
                            @error('warna')
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
                                        'fas fa-male',
                                        'fas fa-female',
                                        'fas fa-child',
                                        'fas fa-baby',
                                        'fas fa-graduation-cap',
                                        'fas fa-briefcase',
                                        'fas fa-home',
                                        'fas fa-building',
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
                                        'fas fa-heart',
                                        'fas fa-heartbeat',
                                        'fas fa-chart-bar',
                                        'fas fa-chart-pie',
                                        'fas fa-chart-line',
                                        'fas fa-percentage',
                                        'fas fa-percent',
                                        'fas fa-calculator',
                                        'fas fa-chart-area',
                                        'fas fa-chart-gantt',
                                        'fas fa-chart-pie',
                                        'fas fa-chart-bar',
                                        'fas fa-chart-column',
                                        'fas fa-chart-simple',
                                    ];
                                @endphp
                                @foreach ($icons as $icon)
                                    <button type="button" onclick="selectIcon('{{ $icon }}')"
                                        class="icon-option w-8 h-8 border border-gray-300 rounded-lg flex items-center justify-center hover:border-green-500 hover:bg-green-50 transition-colors"
                                        title="{{ $icon }}">
                                        <i class="{{ $icon }} text-sm text-gray-600"></i>
                                    </button>
                                @endforeach
                            </div>
                            <input type="text" name="icon" id="icon" value="{{ old('icon') }}"
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
                        <input type="number" name="urutan" id="urutan" value="{{ old('urutan', 0) }}"
                            min="0"
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
                                {{ old('aktif') ? 'checked' : '' }}
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
                        <a href="{{ route('admin.statistik.index') }}">
                            <x-outline-button type="button" color="neutral">
                                Batal
                            </x-outline-button>
                        </a>
                        <x-primary-button type="submit">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Data
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
        document.getElementById('warna').addEventListener('input', function() {
            document.getElementById('warna_text').value = this.value;
        });

        document.getElementById('warna_text').addEventListener('input', function() {
            document.getElementById('warna').value = this.value;
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
    </script>
@endpush

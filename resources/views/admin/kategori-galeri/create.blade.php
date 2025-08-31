@extends('layouts.admin')

@section('title', 'Tambah Kategori Galeri')
@section('page-title', 'Tambah Kategori Galeri')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tambah Kategori Galeri</h1>
                <p class="mt-1 text-sm text-gray-600">Tambahkan kategori baru untuk galeri</p>
            </div>
            <a href="{{ route('admin.kategori-galeri.index') }}">
                <x-ghost-button>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </x-ghost-button>
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <form action="{{ route('admin.kategori-galeri.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Kategori</h3>
                </div>

                <div class="px-6 py-4 space-y-6">
                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Kategori <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('nama') border-red-500 @enderror"
                            placeholder="Masukkan nama kategori" required>
                        @error('nama')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                            Slug
                        </label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('slug') border-red-500 @enderror"
                            placeholder="Slug akan dibuat otomatis dari nama">
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Slug akan dibuat otomatis dari nama jika dikosongkan</p>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi" id="deskripsi" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('deskripsi') border-red-500 @enderror"
                            placeholder="Masukkan deskripsi kategori">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 1000 karakter</p>
                    </div>

                    <!-- Warna -->
                    <div>
                        <label for="warna" class="block text-sm font-medium text-gray-700 mb-2">
                            Warna <span class="text-red-500">*</span>
                        </label>
                        <div class="flex items-center space-x-3">
                            <input type="color" name="warna" id="warna" value="{{ old('warna', '#2E7D32') }}"
                                class="w-12 h-12 border border-gray-300 rounded-lg cursor-pointer @error('warna') border-red-500 @enderror">
                            <input type="text" name="warna_text" id="warna_text" value="{{ old('warna', '#2E7D32') }}"
                                class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent font-mono text-sm"
                                placeholder="#2E7D32">
                        </div>
                        @error('warna')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Pilih warna untuk kategori ini</p>
                    </div>

                    <!-- Icon -->
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">
                            Icon
                        </label>
                        <div class="grid grid-cols-6 gap-2 mb-3">
                            @php
                                $icons = [
                                    'fas fa-tag',
                                    'fas fa-image',
                                    'fas fa-camera',
                                    'fas fa-photo-video',
                                    'fas fa-mountain',
                                    'fas fa-tree',
                                    'fas fa-water',
                                    'fas fa-sun',
                                    'fas fa-home',
                                    'fas fa-building',
                                    'fas fa-church',
                                    'fas fa-school',
                                    'fas fa-car',
                                    'fas fa-bicycle',
                                    'fas fa-boat',
                                    'fas fa-plane',
                                    'fas fa-utensils',
                                    'fas fa-coffee',
                                    'fas fa-birthday-cake',
                                    'fas fa-gift',
                                    'fas fa-music',
                                    'fas fa-dance',
                                    'fas fa-theater-masks',
                                    'fas fa-palette',
                                    'fas fa-heart',
                                    'fas fa-star',
                                    'fas fa-gem',
                                    'fas fa-crown',
                                    'fas fa-leaf',
                                    'fas fa-seedling',
                                    'fas fa-flower',
                                    'fas fa-bug',
                                    'fas fa-fish',
                                    'fas fa-dove',
                                    'fas fa-horse',
                                    'fas fa-cow',
                                    'fas fa-cloud',
                                    'fas fa-rainbow',
                                    'fas fa-snowflake',
                                    'fas fa-fire',
                                ];
                            @endphp
                            @foreach ($icons as $icon)
                                <button type="button" onclick="selectIcon('{{ $icon }}')"
                                    class="icon-option p-3 border border-gray-300 rounded-lg hover:border-green-500 hover:bg-green-50 transition-colors text-center"
                                    data-icon="{{ $icon }}">
                                    <i class="{{ $icon }} text-lg text-gray-600"></i>
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
                            Klik icon di atas untuk memilih atau ketik manual.
                            <i class="fas fa-external-link-alt mr-1"></i>
                            Cari icon lainnya di <a href="https://fontawesome.com/search" target="_blank"
                                class="text-green-600 hover:text-green-700 underline">FontAwesome Search</a>
                        </p>
                    </div>

                    <!-- Urutan -->
                    <div>
                        <label for="urutan" class="block text-sm font-medium text-gray-700 mb-2">
                            Urutan
                        </label>
                        <input type="number" name="urutan" id="urutan" value="{{ old('urutan', 0) }}" min="0"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('urutan') border-red-500 @enderror"
                            placeholder="0">
                        @error('urutan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Urutan tampilan kategori (0 = paling atas)</p>
                    </div>

                    <!-- Status -->
                    <div class="flex items-center">
                        <input type="checkbox" name="aktif" id="aktif" value="1"
                            {{ old('aktif') ? 'checked' : '' }}
                            class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <label for="aktif" class="ml-2 block text-sm text-gray-700">
                            Aktifkan kategori ini
                        </label>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.kategori-galeri.index') }}">
                            <x-outline-button type="button" color="neutral">
                                Batal
                            </x-outline-button>
                        </a>
                        <x-primary-button type="submit">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Kategori
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

        // Sync color picker with text input
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

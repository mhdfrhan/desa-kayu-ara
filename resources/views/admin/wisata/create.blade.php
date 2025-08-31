@extends('layouts.admin')

@section('title', 'Tambah Wisata Alam')
@section('page-title', 'Tambah Wisata Alam')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tambah Wisata Alam</h1>
                <p class="mt-1 text-sm text-gray-600">Tambahkan destinasi wisata alam baru</p>
            </div>
            <a href="{{ route('admin.wisata.index') }}">
                <x-ghost-button>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </x-ghost-button>
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <form action="{{ route('admin.wisata.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Wisata</h3>
                </div>

                <div class="px-6 py-4 space-y-6">
                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Wisata <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('nama') border-red-500 @enderror"
                            placeholder="Masukkan nama wisata" required>
                        @error('nama')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>



                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi <span class="text-red-500">*</span>
                        </label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('deskripsi') border-red-500 @enderror"
                            placeholder="Masukkan deskripsi wisata" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 2000 karakter</p>
                    </div>

                    <!-- Gambar -->
                    <div>
                        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                            Gambar Wisata <span class="text-red-500">*</span>
                        </label>
                        <div class="flex items-center space-x-4">
                            <input type="file" name="gambar" id="gambar" accept="image/*"
                                class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('gambar') border-red-500 @enderror"
                                onchange="previewImage(this)" required>
                        </div>
                        @error('gambar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF, WebP. Maksimal 2MB</p>

                        <!-- Image Preview -->
                        <div id="imagePreview" class="mt-3 hidden">
                            <img id="preview" src="" alt="Preview"
                                class="w-32 h-32 object-cover rounded-lg border border-gray-300">
                        </div>
                    </div>

                    <!-- Kategori dan Lokasi -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('kategori') border-red-500 @enderror"
                                placeholder="Contoh: Wisata Alam, Wisata Budaya" required>
                            @error('kategori')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2">
                                Lokasi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('lokasi') border-red-500 @enderror"
                                placeholder="Masukkan lokasi wisata" required>
                            @error('lokasi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Fasilitas dan Cara Menuju -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="fasilitas" class="block text-sm font-medium text-gray-700 mb-2">
                                Fasilitas
                            </label>
                            <textarea name="fasilitas" id="fasilitas" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('fasilitas') border-red-500 @enderror"
                                placeholder="Masukkan fasilitas yang tersedia">{{ old('fasilitas') }}</textarea>
                            @error('fasilitas')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Maksimal 1000 karakter</p>
                        </div>

                        <div>
                            <label for="cara_menuju" class="block text-sm font-medium text-gray-700 mb-2">
                                Cara Menuju
                            </label>
                            <textarea name="cara_menuju" id="cara_menuju" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('cara_menuju') border-red-500 @enderror"
                                placeholder="Masukkan petunjuk arah ke wisata">{{ old('cara_menuju') }}</textarea>
                            @error('cara_menuju')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Maksimal 1000 karakter</p>
                        </div>
                    </div>

                    <!-- Jam Operasional, Harga Tiket, dan Kontak -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="jam_operasional" class="block text-sm font-medium text-gray-700 mb-2">
                                Jam Operasional
                            </label>
                            <input type="text" name="jam_operasional" id="jam_operasional"
                                value="{{ old('jam_operasional') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('jam_operasional') border-red-500 @enderror"
                                placeholder="Contoh: 08:00 - 17:00">
                            @error('jam_operasional')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="harga_tiket" class="block text-sm font-medium text-gray-700 mb-2">
                                Harga Tiket
                            </label>
                            <input type="text" name="harga_tiket" id="harga_tiket" value="{{ old('harga_tiket') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('harga_tiket') border-red-500 @enderror"
                                placeholder="Contoh: Rp 10.000">
                            @error('harga_tiket')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="kontak" class="block text-sm font-medium text-gray-700 mb-2">
                                Kontak
                            </label>
                            <input type="text" name="kontak" id="kontak" value="{{ old('kontak') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('kontak') border-red-500 @enderror"
                                placeholder="Contoh: 08123456789">
                            @error('kontak')
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
                        <p class="mt-1 text-xs text-gray-500">Urutan tampilan wisata (0 = paling atas)</p>
                    </div>

                    <!-- Status Checkboxes -->
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="checkbox" name="aktif" id="aktif" value="1"
                                {{ old('aktif') ? 'checked' : '' }}
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="aktif" class="ml-2 block text-sm text-gray-700">
                                Aktifkan wisata ini
                            </label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="featured" id="featured" value="1"
                                {{ old('featured') ? 'checked' : '' }}
                                class="h-4 w-4 text-yellow-600 focus:ring-yellow-500 border-gray-300 rounded">
                            <label for="featured" class="ml-2 block text-sm text-gray-700">
                                Tandai sebagai Featured
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.wisata.index') }}">
                            <x-outline-button type="button" color="neutral">
                                Batal
                            </x-outline-button>
                        </a>
                        <x-primary-button type="submit">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Wisata
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Image preview
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const previewDiv = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewDiv.classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                previewDiv.classList.add('hidden');
            }
        }

        // Auto-resize textarea
        document.getElementById('deskripsi').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        document.getElementById('fasilitas').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        document.getElementById('cara_menuju').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    </script>
@endpush

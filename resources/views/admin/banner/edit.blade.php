@extends('layouts.admin')

@section('title', 'Edit Banner')
@section('page-title', 'Edit Banner')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Banner</h1>
                <p class="mt-1 text-sm text-gray-600">Perbarui informasi banner</p>
            </div>
            <a href="{{ route('admin.banner.index') }}">
                <x-ghost-button>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </x-ghost-button>
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <form action="{{ route('admin.banner.update', $banner) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Banner</h3>
                </div>

                <div class="px-6 py-4 space-y-6">
                    <!-- Judul -->
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Banner <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul', $banner->judul) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('judul') border-red-500 @enderror"
                            placeholder="Masukkan judul banner" required>
                        @error('judul')
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
                            placeholder="Masukkan deskripsi banner" required>{{ old('deskripsi', $banner->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 1000 karakter</p>
                    </div>

                    <!-- Gambar -->
                    <div>
                        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                            Gambar Banner
                        </label>
                        <div class="space-y-4">
                            <!-- Current Image -->
                            @if ($banner->gambar)
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                                    <div class="relative inline-block">
                                        <img src="{{ asset($banner->gambar) }}" alt="{{ $banner->judul }}"
                                            class="max-w-xs h-auto rounded-lg border border-gray-200">
                                    </div>
                                </div>
                            @endif

                            <!-- Upload New Image -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Upload Gambar Baru
                                    (Opsional)</label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="gambar"
                                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 @error('gambar') border-red-500 @enderror">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                                            <p class="mb-2 text-sm text-gray-500">
                                                <span class="font-semibold">Klik untuk upload</span> atau drag and drop
                                            </p>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF, WEBP (Maks. 2MB)</p>
                                            <p class="text-xs text-gray-400 mt-2">Biarkan kosong jika tidak ingin mengubah
                                                gambar</p>
                                        </div>
                                        <input id="gambar" name="gambar" type="file" class="hidden" accept="image/*"
                                            onchange="previewImage(this)">
                                    </label>
                                </div>

                                <!-- Image Preview -->
                                <div id="imagePreview" class="hidden mt-4">
                                    <div class="relative inline-block">
                                        <img id="preview" src="" alt="Preview"
                                            class="max-w-xs h-auto rounded-lg border border-gray-200">
                                        <button type="button" onclick="removeImage()"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-600 transition-colors">
                                            <i class="fas fa-times text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('gambar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Teks -->
                    <div>
                        <label for="tombol_teks" class="block text-sm font-medium text-gray-700 mb-2">
                            Teks Tombol
                        </label>
                        <input type="text" name="tombol_teks" id="tombol_teks"
                            value="{{ old('tombol_teks', $banner->tombol_teks) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('tombol_teks') border-red-500 @enderror"
                            placeholder="Contoh: Lihat Selengkapnya">
                        @error('tombol_teks')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 100 karakter</p>
                    </div>

                    <!-- Tombol Link -->
                    <div>
                        <label for="tombol_link" class="block text-sm font-medium text-gray-700 mb-2">
                            Link Tombol
                        </label>
                        <input type="url" name="tombol_link" id="tombol_link"
                            value="{{ old('tombol_link', $banner->tombol_link) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('tombol_link') border-red-500 @enderror"
                            placeholder="https://example.com">
                        @error('tombol_link')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">URL lengkap termasuk https://</p>
                    </div>

                    <!-- Urutan -->
                    <div>
                        <label for="urutan" class="block text-sm font-medium text-gray-700 mb-2">
                            Urutan Tampilan
                        </label>
                        <input type="number" name="urutan" id="urutan" value="{{ old('urutan', $banner->urutan) }}"
                            min="1"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('urutan') border-red-500 @enderror"
                            placeholder="1">
                        @error('urutan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Angka kecil akan ditampilkan terlebih dahulu</p>
                    </div>

                    <!-- Status -->
                    <div class="flex items-center">
                        <input type="checkbox" name="aktif" id="aktif" value="1"
                            {{ old('aktif', $banner->aktif) ? 'checked' : '' }}
                            class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <label for="aktif" class="ml-2 block text-sm text-gray-700">
                            Aktifkan banner ini
                        </label>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.banner.index') }}">
                            <x-outline-button type="button" color="neutral">
                                Batal
                            </x-outline-button>
                        </a>
                        <x-primary-button type="submit">
                            <i class="fas fa-save mr-2"></i>
                            Update Banner
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage(input) {
            const file = input.files[0];
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            const input = document.getElementById('gambar');
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('imagePreview');

            input.value = '';
            preview.src = '';
            previewContainer.classList.add('hidden');
        }

        // Auto-resize textarea
        document.getElementById('deskripsi').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    </script>
@endpush

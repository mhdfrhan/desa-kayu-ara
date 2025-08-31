@extends('layouts.admin')

@section('title', 'Edit Galeri')
@section('page-title', 'Edit Galeri')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Galeri</h1>
                <p class="mt-1 text-sm text-gray-600">Edit informasi galeri</p>
            </div>
            <a href="{{ route('admin.galeri.index') }}">
                <x-ghost-button>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </x-ghost-button>
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <form action="{{ route('admin.galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Galeri</h3>
                </div>

                <div class="px-6 py-4 space-y-6">
                    <!-- Judul -->
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Galeri <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul', $galeri->judul) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('judul') border-red-500 @enderror"
                            placeholder="Masukkan judul galeri" required>
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
                            placeholder="Masukkan deskripsi galeri" required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 2000 karakter</p>
                    </div>

                    <!-- Gambar -->
                    <div>
                        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                            Gambar Galeri
                        </label>

                        <!-- Current Image -->
                        @if ($galeri->gambar)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                                <div class="flex items-center space-x-4">
                                    <img src="{{ asset('assets/img/galeri/' . $galeri->gambar) }}"
                                        alt="{{ $galeri->judul }}"
                                        class="w-32 h-32 object-cover rounded-lg border border-gray-300">
                                    <div>
                                        <p class="text-sm text-gray-600">{{ $galeri->gambar }}</p>
                                        <p class="text-xs text-gray-500">Upload gambar baru untuk mengganti</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="flex items-center space-x-4">
                            <input type="file" name="gambar" id="gambar" accept="image/*"
                                class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('gambar') border-red-500 @enderror"
                                onchange="previewImage(this)">
                        </div>
                        @error('gambar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF, WebP. Maksimal 2MB</p>

                        <!-- Image Preview -->
                        <div id="imagePreview" class="mt-3 hidden">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preview Gambar Baru</label>
                            <img id="preview" src="" alt="Preview"
                                class="w-32 h-32 object-cover rounded-lg border border-gray-300">
                        </div>
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori
                        </label>
                        <select name="kategori_id" id="kategori_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('kategori_id') border-red-500 @enderror">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoriGaleri as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ old('kategori_id', $galeri->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Urutan -->
                    <div>
                        <label for="urutan" class="block text-sm font-medium text-gray-700 mb-2">
                            Urutan
                        </label>
                        <input type="number" name="urutan" id="urutan" value="{{ old('urutan', $galeri->urutan) }}"
                            min="0"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('urutan') border-red-500 @enderror"
                            placeholder="0">
                        @error('urutan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Urutan tampilan galeri (0 = paling atas)</p>
                    </div>

                    <!-- Status Checkboxes -->
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="checkbox" name="aktif" id="aktif" value="1"
                                {{ old('aktif', $galeri->aktif) ? 'checked' : '' }}
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="aktif" class="ml-2 block text-sm text-gray-700">
                                Aktifkan galeri ini
                            </label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="featured" id="featured" value="1"
                                {{ old('featured', $galeri->featured) ? 'checked' : '' }}
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
                        <a href="{{ route('admin.galeri.index') }}">
                            <x-outline-button type="button" color="neutral">
                                Batal
                            </x-outline-button>
                        </a>
                        <x-primary-button type="submit">
                            <i class="fas fa-save mr-2"></i>
                            Update Galeri
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
    </script>
@endpush

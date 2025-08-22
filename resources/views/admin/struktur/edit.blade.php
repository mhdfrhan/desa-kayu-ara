@extends('layouts.admin')

@section('title', 'Edit Struktur Organisasi')
@section('page-title', 'Edit Struktur Organisasi')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Struktur Organisasi</h1>
                <p class="mt-1 text-sm text-gray-600">Perbarui informasi struktur organisasi</p>
            </div>
            <a href="{{ route('admin.struktur.index') }}">
                <x-ghost-button>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </x-ghost-button>
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <form action="{{ route('admin.struktur.update', $struktur) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Pribadi</h3>
                </div>

                <div class="px-6 py-4 space-y-6">
                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $struktur->nama) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('nama') border-red-500 @enderror"
                            placeholder="Masukkan nama lengkap" required>
                        @error('nama')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jabatan -->
                    <div>
                        <label for="jabatan" class="block text-sm font-medium text-gray-700 mb-2">
                            Jabatan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $struktur->jabatan) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('jabatan') border-red-500 @enderror"
                            placeholder="Contoh: Kepala Desa, Sekretaris Desa, Kaur Keuangan" required>
                        @error('jabatan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Periode -->
                    <div>
                        <label for="periode" class="block text-sm font-medium text-gray-700 mb-2">
                            Periode <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="periode" id="periode" value="{{ old('periode', $struktur->periode) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('periode') border-red-500 @enderror"
                            placeholder="Contoh: 2021-2027" required>
                        @error('periode')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Foto -->
                    <div>
                        <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">
                            Foto
                        </label>

                        <!-- Current Image -->
                        @if ($struktur->foto)
                            <div class="mb-3">
                                <p class="text-sm text-gray-600 mb-2">Foto saat ini:</p>
                                <img src="{{ asset($struktur->foto) }}" alt="{{ $struktur->nama }}"
                                    class="max-w-xs h-auto rounded-lg border border-gray-200">
                            </div>
                        @endif

                        <input type="file" name="foto" id="foto" accept="image/*"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('foto') border-red-500 @enderror"
                            onchange="previewImage(this)">
                        @error('foto')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF, WEBP. Maksimal 2MB. Kosongkan jika
                            tidak ingin mengubah foto</p>

                        <!-- Image Preview -->
                        <div id="imagePreview" class="mt-3 hidden">
                            <p class="text-sm text-gray-600 mb-2">Preview foto baru:</p>
                            <img id="preview" src="" alt="Preview"
                                class="max-w-xs h-auto rounded-lg border border-gray-200">
                        </div>
                    </div>
                </div>

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Tambahan</h3>
                </div>

                <div class="px-6 py-4 space-y-6">
                    <!-- Deskripsi Tugas -->
                    <div>
                        <label for="deskripsi_tugas" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Tugas <span class="text-red-500">*</span>
                        </label>
                        <textarea name="deskripsi_tugas" id="deskripsi_tugas" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('deskripsi_tugas') border-red-500 @enderror"
                            placeholder="Jelaskan tugas dan tanggung jawab jabatan ini" required>{{ old('deskripsi_tugas', $struktur->deskripsi_tugas) }}</textarea>
                        @error('deskripsi_tugas')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 1000 karakter</p>
                    </div>

                    <!-- Warna Badge -->
                    <div>
                        <label for="warna_badge" class="block text-sm font-medium text-gray-700 mb-2">
                            Warna Badge <span class="text-red-500">*</span>
                        </label>
                        <select name="warna_badge" id="warna_badge"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('warna_badge') border-red-500 @enderror"
                            required>
                            <option value="">Pilih Warna Badge</option>
                            <option value="green"
                                {{ old('warna_badge', $struktur->warna_badge) == 'green' ? 'selected' : '' }}>Hijau
                            </option>
                            <option value="blue"
                                {{ old('warna_badge', $struktur->warna_badge) == 'blue' ? 'selected' : '' }}>Biru</option>
                            <option value="yellow"
                                {{ old('warna_badge', $struktur->warna_badge) == 'yellow' ? 'selected' : '' }}>Kuning
                            </option>
                            <option value="red"
                                {{ old('warna_badge', $struktur->warna_badge) == 'red' ? 'selected' : '' }}>Merah</option>
                            <option value="gray"
                                {{ old('warna_badge', $struktur->warna_badge) == 'gray' ? 'selected' : '' }}>Abu-abu
                            </option>
                        </select>
                        @error('warna_badge')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Urutan -->
                    <div>
                        <label for="urutan" class="block text-sm font-medium text-gray-700 mb-2">
                            Urutan
                        </label>
                        <input type="number" name="urutan" id="urutan" value="{{ old('urutan', $struktur->urutan) }}"
                            min="1"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('urutan') border-red-500 @enderror"
                            placeholder="Urutan tampilan (opsional)">
                        @error('urutan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Angka kecil akan ditampilkan terlebih dahulu</p>
                    </div>

                    <!-- Status -->
                    <div class="flex items-center">
                        <input type="checkbox" name="aktif" id="aktif" value="1"
                            {{ old('aktif', $struktur->aktif) ? 'checked' : '' }}
                            class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <label for="aktif" class="ml-2 block text-sm text-gray-700">
                            Aktifkan struktur organisasi ini
                        </label>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.struktur.index') }}">
                            <x-outline-button type="button" color="neutral">
                                Batal
                            </x-outline-button>
                        </a>
                        <x-primary-button type="submit">
                            <i class="fas fa-save mr-2"></i>
                            Update Struktur
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
        document.getElementById('deskripsi_tugas').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    </script>
@endpush

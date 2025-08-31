@extends('layouts.admin')

@section('title', 'Edit Sambutan Penghulu Kampung')
@section('page-title', 'Edit Sambutan Penghulu Kampung')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Sambutan Penghulu Kampung</h1>
                <p class="mt-1 text-sm text-gray-600">Perbarui informasi sambutan Penghulu Kampung</p>
            </div>
            <a href="{{ route('admin.sambutan.index') }}">
                <x-ghost-button>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </x-ghost-button>
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <form action="{{ route('admin.sambutan.update', $sambutan) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Pilih Penghulu Kampung</h3>
                </div>

                <div class="px-6 py-4 space-y-6">
                    <!-- Pilih Penghulu Kampung -->
                    <div>
                        <label for="struktur_organisasi_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Penghulu Kampung <span class="text-red-500">*</span>
                        </label>
                        <select name="struktur_organisasi_id" id="struktur_organisasi_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('struktur_organisasi_id') border-red-500 @enderror"
                            required>
                            <option value="">Pilih Penghulu Kampung</option>
                            @foreach ($kepalaDesa as $kepala)
                                <option value="{{ $kepala->id }}"
                                    {{ old('struktur_organisasi_id', $sambutan->struktur_organisasi_id) == $kepala->id ? 'selected' : '' }}>
                                    {{ $kepala->nama }} - {{ $kepala->jabatan }} ({{ $kepala->periode }})
                                </option>
                            @endforeach
                        </select>
                        @error('struktur_organisasi_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @if ($kepalaDesa->isEmpty())
                            <p class="mt-1 text-sm text-yellow-600">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                Belum ada data Penghulu Kampung di struktur organisasi.
                                <a href="{{ route('admin.struktur.index') }}"
                                    class="text-green-600 hover:text-green-800 underline">
                                    Tambahkan data Penghulu Kampung terlebih dahulu
                                </a>
                            </p>
                        @endif
                    </div>
                </div>

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Konten Sambutan</h3>
                </div>

                <div class="px-6 py-4 space-y-6">
                    <!-- Sambutan Singkat -->
                    <div>
                        <label for="sambutan" class="block text-sm font-medium text-gray-700 mb-2">
                            Sambutan Singkat <span class="text-red-500">*</span>
                        </label>
                        <textarea name="sambutan" id="sambutan" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('sambutan') border-red-500 @enderror"
                            placeholder="Masukkan sambutan singkat yang akan ditampilkan di halaman utama" required>{{ old('sambutan', $sambutan->sambutan) }}</textarea>
                        @error('sambutan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 1000 karakter</p>
                    </div>

                    <!-- Quote -->
                    <div>
                        <label for="quote" class="block text-sm font-medium text-gray-700 mb-2">
                            Quote/Inspirasi
                        </label>
                        <textarea name="quote" id="quote" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('quote') border-red-500 @enderror"
                            placeholder="Masukkan quote atau kata-kata inspirasi (opsional)">{{ old('quote', $sambutan->quote) }}</textarea>
                        @error('quote')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 500 karakter</p>
                    </div>

                    <!-- Konten Lengkap -->
                    <div>
                        <label for="konten_lengkap" class="block text-sm font-medium text-gray-700 mb-2">
                            Konten Lengkap <span class="text-red-500">*</span>
                        </label>
                        <textarea name="konten_lengkap" id="konten_lengkap" rows="8"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('konten_lengkap') border-red-500 @enderror"
                            placeholder="Masukkan sambutan lengkap Penghulu Kampung" required>{{ old('konten_lengkap', $sambutan->konten_lengkap) }}</textarea>
                        @error('konten_lengkap')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 5000 karakter</p>
                    </div>

                    <!-- Status -->
                    <div class="flex items-center">
                        <input type="checkbox" name="aktif" id="aktif" value="1"
                            {{ old('aktif', $sambutan->aktif) ? 'checked' : '' }}
                            class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <label for="aktif" class="ml-2 block text-sm text-gray-700">
                            Aktifkan sambutan ini
                        </label>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.sambutan.index') }}">
                            <x-outline-button type="button" color="neutral">
                                Batal
                            </x-outline-button>
                        </a>
                        <x-primary-button type="submit" {{ $kepalaDesa->isEmpty() ? 'disabled' : '' }}>
                            <i class="fas fa-save mr-2"></i>
                            Update Sambutan
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Auto-resize textareas
        document.getElementById('sambutan').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        document.getElementById('quote').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        document.getElementById('konten_lengkap').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    </script>
@endpush

@extends('layouts.admin')

@section('title', 'Tambah Data Chart')
@section('page-title', 'Tambah Data Chart')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tambah Data Chart</h1>
                <p class="mt-1 text-sm text-gray-600">Tambahkan data untuk visualisasi chart statistik</p>
            </div>
            <a href="{{ route('admin.data-chart.index') }}">
                <x-ghost-button>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </x-ghost-button>
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <form action="{{ route('admin.data-chart.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Data Chart</h3>
                </div>

                <div class="px-6 py-4 space-y-6">
                    <!-- Chart Selection -->
                    <div>
                        <label for="chart_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Pilih Chart <span class="text-red-500">*</span>
                        </label>
                        <select name="chart_id" id="chart_id" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('chart_id') border-red-500 @enderror">
                            <option value="">Pilih chart statistik</option>
                            @foreach ($charts as $chart)
                                <option value="{{ $chart->id }}" {{ old('chart_id') == $chart->id ? 'selected' : '' }}>
                                    {{ $chart->nama }} ({{ ucfirst($chart->tipe_chart) }})
                                </option>
                            @endforeach
                        </select>
                        @error('chart_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @if ($charts->count() == 0)
                            <p class="mt-1 text-sm text-yellow-600">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                Belum ada chart yang aktif. Silakan buat chart terlebih dahulu.
                            </p>
                        @endif
                    </div>

                    <!-- Label dan Nilai -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="label" class="block text-sm font-medium text-gray-700 mb-2">
                                Label <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="label" id="label" value="{{ old('label') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('label') border-red-500 @enderror"
                                placeholder="Contoh: 0-14 tahun, SD, Pertanian" required>
                            @error('label')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nilai" class="block text-sm font-medium text-gray-700 mb-2">
                                Nilai <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="nilai" id="nilai" value="{{ old('nilai') }}" min="0"
                                step="0.01"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('nilai') border-red-500 @enderror"
                                placeholder="Contoh: 285, 75.5" required>
                            @error('nilai')
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
                            placeholder="Masukkan deskripsi lengkap tentang data ini">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 1000 karakter</p>
                    </div>

                    <!-- Warna dan Urutan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="warna" class="block text-sm font-medium text-gray-700 mb-2">
                                Warna
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
                        <a href="{{ route('admin.data-chart.index') }}">
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

        // Auto-resize textarea
        document.getElementById('deskripsi').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    </script>
@endpush

@extends('layouts.admin')

@section('title', 'Tambah Profil Kampung')
@section('page-title', 'Tambah Profil Kampung')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tambah Profil Kampung</h1>
                <p class="mt-1 text-sm text-gray-600">Tambahkan konten profil kampung yang akan ditampilkan di halaman publik
                </p>
            </div>
            <a href="{{ route('admin.profil.index') }}">
                <x-ghost-button>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </x-ghost-button>
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <form action="{{ route('admin.profil.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Profil Kampung</h3>
                </div>

                <div class="px-6 py-4 space-y-6">
                    <!-- Jenis dan Judul -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="jenis" class="block text-sm font-medium text-gray-700 mb-2">
                                Jenis Profil <span class="text-red-500">*</span>
                            </label>
                            <select name="jenis" id="jenis" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('jenis') border-red-500 @enderror">
                                <option value="">Pilih jenis profil</option>
                                <option value="visi" {{ old('jenis') == 'visi' ? 'selected' : '' }}>Visi</option>
                                <option value="misi" {{ old('jenis') == 'misi' ? 'selected' : '' }}>Misi</option>
                                <option value="sejarah" {{ old('jenis') == 'sejarah' ? 'selected' : '' }}>Sejarah</option>
                                <option value="struktur" {{ old('jenis') == 'struktur' ? 'selected' : '' }}>Struktur
                                    Organisasi</option>
                                <option value="lokasi" {{ old('jenis') == 'lokasi' ? 'selected' : '' }}>Lokasi</option>
                                <option value="potensi" {{ old('jenis') == 'potensi' ? 'selected' : '' }}>Potensi Kampung
                                </option>
                                <option value="demografi" {{ old('jenis') == 'demografi' ? 'selected' : '' }}>Demografi
                                </option>
                                <option value="infrastruktur" {{ old('jenis') == 'infrastruktur' ? 'selected' : '' }}>
                                    Infrastruktur</option>
                            </select>
                            @error('jenis')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('judul') border-red-500 @enderror"
                                placeholder="Contoh: Visi Kampung 2024, Sejarah Kampung, dll" required>
                            @error('judul')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Konten -->
                    <div>
                        <label for="konten" class="block text-sm font-medium text-gray-700 mb-2">
                            Konten <span class="text-red-500">*</span>
                        </label>
                        <textarea name="konten" id="konten" rows="8"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('konten') border-red-500 @enderror"
                            placeholder="Masukkan konten profil kampung yang lengkap dan informatif">{{ old('konten') }}</textarea>
                        @error('konten')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Maksimal 5000 karakter. Gunakan HTML untuk formatting jika
                            diperlukan.</p>
                        <p id="misiHelper" class="mt-1 text-xs text-blue-600 hidden">
                            <i class="fas fa-info-circle mr-1"></i>
                            Untuk misi, setiap baris akan otomatis diberi nomor urut. Contoh: ketik "Meningkatkan
                            kesejahteraan masyarakat" akan menjadi "1. Meningkatkan kesejahteraan masyarakat"
                        </p>
                    </div>

                    <!-- Gambar -->
                    <div>
                        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                            Gambar
                        </label>
                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <input type="file" name="gambar" id="gambar" accept="image/*"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('gambar') border-red-500 @enderror"
                                    onchange="previewImage(this)">
                                @error('gambar')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal 2MB.</p>
                            </div>
                            <div id="imagePreview" class="hidden">
                                <img id="preview" src="" alt="Preview"
                                    class="w-20 h-20 object-cover rounded-lg border border-gray-300">
                            </div>
                        </div>
                    </div>

                    <!-- Urutan dan Status -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                            <p class="mt-1 text-xs text-gray-500">Urutan tampilan (0 = paling atas)</p>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center">
                                <input type="checkbox" name="aktif" id="aktif" value="1"
                                    {{ old('aktif') ? 'checked' : '' }}
                                    class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                                <label for="aktif" class="ml-2 block text-sm text-gray-700">
                                    Aktifkan profil ini
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.profil.index') }}">
                            <x-outline-button type="button" color="neutral">
                                Batal
                            </x-outline-button>
                        </a>
                        <x-primary-button type="submit">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Profil
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Preview Section -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Preview Konten</h3>
            </div>
            <div class="px-6 py-4">
                <div id="contentPreview" class="prose prose-sm max-w-none">
                    <p class="text-gray-500 italic">Konten akan muncul di sini saat Anda mengetik...</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Image preview
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
        document.getElementById('konten').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        // Handle misi format
        document.getElementById('jenis').addEventListener('change', function() {
            const misiHelper = document.getElementById('misiHelper');
            const kontenTextarea = document.getElementById('konten');

            if (this.value === 'misi') {
                misiHelper.classList.remove('hidden');
                // Set placeholder khusus untuk misi
                kontenTextarea.placeholder =
                    "Ketik setiap misi dalam baris terpisah. Contoh:\nMeningkatkan kesejahteraan masyarakat\nMembangun infrastruktur kampung\nMengembangkan potensi lokal";
            } else {
                misiHelper.classList.add('hidden');
                kontenTextarea.placeholder = "Masukkan konten profil kampung yang lengkap dan informatif";
            }
        });

        // Auto-numbering for misi content
        document.getElementById('konten').addEventListener('input', function() {
            const jenis = document.getElementById('jenis').value;

            if (jenis === 'misi') {
                const lines = this.value.split('\n');
                const numberedLines = lines.map((line, index) => {
                    const trimmedLine = line.trim();
                    if (trimmedLine === '') return '';

                    // Jika baris sudah dimulai dengan angka dan titik, biarkan saja
                    if (/^\d+\./.test(trimmedLine)) {
                        return trimmedLine;
                    }

                    // Jika baris kosong, biarkan kosong
                    if (trimmedLine === '') return '';

                    // Tambahkan nomor urut
                    return `${index + 1}. ${trimmedLine}`;
                });

                // Update preview dengan format yang sudah dinomori
                const preview = document.getElementById('contentPreview');
                if (this.value.trim()) {
                    preview.innerHTML = numberedLines.join('<br>');
                } else {
                    preview.innerHTML =
                        '<p class="text-gray-500 italic">Konten akan muncul di sini saat Anda mengetik...</p>';
                }
            } else {
                // Untuk jenis lain, gunakan preview normal
                const preview = document.getElementById('contentPreview');
                const content = this.value;

                if (content.trim()) {
                    preview.innerHTML = content.replace(/\n/g, '<br>');
                } else {
                    preview.innerHTML =
                        '<p class="text-gray-500 italic">Konten akan muncul di sini saat Anda mengetik...</p>';
                }
            }
        });

        // Initialize helper text if misi is already selected
        document.addEventListener('DOMContentLoaded', function() {
            const jenis = document.getElementById('jenis').value;
            const misiHelper = document.getElementById('misiHelper');
            const kontenTextarea = document.getElementById('konten');

            if (jenis === 'misi') {
                misiHelper.classList.remove('hidden');
                kontenTextarea.placeholder =
                    "Ketik setiap misi dalam baris terpisah. Contoh:\nMeningkatkan kesejahteraan masyarakat\nMembangun infrastruktur kampung\nMengembangkan potensi lokal";
            }
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const jenis = document.getElementById('jenis').value;
            const judul = document.getElementById('judul').value;
            const konten = document.getElementById('konten').value;

            if (!jenis || !judul || !konten) {
                e.preventDefault();
                alert('Mohon lengkapi semua field yang wajib diisi');
                return false;
            }

            // Format misi sebelum submit
            if (jenis === 'misi') {
                const lines = konten.split('\n');
                const numberedLines = lines.map((line, index) => {
                    const trimmedLine = line.trim();
                    if (trimmedLine === '') return '';

                    // Jika baris sudah dimulai dengan angka dan titik, biarkan saja
                    if (/^\d+\./.test(trimmedLine)) {
                        return trimmedLine;
                    }

                    // Jika baris kosong, biarkan kosong
                    if (trimmedLine === '') return '';

                    // Tambahkan nomor urut
                    return `${index + 1}. ${trimmedLine}`;
                });

                // Update textarea dengan format yang sudah dinomori
                document.getElementById('konten').value = numberedLines.join('\n');
            }
        });
    </script>
@endpush

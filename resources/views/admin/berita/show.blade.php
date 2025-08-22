@extends('layouts.admin')

@section('title', 'Detail Berita')
@section('page-title', 'Detail Berita')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Berita</h1>
                <p class="mt-1 text-sm text-gray-600">Informasi lengkap berita</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.berita.edit', $berita) }}">
                    <x-outline-button color="yellow">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Berita
                    </x-outline-button>
                </a>
                <a href="{{ route('admin.berita.index') }}">
                    <x-ghost-button>
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </x-ghost-button>
                </a>
            </div>
        </div>

        <!-- Berita Details -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Informasi Berita</h3>
            </div>

            <div class="px-6 py-4 space-y-6">
                <!-- Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Gambar Berita</label>
                    <div class="mt-1">
                        @if ($berita->gambar)
                            <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}"
                                class="max-w-md h-auto rounded-lg border border-gray-200">
                        @else
                            <div class="w-64 h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <i class="fas fa-image text-gray-400 text-2xl"></i>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Judul Berita</label>
                    <div class="mt-1">
                        <p class="text-lg font-medium text-gray-900">{{ $berita->judul }}</p>
                    </div>
                </div>

                <!-- Slug -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Slug URL</label>
                    <div class="mt-1">
                        <code class="px-2 py-1 bg-gray-100 text-gray-800 rounded text-sm">{{ $berita->slug }}</code>
                    </div>
                </div>

                <!-- Ringkasan -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Ringkasan</label>
                    <div class="mt-1">
                        <p class="text-gray-700">{{ $berita->ringkasan }}</p>
                    </div>
                </div>

                <!-- Konten -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Konten Berita</label>
                    <div class="mt-1">
                        <div class="prose max-w-none">
                            {!! $berita->konten !!}
                        </div>
                    </div>
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Kategori</label>
                    <div class="mt-1">
                        @if ($berita->kategori)
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $berita->kategori->nama }}
                            </span>
                        @else
                            <span class="text-gray-400 text-sm">Tidak ada kategori</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengaturan -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Pengaturan</h3>
            </div>

            <div class="px-6 py-4 space-y-6">
                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Status</label>
                    <div class="mt-1">
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $berita->aktif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            <i class="fas fa-{{ $berita->aktif ? 'check-circle' : 'times-circle' }} mr-1"></i>
                            {{ $berita->aktif ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                </div>

                <!-- Featured -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Featured</label>
                    <div class="mt-1">
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $berita->featured ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800' }}">
                            <i class="fas fa-{{ $berita->featured ? 'star' : 'star-o' }} mr-1"></i>
                            {{ $berita->featured ? 'Featured' : 'Biasa' }}
                        </span>
                    </div>
                </div>

                <!-- Tanggal Publikasi -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Tanggal Publikasi</label>
                    <div class="mt-1">
                        @if ($berita->tanggal_publikasi)
                            <p class="text-gray-700">
                                <i class="fas fa-calendar-check mr-1"></i>
                                {{ $berita->tanggal_publikasi->format('d F Y H:i') }}
                            </p>
                        @else
                            <p class="text-gray-400">Publikasi segera</p>
                        @endif
                    </div>
                </div>

                <!-- Tanggal Dibuat -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Tanggal Dibuat</label>
                    <div class="mt-1">
                        <p class="text-gray-700">
                            <i class="fas fa-calendar-plus mr-1"></i>
                            {{ $berita->created_at->format('d F Y H:i') }}
                        </p>
                    </div>
                </div>

                <!-- Tanggal Diperbarui -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Terakhir Diperbarui</label>
                    <div class="mt-1">
                        <p class="text-gray-700">
                            <i class="fas fa-calendar-edit mr-1"></i>
                            {{ $berita->updated_at->format('d F Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.berita.edit', $berita) }}">
                    <x-outline-button color="yellow">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Berita
                    </x-outline-button>
                </a>

                <x-outline-button color="red" onclick="confirmDelete({{ $berita->id }}, '{{ $berita->judul }}')">
                    <i class="fas fa-trash mr-2"></i>
                    Hapus Berita
                </x-outline-button>

                <x-outline-button color="{{ $berita->aktif ? 'neutral' : 'green' }}"
                    onclick="toggleStatus({{ $berita->id }})">
                    <i class="fas fa-{{ $berita->aktif ? 'pause' : 'play' }} mr-2"></i>
                    {{ $berita->aktif ? 'Nonaktifkan' : 'Aktifkan' }}
                </x-outline-button>

                <x-outline-button color="{{ $berita->featured ? 'neutral' : 'yellow' }}"
                    onclick="toggleFeatured({{ $berita->id }})">
                    <i class="fas fa-{{ $berita->featured ? 'star-o' : 'star' }} mr-2"></i>
                    {{ $berita->featured ? 'Hapus Featured' : 'Jadikan Featured' }}
                </x-outline-button>
            </div>

            <a href="{{ route('admin.berita.index') }}">
                <x-ghost-button>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Daftar
                </x-ghost-button>
            </a>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mt-4">Konfirmasi Hapus</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Apakah Anda yakin ingin menghapus berita "<span id="beritaTitle" class="font-semibold"></span>"?
                    </p>
                    <p class="text-xs text-gray-400 mt-2">Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="flex justify-center space-x-3 mt-4">
                    <button onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md text-sm font-medium hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors">
                        Batal
                    </button>
                    <form id="deleteForm" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-md text-sm font-medium hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleStatus(beritaId) {
            fetch(`/admin/berita/${beritaId}/toggle-status`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload();
                    } else {
                        alert('Terjadi kesalahan saat mengubah status berita');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengubah status berita');
                });
        }

        function toggleFeatured(beritaId) {
            fetch(`/admin/berita/${beritaId}/toggle-featured`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload();
                    } else {
                        alert('Terjadi kesalahan saat mengubah status featured berita');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengubah status featured berita');
                });
        }

        function confirmDelete(beritaId, beritaTitle) {
            document.getElementById('beritaTitle').textContent = beritaTitle;
            document.getElementById('deleteForm').action = `/admin/berita/${beritaId}`;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });
    </script>
@endpush

@extends('layouts.admin')

@section('title', 'Detail Galeri')
@section('page-title', 'Detail Galeri')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Galeri</h1>
                <p class="mt-1 text-sm text-gray-600">Informasi lengkap galeri</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.galeri.index') }}">
                    <x-ghost-button>
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </x-ghost-button>
                </a>
                <a href="{{ route('admin.galeri.edit', $galeri) }}">
                    <x-outline-button color="yellow">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </x-outline-button>
                </a>
            </div>
        </div>

        <!-- Galeri Details -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Information -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Dasar</h3>
                    </div>
                    <div class="px-6 py-4 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Judul Galeri</label>
                            <div class="mt-1">
                                <p class="text-lg font-semibold text-gray-900">{{ $galeri->judul }}</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Deskripsi</label>
                            <div class="mt-1">
                                <p class="text-sm text-gray-900 whitespace-pre-wrap">{{ $galeri->deskripsi }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Kategori</label>
                                <div class="mt-1">
                                    @if ($galeri->kategori)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                            style="background-color: {{ $galeri->kategori->warna }}20; color: {{ $galeri->kategori->warna }};">
                                            @if ($galeri->kategori->icon)
                                                <i class="{{ $galeri->kategori->icon }} mr-1"></i>
                                            @endif
                                            {{ $galeri->kategori->nama }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">Tidak ada kategori</span>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500">Status</label>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $galeri->aktif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        <i class="fas fa-{{ $galeri->aktif ? 'check-circle' : 'times-circle' }} mr-1"></i>
                                        {{ $galeri->aktif ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Likes</label>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-heart mr-1"></i>{{ $galeri->likes }} likes
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500">Urutan</label>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full text-sm font-medium text-gray-600">
                                        {{ $galeri->urutan }}
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500">Featured</label>
                                <div class="mt-1">
                                    @if ($galeri->featured)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-star mr-1"></i>Featured
                                        </span>
                                    @else
                                        <span class="text-gray-400 text-sm">Tidak</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Information -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Sistem</h3>
                    </div>
                    <div class="px-6 py-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Dibuat Pada</label>
                                <div class="mt-1">
                                    <p class="text-sm text-gray-900">{{ $galeri->created_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Terakhir Diupdate</label>
                                <div class="mt-1">
                                    <p class="text-sm text-gray-900">{{ $galeri->updated_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Image Preview -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Gambar Galeri</h3>
                    </div>
                    <div class="px-6 py-4">
                        @if ($galeri->gambar)
                            <img src="{{ asset('assets/img/galeri/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}"
                                class="w-full h-64 object-cover rounded-lg">
                            <div class="mt-3">
                                <p class="text-xs text-gray-500">{{ $galeri->gambar }}</p>
                            </div>
                        @else
                            <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                <div class="text-center">
                                    <i class="fas fa-image text-gray-400 text-4xl mb-2"></i>
                                    <p class="text-sm text-gray-500">Tidak ada gambar</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Aksi Cepat</h3>
                    </div>
                    <div class="px-6 py-4 space-y-3">
                        <button onclick="toggleStatus({{ $galeri->id }})"
                            class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                            <i class="fas fa-{{ $galeri->aktif ? 'times-circle' : 'check-circle' }} mr-2"></i>
                            {{ $galeri->aktif ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>

                        <button onclick="toggleFeatured({{ $galeri->id }})"
                            class="w-full flex items-center justify-center px-4 py-2 border border-yellow-300 rounded-md shadow-sm text-sm font-medium text-yellow-700 bg-white hover:bg-yellow-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors">
                            <i class="fas fa-star mr-2"></i>
                            {{ $galeri->featured ? 'Hapus Featured' : 'Tandai Featured' }}
                        </button>

                        <button onclick="confirmDelete({{ $galeri->id }}, '{{ $galeri->judul }}')"
                            class="w-full flex items-center justify-center px-4 py-2 border border-red-300 rounded-md shadow-sm text-sm font-medium text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                            <i class="fas fa-trash mr-2"></i>
                            Hapus Galeri
                        </button>
                    </div>
                </div>
            </div>
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
                        Apakah Anda yakin ingin menghapus galeri "<span id="galeriTitle" class="font-semibold"></span>"?
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
        function toggleStatus(galeriId) {
            fetch(`/admin/galeri/${galeriId}/toggle-status`, {
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
                        alert('Terjadi kesalahan saat mengubah status galeri');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengubah status galeri');
                });
        }

        function toggleFeatured(galeriId) {
            fetch(`/admin/galeri/${galeriId}/toggle-featured`, {
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
                        alert('Terjadi kesalahan saat mengubah status featured galeri');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengubah status featured galeri');
                });
        }

        function confirmDelete(galeriId, galeriTitle) {
            document.getElementById('galeriTitle').textContent = galeriTitle;
            document.getElementById('deleteForm').action = `/admin/galeri/${galeriId}`;
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

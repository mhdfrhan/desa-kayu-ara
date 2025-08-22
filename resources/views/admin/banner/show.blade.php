@extends('layouts.admin')

@section('title', 'Detail Banner')
@section('page-title', 'Detail Banner')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Banner</h1>
                <p class="mt-1 text-sm text-gray-600">Informasi lengkap banner</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.banner.edit', $banner) }}">
                    <x-outline-button color="yellow">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </x-outline-button>
                </a>
                <a href="{{ route('admin.banner.index') }}">
                    <x-ghost-button>
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </x-ghost-button>
                </a>
            </div>
        </div>

        <!-- Banner Image -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Gambar Banner</h3>
            </div>
            <div class="p-6">
                @if ($banner->gambar)
                    <div class="flex justify-center">
                        <img src="{{ asset($banner->gambar) }}" alt="{{ $banner->judul }}"
                            class="max-w-full h-auto rounded-lg shadow-lg border border-gray-200">
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-image text-gray-400 text-xl"></i>
                        </div>
                        <p class="text-gray-500">Tidak ada gambar</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Banner Information -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Basic Information -->
            <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Dasar</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Judul Banner</label>
                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ $banner->judul }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Deskripsi</label>
                        <p class="mt-1 text-gray-900 whitespace-pre-wrap">{{ $banner->deskripsi }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Status</label>
                        <div class="mt-1">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $banner->aktif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                <i class="fas fa-{{ $banner->aktif ? 'check-circle' : 'times-circle' }} mr-1"></i>
                                {{ $banner->aktif ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Urutan Tampilan</label>
                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ $banner->urutan }}</p>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Tambahan</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Teks Tombol</label>
                        <p class="mt-1 text-gray-900">
                            {{ $banner->tombol_teks ?: 'Tidak ada teks tombol' }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Link Tombol</label>
                        <p class="mt-1 text-gray-900">
                            @if ($banner->tombol_link)
                                <a href="{{ $banner->tombol_link }}" target="_blank"
                                    class="text-blue-600 hover:text-blue-800 underline">
                                    {{ $banner->tombol_link }}
                                    <i class="fas fa-external-link-alt ml-1 text-xs"></i>
                                </a>
                            @else
                                Tidak ada link
                            @endif
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Tanggal Dibuat</label>
                        <p class="mt-1 text-gray-900">{{ $banner->created_at->format('d F Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Terakhir Diperbarui</label>
                        <p class="mt-1 text-gray-900">{{ $banner->updated_at->format('d F Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Aksi</h3>
            </div>
            <div class="p-6">
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('admin.banner.edit', $banner) }}">
                        <x-outline-button color="yellow">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Banner
                        </x-outline-button>
                    </a>

                    <x-outline-button color="red" onclick="confirmDelete({{ $banner->id }}, '{{ $banner->judul }}')">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus Banner
                    </x-outline-button>

                    <x-outline-button color="{{ $banner->aktif ? 'neutral' : 'green' }}"
                        onclick="toggleStatus({{ $banner->id }})">
                        <i class="fas fa-{{ $banner->aktif ? 'pause' : 'play' }} mr-2"></i>
                        {{ $banner->aktif ? 'Nonaktifkan' : 'Aktifkan' }}
                    </x-outline-button>

                    <a href="{{ route('admin.banner.index') }}">
                        <x-ghost-button>
                            <i class="fas fa-list mr-2"></i>
                            Daftar Banner
                        </x-ghost-button>
                    </a>
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
                        Apakah Anda yakin ingin menghapus banner "<span id="bannerTitle" class="font-semibold"></span>"?
                    </p>
                    <p class="text-xs text-gray-400 mt-2">Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="flex justify-center space-x-3 mt-4">
                    <x-outline-button color="neutral" onclick="closeDeleteModal()">
                        Batal
                    </x-outline-button>
                    <form id="deleteForm" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <x-outline-button color="red" type="submit">
                            Hapus
                        </x-outline-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleStatus(bannerId) {
            fetch(`/admin/banner/${bannerId}/toggle-status`, {
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
                        // Reload page to update status
                        window.location.reload();
                    } else {
                        alert('Terjadi kesalahan saat mengubah status banner');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengubah status banner');
                });
        }

        function confirmDelete(bannerId, bannerTitle) {
            document.getElementById('bannerTitle').textContent = bannerTitle;
            document.getElementById('deleteForm').action = `/admin/banner/${bannerId}`;
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

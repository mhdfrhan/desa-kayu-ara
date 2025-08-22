@extends('layouts.admin')

@section('title', 'Detail Struktur Organisasi')
@section('page-title', 'Detail Struktur Organisasi')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Struktur Organisasi</h1>
                <p class="mt-1 text-sm text-gray-600">Informasi lengkap struktur organisasi</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.struktur.edit', $struktur) }}">
                    <x-outline-button color="yellow">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </x-outline-button>
                </a>
                <a href="{{ route('admin.struktur.index') }}">
                    <x-ghost-button>
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </x-ghost-button>
                </a>
            </div>
        </div>

        <!-- Struktur Photo -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Foto Struktur Organisasi</h3>
            </div>
            <div class="p-6">
                @if ($struktur->foto)
                    <div class="flex justify-center">
                        <img src="{{ asset($struktur->foto) }}" alt="{{ $struktur->nama }}"
                            class="max-w-md h-auto rounded-lg shadow-lg border border-gray-200">
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user text-gray-400 text-xl"></i>
                        </div>
                        <p class="text-gray-500">Tidak ada foto</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Struktur Information -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Basic Information -->
            <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Pribadi</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Nama Lengkap</label>
                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ $struktur->nama }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Jabatan</label>
                        <div class="mt-1">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $struktur->warna_badge === 'green'
                                    ? 'bg-green-100 text-green-800'
                                    : ($struktur->warna_badge === 'blue'
                                        ? 'bg-blue-100 text-blue-800'
                                        : ($struktur->warna_badge === 'yellow'
                                            ? 'bg-yellow-100 text-yellow-800'
                                            : ($struktur->warna_badge === 'red'
                                                ? 'bg-red-100 text-red-800'
                                                : 'bg-gray-100 text-gray-800'))) }}">
                                {{ $struktur->jabatan }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Periode</label>
                        <p class="mt-1 text-gray-900">{{ $struktur->periode }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Urutan</label>
                        <div class="mt-1">
                            <span
                                class="inline-flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full text-sm font-medium text-gray-600">
                                {{ $struktur->urutan }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Status</label>
                        <div class="mt-1">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $struktur->aktif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                <i class="fas fa-{{ $struktur->aktif ? 'check-circle' : 'times-circle' }} mr-1"></i>
                                {{ $struktur->aktif ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
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
                        <label class="block text-sm font-medium text-gray-500">Tanggal Dibuat</label>
                        <p class="mt-1 text-gray-900">{{ $struktur->created_at->format('d F Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Terakhir Diperbarui</label>
                        <p class="mt-1 text-gray-900">{{ $struktur->updated_at->format('d F Y H:i') }}</p>
                    </div>

                    @if ($struktur->is_kepala_desa)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Jenis Jabatan</label>
                            <div class="mt-1">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-crown mr-1"></i>
                                    Kepala Desa
                                </span>
                            </div>
                        </div>
                    @endif

                    @if ($struktur->sambutan)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Sambutan</label>
                            <div class="mt-1">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-comment mr-1"></i>
                                    Memiliki Sambutan
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Deskripsi Tugas -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Deskripsi Tugas</h3>
            </div>
            <div class="p-6">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="text-gray-900 whitespace-pre-wrap">{{ $struktur->deskripsi_tugas }}</div>
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
                    <a href="{{ route('admin.struktur.edit', $struktur) }}">
                        <x-outline-button color="yellow">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Struktur
                        </x-outline-button>
                    </a>

                    <x-outline-button color="red"
                        onclick="confirmDelete({{ $struktur->id }}, '{{ $struktur->nama }}')">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus Struktur
                    </x-outline-button>

                    <x-outline-button color="{{ $struktur->aktif ? 'neutral' : 'green' }}"
                        onclick="toggleStatus({{ $struktur->id }})">
                        <i class="fas fa-{{ $struktur->aktif ? 'pause' : 'play' }} mr-2"></i>
                        {{ $struktur->aktif ? 'Nonaktifkan' : 'Aktifkan' }}
                    </x-outline-button>

                    <a href="{{ route('admin.struktur.index') }}">
                        <x-ghost-button>
                            <i class="fas fa-list mr-2"></i>
                            Daftar Struktur
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
                        Apakah Anda yakin ingin menghapus struktur organisasi "<span id="strukturTitle"
                            class="font-semibold"></span>"?
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
        function toggleStatus(strukturId) {
            fetch(`/admin/struktur/${strukturId}/toggle-status`, {
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
                        alert('Terjadi kesalahan saat mengubah status struktur organisasi');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengubah status struktur organisasi');
                });
        }

        function confirmDelete(strukturId, strukturTitle) {
            document.getElementById('strukturTitle').textContent = strukturTitle;
            document.getElementById('deleteForm').action = `/admin/struktur/${strukturId}`;
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

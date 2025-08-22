@extends('layouts.admin')

@section('title', 'Detail Sambutan Kepala Desa')
@section('page-title', 'Detail Sambutan Kepala Desa')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Sambutan Kepala Desa</h1>
                <p class="mt-1 text-sm text-gray-600">Informasi lengkap sambutan kepala desa</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.sambutan.edit', $sambutan) }}">
                    <x-outline-button color="yellow">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </x-outline-button>
                </a>
                <a href="{{ route('admin.sambutan.index') }}">
                    <x-ghost-button>
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </x-ghost-button>
                </a>
            </div>
        </div>

        <!-- Sambutan Photo -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Foto Kepala Desa</h3>
            </div>
            <div class="p-6">
                @if ($sambutan->strukturOrganisasi && $sambutan->strukturOrganisasi->foto)
                    <div class="flex justify-center">
                        <img src="{{ asset($sambutan->strukturOrganisasi->foto) }}"
                            alt="{{ $sambutan->strukturOrganisasi->nama }}"
                            class="max-w-md h-auto rounded-lg shadow-lg border border-gray-200">
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-tie text-gray-400 text-xl"></i>
                        </div>
                        <p class="text-gray-500">Tidak ada foto</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sambutan Information -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Basic Information -->
            <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Kepala Desa</h3>
                </div>
                <div class="p-6 space-y-4">
                    @if ($sambutan->strukturOrganisasi)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Nama</label>
                            <p class="mt-1 text-lg font-semibold text-gray-900">{{ $sambutan->strukturOrganisasi->nama }}
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Jabatan</label>
                            <p class="mt-1 text-gray-900">{{ $sambutan->strukturOrganisasi->jabatan }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Periode</label>
                            <p class="mt-1 text-gray-900">{{ $sambutan->strukturOrganisasi->periode }}</p>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-exclamation-triangle text-red-600"></i>
                            </div>
                            <p class="text-red-600 font-medium">Data kepala desa tidak ditemukan</p>
                            <p class="text-gray-500 text-sm mt-1">Data kepala desa mungkin telah dihapus dari struktur
                                organisasi</p>
                        </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Status</label>
                        <div class="mt-1">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $sambutan->aktif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                <i class="fas fa-{{ $sambutan->aktif ? 'check-circle' : 'times-circle' }} mr-1"></i>
                                {{ $sambutan->aktif ? 'Aktif' : 'Nonaktif' }}
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
                        <p class="mt-1 text-gray-900">{{ $sambutan->created_at->format('d F Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Terakhir Diperbarui</label>
                        <p class="mt-1 text-gray-900">{{ $sambutan->updated_at->format('d F Y H:i') }}</p>
                    </div>

                    @if ($sambutan->quote)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Quote/Inspirasi</label>
                            <p class="mt-1 text-gray-900 italic">"{{ $sambutan->quote }}"</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sambutan Content -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Konten Sambutan</h3>
            </div>
            <div class="p-6 space-y-6">
                <!-- Sambutan Singkat -->
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-2">Sambutan Singkat</label>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-900">{{ $sambutan->sambutan }}</p>
                    </div>
                </div>

                <!-- Konten Lengkap -->
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-2">Konten Lengkap</label>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="text-gray-900 whitespace-pre-wrap">{{ $sambutan->konten_lengkap }}</div>
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
                    <a href="{{ route('admin.sambutan.edit', $sambutan) }}">
                        <x-outline-button color="yellow">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Sambutan
                        </x-outline-button>
                    </a>

                    <x-outline-button color="red"
                        onclick="confirmDelete({{ $sambutan->id }}, '{{ $sambutan->strukturOrganisasi->nama ?? 'Sambutan' }}')">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus Sambutan
                    </x-outline-button>

                    <x-outline-button color="{{ $sambutan->aktif ? 'neutral' : 'green' }}"
                        onclick="toggleStatus({{ $sambutan->id }})">
                        <i class="fas fa-{{ $sambutan->aktif ? 'pause' : 'play' }} mr-2"></i>
                        {{ $sambutan->aktif ? 'Nonaktifkan' : 'Aktifkan' }}
                    </x-outline-button>

                    <a href="{{ route('admin.sambutan.index') }}">
                        <x-ghost-button>
                            <i class="fas fa-list mr-2"></i>
                            Daftar Sambutan
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
                        Apakah Anda yakin ingin menghapus sambutan "<span id="sambutanTitle" class="font-semibold"></span>"?
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
        function toggleStatus(sambutanId) {
            fetch(`/admin/sambutan/${sambutanId}/toggle-status`, {
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
                        alert('Terjadi kesalahan saat mengubah status sambutan');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengubah status sambutan');
                });
        }

        function confirmDelete(sambutanId, sambutanTitle) {
            document.getElementById('sambutanTitle').textContent = sambutanTitle;
            document.getElementById('deleteForm').action = `/admin/sambutan/${sambutanId}`;
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

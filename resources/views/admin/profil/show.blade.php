@extends('layouts.admin')

@section('title', 'Detail Profil Kampung')
@section('page-title', 'Detail Profil Kampung')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Profil Kampung</h1>
                <p class="mt-1 text-sm text-gray-600">Informasi lengkap profil kampung</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.profil.edit', $profil) }}">
                    <x-outline-button color="yellow">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </x-outline-button>
                </a>
                <a href="{{ route('admin.profil.index') }}">
                    <x-ghost-button>
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </x-ghost-button>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Profil Details -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Profil Kampung</h3>
                    </div>
                    <div class="px-6 py-4 space-y-6">
                        <!-- Judul dan Jenis -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Judul</label>
                                <div class="mt-1">
                                    <p class="text-lg font-semibold text-gray-900">{{ $profil->judul }}</p>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500">Jenis</label>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ ucfirst($profil->jenis) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Konten -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Konten</label>
                            <div class="mt-1">
                                <div class="prose prose-sm max-w-none bg-gray-50 rounded-lg p-4">
                                    {!! nl2br(e($profil->konten)) !!}
                                </div>
                            </div>
                        </div>

                        <!-- Gambar -->
                        @if ($profil->gambar)
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Gambar</label>
                                <div class="mt-1">
                                    <img src="{{ asset($profil->gambar) }}" alt="{{ $profil->judul }}"
                                        class="w-full max-w-md h-auto rounded-lg shadow-sm border border-gray-200">
                                </div>
                            </div>
                        @endif

                        <!-- Status dan Urutan -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Status</label>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $profil->aktif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        <i class="fas fa-{{ $profil->aktif ? 'check-circle' : 'times-circle' }} mr-1"></i>
                                        {{ $profil->aktif ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500">Urutan</label>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full text-sm font-medium text-gray-600">
                                        {{ $profil->urutan }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- System Information -->
                        <div class="border-t border-gray-200 pt-6">
                            <h4 class="text-sm font-medium text-gray-900 mb-4">Informasi Sistem</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Dibuat Pada</label>
                                    <div class="mt-1">
                                        <p class="text-sm text-gray-900">{{ $profil->created_at->format('d M Y H:i') }}</p>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Terakhir Diupdate</label>
                                    <div class="mt-1">
                                        <p class="text-sm text-gray-900">{{ $profil->updated_at->format('d M Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Preview Card -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Preview</h3>
                    </div>
                    <div class="px-6 py-4">
                        <div class="text-center">
                            @if ($profil->gambar)
                                <img src="{{ asset($profil->gambar) }}" alt="{{ $profil->judul }}"
                                    class="w-full h-32 object-cover rounded-lg mb-4">
                            @else
                                <div class="w-full h-32 bg-gray-100 rounded-lg mb-4 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400 text-2xl"></i>
                                </div>
                            @endif
                            <h3 class="text-lg font-semibold text-gray-900">{{ $profil->judul }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ ucfirst($profil->jenis) }}</p>
                            <div class="mt-2">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $profil->aktif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $profil->aktif ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Aksi Cepat</h3>
                    </div>
                    <div class="px-6 py-4 space-y-3">
                        <button onclick="toggleStatus({{ $profil->id }})"
                            class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                            <i class="fas fa-{{ $profil->aktif ? 'pause' : 'play' }} mr-2"></i>
                            {{ $profil->aktif ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>

                        <button onclick="confirmDelete({{ $profil->id }}, '{{ $profil->judul }}')"
                            class="w-full flex items-center justify-center px-4 py-2 border border-red-300 rounded-md shadow-sm text-sm font-medium text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                            <i class="fas fa-trash mr-2"></i>
                            Hapus Profil
                        </button>
                    </div>
                </div>

                <!-- Related Data -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Data Terkait</h3>
                    </div>
                    <div class="px-6 py-4 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Total Profil</span>
                            <span class="text-lg font-semibold text-blue-600">{{ \App\Models\ProfilDesa::count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Profil Aktif</span>
                            <span
                                class="text-lg font-semibold text-green-600">{{ \App\Models\ProfilDesa::where('aktif', true)->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Profil Nonaktif</span>
                            <span
                                class="text-lg font-semibold text-gray-600">{{ \App\Models\ProfilDesa::where('aktif', false)->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Jenis {{ ucfirst($profil->jenis) }}</span>
                            <span
                                class="text-lg font-semibold text-purple-600">{{ \App\Models\ProfilDesa::where('jenis', $profil->jenis)->count() }}</span>
                        </div>
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
                        Apakah Anda yakin ingin menghapus profil "<span id="profilTitle" class="font-semibold"></span>"?
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
        function toggleStatus(profilId) {
            fetch(`/admin/profil/${profilId}/toggle-status`, {
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
                        alert('Terjadi kesalahan saat mengubah status profil Kampung');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengubah status profil Kampung');
                });
        }

        function confirmDelete(profilId, profilTitle) {
            document.getElementById('profilTitle').textContent = profilTitle;
            document.getElementById('deleteForm').action = `/admin/profil/${profilId}`;
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

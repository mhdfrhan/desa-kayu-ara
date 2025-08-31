@extends('layouts.admin')

@section('title', 'Detail Data Administrasi Penduduk')
@section('page-title', 'Detail Data Administrasi Penduduk')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Data Administrasi Penduduk</h1>
                <p class="mt-1 text-sm text-gray-600">Informasi lengkap data administrasi penduduk</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.administrasi.index') }}">
                    <x-ghost-button>
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </x-ghost-button>
                </a>
                <a href="{{ route('admin.administrasi.edit', $administrasi) }}">
                    <x-outline-button color="yellow">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </x-outline-button>
                </a>
            </div>
        </div>

        <!-- Data Details -->
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
                            <label class="block text-sm font-medium text-gray-500">Kategori</label>
                            <div class="mt-1">
                                <p class="text-lg font-semibold text-gray-900">{{ $administrasi->kategori }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Nilai</label>
                                <div class="mt-1">
                                    <p class="text-lg font-semibold text-gray-900">{{ $administrasi->nilai }}</p>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500">Satuan</label>
                                <div class="mt-1">
                                    <p class="text-lg font-semibold text-gray-900">{{ $administrasi->satuan }}</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Deskripsi</label>
                            <div class="mt-1">
                                <p class="text-sm text-gray-900 whitespace-pre-wrap">{{ $administrasi->deskripsi }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Status</label>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $administrasi->aktif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        <i
                                            class="fas fa-{{ $administrasi->aktif ? 'check-circle' : 'times-circle' }} mr-1"></i>
                                        {{ $administrasi->aktif ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500">Urutan</label>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full text-sm font-medium text-gray-600">
                                        {{ $administrasi->urutan }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Warna Icon</label>
                                <div class="mt-1 flex items-center space-x-2">
                                    <div class="w-6 h-6 rounded border border-gray-300"
                                        style="background-color: {{ $administrasi->warna_icon }};"></div>
                                    <span class="text-sm text-gray-900 font-mono">{{ $administrasi->warna_icon }}</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500">Icon</label>
                                <div class="mt-1">
                                    @if ($administrasi->icon)
                                        <div class="flex items-center space-x-2">
                                            <div class="w-8 h-8 rounded-lg flex items-center justify-center"
                                                style="background-color: {{ $administrasi->warna_icon }}20;">
                                                <i class="{{ $administrasi->icon }} text-lg"
                                                    style="color: {{ $administrasi->warna_icon }};"></i>
                                            </div>
                                            <span class="text-sm font-mono text-gray-900">{{ $administrasi->icon }}</span>
                                        </div>
                                    @else
                                        <span class="text-gray-400 text-sm">Tidak ada icon</span>
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
                                    <p class="text-sm text-gray-900">{{ $administrasi->created_at->format('d M Y H:i') }}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Terakhir Diupdate</label>
                                <div class="mt-1">
                                    <p class="text-sm text-gray-900">{{ $administrasi->updated_at->format('d M Y H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Data Preview -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Preview Data</h3>
                    </div>
                    <div class="px-6 py-4">
                        <div class="text-center">
                            <div class="w-16 h-16 rounded-lg flex items-center justify-center mx-auto mb-3"
                                style="background-color: {{ $administrasi->warna_icon }}20;">
                                @if ($administrasi->icon)
                                    <i class="{{ $administrasi->icon }} text-2xl"
                                        style="color: {{ $administrasi->warna_icon }};"></i>
                                @else
                                    <i class="fas fa-chart-bar text-2xl"
                                        style="color: {{ $administrasi->warna_icon }};"></i>
                                @endif
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $administrasi->kategori }}</h3>
                            <p class="text-2xl font-bold text-gray-900 mt-2">{{ $administrasi->nilai }}
                                {{ $administrasi->satuan }}</p>
                            <p class="text-sm text-gray-500 mt-1">{{ Str::limit($administrasi->deskripsi, 80) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Aksi Cepat</h3>
                    </div>
                    <div class="px-6 py-4 space-y-3">
                        <button onclick="toggleStatus({{ $administrasi->id }})"
                            class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                            <i class="fas fa-{{ $administrasi->aktif ? 'times-circle' : 'check-circle' }} mr-2"></i>
                            {{ $administrasi->aktif ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>

                        <button
                            onclick="confirmDelete({{ $administrasi->id }}, '{{ $administrasi->kategori }} - {{ $administrasi->nilai }}')"
                            class="w-full flex items-center justify-center px-4 py-2 border border-red-300 rounded-md shadow-sm text-sm font-medium text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                            <i class="fas fa-trash mr-2"></i>
                            Hapus Data
                        </button>
                    </div>
                </div>

                <!-- Related Data -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Data Terkait</h3>
                    </div>
                    <div class="px-6 py-4">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Total Data</span>
                                <span
                                    class="text-lg font-semibold text-blue-600">{{ \App\Models\AdministrasiPenduduk::count() }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Data Aktif</span>
                                <span
                                    class="text-lg font-semibold text-green-600">{{ \App\Models\AdministrasiPenduduk::where('aktif', true)->count() }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Data Nonaktif</span>
                                <span
                                    class="text-lg font-semibold text-gray-600">{{ \App\Models\AdministrasiPenduduk::where('aktif', false)->count() }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Kategori</span>
                                <span
                                    class="text-lg font-semibold text-purple-600">{{ \App\Models\AdministrasiPenduduk::distinct('kategori')->count() }}</span>
                            </div>
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
                        Apakah Anda yakin ingin menghapus data "<span id="administrasiTitle"
                            class="font-semibold"></span>"?
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
        function toggleStatus(administrasiId) {
            fetch(`/admin/administrasi/${administrasiId}/toggle-status`, {
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
                        alert('Terjadi kesalahan saat mengubah status data administrasi');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengubah status data administrasi');
                });
        }

        function confirmDelete(administrasiId, administrasiTitle) {
            document.getElementById('administrasiTitle').textContent = administrasiTitle;
            document.getElementById('deleteForm').action = `/admin/administrasi/${administrasiId}`;
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

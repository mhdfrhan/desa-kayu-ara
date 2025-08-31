@extends('layouts.admin')

@section('title', 'Kelola Kategori Produk')
@section('page-title', 'Kelola Kategori Produk')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Kelola Kategori Produk</h1>
                <p class="mt-1 text-sm text-gray-600">Kelola kategori untuk produk kampung</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('admin.kategori-produk.create') }}">
                    <x-primary-button>
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Kategori
                    </x-primary-button>
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-tags text-white text-sm"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-500">Total Kategori</div>
                            <div class="text-2xl font-semibold text-gray-900">{{ $kategoriProduk->total() }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check-circle text-white text-sm"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-500">Kategori Aktif</div>
                            <div class="text-2xl font-semibold text-gray-900">
                                {{ $kategoriProduk->where('aktif', true)->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-gray-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-pause-circle text-white text-sm"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-500">Kategori Nonaktif</div>
                            <div class="text-2xl font-semibold text-gray-900">
                                {{ $kategoriProduk->where('aktif', false)->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-box text-white text-sm"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-500">Total Produk</div>
                            <div class="text-2xl font-semibold text-gray-900">{{ $kategoriProduk->sum('produk_count') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kategori List -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Daftar Kategori</h3>
            </div>

            @if ($kategoriProduk->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kategori
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Deskripsi
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jumlah Produk
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Urutan
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($kategoriProduk as $item)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-lg flex items-center justify-center"
                                                    style="background-color: {{ $item->warna }}20;">
                                                    @if ($item->icon)
                                                        <i class="{{ $item->icon }} text-lg"
                                                            style="color: {{ $item->warna }};"></i>
                                                    @else
                                                        <i class="fas fa-tag text-lg"
                                                            style="color: {{ $item->warna }};"></i>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $item->nama }}</div>
                                                <div class="text-sm text-gray-500">{{ $item->slug }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            @if ($item->deskripsi)
                                                {{ Str::limit($item->deskripsi, 50) }}
                                            @else
                                                <span class="text-gray-400">Tidak ada deskripsi</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $item->produk_count }} produk
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex items-center">
                                            <span
                                                class="inline-flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full text-xs font-medium text-gray-600">
                                                {{ $item->urutan }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button onclick="toggleStatus({{ $item->id }})"
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium cursor-pointer transition-colors
                                                {{ $item->aktif
                                                    ? 'bg-green-100 text-green-800 hover:bg-green-200'
                                                    : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }}">
                                            <i
                                                class="fas fa-{{ $item->aktif ? 'check-circle' : 'times-circle' }} mr-1"></i>
                                            {{ $item->aktif ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end space-x-2">
                                            <a href="{{ route('admin.kategori-produk.show', $item) }}"
                                                class="text-blue-600 hover:text-blue-900 transition-colors"
                                                title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.kategori-produk.edit', $item) }}"
                                                class="text-yellow-600 hover:text-yellow-900 transition-colors"
                                                title="Edit Kategori">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button onclick="confirmDelete({{ $item->id }}, '{{ $item->nama }}')"
                                                class="text-red-600 hover:text-red-900 transition-colors"
                                                title="Hapus Kategori">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($kategoriProduk->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $kategoriProduk->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tags text-gray-400 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada kategori</h3>
                    <p class="text-gray-500 mb-6">Mulai dengan menambahkan kategori pertama</p>
                    <a href="{{ route('admin.kategori-produk.create') }}">
                        <x-primary-button>
                            <i class="fas fa-plus mr-2"></i>
                            Tambah Kategori Pertama
                        </x-primary-button>
                    </a>
                </div>
            @endif
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
                        Apakah Anda yakin ingin menghapus kategori "<span id="kategoriTitle"
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
        function toggleStatus(kategoriId) {
            fetch(`/admin/kategori-produk/${kategoriId}/toggle-status`, {
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
                        alert('Terjadi kesalahan saat mengubah status kategori');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengubah status kategori');
                });
        }

        function confirmDelete(kategoriId, kategoriTitle) {
            document.getElementById('kategoriTitle').textContent = kategoriTitle;
            document.getElementById('deleteForm').action = `/admin/kategori-produk/${kategoriId}`;
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

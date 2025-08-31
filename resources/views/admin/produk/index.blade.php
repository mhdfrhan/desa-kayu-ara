@extends('layouts.admin')

@section('title', 'Kelola Produk Kampung')
@section('page-title', 'Kelola Produk Kampung')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Kelola Produk Kampung</h1>
                <p class="mt-1 text-sm text-gray-600">Kelola produk unggulan kampung</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('admin.produk.create') }}">
                    <x-primary-button>
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Produk
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
                                <i class="fas fa-box text-white text-sm"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-500">Total Produk</div>
                            <div class="text-2xl font-semibold text-gray-900">{{ $produk->total() }}</div>
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
                            <div class="text-sm font-medium text-gray-500">Produk Aktif</div>
                            <div class="text-2xl font-semibold text-gray-900">{{ $produk->where('aktif', true)->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-star text-white text-sm"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-500">Featured</div>
                            <div class="text-2xl font-semibold text-gray-900">
                                {{ $produk->where('featured', true)->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-fire text-white text-sm"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-500">Best Seller</div>
                            <div class="text-2xl font-semibold text-gray-900">
                                {{ $produk->where('best_seller', true)->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Filter Produk</h3>
            </div>
            <div class="px-6 py-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="kategori_filter" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select id="kategori_filter"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="">Semua Kategori</option>
                            @foreach ($kategoriProduk as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="status_filter" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select id="status_filter"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="">Semua Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                    </div>
                    <div>
                        <label for="search_filter" class="block text-sm font-medium text-gray-700 mb-2">Cari Produk</label>
                        <input type="text" id="search_filter" placeholder="Cari berdasarkan nama produk..."
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                </div>
            </div>
        </div>

        <!-- Produk List -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Daftar Produk</h3>
            </div>

            @if ($produk->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Produk
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kategori
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Harga
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Terjual
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($produk as $item)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-16 w-16">
                                                @if ($item->gambar)
                                                    <img src="{{ asset($item->gambar) }}"
                                                        alt="{{ $item->nama }}" class="h-16 w-16 object-cover rounded-lg">
                                                @else
                                                    <div
                                                        class="h-16 w-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                                        <i class="fas fa-image text-gray-400"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $item->nama }}</div>
                                                <div class="text-sm text-gray-500">{{ Str::limit($item->deskripsi, 50) }}
                                                </div>
                                                <div class="flex items-center mt-1 space-x-2">
                                                    @if ($item->featured)
                                                        <span
                                                            class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                                            <i class="fas fa-star mr-1"></i>Featured
                                                        </span>
                                                    @endif
                                                    @if ($item->best_seller)
                                                        <span
                                                            class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                                            <i class="fas fa-fire mr-1"></i>Best Seller
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            @if ($item->kategori)
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                                    style="background-color: {{ $item->kategori->warna }}20; color: {{ $item->kategori->warna }};">
                                                    {{ $item->kategori->nama }}
                                                </span>
                                            @else
                                                <span class="text-gray-400">Tidak ada kategori</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm">
                                            <div class="font-medium text-gray-900">{{ $item->harga_formatted }}</div>
                                            @if ($item->harga_diskon)
                                                <div class="text-xs text-green-600">{{ $item->harga_diskon_formatted }}
                                                </div>
                                            @endif
                                            <div class="text-xs text-gray-500">per {{ $item->satuan }}</div>
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
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex items-center">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $item->terjual }} terjual
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end space-x-2">
                                            <a href="{{ route('admin.produk.show', $item) }}"
                                                class="text-blue-600 hover:text-blue-900 transition-colors"
                                                title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.produk.edit', $item) }}"
                                                class="text-yellow-600 hover:text-yellow-900 transition-colors"
                                                title="Edit Produk">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button onclick="confirmDelete({{ $item->id }}, '{{ $item->nama }}')"
                                                class="text-red-600 hover:text-red-900 transition-colors"
                                                title="Hapus Produk">
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
                @if ($produk->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $produk->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-box text-gray-400 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada produk</h3>
                    <p class="text-gray-500 mb-6">Mulai dengan menambahkan produk pertama</p>
                    <a href="{{ route('admin.produk.create') }}">
                        <x-primary-button>
                            <i class="fas fa-plus mr-2"></i>
                            Tambah Produk Pertama
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
                        Apakah Anda yakin ingin menghapus produk "<span id="produkTitle" class="font-semibold"></span>"?
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
        function toggleStatus(produkId) {
            fetch(`/admin/produk/${produkId}/toggle-status`, {
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
                        alert('Terjadi kesalahan saat mengubah status produk');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengubah status produk');
                });
        }

        function confirmDelete(produkId, produkTitle) {
            document.getElementById('produkTitle').textContent = produkTitle;
            document.getElementById('deleteForm').action = `/admin/produk/${produkId}`;
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

        // Filter functionality
        document.getElementById('kategori_filter').addEventListener('change', function() {
            // Implement filter logic here
            console.log('Filter by kategori:', this.value);
        });

        document.getElementById('status_filter').addEventListener('change', function() {
            // Implement filter logic here
            console.log('Filter by status:', this.value);
        });

        document.getElementById('search_filter').addEventListener('input', function() {
            // Implement search logic here
            console.log('Search:', this.value);
        });
    </script>
@endpush

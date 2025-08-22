@extends('layouts.admin')

@section('title', 'Detail Kategori Produk')
@section('page-title', 'Detail Kategori Produk')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Kategori Produk</h1>
                <p class="mt-1 text-sm text-gray-600">Informasi lengkap kategori produk</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.kategori-produk.edit', $kategoriProduk) }}">
                    <x-outline-button color="yellow">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </x-outline-button>
                </a>
                <a href="{{ route('admin.kategori-produk.index') }}">
                    <x-ghost-button>
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </x-ghost-button>
                </a>
            </div>
        </div>

        <!-- Detail Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Info -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Information -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Dasar</h3>
                    </div>
                    <div class="px-6 py-4 space-y-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12">
                                <div class="h-12 w-12 rounded-lg flex items-center justify-center"
                                    style="background-color: {{ $kategoriProduk->warna }}20;">
                                    @if ($kategoriProduk->icon)
                                        <i class="{{ $kategoriProduk->icon }} text-xl"
                                            style="color: {{ $kategoriProduk->warna }};"></i>
                                    @else
                                        <i class="fas fa-tag text-xl" style="color: {{ $kategoriProduk->warna }};"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-xl font-semibold text-gray-900">{{ $kategoriProduk->nama }}</h4>
                                <p class="text-sm text-gray-500">{{ $kategoriProduk->slug }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Status</label>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $kategoriProduk->aktif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        <i
                                            class="fas fa-{{ $kategoriProduk->aktif ? 'check-circle' : 'times-circle' }} mr-1"></i>
                                        {{ $kategoriProduk->aktif ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500">Urutan</label>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full text-sm font-medium text-gray-600">
                                        {{ $kategoriProduk->urutan }}
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500">Warna</label>
                                <div class="mt-1 flex items-center space-x-2">
                                    <div class="w-6 h-6 rounded border border-gray-300"
                                        style="background-color: {{ $kategoriProduk->warna }};"></div>
                                    <span class="text-sm text-gray-900 font-mono">{{ $kategoriProduk->warna }}</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500">Icon</label>
                                <div class="mt-1">
                                    @if ($kategoriProduk->icon)
                                        <span class="text-sm text-gray-900">
                                            <i class="{{ $kategoriProduk->icon }} mr-1"></i>
                                            {{ $kategoriProduk->icon }}
                                        </span>
                                    @else
                                        <span class="text-sm text-gray-500">Tidak ada icon</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if ($kategoriProduk->deskripsi)
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Deskripsi</label>
                                <div class="mt-1 text-sm text-gray-900">
                                    {{ $kategoriProduk->deskripsi }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Produk List -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Produk dalam Kategori</h3>
                        <p class="text-sm text-gray-500 mt-1">{{ $kategoriProduk->produk_count }} produk ditemukan</p>
                    </div>
                    <div class="px-6 py-4">
                        @if ($kategoriProduk->produk->count() > 0)
                            <div class="space-y-3">
                                @foreach ($kategoriProduk->produk->take(5) as $produk)
                                    <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                        <div class="flex-shrink-0">
                                            @if ($produk->gambar)
                                                <img src="{{ asset('assets/img/produk/' . $produk->gambar) }}"
                                                    alt="{{ $produk->nama }}" class="w-12 h-12 object-cover rounded-lg">
                                            @else
                                                <div
                                                    class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                                    <i class="fas fa-image text-gray-400"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">{{ $produk->nama }}</p>
                                            <p class="text-xs text-gray-500">{{ $produk->harga_formatted }} per
                                                {{ $produk->satuan }}</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <span
                                                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $produk->aktif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                {{ $produk->aktif ? 'Aktif' : 'Nonaktif' }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if ($kategoriProduk->produk->count() > 5)
                                <div class="mt-4 text-center">
                                    <p class="text-sm text-gray-500">Dan {{ $kategoriProduk->produk->count() - 5 }} produk
                                        lainnya...</p>
                                </div>
                            @endif
                        @else
                            <div class="text-center py-8">
                                <div
                                    class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-box text-gray-400"></i>
                                </div>
                                <p class="text-sm text-gray-500">Belum ada produk dalam kategori ini</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Stats Card -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Statistik</h3>
                    </div>
                    <div class="px-6 py-4 space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Total Produk</span>
                            <span class="text-lg font-semibold text-gray-900">{{ $kategoriProduk->produk_count }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Produk Aktif</span>
                            <span
                                class="text-lg font-semibold text-green-600">{{ $kategoriProduk->produk->where('aktif', true)->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Produk Nonaktif</span>
                            <span
                                class="text-lg font-semibold text-gray-600">{{ $kategoriProduk->produk->where('aktif', false)->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Produk Featured</span>
                            <span
                                class="text-lg font-semibold text-yellow-600">{{ $kategoriProduk->produk->where('featured', true)->count() }}</span>
                        </div>
                    </div>
                </div>

                <!-- Timestamps -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Sistem</h3>
                    </div>
                    <div class="px-6 py-4 space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Dibuat</label>
                            <p class="text-sm text-gray-900">{{ $kategoriProduk->created_at->format('d M Y H:i') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Terakhir Diupdate</label>
                            <p class="text-sm text-gray-900">{{ $kategoriProduk->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Aksi</h3>
                    </div>
                    <div class="px-6 py-4 space-y-3">
                        <button onclick="toggleStatus({{ $kategoriProduk->id }})"
                            class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white {{ $kategoriProduk->aktif ? 'bg-gray-600 hover:bg-gray-700' : 'bg-green-600 hover:bg-green-700' }} focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                            <i class="fas fa-{{ $kategoriProduk->aktif ? 'pause' : 'play' }} mr-2"></i>
                            {{ $kategoriProduk->aktif ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>

                        <a href="{{ route('admin.kategori-produk.edit', $kategoriProduk) }}"
                            class="w-full flex items-center justify-center px-4 py-2 border border-yellow-300 rounded-md shadow-sm text-sm font-medium text-yellow-700 bg-white hover:bg-yellow-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Kategori
                        </a>

                        <button onclick="confirmDelete({{ $kategoriProduk->id }}, '{{ $kategoriProduk->nama }}')"
                            class="w-full flex items-center justify-center px-4 py-2 border border-red-300 rounded-md shadow-sm text-sm font-medium text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                            <i class="fas fa-trash mr-2"></i>
                            Hapus Kategori
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

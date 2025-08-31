<x-main-layout>
    <x-slot name="title">{{ $wisata->nama ?? 'Detail Wisata' }}</x-slot>

    @push('styles')
        <style>
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .line-clamp-3 {
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .breadcrumb-item {
                @apply text-neutral-500 hover:text-green-600 transition-colors duration-300;
            }

            .breadcrumb-separator {
                @apply text-neutral-400 mx-2;
            }
        </style>
    @endpush

    @if ($wisata)
        <!-- Hero Section -->
        <section class="relative overflow-hidden bg-gradient-to-br from-green-700 to-green-800">
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-r from-green-600/10 via-transparent to-transparent"></div>
            </div>
            <x-container>
                <div class="text-center py-20">
                    <div
                        class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                        <i class="fa-solid fa-mountain"></i>
                        Wisata Alam
                    </div>
                    <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
                        {{ $wisata->nama }}
                    </h1>
                    <p class="text-lg text-neutral-200 max-w-3xl mx-auto leading-relaxed">
                        {{ Str::limit($wisata->deskripsi, 200) }}
                    </p>
                </div>
            </x-container>
        </section>

        <!-- Breadcrumb Section -->
        <section class="bg-gradient-to-r from-green-50 to-green-100/50 py-8">
            <x-container>
                <nav class="flex items-center text-sm">
                    <a href="{{ route('home') }}" class="breadcrumb-item">
                        <i class="fa-solid fa-home"></i>
                        Beranda
                    </a>
                    <span class="breadcrumb-separator">
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>
                    <a href="{{ route('wisata') }}" class="breadcrumb-item">
                        Wisata Alam
                    </a>
                    <span class="breadcrumb-separator">
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>
                    <span class="text-neutral-700 font-medium">{{ $wisata->nama }}</span>
                </nav>
            </x-container>
        </section>

        <!-- Wisata Detail Section -->
        <section class="py-16 bg-white">
            <x-container>
                <div class="grid lg:grid-cols-3 gap-12">
                    <!-- Main Content -->
                    <div class="lg:col-span-2">
                        <!-- Main Image -->
                        <div class="relative rounded-3xl overflow-hidden mb-8 shadow-lg">
                            @if ($wisata->gambar)
                                <img src="{{ asset($wisata->gambar) }}" alt="{{ $wisata->nama }}"
                                    class="w-full h-96 lg:h-[500px] object-cover">
                            @else
                                <div
                                    class="w-full h-96 lg:h-[500px] bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                    <i class="fas fa-mountain text-white text-8xl"></i>
                                </div>
                            @endif
                            @if ($wisata->featured)
                                <div class="absolute top-6 left-6">
                                    <span
                                        class="bg-green-500 text-white px-4 py-2 rounded-2xl text-sm font-bold">FEATURED</span>
                                </div>
                            @endif
                        </div>

                        <!-- Wisata Title -->
                        <h1 class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4">
                            {{ $wisata->nama }}
                        </h1>

                        <!-- Wisata Stats -->
                        <div class="flex items-center gap-4 mb-6">
                            <div class="flex items-center gap-2 text-green-500">
                                <i class="fa-solid fa-mountain"></i>
                                <span class="text-neutral-600 font-medium">Wisata Alam</span>
                            </div>
                            @if ($wisata->featured)
                                <div class="flex items-center gap-2 text-yellow-500">
                                    <i class="fa-solid fa-star"></i>
                                    <span class="text-neutral-600 font-medium">Featured</span>
                                </div>
                            @endif
                        </div>

                        <!-- Wisata Description -->
                        @if ($wisata->deskripsi)
                            <div class="mb-8">
                                <h3 class="text-xl font-bold text-neutral-800 mb-4">
                                    <i class="fa-solid fa-info-circle text-green-500"></i>
                                    Deskripsi
                                </h3>
                                <div class="prose prose-lg max-w-none text-neutral-600 leading-relaxed">
                                    {!! nl2br(e($wisata->deskripsi)) !!}
                                </div>
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="space-y-4">
                            <div class="flex gap-4">
                                @if ($wisata->harga_tiket)
                                    <div class="flex-1">
                                        <x-primary-button class="w-full justify-center">
                                            <i class="fa-solid fa-ticket text-xl"></i>
                                            Rp {{ number_format($wisata->harga_tiket, 0, ',', '.') }}
                                        </x-primary-button>
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <x-outline-button color="green" class="w-full justify-center"
                                        onclick="shareWisata()">
                                        <i class="fa-solid fa-share text-xl"></i>
                                        Bagikan
                                    </x-outline-button>
                                </div>
                            </div>
                        </div>

                        <!-- Wisata Info Card -->
                        <div class="mt-8 p-6 bg-green-50 rounded-2xl border border-green-100">
                            <h3 class="text-lg font-bold text-neutral-800 mb-4">
                                <i class="fa-solid fa-mountain text-green-500"></i>
                                Informasi Wisata
                            </h3>
                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                                            <i class="fa-solid fa-map-marker-alt text-green-500"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-neutral-800">Lokasi</p>
                                        <p class="text-sm text-neutral-600">{{ $wisata->lokasi ?? 'Tidak tersedia' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                                            <i class="fa-solid fa-clock text-green-500"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-neutral-800">Jam Operasional</p>
                                        <p class="text-sm text-neutral-600">
                                            {{ $wisata->jam_operasional ?? 'Tidak tersedia' }}</p>
                                    </div>
                                </div>
                                @if ($wisata->harga_tiket)
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                                                <i class="fa-solid fa-ticket text-green-500"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-neutral-800">Harga Tiket</p>
                                            <p class="text-sm text-neutral-600">Rp
                                                {{ number_format($wisata->harga_tiket, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                @endif
                                @if ($wisata->fasilitas)
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                                                <i class="fa-solid fa-list text-green-500"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-neutral-800">Fasilitas</p>
                                            <p class="text-sm text-neutral-600">{{ $wisata->fasilitas }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-1">
                        <!-- Quick Info Card -->
                        <div
                            class="bg-gradient-to-br from-green-50 to-green-100/30 rounded-2xl p-6 border border-green-100 mb-8">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center">
                                    <i class="fa-solid fa-mountain text-white text-xl"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-neutral-800">Wisata Alam</p>
                                    <p class="text-sm text-neutral-600">Desa Sungai Kayu Ara</p>
                                </div>
                            </div>
                            <div class="space-y-3">
                                @if ($wisata->lokasi)
                                    <div class="flex items-center gap-2 text-neutral-600">
                                        <i class="fa-solid fa-map-marker-alt text-green-500 text-sm"></i>
                                        <span class="text-sm">{{ Str::limit($wisata->lokasi, 30) }}</span>
                                    </div>
                                @endif
                                @if ($wisata->jam_operasional)
                                    <div class="flex items-center gap-2 text-neutral-600">
                                        <i class="fa-solid fa-clock text-green-500 text-sm"></i>
                                        <span class="text-sm">{{ Str::limit($wisata->jam_operasional, 20) }}</span>
                                    </div>
                                @endif
                                @if ($wisata->harga_tiket)
                                    <div class="flex items-center gap-2 text-neutral-600">
                                        <i class="fa-solid fa-ticket text-green-500 text-sm"></i>
                                        <span class="text-sm">Rp
                                            {{ number_format($wisata->harga_tiket, 0, ',', '.') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Contact Info -->
                        @if ($wisata->kontak || $wisata->alamat)
                            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm mb-8">
                                <h3 class="text-lg font-bold text-neutral-800 mb-4">
                                    <i class="fa-solid fa-phone text-green-500"></i>
                                    Informasi Kontak
                                </h3>
                                <div class="space-y-3">
                                    @if ($wisata->kontak)
                                        <div class="flex items-center gap-2 text-neutral-600">
                                            <i class="fa-solid fa-phone text-green-500 text-sm"></i>
                                            <span class="text-sm">{{ $wisata->kontak }}</span>
                                        </div>
                                    @endif
                                    @if ($wisata->alamat)
                                        <div class="flex items-start gap-2 text-neutral-600">
                                            <i class="fa-solid fa-map-marker-alt text-green-500 text-sm mt-0.5"></i>
                                            <span class="text-sm">{{ $wisata->alamat }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </x-container>
        </section>

        <!-- Related Wisata Section -->
        @if ($relatedWisata && $relatedWisata->count() > 0)
            <section class="py-20 bg-gradient-to-br from-green-50 to-green-100/30">
                <x-container>
                    <div class="text-center mb-16">
                        <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                            Wisata <span class="text-green-500">Terkait</span>
                        </h2>
                        <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                            Jelajahi destinasi wisata lainnya yang mungkin menarik untuk Anda kunjungi.
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($relatedWisata as $relatedItem)
                            <div
                                class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                                <!-- Image -->
                                <div class="relative overflow-hidden">
                                    @if ($relatedItem->gambar)
                                        <img src="{{ asset($relatedItem->gambar) }}" alt="{{ $relatedItem->nama }}"
                                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-700">
                                    @else
                                        <div
                                            class="w-full h-48 bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                            <i class="fas fa-mountain text-white text-4xl"></i>
                                        </div>
                                    @endif
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                    </div>
                                    @if ($relatedItem->featured)
                                        <div class="absolute top-4 left-4">
                                            <span
                                                class="bg-green-500 text-white px-3 py-1 rounded-xl text-xs font-bold">FEATURED</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="p-6">
                                    <div class="flex items-center gap-2 mb-3">
                                        <div class="flex items-center gap-1 text-green-500">
                                            <i class="fa-solid fa-mountain text-sm"></i>
                                            <span class="text-xs font-medium">Wisata Alam</span>
                                        </div>
                                        @if ($relatedItem->featured)
                                            <div class="flex items-center gap-1 text-yellow-500">
                                                <i class="fa-solid fa-star text-sm"></i>
                                                <span class="text-xs font-medium">Featured</span>
                                            </div>
                                        @endif
                                    </div>

                                    <h3 class="text-xl font-bold text-neutral-800 mb-3 line-clamp-2">
                                        {{ $relatedItem->nama }}
                                    </h3>

                                    <p class="text-neutral-500 text-sm mb-4 line-clamp-3">
                                        {{ Str::limit($relatedItem->deskripsi, 100) }}
                                    </p>

                                    <div class="flex items-center justify-between">
                                        @if ($relatedItem->harga_tiket)
                                            <div class="text-green-600 font-semibold text-sm">
                                                Rp {{ number_format($relatedItem->harga_tiket, 0, ',', '.') }}
                                            </div>
                                        @endif
                                        <a href="{{ route('wisata.show', $relatedItem->slug) }}"
                                            class="inline-flex items-center gap-2 text-green-500 hover:text-green-600 font-semibold transition-colors duration-300">
                                            Lihat
                                            <i class="fa-solid fa-arrow-right text-sm"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-container>
            </section>
        @endif
    @else
        <!-- Wisata Not Found -->
        <section class="py-20 bg-white">
            <x-container>
                <div class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-green-100 rounded-full mb-6">
                        <i class="fas fa-mountain text-4xl text-green-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-neutral-800 mb-4">Wisata tidak ditemukan</h3>
                    <p class="text-neutral-500 max-w-md mx-auto mb-8">
                        Wisata yang Anda cari tidak ditemukan atau mungkin telah dihapus.
                    </p>
                    <a href="{{ route('wisata') }}"
                        class="inline-flex items-center gap-2 bg-green-600 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 hover:bg-green-700 hover:scale-105">
                        <i class="fa-solid fa-arrow-left"></i>
                        Kembali ke Wisata
                    </a>
                </div>
            </x-container>
        </section>
    @endif

    @push('scripts')
        <script>
            // Share functionality
            function shareWisata() {
                const url = window.location.href;
                const title = '{{ $wisata->nama ?? 'Wisata Desa Sungai Kayu Ara' }}';
                const text = '{{ $wisata->deskripsi ?? 'Jelajahi keindahan wisata alam di Desa Sungai Kayu Ara' }}';

                if (navigator.share) {
                    navigator.share({
                        title: title,
                        text: text,
                        url: url
                    }).then(() => {
                        showNotification('Berhasil membagikan wisata!', 'success');
                    }).catch((error) => {
                        copyToClipboard(url);
                    });
                } else {
                    copyToClipboard(url);
                }
            }

            // Copy to clipboard function
            function copyToClipboard(text) {
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(text).then(() => {
                        showNotification('Link berhasil disalin ke clipboard!', 'success');
                    }).catch(() => {
                        fallbackCopyToClipboard(text);
                    });
                } else {
                    fallbackCopyToClipboard(text);
                }
            }

            // Fallback copy method
            function fallbackCopyToClipboard(text) {
                const textArea = document.createElement('textarea');
                textArea.value = text;
                textArea.style.position = 'fixed';
                textArea.style.left = '-999999px';
                textArea.style.top = '-999999px';
                document.body.appendChild(textArea);
                textArea.focus();
                textArea.select();

                try {
                    document.execCommand('copy');
                    showNotification('Link berhasil disalin ke clipboard!', 'success');
                } catch (err) {
                    showNotification('Gagal menyalin link', 'error');
                }

                document.body.removeChild(textArea);
            }

            // Show notification
            function showNotification(message, type) {
                // Get colors based on type
                const colors = {
                    success: {
                        bg: 'bg-green-100',
                        border: 'border-green-400',
                        text: 'text-green-700',
                        iconColor: 'text-green-400',
                        buttonBg: 'bg-green-100',
                        buttonText: 'text-green-500',
                        buttonHover: 'hover:bg-green-200',
                        buttonRing: 'focus:ring-green-400',
                        icon: 'M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z'
                    },
                    error: {
                        bg: 'bg-red-100',
                        border: 'border-red-400',
                        text: 'text-red-700',
                        iconColor: 'text-red-400',
                        buttonBg: 'bg-red-100',
                        buttonText: 'text-red-500',
                        buttonHover: 'hover:bg-red-200',
                        buttonRing: 'focus:ring-red-400',
                        icon: 'M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z'
                    }
                };

                const config = colors[type] || colors.success;

                // Create notification element
                const notification = document.createElement('div');
                notification.className =
                    `fixed top-4 right-4 z-[9999] ${config.bg} border ${config.border} ${config.text} px-4 py-3 rounded-lg shadow-lg transition-all duration-300 opacity-0 transform translate-x-full`;
                notification.setAttribute('role', 'alert');

                notification.innerHTML = `
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 ${config.iconColor}" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="${config.icon}" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium">${message}</p>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button onclick="this.parentElement.parentElement.parentElement.parentElement.remove()"
                                    class="inline-flex ${config.buttonBg} ${config.buttonText} rounded-lg focus:ring-2 ${config.buttonRing} p-1.5 ${config.buttonHover} focus:outline-none">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                `;

                // Add to page
                document.body.appendChild(notification);

                // Animate in
                setTimeout(() => {
                    notification.classList.remove('opacity-0', 'translate-x-full');
                    notification.classList.add('opacity-100', 'translate-x-0');
                }, 10);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    notification.classList.add('opacity-0', 'translate-x-full');
                    setTimeout(() => {
                        if (notification.parentNode) {
                            notification.parentNode.removeChild(notification);
                        }
                    }, 300);
                }, 5000);
            }
        </script>
    @endpush
</x-main-layout>

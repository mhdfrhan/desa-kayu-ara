<x-main-layout>
    <x-slot name="title">{{ $galeri->judul ?? 'Detail Galeri' }}</x-slot>

    @push('styles')
        <style>
            /* Custom styles for gallery detail */
            .gallery-hero {
                position: relative;
                overflow: hidden;
            }

            .gallery-hero .main-image {
                transition: all 0.3s ease;
            }

            .gallery-info {
                position: sticky;
                top: 2rem;
            }

            .breadcrumb-item {
                transition: all 0.3s ease;
            }

            .breadcrumb-item:hover {
                color: #10b981;
            }

            .related-gallery {
                transition: all 0.3s ease;
            }

            .related-gallery:hover {
                transform: translateY(-4px);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }

            .gallery-stats {
                background: linear-gradient(135deg, #f59e0b, #d97706);
                color: white;
                padding: 0.5rem 1rem;
                border-radius: 1rem;
                font-weight: bold;
                display: inline-block;
            }

            .feature-badge {
                background: linear-gradient(135deg, #f59e0b, #d97706);
                color: white;
                padding: 0.25rem 0.75rem;
                border-radius: 0.5rem;
                font-size: 0.875rem;
                font-weight: bold;
            }

            .category-badge {
                background: linear-gradient(135deg, #10b981, #059669);
                color: white;
                padding: 0.25rem 0.75rem;
                border-radius: 0.5rem;
                font-size: 0.875rem;
                font-weight: bold;
            }

            .share-button {
                background: linear-gradient(135deg, #3b82f6, #1d4ed8);
                transition: all 0.3s ease;
            }

            .share-button:hover {
                background: linear-gradient(135deg, #1d4ed8, #1e40af);
                transform: scale(1.05);
            }

            .like-button {
                background: linear-gradient(135deg, #ef4444, #dc2626);
                transition: all 0.3s ease;
            }

            .like-button:hover {
                background: linear-gradient(135deg, #dc2626, #b91c1c);
                transform: scale(1.05);
            }

            @media (max-width: 768px) {
                .gallery-info {
                    position: static;
                }
            }
        </style>
    @endpush

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-yellow-700 to-yellow-800">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-yellow-600/10 via-transparent to-transparent"></div>
        </div>
        <x-container>
            <div class="text-center pt-20 pb-12">
                <div
                    class="inline-flex items-center gap-2 bg-yellow-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-images"></i>
                    Galeri Detail
                </div>
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
                    {{ $galeri->judul ?? 'Detail Galeri' }}
                </h1>
            </div>
        </x-container>
    </section>

    <!-- Breadcrumb Section -->
    <section class="bg-gradient-to-r from-yellow-50 to-yellow-100/50 py-8">
        <x-container>
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="breadcrumb-item text-neutral-600 hover:text-yellow-600">
                    <i class="fa-solid fa-home"></i>
                    Beranda
                </a>
                <span class="text-neutral-400">
                    <i class="fa-solid fa-chevron-right"></i>
                </span>
                <a href="{{ route('galeri') }}" class="breadcrumb-item text-neutral-600 hover:text-yellow-600">
                    Galeri Desa
                </a>
                <span class="text-neutral-400">
                    <i class="fa-solid fa-chevron-right"></i>
                </span>
                <span class="text-yellow-600 font-medium">{{ $galeri->judul ?? 'Detail Galeri' }}</span>
            </nav>
        </x-container>
    </section>

    @if ($galeri)
        <!-- Gallery Detail Section -->
        <section class="py-16 bg-white">
            <x-container>
                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Gallery Image -->
                    <div class="gallery-hero">
                        <div class="relative overflow-hidden rounded-3xl shadow-lg">
                            @if ($galeri->gambar)
                                <img id="mainImage" src="{{ asset($galeri->gambar) }}" alt="{{ $galeri->judul }}"
                                    class="main-image w-full h-96 lg:h-[500px] object-cover">
                            @else
                                <div
                                    class="w-full h-96 lg:h-[500px] bg-gradient-to-br from-yellow-600 to-yellow-800 flex items-center justify-center">
                                    <i class="fas fa-images text-white text-6xl"></i>
                                </div>
                            @endif

                            <!-- Badges -->
                            <div class="absolute top-4 left-4 flex flex-col gap-2">
                                @if ($galeri->featured)
                                    <span class="feature-badge">
                                        <i class="fa-solid fa-star"></i>
                                        FEATURED
                                    </span>
                                @endif
                                @if ($galeri->kategori)
                                    <span class="category-badge">
                                        <i class="fa-solid fa-tag"></i>
                                        {{ $galeri->kategori->nama }}
                                    </span>
                                @endif
                            </div>

                            @if ($galeri->likes)
                                <div class="absolute top-4 right-4">
                                    <div
                                        class="bg-white/90 backdrop-blur-sm rounded-full px-3 py-2 flex items-center gap-2">
                                        <i class="fa-solid fa-heart text-red-500"></i>
                                        <span class="font-bold text-neutral-800">{{ $galeri->likes }}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Gallery Info -->
                    <div class="gallery-info">
                        <!-- Category Badge -->
                        @if ($galeri->kategori)
                            <div class="mb-4">
                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-medium">
                                    <i class="fa-solid fa-tag"></i>
                                    {{ $galeri->kategori->nama }}
                                </span>
                            </div>
                        @endif

                        <!-- Gallery Title -->
                        <h1 class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4">
                            {{ $galeri->judul }}
                        </h1>

                        <!-- Gallery Stats -->
                        <div class="flex items-center gap-4 mb-6">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-heart text-red-500"></i>
                                <span id="likes-count" class="text-neutral-600 font-medium">{{ $galeri->likesCount }}
                                    likes</span>
                            </div>
                            <div class="flex items-center gap-2 text-neutral-600">
                                <i class="fa-solid fa-calendar"></i>
                                <span>{{ $galeri->created_at->format('d F Y') }}</span>
                            </div>
                        </div>

                        <!-- Gallery Description -->
                        @if ($galeri->deskripsi)
                            <div class="mb-8">
                                <h3 class="text-xl font-bold text-neutral-800 mb-4">
                                    <i class="fa-solid fa-info-circle text-yellow-500"></i>
                                    Deskripsi Galeri
                                </h3>
                                <div class="prose prose-neutral max-w-none">
                                    {!! nl2br(e($galeri->deskripsi)) !!}
                                </div>
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="space-y-4">
                            <div class="flex gap-4">
                                <div class="flex-1">
                                    <x-danger-button class="w-full justify-center" onclick="likeGallery()">
                                        <i id="like-icon"
                                            class="fa-solid fa-heart text-xl {{ $hasLiked ? 'text-white' : 'text-red-200' }}"></i>
                                        <span id="like-text">{{ $hasLiked ? 'Disukai' : 'Suka' }}</span>
                                    </x-danger-button>
                                </div>
                                <div class="flex-1">
                                    <x-primary-button class="w-full justify-center" onclick="shareGallery()">
                                        <i class="fa-solid fa-share text-xl"></i>
                                        Bagikan
                                    </x-primary-button>
                                </div>
                            </div>
                        </div>

                        <!-- Gallery Info Card -->
                        <div class="mt-8 p-6 bg-yellow-50 rounded-2xl border border-yellow-100">
                            <h3 class="text-lg font-bold text-neutral-800 mb-4">
                                <i class="fa-solid fa-camera text-yellow-500"></i>
                                Informasi Galeri
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-images text-white"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-neutral-800">Galeri Desa Sungai Kayu Ara</p>
                                        <p class="text-sm text-neutral-600">Koleksi Foto Terbaik</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="text-center">
                                        <p id="card-likes-count" class="text-2xl font-bold text-yellow-500">
                                            {{ $galeri->likesCount }}
                                        </p>
                                        <p class="text-sm text-neutral-600">Likes</p>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-2xl font-bold text-yellow-500">
                                            {{ $galeri->kategori ? '1' : '0' }}
                                        </p>
                                        <p class="text-sm text-neutral-600">Kategori</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-container>
        </section>

        <!-- Related Gallery Section -->
        @if ($relatedGaleri && $relatedGaleri->count() > 0)
            <section class="py-20 bg-gradient-to-br from-yellow-50 to-yellow-100/30">
                <x-container>
                    <div class="text-center mb-12">
                        <h2 class="text-3xl lg:text-4xl font-bold text-neutral-800 mb-4">
                            Galeri <span class="text-yellow-600">Terkait</span>
                        </h2>
                        <p class="text-lg text-neutral-600 max-w-2xl mx-auto">
                            Jelajahi galeri serupa yang mungkin menarik bagi Anda
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($relatedGaleri->take(6) as $relatedItem)
                            <div
                                class="related-gallery group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100">
                                <div class="relative overflow-hidden">
                                    @if ($relatedItem->gambar)
                                        <img src="{{ asset($relatedItem->gambar) }}" alt="{{ $relatedItem->judul }}"
                                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-700">
                                    @else
                                        <div
                                            class="w-full h-48 bg-gradient-to-br from-yellow-600 to-yellow-800 flex items-center justify-center">
                                            <i class="fas fa-images text-white text-4xl"></i>
                                        </div>
                                    @endif

                                    @if ($relatedItem->kategori)
                                        <div class="absolute top-4 left-4">
                                            <span
                                                class="bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-medium">
                                                {{ $relatedItem->kategori->nama }}
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <div class="p-6">
                                    <h3
                                        class="text-lg font-bold text-neutral-800 mb-2 group-hover:text-yellow-500 transition-colors duration-300">
                                        {{ $relatedItem->judul }}
                                    </h3>
                                    <p class="text-neutral-500 text-sm mb-4 line-clamp-2">
                                        {{ Str::limit($relatedItem->deskripsi, 100) }}
                                    </p>

                                    <div class="flex items-center justify-between">
                                        @if ($relatedItem->likesCount > 0)
                                            <div class="flex items-center gap-2 text-neutral-600">
                                                <i class="fa-solid fa-heart text-red-500"></i>
                                                <span class="text-sm">{{ $relatedItem->likesCount }}</span>
                                            </div>
                                        @endif
                                        <a href="{{ route('galeri.show', $relatedItem->slug) }}"
                                            class="inline-flex items-center gap-2 text-yellow-500 hover:text-yellow-600 font-semibold transition-colors duration-300">
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
        <!-- Gallery Not Found -->
        <section class="py-20 bg-white">
            <x-container>
                <div class="text-center">
                    <div class="mb-8">
                        <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                        <h1 class="text-3xl font-bold text-gray-600 mb-4">Galeri Tidak Ditemukan</h1>
                        <p class="text-gray-500 mb-8">Maaf, galeri yang Anda cari tidak tersedia atau telah dihapus.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('galeri') }}"
                            class="inline-flex items-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-2xl font-semibold transition-all duration-300">
                            <i class="fa-solid fa-arrow-left"></i>
                            Kembali ke Galeri
                        </a>
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center gap-2 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-2xl font-semibold transition-all duration-300">
                            <i class="fa-solid fa-home"></i>
                            Beranda
                        </a>
                    </div>
                </div>
            </x-container>
        </section>
    @endif

    @push('scripts')
        <script>
            // Like functionality
            function likeGallery() {
                const likeButton = event.target.closest('x-danger-button') || event.target.closest('button');
                const likeIcon = document.getElementById('like-icon');
                const likeText = document.getElementById('like-text');
                const likesCount = document.getElementById('likes-count');
                const cardLikesCount = document.getElementById('card-likes-count');

                if (!likeIcon || !likeText || !likesCount || !cardLikesCount) {
                    showNotification('Terjadi kesalahan pada sistem', 'error');
                    return;
                }

                // Disable button while processing
                if (likeButton) {
                    likeButton.disabled = true;
                }
                likeText.textContent = 'Memproses...';

                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const url = '{{ route('galeri.like', $galeri->slug ?? 'dummy') }}';

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({})
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok: ' + response.status);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            // Update button appearance
                            if (data.liked) {
                                likeIcon.className = 'fa-solid fa-heart text-xl text-white';
                                likeText.textContent = 'Disukai';
                            } else {
                                likeIcon.className = 'fa-solid fa-heart text-xl text-red-200';
                                likeText.textContent = 'Suka';
                            }

                            // Update likes count
                            likesCount.textContent = data.total_likes + ' likes';
                            cardLikesCount.textContent = data.total_likes;

                            // Show message
                            showNotification(data.message, 'success');
                        } else {
                            showNotification(data.message || 'Terjadi kesalahan', 'error');
                        }
                    })
                    .catch(error => {
                        showNotification('Terjadi kesalahan saat memproses like', 'error');
                    })
                    .finally(() => {
                        // Re-enable button
                        if (likeButton) {
                            likeButton.disabled = false;
                        }
                    });
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

            // Share functionality
            function shareGallery() {
                const url = window.location.href;
                const title = '{{ $galeri->judul ?? 'Galeri Desa Sungai Kayu Ara' }}';
                const text = '{{ $galeri->deskripsi ?? 'Lihat galeri foto terbaik dari Desa Sungai Kayu Ara' }}';

                if (navigator.share) {
                    navigator.share({
                        title: title,
                        text: text,
                        url: url
                    }).then(() => {
                        showNotification('Berhasil membagikan galeri!', 'success');
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
        </script>
    @endpush
</x-main-layout>

<x-main-layout>
    <x-slot name="title">{{ $berita->judul }}</x-slot>

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-green-700 to-green-800">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-green-600/10 via-transparent to-transparent"></div>
        </div>
        <x-container>
            <div class="text-center py-20">
                <div
                    class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-newspaper"></i>
                    {{ $berita->kategori->nama ?? 'Berita' }}
                </div>
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
                    {{ $berita->judul }}
                </h1>
                <div class="flex items-center justify-center gap-6 text-neutral-200 text-sm">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-calendar"></i>
                        <span>{{ $berita->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-clock"></i>
                        <span>{{ $berita->created_at->format('H:i') }} WIB</span>
                    </div>
                    @if ($berita->kategori)
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-tag"></i>
                            <span>{{ $berita->kategori->nama }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </x-container>
    </section>

    <!-- Breadcrumb -->
    <section class="py-4 bg-white border-b border-gray-100">
        <x-container>
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-green-600 transition-colors">
                    <i class="fa-solid fa-home"></i>
                    Beranda
                </a>
                <i class="fa-solid fa-chevron-right text-gray-400"></i>
                <a href="{{ route('berita') }}" class="hover:text-green-600 transition-colors">
                    Berita
                </a>
                <i class="fa-solid fa-chevron-right text-gray-400"></i>
                <span class="text-gray-900 font-medium">{{ $berita->judul }}</span>
            </nav>
        </x-container>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-gray-50">
        <x-container>
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <!-- Article Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                        <!-- Featured Image -->
                        @if ($berita->gambar)
                            <div class="relative h-80 lg:h-96 overflow-hidden">
                                <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}"
                                    class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                        @endif

                        <!-- Article Content -->
                        <div class="p-8">
                            <!-- Article Meta -->
                            <div class="flex items-center gap-4 text-sm text-gray-600 mb-6">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-calendar text-green-600"></i>
                                    <span>{{ $berita->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-clock text-green-600"></i>
                                    <span>{{ $berita->created_at->format('H:i') }} WIB</span>
                                </div>
                                @if ($berita->kategori)
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-tag text-green-600"></i>
                                        <span>{{ $berita->kategori->nama }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Article Summary -->
                            @if ($berita->ringkasan)
                                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-8 rounded-r-lg">
                                    <p class="text-gray-700 leading-relaxed">
                                        {{ $berita->ringkasan }}
                                    </p>
                                </div>
                            @endif

                            <!-- Article Body -->
                            <div class="prose prose-lg max-w-none">
                                {!! $berita->konten !!}
                            </div>

                            <!-- Article Footer -->
                            <div class="mt-8 pt-8 border-t border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <span class="text-sm text-gray-600">Bagikan:</span>
                                        <div class="flex items-center gap-2">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                                target="_blank"
                                                class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                                <i class="fab fa-facebook-f text-xs"></i>
                                            </a>
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($berita->judul) }}"
                                                target="_blank"
                                                class="w-8 h-8 bg-blue-400 text-white rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                                                <i class="fab fa-twitter text-xs"></i>
                                            </a>
                                            <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . request()->url()) }}"
                                                target="_blank"
                                                class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                                                <i class="fab fa-whatsapp text-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('berita') }}"
                                        class="inline-flex items-center gap-2 text-green-600 hover:text-green-700 font-medium transition-colors">
                                        <i class="fa-solid fa-arrow-left"></i>
                                        Kembali ke Berita
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related Articles -->
                    @if ($beritaTerkait->count() > 0)
                        <div class="mt-12">
                            <h2 class="text-2xl font-bold text-gray-900 mb-8">Berita Terkait</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                @foreach ($beritaTerkait as $beritaTerkaitItem)
                                    <article
                                        class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                                        @if ($beritaTerkaitItem->gambar)
                                            <div class="relative h-48 overflow-hidden">
                                                <img src="{{ asset($beritaTerkaitItem->gambar) }}"
                                                    alt="{{ $beritaTerkaitItem->judul }}"
                                                    class="w-full h-full object-cover">
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent">
                                                </div>
                                            </div>
                                        @endif
                                        <div class="p-6">
                                            @if ($beritaTerkaitItem->kategori)
                                                <div
                                                    class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium mb-3">
                                                    <i class="fa-solid fa-tag"></i>
                                                    {{ $beritaTerkaitItem->kategori->nama }}
                                                </div>
                                            @endif
                                            <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2">
                                                <a href="{{ route('berita.show', $beritaTerkaitItem->slug) }}"
                                                    class="hover:text-green-600 transition-colors">
                                                    {{ $beritaTerkaitItem->judul }}
                                                </a>
                                            </h3>
                                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                                {{ $beritaTerkaitItem->ringkasan }}
                                            </p>
                                            <div class="flex items-center gap-2 text-xs text-gray-500">
                                                <i class="fa-solid fa-calendar"></i>
                                                <span>{{ $beritaTerkaitItem->created_at->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Latest News -->
                    @if ($beritaTerbaru->count() > 0)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Berita Terbaru</h3>
                            <div class="space-y-4">
                                @foreach ($beritaTerbaru as $beritaTerbaruItem)
                                    <article class="flex gap-3">
                                        @if ($beritaTerbaruItem->gambar)
                                            <div class="flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden">
                                                <img src="{{ asset($beritaTerbaruItem->gambar) }}"
                                                    alt="{{ $beritaTerbaruItem->judul }}"
                                                    class="w-full h-full object-cover">
                                            </div>
                                        @endif
                                        <div class="flex-1 min-w-0">
                                            <h4 class="font-medium text-gray-900 text-sm mb-1 line-clamp-2">
                                                <a href="{{ route('berita.show', $beritaTerbaruItem->slug) }}"
                                                    class="hover:text-green-600 transition-colors">
                                                    {{ $beritaTerbaruItem->judul }}
                                                </a>
                                            </h4>
                                            <div class="flex items-center gap-2 text-xs text-gray-500">
                                                <i class="fa-solid fa-calendar"></i>
                                                <span>{{ $beritaTerbaruItem->created_at->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Categories -->
                    @if ($kategoriBerita->count() > 0)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Kategori</h3>
                            <div class="space-y-2">
                                @foreach ($kategoriBerita as $kategori)
                                    <a href="{{ route('berita') }}?kategori={{ $kategori->id }}"
                                        class="flex items-center justify-between p-3 rounded-lg hover:bg-green-50 transition-colors group">
                                        <span class="text-gray-700 group-hover:text-green-600 transition-colors">
                                            {{ $kategori->nama }}
                                        </span>
                                        <i
                                            class="fa-solid fa-chevron-right text-gray-400 group-hover:text-green-600 transition-colors"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </x-container>
    </section>
</x-main-layout>

@push('styles')
    <style>
        .prose {
            color: #374151;
        }

        .prose h1,
        .prose h2,
        .prose h3,
        .prose h4,
        .prose h5,
        .prose h6 {
            color: #111827;
            font-weight: 600;
            margin-top: 1.5em;
            margin-bottom: 0.5em;
        }

        .prose h1 {
            font-size: 1.875rem;
        }

        .prose h2 {
            font-size: 1.5rem;
        }

        .prose h3 {
            font-size: 1.25rem;
        }

        .prose p {
            margin-bottom: 1em;
            line-height: 1.75;
        }

        .prose ul,
        .prose ol {
            margin-bottom: 1em;
            padding-left: 1.5em;
        }

        .prose li {
            margin-bottom: 0.5em;
        }

        .prose blockquote {
            border-left: 4px solid #10B981;
            padding-left: 1em;
            margin: 1.5em 0;
            font-style: italic;
            color: #6B7280;
        }

        .prose a {
            color: #10B981;
            text-decoration: underline;
        }

        .prose a:hover {
            color: #059669;
        }

        .prose img {
            border-radius: 0.5rem;
            margin: 1.5em 0;
        }

        .prose table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5em 0;
        }

        .prose th,
        .prose td {
            border: 1px solid #E5E7EB;
            padding: 0.75em;
            text-align: left;
        }

        .prose th {
            background-color: #F9FAFB;
            font-weight: 600;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endpush

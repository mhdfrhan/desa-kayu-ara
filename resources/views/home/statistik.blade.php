<x-main-layout>
    <x-slot name="title">Statistik Desa</x-slot>

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-green-700 to-green-800">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-green-600/10 via-transparent to-transparent"></div>
        </div>
        <x-container>
            <div class="text-center py-20">
                <div
                    class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fa-solid fa-chart-line"></i>
                    Statistik Desa
                </div>
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
                    Statistik Desa
                </h1>
                <p class="text-lg text-neutral-200 max-w-3xl mx-auto leading-relaxed">
                    Data demografis dan statistik terkini yang menampilkan profil kependudukan Desa Sungai Kayu Ara
                    berdasarkan berbagai aspek.
                </p>
            </div>
        </x-container>
    </section>

    <!-- Population Overview Section -->
    <section class="py-20 bg-white">
        <x-container>
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Data <span class="text-green-500">Kependudukan</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Ringkasan data kependudukan Desa Sungai Kayu Ara per Desember 2024.
                </p>
            </div>

            <!-- Population Stats Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                @if ($statistik->count() > 0)
                    @foreach ($statistik->take(4) as $stat)
                        <div
                            class="group bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 transform hover:-translate-y-2">
                            <div class="text-center">
                                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300"
                                    style="background-color: {{ $stat->warna ?? '#10B981' }}">
                                    <i class="{{ $stat->icon ?? 'fa-solid fa-chart-bar' }} text-white text-2xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-neutral-800 mb-2">{{ $stat->label }}</h3>
                                <div class="text-4xl font-bold text-green-500 mb-2">{{ number_format($stat->nilai) }}
                                </div>
                                <p class="text-neutral-500">{{ $stat->satuan ?? 'Data' }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback jika tidak ada data statistik -->
                    <div class="col-span-full">
                        <div class="text-center py-12">
                            <i class="fas fa-chart-bar text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-600 mb-2">Belum ada data statistik</h3>
                            <p class="text-gray-500">Data statistik akan segera ditampilkan di sini.</p>
                        </div>
                    </div>
                @endif
            </div>
        </x-container>
    </section>

    <!-- Charts Section -->
    <section class="py-20 bg-gradient-to-br from-green-50 via-white to-green-50/30">
        <x-container>
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Statistik <span class="text-green-500">Demografis</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Analisis mendalam berdasarkan kelompok umur, pendidikan, pekerjaan, status perkawinan, dan agama.
                </p>
            </div>

            <!-- Charts Grid -->
            <div class="grid lg:grid-cols-2 gap-12">
                @if ($chartStatistik->count() > 0)
                    @foreach ($chartStatistik as $index => $chart)
                        <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold text-neutral-800">{{ $chart->judul }}</h3>
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center"
                                    style="background-color: {{ $chart->warna ?? '#10B981' }}20">
                                    <i class="{{ $chart->icon ?? 'fa-solid fa-chart-pie' }}"
                                        style="color: {{ $chart->warna ?? '#10B981' }}"></i>
                                </div>
                            </div>
                            <div class="h-80">
                                <canvas id="chart{{ $index }}"></canvas>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback jika tidak ada chart -->
                    <div class="col-span-full">
                        <div class="text-center py-12">
                            <i class="fas fa-chart-pie text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-600 mb-2">Belum ada data chart</h3>
                            <p class="text-gray-500">Data chart akan segera ditampilkan di sini.</p>
                        </div>
                    </div>
                @endif
            </div>
        </x-container>
    </section>

    @if ($chartStatistik->count() > 2)
        <!-- Additional Charts Section -->
        <section class="py-20 bg-white">
            <x-container>
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                        Statistik <span class="text-green-500">Tambahan</span>
                    </h2>
                    <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                        Analisis statistik tambahan untuk perencanaan pembangunan desa.
                    </p>
                </div>

                <div class="grid lg:grid-cols-2 gap-12">
                    @foreach ($chartStatistik->skip(2) as $index => $chart)
                        <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold text-neutral-800">{{ $chart->judul }}</h3>
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center"
                                    style="background-color: {{ $chart->warna ?? '#10B981' }}20">
                                    <i class="{{ $chart->icon ?? 'fa-solid fa-chart-pie' }}"
                                        style="color: {{ $chart->warna ?? '#10B981' }}"></i>
                                </div>
                            </div>
                            <div class="h-80">
                                <canvas id="chart{{ $index + 2 }}"></canvas>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-container>
        </section>
    @endif

    <!-- Detailed Statistics Section -->
    <section class="py-20 bg-gradient-to-br from-green-50 via-white to-green-50/30">
        <x-container>
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Statistik <span class="text-green-500">Detail</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Data terperinci yang dapat membantu dalam perencanaan pembangunan desa.
                </p>
            </div>

            <!-- Detailed Stats Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if ($statistik->count() > 4)
                    @foreach ($statistik->skip(4) as $stat)
                        <div
                            class="group bg-white rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 transform hover:-translate-y-2">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300"
                                    style="background-color: {{ $stat->warna ?? '#10B981' }}">
                                    <i class="{{ $stat->icon ?? 'fa-solid fa-chart-bar' }} text-white text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-neutral-800 mb-1">{{ $stat->label }}</h3>
                                    <div class="flex items-baseline gap-1">
                                        <span
                                            class="text-2xl font-bold text-green-500">{{ number_format($stat->nilai) }}</span>
                                        <span class="text-sm text-neutral-500">{{ $stat->satuan ?? 'Data' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback jika tidak ada data statistik tambahan -->
                    <div class="col-span-full">
                        <div class="text-center py-12">
                            <i class="fas fa-chart-line text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-600 mb-2">Belum ada data statistik detail</h3>
                            <p class="text-gray-500">Data statistik detail akan segera ditampilkan di sini.</p>
                        </div>
                    </div>
                @endif
            </div>
        </x-container>
    </section>

    <!-- Call to Action Section -->
    <section class="py-20 bg-gradient-to-br from-green-600 to-green-700">
        <x-container>
            <div class="text-center">
                <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
                    Butuh Data Lebih Detail?
                </h2>
                <p class="text-lg text-green-100 mb-8 max-w-2xl mx-auto">
                    Hubungi kami untuk mendapatkan data statistik yang lebih lengkap dan terperinci.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#"
                        class="inline-flex items-center gap-2 bg-white text-green-600 px-8 py-3 rounded-2xl font-semibold hover:bg-green-50 transition-colors duration-300">
                        Download Laporan
                        <i class="fa-solid fa-download"></i>
                    </a>
                    <a href="#"
                        class="inline-flex items-center gap-2 border-2 border-white text-white px-8 py-3 rounded-2xl font-semibold hover:bg-white hover:text-green-600 transition-colors duration-300">
                        Hubungi Kami
                        <i class="fa-solid fa-phone"></i>
                    </a>
                </div>
            </div>
        </x-container>
    </section>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modern gradient colors
            const gradients = {
                primary: ['#10B981', '#059669'],
                secondary: ['#3B82F6', '#2563EB'],
                accent: ['#F59E0B', '#D97706'],
                danger: ['#EF4444', '#DC2626'],
                purple: ['#8B5CF6', '#7C3AED'],
                cyan: ['#06B6D4', '#0891B2'],
                green: ['#84CC16', '#65A30D'],
                orange: ['#F97316', '#EA580C'],
                pink: ['#EC4899', '#DB2777'],
                indigo: ['#6366F1', '#4F46E5']
            };

            // Create gradient functions
            function createGradient(ctx, colors) {
                const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, colors[0]);
                gradient.addColorStop(1, colors[1]);
                return gradient;
            }

            @if ($chartStatistik->count() > 0)
                @foreach ($chartStatistik as $index => $chart)
                    @php
                        $chartData = $chart->dataChart->map(function ($data) {
                            return [
                                'label' => $data->label,
                                'value' => $data->nilai,
                                'color' => $data->warna ?? '#10B981',
                            ];
                        });
                        $labels = $chartData->pluck('label')->toArray();
                        $values = $chartData->pluck('value')->toArray();
                        $colors = $chartData->pluck('color')->toArray();
                    @endphp

                    // Chart {{ $index + 1 }} - {{ $chart->judul }}
                    const chart{{ $index }}Ctx = document.getElementById('chart{{ $index }}')
                        .getContext('2d');
                    const chart{{ $index }}Gradient = createGradient(chart{{ $index }}Ctx, gradients
                        .primary);

                    new Chart(chart{{ $index }}Ctx, {
                        type: '{{ $chart->jenis_chart ?? 'doughnut' }}',
                        data: {
                            labels: @json($labels),
                            datasets: [{
                                data: @json($values),
                                backgroundColor: @json($colors),
                                borderWidth: 0,
                                hoverOffset: 8,
                                borderRadius: 4,
                                spacing: 2
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            cutout: '70%',
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        padding: 20,
                                        usePointStyle: true,
                                        font: {
                                            size: 12,
                                            weight: '500'
                                        },
                                        color: '#374151'
                                    }
                                },
                                tooltip: {
                                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                    titleColor: '#ffffff',
                                    bodyColor: '#ffffff',
                                    borderColor: '#10B981',
                                    borderWidth: 1,
                                    cornerRadius: 8,
                                    displayColors: true,
                                    callbacks: {
                                        label: function(context) {
                                            const total = context.dataset.data.reduce((a, b) => a + b,
                                                0);
                                            const percentage = ((context.parsed / total) * 100).toFixed(
                                                1);
                                            return `${context.label}: ${context.parsed} (${percentage}%)`;
                                        }
                                    }
                                }
                            }
                        }
                    });
                @endforeach
            @endif

            // Add smooth scroll behavior
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
</x-main-layout>

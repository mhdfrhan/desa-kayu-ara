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
                @php
                    $populationStats = [
                        [
                            'title' => 'Total Penduduk',
                            'value' => '1,039',
                            'icon' => 'fa-solid fa-users',
                            'color' => 'bg-blue-500',
                            'description' => 'Jiwa',
                        ],
                        [
                            'title' => 'Kepala Keluarga',
                            'value' => '285',
                            'icon' => 'fa-solid fa-home',
                            'color' => 'bg-green-500',
                            'description' => 'KK',
                        ],
                        [
                            'title' => 'Laki-laki',
                            'value' => '532',
                            'icon' => 'fa-solid fa-mars',
                            'color' => 'bg-blue-600',
                            'description' => 'Jiwa',
                        ],
                        [
                            'title' => 'Perempuan',
                            'value' => '507',
                            'icon' => 'fa-solid fa-venus',
                            'color' => 'bg-pink-500',
                            'description' => 'Jiwa',
                        ],
                    ];
                @endphp

                @foreach ($populationStats as $stat)
                    <div
                        class="group bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 transform hover:-translate-y-2">
                        <div class="text-center">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 {{ $stat['color'] }} rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                                <i class="{{ $stat['icon'] }} text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-neutral-800 mb-2">{{ $stat['title'] }}</h3>
                            <div class="text-4xl font-bold text-green-500 mb-2">{{ $stat['value'] }}</div>
                            <p class="text-neutral-500">{{ $stat['description'] }}</p>
                        </div>
                    </div>
                @endforeach
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
                <!-- Age Group Chart -->
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-neutral-800">Berdasarkan Kelompok Umur</h3>
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-chart-pie text-blue-600"></i>
                        </div>
                    </div>
                    <div class="h-80">
                        <canvas id="ageChart"></canvas>
                    </div>
                </div>

                <!-- Education Chart -->
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-neutral-800">Berdasarkan Pendidikan</h3>
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-graduation-cap text-green-600"></i>
                        </div>
                    </div>
                    <div class="h-80">
                        <canvas id="educationChart"></canvas>
                    </div>
                </div>

                <!-- Occupation Chart -->
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-neutral-800">Berdasarkan Pekerjaan</h3>
                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-briefcase text-orange-600"></i>
                        </div>
                    </div>
                    <div class="h-80">
                        <canvas id="occupationChart"></canvas>
                    </div>
                </div>

                <!-- Marital Status Chart -->
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-neutral-800">Berdasarkan Perkawinan</h3>
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-heart text-purple-600"></i>
                        </div>
                    </div>
                    <div class="h-80">
                        <canvas id="maritalChart"></canvas>
                    </div>
                </div>
            </div>
        </x-container>
    </section>

    <!-- Religion Chart Section -->
    <section class="py-20 bg-white">
        <x-container>
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-neutral-800 mb-6">
                    Statistik <span class="text-green-500">Agama</span>
                </h2>
                <p class="text-lg text-neutral-500 max-w-3xl mx-auto leading-relaxed">
                    Komposisi penduduk berdasarkan agama yang dianut.
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-neutral-800">Berdasarkan Agama</h3>
                        <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-pray text-red-600"></i>
                        </div>
                    </div>
                    <div class="h-96">
                        <canvas id="religionChart"></canvas>
                    </div>
                </div>
            </div>
        </x-container>
    </section>

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
                @php
                    $detailedStats = [
                        [
                            'title' => 'Kepadatan Penduduk',
                            'value' => '87',
                            'unit' => 'jiwa/km²',
                            'icon' => 'fa-solid fa-map-marker-alt',
                            'color' => 'bg-indigo-500',
                        ],
                        [
                            'title' => 'Luas Wilayah',
                            'value' => '12,000',
                            'unit' => 'hektar',
                            'icon' => 'fa-solid fa-ruler-combined',
                            'color' => 'bg-green-500',
                        ],
                        [
                            'title' => 'Jumlah Dusun',
                            'value' => '4',
                            'unit' => 'dusun',
                            'icon' => 'fa-solid fa-map',
                            'color' => 'bg-blue-500',
                        ],
                        [
                            'title' => 'Rasio Gender',
                            'value' => '1.05',
                            'unit' => 'L/P',
                            'icon' => 'fa-solid fa-balance-scale',
                            'color' => 'bg-purple-500',
                        ],
                        [
                            'title' => 'Angka Ketergantungan',
                            'value' => '45.2',
                            'unit' => '%',
                            'icon' => 'fa-solid fa-chart-line',
                            'color' => 'bg-orange-500',
                        ],
                        [
                            'title' => 'Pertumbuhan Penduduk',
                            'value' => '1.2',
                            'unit' => '%/tahun',
                            'icon' => 'fa-solid fa-arrow-up',
                            'color' => 'bg-red-500',
                        ],
                    ];
                @endphp

                @foreach ($detailedStats as $stat)
                    <div
                        class="group bg-white rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 transform hover:-translate-y-2">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 {{ $stat['color'] }} rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <i class="{{ $stat['icon'] }} text-white text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-neutral-800 mb-1">{{ $stat['title'] }}</h3>
                                <div class="flex items-baseline gap-1">
                                    <span class="text-2xl font-bold text-green-500">{{ $stat['value'] }}</span>
                                    <span class="text-sm text-neutral-500">{{ $stat['unit'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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

            // Age Group Chart - Modern Doughnut
            const ageCtx = document.getElementById('ageChart').getContext('2d');
            const ageGradient = createGradient(ageCtx, gradients.primary);

            new Chart(ageCtx, {
                type: 'doughnut',
                data: {
                    labels: ['0-14 tahun', '15-24 tahun', '25-54 tahun', '55-64 tahun', '65+ tahun'],
                    datasets: [{
                        data: [285, 198, 412, 89, 55],
                        backgroundColor: [
                            '#10B981',
                            '#3B82F6',
                            '#F59E0B',
                            '#8B5CF6',
                            '#EF4444'
                        ],
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
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((context.parsed / total) * 100).toFixed(1);
                                    return `${context.label}: ${context.parsed} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });

            // Education Chart - Modern Bar with Gradient
            const educationCtx = document.getElementById('educationChart').getContext('2d');
            const educationGradient = createGradient(educationCtx, gradients.secondary);

            new Chart(educationCtx, {
                type: 'bar',
                data: {
                    labels: ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D3/S1', 'S2/S3'],
                    datasets: [{
                        label: 'Jumlah',
                        data: [45, 234, 298, 312, 134, 16],
                        backgroundColor: educationGradient,
                        borderRadius: {
                            topLeft: 8,
                            topRight: 8
                        },
                        borderSkipped: false,
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: '#ffffff',
                            bodyColor: '#ffffff',
                            borderColor: '#3B82F6',
                            borderWidth: 1,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    return `Jumlah: ${context.parsed.y} orang`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                color: 'rgba(0, 0, 0, 0.05)',
                                drawBorder: false
                            },
                            ticks: {
                                color: '#6B7280',
                                font: {
                                    size: 12
                                },
                                padding: 10
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#6B7280',
                                font: {
                                    size: 12
                                },
                                maxRotation: 45
                            }
                        }
                    }
                }
            });

            // Occupation Chart - Modern Horizontal Bar
            const occupationCtx = document.getElementById('occupationChart').getContext('2d');
            const occupationGradient = createGradient(occupationCtx, gradients.accent);

            new Chart(occupationCtx, {
                type: 'bar',
                data: {
                    labels: ['Pertanian', 'Nelayan', 'Pedagang', 'PNS', 'Swasta', 'Lainnya'],
                    datasets: [{
                        label: 'Jumlah',
                        data: [412, 156, 89, 45, 234, 103],
                        backgroundColor: occupationGradient,
                        borderRadius: {
                            topRight: 8,
                            bottomRight: 8
                        },
                        borderSkipped: false,
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: '#ffffff',
                            bodyColor: '#ffffff',
                            borderColor: '#F59E0B',
                            borderWidth: 1,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    return `Jumlah: ${context.parsed.x} orang`;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                color: 'rgba(0, 0, 0, 0.05)',
                                drawBorder: false
                            },
                            ticks: {
                                color: '#6B7280',
                                font: {
                                    size: 12
                                },
                                padding: 10
                            }
                        },
                        y: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#6B7280',
                                font: {
                                    size: 12
                                }
                            }
                        }
                    }
                }
            });

            // Marital Status Chart - Modern Pie
            const maritalCtx = document.getElementById('maritalChart').getContext('2d');

            new Chart(maritalCtx, {
                type: 'pie',
                data: {
                    labels: ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'],
                    datasets: [{
                        data: [298, 612, 89, 40],
                        backgroundColor: [
                            '#8B5CF6',
                            '#10B981',
                            '#F59E0B',
                            '#EF4444'
                        ],
                        borderWidth: 0,
                        hoverOffset: 8,
                        borderRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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
                            borderColor: '#8B5CF6',
                            borderWidth: 1,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((context.parsed / total) * 100).toFixed(1);
                                    return `${context.label}: ${context.parsed} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });

            // Religion Chart - Modern Doughnut
            const religionCtx = document.getElementById('religionChart').getContext('2d');

            new Chart(religionCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Kepercayaan'],
                    datasets: [{
                        data: [650, 180, 95, 45, 35, 25, 15],
                        backgroundColor: [
                            '#10B981',
                            '#3B82F6',
                            '#8B5CF6',
                            '#F59E0B',
                            '#EF4444',
                            '#06B6D4',
                            '#A855F7'
                        ],
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
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((context.parsed / total) * 100).toFixed(1);
                                    return `${context.label}: ${context.parsed} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });

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

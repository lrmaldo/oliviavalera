<x-layouts.app :title="__('Dashboard - Conexiones WiFi PRI')">
    <!-- Cargar Chart.js y FontAwesome si no están ya incluidos en el layout principal -->
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpush

    @push('styles')
    <style>
        .bg-pri-green {
            background-color: #006847;
        }
        .bg-pri-red {
            background-color: #ce1126;
        }
        .text-pri-green {
            color: #006847;
        }
        .text-pri-red {
            color: #ce1126;
        }
        .border-pri-green {
            border-color: #006847;
        }

        .dashboard-card {
            @apply bg-white dark:bg-neutral-800 rounded-xl shadow-sm overflow-hidden transition-all duration-300;
        }

        .dashboard-card:hover {
            @apply shadow-md;
        }

        .stat-card {
            @apply p-5 flex items-center;
        }

        .stat-icon {
            @apply p-3 rounded-full mr-4 text-white text-xl flex items-center justify-center w-12 h-12;
        }

        .stat-value {
            @apply text-2xl font-bold dark:text-white;
        }

        .stat-label {
            @apply text-gray-500 dark:text-gray-400 text-sm;
        }
    </style>
    @endpush

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Panel de estadísticas principales -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            <div class="dashboard-card stat-card">
                <div class="stat-icon bg-pri-green">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <div class="stat-value">1,234</div>
                    <div class="stat-label">Total registros</div>
                </div>
            </div>

            <div class="dashboard-card stat-card">
                <div class="stat-icon bg-blue-500">
                    <i class="fas fa-wifi"></i>
                </div>
                <div>
                    <div class="stat-value">352</div>
                    <div class="stat-label">Conexiones hoy</div>
                </div>
            </div>

            <div class="dashboard-card stat-card">
                <div class="stat-icon bg-pri-red">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                    <div class="stat-value">27</div>
                    <div class="stat-label">Colonias</div>
                </div>
            </div>

            <div class="dashboard-card stat-card">
                <div class="stat-icon bg-yellow-500">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div>
                    <div class="stat-value">+24%</div>
                    <div class="stat-label">Crecimiento semanal</div>
                </div>
            </div>
        </div>

        <!-- Gráficos de conexiones y distribución -->
        <div class="grid gap-4 md:grid-cols-3">
            <!-- Tendencia de conexiones -->
            <div class="dashboard-card md:col-span-2 p-4">
                <h2 class="font-bold text-lg mb-4 text-gray-800 dark:text-white">Conexiones diarias</h2>
                <div class="h-64">
                    <canvas id="connectionChart"></canvas>
                </div>
            </div>

            <!-- Distribución por localidad -->
            <div class="dashboard-card p-4">
                <h2 class="font-bold text-lg mb-4 text-gray-800 dark:text-white">Localidades</h2>
                <div class="h-64">
                    <canvas id="locationChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Necesidades reportadas y tabla de registros -->
        <div class="grid gap-4 md:grid-cols-3">
            <!-- Necesidades reportadas -->
            <div class="dashboard-card p-4">
                <h2 class="font-bold text-lg mb-4 text-gray-800 dark:text-white">Necesidades reportadas</h2>
                <div class="h-64">
                    <canvas id="needsChart"></canvas>
                </div>
            </div>

            <!-- Últimos registros -->
            <div class="dashboard-card md:col-span-2 p-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-bold text-lg text-gray-800 dark:text-white">Registros recientes</h2>
                    <div class="flex space-x-2">
                        <button class="bg-gray-200 dark:bg-neutral-700 text-gray-600 dark:text-gray-300 p-2 rounded-lg text-sm hover:bg-gray-300 dark:hover:bg-neutral-600">
                            <i class="fas fa-download"></i>
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-50 dark:bg-neutral-800">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Nombre</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Teléfono</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Colonia</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Fecha</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-neutral-800 divide-y divide-gray-200 dark:divide-neutral-700">
                            <tr class="hover:bg-gray-50 dark:hover:bg-neutral-700">
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Juan Pérez</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">229-123-4567</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">Centro</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">hace 10 min</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-neutral-700">
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">María López</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">229-765-4321</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">Loma Alta</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">hace 25 min</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-neutral-700">
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Roberto Sánchez</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">229-111-2233</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">Villa Azueta</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">hace 42 min</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-neutral-700">
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Ana González</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">229-333-4444</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">El Amate</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">hace 1 hora</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-between mt-4">
                    <button class="text-pri-green text-sm hover:underline">Ver todos los registros</button>
                    <div class="text-xs text-gray-500 dark:text-gray-400">
                        Mostrando 4 de 1,234 registros
                    </div>
                </div>
            </div>
        </div>

        <!-- Mapa de calor de conexiones por zona -->
        <div class="dashboard-card p-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-lg text-gray-800 dark:text-white">Distribución geográfica de conexiones</h2>
                <div class="flex space-x-2">
                    <button class="bg-pri-green text-white px-3 py-1 rounded-lg text-sm hover:bg-green-700">
                        Esta semana
                    </button>
                </div>
            </div>
            <div class="h-96 w-full flex items-center justify-center bg-gray-100 dark:bg-neutral-700 rounded-lg">
                <div class="text-center">
                    <i class="fas fa-map-marked-alt text-4xl text-gray-400 dark:text-gray-500 mb-2"></i>
                    <p class="text-gray-500 dark:text-gray-400">Mapa de cobertura de Tierra Blanca, Veracruz</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Datos para gráfica de conexiones
            const connectionData = {
                labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
                datasets: [{
                    label: 'Conexiones',
                    backgroundColor: 'rgba(0, 104, 71, 0.2)',
                    borderColor: 'rgba(0, 104, 71, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(0, 104, 71, 1)',
                    data: [142, 187, 215, 252, 320, 341, 352],
                    tension: 0.3
                }]
            };

            // Gráfica de conexiones
            new Chart(document.getElementById('connectionChart'), {
                type: 'line',
                data: connectionData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Gráfica de necesidades reportadas
            const needsData = {
                labels: ['Agua', 'Alumbrado', 'Drenaje', 'Pavimentación', 'Espacios', 'Salud'],
                datasets: [{
                    label: 'Reportes',
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(206, 17, 38, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(0, 104, 71, 0.6)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(206, 17, 38, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(0, 104, 71, 1)'
                    ],
                    borderWidth: 1,
                    data: [847, 756, 623, 589, 421, 298]
                }]
            };

            new Chart(document.getElementById('needsChart'), {
                type: 'bar',
                data: needsData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Gráfica de distribución por localidad
            const locationData = {
                labels: ['Centro', 'Loma Alta', 'El Amate', 'Villa Azueta', 'Otros'],
                datasets: [{
                    label: 'Usuarios',
                    backgroundColor: [
                        'rgba(0, 104, 71, 0.6)',
                        'rgba(206, 17, 38, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(151, 151, 151, 0.6)'
                    ],
                    borderColor: [
                        'rgba(0, 104, 71, 1)',
                        'rgba(206, 17, 38, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(151, 151, 151, 1)'
                    ],
                    borderWidth: 1,
                    data: [620, 245, 186, 112, 71]
                }]
            };

            new Chart(document.getElementById('locationChart'), {
                type: 'doughnut',
                data: locationData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                boxWidth: 15,
                                padding: 15
                            }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-layouts.app>

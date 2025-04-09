<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Campaña PRI Tierra Blanca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        .border-pri-red {
            border-color: #ce1126;
        }

        .card {
            @apply bg-white rounded-lg shadow-md transition-all duration-300 overflow-hidden;
        }

        .card:hover {
            @apply shadow-lg transform -translate-y-1;
        }

        .stat-card {
            @apply flex items-center p-4;
        }

        .stat-icon {
            @apply p-3 rounded-full mr-4 text-white text-xl;
        }

        .stat-value {
            @apply text-2xl font-bold;
        }

        .stat-label {
            @apply text-gray-500 text-sm;
        }

        /* Animación de carga para gráficas */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 20px, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.5s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Encabezado -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <div class="p-2 rounded-full bg-pri-green mr-3">
                    <img src="https://placehold.co/40x40/006847/FFFFFF?text=PRI" alt="Logo PRI" class="h-8 w-8 rounded-full">
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Dashboard WiFi PRI</h1>
                    <p class="text-sm text-gray-500">Tierra Blanca, Veracruz</p>
                </div>
            </div>
            <div class="flex items-center">
                <span class="mr-2 text-sm text-gray-600">Actualizado: <span id="update-time" class="font-medium"></span></span>
                <button class="bg-pri-green hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                    <i class="fas fa-sync-alt mr-1"></i> Actualizar
                </button>
            </div>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="container mx-auto px-4 py-6">
        <!-- Tarjetas de estadísticas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="card stat-card">
                <div class="stat-icon bg-pri-green">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <div class="stat-value">1,234</div>
                    <div class="stat-label">Total usuarios registrados</div>
                </div>
            </div>

            <div class="card stat-card">
                <div class="stat-icon bg-blue-500">
                    <i class="fas fa-wifi"></i>
                </div>
                <div>
                    <div class="stat-value">352</div>
                    <div class="stat-label">Conexiones hoy</div>
                </div>
            </div>

            <div class="card stat-card">
                <div class="stat-icon bg-pri-red">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                    <div class="stat-value">27</div>
                    <div class="stat-label">Colonias alcanzadas</div>
                </div>
            </div>

            <div class="card stat-card">
                <div class="stat-icon bg-yellow-500">
                    <i class="fas fa-check-square"></i>
                </div>
                <div>
                    <div class="stat-value">78%</div>
                    <div class="stat-label">Reportan mejora en servicios</div>
                </div>
            </div>
        </div>

        <!-- Gráficos -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Gráfico de conexiones por día -->
            <div class="card p-4 animate-fadeInUp" style="animation-delay: 0.1s;">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Conexiones por día <span class="text-sm font-normal text-gray-500">(últimos 7 días)</span></h2>
                <div class="h-80">
                    <canvas id="connectionChart"></canvas>
                </div>
            </div>

            <!-- Gráfico de necesidades reportadas -->
            <div class="card p-4 animate-fadeInUp" style="animation-delay: 0.2s;">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Necesidades reportadas</h2>
                <div class="h-80">
                    <canvas id="needsChart"></canvas>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Gráfico de distribución por localidad -->
            <div class="card p-4 animate-fadeInUp" style="animation-delay: 0.3s;">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Distribución por localidad</h2>
                <div class="h-64">
                    <canvas id="locationChart"></canvas>
                </div>
            </div>

            <!-- Top 5 colonias con más registros -->
            <div class="card p-4 animate-fadeInUp col-span-1 lg:col-span-2" style="animation-delay: 0.4s;">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Top 5 colonias con más registros</h2>
                <div class="overflow-hidden">
                    <div class="h-64 overflow-y-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-50 sticky top-0">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Colonia</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuarios</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preferencia</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Porcentaje</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Centro</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">287</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">Alumbrado público</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            <div class="bg-pri-green h-2.5 rounded-full" style="width: 23%"></div>
                                        </div>
                                        <span class="text-xs font-medium text-gray-700">23%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Loma Alta</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">214</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">Agua Potable</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            <div class="bg-pri-green h-2.5 rounded-full" style="width: 17%"></div>
                                        </div>
                                        <span class="text-xs font-medium text-gray-700">17%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Villa Azueta</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">183</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">Pavimentación</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            <div class="bg-pri-green h-2.5 rounded-full" style="width: 15%"></div>
                                        </div>
                                        <span class="text-xs font-medium text-gray-700">15%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">El Amate</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">156</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">Drenaje</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            <div class="bg-pri-green h-2.5 rounded-full" style="width: 13%"></div>
                                        </div>
                                        <span class="text-xs font-medium text-gray-700">13%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Joachín</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">124</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">Seguridad</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            <div class="bg-pri-green h-2.5 rounded-full" style="width: 10%"></div>
                                        </div>
                                        <span class="text-xs font-medium text-gray-700">10%</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de registros recientes -->
        <div class="card p-4 animate-fadeInUp" style="animation-delay: 0.5s;">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-800">Registros recientes</h2>
                <div class="flex space-x-2">
                    <div class="relative">
                        <input type="text" placeholder="Buscar..." class="border rounded-lg px-3 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-pri-green">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded-lg">
                        <i class="fas fa-filter"></i>
                    </button>
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded-lg">
                        <i class="fas fa-download"></i>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Colonia</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Localidad</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Necesidades</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registro</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Fila de ejemplo, repetir según sea necesario -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Juan García Pérez</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">2291234567</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Centro</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Tierra Blanca</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Alumbrado</span>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Agua</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                30/04/2023 14:32
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-pri-green hover:text-green-800 mx-1"><i class="fas fa-eye"></i></button>
                                <button class="text-blue-600 hover:text-blue-800 mx-1"><i class="fas fa-edit"></i></button>
                                <button class="text-red-600 hover:text-red-800 mx-1"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">María López Torres</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">2297654321</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Loma Alta</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Tierra Blanca</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pavimentación</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                30/04/2023 13:45
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-pri-green hover:text-green-800 mx-1"><i class="fas fa-eye"></i></button>
                                <button class="text-blue-600 hover:text-blue-800 mx-1"><i class="fas fa-edit"></i></button>
                                <button class="text-red-600 hover:text-red-800 mx-1"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Roberto Sánchez Gómez</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">2291112233</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Villa Azueta</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Tierra Blanca</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Drenaje</span>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Salud</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                30/04/2023 12:19
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-pri-green hover:text-green-800 mx-1"><i class="fas fa-eye"></i></button>
                                <button class="text-blue-600 hover:text-blue-800 mx-1"><i class="fas fa-edit"></i></button>
                                <button class="text-red-600 hover:text-red-800 mx-1"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="px-5 py-5 bg-white flex flex-col xs:flex-row items-center xs:justify-between">
                <div class="flex items-center">
                    <button type="button" class="w-full p-2 border text-base rounded-l-xl text-gray-600 bg-white hover:bg-gray-100">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="w-full px-4 py-2 border text-base text-pri-green bg-white hover:bg-gray-100">
                        1
                    </button>
                    <button type="button" class="w-full px-4 py-2 border text-base text-gray-600 bg-white hover:bg-gray-100">
                        2
                    </button>
                    <button type="button" class="w-full px-4 py-2 border text-base text-gray-600 bg-white hover:bg-gray-100">
                        3
                    </button>
                    <button type="button" class="w-full p-2 border text-base rounded-r-xl text-gray-600 bg-white hover:bg-gray-100">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                <div class="text-xs text-gray-500 mt-4 xs:mt-0">
                    Mostrando 1-10 de 50 registros
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white py-4 border-t">
        <div class="container mx-auto px-4 text-center text-sm text-gray-500">
            <div class="flex justify-center items-center mb-2">
                <img src="{{asset('/img/Sattlink-logo-nuevo.png')}}" alt="Sattlink" class="h-6 mr-2">
                <p>Desarrollado con <i class="fas fa-heart text-red-500"></i> por Sattlink</p>
            </div>
            <p>© 2024 Campaña PRI Tierra Blanca, Veracruz. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
        // Configurar fecha de actualización
        document.getElementById('update-time').textContent = new Date().toLocaleString('es-MX');

        // Gráfica de conexiones por día
        const connectionData = {
            labels: ['24 Abril', '25 Abril', '26 Abril', '27 Abril', '28 Abril', '29 Abril', '30 Abril'],
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
            labels: ['Agua Potable', 'Alumbrado público', 'Drenaje', 'Pavimentación', 'Espacios recreativos', 'Seguridad', 'Salud'],
            datasets: [{
                label: 'Reportes',
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(206, 17, 38, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(0, 104, 71, 0.6)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(206, 17, 38, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 104, 71, 1)'
                ],
                borderWidth: 1,
                data: [847, 756, 623, 589, 421, 345, 298]
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
            labels: ['Tierra Blanca', 'Joachín', 'El Amate', 'Villa Azueta', 'Otros'],
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
    </script>
</body>
</html>

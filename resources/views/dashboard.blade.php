<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Panel de Administración - Campaña Olivia Valera">
    <title>Dashboard - Campaña Olivia Valera</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Chart.js para gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'pri-red': '#CE1126',
                        'pri-green': '#006847',
                        'pri-gold': '#D4AF37',
                    },
                    fontFamily: {
                        'montserrat': ['Montserrat', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-card {
            overflow: hidden;
            position: relative;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            height: 4px;
            width: 100%;
            background: linear-gradient(90deg, #CE1126, #006847);
            transition: all 0.3s ease;
            opacity: 0;
        }

        .stat-card:hover::after {
            opacity: 1;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }

        .animate-pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Scrollbar personalizado */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #CE1126;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #006847;
        }
    </style>
</head>
<body class="antialiased bg-gray-50 flex flex-col min-h-screen">
    <!-- Header/Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3">
                <div class="flex items-center">
                    <div class="h-10 w-10 bg-pri-green rounded-full flex items-center justify-center mr-2">
                        <span class="text-white font-bold text-xs">PRI</span>
                    </div>
                    <div>
                        <span class="font-bold text-pri-red text-lg">Olivia Valera</span>
                        <span class="text-gray-600 text-sm ml-2">| Panel Admin</span>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="{{ url('/') }}" class="text-gray-500 hover:text-pri-red flex items-center px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        <i class="fas fa-globe mr-2"></i> Ver sitio
                    </a>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center text-gray-500 hover:text-pri-red px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-user-circle mr-2 text-lg"></i>
                            <span class="hidden sm:inline">Administrador</span>
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md hidden md:block overflow-y-auto">
            <div class="p-4 space-y-6">
                <div class="px-4 py-2.5 bg-pri-red/10 text-pri-red rounded-lg">
                    <span class="font-medium flex items-center">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </span>
                </div>

                <nav class="space-y-1">
                    <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-pri-red rounded-lg transition-colors">
                        <i class="fas fa-users mr-3 text-gray-400"></i> Usuarios
                    </a>
                    <a href="{{ route('formularios.index') }}" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-pri-red rounded-lg transition-colors">
                        <i class="fas fa-file-alt mr-3 text-gray-400"></i> Formularios
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-pri-red rounded-lg transition-colors">
                        <i class="fas fa-map-marker-alt mr-3 text-gray-400"></i> Colonias
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-pri-red rounded-lg transition-colors">
                        <i class="fas fa-city mr-3 text-gray-400"></i> Localidades
                    </a>
                    <a href="{{ route('carrusel.index') }}" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-pri-red rounded-lg transition-colors">
                        <i class="fas fa-images mr-3 text-gray-400"></i> Carrusel
                    </a>
                </nav>

                <div class="pt-6">
                    <div class="px-4 py-3 bg-gray-50 rounded-lg">
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Ayuda y soporte</h3>
                        <div class="mt-3 space-y-2">
                            <a href="#" class="flex items-center text-sm text-gray-600 hover:text-pri-red transition-colors">
                                <i class="fas fa-question-circle mr-2"></i> Centro de ayuda
                            </a>
                            <a href="#" class="flex items-center text-sm text-gray-600 hover:text-pri-red transition-colors">
                                <i class="fas fa-cog mr-2"></i> Configuración
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Contenido principal -->
        <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto">
            <div class="max-w-7xl mx-auto">
                <!-- Cabecera y fecha -->
                <div class="mb-8 md:flex md:items-center md:justify-between">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Panel de Control</h1>
                        <p class="mt-1 text-sm text-gray-500">{{ now()->format('l, d \d\e F Y') }}</p>
                    </div>
                    <div class="mt-4 md:mt-0 flex space-x-3">
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pri-red">
                            <i class="fas fa-sync-alt -ml-1 mr-2 text-gray-500"></i>
                            Actualizar
                        </button>
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pri-red">
                            <i class="fas fa-download -ml-1 mr-2 text-gray-500"></i>
                            Exportar datos
                        </button>
                    </div>
                </div>

                <!-- Estadísticas rápidas -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <!-- Tarjeta Formularios -->
                    <div class="bg-white rounded-xl shadow-sm p-6 stat-card card-hover">
                        <div class="flex items-start justify-between">
                            <div>
                                <h2 class="text-sm font-medium text-gray-500">Total Formularios</h2>
                                <div class="mt-2 flex items-baseline">
                                    <p class="text-3xl font-semibold text-gray-900">{{ number_format($totalFormularios) }}</p>
                                    @if($formulariosHoy > 0)
                                        <span class="ml-2 text-xs font-medium text-green-600 px-2 py-0.5 rounded-full bg-green-100">
                                            +{{ $formulariosHoy }} hoy
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="p-3 bg-pri-red/10 rounded-full text-pri-red">
                                <i class="fas fa-file-alt text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-xs text-gray-500 inline-flex items-center">
                                <i class="fas fa-chart-line mr-1 text-pri-green"></i>
                                {{ $formulariosSemana }} esta semana
                            </span>
                        </div>
                    </div>

                    <!-- Tarjeta Colonias -->
                    <div class="bg-white rounded-xl shadow-sm p-6 stat-card card-hover">
                        <div class="flex items-start justify-between">
                            <div>
                                <h2 class="text-sm font-medium text-gray-500">Colonias Registradas</h2>
                                <div class="mt-2">
                                    <p class="text-3xl font-semibold text-gray-900">{{ number_format($totalColonias) }}</p>
                                </div>
                            </div>
                            <div class="p-3 bg-pri-green/10 rounded-full text-pri-green">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-xs text-gray-500">
                                @if(count($coloniasPopulares) > 0)
                                    <span class="font-medium">{{ $coloniasPopulares[0]->colonia }}</span> es la más mencionada
                                @else
                                    No hay datos de colonias populares
                                @endif
                            </span>
                        </div>
                    </div>

                    <!-- Tarjeta Localidades -->
                    <div class="bg-white rounded-xl shadow-sm p-6 stat-card card-hover">
                        <div class="flex items-start justify-between">
                            <div>
                                <h2 class="text-sm font-medium text-gray-500">Localidades Registradas</h2>
                                <div class="mt-2">
                                    <p class="text-3xl font-semibold text-gray-900">{{ number_format($totalLocalidades) }}</p>
                                </div>
                            </div>
                            <div class="p-3 bg-pri-gold/10 rounded-full text-pri-gold">
                                <i class="fas fa-city text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-xs text-gray-500">
                                @if(count($localidadesPopulares) > 0)
                                    <span class="font-medium">{{ $localidadesPopulares[0]->localidad }}</span> es la más mencionada
                                @else
                                    No hay datos de localidades populares
                                @endif
                            </span>
                        </div>
                    </div>

                    <!-- Tarjeta Carrusel -->
                    <div class="bg-white rounded-xl shadow-sm p-6 stat-card card-hover">
                        <div class="flex items-start justify-between">
                            <div>
                                <h2 class="text-sm font-medium text-gray-500">Contenidos de Carrusel</h2>
                                <div class="mt-2">
                                    <p class="text-3xl font-semibold text-gray-900">{{ number_format($totalContenidos) }}</p>
                                </div>
                            </div>
                            <div class="p-3 bg-indigo-100 rounded-full text-indigo-600">
                                <i class="fas fa-images text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                @php $porcentajeActivos = $totalContenidos > 0 ? ($contenidosActivos / $totalContenidos) * 100 : 0; @endphp
                                <div class="bg-indigo-600 h-2.5 rounded-full" style="width: {{ $porcentajeActivos }}%"></div>
                            </div>
                            <div class="mt-1.5 flex justify-between text-xs text-gray-500">
                                <span>{{ $contenidosActivos }} activos</span>
                                <span>{{ $totalContenidos - $contenidosActivos }} inactivos</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Necesidades Comunes -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-lightbulb text-pri-gold mr-2"></i>
                        Necesidades más Comunes
                    </h2>
                    <div class="bg-white shadow-sm rounded-xl p-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                            @forelse($necesidadesComunes as $necesidad => $total)
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-100 text-center hover:border-pri-red/30 transition-colors">
                                    <div class="inline-flex items-center justify-center w-8 h-8 bg-pri-red text-white rounded-full mb-3">
                                        <span class="font-bold">{{ $loop->iteration }}</span>
                                    </div>
                                    <div class="text-xl font-bold text-gray-800 mb-1">{{ $total }}</div>
                                    <div class="text-sm text-gray-600">{{ $necesidad }}</div>
                                </div>
                            @empty
                                <div class="col-span-full flex justify-center py-6 text-gray-500">
                                    <div class="text-center">
                                        <i class="fas fa-exclamation-circle text-4xl mb-2 text-gray-300"></i>
                                        <p>No hay datos de necesidades disponibles</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Gráfico de Necesidades -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-chart-bar text-pri-red mr-2"></i>
                        Visualización de Necesidades
                    </h2>
                    <div class="bg-white shadow-sm rounded-xl p-6">
                        <div style="height: 300px;">
                            <canvas id="necesidadesChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Secciones de Colonias/Localidades y Tipos de Contenido -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <!-- Colonias Populares -->
                    <div class="bg-white shadow-sm rounded-xl overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center">
                            <h3 class="text-lg font-medium text-gray-900 flex items-center">
                                <i class="fas fa-map-marker-alt text-pri-red mr-2"></i>
                                Colonias más mencionadas
                            </h3>
                            <a href="#" class="text-pri-red hover:text-pri-red/80 text-sm font-medium">
                                Ver todas <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="p-6">
                            @if(count($coloniasPopulares) > 0)
                                <ul class="divide-y divide-gray-100">
                                    @foreach($coloniasPopulares as $colonia)
                                        <li class="py-3 flex justify-between items-center">
                                            <span class="text-sm font-medium text-gray-800">{{ $colonia->colonia }}</span>
                                            <span class="bg-pri-red/10 text-pri-red text-xs font-semibold px-2.5 py-1 rounded-full">
                                                {{ $colonia->total }} menciones
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="py-6 text-center text-gray-500">
                                    <i class="fas fa-map-marked-alt text-3xl mb-2 text-gray-300"></i>
                                    <p>No hay datos de colonias disponibles</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Localidades Populares -->
                    <div class="bg-white shadow-sm rounded-xl overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center">
                            <h3 class="text-lg font-medium text-gray-900 flex items-center">
                                <i class="fas fa-city text-pri-gold mr-2"></i>
                                Localidades más mencionadas
                            </h3>
                            <a href="#" class="text-pri-gold hover:text-pri-gold/80 text-sm font-medium">
                                Ver todas <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="p-6">
                            @if(count($localidadesPopulares) > 0)
                                <ul class="divide-y divide-gray-100">
                                    @foreach($localidadesPopulares as $localidad)
                                        <li class="py-3 flex justify-between items-center">
                                            <span class="text-sm font-medium text-gray-800">{{ $localidad->localidad }}</span>
                                            <span class="bg-pri-gold/10 text-pri-gold text-xs font-semibold px-2.5 py-1 rounded-full">
                                                {{ $localidad->total }} menciones
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="py-6 text-center text-gray-500">
                                    <i class="fas fa-building text-3xl mb-2 text-gray-300"></i>
                                    <p>No hay datos de localidades disponibles</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Distribución de contenido del carrusel -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-photo-video text-indigo-600 mr-2"></i>
                        Distribución de Contenido en Carrusel
                    </h2>
                    <div class="bg-white shadow-sm rounded-xl p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Gráfico de distribución por tipo -->
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-4">Distribución por tipo</h4>
                                <div style="height: 200px;">
                                    <canvas id="tiposCarruselChart"></canvas>
                                </div>
                            </div>

                            <!-- Estado de contenidos -->
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-4">Estado de contenidos</h4>
                                <div class="flex justify-around items-center h-full">
                                    <div class="text-center">
                                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-100 text-green-600 mb-3">
                                            <i class="fas fa-check text-xl"></i>
                                        </div>
                                        <p class="text-3xl font-bold text-gray-800">{{ $contenidosActivos }}</p>
                                        <p class="text-sm text-gray-500">Activos</p>
                                    </div>
                                    <div class="text-center">
                                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-red-100 text-red-600 mb-3">
                                            <i class="fas fa-times text-xl"></i>
                                        </div>
                                        <p class="text-3xl font-bold text-gray-800">{{ $totalContenidos - $contenidosActivos }}</p>
                                        <p class="text-sm text-gray-500">Inactivos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabla de Formularios Recientes -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-clipboard-list text-pri-green mr-2"></i>
                        Formularios Recientes
                    </h2>
                    <div class="bg-white shadow-sm rounded-xl overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Colonia</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Localidad</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Necesidades</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @php
                                        $formularios = App\Models\Formulario::latest()->take(5)->get();
                                    @endphp

                                    @forelse($formularios as $formulario)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $formulario->nombre }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $formulario->telefono }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $formulario->colonia }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $formulario->localidad }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                @if(is_array($formulario->necesidades))
                                                    <div class="flex flex-wrap gap-1">
                                                        @foreach(array_slice($formulario->necesidades, 0, 2) as $necesidad)
                                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                                {{ $necesidad }}
                                                            </span>
                                                        @endforeach
                                                        @if(count($formulario->necesidades) > 2)
                                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                                +{{ count($formulario->necesidades) - 2 }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                @else
                                                    No especificado
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $formulario->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                                No hay formularios registrados
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="bg-gray-50 px-6 py-3 flex justify-between items-center">
                            <span class="text-sm text-gray-700">
                                Mostrando últimos 5 formularios de {{ $totalFormularios }}
                            </span>
                            <a href="{{ route('formularios.index') }}" class="text-pri-red hover:text-pri-red/80 text-sm font-medium">
                                Ver todos los formularios <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex justify-center md:order-2 space-x-6">
                    <a href="#" class="text-gray-400 hover:text-pri-red">
                        <i class="fab fa-facebook text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-pri-red">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-pri-red">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                </div>
                <div class="mt-4 md:mt-0 md:order-1 text-center md:text-left">
                    <p class="text-sm text-gray-500">
                        &copy; {{ date('Y') }} Campaña Olivia Valera. Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Botón móvil para mostrar el sidebar -->
    <div class="fixed bottom-4 right-4 md:hidden">
        <button id="show-sidebar-button" class="bg-pri-red text-white rounded-full p-3 shadow-lg hover:bg-pri-red/90 transition-colors">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Scripts -->
    <script>
        // Gráfico de Necesidades
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener datos para el gráfico de necesidades
            const necesidadesLabels = [];
            const necesidadesData = [];

            @foreach($necesidadesComunes as $necesidad => $total)
                necesidadesLabels.push('{{ $necesidad }}');
                necesidadesData.push({{ $total }});
            @endforeach

            const necesidadesChart = new Chart(
                document.getElementById('necesidadesChart'),
                {
                    type: 'bar',
                    data: {
                        labels: necesidadesLabels,
                        datasets: [{
                            label: 'Número de menciones',
                            data: necesidadesData,
                            backgroundColor: [
                                'rgba(206, 17, 38, 0.7)',
                                'rgba(0, 104, 71, 0.7)',
                                'rgba(212, 175, 55, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(153, 102, 255, 0.7)',
                            ],
                            borderColor: [
                                'rgba(206, 17, 38, 1)',
                                'rgba(0, 104, 71, 1)',
                                'rgba(212, 175, 55, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(153, 102, 255, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                }
            );

            // Gráfico de tipos de carrusel
            const tiposLabels = [];
            const tiposData = [];

            @foreach($tiposContenido as $tipo => $total)
                tiposLabels.push('{{ $tipo }}');
                tiposData.push({{ $total }});
            @endforeach

            const tiposColores = {
                'imagen': ['rgba(0, 104, 71, 0.7)', 'rgba(0, 104, 71, 1)'],
                'video': ['rgba(206, 17, 38, 0.7)', 'rgba(206, 17, 38, 1)'],
                'otro': ['rgba(153, 102, 255, 0.7)', 'rgba(153, 102, 255, 1)']
            };

            const colorFondos = [];
            const colorBordes = [];

            tiposLabels.forEach(tipo => {
                const colores = tiposColores[tipo] || tiposColores['otro'];
                colorFondos.push(colores[0]);
                colorBordes.push(colores[1]);
            });

            const tiposChart = new Chart(
                document.getElementById('tiposCarruselChart'),
                {
                    type: 'doughnut',
                    data: {
                        labels: tiposLabels,
                        datasets: [{
                            data: tiposData,
                            backgroundColor: colorFondos,
                            borderColor: colorBordes,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                    }
                }
            );

            // Toggle para sidebar en móvil
            const sidebarButton = document.getElementById('show-sidebar-button');
            const sidebar = document.querySelector('aside');

            if (sidebarButton) {
                sidebarButton.addEventListener('click', function() {
                    sidebar.classList.toggle('hidden');
                    sidebar.classList.toggle('fixed');
                    sidebar.classList.toggle('inset-0');
                    sidebar.classList.toggle('z-50');

                    if (!sidebar.classList.contains('hidden')) {
                        // Si el sidebar está visible, agregar clase para cerrarlo al hacer clic fuera
                        document.addEventListener('click', function closeSidebar(e) {
                            if (!sidebar.contains(e.target) && e.target !== sidebarButton) {
                                sidebar.classList.add('hidden');
                                sidebar.classList.remove('fixed', 'inset-0', 'z-50');
                                document.removeEventListener('click', closeSidebar);
                            }
                        });
                    }
                });
            }
        });
    </script>
</body>
</html>

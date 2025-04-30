<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Panel de Administración - Campaña Olivia Valera">
    <title>Formularios - Campaña Olivia Valera</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

    <!-- Livewire Styles -->
    @livewireStyles

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
                    <a href="{{ url('/dashboard') }}" class="text-gray-500 hover:text-pri-red flex items-center px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                    <a href="{{ url('/') }}" class="text-gray-500 hover:text-pri-red flex items-center px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        <i class="fas fa-globe mr-2"></i> Ver sitio
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md hidden md:block overflow-y-auto">
            <div class="p-4 space-y-6">
                <a href="{{ url('/dashboard') }}" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-pri-red rounded-lg transition-colors">
                    <i class="fas fa-tachometer-alt mr-3 text-gray-400"></i> Dashboard
                </a>

                <div class="px-4 py-2.5 bg-pri-red/10 text-pri-red rounded-lg">
                    <span class="font-medium flex items-center">
                        <i class="fas fa-file-alt mr-2"></i> Formularios
                    </span>
                </div>

                <nav class="space-y-1">
                    <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-pri-red rounded-lg transition-colors">
                        <i class="fas fa-users mr-3 text-gray-400"></i> Usuarios
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-pri-red rounded-lg transition-colors">
                        <i class="fas fa-map-marker-alt mr-3 text-gray-400"></i> Colonias
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-pri-red rounded-lg transition-colors">
                        <i class="fas fa-city mr-3 text-gray-400"></i> Localidades
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-pri-red rounded-lg transition-colors">
                        <i class="fas fa-images mr-3 text-gray-400"></i> Carrusel
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Contenido principal -->
        <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto">
            <div class="max-w-7xl mx-auto">
                <!-- Cabecera y fecha -->
                <div class="mb-8 md:flex md:items-center md:justify-between">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Gestión de Formularios</h1>
                        <p class="mt-1 text-sm text-gray-500">{{ now()->format('l, d \d\e F Y') }}</p>
                    </div>
                    <div class="mt-4 md:mt-0 flex space-x-3">
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pri-red">
                            <i class="fas fa-download -ml-1 mr-2 text-gray-500"></i>
                            Exportar datos
                        </button>
                    </div>
                </div>

                <!-- Componente Livewire -->
                @livewire('formulario-table')
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

    <!-- Livewire Scripts -->
    @livewireScripts

    <script>
        // Toggle para sidebar en móvil
        document.addEventListener('DOMContentLoaded', function() {
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

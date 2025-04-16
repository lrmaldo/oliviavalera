<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Olivia Valera - Candidata del PRI a la Presidencia Municipal de Tierra Blanca, Veracruz 2025">

        <title>Olivia Valera - PRI Tierra Blanca 2025</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Iconos -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- AOS CSS para animaciones -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
                scroll-behavior: smooth;
            }

            .hero-pattern {
                background-color: #ffffff;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23CE1126' fill-opacity='0.05'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            }

            .text-shadow {
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            }

            .mexico-flag-gradient {
                background: linear-gradient(90deg, #CE1126 33.3%, white 33.3%, white 66.6%, #006847 66.6%);
            }

            @keyframes float {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
                100% { transform: translateY(0px); }
            }

            .float-animation {
                animation: float 3s ease-in-out infinite;
            }

            .counting-number {
                transition: all 0.5s ease;
            }

            .parallax {
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            /* Estilo para la barra de créditos flotante */
            .credits-bar {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                background: rgba(255, 255, 255, 0.95);
                box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
                z-index: 40;
                transition: all 0.3s ease;
            }

            .credits-bar:hover {
                background: rgba(255, 255, 255, 1);
            }

            .sattlink-logo-container {
                transition: transform 0.3s ease;
            }

            .credits-bar:hover .sattlink-logo-container {
                transform: scale(1.05);
            }

            @media (max-width: 768px) {
                #back-to-top {
                    bottom: 70px;
                }
            }

            /* Mejoras de responsividad para prevenir scroll horizontal */
            .container {
                max-width: 100%;
                overflow-x: hidden;
            }

            img {
                max-width: 100%;
                height: auto;
            }

            @media (max-width: 640px) {
                .container {
                    padding-left: 0.75rem;
                    padding-right: 0.75rem;
                }
            }
        </style>
    </head>
    <body class="antialiased hero-pattern">
        <!-- Barra de navegación -->
        <nav class="bg-white shadow-md fixed w-full z-50 transition-all duration-300" id="navbar">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <!-- Logo del PRI -->
                            <div class="h-10 w-10 bg-pri-green rounded-full flex items-center justify-center mr-2">
                                <span class="text-white font-bold text-xs">PRI</span>
                            </div>
                            <span class="text-pri-red font-bold text-lg">Olivia Valera</span>
                        </div>
                    </div>

                    <!-- Menú navegación escritorio -->
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-center space-x-4">
                            <a href="#inicio" class="text-gray-800 hover:text-pri-red px-3 py-2 rounded-md text-sm font-medium transition-all">Inicio</a>
                            <a href="#candidata" class="text-gray-800 hover:text-pri-red px-3 py-2 rounded-md text-sm font-medium transition-all">Candidata</a>
                            <a href="{{ url('/planilla') }}" class="text-gray-800 hover:text-pri-red px-3 py-2 rounded-md text-sm font-medium transition-all">Planilla</a>
                            <a href="#propuestas" class="text-gray-800 hover:text-pri-red px-3 py-2 rounded-md text-sm font-medium transition-all">Propuestas</a>
                            <a href="#galeria" class="text-gray-800 hover:text-pri-red px-3 py-2 rounded-md text-sm font-medium transition-all">Galería</a>
                            <a href="#contacto" class="text-gray-800 hover:text-pri-red px-3 py-2 rounded-md text-sm font-medium transition-all">Contacto</a>
                            <a href="#" class="bg-pri-green hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-all">¡Únete!</a>
                        </div>
                    </div>

                    <!-- Botón menú móvil -->
                    <div class="md:hidden">
                        <button type="button" class="text-gray-800 hover:text-pri-red" id="mobile-menu-button">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Menú móvil -->
            <div class="hidden md:hidden bg-white border-t border-gray-200" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="#inicio" class="text-gray-800 hover:text-pri-red block px-3 py-2 rounded-md text-base font-medium">Inicio</a>
                    <a href="#candidata" class="text-gray-800 hover:text-pri-red block px-3 py-2 rounded-md text-base font-medium">Candidata</a>
                    <a href="{{ url('/planilla') }}" class="text-gray-800 hover:text-pri-red block px-3 py-2 rounded-md text-base font-medium">Planilla</a>
                    <a href="#propuestas" class="text-gray-800 hover:text-pri-red block px-3 py-2 rounded-md text-base font-medium">Propuestas</a>
                    <a href="#galeria" class="text-gray-800 hover:text-pri-red block px-3 py-2 rounded-md text-base font-medium">Galería</a>
                    <a href="#contacto" class="text-gray-800 hover:text-pri-red block px-3 py-2 rounded-md text-base font-medium">Contacto</a>
                    <a href="#" class="bg-pri-green hover:bg-green-700 text-white block px-3 py-2 rounded-md text-base font-medium mt-2">¡Únete!</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="inicio" class="relative pt-24 md:pt-32 pb-20 md:pb-32 bg-gradient-to-br from-white to-gray-100">
            <!-- Franja tricolor superior -->
            <div class="absolute top-0 left-0 right-0 h-2 mexico-flag-gradient"></div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 mb-10 md:mb-0" data-aos="fade-right" data-aos-duration="1000">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-pri-red leading-tight mb-4">
                            Olivia Valera
                        </h1>
                        <h2 class="text-2xl md:text-3xl font-semibold text-pri-green mb-6">
                            Candidata a Presidenta Municipal
                        </h2>
                        <p class="text-xl text-gray-700 mb-8">
                            <span class="font-bold">Tierra Blanca, Veracruz 2025</span>
                        </p>
                        <p class="text-lg text-gray-600 mb-8 max-w-lg">
                            Juntos construiremos un mejor futuro para nuestro municipio, con trabajo, honestidad y compromiso.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#propuestas" class="bg-pri-red hover:bg-red-800 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105">
                                Conoce mis propuestas
                            </a>
                            <a href="#contacto" class="border-2 border-pri-red text-pri-red hover:bg-pri-red hover:text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105">
                                Contáctame
                            </a>
                        </div>
                    </div>
                    <div class="md:w-1/2 flex justify-center" data-aos="fade-left" data-aos-duration="1000">
                        <div class="relative">
                            <!-- Imagen candidata (placeholder) -->
                            <div class="w-64 h-64 md:w-80 md:h-80 bg-pri-red rounded-full overflow-hidden border-4 border-white shadow-xl float-animation">
                                <img src="https://placehold.co/400x400/CE1126/FFFFFF?text=Olivia+Valera" alt="Olivia Valera" class="w-full h-full object-cover">
                            </div>
                            <!-- Emblema PRI -->
                            <div class="absolute -bottom-4 -right-4 bg-white rounded-full p-2 shadow-lg">
                                <div class="w-16 h-16 bg-pri-green rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold">PRI</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contador estadísticas -->
        <section class="py-16 bg-pri-red text-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="text-center" data-aos="zoom-in" data-aos-delay="100">
                        <div class="text-4xl font-bold mb-2 counting-number" data-count="120">0</div>
                        <p class="text-lg">Colonias visitadas</p>
                    </div>
                    <div class="text-center" data-aos="zoom-in" data-aos-delay="200">
                        <div class="text-4xl font-bold mb-2 counting-number" data-count="5000">0</div>
                        <p class="text-lg">Ciudadanos escuchados</p>
                    </div>
                    <div class="text-center" data-aos="zoom-in" data-aos-delay="300">
                        <div class="text-4xl font-bold mb-2 counting-number" data-count="42">0</div>
                        <p class="text-lg">Proyectos para el municipio</p>
                    </div>
                    <div class="text-center" data-aos="zoom-in" data-aos-delay="400">
                        <div class="text-4xl font-bold mb-2 counting-number" data-count="15">0</div>
                        <p class="text-lg">Años de experiencia</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección Candidata -->
        <section id="candidata" class="py-20 bg-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-pri-red mb-4" data-aos="fade-up">Conoce a Olivia Valera</h2>
                    <div class="w-20 h-1 bg-pri-green mx-auto"></div>
                </div>

                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-2/5 mb-10 md:mb-0" data-aos="fade-right">
                        <div class="relative">
                            <img src="https://placehold.co/600x800/CE1126/FFFFFF?text=Olivia+Valera" alt="Olivia Valera" class="w-full rounded-lg shadow-xl">
                            <div class="absolute inset-0 border-4 border-pri-gold rounded-lg transform translate-x-4 translate-y-4 -z-10"></div>
                        </div>
                    </div>
                    <div class="md:w-3/5 md:pl-16" data-aos="fade-left">
                        <h3 class="text-2xl font-semibold mb-6 text-pri-green">Comprometida con Tierra Blanca</h3>
                        <p class="text-gray-700 mb-6 leading-relaxed">
                            Con una sólida trayectoria de servicio público y compromiso con nuestra comunidad, Olivia Valera ha dedicado su vida a trabajar por las familias de Tierra Blanca.
                        </p>
                        <p class="text-gray-700 mb-6 leading-relaxed">
                            Nacida y criada en nuestro municipio, conoce de primera mano las necesidades y desafíos que enfrentamos. Su formación académica y experiencia profesional la han preparado para liderar la transformación que Tierra Blanca necesita.
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-3">
                                    <div class="bg-pri-red rounded-full p-2">
                                        <i class="fas fa-graduation-cap text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Formación Académica</h4>
                                    <p class="text-gray-600 text-sm">Licenciada en Administración Pública</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-3">
                                    <div class="bg-pri-red rounded-full p-2">
                                        <i class="fas fa-briefcase text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Experiencia</h4>
                                    <p class="text-gray-600 text-sm">15 años en servicio público</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-3">
                                    <div class="bg-pri-red rounded-full p-2">
                                        <i class="fas fa-award text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Reconocimientos</h4>
                                    <p class="text-gray-600 text-sm">Premio al Mérito Ciudadano 2023</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-3">
                                    <div class="bg-pri-red rounded-full p-2">
                                        <i class="fas fa-heart text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Valores</h4>
                                    <p class="text-gray-600 text-sm">Honestidad, Trabajo y Compromiso</p>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="inline-block bg-pri-green hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105">
                            Conoce más sobre mi trayectoria
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Banner Frase -->
        <section class="relative py-24 bg-fixed bg-center bg-cover parallax" style="background-image: url('https://placehold.co/1920x600/CE1126/FFFFFF?text=Tierra+Blanca')">
            <div class="absolute inset-0 bg-pri-red bg-opacity-80"></div>
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="max-w-3xl mx-auto text-center text-white" data-aos="zoom-in">
                    <i class="fas fa-quote-left text-4xl mb-6 text-pri-gold opacity-50"></i>
                    <h2 class="text-3xl md:text-4xl font-bold mb-8 text-shadow">
                        "Juntos transformaremos Tierra Blanca en el municipio que todos merecemos"
                    </h2>
                    <p class="text-xl font-semibold mb-2">Olivia Valera</p>
                    <p class="text-lg">Candidata a Presidenta Municipal</p>
                </div>
            </div>
        </section>

        <!-- Sección Propuestas -->
        <section id="propuestas" class="py-20 bg-gray-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-pri-red mb-4" data-aos="fade-up">Mis Propuestas</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                        Compromisos claros para transformar nuestro municipio y mejorar la calidad de vida de todos los ciudadanos.
                    </p>
                    <div class="w-20 h-1 bg-pri-green mx-auto mt-4"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Propuesta 1 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform hover:transform hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                        <div class="h-2 bg-pri-red"></div>
                        <div class="p-6">
                            <div class="bg-pri-red rounded-full w-14 h-14 flex items-center justify-center mb-4 mx-auto">
                                <i class="fas fa-shield-alt text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-center text-pri-red">Seguridad Ciudadana</h3>
                            <p class="text-gray-600 text-center mb-4">
                                Implementaremos un sistema integral de seguridad con tecnología de punta y mayor capacitación policial.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Modernización del cuerpo policial</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Sistema de videovigilancia municipal</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Programa de prevención del delito</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Propuesta 2 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform hover:transform hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                        <div class="h-2 bg-pri-red"></div>
                        <div class="p-6">
                            <div class="bg-pri-red rounded-full w-14 h-14 flex items-center justify-center mb-4 mx-auto">
                                <i class="fas fa-briefcase-medical text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-center text-pri-red">Salud y Bienestar</h3>
                            <p class="text-gray-600 text-center mb-4">
                                Mejoraremos la infraestructura y servicios de salud para garantizar atención médica de calidad.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Rehabilitación de centros de salud</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Brigadas médicas en zonas rurales</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Programa municipal de salud preventiva</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Propuesta 3 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform hover:transform hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                        <div class="h-2 bg-pri-red"></div>
                        <div class="p-6">
                            <div class="bg-pri-red rounded-full w-14 h-14 flex items-center justify-center mb-4 mx-auto">
                                <i class="fas fa-graduation-cap text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-center text-pri-red">Educación</h3>
                            <p class="text-gray-600 text-center mb-4">
                                Impulsaremos la calidad educativa con mejores escuelas y oportunidades para nuestros jóvenes.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Rehabilitación de escuelas públicas</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Becas municipales de excelencia</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Programa de apoyo tecnológico escolar</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Propuesta 4 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform hover:transform hover:scale-105" data-aos="fade-up" data-aos-delay="400">
                        <div class="h-2 bg-pri-red"></div>
                        <div class="p-6">
                            <div class="bg-pri-red rounded-full w-14 h-14 flex items-center justify-center mb-4 mx-auto">
                                <i class="fas fa-road text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-center text-pri-red">Infraestructura</h3>
                            <p class="text-gray-600 text-center mb-4">
                                Desarrollaremos obras públicas que mejoren la movilidad y los servicios básicos del municipio.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Pavimentación de calles y avenidas</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Mejora del sistema de agua potable</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Renovación del alumbrado público</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Propuesta 5 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform hover:transform hover:scale-105" data-aos="fade-up" data-aos-delay="500">
                        <div class="h-2 bg-pri-red"></div>
                        <div class="p-6">
                            <div class="bg-pri-red rounded-full w-14 h-14 flex items-center justify-center mb-4 mx-auto">
                                <i class="fas fa-coins text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-center text-pri-red">Economía Local</h3>
                            <p class="text-gray-600 text-center mb-4">
                                Apoyaremos a emprendedores y comerciantes locales para fortalecer la economía de Tierra Blanca.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Incubadora municipal de negocios</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Feria del empleo trimestral</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Modernización de mercados municipales</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Propuesta 6 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform hover:transform hover:scale-105" data-aos="fade-up" data-aos-delay="600">
                        <div class="h-2 bg-pri-red"></div>
                        <div class="p-6">
                            <div class="bg-pri-red rounded-full w-14 h-14 flex items-center justify-center mb-4 mx-auto">
                                <i class="fas fa-leaf text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-center text-pri-red">Medio Ambiente</h3>
                            <p class="text-gray-600 text-center mb-4">
                                Crearemos políticas sustentables para preservar y mejorar nuestros recursos naturales.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Programa de reforestación municipal</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Mejora del sistema de recolección de basura</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-pri-green mt-1 mr-2"></i>
                                    <span class="text-gray-700">Creación de parques ecológicos</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <a href="#" class="inline-block bg-pri-green hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105" data-aos="zoom-in">
                        Descarga mi Plan Completo
                    </a>
                </div>
            </div>
        </section>

        <!-- Galería -->
        <section id="galeria" class="py-20 bg-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-pri-red mb-4" data-aos="fade-up">En Acción por Tierra Blanca</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                        Recorriendo cada rincón de nuestro municipio, escuchando y trabajando por ti.
                    </p>
                    <div class="w-20 h-1 bg-pri-green mx-auto mt-4"></div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Imágenes (placeholders) -->
                    <div class="overflow-hidden rounded-lg shadow-lg" data-aos="zoom-in" data-aos-delay="100">
                        <img src="https://placehold.co/600x400/CE1126/FFFFFF?text=Recorrido" alt="Recorrido" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-lg" data-aos="zoom-in" data-aos-delay="200">
                        <img src="https://placehold.co/600x400/CE1126/FFFFFF?text=Reunión" alt="Reunión" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-lg" data-aos="zoom-in" data-aos-delay="300">
                        <img src="https://placehold.co/600x400/CE1126/FFFFFF?text=Evento" alt="Evento" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-lg" data-aos="zoom-in" data-aos-delay="400">
                        <img src="https://placehold.co/600x400/CE1126/FFFFFF?text=Colonia" alt="Colonia" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-lg" data-aos="zoom-in" data-aos-delay="500">
                        <img src="https://placehold.co/600x400/CE1126/FFFFFF?text=Proyecto" alt="Proyecto" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-lg" data-aos="zoom-in" data-aos-delay="600">
                        <img src="https://placehold.co/600x400/CE1126/FFFFFF?text=Ciudadanos" alt="Ciudadanos" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                </div>

                <div class="text-center mt-12">
                    <a href="#" class="inline-block bg-pri-red hover:bg-red-800 text-white font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105" data-aos="zoom-in">
                        Ver más fotos
                    </a>
                </div>
            </div>
        </section>

        <!-- Sección de contacto -->
        <section id="contacto" class="py-20 bg-gray-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-pri-red mb-4" data-aos="fade-up">Contacto</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                        Estamos para escucharte. Comparte tus ideas y propuestas para mejorar Tierra Blanca.
                    </p>
                    <div class="w-20 h-1 bg-pri-green mx-auto mt-4"></div>
                </div>

                <div class="flex flex-col lg:flex-row gap-10">
                    <div class="lg:w-1/2" data-aos="fade-right">
                        <form class="bg-white p-8 rounded-lg shadow-lg">
                            <div class="mb-6">
                                <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre completo</label>
                                <input type="text" id="nombre" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-pri-green transition-colors">
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block text-gray-700 font-medium mb-2">Correo electrónico</label>
                                <input type="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-pri-green transition-colors">
                            </div>
                            <div class="mb-6">
                                <label for="telefono" class="block text-gray-700 font-medium mb-2">Teléfono</label>
                                <input type="tel" id="telefono" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-pri-green transition-colors">
                            </div>
                            <div class="mb-6">
                                <label for="mensaje" class="block text-gray-700 font-medium mb-2">Mensaje</label>
                                <textarea id="mensaje" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-pri-green transition-colors"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-pri-red hover:bg-red-800 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105">
                                Enviar mensaje
                            </button>
                        </form>
                    </div>

                    <div class="lg:w-1/2" data-aos="fade-left">
                        <div class="bg-white p-8 rounded-lg shadow-lg h-full">
                            <h3 class="text-2xl font-semibold mb-6 text-pri-red">Información de contacto</h3>

                            <div class="space-y-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-pri-red p-3 rounded-lg mr-4">
                                        <i class="fas fa-map-marker-alt text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold mb-1">Dirección</h4>
                                        <p class="text-gray-600">Av. Principal #123, Centro, Tierra Blanca, Veracruz</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-pri-red p-3 rounded-lg mr-4">
                                        <i class="fas fa-phone text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold mb-1">Teléfono</h4>
                                        <p class="text-gray-600">+52 (274) 123-4567</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-pri-red p-3 rounded-lg mr-4">
                                        <i class="fas fa-envelope text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold mb-1">Correo electrónico</h4>
                                        <p class="text-gray-600">contacto@oliviavalera.com</p>
                                    </div>
                                </div>

                                <div class="pt-6">
                                    <h4 class="font-semibold mb-3">Redes sociales</h4>
                                    <div class="flex space-x-4">
                                        <a href="#" class="bg-pri-red hover:bg-red-800 text-white w-10 h-10 rounded-full flex items-center justify-center transition duration-300">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="#" class="bg-pri-red hover:bg-red-800 text-white w-10 h-10 rounded-full flex items-center justify-center transition duration-300">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="#" class="bg-pri-red hover:bg-red-800 text-white w-10 h-10 rounded-full flex items-center justify-center transition duration-300">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        <a href="#" class="bg-pri-red hover:bg-red-800 text-white w-10 h-10 rounded-full flex items-center justify-center transition duration-300">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white pt-16 pb-20">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/3 mb-8 md:mb-0">
                        <div class="flex items-center mb-4">
                            <div class="h-10 w-10 bg-pri-green rounded-full flex items-center justify-center mr-2">
                                <span class="text-white font-bold text-xs">PRI</span>
                            </div>
                            <span class="text-white font-bold text-xl">Olivia Valera</span>
                        </div>
                        <p class="text-gray-400 mb-6 pr-6">
                            Candidata del PRI a la Presidencia Municipal de Tierra Blanca, Veracruz. Elecciones 2025.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>

                    <div class="w-full md:w-1/3 mb-8 md:mb-0">
                        <h3 class="text-lg font-semibold mb-4">Enlaces rápidos</h3>
                        <ul class="space-y-2">
                            <li><a href="#inicio" class="text-gray-400 hover:text-white transition duration-300">Inicio</a></li>
                            <li><a href="#candidata" class="text-gray-400 hover:text-white transition duration-300">Candidata</a></li>
                            <li><a href="#propuestas" class="text-gray-400 hover:text-white transition duration-300">Propuestas</a></li>
                            <li><a href="#galeria" class="text-gray-400 hover:text-white transition duration-300">Galería</a></li>
                            <li><a href="#contacto" class="text-gray-400 hover:text-white transition duration-300">Contacto</a></li>
                        </ul>
                    </div>

                    <div class="w-full md:w-1/3">
                        <h3 class="text-lg font-semibold mb-4">Boletín informativo</h3>
                        <p class="text-gray-400 mb-4">
                            Suscríbete para recibir las últimas noticias de nuestra campaña:
                        </p>
                        <form class="flex">
                            <input type="email" placeholder="Tu correo electrónico" class="px-4 py-2 rounded-l-lg w-full focus:outline-none text-gray-800">
                            <button type="submit" class="bg-pri-green hover:bg-green-700 text-white px-4 py-2 rounded-r-lg transition duration-300">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-500 text-sm mb-4 md:mb-0">
                        &copy; 2025 Campaña Olivia Valera. Todos los derechos reservados.
                    </p>
                    <div class="flex flex-wrap justify-center">
                        <a href="#" class="text-gray-500 hover:text-white mx-2 text-sm transition duration-300">Política de privacidad</a>
                        <a href="#" class="text-gray-500 hover:text-white mx-2 text-sm transition duration-300">Términos y condiciones</a>
                        <a href="#" class="text-gray-500 hover:text-white mx-2 text-sm transition duration-300">Aviso legal</a>
                    </div>
                </div>
            </div>
        </footer>


        <!-- Versión mejorada de la barra de créditos flotante - más responsive -->
        <div class="credits-bar fixed bottom-0 left-0 right-0 py-3 sm:py-2 px-4 border-t border-gray-200 bg-white shadow-lg z-50 overflow-hidden">
            <div class="container mx-auto max-w-full flex flex-col sm:flex-row justify-center sm:justify-between items-center space-y-2 sm:space-y-0 flex-wrap">
                <div class="text-xs text-gray-500 order-2 sm:order-1 w-full sm:w-auto text-center sm:text-left">
                    &copy; 2025 Campaña Olivia Valera
                </div>
                <div class="flex flex-col xs:flex-row items-center gap-2 order-1 sm:order-2 w-full sm:w-auto flex-wrap justify-center">
                    <p class="text-xs sm:text-sm text-gray-700 flex items-center justify-center whitespace-nowrap">
                        Desarrollado con
                        <i class="fas fa-heart text-pri-green animate-pulse mx-1"></i>
                        por:
                    </p>
                    <a href="https://sattlink.com" target="_blank" class="transition-transform hover:scale-105 duration-300 max-w-[180px] overflow-hidden">
                        <img src="{{asset('/img/Sattlink-logo-nuevo.png')}}" alt="Sattlink Internet" class="h-6 sm:h-8 w-auto object-contain">
                    </a>
                </div>
            </div>
        </div>

        <!-- Botón para volver arriba (ajustado para pantallas móviles y no solapar con la barra de créditos) -->
        <a href="#inicio" id="back-to-top" class="fixed bottom-20 sm:bottom-16 right-6 bg-pri-red hover:bg-red-800 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg transition-all duration-300 opacity-0 invisible">
            <i class="fas fa-arrow-up"></i>
        </a>

        <!-- Scripts -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            // Inicializar animaciones AOS
            AOS.init({
                once: true,
                duration: 800,
            });

            // Toggle para menú móvil
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Animación de contador
            const startCounting = () => {
                const counterElements = document.querySelectorAll('.counting-number');

                counterElements.forEach(counter => {
                    const target = parseInt(counter.getAttribute('data-count'));
                    const duration = 2000; // ms
                    const step = Math.ceil(target / (duration / 16)); // 60fps
                    let current = 0;

                    const timer = setInterval(() => {
                        current += step;
                        if (current >= target) {
                            counter.textContent = target.toLocaleString();
                            clearInterval(timer);
                        } else {
                            counter.textContent = current.toLocaleString();
                        }
                    }, 16);
                });
            };

            // Iniciar contador cuando se vea la sección
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        startCounting();
                        observer.disconnect();
                    }
                });
            });

            observer.observe(document.querySelector('.counting-number'));

            // Cambiar estilo del navbar al hacer scroll
            const navbar = document.getElementById('navbar');
            const backToTop = document.getElementById('back-to-top');

            window.addEventListener('scroll', () => {
                if (window.scrollY > 100) {
                    navbar.classList.add('shadow-md', 'py-2');
                    navbar.classList.remove('py-4');
                    backToTop.classList.remove('opacity-0', 'invisible');
                    backToTop.classList.add('opacity-100');
                } else {
                    navbar.classList.remove('shadow-md', 'py-2');
                    navbar.classList.add('py-4');
                    backToTop.classList.add('opacity-0', 'invisible');
                    backToTop.classList.remove('opacity-100');
                }
            });

            // Smooth scroll para los enlaces internos
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });

                        // Cerrar menú móvil si está abierto
                        if (!mobileMenu.classList.contains('hidden')) {
                            mobileMenu.classList.add('hidden');
                        }
                    }
                });
            });
        </script>
    </body>
</html>

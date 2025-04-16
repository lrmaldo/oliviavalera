<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Planilla de Olivia Valera - Candidata del PRI a la Presidencia Municipal de Tierra Blanca, Veracruz 2025">

        <title>Planilla - Olivia Valera PRI Tierra Blanca 2025</title>

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
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23CE1126' fill-opacity='0.05'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
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

            .parallax {
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

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

            .role-badge {
                position: absolute;
                top: 0.5rem;
                right: 0.5rem;
                background-color: rgba(0, 0, 0, 0.7);
                color: white;
                padding: 0.25rem 0.75rem;
                border-radius: 9999px;
                font-size: 0.75rem;
                font-weight: 600;
                z-index: 10;
            }

            .member-card {
                transition: all 0.3s ease;
                transform: translateZ(0);
                backface-visibility: hidden;
            }

            .member-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }

            .member-card:hover .img-overlay {
                opacity: 0.95;
            }

            .member-card:hover .overlay-content {
                transform: translateY(0);
                opacity: 1;
            }

            .img-overlay {
                transition: all 0.3s ease;
                opacity: 0;
                background: linear-gradient(to top, rgba(206, 17, 38, 0.9), rgba(0, 104, 71, 0.7));
            }

            .overlay-content {
                transition: all 0.3s ease 0.1s;
                transform: translateY(20px);
                opacity: 0;
            }

            .cv-button {
                transition: all 0.2s ease;
            }

            .cv-button:hover {
                transform: scale(1.05);
            }

            .img-container {
                overflow: hidden;
            }

            .img-container img {
                transition: transform 0.5s ease;
            }

            .member-card:hover .img-container img {
                transform: scale(1.1);
            }

            @media (max-width: 768px) {
                #back-to-top {
                    bottom: 70px;
                }
            }

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
                            <a href="{{ url('/') }}#inicio" class="text-gray-800 hover:text-pri-red px-3 py-2 rounded-md text-sm font-medium transition-all">Inicio</a>
                            <a href="{{ url('/') }}#candidata" class="text-gray-800 hover:text-pri-red px-3 py-2 rounded-md text-sm font-medium transition-all">Candidata</a>
                            <a href="{{ url('/') }}#propuestas" class="text-gray-800 hover:text-pri-red px-3 py-2 rounded-md text-sm font-medium transition-all">Propuestas</a>
                            <a href="{{ url('/') }}#galeria" class="text-gray-800 hover:text-pri-red px-3 py-2 rounded-md text-sm font-medium transition-all">Galería</a>
                            <a href="{{ url('/') }}#contacto" class="text-gray-800 hover:text-pri-red px-3 py-2 rounded-md text-sm font-medium transition-all">Contacto</a>
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
                    <a href="{{ url('/') }}#inicio" class="text-gray-800 hover:text-pri-red block px-3 py-2 rounded-md text-base font-medium">Inicio</a>
                    <a href="{{ url('/') }}#candidata" class="text-gray-800 hover:text-pri-red block px-3 py-2 rounded-md text-base font-medium">Candidata</a>
                    <a href="{{ url('/') }}#propuestas" class="text-gray-800 hover:text-pri-red block px-3 py-2 rounded-md text-base font-medium">Propuestas</a>
                    <a href="{{ url('/') }}#galeria" class="text-gray-800 hover:text-pri-red block px-3 py-2 rounded-md text-base font-medium">Galería</a>
                    <a href="{{ url('/') }}#contacto" class="text-gray-800 hover:text-pri-red block px-3 py-2 rounded-md text-base font-medium">Contacto</a>
                    <a href="#" class="bg-pri-green hover:bg-green-700 text-white block px-3 py-2 rounded-md text-base font-medium mt-2">¡Únete!</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section de Planilla -->
        <section class="pt-24 pb-16 relative bg-gradient-to-b from-white to-gray-100">
            <!-- Franja tricolor superior -->
            <div class="absolute top-0 left-0 right-0 h-2 mexico-flag-gradient"></div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8" data-aos="fade-up">
                    <h1 class="text-4xl md:text-5xl font-bold text-pri-red mb-4">Nuestra Planilla</h1>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Conoce al equipo de profesionales comprometidos que trabajarán junto a Olivia Valera para transformar Tierra Blanca.
                    </p>
                    <div class="w-24 h-1 bg-pri-green mx-auto mt-6"></div>
                </div>

                <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mb-12" data-aos="fade-up">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                        <div class="md:w-1/3 flex justify-center">
                            <div class="relative">
                                <div class="w-48 h-48 rounded-full overflow-hidden border-4 border-pri-green shadow-lg">
                                    <img src="https://placehold.co/400x400/CE1126/FFFFFF?text=Olivia+Valera" alt="Olivia Valera" class="w-full h-full object-cover">
                                </div>
                                <div class="absolute -bottom-3 -right-3 bg-white rounded-full p-1.5 shadow-md">
                                    <div class="w-12 h-12 bg-pri-green rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold text-xs">PRI</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-2/3 text-center md:text-left">
                            <h2 class="text-2xl font-bold text-pri-red mb-1">Olivia Valera González</h2>
                            <p class="text-lg text-pri-green font-semibold mb-4">Candidata a la Presidencia Municipal</p>
                            <p class="text-gray-700 mb-4">
                                Liderando un equipo comprometido con el progreso y bienestar de Tierra Blanca. Juntos construiremos el municipio que merecemos.
                            </p>
                            <a href="#" class="inline-flex items-center space-x-2 bg-pri-red hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-file-pdf"></i>
                                <span>Descargar CV completo</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de miembros de la planilla -->
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-pri-red mb-4" data-aos="fade-up">Equipo de Trabajo</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                        Profesionales con experiencia y compromiso por el bienestar de Tierra Blanca
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Miembro 1 -->
                    <div class="member-card bg-white rounded-lg overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative">
                            <div class="h-2 bg-pri-green absolute top-0 left-0 w-full z-10"></div>
                            <div class="img-container h-64">
                                <img src="https://placehold.co/600x800/CE1126/FFFFFF?text=José+Ramírez" alt="José Ramírez" class="w-full h-full object-cover">

                                <div class="absolute inset-0 flex flex-col justify-end img-overlay">
                                    <div class="p-6 text-white overlay-content">
                                        <p class="text-sm mb-3">Licenciado en Derecho con más de 12 años de experiencia en administración pública municipal y especialista en derecho administrativo.</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs text-white/80">9 años de experiencia</span>
                                            <a href="#" class="cv-button inline-flex items-center text-white hover:text-pri-gold text-sm font-medium">
                                                <i class="fas fa-eye mr-1"></i> Detalles
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute top-3 right-3 bg-pri-red text-white text-xs font-bold px-3 py-1 rounded-full z-20">
                                Síndico
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-pri-red mb-1">José Ramírez González</h3>
                            <p class="text-gray-600 mb-4">Síndico Municipal</p>
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-3">
                                    <a href="#" class="text-gray-400 hover:text-pri-red transition-colors">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-pri-red transition-colors">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                                <a href="#" class="inline-flex items-center bg-pri-green hover:bg-green-700 text-white px-3 py-1.5 rounded-lg text-sm transition-colors">
                                    <i class="fas fa-file-pdf mr-1.5"></i>
                                    <span>Descargar CV</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Miembro 2 -->
                    <div class="member-card bg-white rounded-lg overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative">
                            <div class="h-2 bg-pri-green absolute top-0 left-0 w-full z-10"></div>
                            <div class="img-container h-64">
                                <img src="https://placehold.co/600x800/CE1126/FFFFFF?text=Mariana+López" alt="Mariana López" class="w-full h-full object-cover">

                                <div class="absolute inset-0 flex flex-col justify-end img-overlay">
                                    <div class="p-6 text-white overlay-content">
                                        <p class="text-sm mb-3">Economista con maestría en finanzas públicas. Ha trabajado en proyectos de desarrollo económico local y emprendimiento rural.</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs text-white/80">7 años de experiencia</span>
                                            <a href="#" class="cv-button inline-flex items-center text-white hover:text-pri-gold text-sm font-medium">
                                                <i class="fas fa-eye mr-1"></i> Detalles
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute top-3 right-3 bg-pri-red text-white text-xs font-bold px-3 py-1 rounded-full z-20">
                                Regidora 1
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-pri-red mb-1">Mariana López Vega</h3>
                            <p class="text-gray-600 mb-4">Regidora - Comisión de Hacienda</p>
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-3">
                                    <a href="#" class="text-gray-400 hover:text-pri-red transition-colors">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-pri-red transition-colors">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                                <a href="#" class="inline-flex items-center bg-pri-green hover:bg-green-700 text-white px-3 py-1.5 rounded-lg text-sm transition-colors">
                                    <i class="fas fa-file-pdf mr-1.5"></i>
                                    <span>Descargar CV</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Miembro 3 -->
                    <div class="member-card bg-white rounded-lg overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="300">
                        <div class="relative">
                            <div class="h-2 bg-pri-green absolute top-0 left-0 w-full z-10"></div>
                            <div class="img-container h-64">
                                <img src="https://placehold.co/600x800/CE1126/FFFFFF?text=Carlos+Mendoza" alt="Carlos Mendoza" class="w-full h-full object-cover">

                                <div class="absolute inset-0 flex flex-col justify-end img-overlay">
                                    <div class="p-6 text-white overlay-content">
                                        <p class="text-sm mb-3">Ingeniero Civil con especialidad en desarrollo urbano sustentable. Ha dirigido proyectos de infraestructura en varias ciudades de Veracruz.</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs text-white/80">15 años de experiencia</span>
                                            <a href="#" class="cv-button inline-flex items-center text-white hover:text-pri-gold text-sm font-medium">
                                                <i class="fas fa-eye mr-1"></i> Detalles
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute top-3 right-3 bg-pri-red text-white text-xs font-bold px-3 py-1 rounded-full z-20">
                                Regidor 2
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-pri-red mb-1">Carlos Mendoza Fernández</h3>
                            <p class="text-gray-600 mb-4">Regidor - Comisión de Obras Públicas</p>
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-3">
                                    <a href="#" class="text-gray-400 hover:text-pri-red transition-colors">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-pri-red transition-colors">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                                <a href="#" class="inline-flex items-center bg-pri-green hover:bg-green-700 text-white px-3 py-1.5 rounded-lg text-sm transition-colors">
                                    <i class="fas fa-file-pdf mr-1.5"></i>
                                    <span>Descargar CV</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Miembro 4 -->
                    <div class="member-card bg-white rounded-lg overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="400">
                        <div class="relative">
                            <div class="h-2 bg-pri-green absolute top-0 left-0 w-full z-10"></div>
                            <div class="img-container h-64">
                                <img src="https://placehold.co/600x800/CE1126/FFFFFF?text=Laura+Sánchez" alt="Laura Sánchez" class="w-full h-full object-cover">

                                <div class="absolute inset-0 flex flex-col justify-end img-overlay">
                                    <div class="p-6 text-white overlay-content">
                                        <p class="text-sm mb-3">Maestra con doctorado en Educación. Ha coordinado diversos programas educativos y culturales a nivel estatal y federal.</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs text-white/80">10 años de experiencia</span>
                                            <a href="#" class="cv-button inline-flex items-center text-white hover:text-pri-gold text-sm font-medium">
                                                <i class="fas fa-eye mr-1"></i> Detalles
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute top-3 right-3 bg-pri-red text-white text-xs font-bold px-3 py-1 rounded-full z-20">
                                Regidora 3
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-pri-red mb-1">Laura Sánchez Martínez</h3>
                            <p class="text-gray-600 mb-4">Regidora - Comisión de Educación</p>
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-3">
                                    <a href="#" class="text-gray-400 hover:text-pri-red transition-colors">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-pri-red transition-colors">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                                <a href="#" class="inline-flex items-center bg-pri-green hover:bg-green-700 text-white px-3 py-1.5 rounded-lg text-sm transition-colors">
                                    <i class="fas fa-file-pdf mr-1.5"></i>
                                    <span>Descargar CV</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Miembro 5 -->
                    <div class="member-card bg-white rounded-lg overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="500">
                        <div class="relative">
                            <div class="h-2 bg-pri-green absolute top-0 left-0 w-full z-10"></div>
                            <div class="img-container h-64">
                                <img src="https://placehold.co/600x800/CE1126/FFFFFF?text=Miguel+Torres" alt="Miguel Torres" class="w-full h-full object-cover">

                                <div class="absolute inset-0 flex flex-col justify-end img-overlay">
                                    <div class="p-6 text-white overlay-content">
                                        <p class="text-sm mb-3">Administrador de Empresas y emprendedor social. Ha desarrollado programas de apoyo a pequeños productores en la región.</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs text-white/80">8 años de experiencia</span>
                                            <a href="#" class="cv-button inline-flex items-center text-white hover:text-pri-gold text-sm font-medium">
                                                <i class="fas fa-eye mr-1"></i> Detalles
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute top-3 right-3 bg-pri-red text-white text-xs font-bold px-3 py-1 rounded-full z-20">
                                Regidor 4
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-pri-red mb-1">Miguel Torres Ramírez</h3>
                            <p class="text-gray-600 mb-4">Regidor - Comisión de Desarrollo Rural</p>
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-3">
                                    <a href="#" class="text-gray-400 hover:text-pri-red transition-colors">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-pri-red transition-colors">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                                <a href="#" class="inline-flex items-center bg-pri-green hover:bg-green-700 text-white px-3 py-1.5 rounded-lg text-sm transition-colors">
                                    <i class="fas fa-file-pdf mr-1.5"></i>
                                    <span>Descargar CV</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Miembro 6 -->
                    <div class="member-card bg-white rounded-lg overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="600">
                        <div class="relative">
                            <div class="h-2 bg-pri-green absolute top-0 left-0 w-full z-10"></div>
                            <div class="img-container h-64">
                                <img src="https://placehold.co/600x800/CE1126/FFFFFF?text=Ana+Gutiérrez" alt="Ana Gutiérrez" class="w-full h-full object-cover">

                                <div class="absolute inset-0 flex flex-col justify-end img-overlay">
                                    <div class="p-6 text-white overlay-content">
                                        <p class="text-sm mb-3">Abogada especialista en derecho municipal. Ha liderado iniciativas para la atención de grupos vulnerables en diversos municipios.</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs text-white/80">12 años de experiencia</span>
                                            <a href="#" class="cv-button inline-flex items-center text-white hover:text-pri-gold text-sm font-medium">
                                                <i class="fas fa-eye mr-1"></i> Detalles
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute top-3 right-3 bg-pri-red text-white text-xs font-bold px-3 py-1 rounded-full z-20">
                                Regidora 5
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-pri-red mb-1">Ana Gutiérrez Ortiz</h3>
                            <p class="text-gray-600 mb-4">Regidora - Comisión de Asuntos Sociales</p>
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-3">
                                    <a href="#" class="text-gray-400 hover:text-pri-red transition-colors">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-pri-red transition-colors">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                                <a href="#" class="inline-flex items-center bg-pri-green hover:bg-green-700 text-white px-3 py-1.5 rounded-lg text-sm transition-colors">
                                    <i class="fas fa-file-pdf mr-1.5"></i>
                                    <span>Descargar CV</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-12 text-center">
                    <a href="#" class="inline-flex items-center bg-pri-red hover:bg-red-700 text-white px-6 py-3 rounded-lg font-bold transition-all duration-300 transform hover:scale-105" data-aos="fade-up">
                        <span>Ver más miembros de la planilla</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- Banner motivacional -->
        <section class="relative py-20 bg-fixed bg-center bg-cover parallax" style="background-image: url('https://placehold.co/1920x600/CE1126/FFFFFF?text=Tierra+Blanca')">
            <div class="absolute inset-0 bg-pri-green bg-opacity-80"></div>
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="max-w-3xl mx-auto text-center text-white" data-aos="zoom-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">¿Quieres unirte a nuestro equipo?</h2>
                    <p class="text-xl mb-8">
                        Forma parte del cambio que Tierra Blanca necesita. Juntos trabajaremos por un mejor futuro para todos.
                    </p>
                    <a href="#" class="inline-flex items-center bg-white text-pri-green hover:bg-gray-100 font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105">
                        <span>¡Quiero participar!</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
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
                            <li><a href="{{ url('/') }}#inicio" class="text-gray-400 hover:text-white transition duration-300">Inicio</a></li>
                            <li><a href="{{ url('/') }}#candidata" class="text-gray-400 hover:text-white transition duration-300">Candidata</a></li>
                            <li><a href="{{ url('/') }}#propuestas" class="text-gray-400 hover:text-white transition duration-300">Propuestas</a></li>
                            <li><a href="{{ url('/') }}#galeria" class="text-gray-400 hover:text-white transition duration-300">Galería</a></li>
                            <li><a href="{{ url('/') }}#contacto" class="text-gray-400 hover:text-white transition duration-300">Contacto</a></li>
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

        <!-- Botón para volver arriba -->
        <a href="#" id="back-to-top" class="fixed bottom-20 sm:bottom-16 right-6 bg-pri-red hover:bg-red-800 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg transition-all duration-300 opacity-0 invisible">
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

            // Smooth scroll para el botón de volver arriba
            document.getElementById('back-to-top').addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        </script>
    </body>
</html>

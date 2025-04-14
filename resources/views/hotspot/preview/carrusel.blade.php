<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaña Tierra Blanca - WiFi Gratuito</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .bg-pri-green {
            background-color: #006847; /* Verde PRI más intenso */
        }
        .bg-pri-red {
            background-color: #ce1126; /* Rojo PRI más intenso */
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
        .hover-pri-green:hover {
            background-color: #00563c;
        }
        .hover-pri-red:hover {
            background-color: #b50e20;
        }

        /* Nuevos estilos para mejorar la apariencia */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .input-focus-effect:focus {
            box-shadow: 0 0 0 3px rgba(0, 104, 71, 0.2);
            transition: all 0.2s ease;
        }

        .pulse-effect {
            transition: transform 0.3s ease;
        }

        .pulse-effect:hover {
            transform: scale(1.02);
        }

        .embossed-bg {
            background-image: linear-gradient(to bottom right, rgba(255,255,255,0.2), rgba(0,0,0,0.1));
        }

        .card-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Estilos para validaciones */
        .input-error {
            border-color: #ef4444;
            background-color: #fef2f2;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.25rem;
            display: none;
        }

        .input-valid {
            border-color: #10b981;
            background-color: #f0fdf4;
        }

        .input-error:focus {
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2) !important;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-gray-100 to-gray-200 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden w-full max-w-md border-t-4 border-pri-green">
        <div class="bg-pri-green p-4 text-white text-center">
            <i class="fas fa-wifi text-3xl mb-2"></i>
            <h1 class="text-2xl font-bold">WiFi Gratuito</h1>
            <p class="text-sm">Propuestas de Olivia Valera para un mejor Tierra Blanca</p>
        </div>

        <div
            class="bg-gradient-to-r from-blue-50 to-green-50 p-3 border-b border-gray-200 flex items-center justify-center">
            <div class="flex flex-col md:flex-row items-center">
                <a href="https://sattlink.com" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('/img/Sattlink-logo-nuevo.png') }}" alt="Sattlink"
                        class="h-10 max-w-full transition-transform hover:scale-105 duration-300 mr-3">
                </a>
                <div class="text-center md:text-left">
                    <p class="text-sm text-gray-700 font-medium">Servicio de internet <span class="text-pri-green">en
                            colaboración con:</span></p>
                    <p class="text-xs text-gray-500 italic">
                        <i class="fas fa-heart text-red-500 animate-pulse mx-1"></i>
                        Desarrollado con amor por el equipo de Sattlink
                    </p>
                </div>
            </div>
        </div>

        <div class="p-6">
            <h2 class="text-xl font-bold text-center text-pri-green mb-4">Nuestros compromisos con Tierra Blanca</h2>

            <div class="mt-4 relative">
                <div class="carousel overflow-hidden rounded-lg shadow-md border border-gray-200">
                    <img id="carousel-image" class="w-full h-64 object-cover transition-opacity duration-500" src="" alt="Propuestas de campaña">
                    <div class="absolute inset-0 flex items-center justify-between px-2">
                        <button id="prev-btn" class="bg-pri-red bg-opacity-70 hover:bg-opacity-90 text-white p-2 rounded-full">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button id="next-btn" class="bg-pri-red bg-opacity-70 hover:bg-opacity-90 text-white p-2 rounded-full">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    <div id="carousel-caption" class="absolute bottom-0 left-0 right-0 bg-pri-green bg-opacity-80 text-white p-3 text-center"></div>
                </div>

                <div class="flex justify-center mt-3">
                    <div id="carousel-indicators" class="flex space-x-2">
                        <!-- Indicadores dinámicos aquí -->
                    </div>
                </div>
            </div>

            <div class="mt-6 relative">
                <!-- Contenedor principal con borde degradado -->
                <div class="p-0.5 bg-gradient-to-r from-pri-green to-pri-red rounded-xl shadow-lg">
                    <div class="bg-white p-5 rounded-lg">
                        <!-- Título con estilo mejorado -->
                        <div class="mb-4 text-center">
                            <h3 class="text-pri-green font-bold flex items-center justify-center">
                                <i class="fas fa-wifi text-pri-red mr-2"></i>
                                Conexión a WiFi Gratuito
                            </h3>
                        </div>

                        <!-- Contador con estilo mejorado -->
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 shadow-inner mb-4">
                            <div class="flex items-center justify-center">
                                <div class="mr-3 bg-pri-green bg-opacity-10 p-2 rounded-full">
                                    <i class="fas fa-clock text-white text-xl"></i>
                                </div>
                                <p class="text-gray-700">
                                    Espere <span id="countdown" class="inline-block min-w-[2rem] text-xl font-bold text-pri-red bg-white py-1 px-2 rounded-lg shadow-sm border border-gray-100">15</span>
                                    <span class="text-gray-600">segundos para continuar</span>
                                </p>
                            </div>
                        </div>

                        <!-- Botón mejorado -->
                        <button id="continue-btn" class="w-full bg-gray-400 text-white py-3 rounded-lg font-bold transition-all duration-300 hover:shadow-lg flex items-center justify-center disabled:opacity-80 disabled:cursor-not-allowed" disabled>
                            <span>Continuar a Internet</span>
                            <i class="fas fa-lock ml-2 text-white"></i>
                        </button>
                    </div>
                </div>

                <!-- Mensaje adicional con estilo de nota -->
                <div class="text-center mt-3 text-xs text-gray-500 flex items-center justify-center">
                    <i class="fas fa-info-circle mr-1"></i>
                    <span>Al continuar, acepta recibir información sobre nuestras propuestas</span>
                </div>
            </div>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Gracias por su interés en nuestras propuestas.</p>
                <p class="text-sm text-gray-600">Olivia Valera cuenta con su apoyo para el cambio.</p>
            </div>
        </div>

        <!-- Nueva sección: Eslogan, imagen y botón de acción -->
        <div class="relative overflow-hidden">
            <!-- Franja verde decorativa -->
            <div class="absolute left-0 top-0 h-full w-2 bg-pri-green"></div>
            <!-- Franja roja decorativa -->
            <div class="absolute right-0 top-0 h-full w-2 bg-pri-red"></div>

            <div class="bg-white py-8 px-6 text-center relative">
                <div class="mb-6">
                    <span class="inline-block px-4 py-1 rounded-full bg-pri-green text-white text-xs font-semibold mb-2">
                        CANDIDATA 2025
                    </span>
                    <h2 class="text-2xl md:text-3xl font-bold text-pri-red mb-2">
                        "Unidos por el progreso<br>de Tierra Blanca"
                    </h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-pri-green via-white to-pri-red mx-auto mb-4"></div>
                </div>

                <div class="flex flex-col items-center justify-center mb-6">
                    <div class="relative mb-4">
                        <div class="absolute inset-0 rounded-full border-4 border-pri-red opacity-75 animate-pulse"></div>
                        <img src="https://placehold.co/200x200/006847/FFFFFF?text=Olivia+Valera" alt="Olivia Valera"
                            class="w-36 h-36 object-cover rounded-full border-4 border-white shadow-lg z-10 relative">
                    </div>
                    <h3 class="text-xl font-bold text-pri-green">Olivia Valera</h3>
                    <p class="text-sm text-gray-600 mb-2">Tu candidata a la presidencia municipal</p>
                    <p class="italic text-sm text-gray-500 mb-4">"Construyendo juntos el futuro de Tierra Blanca"</p>
                </div>

                <div class="space-y-3">
                    <!-- Contenedor de botón principal con sombra elegante -->
                    <div class="inline-block p-0.5 bg-gradient-to-r from-pri-green to-pri-red rounded-lg shadow-lg">
                        <a href="#contacto" class="block bg-white hover:bg-gray-50 text-pri-green font-semibold py-2 px-8 rounded-md transition-all">
                            <i class="fas fa-handshake mr-2"></i>Súmate al proyecto
                        </a>
                    </div>

                    <!-- Separador tricolor sutil -->
                    <div class="flex justify-center items-center my-4">
                        <div class="h-0.5 w-12 bg-pri-green"></div>
                        <div class="h-0.5 w-12 bg-gray-200 mx-1"></div>
                        <div class="h-0.5 w-12 bg-pri-red"></div>
                    </div>

                    <!-- Redes sociales con iconos más elegantes -->
                    <div class="flex justify-center space-x-6 mt-2">
                        <a href="#" class="bg-white p-2 rounded-full shadow-sm border border-gray-100 text-pri-green hover:bg-pri-green hover:text-white transition-all duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="bg-white p-2 rounded-full shadow-sm border border-gray-100 text-pri-green hover:bg-pri-green hover:text-white transition-all duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="bg-white p-2 rounded-full shadow-sm border border-gray-100 text-pri-red hover:bg-pri-red hover:text-white transition-all duration-300">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-100 p-3 text-center text-xs text-gray-500">
            <p>© {{date('Y')}} Campaña de Olivia Valera para la Presidencia Municipal de Tierra Blanca, Veracruz</p>
        </div>
    </div>

    <script>
        // Imágenes y contenido de campaña
        const campaignSlides = [
            {
                image: "{{ asset('images/campaign/seguridad.jpg') }}",
                caption: "Compromiso con calles más seguras para todas las familias"
            },
            {
                image: "{{ asset('images/campaign/infraestructura.jpg') }}",
                caption: "Mejores caminos, alumbrado y servicios para cada colonia"
            },
            {
                image: "{{ asset('images/campaign/salud.jpg') }}",
                caption: "Acceso a servicios médicos para todos los ciudadanos"
            },
            {
                image: "{{ asset('images/campaign/educacion.jpg') }}",
                caption: "Becas y mejor infraestructura escolar para nuestros jóvenes"
            },
            {
                image: "{{ asset('images/campaign/agua.jpg') }}",
                caption: "Soluciones para garantizar el acceso al agua potable"
            }
        ];

        // Imágenes de respaldo por si fallan las primeras
        const fallbackImages = [
            "https://placehold.co/800x400/9333EA/FFFFFF?text=Seguridad",
            "https://placehold.co/800x400/9333EA/FFFFFF?text=Infraestructura",
            "https://placehold.co/800x400/9333EA/FFFFFF?text=Salud",
            "https://placehold.co/800x400/9333EA/FFFFFF?text=Educación",
            "https://placehold.co/800x400/9333EA/FFFFFF?text=Agua"
        ];

        let currentSlide = 0;
        const carouselImage = document.getElementById("carousel-image");
        const captionElement = document.getElementById("carousel-caption");
        const indicatorsContainer = document.getElementById("carousel-indicators");
        const prevBtn = document.getElementById("prev-btn");
        const nextBtn = document.getElementById("next-btn");

        // Crear indicadores
        campaignSlides.forEach((_, index) => {
            const indicator = document.createElement("div");
            indicator.className = "w-3 h-3 rounded-full bg-gray-300";
            indicator.addEventListener("click", () => goToSlide(index));
            indicatorsContainer.appendChild(indicator);
        });

        function updateIndicators() {
            const indicators = indicatorsContainer.querySelectorAll("div");
            indicators.forEach((ind, index) => {
                if (index === currentSlide) {
                    ind.classList.remove("bg-gray-300");
                    ind.classList.add("bg-purple-600");
                } else {
                    ind.classList.remove("bg-purple-600");
                    ind.classList.add("bg-gray-300");
                }
            });
        }

        function goToSlide(index) {
            currentSlide = index;
            updateSlide();
        }

        function updateSlide() {
            carouselImage.style.opacity = "0";
            setTimeout(() => {
                // Crear una nueva imagen para probar si carga correctamente
                const testImg = new Image();
                const slideIndex = currentSlide;

                testImg.onload = function() {
                    carouselImage.src = campaignSlides[slideIndex].image;
                    captionElement.textContent = campaignSlides[slideIndex].caption;
                    carouselImage.style.opacity = "1";
                    updateIndicators();
                };

                testImg.onerror = function() {
                    // Si la imagen principal falla, usar la imagen de respaldo
                    console.log("Error cargando imagen, usando respaldo");
                    carouselImage.src = fallbackImages[slideIndex];
                    captionElement.textContent = campaignSlides[slideIndex].caption;
                    carouselImage.style.opacity = "1";
                    updateIndicators();
                };

                testImg.src = campaignSlides[slideIndex].image;
            }, 300);
        }

        // Inicializar carrusel
        updateSlide();

        // Navegación del carrusel
        nextBtn.addEventListener("click", () => {
            currentSlide = (currentSlide + 1) % campaignSlides.length;
            updateSlide();
        });

        prevBtn.addEventListener("click", () => {
            currentSlide = (currentSlide - 1 + campaignSlides.length) % campaignSlides.length;
            updateSlide();
        });

        // Cambio automático de diapositivas
        setInterval(() => {
            currentSlide = (currentSlide + 1) % campaignSlides.length;
            updateSlide();
        }, 5000);

        // Cuenta regresiva
        let countdown = 15;
        const countdownElement = document.getElementById("countdown");
        const continueButton = document.getElementById("continue-btn");

        const interval = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;

            if (countdown === 0) {
                clearInterval(interval);
                continueButton.innerHTML = '<span>Continuar a Internet</span> <i class="fas fa-unlock ml-2"></i>';
                continueButton.classList.remove("bg-gray-400");
                continueButton.classList.add("bg-pri-red", "hover-pri-red", "hover:bg-opacity-90");
                continueButton.disabled = false;
            }
        }, 1000);

        // Evento para el botón continuar
        continueButton.addEventListener("click", function() {
            if (!this.disabled) {
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Conectando...';

                setTimeout(() => {
                    window.location.href = "/"; // Cambiar por la URL apropiada
                }, 1500);
            }
        });
    </script>
</body>
</html>

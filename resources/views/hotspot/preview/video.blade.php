<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propuestas en Video - Campaña Tierra Blanca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gradient-to-b from-purple-100 to-purple-200 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden w-full max-w-md border-t-4 border-purple-600">
        <div class="bg-purple-600 p-4 text-white text-center">
            <i class="fas fa-video text-3xl mb-2"></i>
            <h1 class="text-2xl font-bold">Mensaje de su Candidata</h1>
            <p class="text-sm">Propuestas para transformar Tierra Blanca, Veracruz</p>
        </div>

        <div class="p-6">
            <div class="flex justify-center mb-4">
                <div class="rounded-full bg-purple-100 p-2 inline-block">
                    <img src="https://placehold.co/60x60/9333EA/FFFFFF?text=Candidata" alt="Candidata" class="h-14 w-14 rounded-full object-cover">
                </div>
            </div>

            <h2 class="text-xl font-bold text-center text-purple-700 mb-4">Conozca nuestras propuestas</h2>

            <div class="mt-4 relative">
                <div class="overflow-hidden rounded-lg shadow-lg bg-black">
                    <div id="video-container" class="relative">
                        <video id="ad-video" class="w-full" controls poster="https://placehold.co/800x450/9333EA/FFFFFF?text=Video+de+Campaña">
                            <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                            Tu navegador no soporta videos.
                        </video>
                        <div id="video-overlay" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-70 cursor-pointer">
                            <div class="text-center">
                                <div class="rounded-full bg-white bg-opacity-20 p-6 inline-flex mb-4">
                                    <i class="fas fa-play text-white text-4xl"></i>
                                </div>
                                <p class="text-white font-semibold text-lg">Haga clic para reproducir</p>
                            </div>
                        </div>
                    </div>
                    <div id="progress-container" class="h-1 w-full bg-gray-300">
                        <div id="progress-bar" class="h-full bg-purple-600 w-0 transition-all"></div>
                    </div>
                </div>

                <div id="video-info" class="mt-3 bg-purple-50 p-3 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas fa-info-circle text-purple-600 mr-2"></i>
                            <span class="text-sm font-semibold text-gray-700">Mensaje de campaña</span>
                        </div>
                        <div id="video-duration" class="text-sm text-gray-500">
                            <span id="current-time">0:00</span> / <span id="total-time">0:00</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 text-center">
                <div id="watching-message" class="mb-4 flex items-center justify-center">
                    <i class="fas fa-circle text-red-500 animate-pulse mr-2"></i>
                    <p class="text-gray-700">Vea el mensaje completo para continuar</p>
                </div>
                <div id="completed-message" class="mb-4 flex items-center justify-center hidden">
                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                    <p class="text-gray-700">¡Gracias por ver nuestras propuestas!</p>
                </div>
                <button id="continue-btn" class="w-full bg-gray-400 text-white py-3 rounded-lg font-semibold transition-all duration-300 flex items-center justify-center" disabled>
                    <span>Continuar a Internet</span>
                    <i class="fas fa-lock ml-2"></i>
                </button>
            </div>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Su opinión es importante para construir un mejor Tierra Blanca.</p>
            </div>
        </div>

        <div class="bg-gray-100 p-3 text-center text-xs text-gray-500">
            <p>© 2023 Campaña para la Presidencia Municipal de Tierra Blanca, Veracruz</p>
        </div>
    </div>

    <script>
        const button = document.getElementById("continue-btn");
        const video = document.getElementById("ad-video");
        const videoOverlay = document.getElementById("video-overlay");
        const progressBar = document.getElementById("progress-bar");
        const currentTimeEl = document.getElementById("current-time");
        const totalTimeEl = document.getElementById("total-time");
        const watchingMessage = document.getElementById("watching-message");
        const completedMessage = document.getElementById("completed-message");

        // Formatear tiempo en minutos:segundos
        function formatTime(seconds) {
            const mins = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return `${mins}:${secs < 10 ? '0' : ''}${secs}`;
        }

        // Inicializar overlay de video
        videoOverlay.addEventListener("click", () => {
            videoOverlay.classList.add("hidden");
            video.play();
        });

        // Cuando los metadatos del video estén cargados
        video.addEventListener("loadedmetadata", () => {
            totalTimeEl.textContent = formatTime(video.duration);
        });

        // Actualizar barra de progreso y tiempo actual
        video.addEventListener("timeupdate", () => {
            // Actualizar barra de progreso
            const progress = (video.currentTime / video.duration) * 100;
            progressBar.style.width = `${progress}%`;

            // Actualizar tiempo actual
            currentTimeEl.textContent = formatTime(video.currentTime);
        });

        // Habilitar botón al finalizar el video
        video.addEventListener("ended", () => {
            button.classList.remove("bg-gray-400");
            button.classList.add("bg-purple-600", "hover:bg-purple-700");
            button.innerHTML = '<span>Continuar a Internet</span> <i class="fas fa-unlock ml-2"></i>';
            button.disabled = false;

            // Cambiar mensaje de estado
            watchingMessage.classList.add("hidden");
            completedMessage.classList.remove("hidden");

            // Marcar la barra de progreso como completada
            progressBar.classList.add("bg-green-500");
        });

        // Manejar clic en el botón continuar
        button.addEventListener("click", function() {
            if (!this.disabled) {
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Conectando...';

                setTimeout(() => {
                    window.location.href = "/"; // Cambiar por la URL apropiada
                }, 1500);
            }
        });

        // Recuperar reproducción si el usuario hace clic en el video
        video.addEventListener("click", () => {
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }
        });
    </script>
</body>
</html>

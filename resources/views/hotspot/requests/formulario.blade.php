<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiFi Gratuito - Campaña PRI Tierra Blanca</title>
    <script src="/js/3.4.16.js"></script>
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
    <!-- Select2 CSS  /select2-4.1.0-rc.0/select2-4.1.0-rc.0/dist/js/select2.min.js-->
    <link href="/select2-4.1.0-rc.0/select2-4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .bg-pri-green {
            background-color: #006847;
            /* Verde PRI más intenso */
        }

        .bg-pri-red {
            background-color: #ce1126;
            /* Rojo PRI más intenso */
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
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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
            background-image: linear-gradient(to bottom right, rgba(255, 255, 255, 0.2), rgba(0, 0, 0, 0.1));
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

        /* Estilos para Select2 */
        .select2-container--default .select2-selection--single {
            height: 48px;
            padding: 0.5rem;
            border-color: #e5e7eb;
            border-radius: 0.5rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 46px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 28px;
            color: #4b5563;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #006847;
        }

        .select2-dropdown {
            border-color: #e5e7eb;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Estilo adicional para los contenedores de Select2 */
        .select2-container {
            width: 100% !important;
        }

        /* Estilo para la animación del campo adicional */
        .field-appear {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>
</head>
@php
    $mac = $_POST['mac'];
    $ip = $_POST['ip'];
    $username = $_POST['username'];
    $linklogin = $_POST['link-login'];
    $linkorig = $_POST['link-orig'];
    $error = $_POST['error'];
    $chapid = $_POST['chap-id'];
    $chapchallenge = $_POST['chap-challenge'];
    $linkloginonly = $_POST['link-login-only'];
    $linkorigesc = $_POST['link-orig-esc'];
    $macesc = $_POST['mac-esc'];

    $mac_address = str_replace('&quot', '', $mac);
@endphp

<!-- $(if chap-id) -->



<body class="bg-gradient-to-b from-white to-green-100 flex items-center justify-center min-h-screen p-4">
    <div
        class="bg-white card-shadow rounded-lg overflow-hidden w-full max-w-md border-t-4 border-pri-green animate-fadeIn">
        <!-- Franja tricolor en la parte superior -->
        <div class="flex h-2">
            <div class="w-1/3 bg-pri-green"></div>
            <div class="w-1/3 bg-white"></div>
            <div class="w-1/3 bg-pri-red"></div>
        </div>

        <div class="bg-pri-red p-5 text-white text-center embossed-bg">
            <i class="fas fa-wifi text-4xl mb-3 drop-shadow-md"></i>
            <h1 class="text-2xl font-bold mb-1">WiFi Gratuito</h1>
            <p class="text-sm opacity-90">Cortesía de su candidato del PRI a la Presidencia Municipal</p>
        </div>

        <!-- Nueva posición de la sección de patrocinador - más destacada -->
        <div
            class="bg-gradient-to-r from-blue-50 to-green-50 p-3 border-b border-gray-200 flex items-center justify-center">
            <div class="flex flex-col md:flex-row items-center">
                <img src="{{ asset('/img/Sattlink-logo-nuevo.png') }}" alt="Sattlink"
                    class="h-10 max-w-full transition-transform hover:scale-105 duration-300 mr-3">
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

        <div class="p-7">
            <div class="flex justify-center mb-5">
                <div class="relative overflow-hidden transform transition-transform hover:scale-102 duration-300 shadow-lg border-4 border-pri-green max-w-xs">
                    <!-- Franja tricolor en la parte superior de la imagen -->
                    <div class="absolute top-0 left-0 right-0 flex h-3 z-10">
                        <div class="w-1/3 bg-pri-green"></div>
                        <div class="w-1/3 bg-white"></div>
                        <div class="w-1/3 bg-pri-red"></div>
                    </div>

                    <img src="{{ asset('/img/logo-olivia.jpeg') }}" alt="Olivia Valera - Candidata PRI"
                        class="w-full h-auto object-cover mx-auto">

                  {{--   <!-- Etiqueta con nombre de la candidata -->
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-r from-pri-green to-pri-red p-2 text-white text-center">
                        <span class="font-bold text-sm sm:text-base">Olivia Valera</span>
                    </div> --}}
                </div>
            </div>

            <h2 class="text-2xl font-bold text-center text-pri-green mb-5">¡Juntos con Olivia por Tierra Blanca, Veracruz!</h2>

            <form class="mt-6 space-y-4" id="wifi-form" method="post"  name="login">
                @csrf
                <input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
                <input type="hidden" name="popup" value="true" />

                <div class="mb-4">
                    <input type="text" id="nombre" name="nombre"
                        class="w-full p-3 border border-gray-300 rounded-lg input-focus-effect transition-all duration-200"
                        placeholder="Nombre completo" required pattern="^[A-Za-zÀ-ÖØ-öø-ÿ]+ [A-Za-zÀ-ÖØ-öø-ÿ ]+$"
                        minlength="5">
                    <p class="error-message" id="nombre-error">Por favor ingrese nombre y apellido(s).</p>
                </div>

                <div class="mb-4">
                    <input type="tel" id="telefono" name="telefono"
                        class="w-full p-3 border border-gray-300 rounded-lg input-focus-effect transition-all duration-200"
                        placeholder="Teléfono (10 dígitos)" required pattern="[0-9]{10}" maxlength="10"
                        inputmode="numeric">
                    <p class="error-message" id="telefono-error">Ingrese un número válido de 10 dígitos.</p>
                    <p id="error-telefono" class="text-red-500 text-sm mt-1 hidden">Teléfono inválido.</p>

                </div>

                <div class="mb-4">
                    <select id="colonia" name="colonia" class="w-full select2-colonia">
                        <option value="">Seleccione una colonia</option>
                    </select>
                    <p class="error-message" id="colonia-error">Seleccione una colonia válida.</p>
                </div>

                <!-- Campo adicional para "Otra colonia" - inicialmente oculto -->
                <div id="otra-colonia-container" class="mb-4 hidden">
                    <label for="otra_colonia" class="block text-gray-700 text-sm font-medium mb-1">Especifica tu colonia</label>
                    <input type="text" id="otra_colonia" name="otra_colonia" class="w-full p-3 border border-gray-300 rounded-lg input-focus-effect transition-all duration-200"
                        placeholder="Escribe el nombre de tu colonia"
                        minlength="3">
                    <p class="error-message" id="otra_colonia-error">Por favor especifica el nombre de tu colonia.</p>
                </div>

                <!-- Reemplazar el input de localidad por un select2 -->
                <div class="mb-4">
                    <label for="localidad" class="block text-gray-700 text-sm font-medium mb-1">Localidad o Comunidad</label>
                    <select id="localidad" name="localidad" class="w-full select2-localidad">
                        <option value="">Seleccione una localidad</option>
                    </select>
                    <p class="error-message" id="localidad-error">Seleccione una localidad válida.</p>
                </div>

                <!-- Campo adicional para "Otra localidad" - inicialmente oculto -->
                <div id="otra-localidad-container" class="mb-4 hidden">
                    <label for="otra_localidad" class="block text-gray-700 text-sm font-medium mb-1">Especifica tu localidad</label>
                    <input type="text" id="otra_localidad" name="otra_localidad" class="w-full p-3 border border-gray-300 rounded-lg  transition-all duration-200"
                        placeholder="Escribe el nombre de tu localidad"
                        minlength="3">
                    <p class="error-message" id="otra_localidad-error">Por favor especifica el nombre de tu localidad.</p>
                </div>

                <h3 class="mt-7 font-semibold text-pri-green border-b-2 border-pri-green pb-2 text-lg">¿Qué necesidades
                    tiene su colonia o localidad?</h3>
                <div class="mt-4 space-y-2 bg-green-50 p-3 rounded-lg">
                    <label
                        class="flex items-center text-gray-700 hover:bg-white p-2 rounded-md transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" name="necesidades[]" value="alumbrado"
                            class="necesidad-checkbox mr-3 text-pri-green w-5 h-5"> <span>Alumbrado público</span>
                    </label>
                    <label
                        class="flex items-center text-gray-700 hover:bg-white p-2 rounded-md transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" name="necesidades[]" value="agua"
                            class="necesidad-checkbox mr-3 text-pri-green w-5 h-5"> <span>Agua Potable</span>
                    </label>
                    <label
                        class="flex items-center text-gray-700 hover:bg-white p-2 rounded-md transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" name="necesidades[]" value="drenaje"
                            class="necesidad-checkbox mr-3 text-pri-green w-5 h-5"> <span>Drenaje</span>
                    </label>
                    <label
                        class="flex items-center text-gray-700 hover:bg-white p-2 rounded-md transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" name="necesidades[]" value="espacios"
                            class="necesidad-checkbox mr-3 text-pri-green w-5 h-5"> <span>Espacios recreativos</span>
                    </label>
                    <label
                        class="flex items-center text-gray-700 hover:bg-white p-2 rounded-md transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" name="necesidades[]" value="pavimentacion"
                            class="necesidad-checkbox mr-3 text-pri-green w-5 h-5"> <span>Pavimentación</span>
                    </label>
                    <label
                        class="flex items-center text-gray-700 hover:bg-white p-2 rounded-md transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" name="necesidades[]" value="raspado"
                            class="necesidad-checkbox mr-3 text-pri-green w-5 h-5"> <span>Raspado de calles /
                            Caminos</span>
                    </label>
                    <label
                        class="flex items-center text-gray-700 hover:bg-white p-2 rounded-md transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" name="necesidades[]" value="salud"
                            class="necesidad-checkbox mr-3 text-pri-green w-5 h-5"> <span>Servicio de salud</span>
                    </label>
                </div>
                <p id="checkbox-error" class="text-red-500 text-sm mt-1 hidden">Por favor, seleccione al menos una
                    necesidad.</p>

                <button id="submit-btn" type="submit" disabled
                    class="w-full bg-gray-400 text-white py-3 mt-7 rounded-lg font-bold transition duration-300 flex items-center justify-center pulse-effect shadow-md cursor-not-allowed">
                    <span>Conectarme ahora</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </form>

            <div id="vote-message"
                class="hidden text-center mt-6 bg-green-50 p-5 rounded-lg border border-pri-green shadow-inner">
                <i class="fas fa-check-circle text-pri-green text-4xl mb-3"></i>
                <h3 class="text-xl font-bold text-pri-green">¡Gracias por su apoyo!</h3>
                <p class="text-gray-600 mb-4">Su voto es importante para construir un mejor Tierra Blanca.</p>
                <div class="bg-pri-green p-3 rounded-lg inline-block shadow-md">
                    <p class="text-white font-semibold">¡Ya puede disfrutar de su conexión a internet!</p>
                </div>
            </div>
        </div>

        <!-- Franja tricolor en la parte inferior -->
        <div class="flex h-2">
            <div class="w-1/3 bg-pri-green"></div>
            <div class="w-1/3 bg-white"></div>
            <div class="w-1/3 bg-pri-red"></div>
        </div>

        <div class="bg-gray-100 p-3 text-center text-xs text-gray-500">
            <p>© 2025 Campaña del PRI para la Presidencia Municipal de Tierra Blanca, Veracruz</p>
            <p>Este sitio web es una herramienta de campaña y no está afiliado a ninguna entidad gubernamental.</p>
            <p class="mt-1">La información proporcionada es confidencial y se utilizará únicamente con fines de
                campaña.</p>
            <!-- Firma adicional de Sattlink en el footer -->
            <div class="mt-2 pt-2 border-t border-gray-300">
                <a href="https://sattlink.com" class="text-blue-600 hover:underline flex items-center justify-center">
                    <i class="fas fa-globe text-xs mr-1"></i> Sattlink.com
                </a>
            </div>
        </div>
        <a id="autotrial"  href="<?php echo $linkloginonly; ?>?dst=<?php echo $linkorigesc; ?>&username=T-<?php echo $macesc; ?>"
            style="display: none;">
            Activar prueba
        </a>
    </div>
    {{-- add jquery --}}
    <script src="/js/jquery-3.6.0.min.js"></script>
    <!-- Añadir Select2 JS antes del script existente -->
    <script src="/select2-4.1.0-rc.0/select2-4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Función para obtener parámetros de la URL y rellenar campos ocultos
        function getUrlParameters() {
            const urlParams = new URLSearchParams(window.location.search);
            const mikrotikParams = [
                'mac', 'ip', 'username', 'link-login', 'link-orig', 'error',
                'chap-id', 'chap-challenge', 'link-login-only', 'link-status',
                'dst', 'popup'
            ];

            // Asignar cada parámetro al campo correspondiente
            mikrotikParams.forEach(param => {
                if (urlParams.has(param)) {
                    document.getElementById(param).value = urlParams.get(param);
                }
            });

            // Configurar la acción del formulario si existe link-login-only
            if (urlParams.has('link-login-only')) {
                document.getElementById('wifi-form').action = urlParams.get('link-login-only');
            }
        }

        // Función para redirigir al usuario a la página de status después de autenticarse
        function redirectToStatus() {
            const linkStatus = document.getElementById('link-status').value;
            if (linkStatus) {
                setTimeout(() => {
                    window.location.href = linkStatus;
                }, 3000); // Esperar 3 segundos antes de redireccionar
            }
        }

        // Cargar parámetros cuando la página esté lista
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.necesidad-checkbox'); // Declarar checkboxes aquí
            getUrlParameters();

            // Animación de entrada para elementos principales (código existente)
            setTimeout(() => {
                document.querySelectorAll('form > div').forEach((el, index) => {
                    el.style.opacity = '0';
                    el.style.animation = `fadeIn 0.3s ease-out forwards ${index * 0.1}s`;
                });
            }, 300);

            // Validaciones de formulario
            const inputs = document.querySelectorAll('#wifi-form input[required]');

            // Validación en tiempo real de cada campo
            inputs.forEach(input => {
                input.addEventListener('input', validateInput);
                input.addEventListener('blur', validateInput);
            });

            // Asegurar que solo se ingresen números en el campo teléfono
            let telefonoInput = document.getElementById('telefono');
            telefonoInput.addEventListener('keypress', function(e) {
                if (!/[0-9]/.test(e.key)) {
                    e.preventDefault();
                }
            });

            // Formatear automáticamente el número de teléfono
            telefonoInput.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10);
            });

            // Verificar estado del botón en cualquier cambio de entrada
            function checkFormValidity() {
                const inputs = document.querySelectorAll('#wifi-form input[required]');
                const checkboxes = document.querySelectorAll('.necesidad-checkbox');
                const submitBtn = document.getElementById('submit-btn');
                const checkboxError = document.getElementById('checkbox-error');

                // Verificar si al menos un checkbox está marcado
                let atLeastOneChecked = false;
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        atLeastOneChecked = true;
                    }
                });

                // Verificar si todos los campos requeridos son válidos
                let allFieldsValid = true;
                let allFieldsHaveValues = true;

                inputs.forEach(input => {
                    // Validar que el campo no esté vacío
                    if (input.value.trim() === '') {
                        allFieldsHaveValues = false;
                    }

                    // Validar que no tenga errores
                    if (input.classList.contains('input-error')) {
                        allFieldsValid = false;
                    }
                });

                // Mostrar/ocultar mensaje de error de checkboxes
                if (!atLeastOneChecked) {
                    checkboxError.classList.remove('hidden');
                } else {
                    checkboxError.classList.add('hidden');
                }

                // Validar el select de colonia
                if ($('#colonia').val() === '') {
                    // Ya no es obligatorio, así que no afecta la validez del formulario
                    // allFieldsValid = false;
                    // allFieldsHaveValues = false;
                }

                // Validar el campo de otra colonia si está visible
                if ($('#colonia').val() === 'otra') {
                    const otraColoniaInput = document.getElementById('otra_colonia');
                    if (otraColoniaInput && (otraColoniaInput.classList.contains('input-error') || otraColoniaInput.value.trim() === '')) {
                        allFieldsValid = false;
                        allFieldsHaveValues = false;
                    }
                }

                // Validar el select de localidad
                if ($('#localidad').val() === '') {
                    // Ya no es obligatorio, así que no afecta la validez del formulario
                    // allFieldsValid = false;
                    // allFieldsHaveValues = false;
                }

                // Validar el campo de otra localidad si está visible
                if ($('#localidad').val() === 'otra') {
                    const otraLocalidadInput = document.getElementById('otra_localidad');
                    if (otraLocalidadInput && (otraLocalidadInput.classList.contains('input-error') || otraLocalidadInput.value.trim() === '')) {
                        allFieldsValid = false;
                        allFieldsHaveValues = false;
                    }
                }

                // Habilitar/deshabilitar botón según validación completa
                if (allFieldsValid && allFieldsHaveValues && atLeastOneChecked) {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                    submitBtn.classList.add('bg-pri-red', 'hover:bg-red-700');
                } else {
                    submitBtn.disabled = true;
                    submitBtn.classList.remove('bg-pri-red', 'hover:bg-red-700');
                    submitBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
                }
            }

            // Modificar el validateInput para que también verifique el estado del botón
            function validateInput(e) {
                const input = e.target;
                const errorMsgEl = document.getElementById(`${input.id}-error`);
                let isValid = true;

                // Validación específica por tipo de campo
                switch (input.id) {
                    case 'nombre':
                        // Validar que contenga al menos nombre y apellido
                        const nameParts = input.value.trim().split(' ').filter(part => part.length > 0);
                        isValid = nameParts.length >= 2 && input.value.length >= 5;
                        break;

                    case 'telefono':
                        // Validar que sea exactamente 10 dígitos numéricos
                        isValid = /^[0-9]{10}$/.test(input.value);
                        break;

                    case 'colonia':
                    case 'localidad':
                        // Validar longitud mínima de 3 caracteres
                        isValid = input.value.trim().length >= 3;
                        break;
                }

                // Aplicar estilos según validación
                if (!isValid) {
                    input.classList.add('input-error');
                    input.classList.remove('input-valid');
                    errorMsgEl.style.display = 'block';
                } else {
                    input.classList.remove('input-error');
                    input.classList.add('input-valid');
                    if (errorMsgEl) {
                        errorMsgEl.style.display = 'none';
                    }
                }

                // Verificar estado del formulario completo
               // checkFormValidity();

                return isValid;
            }

            // Ejecutar verificación inicial
            checkFormValidity();

            const errorMsg = document.getElementById('error-telefono');

            function validarTelefono(tel) {
                // Debe tener exactamente 10 dígitos
                if (!/^[0-9]{10}$/.test(tel)) return false;

                // Evitar secuencias repetidas como 0000000000, 1111111111, etc.
                if (/^(\d)\1{9}$/.test(tel)) return false;

                // Evitar secuencias ascendentes o descendentes
                const secuenciasInvalidas = ['0123456789', '1234567890', '9876543210', '1234567890', '0987654321',
                    '1111111111',
                    '2222222222', '3333333333', '4444444444', '5555555555', '6666666666', '7777777777',
                    '8888888888',
                    '9999999999'
                ];
                if (secuenciasInvalidas.includes(tel)) return false;

                // Validar que no comience con ladas inválidas (ej. 555 para CDMX o 800, 900)
                const lada = tel.substring(0, 3);
                const ladasInvalidas = ['555', '800', '900']; // Puedes ajustar según tus necesidades
                if (ladasInvalidas.includes(lada)) return false;

                return true;
            }

            telefonoInput.addEventListener('input', () => {
                const tel = telefonoInput.value.trim();
                if (validarTelefono(tel)) {
                    telefonoInput.classList.remove('border-red-500');
                    telefonoInput.classList.add('border-green-500');
                    errorMsg.classList.add('hidden');
                } else {
                    telefonoInput.classList.remove('border-green-500');
                    telefonoInput.classList.add('border-red-500');
                    errorMsg.classList.remove('hidden');
                }
            });

            // Validar todos los campos al inicio
            const allRequiredInputs = document.querySelectorAll('#wifi-form input[required]');
            allRequiredInputs.forEach(input => {
                // Marcar visualmente los campos por completar
                input.classList.add('border-yellow-300', 'bg-yellow-50');

                // Al recibir foco, quitar el marcado amarillo
                input.addEventListener('focus', function() {
                    this.classList.remove('border-yellow-300', 'bg-yellow-50');
                }, {
                    once: true
                });
            });

            // Verificar estado del botón en cualquier cambio de entrada
            function checkFormValidity() {
                const inputs = document.querySelectorAll('#wifi-form input[required]');
                const checkboxes = document.querySelectorAll('.necesidad-checkbox');
                const submitBtn = document.getElementById('submit-btn');
                const checkboxError = document.getElementById('checkbox-error');

                // Verificar si al menos un checkbox está marcado
                let atLeastOneChecked = false;
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        atLeastOneChecked = true;
                    }
                });

                // Verificar si todos los campos requeridos son válidos
                let allFieldsValid = true;
                let allFieldsHaveValues = true;

                inputs.forEach(input => {
                    // Validar que el campo no esté vacío
                    if (input.value.trim() === '') {
                        allFieldsHaveValues = false;
                    }

                    // Validar que no tenga errores
                    if (input.classList.contains('input-error')) {
                        allFieldsValid = false;
                    }
                });

                // Mostrar/ocultar mensaje de error de checkboxes
                if (!atLeastOneChecked) {
                    checkboxError.classList.remove('hidden');
                } else {
                    checkboxError.classList.add('hidden');
                }

                // Validar el select de colonia
                if ($('#colonia').val() === '') {
                    // Ya no es obligatorio, así que no afecta la validez del formulario
                    // allFieldsValid = false;
                    // allFieldsHaveValues = false;
                }

                // Validar el campo de otra colonia si está visible
                if ($('#colonia').val() === 'otra') {
                    const otraColoniaInput = document.getElementById('otra_colonia');
                    if (otraColoniaInput && (otraColoniaInput.classList.contains('input-error') || otraColoniaInput.value.trim() === '')) {
                        allFieldsValid = false;
                        allFieldsHaveValues = false;
                    }
                }

                // Validar el select de localidad
                if ($('#localidad').val() === '') {
                    // Ya no es obligatorio, así que no afecta la validez del formulario
                    // allFieldsValid = false;
                    // allFieldsHaveValues = false;
                }

                // Validar el campo de otra localidad si está visible
                if ($('#localidad').val() === 'otra') {
                    const otraLocalidadInput = document.getElementById('otra_localidad');
                    if (otraLocalidadInput && (otraLocalidadInput.classList.contains('input-error') || otraLocalidadInput.value.trim() === '')) {
                        allFieldsValid = false;
                        allFieldsHaveValues = false;
                    }
                }

                // Habilitar/deshabilitar botón según validación completa
                if (allFieldsValid && allFieldsHaveValues && atLeastOneChecked) {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                    submitBtn.classList.add('bg-pri-red', 'hover:bg-red-700');
                } else {
                    submitBtn.disabled = true;
                    submitBtn.classList.remove('bg-pri-red', 'hover:bg-red-700');
                    submitBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
                }
            }

            // Validación específica para cada tipo de campo
            function validateInput(e) {
                const input = e.target;
                const errorMsgEl = document.getElementById(`${input.id}-error`);
                let isValid = true;

                switch (input.id) {
                    case 'nombre':
                        // Validar que contenga al menos nombre y apellido
                        const nameParts = input.value.trim().split(' ').filter(part => part.length > 0);
                        isValid = nameParts.length >= 2 && input.value.length >= 5;

                        // Validación adicional: Solo letras y espacios
                        isValid = isValid && /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/.test(input.value);
                        break;

                    case 'telefono':
                        // Usar la función validarTelefono que ya es completa
                        isValid = validarTelefono(input.value);
                        break;

                    case 'colonia':
                    case 'localidad':
                        // Validación más estricta para evitar solo espacios o caracteres especiales
                        isValid = input.value.trim().length >= 3 && /^[A-Za-zÀ-ÖØ-öø-ÿ0-9\s.,]+$/.test(input.value);
                        break;
                }

                // Aplicar estilos según validación
                if (!isValid) {
                    input.classList.add('input-error');
                    input.classList.remove('input-valid');
                    errorMsgEl.style.display = 'block';
                } else {
                    input.classList.remove('input-error');
                    input.classList.add('input-valid');
                    if (errorMsgEl) {
                        errorMsgEl.style.display = 'none';
                    }
                }

                // Verificar estado del formulario completo
                checkFormValidity();

                return isValid;
            }

            // Asegurar que todos los campos se validen en tiempo real
            const allInputs = document.querySelectorAll('#wifi-form input:not([type="hidden"])');
            allInputs.forEach(input => {
                // Validar en cada cambio
                input.addEventListener('input', validateInput);
                // Validar al salir del campo
                input.addEventListener('blur', validateInput);
            });

            // Validar checkboxes
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // Validar que al menos uno esté seleccionado
                    const atLeastOneChecked = Array.from(checkboxes).some(cb => cb.checked);
                    const errorMsg = document.getElementById('checkbox-error');

                    if (atLeastOneChecked) {
                        errorMsg.classList.add('hidden');
                    } else {
                        errorMsg.classList.remove('hidden');
                    }

                    // Actualizar estado del botón
                    checkFormValidity();
                });
            });

            // Ejecutar verificación inicial
            checkFormValidity();

            // Inicializar Select2 para colonia
            $('#colonia').select2({
                placeholder: 'Buscar colonia...',
                width: '100%',
                ajax: {
                    url: '{{ route("obtener.colonias") }}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term || '', // término de búsqueda o vacío para obtener todos
                            page: params.page || 1
                        };
                    },
                    processResults: function (data) {
                        // Mapear los resultados normales
                        const results = data.map(function(item) {
                            return {
                                id: item.nombre,
                                text: item.nombre
                            };
                        });

                        // Agregar la opción "Otra / No está en la lista"
                        if (results.length === 0 || !results.some(r => r.id === 'otra')) {
                            results.push({
                                id: 'otra',
                                text: 'Otra / No está en la lista'
                            });
                        }

                        return { results: results };
                    },
                    cache: true
                },
                minimumInputLength: 0 // Permite mostrar todas las opciones sin necesidad de escribir
            });

            // Manejar el evento de cambio para la opción "Otra"
            $('#colonia').on('change', function() {
                const selectedValue = $(this).val();
                if (selectedValue === 'otra') {
                    $('#otra-colonia-container').removeClass('hidden').addClass('animate-fadeIn');
                    // Hacer que el campo sea requerido cuando se muestra
                    $('#otra_colonia').attr('required', true);
                } else {
                    $('#otra-colonia-container').addClass('hidden');
                    // Quitar el atributo required cuando no está visible
                    $('#otra_colonia').removeAttr('required');
                }
                validateSelect(this);
            });

            // Validación para el campo "Otra colonia"
            $('#otra_colonia').on('input', function() {
                if ($('#colonia').val() === 'otra') {
                    validateOtraColonia(this);
                }
            });

            // Función para validar el select de colonia o localidad
            function validateSelect(select) {
                const errorMsgEl = document.getElementById(`${select.id}-error`);

                if (!select.value) {
                    // Estos campos ya no son obligatorios, así que no mostramos error
                    $(select).next('.select2-container').removeClass('border-red-500');
                    errorMsgEl.style.display = 'none';
                    return true;
                } else {
                    $(select).next('.select2-container').removeClass('border-red-500');
                    errorMsgEl.style.display = 'none';
                    return true;
                }

                // Actualizar estado del formulario
                checkFormValidity();
            }

            // Función para validar el campo de texto para otra colonia
            function validateOtraColonia(input) {
                const errorMsgEl = document.getElementById(`${input.id}-error`);

                if (input.value.trim().length < 3) {
                    input.classList.add('input-error');
                    input.classList.remove('input-valid');
                    errorMsgEl.style.display = 'block';
                    return false;
                } else {
                    input.classList.remove('input-error');
                    input.classList.add('input-valid');
                    errorMsgEl.style.display = 'none';
                    return true;
                }
            }

            // Función para validar el campo adicional de localidad (reutilizando la misma lógica)
            function validateOtraLocalidad(input) {
                return validateOtraColonia(input); // Misma validación
            }

            // Modificar la función checkFormValidity para incluir la validación del select y del campo adicional
            checkFormValidity = function() {
                const inputs = document.querySelectorAll('#wifi-form input[required]');
                const checkboxes = document.querySelectorAll('.necesidad-checkbox');
                const submitBtn = document.getElementById('submit-btn');
                const checkboxError = document.getElementById('checkbox-error');

                // Verificar si al menos un checkbox está marcado
                let atLeastOneChecked = false;
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        atLeastOneChecked = true;
                    }
                });

                // Verificar si todos los campos requeridos son válidos
                let allFieldsValid = true;
                let allFieldsHaveValues = true;

                inputs.forEach(input => {
                    // Validar que el campo no esté vacío
                    if (input.value.trim() === '') {
                        allFieldsHaveValues = false;
                    }

                    // Validar que no tenga errores
                    if (input.classList.contains('input-error')) {
                        allFieldsValid = false;
                    }
                });

                // Mostrar/ocultar mensaje de error de checkboxes
                if (!atLeastOneChecked) {
                    checkboxError.classList.remove('hidden');
                } else {
                    checkboxError.classList.add('hidden');
                }

                // Validar el select de colonia
                if ($('#colonia').val() === '') {
                    // Ya no es obligatorio, así que no afecta la validez del formulario
                    // allFieldsValid = false;
                    // allFieldsHaveValues = false;
                }

                // Validar el campo de otra colonia si está visible
                if ($('#colonia').val() === 'otra') {
                    const otraColoniaInput = document.getElementById('otra_colonia');
                    if (otraColoniaInput && (otraColoniaInput.classList.contains('input-error') || otraColoniaInput.value.trim() === '')) {
                        allFieldsValid = false;
                        allFieldsHaveValues = false;
                    }
                }

                // Validar el select de localidad
                if ($('#localidad').val() === '') {
                    // Ya no es obligatorio, así que no afecta la validez del formulario
                    // allFieldsValid = false;
                    // allFieldsHaveValues = false;
                }

                // Validar el campo de otra localidad si está visible
                if ($('#localidad').val() === 'otra') {
                    const otraLocalidadInput = document.getElementById('otra_localidad');
                    if (otraLocalidadInput && (otraLocalidadInput.classList.contains('input-error') || otraLocalidadInput.value.trim() === '')) {
                        allFieldsValid = false;
                        allFieldsHaveValues = false;
                    }
                }

                // Habilitar/deshabilitar botón según validación completa
                if (allFieldsValid && allFieldsHaveValues && atLeastOneChecked) {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                    submitBtn.classList.add('bg-pri-red', 'hover:bg-red-700');
                } else {
                    submitBtn.disabled = true;
                    submitBtn.classList.remove('bg-pri-red', 'hover:bg-red-700');
                    submitBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
                }
            };

            // Modificar la validación del formulario al enviar
            const formElement = document.querySelector("form");

            // Variable para evitar envíos duplicados
            let isSubmitting = false;

            formElement.onsubmit = function(event) {
                event.preventDefault();

                // Evitar envíos duplicados
                if (isSubmitting) {
                    console.log('Formulario ya está siendo enviado. Evitando duplicación.');
                    return false;
                }

                // Validar todos los campos antes de procesar
                const inputs = document.querySelectorAll('#wifi-form input[required]');
                let isFormValid = true;

                inputs.forEach(input => {
                    // Disparar evento de validación en cada input
                    const inputEvent = new Event('input', {
                        bubbles: true,
                        cancelable: true,
                    });
                    input.dispatchEvent(inputEvent);

                    // Verificar si hay errores de validación
                    if (input.classList.contains('input-error')) {
                        isFormValid = false;
                    }
                });

                // Validar el select de colonia - no afecta la validez general
                validateSelect(document.getElementById('colonia'));

                // Si "Otra" está seleccionada, validar el campo adicional
                if (document.getElementById('colonia').value === 'otra') {
                    if (!validateOtraColonia(document.getElementById('otra_colonia'))) {
                        isFormValid = false;
                    }
                }

                // Validar el select de localidad - no afecta la validez general
                validateSelect(document.getElementById('localidad'));

                // Si "Otra localidad" está seleccionada, validar el campo adicional
                if (document.getElementById('localidad').value === 'otra') {
                    if (!validateOtraLocalidad(document.getElementById('otra_localidad'))) {
                        isFormValid = false;
                    }
                }

                // Solo proceder si el formulario es válido
                if (!isFormValid) {
                    // Hacer scroll al primer error
                    const firstError = document.querySelector('.input-error');
                    if (firstError) {
                        firstError.focus();
                    }
                    return;
                }

                // Marcar que el formulario está en proceso de envío
                isSubmitting = true;

                // Mostrar spinner en el botón de envío
                const submitBtn = document.getElementById("submit-btn");
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Procesando...';
                submitBtn.disabled = true;

                // Recopilar datos del formulario
                const formData = new FormData(document.getElementById('wifi-form'));

                // Revisar si hay que agregar los campos opcionales explícitamente
                if ($('#colonia').val() === 'otra' && $('#otra_colonia').val()) {
                    // Asegurar que otra_colonia se incluye (incluso si no tiene el atributo 'required')
                    formData.set('otra_colonia', $('#otra_colonia').val());
                }

                if ($('#localidad').val() === 'otra' && $('#otra_localidad').val()) {
                    // Asegurar que otra_localidad se incluye (incluso si no tiene el atributo 'required')
                    formData.set('otra_localidad', $('#otra_localidad').val());
                }

                @if(isset($mac_address) && !empty($mac_address))
                    const mac = "{{ $mac_address }}";
                    formData.append('mac_address', mac);
                @endif

                // Asegurar que colonia y localidad se consideren como campos opcionales
                if (!$('#colonia').val()) {
                    formData.set('colonia', '');
                }

                if (!$('#localidad').val()) {
                    formData.set('localidad', '');
                }

                // Para depuración: mostrar qué campos se envían
                console.log('Datos a enviar:');
                for (let pair of formData.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }

                // Enviar datos mediante fetch
                fetch('/formulario', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => {
                    // Mostrar detalles completos de la respuesta para depuración
                    console.log('Respuesta del servidor:', response);

                    // Si la respuesta no es ok, capturar el texto de error para análisis
                    if (!response.ok) {
                        // Intentar obtener el texto del error para más detalles
                        return response.text().then(text => {
                            console.error('Error en texto de respuesta:', text);
                            throw new Error(`Error en la respuesta del servidor: ${response.status} - ${response.statusText}`);
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Datos enviados correctamente:', data);

                    // Mostrar mensaje de éxito
                    const voteMessage = document.getElementById("vote-message");
                    voteMessage.classList.remove("hidden");
                    voteMessage.style.animation = "fadeIn 0.5s ease-out forwards";

                    // Redirigir al enlace de prueba después de 3 segundos
                    setTimeout(() => {
                        const trialLink = document.getElementById('autotrial');
                        if (trialLink && trialLink.href) {
                            window.location.href = trialLink.href;
                        }
                    }, 3000);
                })
                .catch(error => {
                    console.error('Error detallado al enviar datos:', error);

                    // Mostrar información más detallada en la consola
                    console.error('Stack trace:', error.stack);

                    // Restaurar el botón en caso de error
                    submitBtn.innerHTML = '<span>Conectarme ahora</span><i class="fas fa-arrow-right ml-2"></i>';
                    submitBtn.disabled = false;

                    // Reiniciar la bandera de envío
                    isSubmitting = false;

                    // Mostrar mensaje de error más detallado si está disponible
                    alert('Hubo un problema al procesar su solicitud: ' + error.message + '\nPor favor, revise la consola para más detalles e intente nuevamente.');
                });
            };

            // Inicializar Select2 para localidad
            $('#localidad').select2({
                placeholder: 'Buscar localidad...',
                width: '100%',
                ajax: {
                    url: '{{ route("obtener.localidades") }}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term || '', // término de búsqueda o vacío para obtener todos
                            page: params.page || 1
                        };
                    },
                    processResults: function (data) {
                        // Mapear los resultados normales
                        const results = data.map(function(item) {
                            return {
                                id: item.nombre,
                                text: item.nombre
                            };
                        });

                        // Agregar la opción "Otra / No está en la lista"
                        if (results.length === 0 || !results.some(r => r.id === 'otra')) {
                            results.push({
                                id: 'otra',
                                text: 'Otra / No está en la lista'
                            });
                        }

                        return { results: results };
                    },
                    cache: true
                },
                minimumInputLength: 0 // Permite mostrar todas las opciones sin necesidad de escribir
            });

            // Manejar el evento de cambio para la opción "Otra localidad"
            $('#localidad').on('change', function() {
                const selectedValue = $(this).val();
                if (selectedValue === 'otra') {
                    $('#otra-localidad-container').removeClass('hidden').addClass('field-appear');
                    // Hacer que el campo sea requerido cuando se muestra
                    $('#otra_localidad').attr('required', true);
                } else {
                    $('#otra-localidad-container').addClass('hidden');
                    // Quitar el atributo required cuando no está visible
                    $('#otra_localidad').removeAttr('required');
                }
                validateSelect(this);
            });

            // Validación para el campo "Otra localidad"
            $('#otra_localidad').on('input', function() {
                if ($('#localidad').val() === 'otra') {
                    validateOtraLocalidad(this);
                }
            });

            // Función para validar el campo adicional de localidad
            function validateOtraLocalidad(input) {
                const errorMsgEl = document.getElementById(`${input.id}-error`);

                if (input.value.trim().length < 3) {
                    input.classList.add('input-error');
                    input.classList.remove('input-valid');
                    errorMsgEl.style.display = 'block';
                    return false;
                } else {
                    input.classList.remove('input-error');
                    input.classList.add('input-valid');
                    errorMsgEl.style.display = 'none';
                    return true;
                }

                // Actualizar estado del formulario
                checkFormValidity();
            }

            // Ejecutar verificación inicial
            checkFormValidity();
        });
    </script>
</body>

</html>

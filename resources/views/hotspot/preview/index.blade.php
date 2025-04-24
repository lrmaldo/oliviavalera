<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiFi Gratuito - Campaña PRI Tierra Blanca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    </style>
</head>
<body class="bg-gradient-to-b from-white to-green-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white card-shadow rounded-lg overflow-hidden w-full max-w-md border-t-4 border-pri-green animate-fadeIn">
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
        <div class="bg-gradient-to-r from-blue-50 to-green-50 p-3 border-b border-gray-200 flex items-center justify-center">
            <div class="flex flex-col md:flex-row items-center">
                <img src="{{asset('/img/Sattlink-logo-nuevo.png')}}" alt="Sattlink" class="h-10 max-w-full transition-transform hover:scale-105 duration-300 mr-3">
                <div class="text-center md:text-left">
                    <p class="text-sm text-gray-700 font-medium">Servicio de internet <span class="text-pri-green">en colaboración con:</span></p>
                    <p class="text-xs text-gray-500 italic">
                        <i class="fas fa-heart text-red-500 animate-pulse mx-1"></i>
                        Desarrollado con amor por el equipo de Sattlink
                    </p>
                </div>
            </div>
        </div>

        <div class="p-7">
            <div class="flex justify-center mb-5">
                <div class="rounded-full bg-pri-green p-2 inline-block shadow-lg transform transition-transform hover:scale-105 duration-300">
                    <img src="https://placehold.co/80x80/006847/FFFFFF?text=PRI" alt="Candidato PRI" class="h-24 w-24 rounded-full object-cover border-4 border-white">
                </div>
            </div>

            <h2 class="text-2xl font-bold text-center text-pri-green mb-5">¡Juntos por Tierra Blanca, Veracruz!</h2>

            <form class="mt-6 space-y-4" id="wifi-form">
                <div class="mb-4">
                    <input type="text" id="nombre" name="nombre" class="w-full p-3 border border-gray-300 rounded-lg input-focus-effect transition-all duration-200"
                           placeholder="Nombre completo"
                           required
                           pattern="^[A-Za-zÀ-ÖØ-öø-ÿ]+ [A-Za-zÀ-ÖØ-öø-ÿ ]+$"
                           minlength="5">
                    <p class="error-message" id="nombre-error">Por favor ingrese nombre y apellido(s).</p>
                </div>

                <div class="mb-4">
                    <input type="tel" id="telefono" name="telefono" class="w-full p-3 border border-gray-300 rounded-lg input-focus-effect transition-all duration-200"
                           placeholder="Teléfono (10 dígitos)"
                           required
                           pattern="[0-9]{10}"
                           maxlength="10"
                           inputmode="numeric">
                    <p class="error-message" id="telefono-error">Ingrese un número válido de 10 dígitos.</p>
                    <p id="error-telefono" class="text-red-500 text-sm mt-1 hidden">Teléfono inválido.</p>

                </div>

                <div class="mb-4">
                    <select id="colonia" name="colonia" class="w-full select2-colonia"
                           required>
                        <option value="">Seleccione una colonia</option>
                        <!-- La opción "Otra" se agregará dinámicamente -->
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

                <!-- Reemplazar el campo de localidad con un select2 -->
                <div class="mb-4">
                    <label for="localidad" class="block text-gray-700 text-sm font-medium mb-1">Localidad o Comunidad</label>
                    <select id="localidad" name="localidad" class="w-full select2-localidad"
                           required>
                        <option value="">Seleccione una localidad</option>
                        <!-- La opción "Otra" se agregará dinámicamente -->
                    </select>
                    <p class="error-message" id="localidad-error">Seleccione una localidad válida.</p>
                </div>

                <!-- Campo adicional para "Otra localidad" - inicialmente oculto -->
                <div id="otra-localidad-container" class="mb-4 hidden">
                    <label for="otra_localidad" class="block text-gray-700 text-sm font-medium mb-1">Especifica tu localidad</label>
                    <input type="text" id="otra_localidad" name="otra_localidad" class="w-full p-3 border border-gray-300 rounded-lg input-focus-effect transition-all duration-200"
                           placeholder="Escribe el nombre de tu localidad"
                           minlength="3">
                    <p class="error-message" id="otra_localidad-error">Por favor especifica el nombre de tu localidad.</p>
                </div>

                <h3 class="mt-7 font-semibold text-pri-green border-b-2 border-pri-green pb-2 text-lg">¿Qué necesidades tiene su colonia o localidad?</h3>
                <div class="mt-4 space-y-2 bg-green-50 p-3 rounded-lg">
                    <label class="flex items-center text-gray-700 hover:bg-white p-2 rounded-md transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" class="mr-3 text-pri-green w-5 h-5"> <span>Alumbrado público</span>
                    </label>
                    <label class="flex items-center text-gray-700 hover:bg-white p-2 rounded-md transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" class="mr-3 text-pri-green w-5 h-5"> <span>Agua Potable</span>
                    </label>
                    <label class="flex items-center text-gray-700 hover:bg-white p-2 rounded-md transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" class="mr-3 text-pri-green w-5 h-5"> <span>Drenaje</span>
                    </label>
                    <label class="flex items-center text-gray-700 hover:bg-white p-2 rounded-md transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" class="mr-3 text-pri-green w-5 h-5"> <span>Espacios recreativos</span>
                    </label>
                    <label class="flex items-center text-gray-700 hover:bg-white p-2 rounded-md transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" class="mr-3 text-pri-green w-5 h-5"> <span>Pavimentación</span>
                    </label>
                    <label class="flex items-center text-gray-700 hover:bg-white p-2 rounded-md transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" class="mr-3 text-pri-green w-5 h-5"> <span>Raspado de calles / Caminos</span>
                    </label>
                    <label class="flex items-center text-gray-700 hover:bg-white p-2 rounded-md transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" class="mr-3 text-pri-green w-5 h-5"> <span>Servicio de salud</span>
                    </label>
                </div>

                <button id="submit-btn" type="submit" class="w-full bg-pri-red hover:bg-red-700 text-white py-3 mt-7 rounded-lg font-bold transition duration-300 flex items-center justify-center pulse-effect shadow-md">
                    <span>Conectarme ahora</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </form>

            <div id="vote-message" class="hidden text-center mt-6 bg-green-50 p-5 rounded-lg border border-pri-green shadow-inner">
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
            <p class="mt-1">La información proporcionada es confidencial y se utilizará únicamente con fines de campaña.</p>
            <!-- Firma adicional de Sattlink en el footer -->
            <div class="mt-2 pt-2 border-t border-gray-300">
                <a href="#" class="text-blue-600 hover:underline flex items-center justify-center">
                    <i class="fas fa-globe text-xs mr-1"></i> Sattlink.com
                </a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Animación de entrada para elementos principales
        document.addEventListener('DOMContentLoaded', function() {
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
            const telefonoInput = document.getElementById('telefono');
            telefonoInput.addEventListener('keypress', function(e) {
                if (!/[0-9]/.test(e.key)) {
                    e.preventDefault();
                }
            });

            // Formatear automáticamente el número de teléfono
            telefonoInput.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10);
            });

            function validateInput(e) {
                const input = e.target;
                const errorMsgEl = document.getElementById(`${input.id}-error`);
                let isValid = true;

                // Validación específica por tipo de campo
                switch(input.id) {
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
                    errorMsgEl.style.display = 'none';
                }

                return isValid;
            }
        });

        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault();

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

            // Validar el campo de colonia
            if (!validateSelect(document.getElementById('colonia'))) {
                isFormValid = false;
            }

            // Si "Otra" está seleccionada, validar el campo adicional
            if (document.getElementById('colonia').value === 'otra') {
                if (!validateOtraColonia(document.getElementById('otra_colonia'))) {
                    isFormValid = false;
                }
            }

            // Si "Otra localidad" está seleccionada, validar el campo adicional
            if (document.getElementById('localidad').value === 'otra') {
                if (!validateOtraLocalidad(document.getElementById('otra_localidad'))) {
                    isFormValid = false;
                }
            }

            // Solo proceder si el formulario es válido
            if (isFormValid) {
                const button = document.getElementById("submit-btn");
                button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Procesando...';
                button.disabled = true;

                setTimeout(() => {
                    button.classList.add("hidden");
                    const message = document.getElementById("vote-message");
                    message.classList.remove("hidden");
                    message.style.animation = "fadeIn 0.5s ease-out forwards";
                }, 2000);
            } else {
                // Hacer scroll al primer error
                const firstError = document.querySelector('.input-error');
                if (firstError) {
                    firstError.focus();
                }
            }
        });

        // Inicializar Select2 para colonia - modificado para filtrar correctamente
        $('#colonia').select2({
            placeholder: 'Buscar colonia...',
            width: '100%',
            language: 'es',
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

        // Inicializar Select2 para localidad
        $('#localidad').select2({
            placeholder: 'Buscar localidad...',
            width: '100%',
            language: 'es',
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

        // Cargar todas las localidades al iniciar y configurar eventos
        $(document).ready(function() {
            // Trigger de carga inicial para mostrar todas las opciones
            $('#colonia').select2('open');
            $('#colonia').select2('close');
            
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

            // Cargar opciones de localidad al iniciar
            $('#localidad').select2('open');
            $('#localidad').select2('close');
            
            // Manejar evento de cambio para la opción "Otra localidad"
            $('#localidad').on('change', function() {
                const selectedValue = $(this).val();
                if (selectedValue === 'otra') {
                    $('#otra-localidad-container').removeClass('hidden').addClass('animate-fadeIn');
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
        });
        
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
        }

        // Validación para select2
        $('#colonia').on('change', function() {
            validateSelect(this);
        });

        function validateSelect(select) {
            const errorMsgEl = document.getElementById(`${select.id}-error`);
            
            if (!select.value) {
                $(select).next('.select2-container').addClass('border-red-500');
                errorMsgEl.style.display = 'block';
                return false;
            } else {
                $(select).next('.select2-container').removeClass('border-red-500');
                errorMsgEl.style.display = 'none';
                return true;
            }
        }

        const telefonoInput = document.getElementById('telefono');
        const errorMsg = document.getElementById('error-telefono');

        function validarTelefono(tel) {
            // Debe tener exactamente 10 dígitos
            if (!/^[0-9]{10}$/.test(tel)) return false;

            // Evitar secuencias repetidas como 0000000000, 1111111111, etc.
            if (/^(\d)\1{9}$/.test(tel)) return false;

            // Evitar secuencias ascendentes o descendentes
            const secuenciasInvalidas = ['0123456789', '1234567890', '9876543210','1234567890', '0987654321', '1111111111', '2222222222', '3333333333', '4444444444', '5555555555', '6666666666', '7777777777', '8888888888', '9999999999'];
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
    </script>
</body>
</html>

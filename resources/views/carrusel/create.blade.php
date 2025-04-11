@extends('layouts.app')

@section('content')
<div class="py-6 max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-slate-700 to-slate-900 px-6 py-4">
            <h2 class="text-xl font-bold text-white">Crear Nuevo Contenido</h2>
        </div>

        <div class="p-6">
            @include('components.alert')

            <form action="{{ route('carrusel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Columna izquierda -->
                    <div class="space-y-5">
                        <div>
                            <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-slate-500 focus:border-slate-500 transition duration-150"
                                id="titulo" name="titulo" value="{{ old('titulo') }}" placeholder="Ingrese el título">
                            @error('titulo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                            <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-slate-500 focus:border-slate-500 transition duration-150"
                                id="descripcion" name="descripcion" rows="4" placeholder="Ingrese una descripción">{{ old('descripcion') }}</textarea>
                            @error('descripcion') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="tipo" class="block text-sm font-medium text-gray-700 mb-1">Tipo de contenido</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-slate-500 focus:border-slate-500 transition duration-150"
                                    id="tipo" name="tipo">
                                    <option value="imagen" {{ old('tipo') == 'imagen' ? 'selected' : '' }}>Imagen</option>
                                    <option value="video" {{ old('tipo') == 'video' ? 'selected' : '' }}>Video</option>
                                </select>
                                @error('tipo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="orden" class="block text-sm font-medium text-gray-700 mb-1">Orden</label>
                                <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-slate-500 focus:border-slate-500 transition duration-150"
                                    id="orden" name="orden" min="0" value="{{ old('orden', 0) }}" placeholder="0">
                                @error('orden') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input type="checkbox" class="h-5 w-5 text-slate-600 border-gray-300 rounded focus:ring-slate-500 transition duration-150"
                                        id="activo" name="activo" value="1" {{ old('activo') ? 'checked' : 'checked' }}>
                                </div>
                                <div class="ml-3">
                                    <label for="activo" class="font-medium text-gray-700">Mostrar en carrusel</label>
                                    <p class="text-gray-500 text-sm">El contenido será visible para los visitantes</p>
                                </div>
                            </div>
                            @error('activo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Columna derecha -->
                    <div class="bg-gray-50 rounded-lg p-5 border border-gray-200">
                        <div>
                            <label for="archivo" class="block text-sm font-medium text-gray-700 mb-2">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Subir archivo (imagen o video)
                                </div>
                            </label>
                            <div id="drop-area" class="relative border-2 border-dashed border-gray-300 rounded-lg p-6 transition-all duration-200 hover:border-slate-400 hover:bg-slate-50">
                                <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                    id="archivo" name="archivo" accept=".jpg,.jpeg,.png,.mp4">
                                <div class="text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="mt-1 text-sm text-gray-600">Arrastra y suelta o <span class="font-medium text-slate-600 hover:text-slate-500">selecciona un archivo</span></p>
                                    <p class="mt-1 text-xs text-gray-500">Formatos permitidos: JPG, PNG, MP4</p>
                                    <p class="text-xs text-gray-500">Tamaño máximo: 20MB</p>
                                </div>
                            </div>
                            @error('archivo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="mt-6">
                            <p class="text-sm font-medium text-gray-700 mb-2">Información del archivo:</p>
                            <div id="preview-container" class="bg-white border border-gray-200 rounded-lg p-4 flex items-center justify-center h-56">
                                <div id="no-file-selected" class="text-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="mt-2">No hay archivo seleccionado</p>
                                </div>
                                <div id="image-preview" class="hidden w-full h-full flex items-center justify-center">
                                    <img id="preview-img" src="#" alt="Vista previa" class="max-h-full max-w-full object-contain rounded">
                                </div>
                                <div id="video-preview" class="hidden text-center w-full">
                                    <div class="bg-slate-50 p-4 rounded-lg inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span id="video-name" class="ml-3 text-sm font-medium text-gray-700"></span>
                                    </div>
                                    <p class="mt-3 text-xs text-slate-500">El video se podrá visualizar una vez guardado</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-5 border-t border-gray-200 flex justify-between">
                    <a href="{{ route('carrusel.index') }}" class="px-5 py-2 bg-white border border-gray-300 rounded-md font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-colors duration-150 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                        </svg>
                        Cancelar
                    </a>
                    <button type="submit" class="inline-flex justify-center items-center py-2 px-5 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('archivo');
        const tipoSelect = document.getElementById('tipo');
        const noFileSelected = document.getElementById('no-file-selected');
        const imagePreview = document.getElementById('image-preview');
        const videoPreview = document.getElementById('video-preview');
        const previewImg = document.getElementById('preview-img');
        const videoName = document.getElementById('video-name');
        const dropArea = document.getElementById('drop-area');

        // Funciones de vista previa de archivos
        function handleFileSelect(file) {
            // Ocultar todos los contenedores de previsualización
            noFileSelected.classList.add('hidden');
            imagePreview.classList.add('hidden');
            videoPreview.classList.add('hidden');

            if (file) {
                const fileName = file.name;
                const fileExtension = fileName.split('.').pop().toLowerCase();

                // Detectar si es imagen o video
                if (['jpg', 'jpeg', 'png'].includes(fileExtension)) {
                    // Es una imagen
                    const objectUrl = URL.createObjectURL(file);
                    previewImg.src = objectUrl;
                    imagePreview.classList.remove('hidden');

                    // Actualizar automáticamente el tipo de contenido
                    tipoSelect.value = 'imagen';
                } else if (fileExtension === 'mp4') {
                    // Es un video
                    videoName.textContent = fileName;
                    videoPreview.classList.remove('hidden');

                    // Actualizar automáticamente el tipo de contenido
                    tipoSelect.value = 'video';
                }
            } else {
                // No hay archivo seleccionado
                noFileSelected.classList.remove('hidden');
            }
        }

        // Eventos para el input file estándar
        fileInput.addEventListener('change', function() {
            handleFileSelect(this.files[0]);
        });

        // Eventos para arrastrar y soltar
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // Efectos visuales durante el arrastre
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            dropArea.classList.add('border-slate-500', 'bg-slate-50');
            dropArea.classList.remove('border-gray-300');
        }

        function unhighlight() {
            dropArea.classList.remove('border-slate-500', 'bg-slate-50');
            dropArea.classList.add('border-gray-300');
        }

        // Manejar el evento drop
        dropArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const file = dt.files[0];

            // Asignar el archivo al input file para que se envíe con el formulario
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            fileInput.files = dataTransfer.files;

            // Mostrar vista previa
            handleFileSelect(file);
        }
    });
</script>
@endsection

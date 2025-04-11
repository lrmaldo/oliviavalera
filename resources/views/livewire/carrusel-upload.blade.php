<div class="py-6 max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4">
            <h2 class="text-xl font-bold text-white">
                {{ isset($isEditing) && $isEditing ? 'Actualizar Elemento' : 'Nuevo Elemento del Carrusel' }}
            </h2>
        </div>

        <form wire:submit.prevent="save" enctype="multipart/form-data" class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Columna izquierda: Detalles -->
                <div class="space-y-5">
                    <div>
                        <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" id="titulo" wire:model="titulo" placeholder="Ingrese el título">
                        @error('titulo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                        <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" id="descripcion" rows="4" wire:model="descripcion" placeholder="Ingrese una descripción"></textarea>
                        @error('descripcion') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="tipo" class="block text-sm font-medium text-gray-700 mb-1">Tipo de contenido</label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" id="tipo" wire:model="tipo">
                                <option value="imagen">Imagen</option>
                                <option value="video">Video</option>
                            </select>
                            @error('tipo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="orden" class="block text-sm font-medium text-gray-700 mb-1">Orden</label>
                            <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" id="orden" wire:model="orden" min="0" placeholder="0">
                            @error('orden') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-lg p-5 border border-gray-200 dark:border-gray-700 shadow-sm transition-all duration-200 hover:shadow-md">
                        <div class="flex items-start space-x-4">
                            <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                <input type="checkbox" id="activo" wire:model="activo" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 border-gray-300 appearance-none cursor-pointer transition-transform duration-200 ease-in-out translate-x-0 checked:translate-x-4 checked:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-300">
                                <label for="activo" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-200 cursor-pointer"></label>
                            </div>
                            <div class="flex-1">
                                <label for="activo" class="text-base font-semibold text-gray-800 dark:text-gray-200 cursor-pointer">Mostrar en carrusel</label>
                                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">El contenido será visible para los visitantes del sitio</p>
                            </div>
                            <div class="flex items-center">
                                <div class="text-xs px-2 py-1 rounded-full {{ $activo ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                                    {{ $activo ? 'Visible' : 'Oculto' }}
                                </div>
                            </div>
                        </div>
                        @error('activo')
                            <div class="mt-2 flex items-center text-red-600 text-xs">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Columna derecha: Previsualización -->
                <div class="bg-gray-50 rounded-lg p-5 border border-gray-200">
                    <div class="mb-4">
                        <label for="archivo" class="block text-sm font-medium text-gray-700 mb-2">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Subir archivo (imagen o video)
                            </div>
                        </label>
                        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-6 transition-all duration-200 hover:border-indigo-400 hover:bg-indigo-50">
                            <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" id="archivo" wire:model="archivo" accept=".jpg,.jpeg,.png,.mp4">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mt-1 text-sm text-gray-600">Arrastra y suelta o <span class="font-medium text-indigo-600 hover:text-indigo-500">selecciona un archivo</span></p>
                                <p class="mt-1 text-xs text-gray-500">Formatos permitidos: JPG, PNG, MP4</p>
                                <p class="text-xs text-gray-500">Tamaño máximo: 20MB</p>
                            </div>
                        </div>
                        @error('archivo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-4">
                        <p class="text-sm font-medium text-gray-700 mb-2">Vista previa:</p>
                        <div class="bg-white border border-gray-200 rounded-lg p-4 flex items-center justify-center">
                            @if(isset($archivo) && $archivo)
                                @if(method_exists($archivo, 'getClientOriginalExtension') && in_array(strtolower($archivo->getClientOriginalExtension()), ['jpg', 'jpeg', 'png']))
                                    <img src="{{ $archivo->temporaryUrl() }}" class="max-h-64 max-w-full object-contain rounded" alt="Vista previa">
                                @elseif(method_exists($archivo, 'getClientOriginalExtension') && strtolower($archivo->getClientOriginalExtension()) === 'mp4')
                                    <div class="text-center w-full">
                                        <div class="bg-indigo-50 p-4 rounded-lg inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="ml-3 text-sm font-medium text-gray-700">{{ $archivo->getClientOriginalName() }}</span>
                                        </div>
                                    </div>
                                @endif
                            @elseif(isset($isEditing) && $isEditing && isset($carrusel) && $carrusel)
                                @if($carrusel->tipo === 'imagen')
                                    <img src="{{ $carrusel->archivo_url }}" class="max-h-64 max-w-full object-contain rounded" alt="{{ $carrusel->titulo }}">
                                @else
                                    <video class="max-h-64 max-w-full object-contain rounded" controls>
                                        <source src="{{ $carrusel->archivo_url }}" type="video/mp4">
                                        Tu navegador no soporta videos HTML5.
                                    </video>
                                @endif
                            @else
                                <div class="text-center text-gray-400 py-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="mt-2">No hay archivo seleccionado</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-5 border-t border-gray-200 flex justify-between">
                <a href="{{ route('carrusel.index') }}" class="px-5 py-2 bg-white border border-gray-300 rounded-md font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-150 inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                    Cancelar
                </a>
                <button type="submit" class="inline-flex justify-center items-center py-2 px-5 border border-transparent rounded-md shadow-sm text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ isset($isEditing) && $isEditing ? 'Actualizar' : 'Guardar' }}
                </button>
            </div>
        </form>
    </div>
</div>

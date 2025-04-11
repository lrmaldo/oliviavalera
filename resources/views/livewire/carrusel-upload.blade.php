<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="titulo" wire:model="titulo">
            @error('titulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="descripcion" rows="3" wire:model="descripcion"></textarea>
            @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="archivo" class="block text-sm font-medium text-gray-700">Archivo (imagen o video)</label>
            <input type="file" class="mt-1 block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-md file:border-0
                file:text-sm file:font-semibold
                file:bg-indigo-50 file:text-indigo-700
                hover:file:bg-indigo-100" id="archivo" wire:model="archivo" accept=".jpg,.jpeg,.png,.mp4">
            <p class="mt-1 text-sm text-gray-500">Formatos permitidos: jpg, png, mp4. Tamaño máximo: 20MB</p>
            @error('archivo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

            <div class="mt-2">
                @if(isset($archivo) && $archivo)
                    @if(method_exists($archivo, 'getClientOriginalExtension') && in_array(strtolower($archivo->getClientOriginalExtension()), ['jpg', 'jpeg', 'png']))
                        <img src="{{ $archivo->temporaryUrl() }}" class="h-32 w-auto rounded" alt="Vista previa">
                    @elseif(method_exists($archivo, 'getClientOriginalExtension') && strtolower($archivo->getClientOriginalExtension()) === 'mp4')
                        <div class="p-4 bg-gray-50 rounded-md">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-2 text-sm text-gray-500">Video cargado: {{ $archivo->getClientOriginalName() }}</span>
                            </div>
                        </div>
                    @endif
                @elseif(isset($isEditing) && $isEditing && isset($carrusel) && $carrusel)
                    @if($carrusel->tipo === 'imagen')
                        <img src="{{ $carrusel->archivo_url }}" class="h-32 w-auto rounded" alt="{{ $carrusel->titulo }}">
                    @else
                        <video class="h-32 w-auto rounded" controls>
                            <source src="{{ $carrusel->archivo_url }}" type="video/mp4">
                            Tu navegador no soporta videos HTML5.
                        </video>
                    @endif
                @endif
            </div>
        </div>

        <div class="mb-3">
            <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de contenido</label>
            <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="tipo" wire:model="tipo">
                <option value="imagen">Imagen</option>
                <option value="video">Video</option>
            </select>
            @error('tipo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="orden" class="block text-sm font-medium text-gray-700">Orden</label>
            <input type="number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="orden" wire:model="orden" min="0">
            @error('orden') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3 flex items-start">
            <div class="flex items-center h-5">
                <input type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" id="activo" wire:model="activo">
            </div>
            <div class="ml-3 text-sm">
                <label for="activo" class="font-medium text-gray-700">Activo</label>
                <p class="text-gray-500">El contenido será visible en el carrusel</p>
            </div>
            @error('activo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-between pt-5">
            <a href="{{ route('carrusel.index') }}" class="px-4 py-2 bg-gray-200 border border-transparent rounded-md font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Cancelar
            </a>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ isset($isEditing) && $isEditing ? 'Actualizar' : 'Guardar' }}
            </button>
        </div>
    </form>
</div>

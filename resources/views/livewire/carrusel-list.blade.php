<div>
    @if(isset($contenidos) && $contenidos->isNotEmpty())
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">Orden</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/5">Contenido</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody id="sortable-list" class="bg-white divide-y divide-gray-200">
                    @foreach($contenidos as $contenido)
                        <tr data-id="{{ $contenido->id }}" class="cursor-move hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap handle font-medium">{{ $contenido->orden }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($contenido->tipo === 'imagen')
                                    <img src="{{ $contenido->archivo_url }}"
                                         class="h-20 w-auto object-cover rounded cursor-pointer"
                                         alt="{{ $contenido->titulo }}"
                                         wire:click="showContentDetails({{ $contenido->id }})">
                                @else
                                    <div class="cursor-pointer" wire:click="showContentDetails({{ $contenido->id }})">
                                        <video class="h-20 w-auto rounded">
                                            <source src="{{ $contenido->archivo_url }}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $contenido->titulo ?? 'Sin título' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($contenido->tipo) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button wire:click="toggleActive({{ $contenido->id }})"
                                    class="px-4 py-2 text-sm rounded-md {{ $contenido->activo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $contenido->activo ? 'Activo' : 'Inactivo' }}
                                </button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <button wire:click="showContentDetails({{ $contenido->id }})" class="text-indigo-600 hover:text-indigo-900">Ver</button>
                                    <a href="{{ route('carrusel.edit', $contenido->id) }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                                    <button wire:click="deleteItem({{ $contenido->id }})" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Estás seguro?')">
                                        Eliminar
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">
                        No hay contenidos disponibles.
                        <a href="{{ route('carrusel.create') }}" class="font-medium text-yellow-700 underline hover:text-yellow-600">
                            Crear nuevo contenido
                        </a>
                    </p>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal para mostrar detalles del contenido -->
    @if($showModal && $selectedContent)
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-gray-900/75 transition-opacity" wire:click="closeModal"></div>

            <!-- Modal panel -->
            <div class="relative w-full max-w-2xl transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8">
                <div class="p-5 sm:p-6">
                    <div class="flex flex-col">
                        <h3 class="mb-4 text-xl font-semibold text-gray-900" id="modal-title">
                            {{ $selectedContent->titulo ?? 'Sin título' }}
                        </h3>
                        <div class="mt-2">
                            <!-- Content preview -->
                            <div class="mb-6 flex justify-center">
                                @if($selectedContent->tipo === 'imagen')
                                    <img src="{{ $selectedContent->archivo_url }}" class="max-h-96 w-auto rounded object-contain" alt="{{ $selectedContent->titulo }}">
                                @else
                                    <video class="max-h-96 w-auto rounded" controls>
                                        <source src="{{ $selectedContent->archivo_url }}" type="video/mp4">
                                    </video>
                                @endif
                            </div>
                            <!-- Content details -->
                            <div class="grid grid-cols-1 gap-4 text-sm sm:grid-cols-2">
                                <div>
                                    <p class="font-medium text-gray-700">Tipo:</p>
                                    <p>{{ ucfirst($selectedContent->tipo) }}</p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-700">Estado:</p>
                                    <p>{{ $selectedContent->activo ? 'Activo' : 'Inactivo' }}</p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-700">Orden:</p>
                                    <p>{{ $selectedContent->orden }}</p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-700">Fecha de creación:</p>
                                    <p>{{ $selectedContent->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                                @if($selectedContent->descripcion)
                                <div class="col-span-full">
                                    <p class="font-medium text-gray-700">Descripción:</p>
                                    <p>{{ $selectedContent->descripcion }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-b from-white to-gray-50 px-6 py-4 sm:px-6 border-t border-gray-200 flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-3 sm:space-x-reverse gap-3 sm:gap-0">
                    <button type="button"
                            wire:click="closeModal"
                            class="group w-full sm:w-auto flex justify-center items-center gap-2 px-4 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-gray-400 shadow-sm transition-all duration-150 ease-in-out"
                            aria-label="Cerrar modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 group-hover:text-gray-700 transition-colors duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cerrar
                    </button>

                    <a href="{{ route('carrusel.edit', $selectedContent->id) }}"
                       class="group w-full sm:w-auto flex justify-center items-center gap-2 px-4 py-2.5 rounded-lg text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 shadow-sm transition-all duration-150 ease-in-out"
                       aria-label="Editar contenido">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-200 group-hover:text-white transition-colors duration-150" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Editar
                    </a>
                    <button wire:click="deleteItem({{ $selectedContent->id }})"
                           onclick="return confirm('¿Estás seguro de que deseas eliminar este contenido?')"
                           class="group w-full sm:w-auto flex justify-center items-center gap-2 px-4 py-2.5 rounded-lg text-sm font-medium text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1 shadow-sm transition-all duration-150 ease-in-out"
                           aria-label="Eliminar contenido">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-200 group-hover:text-white transition-colors duration-150" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <style>
        .cursor-move {
            cursor: move;
        }
        .handle {
            cursor: move;
            font-weight: bold;
        }
    </style>
</div>

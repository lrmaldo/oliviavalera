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
                                    <img src="{{ $contenido->archivo_url }}" class="h-20 w-auto object-cover rounded" alt="{{ $contenido->titulo }}">
                                @else
                                    <video class="h-20 w-auto rounded" controls>
                                        <source src="{{ $contenido->archivo_url }}" type="video/mp4">
                                    </video>
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
                                    <a href="{{ route('carrusel.show', $contenido->id) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
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

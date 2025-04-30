<div>
    <!-- Panel de filtros -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <h3 class="text-lg font-medium text-gray-700 mb-4">Filtros y búsqueda</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <!-- Búsqueda general -->
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700">Búsqueda</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" wire:model.debounce.300ms="search" id="search" class="focus:ring-pri-red focus:border-pri-red block w-full pl-10 pr-3 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Nombre o teléfono">
                </div>
            </div>

            <!-- Filtro por colonia -->
            <div>
                <label for="colonia" class="block text-sm font-medium text-gray-700">Colonia</label>
                <select wire:model="colonia" id="colonia" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-pri-red focus:border-pri-red sm:text-sm rounded-md">
                    <option value="">Todas las colonias</option>
                    @foreach($colonias as $col)
                        <option value="{{ $col }}">{{ $col }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filtro por localidad -->
            <div>
                <label for="localidad" class="block text-sm font-medium text-gray-700">Localidad</label>
                <select wire:model="localidad" id="localidad" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-pri-red focus:border-pri-red sm:text-sm rounded-md">
                    <option value="">Todas las localidades</option>
                    @foreach($localidades as $loc)
                        <option value="{{ $loc }}">{{ $loc }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Resultados por página -->
            <div>
                <label for="perPage" class="block text-sm font-medium text-gray-700">Mostrar</label>
                <select wire:model="perPage" id="perPage" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-pri-red focus:border-pri-red sm:text-sm rounded-md">
                    <option value="10">10 por página</option>
                    <option value="25">25 por página</option>
                    <option value="50">50 por página</option>
                    <option value="100">100 por página</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
            <!-- Fecha de inicio -->
            <div>
                <label for="fechaInicio" class="block text-sm font-medium text-gray-700">Desde</label>
                <input type="date" wire:model="fechaInicio" id="fechaInicio" class="mt-1 focus:ring-pri-red focus:border-pri-red block w-full sm:text-sm border-gray-300 rounded-md">
            </div>

            <!-- Fecha de fin -->
            <div>
                <label for="fechaFin" class="block text-sm font-medium text-gray-700">Hasta</label>
                <input type="date" wire:model="fechaFin" id="fechaFin" class="mt-1 focus:ring-pri-red focus:border-pri-red block w-full sm:text-sm border-gray-300 rounded-md">
            </div>

            <!-- Botón de reseteo -->
            <div class="flex items-end">
                <button wire:click="resetFilters" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded inline-flex items-center transition-colors">
                    <i class="fas fa-eraser mr-2"></i> Limpiar filtros
                </button>
            </div>
        </div>
    </div>

    <!-- Tabla de registros -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="flex justify-between items-center p-4 border-b">
            <h2 class="text-xl font-semibold text-gray-800">Listado de Formularios</h2>
            <div class="text-sm text-gray-500">
                Mostrando {{ $formularios->firstItem() ?? 0 }} a {{ $formularios->lastItem() ?? 0 }} de {{ $formularios->total() }} registros
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="sortBy('nombre')">
                            <div class="flex items-center">
                                Nombre
                                @if($sortField === 'nombre')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                @endif
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="sortBy('telefono')">
                            <div class="flex items-center">
                                Teléfono
                                @if($sortField === 'telefono')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                @endif
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="sortBy('colonia')">
                            <div class="flex items-center">
                                Colonia
                                @if($sortField === 'colonia')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                @endif
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="sortBy('localidad')">
                            <div class="flex items-center">
                                Localidad
                                @if($sortField === 'localidad')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                @endif
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Necesidades
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="sortBy('created_at')">
                            <div class="flex items-center">
                                Fecha
                                @if($sortField === 'created_at')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                @endif
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($formularios as $formulario)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $formulario->nombre }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $formulario->telefono }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $formulario->colonia }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $formulario->localidad }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                @if(is_array($formulario->necesidades))
                                    <div class="flex flex-wrap gap-1">
                                        @foreach(array_slice($formulario->necesidades, 0, 2) as $necesidad)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                {{ $necesidad }}
                                            </span>
                                        @endforeach
                                        @if(count($formulario->necesidades) > 2)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                +{{ count($formulario->necesidades) - 2 }}
                                            </span>
                                        @endif
                                    </div>
                                @else
                                    No especificado
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $formulario->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button class="text-pri-red hover:text-pri-red/80 mr-2" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-folder-open text-gray-300 text-5xl mb-4"></i>
                                    <p class="text-lg font-medium">No se encontraron registros</p>
                                    <p class="text-sm">Intenta ajustar los filtros de búsqueda</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 sm:px-6">
            {{ $formularios->links() }}
        </div>
    </div>

    <!-- Estado de carga -->
    <div wire:loading class="fixed top-0 left-0 right-0 bottom-0 w-full h-full z-50 overflow-hidden bg-gray-700 opacity-75 flex flex-col items-center justify-center">
        <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 mb-4 border-t-pri-red animate-spin"></div>
        <h2 class="text-center text-white text-xl font-semibold">Cargando...</h2>
        <p class="w-1/3 text-center text-white">Esto puede tomar unos segundos, por favor espere.</p>
    </div>
</div>

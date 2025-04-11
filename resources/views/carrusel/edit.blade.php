@extends('layouts.app')

@section('content')
<div class="py-6 max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-slate-700 to-slate-900 px-6 py-4">
            <h2 class="text-xl font-bold text-white">Editar Contenido</h2>
        </div>

        <div class="p-6">
            @include('components.alert')

            <!-- Componente Livewire con diseño integrado -->
            @livewire('carrusel-upload', ['carruselId' => $carrusel->id])
        </div>
    </div>

    <!-- Sección para información adicional -->
    <div class="mt-6 bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-slate-100 px-6 py-4 border-b border-slate-200">
            <h3 class="text-lg font-medium text-slate-800">Información adicional</h3>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-slate-500">Fecha de creación</p>
                    <p class="font-medium">{{ $carrusel->created_at->format('d/m/Y H:i') }}</p>
                </div>

                <div>
                    <p class="text-slate-500">Última actualización</p>
                    <p class="font-medium">{{ $carrusel->updated_at->format('d/m/Y H:i') }}</p>
                </div>

                <div>
                    <p class="text-slate-500">ID</p>
                    <p class="font-medium">{{ $carrusel->id }}</p>
                </div>

                <div>
                    <p class="text-slate-500">Estado</p>
                    <div class="mt-1">
                        @if($carrusel->activo)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3" />
                                </svg>
                                Activo
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-gray-400" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3" />
                                </svg>
                                Inactivo
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-gray-200 flex justify-between">
                <a href="{{ route('carrusel.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Volver a la lista
                </a>

                <form action="{{ route('carrusel.destroy', $carrusel) }}" method="POST" onsubmit="return confirm('¿Está seguro que desea eliminar este elemento?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

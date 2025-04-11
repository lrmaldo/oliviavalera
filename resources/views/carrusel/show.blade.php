@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-center">
        <div class="w-full max-w-3xl">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="flex justify-between items-center px-6 py-4 bg-gray-50 border-b">
                    <span class="text-xl font-medium text-gray-700">Detalle de Contenido</span>
                    <a href="{{ route('carrusel.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-600 text-white text-sm font-medium rounded-md hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition duration-150 ease-in-out">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Volver
                    </a>
                </div>
                <div class="p-6 space-y-6">
                    <h5 class="text-2xl font-semibold text-gray-800">{{ $carrusel->titulo ?? 'Sin título' }}</h5>
                    <p class="text-gray-600">{{ $carrusel->descripcion ?? 'Sin descripción' }}</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center mb-4">
                                <span class="font-medium text-gray-700 mr-2">Estado:</span>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $carrusel->activo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $carrusel->activo ? 'Activo' : 'Inactivo' }}
                                </span>
                            </div>

                            <div class="mb-4">
                                <span class="font-medium text-gray-700">Tipo:</span>
                                <span class="ml-2 text-gray-600">{{ ucfirst($carrusel->tipo) }}</span>
                            </div>

                            <div>
                                <span class="font-medium text-gray-700">Orden:</span>
                                <span class="ml-2 text-gray-600">{{ $carrusel->orden }}</span>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="font-medium text-gray-700 mb-3">Contenido:</div>
                            <div class="mt-2 overflow-hidden rounded-lg border border-gray-200">
                                @if($carrusel->tipo === 'imagen')
                                    <img src="{{ $carrusel->archivo_url }}" class="w-full h-auto object-cover" alt="{{ $carrusel->titulo }}">
                                @else
                                    <video class="w-full rounded-lg" controls>
                                        <source src="{{ $carrusel->archivo_url }}" type="video/mp4">
                                        Tu navegador no soporta videos HTML5.
                                    </video>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('carrusel.edit', $carrusel->id) }}"
                           class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Editar
                        </a>
                        <form action="{{ route('carrusel.destroy', $carrusel->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar este contenido?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-rose-600 text-white text-sm font-medium rounded-md hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 transition duration-150 ease-in-out">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

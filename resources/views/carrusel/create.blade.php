@extends('layouts.app')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Crear Nuevo Contenido</h2>

        @include('components.alert')

        <form action="{{ route('carrusel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    id="titulo" name="titulo" value="{{ old('titulo') }}">
                @error('titulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="archivo" class="block text-sm font-medium text-gray-700">Archivo (imagen o video)</label>
                <input type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0 file:text-sm file:font-semibold
                    file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                    id="archivo" name="archivo" accept=".jpg,.jpeg,.png,.mp4">
                <p class="mt-1 text-sm text-gray-500">Formatos permitidos: jpg, png, mp4. Tamaño máximo: 20MB</p>
                @error('archivo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de contenido</label>
                <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    id="tipo" name="tipo">
                    <option value="imagen" {{ old('tipo') == 'imagen' ? 'selected' : '' }}>Imagen</option>
                    <option value="video" {{ old('tipo') == 'video' ? 'selected' : '' }}>Video</option>
                </select>
                @error('tipo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="orden" class="block text-sm font-medium text-gray-700">Orden</label>
                <input type="number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    id="orden" name="orden" min="0" value="{{ old('orden', 0) }}">
                @error('orden') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4 flex items-start">
                <div class="flex items-center h-5">
                    <input type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                        id="activo" name="activo" value="1" {{ old('activo') ? 'checked' : '' }}>
                </div>
                <div class="ml-3 text-sm">
                    <label for="activo" class="font-medium text-gray-700">Activo</label>
                    <p class="text-gray-500">El contenido será visible en el carrusel</p>
                </div>
            </div>

            <div class="flex justify-between pt-5">
                <a href="{{ route('carrusel.index') }}" class="px-4 py-2 bg-gray-200 border border-transparent rounded-md font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Cancelar
                </a>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detalle de Contenido</span>
                    <a href="{{ route('carrusel.index') }}" class="btn btn-secondary">Volver</a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $carrusel->titulo ?? 'Sin título' }}</h5>
                    <p class="card-text">{{ $carrusel->descripcion ?? 'Sin descripción' }}</p>

                    <div class="mb-4">
                        <strong>Estado:</strong>
                        <span class="badge {{ $carrusel->activo ? 'bg-success' : 'bg-danger' }}">
                            {{ $carrusel->activo ? 'Activo' : 'Inactivo' }}
                        </span>
                    </div>

                    <div class="mb-4">
                        <strong>Tipo:</strong> {{ ucfirst($carrusel->tipo) }}
                    </div>

                    <div class="mb-4">
                        <strong>Orden:</strong> {{ $carrusel->orden }}
                    </div>

                    <div class="mb-4">
                        <strong>Contenido:</strong>
                        <div class="mt-2">
                            @if($carrusel->tipo === 'imagen')
                                <img src="{{ $carrusel->archivo_url }}" class="img-fluid" alt="{{ $carrusel->titulo }}">
                            @else
                                <video class="w-100" controls>
                                    <source src="{{ $carrusel->archivo_url }}" type="video/mp4">
                                    Tu navegador no soporta videos HTML5.
                                </video>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('carrusel.edit', $carrusel->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('carrusel.destroy', $carrusel->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar este contenido?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Editar Contenido</h2>

        @include('components.alert')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Editar contenido del carrusel</div>
                        <div class="card-body">
                            @livewire('carrusel-upload', ['carruselId' => $carrusel->id])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

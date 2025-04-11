<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Registrar explícitamente los componentes Livewire si la clase existe
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('carrusel-upload', \App\Http\Livewire\CarruselUpload::class);
            \Livewire\Livewire::component('carrusel-list', \App\Http\Livewire\CarruselList::class);
        }
    }
}

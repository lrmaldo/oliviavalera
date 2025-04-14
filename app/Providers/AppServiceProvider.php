<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use App\Http\Livewire\CarruselContenidoComponent;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);

        // Registrar explícitamente los componentes Livewire si la clase existe
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('carrusel-upload', \App\Http\Livewire\CarruselUpload::class);
            \Livewire\Livewire::component('carrusel-list', \App\Http\Livewire\CarruselList::class);

            // Registrar el componente Hotspot
            \Livewire\Livewire::component('hotspot.manage-hotspots', \App\Http\Livewire\Hotspot\ManageHotspots::class);
        }

        // Registrar componentes de la aplicación
        Blade::component('components.application-logo', 'application-logo');
        Blade::component('components.nav-link', 'nav-link');
        Blade::component('components.responsive-nav-link', 'responsive-nav-link');
        Blade::component('components.dropdown', 'dropdown');
        Blade::component('components.dropdown-link', 'dropdown-link');

        // Registrar layout como componente
        Blade::component('layouts.app', 'app-layout');

        Livewire::component('carrusel-contenido-component', CarruselContenidoComponent::class);
    }
}

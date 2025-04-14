<?php

use App\Http\Controllers\FormularioController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Livewire\Hotspot\ManageHotspots;
use App\Http\Middleware\VerifyCsrfToken;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    // Rutas existentes
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // Rutas para el carrusel (Livewire)

    // Rutas para el carrusel (controlador tradicional) - Evitamos la duplicación de nombres
    Route::resource('carrusel', App\Http\Controllers\CarruselContenidoController::class);
    Route::post('/carrusel/{carrusel}/toggle-active', [App\Http\Controllers\CarruselContenidoController::class, 'toggleActive'])->name('carrusel.toggle-active');
    Route::post('/carrusel/update-order', [App\Http\Controllers\CarruselContenidoController::class, 'updateOrder'])->name('carrusel.update-order');

    // Rutas para hotspots
    Route::get('/hotspots', ManageHotspots::class)->name('hotspots.index');
});

// Ruta de vista previa (no requiere autenticación)
Route::get('hotspot/preview', function () {
    return view('hotspot.preview.index');
})->name('hotspot.preview.index');

// Usar una ruta API para evitar el middleware web completo que incluye CSRF
Route::post('/hotspot/request', [App\Http\Controllers\HotspotController::class, 'handleRequest']);
Route::post('/formulario', [FormularioController::class, 'apiStore']);
require __DIR__.'/auth.php';

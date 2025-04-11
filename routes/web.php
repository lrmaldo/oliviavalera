<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Rutas para el carrusel
Route::resource('carrusel', App\Http\Controllers\CarruselContenidoController::class);
Route::post('/carrusel/{carrusel}/toggle-active', [App\Http\Controllers\CarruselContenidoController::class, 'toggleActive'])->name('carrusel.toggle-active');
Route::post('/carrusel/update-order', [App\Http\Controllers\CarruselContenidoController::class, 'updateOrder'])->name('carrusel.update-order');

Route::get('hotspot/preview', function () {
    return view('hotspot.preview.index');
})->name('hotspot.preview.index');

require __DIR__.'/auth.php';

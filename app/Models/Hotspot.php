<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotspot extends Model
{
    protected $fillable = [
        'name',
        'descripcion',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean'
    ];

    // Relación con Carrusel_contenido
    public function carruselContenidos()
    {
        return $this->hasMany(Carrusel_contenido::class, 'hotspot_id');
    }
}

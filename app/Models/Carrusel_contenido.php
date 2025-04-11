<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Carrusel_contenido extends Model
{
    //
    protected $table = 'carrusel_contenidos';
    protected $fillable = [
        'titulo',
        'descripcion',
        'archivo',
        'tipo',
        'orden',
        'activo'
    ];
    protected $casts = [
        'activo' => 'boolean',
        'orden' => 'integer',
    ];
    public function getArchivoUrlAttribute()
    {
        if (empty($this->archivo)) {
            return null;
        }
        
        try {
            return asset('storage/' . $this->archivo);
        } catch (\Exception $e) {
            Log::error('Error en getArchivoUrlAttribute: ' . $e->getMessage(), [
                'archivo' => $this->archivo,
                'trace' => $e->getTraceAsString()
            ]);
            return null;
        }
    }
    public function getTipoAttribute($value)
    {
        return $value === 'video' ? 'video' : 'imagen';
    }
    public function setArchivoAttribute($value)
    {
        try {
            if (is_file($value)) {
                // Si es un video, el valor ya será una ruta (procesado por handleVideoUpload)
                if (is_string($value) && strpos($value, 'carrusel_contenidos/') === 0) {
                    $this->attributes['archivo'] = $value;
                } else {
                    $this->attributes['archivo'] = $value->store('carrusel_contenidos', 'public');
                }
            } else {
                $this->attributes['archivo'] = $value;
            }
        } catch (\Exception $e) {
            Log::error('Error en setArchivoAttribute: ' . $e->getMessage(), [
                'value_type' => gettype($value),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    //
    protected $fillable = [
        'nombre',
        'telefono',
        'colonia',
        'otra_colonia',
        'localidad',
        'otra_localidad',
        'necesidades',
        'mac_address',
        'tipo_dispositivo',
        'tipo_sistema',
        'navegador'
    ];
    protected $casts = [
        'necesidades' => 'array', // Para manejar el campo como un array
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $table = 'formularios';
    public function getNombreAttribute($value)
    {
        return ucwords(strtolower($value));
    }
    public function getColoniaAttribute($value)
    {
        return ucwords(strtolower($value));
    }
    public function getLocalidadAttribute($value)
    {
        return ucwords(strtolower($value));
    }
    public function getNecesidadesAttribute($value)
    {
        return json_decode($value, true);
    }
    public function setNecesidadesAttribute($value)
    {
        $this->attributes['necesidades'] = json_encode($value);
    }
    public function getMacAddressAttribute($value)
    {
        return strtoupper($value);
    }
}

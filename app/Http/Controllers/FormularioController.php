<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'ciudad' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:10',
        ]);

        // Aquí puedes guardar los datos en la base de datos o realizar otras acciones

        return redirect()->route('hotspot.index')->with('success', 'Formulario enviado correctamente.');
    }

    /**
     * Almacena los datos del formulario enviados vía API
     */
    public function apiStore(Request $request)
    {
        /*  'nombre',
        'telefono',
        'colonia',
        'localidad',
        'necesidades',
        'mac_address',
        'tipo_dispositivo',
        'tipo_sistema',
        'navegador' */
        Formulario::create([
            'nombre' => $request->input('nombre'),
            'telefono' => $request->input('telefono'),
            'colonia' => $request->input('colonia'),
            'localidad' => $request->input('localidad'),
            'necesidades' => $request->input('necesidades'),
            'mac_address' => $request->input('mac_address'),
            'tipo_dispositivo' => $request->input('tipo_dispositivo'),
            'tipo_sistema' => $request->input('tipo_sistema'),
            'navegador' => $request->input('navegador')
        ]);

        // Guardar los datos en la base de datos o realizar otras acciones
        // Puedes crear un modelo e insertar los datos
        // Por ejemplo: HotspotForm::create($validated);

        // Para pruebas, simplemente log los datos recibidos
        \Log::info('Datos del formulario de hotspot recibidos', $validated);

        return response()->json([
            'success' => true,
            'message' => 'Datos guardados correctamente',
            'data' => $validated
        ]);
    }
}

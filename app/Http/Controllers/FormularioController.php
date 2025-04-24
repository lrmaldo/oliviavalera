<?php
namespace App\Http\Controllers;

use App\Models\Formulario;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Models\Colonia;
use App\Models\Localidad;

class FormularioController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'nombre'        => 'required|string|max:255',
            'apellido'      => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'telefono'      => 'required|string|max:20',
            'ciudad'        => 'required|string|max:255',
            'estado'        => 'required|string|max:255',
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
        #  dd($request->all());
        /* ejemplo
        array:8 [ // app\Http\Controllers\FormularioController.php:43
  "_token" => "7kuhoE0RTDtAtnHsvA6GUwyh9snZOorAvbRhq3ML"
  "dst" => "$(link-orig)"
  "popup" => "true"
  "nombre" => "leonardo maldonaod"
  "telefono" => "9851050030"
  "colonia" => "5 de mayo"
  "localidad" => "San Juan Bautista Tuxtepec"
  "necesidades" => array:2 [
    0 => "espacios"
    1 => "pavimentacion"
  ]
] */
        $agent = new Agent();

        Formulario::create([
            'nombre'           => $request->input('nombre'),
            'telefono'         => $request->input('telefono'),
            'colonia'          => $request->input('colonia'),
            'otra_colonia'     => $request->input('otra_colonia'),
            'localidad'        => $request->input('localidad'),
            'otra_localidad'   => $request->input('otra_localidad'),
            'necesidades'      => json_encode($request->input('necesidades')),
            'mac_address'      => $request->input('mac_address'),
            'tipo_dispositivo' => $agent->isTablet() ? 'Tablet' : ($agent->isMobile() ? 'Movil' : 'Escritorio'),
            'tipo_sistema'     => $agent->platform(),
            'navegador'        => $agent->browser(),
        ]);

        // Guardar los datos en la base de datos o realizar otras acciones
        // Puedes crear un modelo e insertar los datos
        // Por ejemplo: HotspotForm::create($validated);

        // Para pruebas, simplemente log los datos recibidos
        \Log::info('Datos del formulario de hotspot recibidos');

        return response()->json([
            'success' => true,
            'message' => 'Datos guardados correctamente',
            'data'    => $request->all(),
        ])->setStatusCode(201, 'Created');

    }

    /**
     * Obtiene las colonias para el select con búsqueda
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function obtenerColonias(Request $request)
    {
        $search = $request->query('q', '');

        $query = Colonia::query();

        // Si hay un término de búsqueda, aplicar filtro
        if (!empty($search)) {
            $query->where('nombre', 'LIKE', "%{$search}%");
        }

        $colonias = $query->orderBy('nombre')
                         ->take(15)
                         ->get(['nombre']);

        return response()->json($colonias);
    }

    /**
     * Obtiene las localidades para el select con búsqueda
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function obtenerLocalidades(Request $request)
    {
        $search = $request->query('q', '');

        $query = Localidad::query();

        // Si hay un término de búsqueda, aplicar filtro
        if (!empty($search)) {
            $query->where('nombre', 'LIKE', "%{$search}%");
        }

        $localidades = $query->orderBy('nombre')
                           ->take(15)
                           ->get(['nombre']);

        return response()->json($localidades);
    }
}

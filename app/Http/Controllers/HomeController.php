<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario;
use App\Models\Colonia;
use App\Models\Localidad;
use App\Models\Carrusel_contenido;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Estadísticas de Formularios
        $totalFormularios = Formulario::count();
        $formulariosHoy = Formulario::whereDate('created_at', today())->count();
        $formulariosSemana = Formulario::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();

        // Necesidades más comunes (top 5)
        $necesidadesComunes = [];
        $formularios = Formulario::select('necesidades')->get();

        foreach ($formularios as $formulario) {
            if (is_array($formulario->necesidades)) {
                foreach ($formulario->necesidades as $necesidad) {
                    if (!isset($necesidadesComunes[$necesidad])) {
                        $necesidadesComunes[$necesidad] = 0;
                    }
                    $necesidadesComunes[$necesidad]++;
                }
            }
        }

        arsort($necesidadesComunes);
        $necesidadesComunes = array_slice($necesidadesComunes, 0, 5);

        // Estadísticas de Colonias
        $totalColonias = Colonia::count();
        $coloniasPopulares = Formulario::select('colonia', DB::raw('count(*) as total'))
                             ->whereNotNull('colonia')
                             ->groupBy('colonia')
                             ->orderBy('total', 'DESC')
                             ->limit(5)
                             ->get();

        // Estadísticas de Localidades
        $totalLocalidades = Localidad::count();
        $localidadesPopulares = Formulario::select('localidad', DB::raw('count(*) as total'))
                               ->whereNotNull('localidad')
                               ->groupBy('localidad')
                               ->orderBy('total', 'DESC')
                               ->limit(5)
                               ->get();

        // Estadísticas del Carrusel
        $totalContenidos = Carrusel_contenido::count();
        $contenidosActivos = Carrusel_contenido::where('activo', true)->count();
        $tiposContenido = Carrusel_contenido::select('tipo', DB::raw('count(*) as total'))
                         ->groupBy('tipo')
                         ->get()
                         ->pluck('total', 'tipo')
                         ->toArray();

        return view('dashboard', compact(
            'totalFormularios',
            'formulariosHoy',
            'formulariosSemana',
            'necesidadesComunes',
            'totalColonias',
            'totalLocalidades',
            'coloniasPopulares',
            'localidadesPopulares',
            'totalContenidos',
            'contenidosActivos',
            'tiposContenido'
        ));
    }
}

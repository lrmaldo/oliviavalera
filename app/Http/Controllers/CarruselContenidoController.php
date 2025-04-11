<?php

namespace App\Http\Controllers;

use App\Models\Carrusel_contenido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CarruselContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contenidos = Carrusel_contenido::orderBy('orden')->get();
        return view('carrusel.index', compact('contenidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carrusel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'titulo' => 'nullable|string|max:255',
                'descripcion' => 'nullable|string',
                'archivo' => 'required|file|mimes:jpg,png,mp4|max:25600', // Aumentado a 25MB
                'tipo' => 'required|in:imagen,video',
                'orden' => 'nullable|integer',
                'activo' => 'nullable|boolean',
            ]);

            // Registrar información sobre el archivo para depuración
            if ($request->hasFile('archivo')) {
                $file = $request->file('archivo');
                Log::info('Archivo subido', [
                    'nombre' => $file->getClientOriginalName(),
                    'tamaño' => $file->getSize(),
                    'tipo' => $file->getMimeType(),
                    'extension' => $file->getClientOriginalExtension()
                ]);
            }

            $contenido = new Carrusel_contenido();
            $contenido->titulo = $request->titulo;
            $contenido->descripcion = $request->descripcion;
            $contenido->tipo = $request->tipo;
            $contenido->orden = $request->orden ?? 0;
            $contenido->activo = $request->has('activo');

            // Manejo especial para archivos grandes
            if ($request->hasFile('archivo')) {
                // Para videos, usamos un método diferente para evitar problemas de memoria
                if ($request->tipo == 'video') {
                    $path = $this->handleVideoUpload($request->file('archivo'));
                    $contenido->archivo = $path;
                } else {
                    $contenido->archivo = $request->file('archivo');
                }
            }

            $contenido->save();

            return redirect()->route('carrusel.index')->with('success', 'Contenido creado exitosamente.');
        } catch (\Exception $e) {
            // Registrar el error en el log
            Log::error('Error al guardar contenido: ' . $e->getMessage(), [
                'archivo' => $request->hasFile('archivo') ? $request->file('archivo')->getClientOriginalName() : 'No hay archivo',
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Error al subir el archivo: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrusel_contenido $carrusel)
    {
        return view('carrusel.show', compact('carrusel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrusel_contenido $carrusel)
    {
        return view('carrusel.edit', compact('carrusel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrusel_contenido $carrusel)
    {
        try {
            $request->validate([
                'titulo' => 'nullable|string|max:255',
                'descripcion' => 'nullable|string',
                'archivo' => 'nullable|file|mimes:jpg,png,mp4|max:25600', // Aumentado a 25MB
                'tipo' => 'required|in:imagen,video',
                'orden' => 'nullable|integer',
                'activo' => 'nullable|boolean',
            ]);

            $carrusel->titulo = $request->titulo;
            $carrusel->descripcion = $request->descripcion;
            $carrusel->tipo = $request->tipo;
            $carrusel->orden = $request->orden ?? $carrusel->orden;
            $carrusel->activo = $request->has('activo');

            if ($request->hasFile('archivo')) {
                // Eliminar archivo anterior
                Storage::disk('public')->delete($carrusel->archivo);

                // Para videos, usamos un método diferente
                if ($request->tipo == 'video') {
                    $path = $this->handleVideoUpload($request->file('archivo'));
                    $carrusel->archivo = $path;
                } else {
                    $carrusel->archivo = $request->file('archivo');
                }
            }

            $carrusel->save();

            return redirect()->route('carrusel.index')->with('success', 'Contenido actualizado exitosamente.');
        } catch (\Exception $e) {
            // Registrar el error en el log
            Log::error('Error al actualizar contenido: ' . $e->getMessage(), [
                'id' => $carrusel->id,
                'archivo' => $request->hasFile('archivo') ? $request->file('archivo')->getClientOriginalName() : 'No hay archivo',
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Error al actualizar: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrusel_contenido $carrusel)
    {
        // Eliminar el archivo del almacenamiento
        Storage::disk('public')->delete($carrusel->archivo);

        // Eliminar el registro
        $carrusel->delete();

        return redirect()->route('carrusel.index')->with('success', 'Contenido eliminado exitosamente.');
    }

    /**
     * Toggle the active status
     */
    public function toggleActive(Carrusel_contenido $carrusel)
    {
        $carrusel->activo = !$carrusel->activo;
        $carrusel->save();

        return response()->json(['success' => true, 'active' => $carrusel->activo]);
    }

    /**
     * Update the order of items
     */
    public function updateOrder(Request $request)
    {
        $items = $request->input('items', []);

        foreach ($items as $item) {
            $contenido = Carrusel_contenido::find($item['id']);
            if ($contenido) {
                $contenido->orden = $item['orden'];
                $contenido->save();
            }
        }

        return response()->json(['success' => true]);
    }

    /**
     * Método especial para manejar subidas de videos grandes
     */
    private function handleVideoUpload($file)
    {
        // Crear un nombre único para el archivo
        $filename = uniqid('video_') . '.' . $file->getClientOriginalExtension();
        $path = 'carrusel_contenidos/' . $filename;

        // Mover el archivo directamente en lugar de usar el método store
        // Esto evita problemas de memoria con archivos grandes
        $file->move(storage_path('app/public/carrusel_contenidos'), $filename);

        return $path;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Carrusel_contenido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CarruselContenidoController extends Controller
{
    public function index()
    {
        return view('carrusel.index');
    }

    public function create()
    {
        return view('carrusel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'nullable|max:1000',
            'archivo' => 'required|file|max:20480', // 20MB max
            'tipo' => 'required|in:imagen,video',
            'orden' => 'nullable|integer',
            'activo' => 'sometimes|boolean',
        ]);

        $path = $request->file('archivo')->store('carrusel', 'public');

        $orden = Carrusel_contenido::max('orden') + 1;

        Carrusel_contenido::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'archivo' => $path,
            'tipo' => $request->tipo,
            'orden' => $orden,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('carrusel.index')
            ->with('message', 'Elemento añadido al carrusel correctamente.');
    }

    public function show(Carrusel_contenido $carrusel)
    {
        return view('carrusel.show', compact('carrusel'));
    }

    public function edit(Carrusel_contenido $carrusel)
    {
        return view('carrusel.edit', compact('carrusel'));
    }

    public function update(Request $request, Carrusel_contenido $carrusel)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'nullable|max:1000',
            'archivo' => 'sometimes|file|max:20480', // 20MB max
            'tipo' => 'required|in:imagen,video',
            'activo' => 'sometimes|boolean',
        ]);

        $data = [
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'tipo' => $request->tipo,
            'activo' => $request->has('activo'),
        ];

        if ($request->hasFile('archivo')) {
            // Eliminar archivo antiguo
            if ($carrusel->archivo && Storage::disk('public')->exists($carrusel->archivo)) {
                Storage::disk('public')->delete($carrusel->archivo);
            }

            // Guardar nuevo archivo
            $path = $request->file('archivo')->store('carrusel', 'public');
            $data['archivo'] = $path;
        }

        $carrusel->update($data);

        return redirect()->route('carrusel.index')
            ->with('message', 'Elemento del carrusel actualizado correctamente.');
    }

    public function destroy(Carrusel_contenido $carrusel)
    {
        // Eliminar archivo
        if ($carrusel->archivo && Storage::disk('public')->exists($carrusel->archivo)) {
            Storage::disk('public')->delete($carrusel->archivo);
        }

        $carrusel->delete();

        return redirect()->route('carrusel.index')
            ->with('message', 'Elemento del carrusel eliminado correctamente.');
    }

    public function toggleActive(Carrusel_contenido $carrusel)
    {
        $carrusel->activo = !$carrusel->activo;
        $carrusel->save();

        return response()->json([
            'success' => true,
            'message' => 'Estado actualizado correctamente',
            'activo' => $carrusel->activo
        ]);
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:carrusel_contenidos,id',
            'items.*.orden' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            Carrusel_contenido::find($item['id'])->update(['orden' => $item['orden']]);
        }

        return response()->json(['success' => true, 'message' => 'Orden actualizado correctamente']);
    }
}

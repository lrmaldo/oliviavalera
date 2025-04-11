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
            'title' => 'required|max:255',
            'description' => 'nullable|max:1000',
            'image' => 'required|image|max:2048', // 2MB max
            'is_active' => 'sometimes|boolean',
        ]);

        $path = $request->file('image')->store('carrusel', 'public');

        $order = Carrusel_contenido::max('order') + 1;

        Carrusel_contenido::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $path,
            'is_active' => $request->has('is_active'),
            'order' => $order,
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
            'title' => 'required|max:255',
            'description' => 'nullable|max:1000',
            'image' => 'sometimes|image|max:2048', // 2MB max
            'is_active' => 'sometimes|boolean',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            // Eliminar imagen antigua
            if ($carrusel->image_path && Storage::disk('public')->exists($carrusel->image_path)) {
                Storage::disk('public')->delete($carrusel->image_path);
            }

            // Guardar nueva imagen
            $path = $request->file('image')->store('carrusel', 'public');
            $data['image_path'] = $path;
        }

        $carrusel->update($data);

        return redirect()->route('carrusel.index')
            ->with('message', 'Elemento del carrusel actualizado correctamente.');
    }

    public function destroy(CarruselContenido $carrusel)
    {
        // Eliminar imagen
        if ($carrusel->image_path && Storage::disk('public')->exists($carrusel->image_path)) {
            Storage::disk('public')->delete($carrusel->image_path);
        }

        $carrusel->delete();

        return redirect()->route('carrusel.index')
            ->with('message', 'Elemento del carrusel eliminado correctamente.');
    }

    public function toggleActive(CarruselContenido $carrusel)
    {
        $carrusel->is_active = !$carrusel->is_active;
        $carrusel->save();

        return response()->json([
            'success' => true,
            'message' => 'Estado actualizado correctamente',
            'is_active' => $carrusel->is_active
        ]);
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:carrusel_contenidos,id',
            'items.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            CarruselContenido::find($item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true, 'message' => 'Orden actualizado correctamente']);
    }
}

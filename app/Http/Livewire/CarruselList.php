<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Carrusel_contenido;

class CarruselList extends Component
{
    public $contenidos;
    protected $listeners = ['refreshList' => '$refresh'];

    public function mount()
    {
        $this->loadContenidos();
    }

    public function loadContenidos()
    {
        $this->contenidos = Carrusel_contenido::orderBy('orden')->get();
    }

    public function toggleActive($id)
    {
        $contenido = Carrusel_contenido::find($id);
        if ($contenido) {
            $contenido->activo = !$contenido->activo;
            $contenido->save();
            $this->loadContenidos();
        }
    }

    public function updateOrder($items)
    {
        foreach ($items as $item) {
            $contenido = Carrusel_contenido::find($item['value']);
            if ($contenido) {
                $contenido->orden = $item['order'];
                $contenido->save();
            }
        }
    }

    public function deleteItem($id)
    {
        $contenido = Carrusel_contenido::find($id);
        if ($contenido) {
            // Eliminar archivo
            \Storage::disk('public')->delete($contenido->archivo);
            // Eliminar registro
            $contenido->delete();
            $this->loadContenidos();
        }
    }

    public function render()
    {
        if (!isset($this->contenidos)) {
            $this->loadContenidos();
        }

        return view('livewire.carrusel-list');
    }
}

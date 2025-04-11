<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Carrusel;

class CarruselList extends Component
{
    public $contenidos;
    public $showModal = false;
    public $selectedContent = null;

    public function mount()
    {
        $this->contenidos = Carrusel::all();
    }

    public function toggleActive($id)
    {
        $contenido = Carrusel::find($id);
        $contenido->activo = !$contenido->activo;
        $contenido->save();
        $this->contenidos = Carrusel::all();
    }

    public function deleteItem($id)
    {
        Carrusel::destroy($id);
        $this->contenidos = Carrusel::all();
    }

    public function showContentDetails($id)
    {
        $this->selectedContent = Carrusel::find($id);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedContent = null;
    }

    public function render()
    {
        return view('livewire.carrusel-list');
    }
}

<?php

namespace App\Http\Livewire\Hotspot;

use App\Models\Hotspot;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class ManageHotspots extends Component
{
    use WithPagination;

    public $hotspotId;
    public $name;
    public $tiempo_carrusel = 10;
    public $mostrar_video = true;

    public $isOpen = false;
    public $confirmingDeletion = false;
    public $search = '';

    protected function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('hotspots', 'name')->ignore($this->hotspotId),
            ],
            'tiempo_carrusel' => 'required|integer|min:1|max:60',
            'mostrar_video' => 'boolean',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $hotspots = Hotspot::when($this->search, function($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.hotspot.manage-hotspots', [
            'hotspots' => $hotspots
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id)
    {
        $hotspot = Hotspot::findOrFail($id);
        $this->hotspotId = $id;
        $this->name = $hotspot->name;
        $this->tiempo_carrusel = $hotspot->tiempo_carrusel;
        $this->mostrar_video = $hotspot->mostrar_video;

        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->confirmingDeletion = false;
    }

    public function store()
    {
        $this->validate();

        Hotspot::updateOrCreate(['id' => $this->hotspotId], [
            'name' => $this->name,
            'tiempo_carrusel' => $this->tiempo_carrusel,
            'mostrar_video' => $this->mostrar_video,
        ]);

        session()->flash('message', $this->hotspotId ? 'Hotspot actualizado correctamente.' : 'Hotspot creado correctamente.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function confirmDelete($id)
    {
        $this->confirmingDeletion = true;
        $this->hotspotId = $id;
    }

    public function delete()
    {
        $hotspot = Hotspot::find($this->hotspotId);

        if ($hotspot) {
            $hotspot->delete();
            session()->flash('message', 'Hotspot eliminado correctamente.');
        } else {
            session()->flash('error', 'No se encontró el hotspot o ya fue eliminado.');
        }

        $this->closeModal();
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->hotspotId = null;
        $this->name = '';
        $this->tiempo_carrusel = 10;
        $this->mostrar_video = true;
    }
}

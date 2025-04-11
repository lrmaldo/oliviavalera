<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Carrusel_contenido;

class CarruselUpload extends Component
{
    use WithFileUploads;

    public $titulo;
    public $descripcion;
    public $archivo = null;
    public $tipo = 'imagen';
    public $orden = 0;
    public $activo = true;
    public $carruselId = null;
    public $carrusel = null;
    public $isEditing = false;

    protected $rules = [
        'titulo' => 'nullable|string|max:255',
        'descripcion' => 'nullable|string',
        'archivo' => 'nullable|file|mimes:jpg,png,mp4|max:20480', // 20MB
        'tipo' => 'required|in:imagen,video',
        'orden' => 'integer',
        'activo' => 'boolean',
    ];

    public function mount($carruselId = null)
    {
        if ($carruselId) {
            $this->carrusel = Carrusel_contenido::find($carruselId);
            if ($this->carrusel) {
                $this->carruselId = $carruselId;
                $this->titulo = $this->carrusel->titulo;
                $this->descripcion = $this->carrusel->descripcion;
                $this->tipo = $this->carrusel->tipo;
                $this->orden = $this->carrusel->orden;
                $this->activo = $this->carrusel->activo;
                $this->isEditing = true;
            }
        }
    }

    // Renombra el método save a submit
    public function submit()
    {
        $this->validate();

        if ($this->isEditing) {
            $contenido = $this->carrusel;

            if ($this->archivo) {
                // Eliminar archivo anterior si se actualiza
                \Storage::disk('public')->delete($contenido->archivo);
            }
        } else {
            $contenido = new Carrusel_contenido();
            $this->validate([
                'archivo' => 'required|file|mimes:jpg,png,mp4|max:20480',
            ]);
        }

        $contenido->titulo = $this->titulo;
        $contenido->descripcion = $this->descripcion;
        if ($this->archivo) {
            $contenido->archivo = $this->archivo;
        }
        $contenido->tipo = $this->tipo;
        $contenido->orden = $this->orden;
        $contenido->activo = $this->activo;
        $contenido->save();

        $this->reset(['titulo', 'descripcion', 'archivo', 'tipo', 'orden', 'activo']);

        return redirect()->route('carrusel.index')->with('success',
            $this->isEditing ? 'Contenido actualizado exitosamente.' : 'Contenido creado exitosamente.');
    }

    // Asegúrate que este es el nombre del método que se llama desde la vista
    public function save()
    {
        // Redirige al método submit
        return $this->submit();
    }

    public function updatedArchivo()
    {
        // Detectar automáticamente el tipo basado en la extensión
        if ($this->archivo) {
            $extension = strtolower($this->archivo->getClientOriginalExtension());
            if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                $this->tipo = 'imagen';
            } elseif ($extension === 'mp4') {
                $this->tipo = 'video';
            }
        }
    }

    public function render()
    {
        return view('livewire.carrusel-upload');
    }
}

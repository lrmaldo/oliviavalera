<?php

namespace App\Http\Livewire;

use App\Models\Formulario;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class FormularioTable extends Component
{
    use WithPagination;

    // Propiedades para búsqueda y filtros
    public $search = '';
    public $colonia = '';
    public $localidad = '';
    public $fechaInicio = '';
    public $fechaFin = '';
    public $perPage = 10;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    // Escuchar eventos para resetear paginación
    protected $listeners = ['refreshFormularioTable' => '$refresh'];

    // Resetear paginación cuando cambian los filtros
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingColonia()
    {
        $this->resetPage();
    }

    public function updatingLocalidad()
    {
        $this->resetPage();
    }

    public function updatingFechaInicio()
    {
        $this->resetPage();
    }

    public function updatingFechaFin()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    // Ordenar por columna
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        
        $this->sortField = $field;
    }

    // Limpiar todos los filtros
    public function resetFilters()
    {
        $this->search = '';
        $this->colonia = '';
        $this->localidad = '';
        $this->fechaInicio = '';
        $this->fechaFin = '';
        $this->resetPage();
    }

    // Render del componente
    public function render()
    {
        $query = Formulario::query();

        // Aplicar búsqueda
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('nombre', 'like', '%' . $this->search . '%')
                  ->orWhere('telefono', 'like', '%' . $this->search . '%');
            });
        }

        // Aplicar filtros
        if ($this->colonia) {
            $query->where('colonia', 'like', '%' . $this->colonia . '%');
        }

        if ($this->localidad) {
            $query->where('localidad', 'like', '%' . $this->localidad . '%');
        }

        if ($this->fechaInicio) {
            $query->whereDate('created_at', '>=', $this->fechaInicio);
        }

        if ($this->fechaFin) {
            $query->whereDate('created_at', '<=', $this->fechaFin);
        }

        // Ordenar resultados
        $query->orderBy($this->sortField, $this->sortDirection);

        // Obtener colonias y localidades únicas para los filtros
        $colonias = Formulario::select('colonia')->distinct()->whereNotNull('colonia')->pluck('colonia');
        $localidades = Formulario::select('localidad')->distinct()->whereNotNull('localidad')->pluck('localidad');

        // Paginar resultados
        $formularios = $query->paginate($this->perPage);

        return view('livewire.formulario-table', [
            'formularios' => $formularios,
            'colonias' => $colonias,
            'localidades' => $localidades,
        ]);
    }
}

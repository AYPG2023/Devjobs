<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class FiltrarVacantes extends Component
{

    public $termino;
    public $categoria;
    public $salario;

    public function lerrDatosFormulario()
    {
        $this->dispatch('terminosBusqueda', $this->termino, $this->categoria, $this->salario); // Esto funcina para comunicar con el componente padre (HomeVacantes) y enviarle los datos de los filtros
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.filtrar-vacantes', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}

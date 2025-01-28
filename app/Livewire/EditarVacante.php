<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class EditarVacante extends Component
{
    public function render()
    {
        // Consulta a base de datos
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
        
    }
}

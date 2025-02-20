<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    public $termino;
    public $categoria;
    public $salario;

    protected $listeners = ['terminosBusqueda' => 'buscar']; // Esto es para escuchar el evento que se emite desde el componente hijo (FiltrarVacantes)


    public function buscar($termino, $categoria, $salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }
    public function render()
    {
        //When para buscar termino
        $vacante = Vacante::when($this->termino, function ($query) {
            $query->where('titulo', 'like', '%' . $this->termino . '%'); // Esto es para buscar en la tabla vacantes el titulo que contenga el termino que se esta buscando en la vista %$this->termino buscar en cualquier lado la palabra por referencia
        })
            //When para buscar categoria 
            ->when($this->categoria, function ($query) {
                $query->where('categoria_id', $this->categoria); // Esto es para buscar en la tabla vacantes la categoria que se esta buscando en la vista
            })
            //When para buscar salario
            ->when($this->salario, function ($query) {
                $query->where('salario_id', $this->salario); // Esto es para buscar en la tabla vacantes el salario que se esta buscando en la vista
            })
            ->paginate(10); // Esto es para paginar los resultados de la busqueda

        return view('livewire.home-vacantes', [
            'vacantes' => $vacante            //Esto hace que se muestren todas las vacantes en la vista basadp en la tabla vacantes de la base de datos
        ]);
    }
}

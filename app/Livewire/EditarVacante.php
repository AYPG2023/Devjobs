<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    /*Funcionalidad para que pueda retornar la informacion de la vacante que se vaya entrar a editar y oueda mostar
    la informacion que ya esta cargada */
    public $vacante_id;
    public $vacante;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image|max:1024',

    ];

    //Funcion para cargar la informacion de la vacante que se va a editar
    /* Mount es una funcion de livewire */
    public function mount(Vacante $vacante)
    {
        /* Se mandan a llamar las variables con el valor que se guardo en la base de datos */
        $this->vacante_id = $vacante->id;
        $this->vacante = $vacante;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = $vacante->ultimo_dia;
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    //Funcion para editar la vacante
    public function editarVacante(){

        $datos = $this->validate();

        // Si se sube una nueva imagen 
        if($this->imagen_nueva){
            //Almacenar la imagen
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen); 

        }

        //Encontrar la vacante
        $vacante = Vacante::find($this->vacante_id);
    

        //Asignar los valores
        $vacante -> titulo = $datos['titulo'];
            $vacante -> salario_id = $datos['salario']; // Cambia 'salario' a 'salario_id'
            $vacante -> categoria_id = $datos['categoria']; // Cambia 'categoria' a 'categoria_id'
            $vacante -> empresa = $datos['empresa'];
            $vacante -> ultimo_dia = $datos['ultimo_dia'];
            $vacante -> descripcion = $datos['descripcion'];
            $vacante -> imagen = $datos['imagen'] ?? $vacante->imagen;

        // Guardar la vacante
        $vacante->save();

        //Mensaje de confirmacion
        session()->flash('mensaje', 'La vacante se actualizó correctamente');

        //Redireccionar
        return redirect()->route('vacantes.index');
    } 


    //Funcion para renderizar la vista
    public function render()
    {
        return view('livewire.editar-vacante', [
            'salarios' => Salario::all(),
            'categorias' => Categoria::all(),
        ]);
    }
}


<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024',
    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        // Almacenar imagen
       $imagen = $this->imagen->store('public/vacantes');
       $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        // Crear vacante
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'], // Cambia 'salario' a 'salario_id'
            'categoria_id' => $datos['categoria'], // Cambia 'categoria' a 'categoria_id'
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);
        
        // Crear un mensaje 
        session()->flash('mensaje', 'La vacante se creó correctamente');

        // Redireccionar
        return redirect()->route('vacantes.index');
    }


    public function render()
    {
        // Consulta a base de datos
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
 // Path: resources/views/livewire/crear-vacante.blade.php
 // Vista de la tabla
 // se le para el resultado de la consulta a la vista, y se le pasa los parametros para que retorne la lista 
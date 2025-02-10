<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads; // Importar el trait WithFileUploadsq para habilitar la subida de archivos
    public $cv;
    public $vacante;
    protected $rules = [
        'cv' => 'required|file|mimes:pdf', // Solo se permiten archivos PDF
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postular()
    {
        $this->validate();

        // Guardar el archivo en el servidor
        $datos = $this->validate();

        // Almacenar cv en el servidor
       $cv = $this->cv->store('public/cv');
       $datos['cv'] = str_replace('public/cv/', '', $cv);

       //Crear un registro en la base de datos de la tabla postulaciones de la vacante


        // Limpiar el campo
        $this->cv = null;

        // Mostrar mensaje de éxito
        session()->flash('message', '¡Tu CV ha sido enviado con éxito!');
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}

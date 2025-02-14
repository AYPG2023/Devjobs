<?php
namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;

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
        $datos = $this->validate();

        // Almacenar cv en el servidor
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        // Crear un registro en la base de datos de la tabla postulaciones de la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],
        ]);

        // Limpiar el campo
        $this->cv = null;

        // Mostrar mensaje de éxito
        session()->flash('message', '¡Tu CV ha sido enviado con éxito! Mucha suerte.');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
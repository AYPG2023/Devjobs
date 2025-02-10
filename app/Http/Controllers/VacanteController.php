<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $this->authorize('viewAny', Vacante::class);   
        return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', Vacante::class); // Se agrega esta línea para proteger la creación de vacantes   para que solo los usuarios con rol de "reclutador" puedan crear vacantes
        return view('vacantes.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante)
    {
        //
        return view('vacantes.show', [
            'vacante' => $vacante
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante)
    {
        //
        $this->authorize('view', $vacante);

        return view('vacantes.edit', compact('vacante'));
    }
}

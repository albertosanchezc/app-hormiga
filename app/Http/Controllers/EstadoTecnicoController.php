<?php

namespace App\Http\Controllers;

use App\Models\EstadoTecnico;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class EstadoTecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $estados = EstadoTecnico::orderBy('nombre')->paginate(20);


        return view('estados_tecnicos.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('estados_tecnicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|max:255|unique:estados,nombre'
        ]);

        EstadoTecnico::create([
            'nombre' => strtoupper($request->nombre)
        ]);

        return redirect()->route('estados_tecnicos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EstadoTecnico $estado_tecnico)
    {
        //
        return view('estados_tecnicos.edit', compact('estado_tecnico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EstadoTecnico $estado_tecnico)
    {
        //

        $request->merge([
            'nombre' => strtoupper($request->nombre)
        ]);

        $request->validate([
            'nombre' => [
                'required',
                'max:255',
                Rule::unique('estados_tecnicos', 'nombre')->ignore($estado_tecnico->id),
            ]
        ]);

        $estado_tecnico->update([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('estados_tecnicos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

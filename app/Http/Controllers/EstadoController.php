<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $estados = Estado::orderBy('nombre')->paginate(20);


        return view('estados.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('estados.create');
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

        Estado::create([
            'nombre' => strtoupper($request->nombre)
        ]);

        return redirect()->route('estados.index');
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
    public function edit(Estado $estado)
    {
        return view('estados.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estado $estado)
    {

        $request->merge([
            'nombre' => strtoupper($request->nombre)
        ]);

        $request->validate([
            'nombre' => [
                'required',
                'max:255',
                Rule::unique('estados', 'nombre')->ignore($estado->id),
            ]
        ]);

        $estado->update([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('estados.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $estado = Estado::findOrFail($id);

        if ($estado->ordenes()->exists()) {
            return back()->with('error', 'No se puede eliminar porque tiene registros asociados.');
        }

        $estado->delete();

        return back()->with('success', 'Estado eliminado correctamente.');
    }
}

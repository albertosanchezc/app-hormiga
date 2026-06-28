<?php

namespace App\Http\Controllers;

use App\Models\TipoServicio;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class TipoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tipos_servicios = TipoServicio::orderBY('nombre')->paginate(100);

        return view('tipos_servicios.index', compact('tipos_servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tipos_servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|max:255|unique:tipo_servicios,nombre'
        ]);

        TipoServicio::create([
            'nombre' => strtoupper($request->nombre)
        ]);

        return redirect()->route('tipos_servicios.index');
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
    public function edit(TipoServicio $tipo_servicio)
    {
        //
        return view('tipos_servicios.edit', compact('tipo_servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoServicio $tipo_servicio)
    {
        //
        $request->merge([
            'nombre' => strtoupper($request->nombre)
        ]);


        $request->validate([
            'nombre' => [
                'required',
                'max:255',
                Rule::unique('estados_tecnicos', 'nombre')->ignore($tipo_servicio->id),
            ]
        ]);

        $tipo_servicio->update([
            'nombre' => $request->nombre,
            'activo' => $request->activo ?? 0,
        ]);

        return redirect()->route('tipos_servicios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $tipo_servicio = TipoServicio::findOrFail($id);

        if ($tipo_servicio->ordenes()->exists()) {
            return back()->with('error', 'No se puede eliminar porque tiene registros asociados.');
        }

        $tipo_servicio->delete();

        return back()->with('success', 'Estado eliminado correctamente.');
    }
}

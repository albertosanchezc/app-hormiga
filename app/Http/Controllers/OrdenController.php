<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Pantalla;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;



class OrdenController extends Controller
{


    public function generarPDF($ordenServicio)
    {
        $orden = Orden::where('orden_servicio', $ordenServicio)->firstOrFail();

        $pdf = PDF::loadView('ordenes.show', ['orden' => $orden, 'esPdf' => true])
            ->setPaper('letter'); // o 'A4'

        return $pdf->download('orden_servicio_' . $orden->orden_servicio . '.pdf');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {

        // $pantallas = Pantalla::all();
        //
        return view('pantallas.index');

        // return view('dashboard',['pantallas' => $pantallas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastOrden = Orden::latest('id')->first();
        $nuevoFolio = $lastOrden ? $lastOrden->orden_servicio + 1 : 1;

        return view('ordenes.create', [
            'folio' => $nuevoFolio,
            'fecha' => now()->format('Y-m-d'),
            'hora'  => now()->format('H:i')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd('Desde store');
        $orden = Orden::create($request->all());

        return redirect()->route('ordenes.show', $orden);
    }

    /**
     * Display the specified resource.
     */
    public function show(Orden $orden)
    {
        //
        return view('ordenes.show', ['orden' => $orden, 'esPdf' => false]);
        // return view('ordenes.show', compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orden $orden)
    {
        return view('ordenes.edit', compact('orden'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orden $orden)
    {
        //
    }
}

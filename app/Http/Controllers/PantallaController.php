<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Orden;
use App\Models\Pantalla;
use Illuminate\Http\Request;

class PantallaController extends Controller
{
    //
    public function index()
    {
        $pantallas = Pantalla::with('estado')->orderBy('orden_servicio', 'DESC')->paginate(9);
        return view('pantallas.index', compact('pantallas'));
    }

    public function show(Pantalla $pantalla)
    {
        $esPdf = false;
        $orden = $pantalla->orden;
        // dd($orden);
        return view('pantallas.show', compact('pantalla', 'orden', 'esPdf'));
    }

    public function edit(Pantalla $pantalla)
    {
        $estados = Estado::all();  // Obtienes todos los estados
        $esPdf = false;
        return view('pantallas.edit', compact('pantalla', 'esPdf', 'estados'));
    }
}

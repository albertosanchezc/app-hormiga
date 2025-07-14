<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Pantalla;
use Illuminate\Http\Request;

class PantallaController extends Controller
{
    //
    public function index()
    {
        $pantallas = Pantalla::with('estado')->paginate(9);
        return view('pantallas.index', compact('pantallas'));
    }
}

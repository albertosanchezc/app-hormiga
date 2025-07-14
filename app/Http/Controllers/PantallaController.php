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
        $pantallas = Pantalla::with('estado')->latest()->paginate(12);
        return view('pantallas.index', compact('pantallas'));
    }
}

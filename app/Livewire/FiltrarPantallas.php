<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Estado;

class FiltrarPantallas extends Component
{
    public $orden_servicio;
    public $marca;
    public $modelo;
    public $numero_servicio;
    public $estatus;
    public $cliente;
    public $equipo;
    public $telefono;
    public $domicilio;
    public $tipo_servicio;
    public $detectado;
    public $recibido_con;
    public $desde;
    public $hasta;

    public function leerDatosFormulario()
    {
        $this->dispatch(
            'terminosBusqueda',
            $this->orden_servicio,
            $this->marca,
            $this->modelo,
            $this->numero_servicio,
            $this->estatus,
            $this->cliente,
            $this->equipo,
            $this->telefono,
            $this->domicilio,
            $this->tipo_servicio,
            $this->detectado,
            $this->recibido_con,
            $this->desde,
            $this->hasta
        );
    }

    public function render()
    {
        $estados = Estado::select('nombre')
            ->distinct()
            ->orderBy('nombre')
            ->get();

        return view('livewire.filtrar-pantallas', compact('estados'));
    }
}
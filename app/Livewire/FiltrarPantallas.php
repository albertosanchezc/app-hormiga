<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Estado;
use App\Models\EstadoTecnico;

class FiltrarPantallas extends Component
{
    public $orden_servicio;
    public $marca;
    public $modelo;
    public $numero_servicio;
    public $estado_id;
    public $estado_tecnico_id;
    public $cliente;
    public $equipo;
    public $telefono;
    public $domicilio;
    public $tipo_servicio;
    public $detectado;
    public $numero_orden;
    public $recibido_con;
    public $accion_correctiva;
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
            $this->estado_id,
            $this->estado_tecnico_id,
            $this->cliente,
            $this->equipo,
            $this->telefono,
            $this->domicilio,
            $this->tipo_servicio,
            $this->detectado,
            $this->numero_orden,
            $this->recibido_con,
            $this->accion_correctiva,
            $this->desde,
            $this->hasta
        );
    }

    public function render()
    {
        $estados = Estado::select('id', 'nombre')
            ->distinct()
            ->orderBy('nombre')
            ->get();


        $estados_tecnicos = EstadoTecnico::select('id', 'nombre')
            ->distinct()
            ->orderBy('nombre')
            ->get();

        return view('livewire.filtrar-pantallas', compact('estados','estados_tecnicos'));
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;

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

    

    



    public function leerDatosFormulario()
    {
        // En Livewire 3 se usa dispatch (no emit)
        $this->dispatch('terminosBusqueda', $this->orden_servicio, $this->marca, $this->modelo, $this->numero_servicio, $this->estatus, $this->cliente, $this->equipo, $this->telefono);
    }

    public function render()
    {
        return view('livewire.filtrar-pantallas');
    }
}

<?php

namespace App\Livewire;

use App\Models\Orden;
use Livewire\Component;

class OrdenUpdate extends Component
{

    public $orden;

    // Método de montaje: recibe la orden al iniciar
    public function mount(Orden $orden)
    {
        $this->orden = $orden;
    }
    
    public function render()
    {
        return view('livewire.orden-update');
    }
}

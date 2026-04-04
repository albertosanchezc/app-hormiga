<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Orden;
use Livewire\Component;

class OrdenUpdate extends Component
{
    public $orden;

    public $cliente;
    public $telefono;
    public $domicilio;
    public $equipo;
    public $marca;
    public $modelo;
    public $numero_servicio;
    public $tipo_servicio;
    public $comprado_por;
    public $fecha_compra;
    public $lugar_compra;
    public $observacion;
    public $hora;

    public function mount($orden)
    {
        // Acepta tanto ID como modelo
        if (is_numeric($orden)) {
            $orden = Orden::findOrFail($orden);
        }
        $this->orden = $orden;

        // Inicializar propiedades individuales
        foreach (
            [
                'cliente',
                'telefono',
                'domicilio',
                'equipo',
                'marca',
                'modelo',
                'numero_servicio',
                'tipo_servicio',
                'comprado_por',
                'fecha_compra',
                'lugar_compra',
                'observacion',
                'hora'
            ] as $prop
        ) {
            $this->$prop = $orden->$prop;
        }
    }

    public function ordenUpdate()
    {
        $this->validate([
            'cliente' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'domicilio' => 'nullable|string|max:255',
            'equipo' => 'required|string|max:100',
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'numero_servicio' => 'required|string|max:100',
            'tipo_servicio' => 'required|string|max:100',
            'comprado_por' => 'nullable|string|max:100',
            'fecha_compra' => 'nullable|date_format:Y-m-d',
            'lugar_compra' => 'nullable|string|max:100',
            'observacion' => 'required|string',
            'hora' => 'required|date_format:H:i',
        ]);

        $this->orden->update([
            'cliente' => $this->cliente,
            'telefono' => $this->telefono,
            'domicilio' => $this->domicilio,
            'equipo' => $this->equipo,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'numero_servicio' => $this->numero_servicio,
            'tipo_servicio' => $this->tipo_servicio,
            'comprado_por' => $this->comprado_por,
            'fecha_compra' => $this->fecha_compra ? \Carbon\Carbon::parse($this->fecha_compra)->format('Y-m-d') : null,
            'lugar_compra' => $this->lugar_compra,
            'observacion' => $this->observacion,
            'hora' => $this->hora,
        ]);

        $this->orden->refresh(); // Muy importante
    }

    public function render()
    {
        return view('livewire.orden-update');
    }
}

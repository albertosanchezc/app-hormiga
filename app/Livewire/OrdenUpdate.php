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

    public function save()
    {
        $rules = [
            'cliente' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'domicilio' => 'nullable|string|max:255',
            'equipo' => 'required|string|max:100',
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'numero_servicio' => 'required|string|max:100',
            'tipo_servicio' => 'required|string|max:100',
            'comprado_por' => 'nullable|string|max:100',
            'fecha_compra' => 'nullable|date',
            'lugar_compra' => 'nullable|string|max:100',
            'observacion' => 'required|string',
        ];

        // 🔥 SOLO valida hora si el usuario la cambió
        if ($this->hora !== $this->orden->hora) {
            $rules['hora'] = 'nullable|date_format:H:i';
        }

        $validated = $this->validate($rules);

        $this->orden->update([
            'cliente' => $validated['cliente'],
            'telefono' => $validated['telefono'],
            'domicilio' => $validated['domicilio'] ?? null,
            'equipo' => $validated['equipo'],
            'marca' => $validated['marca'],
            'modelo' => $validated['modelo'],
            'numero_servicio' => $validated['numero_servicio'],
            'tipo_servicio' => $validated['tipo_servicio'],
            'comprado_por' => $validated['comprado_por'] ?? null,
            'fecha_compra' => $validated['fecha_compra'] ?? null,
            'lugar_compra' => $validated['lugar_compra'] ?? null,
            'observacion' => $validated['observacion'],

            // 🔥 importante
            'hora' => $this->hora,
        ]);
        // return redirect()->route('pantallas.index');
    }

    public function render()
    {
        return view('livewire.orden-update');
    }
}

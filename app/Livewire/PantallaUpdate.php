<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Orden;
use Livewire\Component;
use App\Models\Pantalla;
use App\Notifications\NuevoDiagnostico;

class PantallaUpdate extends Component
{
    public Pantalla $pantalla;

    // Campos editables
    public $orden_servicio;
    public $diagnostico;
    public $entregado;
    public $fecha_revision;
    public $fecha_trabajo;
    public $tecnico;
    public $accion_correctiva;
    public $costo_reparacion;
    public $estatus;
    public $detectado;
    public $observacion;
    public $notas;
    public $fecha_entrada;



    public function mount(Pantalla $pantalla)
    {
        $this->pantalla = $pantalla;
        $this->orden_servicio = $pantalla->orden_servicio;
        $this->diagnostico = $pantalla->orden->diagnostico;
        $this->entregado = $pantalla->orden->entregado;
        $this->fecha_entrada = $pantalla->orden->fecha_entrada?->format('Y-m-d') ?? '';
        $this->fecha_revision = $pantalla->orden->fecha_trabajo?->format('Y-m-d') ?? '';
        $this->fecha_trabajo  = $pantalla->orden->fecha_reparacion?->format('Y-m-d') ?? '';
        $this->tecnico = $pantalla->orden->tecnico;
        $this->detectado = $this->diagnostico;
        $this->notas = $pantalla->notas;
        $this->accion_correctiva = $pantalla->orden->accion_correctiva;
        $this->costo_reparacion = $pantalla->orden->costo_reparacion;
        $this->estatus = $pantalla->orden->estatus;
        $this->observacion = $pantalla->orden->observacion;
    }


    public function save()
    {
        $pantalla = Pantalla::where('orden_servicio', $this->orden_servicio)->first();

        if (!$pantalla) {
            abort(404, 'Pantalla no encontrada');
        }
        $orden = $pantalla->orden;
        $this->validate([
            'diagnostico' => 'nullable|string|max:500',
            'entregado' => 'nullable|date',
            'fecha_revision' => 'nullable|date',
            'fecha_trabajo' => 'nullable|date',
            'tecnico' => 'nullable|string|max:255',
            'accion_correctiva' => 'nullable|string|max:500',
            'costo_reparacion' => 'nullable|numeric',
            'estatus' => 'nullable|string|max:100',
        ]);

        $orden->update([
            'diagnostico' => $this->diagnostico,
            'entregado' => $this->entregado,
            'fecha_reparacion' => $this->fecha_revision,
            'fecha_trabajo' => $this->fecha_trabajo,
            'tecnico' => $this->tecnico,
            'accion_correctiva' => $this->accion_correctiva,
            'costo_reparacion' => $this->costo_reparacion,
            'estatus' => $this->estatus,
            'observacion' => $this->observacion,
        ]);

        $pantalla->update([
            'detectado' => $this->diagnostico,
            'entregado' => $this->entregado,
            'fecha_reparacion' => $this->fecha_revision,
            'fecha_trabajo' => $this->fecha_trabajo,
            'tecnico' => $this->tecnico,
            'accion_correctiva' => $this->accion_correctiva,
            'costo_reparacion' => $this->costo_reparacion,
            'estatus' => $this->estatus,
            'observacion' => $this->observacion,
            'notas' => $this->accion_correctiva,
        ]);

        $orden->save();
        $usuarios = User::whereIn('rol', [2, 3])->get();

        // Enviar la notificación a cada uno
        foreach ($usuarios as $usuario) {
            $usuario->notify(new NuevoDiagnostico($orden));
        }

        return redirect()->route('pantallas.index');

        session()->flash('success', 'Pantalla actualizada correctamente.');
    }

    public function render()
    {
        return view('livewire.pantalla-update');
    }
}

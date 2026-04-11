<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Orden;
use App\Models\Estado;
use Livewire\Component;
use App\Models\Pantalla;
use App\Notifications\NuevoDiagnostico;

class PantallaUpdate extends Component
{
    public $pantalla;

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



    public function mount($pantalla)
    {
        $this->pantalla = Pantalla::where('orden_servicio', $pantalla)->firstOrFail();

        $this->orden_servicio = $this->pantalla->orden_servicio;
        $this->diagnostico = $this->pantalla->orden->diagnostico;
        $this->entregado = $this->pantalla->orden->entregado;
        $this->fecha_entrada = $this->pantalla->orden->fecha_entrada?->format('Y-m-d') ?? '';
        $this->fecha_revision = $this->pantalla->orden->fecha_trabajo?->format('Y-m-d') ?? '';
        $this->fecha_trabajo  = $this->pantalla->orden->fecha_reparacion?->format('Y-m-d') ?? '';
        $this->tecnico = $this->pantalla->orden->tecnico;
        $this->detectado = $this->diagnostico;
        $this->notas = $this->pantalla->notas;
        $this->accion_correctiva = $this->pantalla->orden->accion_correctiva;
        $this->costo_reparacion = $this->pantalla->orden->costo_reparacion;
        $this->estatus = $this->pantalla->orden->estatus;
        $this->observacion = $this->pantalla->orden->observacion;
    }


    public function save()
    {
        $pantalla = $this->pantalla;

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

        // Convertir cadenas vacías en null
        $this->entregado = $this->entregado ?: null;
        $this->fecha_revision = $this->fecha_revision ?: null;
        $this->fecha_trabajo = $this->fecha_trabajo ?: null;

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

        // Resolver estado automáticamente
        if (!empty($this->estatus)) {

            $estado = Estado::firstOrCreate([
                'nombre' => strtoupper(trim($this->estatus))
            ]);

            $pantalla->estado_id = $estado->id;
        }

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
        session()->flash('success', 'Pantalla actualizada correctamente.');
        return redirect()->route('pantallas.index');
    }

    public function render()
    {
        return view('livewire.pantalla-update');
    }
}

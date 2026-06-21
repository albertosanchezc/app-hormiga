<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Orden;
use App\Models\Estado;
use App\Models\EstadoTecnico;
use Livewire\Component;
use App\Models\Pantalla;
use App\Notifications\NuevoDiagnostico;

class PantallaUpdate extends Component
{
    public Pantalla $pantalla;
    // public $pantalla;

    // Campos editables
    public $orden_servicio;
    public $diagnostico;
    public $entregado;
    public $fecha_revision;
    public $fecha_trabajo;
    public $tecnico;
    public $accion_correctiva;
    public $costo_reparacion;
    // public $estatus;
    public $estatus = '';
    public $estado_tecnico_id = '';


    public $detectado;
    public $observacion;
    public $notas;
    public $fecha_entrada;


    public $estadosDisponibles = [];
    public $estadosTecnicosDisponibles = [];

    public function mount(Pantalla $pantalla)
    {
        $this->pantalla = $pantalla;

        $this->orden_servicio = $pantalla->orden_servicio;
        $this->diagnostico = $pantalla->orden->diagnostico;
        $this->entregado = $pantalla->orden->entregado?->format('Y-m-d') ?? '';
        $this->fecha_entrada = $pantalla->orden->fecha_entrada?->format('Y-m-d') ?? '';
        $this->fecha_revision = $pantalla->orden->fecha_trabajo?->format('Y-m-d') ?? '';
        $this->fecha_trabajo  = $pantalla->orden->fecha_reparacion?->format('Y-m-d') ?? '';
        $this->tecnico = $pantalla->orden->tecnico;
        $this->detectado = $this->diagnostico;
        $this->notas = $pantalla->notas;
        $this->accion_correctiva = $pantalla->orden->accion_correctiva;
        $this->costo_reparacion = $pantalla->orden->costo_reparacion;
        $this->estatus = $pantalla->orden->estatus;
        $this->estado_tecnico_id = $pantalla->orden->estado_tecnico_id;
        $this->observacion = $pantalla->orden->observacion;

        // CARGAR ESTADOS DISPONIBLES
        $this->estadosDisponibles = Estado::select('nombre')
            ->distinct()
            ->orderBy('nombre')
            ->get();

        // CARGAR ESTADOS DISPONIBLES
        $this->estadosTecnicosDisponibles = EstadoTecnico::select('id','nombre')
            ->distinct()
            ->orderBy('id')
            ->get();
        // dd($prueba);
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
        if (!empty($this->estado_tecnico)) {

            $estadoTecnicoSel = EstadoTecnico::where('nombre', $this->estado_tecnico)->first();

            if ($estadoTecnicoSel) {
                $orden->estado_tecnico_id = $estadoTecnicoSel->id;
            }
        }

        // dd($this->estado_tecnico_id);
        $orden->update([
            'diagnostico' => $this->diagnostico,
            'entregado' => $this->entregado,
            'fecha_reparacion' => $this->fecha_trabajo,
            'fecha_trabajo' => $this->fecha_revision,
            'tecnico' => $this->tecnico,
            'accion_correctiva' => $this->accion_correctiva,
            'costo_reparacion' => $this->costo_reparacion,
            'estatus' => $this->estatus,
            'estado_tecnico_id' => $this->estado_tecnico_id,
            'observacion' => $this->observacion,
        ]);

        // Resolver estado automáticamente
        // if (!empty($this->estatus)) {

        //     $estado = Estado::firstOrCreate([
        //         'nombre' => strtoupper(trim($this->estatus))
        //     ]);

        //     $pantalla->estado_id = $estado->id;
        // }

        if (!empty($this->estatus)) {

            $estado = Estado::where('nombre', $this->estatus)->first();

            if ($estado) {
                $pantalla->estado_id = $estado->id;
            }
        }

        $pantalla->update([
            'detectado' => $this->diagnostico,
            'fecha_reparacion' => $this->fecha_trabajo,
            'fecha_trabajo' => $this->fecha_revision,
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

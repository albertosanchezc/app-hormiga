<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Orden;
use Livewire\Component;
use App\Models\Pantalla;
use App\Notifications\OrdenCreadaNotification;
use Illuminate\Support\Facades\Notification;

class CrearOrden extends Component
{

    public $folio;
    public $fecha;
    public $hora;

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


    protected $rules = [
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


    public function mount()
    {
        $lastOrden = Orden::latest('id')->first();
        $this->folio = $lastOrden ? $lastOrden->orden_servicio + 1 : 1;

        $now = Carbon::now(config('app.timezone'));
        $this->fecha = $now->format('Y-m-d');
        $this->hora  = $now->format('H:i');
    }

    public function crearOrden()
    {

        
        $this->validate();

        $orden = Orden::create([
            'orden_servicio' => $this->folio,
            'fecha_entrada'  => $this->fecha,
            'hora' => horaToFormatoNumerico($this->hora),
            'cliente'        => $this->cliente,
            'telefono'       => $this->telefono,
            'domicilio'      => $this->domicilio,
            'equipo'         => $this->equipo,
            'marca'          => $this->marca,
            'modelo'         => $this->modelo,
            'numero_servicio' => $this->numero_servicio,
            'tipo_servicio'  => $this->tipo_servicio,
            'comprado_por'   => $this->comprado_por,
            'fecha_compra'   => $this->fecha_compra,
            'lugar_compra'   => $this->lugar_compra,
            'observacion'    => $this->observacion,
        ]);

        Pantalla::create([
            'orden_servicio' => $this->folio, // Relación
            'marca' => $this->marca,
            'pulgadas' => $this->modelo,
            'estado_id' => 153, // En revisión"
            'recibido_con' => $this->observacion,
            'detectado' => null,
            'fecha_registro' => now(),
            'fecha_revision' => null,
            'tecnico' => null,
        ]);
        // session()->flash('mensaje', 'Orden creada correctamente');

        $tecnicos = User::where('rol', 1)->get();// Rol técnico
        Notification::send($tecnicos, new OrdenCreadaNotification($orden));

        return redirect()->route('pantallas.index');
    }


    public function render()
    {
        return view('livewire.crear-orden');
    }
}

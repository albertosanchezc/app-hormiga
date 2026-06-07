<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Orden;
use Livewire\Component;
use App\Models\Pantalla;
use App\Notifications\OrdenCreadaNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;

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
        'fecha_compra' => 'nullable|date_format:Y-m-d',
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

        // =========================================
        // REINCIDENCIA / DUPLICAR DATOS
        // =========================================

        if (request()->has('duplicar')) {

            $ordenOriginal = Orden::where(
                'orden_servicio',
                request('duplicar')
            )->first();

            if ($ordenOriginal) {

                $this->cliente = $ordenOriginal->cliente;
                $this->telefono = $ordenOriginal->telefono;
                $this->domicilio = $ordenOriginal->domicilio;
                $this->equipo = $ordenOriginal->equipo;
                $this->marca = $ordenOriginal->marca;
                $this->modelo = $ordenOriginal->modelo;
                $this->numero_servicio = $ordenOriginal->numero_servicio;
                $this->tipo_servicio = $ordenOriginal->tipo_servicio;
                $this->comprado_por = $ordenOriginal->comprado_por;
                $this->fecha_compra = $ordenOriginal->fecha_compra;
                $this->lugar_compra = $ordenOriginal->lugar_compra;

                // Opcional
                $this->observacion =
                    'Reincidencia de folio #' .
                    $ordenOriginal->orden_servicio;
            }
        }
    }


    public function crearOrden()
    {
        // Validación estricta
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
            'fecha_compra' => 'nullable|date_format:Y-m-d', // 🔥 clave
            'lugar_compra' => 'nullable|string|max:100',
            'observacion' => 'required|string',
            'hora' => 'nullable|date_format:H:i',
        ]);

        // Normalizar fecha_compra
        $fechaCompra = $this->fecha_compra
            ? Carbon::parse($this->fecha_compra)->format('Y-m-d')
            : null;

        // Fecha y hora actual (consistente)
        $now = Carbon::now(config('app.timezone'));

        if (Orden::where('orden_servicio', $this->folio)->exists()) {
            return;
        }

        // Crear orden
        // $orden = Orden::create([
        //     'orden_servicio' => $this->folio,
        //     'fecha_entrada'  => $now, // ✅ ahora sí datetime real
        //     'hora'           => $now->format('H:i:s'), // opcional
        //     'cliente'        => $this->cliente,
        //     'telefono'       => $this->telefono,
        //     'domicilio'      => $this->domicilio,
        //     'equipo'         => $this->equipo,
        //     'marca'          => $this->marca,
        //     'modelo'         => $this->modelo,
        //     'numero_servicio' => $this->numero_servicio,
        //     'tipo_servicio'  => $this->tipo_servicio,
        //     'comprado_por'   => $this->comprado_por,
        //     'fecha_compra'   => $fechaCompra, // 🔥 ya normalizado
        //     'lugar_compra'   => $this->lugar_compra,
        //     'observacion'    => $this->observacion,
        // ]);


        // // Crear pantalla relacionada
        // Pantalla::create([
        //     'orden_servicio' => $this->folio,
        //     'marca' => $this->marca,
        //     'pulgadas' => $this->modelo,
        //     'estado_id' => 153,
        //     'recibido_con' => $this->observacion,
        //     'detectado' => null,
        //     'fecha_registro' => now(),
        //     'fecha_revision' => null,
        //     'tecnico' => null,
        // ]);
        try {

            $orden = DB::transaction(function () use ($fechaCompra, $now) {

                $orden = Orden::create([
                    'orden_servicio' => $this->folio,
                    'fecha_entrada'  => $now,
                    'hora'           => $now->format('H:i:s'),
                    'cliente'        => $this->cliente,
                    'telefono'       => $this->telefono,
                    'domicilio'      => $this->domicilio,
                    'equipo'         => $this->equipo,
                    'marca'          => $this->marca,
                    'modelo'         => $this->modelo,
                    'numero_servicio' => $this->numero_servicio,
                    'tipo_servicio'  => $this->tipo_servicio,
                    'comprado_por'   => $this->comprado_por,
                    'fecha_compra'   => $fechaCompra,
                    'lugar_compra'   => $this->lugar_compra,
                    'observacion'    => $this->observacion,
                ]);

                \Log::info('Intentando crear pantalla', [
                    'orden_servicio' => $this->folio,
                    'marca'          => $this->marca,
                    'pulgadas'       => $this->modelo,
                    'estado_id'      => 153,
                    'recibido_con'   => $this->observacion,
                ]);

                Pantalla::create([
                    'orden_servicio' => $this->folio,
                    'marca'          => $this->marca,
                    'pulgadas'       => $this->modelo,
                    'estado_id'      => 153,
                    'recibido_con'   => $this->observacion,
                    'detectado'      => null,
                    'fecha_registro' => now(),
                    'fecha_revision' => null,
                    'tecnico'        => null,
                ]);

                return $orden;
            });
        } catch (\Throwable $e) {

            \Log::error('Error creando orden/pantalla', [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
                'trace'   => $e->getTraceAsString(),
            ]);

            dd($e);
        }

        // Notificar técnicos
        $tecnicos = User::where('rol', 1)->get();
        try {
            Notification::send($tecnicos, new OrdenCreadaNotification($orden));
        } catch (\Exception $e) {
            \Log::error('Error enviando notificación: ' . $e->getMessage());
        }
        // Redirigir
        return redirect()->route('pantallas.index');
    }


    public function render()
    {
        return view('livewire.crear-orden');
    }
}

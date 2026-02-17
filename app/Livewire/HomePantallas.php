<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pantalla;
use Livewire\WithPagination;

class HomePantallas extends Component
{

    use WithPagination;

    public $orden_servicio;
    public $marca;
    public $modelo;
    public $numero_servicio;
    public $estatus;
    public $cliente;
    public $equipo;
    public $telefono;
    public $domicilio;
    public $tipo_servicio;
    public $detectado;

    // Listener
    protected $listeners = ['terminosBusqueda' => 'buscar']; // Escucha por el evento terminosBusqueda y ejecuta buscar de este componente


    public function buscar($orden_servicio, $marca, $modelo, $numero_servicio, $estatus, $cliente, $equipo, $telefono, $domicilio, $tipo_servicio, $detectado)
    {
        $this->orden_servicio = $orden_servicio;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->numero_servicio = $numero_servicio;
        $this->estatus = $estatus;
        $this->cliente = $cliente;
        $this->equipo = $equipo;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
        $this->tipo_servicio = $tipo_servicio;
        $this->detectado = $detectado;

        $this->resetPage();
    }

    public function render()
    {
        // $pantallas = Pantalla::all();
        // $pantallas = Pantalla::paginate(12);
        $pantallas = Pantalla::when($this->orden_servicio, function ($query) {
            // $query->where('orden_servicio', 'LIKE', "%" . $this->orden_servicio . "%"); // hace una búsqueda por registros similares en donde aparezca en cualquier parte nuestro término
            $query->where('orden_servicio', $this->orden_servicio);
        })
            ->when($this->marca, function ($query) {
                $query->where('marca', 'LIKE', "%" . $this->marca . "%");
            })
            ->when($this->modelo, function ($query) {
                $query->whereHas('orden', function ($q) {
                    $q->where('modelo', 'LIKE', "%" . $this->modelo . "%");
                });
            })
            ->when($this->numero_servicio, function ($query) {
                $query->whereHas('orden', function ($q) {
                    $q->where('numero_servicio', 'LIKE', "%" . $this->numero_servicio . "%");
                });
            })
            ->when($this->estatus, function ($query) {
                $query->whereHas('orden', function ($q) {
                    $q->where('estatus', 'LIKE', "%" . $this->estatus . "%");
                });
            })
            ->when($this->cliente, function ($query) {
                $query->whereHas('orden', function ($q) {
                    $q->where('cliente', 'LIKE', "%" . $this->cliente . "%");
                });
            })
            ->when($this->equipo, function ($query) {
                $query->whereHas('orden', function ($q) {
                    $q->where('equipo', 'LIKE', "%" . $this->equipo . "%");
                });
            })
            ->when($this->telefono, function ($query) {
                $query->whereHas('orden', function ($q) {
                    $q->where('telefono', 'LIKE', "%" . $this->telefono . "%");
                });
            })
            ->when($this->domicilio, function ($query) {
                $query->whereHas('orden', function ($q) {
                    $q->where('domicilio', 'LIKE', "%" . $this->domicilio . "%");
                });
            })
            ->when($this->tipo_servicio, function ($query) {
                $query->whereHas('orden', function ($q) {
                    $q->where('tipo_servicio', 'LIKE', "%" . $this->tipo_servicio . "%");
                });
            })
            ->when($this->detectado, function ($query) {
                $query->whereHas('orden', function ($q) {
                    $q->where('detectado', 'LIKE', "%" . $this->detectado . "%");
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(12);

        return view('livewire.home-pantallas', compact('pantallas'));
    }
}

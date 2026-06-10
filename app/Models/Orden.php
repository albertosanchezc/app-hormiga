<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\EstadosTecnicos;
class Orden extends Model
{
    //
    use HasFactory;

    protected $table = 'ordenes';

    protected $casts = [
        'fecha_entrada'    => 'date',
        'fecha_trabajo'    => 'date',
        'fecha_reparacion' => 'date',
        'fecha_compra'     => 'date:Y-m-d',
        'entregado'        => 'date',
    ];

    protected $fillable = [
        'orden_servicio',
        'fecha_entrada',
        'cliente',
        'equipo',
        'marca',
        'modelo',
        'tipo_servicio',
        'observacion',
        'valor_estimado',
        'diagnostico',
        'accion_correctiva',
        'tecnico',
        'fecha_trabajo',
        'fecha_reparacion',
        'costo_reparacion',
        'numero_servicio',
        'comprado_por',
        'fecha_compra',
        'estatus',
        'observacion_extra',
        'numero_orden',
        'entregado',
        'telefono',
        'domicilio',
        'hora',
        'lugar_compra',
        'costo_adicional',
        'created_at',
        'updated_at'
    ];

    public function ingresosPrevios()
    {
        // Si tiene número de serie, usarlo como prioridad
        if (!empty($this->numero_servicio)) {
            return self::where('numero_servicio', $this->numero_servicio)
                ->where('id', '!=', $this->id)
                ->latest()
                ->get();
        }

        // Fallback cuando no hay número de serie
        return self::where('cliente', $this->cliente)
            ->where('marca', $this->marca)
            ->where('modelo', $this->modelo)
            ->where('id', '!=', $this->id)
            ->latest()
            ->get();
    }

    public function tieneHistorial()
    {
        return $this->ingresosPrevios()->isNotEmpty();
    }

    public function cantidadIngresosPrevios()
    {
        return $this->ingresosPrevios()->count();
    }

    public function estadoTecnico()
    {
        return $this->belongsTo(EstadosTecnicos::class, 'estado_tecnico_id');
    }
}

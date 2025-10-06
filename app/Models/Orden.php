<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    //
    use HasFactory;
    
    protected $table = 'ordenes';

    protected $casts = [
        'fecha_entrada'    => 'date',
        'fecha_trabajo'    => 'date',
        'fecha_reparacion' => 'date',
        'fecha_compra'     => 'date',
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
        'telefono',
        'hora',
        'lugar_compra',
        'costo_adicional',
        'created_at',
        'updated_at'
    ];

    
}

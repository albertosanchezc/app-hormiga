<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pantalla extends Model
{
    //
    protected $fillable = [
        'orden_servicio',
        'marca',
        'pulgadas',
        'estado_id',
        'recibido_con',
        'notas',
        'detectado',
        'fecha_registro',
        'fecha_revision',
        'tecnico'
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function orden()
    {
        return $this->belongsTo(Orden::class, 'orden_servicio', 'orden_servicio');
    }
}

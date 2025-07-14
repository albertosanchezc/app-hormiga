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
        'fecha_revision'
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}

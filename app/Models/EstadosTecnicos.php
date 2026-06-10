<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadosTecnicos extends Model
{
    //
    // protected $table = 'estados_tecnicos';

    protected $fillable = [
        'nombre',
    ];

    public function ordenes()
    {
        return $this->hasMany(Orden::class, 'estado_tecnico_id');
    }
}

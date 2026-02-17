<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $fillable = [
        'nombre'
    ];


    public function getColorClaseAttribute()
    {
        return match ($this->nombre) {

            'PENDIENTE POR AUTORIZAR'
            => 'bg-orange-100 text-orange-800',

            'PENDIENTE POR REFACCION'
            => 'bg-orange-100 text-orange-800',

            'EN REVISION'
            => 'bg-blue-100 text-blue-800',

            'TERMINADO'
            => 'bg-green-100 text-green-800',

            'CANCELADO'
            => 'bg-red-100 text-red-800',

            'APARATO NO REPARADO'
            => 'bg-indigo-100 text-indigo-800',

            'EN PROCESO CON LA ASEGURADORA'
            => 'bg-purple-100 text-purple-800', 

            'EQUIPO SIN FALLA'
            => 'bg-green-300 text-green-800', 
  
            default
            => 'bg-gray-100 text-gray-800',
        };
    }
}

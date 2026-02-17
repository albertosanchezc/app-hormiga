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

            // 🟠 Requiere autorización cliente
            'PENDIENTE POR AUTORIZAR'
            => 'bg-orange-200 text-orange-900',

            // 🟡 Esperando refacción
            'PENDIENTE POR REFACCION'
            => 'bg-yellow-200 text-yellow-900',

            // 🔵 Trabajo activo
            'EN REVISION'
            => 'bg-blue-200 text-blue-900',

            // 🟣 Proceso externo
            'EN PROCESO CON LA ASEGURADORA'
            => 'bg-purple-200 text-purple-900',

            // 🟢 Finalizado correcto
            'TERMINADO'
            => 'bg-green-200 text-green-900',

            // 🟢 Sin falla detectada (positivo pero distinto)
            'EQUIPO SIN FALLA'
            => 'bg-emerald-200 text-emerald-900',

            // 🔴 Cierre negativo administrativo
            'CANCELADO'
            => 'bg-red-200 text-red-900',

            // 🔵/🟣 Resultado técnico negativo distinto
            'APARATO NO REPARADO'
            => 'bg-indigo-200 text-indigo-900',

            default
            => 'bg-gray-100 text-gray-800',
        };
    }

    public function getBorderClaseAttribute()
    {
        return match ($this->nombre) {

            'PENDIENTE POR AUTORIZAR' => 'border-t-4 border-orange-400',
            'PENDIENTE POR REFACCION' => 'border-t-4 border-yellow-400',
            'EN REVISION' => 'border-t-4 border-blue-400',
            'EN PROCESO CON LA ASEGURADORA' => 'border-t-4 border-purple-400',
            'TERMINADO' => 'border-t-4 border-green-400',
            'EQUIPO SIN FALLA' => 'border-t-4 border-emerald-400',
            'CANCELADO' => 'border-t-4 border-red-400',
            'APARATO NO REPARADO' => 'border-t-4 border-indigo-400',
            default => 'border-t-4 border-gray-300',
        };
    }
}

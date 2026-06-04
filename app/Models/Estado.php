<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['nombre'];

    /*
    |--------------------------------------------------------------------------
    | Clasificación inteligente por etapas
    |--------------------------------------------------------------------------
    */

    private function grupo()
    {
        return match ($this->nombre) {

            'TERMINADO / LISTO PARA ENTREGA ',
            'ENTREGADO'
            => 'terminado',

            'REVISADO / PENDIENTE POR AUTORIZAR'
            => 'pendiente_autorizar',

            'NO REPARADO',
            'NO AUTORIZ REPARACION'
            => 'no_reparado',

            'PENDIENTE DE REVISIN'
            => 'revision',

            'PENDIENTE POR REFACCIN'
            => 'pendiente_refaccion',

            'PENDIENTE POR COTIZACIN'
            => 'pendiente_cotizacion',

            'EN PRUEBAS'
            => 'pruebas',

            'AUTORIZADO / EN REPARACIN'
            => 'en_reparacion',

            'REPARADO PARA VENTA'
            => 'reparado_venta',

            'CAMBIO FSICO / REESGUARDO'
            => 'reemplazo',

            'ADMINISTRATIVO'
            => 'administrativo',

            'REVISADO / NO PRESENT LA FALLA'
            => 'sin_falla',

            'PROCESO GARANTA / ASEGURADORA'
            => 'garantia',

            'PENDIENTE POR  RESOLUCION'
            => 'resolucion',

            default
            => 'default',
        };
    }

    /*
    |--------------------------------------------------------------------------
    | Color Badge
    |--------------------------------------------------------------------------
    */

    public function getColorClaseAttribute()
    {
        return match ($this->grupo()) {

            'terminado'
            => 'bg-green-200 text-green-900',

            'pendiente_autorizar'
            => 'bg-sky-200 text-sky-900',

            'no_reparado'
            => 'bg-yellow-200 text-yellow-900',

            'revision'
            => 'bg-gray-200 text-gray-900',

            'pendiente_refaccion'
            => 'bg-indigo-700 text-white',

            'pendiente_cotizacion'
            => 'bg-orange-700 text-white',

            'pruebas'
            => 'bg-cyan-200 text-cyan-900',

            'en_reparacion'
            => 'bg-blue-600 text-white',

            'reparado_venta'
            => 'bg-emerald-300 text-emerald-950',

            'reemplazo'
            => 'bg-purple-300 text-purple-950',

            'administrativo'
            => 'bg-stone-300 text-stone-950',

            'sin_falla'
            => 'bg-lime-200 text-lime-900',

            'garantia'
            => 'bg-pink-300 text-pink-950',

            'resolucion'
            => 'bg-amber-300 text-amber-950',

            default
            => 'bg-gray-100 text-gray-800',
        };
    }

    /*
    |--------------------------------------------------------------------------
    | Color Border Superior
    |--------------------------------------------------------------------------
    */

    public function getBorderClaseAttribute()
    {
        return match ($this->grupo()) {

            'terminado'
            => 'border-t-4 border-green-400',

            'pendiente_autorizar'
            => 'border-t-4 border-sky-400',

            'no_reparado'
            => 'border-t-4 border-yellow-400',

            'revision'
            => 'border-t-4 border-gray-400',

            'pendiente_refaccion'
            => 'border-t-4 border-indigo-500',

            'pendiente_cotizacion'
            => 'border-t-4 border-orange-500',

            'pruebas'
            => 'border-t-4 border-cyan-400',

            'en_reparacion'
            => 'border-t-4 border-blue-500',

            'reparado_venta'
            => 'border-t-4 border-emerald-500',

            'reemplazo'
            => 'border-t-4 border-purple-500',

            'administrativo'
            => 'border-t-4 border-stone-400',

            'sin_falla'
            => 'border-t-4 border-lime-500',

            'garantia'
            => 'border-t-4 border-pink-500',

            'resolucion'
            => 'border-t-4 border-amber-500',

            default
            => 'border-t-4 border-gray-300',
        };
    }
}

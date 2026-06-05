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

    private ?string $grupoCache = null;

    private function grupo()
    {
        if ($this->grupoCache !== null) {
            return $this->grupoCache;
        }

        $this->grupoCache = match (trim($this->nombre)) {

            'TERMINADO  LISTO PARA ENTREGA',
            'ENTREGADO'
            => 'terminado',

            'REVISADO  PENDIENTE POR AUTORIZAR'
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

            'AUTORIZADO  EN REPARACIN'
            => 'en_reparacion',

            'REPARADO PARA VENTA'
            => 'reparado_venta',

            'CAMBIO FSICO  REESGUARDO'
            => 'reemplazo',

            'ADMINISTRATIVO'
            => 'administrativo',

            'REVISADO  NO PRESENTÓ LA FALLA'
            => 'sin_falla',

            'PROCESO GARANTA  ASEGURADORA'
            => 'garantia',

            'PENDIENTE POR  RESOLUCION'
            => 'resolucion',

            default
            => 'default',
        };

        return $this->grupoCache;
    }

    /*
    |--------------------------------------------------------------------------
    | Color Badge
    |--------------------------------------------------------------------------
    */

    public function getColorClaseAttribute()
    {
        return match ($this->grupo()) {

            /*
        |--------------------------------------------------------------------------
        | VERDE CLARO
        | TERMINADO / ENTREGADO
        |--------------------------------------------------------------------------
        */

            'terminado'
            => 'bg-green-100 text-green-900',

            /*
        |--------------------------------------------------------------------------
        | AZUL CIELO
        | PENDIENTE AUTORIZACIÓN
        |--------------------------------------------------------------------------
        */

            'pendiente_autorizar'
            => 'bg-sky-100 text-sky-900',

            /*
        |--------------------------------------------------------------------------
        | AMARILLO CLARO
        | NO REPARADO / NO AUTORIZÓ
        |--------------------------------------------------------------------------
        */

            'no_reparado'
            => 'bg-yellow-100 text-yellow-900',

            /*
        |--------------------------------------------------------------------------
        | GRIS
        | RECICLAJE / ADMIN / REVISIÓN
        |--------------------------------------------------------------------------
        */

            'revision'
            => 'bg-gray-200 text-gray-900',

            'administrativo'
            => 'bg-gray-300 text-gray-950',

            /*
        |--------------------------------------------------------------------------
        | ROSA / BEIGE
        | EN ESPERA
        |--------------------------------------------------------------------------
        */

            'resolucion'
            => 'bg-rose-100 text-rose-900',

            /*
        |--------------------------------------------------------------------------
        | AZUL MEDIO
        | EN ESPERA DE RECOLECCIÓN / PRUEBAS
        |--------------------------------------------------------------------------
        */

            'pruebas'
            => 'bg-blue-300 text-blue-950',

            /*
        |--------------------------------------------------------------------------
        | NARANJA
        | REFACCIÓN PEDIDA
        |--------------------------------------------------------------------------
        */

            'pendiente_cotizacion'
            => 'bg-orange-300 text-orange-950',

            /*
        |--------------------------------------------------------------------------
        | AMARILLO INTENSO
        | REFACCIÓN EN TALLER
        |--------------------------------------------------------------------------
        */

            'reparado_venta'
            => 'bg-amber-200 text-amber-950',

            /*
        |--------------------------------------------------------------------------
        | AZUL OSCURO
        | PENDIENTE REFACCIÓN
        |--------------------------------------------------------------------------
        */

            'pendiente_refaccion'
            => 'bg-blue-800 text-white',

            /*
        |--------------------------------------------------------------------------
        | MARRÓN / ROJO QUEMADO
        | EN REPARACIÓN / COTIZACIÓN CRÍTICA
        |--------------------------------------------------------------------------
        */

            'en_reparacion'
            => 'bg-orange-700 text-white',

            /*
        |--------------------------------------------------------------------------
        | AZUL REY
        | GARANTÍA / NO HAY REFACCIÓN
        |--------------------------------------------------------------------------
        */

            'garantia'
            => 'bg-sky-500 text-white',

            /*
        |--------------------------------------------------------------------------
        | MORADO
        | CAMBIO FÍSICO
        |--------------------------------------------------------------------------
        */

            'reemplazo'
            => 'bg-purple-300 text-purple-950',

            /*
        |--------------------------------------------------------------------------
        | NEUTRO
        |--------------------------------------------------------------------------
        */

            'sin_falla'
            => 'bg-stone-200 text-stone-900',

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
            => 'border-t-4 border-green-200',

            'pendiente_autorizar'
            => 'border-t-4 border-sky-200',

            'no_reparado'
            => 'border-t-4 border-yellow-200',

            'revision'
            => 'border-t-4 border-gray-300',

            'administrativo'
            => 'border-t-4 border-gray-400',

            'resolucion'
            => 'border-t-4 border-rose-200',

            'pruebas'
            => 'border-t-4 border-blue-400',

            'pendiente_cotizacion'
            => 'border-t-4 border-orange-300',

            'reparado_venta'
            => 'border-t-4 border-amber-300',

            'pendiente_refaccion'
            => 'border-t-4 border-blue-900',

            'en_reparacion'
            => 'border-t-4 border-orange-800',

            'garantia'
            => 'border-t-4 border-sky-600',

            'reemplazo'
            => 'border-t-4 border-purple-400',

            'sin_falla'
            => 'border-t-4 border-stone-300',

            default
            => 'border-t-4 border-gray-300',
        };
    }
}

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
    $nombre = strtoupper($this->nombre);

    return match (true) {

        str_contains($nombre, 'NO REVISADO')
            => 'no_revisado',

        str_contains($nombre, 'REVISION')
            => 'en_revision',

        str_contains($nombre, 'DIAGNOSTICADO')
            => 'diagnosticado',

        str_contains($nombre, 'GARANTIA')
            => 'garantia',

        str_contains($nombre, 'ASEGURADORA') ||
        str_contains($nombre, 'AXA')
            => 'aseguradora',

        str_contains($nombre, 'AUTORIZ')
            => 'autorizacion',

        str_contains($nombre, 'REFACC') ||
        str_contains($nombre, 'COTIZ') ||
        str_contains($nombre, 'COSTO')
            => 'refaccion',

        str_contains($nombre, 'PRUEBA')
            => 'pruebas',

        str_contains($nombre, 'PROCESO') ||
        str_contains($nombre, 'REPAR')
            => 'proceso',

        str_contains($nombre, 'SIN FALLA') ||
        str_contains($nombre, 'NO PRESENTA FALLA')
            => 'sin_falla',

        str_contains($nombre, 'NO REPARADO') ||
        str_contains($nombre, 'CANCEL') ||
        str_contains($nombre, 'DECLIN') ||
        str_contains($nombre, 'IRRECUPERABLE')
            => 'negativo',

        str_contains($nombre, 'ENTREG') ||
        str_contains($nombre, 'TERMIN')
            => 'entregado',

        default => 'default',
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

        // 🔵 DIAGNÓSTICO PROGRESIVO
        'no_revisado'   => 'bg-blue-100 text-blue-800',
        'en_revision'   => 'bg-blue-300 text-blue-900',
        'diagnosticado' => 'bg-blue-600 text-white',

        // 🟣 GARANTÍA
        'garantia'      => 'bg-purple-200 text-purple-900',

        // 🟡 ASEGURADORA
        'aseguradora'   => 'bg-yellow-200 text-yellow-900',

        // 🟠 AUTORIZACIÓN
        'autorizacion'  => 'bg-orange-200 text-orange-900',

        // 🟡 REFACCIÓN
        'refaccion'     => 'bg-amber-200 text-amber-900',

        // 🟦 REPARACIÓN
        'proceso'       => 'bg-indigo-200 text-indigo-900',

        // 🧪 PRUEBAS
        'pruebas'       => 'bg-cyan-200 text-cyan-900',

        // 🟢 SIN FALLA
        'sin_falla'     => 'bg-emerald-200 text-emerald-900',

        // 🔴 NEGATIVO
        'negativo'      => 'bg-red-200 text-red-900',

        // 🟢 ENTREGADO
        'entregado'     => 'bg-green-200 text-green-900',

        default         => 'bg-gray-100 text-gray-800',
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

            'revision'      => 'border-t-4 border-blue-400',
            'garantia'      => 'border-t-4 border-purple-400',
            'aseguradora'   => 'border-t-4 border-yellow-400',
            'autorizacion'  => 'border-t-4 border-orange-400',
            'refaccion'     => 'border-t-4 border-amber-400',
            'proceso'       => 'border-t-4 border-indigo-400',
            'pruebas'       => 'border-t-4 border-cyan-400',
            'sin_falla'     => 'border-t-4 border-emerald-400',
            'negativo'      => 'border-t-4 border-red-400',
            'entregado'     => 'border-t-4 border-green-400',

            default         => 'border-t-4 border-gray-300',
        };
    }
}
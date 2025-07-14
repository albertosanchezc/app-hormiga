<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    public function run(): void
    {
        Estado::create(['nombre' => 'Abierto - falta diagnóstico']);//1
        Estado::create(['nombre' => 'Diagnosticando']);//2
        Estado::create(['nombre' => 'Entregada']);//3
        Estado::create(['nombre' => 'En Espera']);//4
        Estado::create(['nombre' => 'En Proceso']);//5
        Estado::create(['nombre' => 'Lista para cambio físico']);//6
        Estado::create(['nombre' => 'Lista para entrega']);//7
        Estado::create(['nombre' => 'No localizada']);//8
        Estado::create(['nombre' => 'No Reparable']);//9
        Estado::create(['nombre' => 'Pendiente de diagnóstico']);//10
        Estado::create(['nombre' => 'Por Confirmar']);//11
        Estado::create(['nombre' => 'Refacción recibida']);//12
        Estado::create(['nombre' => 'Reparada, no autorizada aún']);//13
        Estado::create(['nombre' => 'Reparación No autorizada - piezas originales devueltas']);//14
        Estado::create(['nombre' => 'Reparado']);//15
        Estado::create(['nombre' => 'Reparando']);//16
        Estado::create(['nombre' => 'Revisado']);//17
        Estado::create(['nombre' => 'Revisado - en espera de refacción']);//18
        Estado::create(['nombre' => 'Revisando']);//19
        Estado::create(['nombre' => 'Sin Reparar']);//20
        Estado::create(['nombre' => 'Urge cambio físico']);//21
        Estado::create(['nombre' => 'Urge diagnóstico']);//22
        Estado::create(['nombre' => 'Urge revisión']);//23
    }
}

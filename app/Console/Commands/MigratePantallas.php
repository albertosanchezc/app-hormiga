<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Pantalla;
use App\Models\Estado;

class MigratePantallas extends Command
{
    protected $signature = 'migrate:pantallas';

    protected $description = 'Migrar datos de ordenes a pantallas y estados normalizados';

    public function handle()
    {
        $this->info('Desactivando comprobación de claves foráneas...');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->info('Limpiando tablas pantallas y estados...');
        DB::table('pantallas')->truncate();
        DB::table('estados')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->info('Claves foráneas activadas nuevamente.');

        $this->info('Migrando estados...');

        // Extraer y normalizar estados únicos de la tabla antigua
        $estatusUnicos = DB::table('ordenes')
            ->distinct()
            ->pluck('estatus')
            ->map(function ($estatus) {
                return trim(strtoupper(preg_replace('/[^A-Z0-9 ]/', '', (string)$estatus)));
            })
            ->filter()
            ->unique();

        foreach ($estatusUnicos as $estatus) {
            Estado::create(['nombre' => $estatus]);
        }

        // Obtener estados normalizados en memoria para referencia rápida
        $estados = Estado::all()->keyBy(function ($estado) {
            return trim(strtoupper($estado->nombre));
        });

        $this->info('Migrando registros a pantallas...');

        // Traer todos los registros originales
        $registros = DB::table('ordenes')->get();

        foreach ($registros as $orden) {
            $estatusLimpio = trim(strtoupper(preg_replace('/[^A-Z0-9 ]/', '', (string)$orden->estatus)));
            $estado_id = $estados->has($estatusLimpio) ? $estados[$estatusLimpio]->id : null;

            Pantalla::create([
                'id' => $orden->id, // para que coincida con la antigua id
                'orden_servicio' => $orden->orden_servicio,
                'marca' => $orden->marca,
                'pulgadas' => 'No aplica',
                'estado_id' => $estado_id,
                'recibido_con' => $orden->observacion,
                'notas' => $orden->observacion_extra ?? '',
                'detectado' => $orden->diagnostico ?? '',
                'fecha_registro' => $orden->fecha_entrada ? date('Y-m-d', strtotime($orden->fecha_entrada)) : null,
                'fecha_revision' => $orden->fecha_reparacion ? date('Y-m-d', strtotime($orden->fecha_reparacion)) : null,
                'created_at' => $orden->created_at,
                'updated_at' => $orden->updated_at,
                'tecnico' => $orden->tecnico,

            ]);
        }

        $this->info('Migración completa.');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->string('orden_servicio', 10)->nullable();
            $table->string('fecha_entrada', 10)->nullable();
            $table->string('cliente', 99)->nullable();
            $table->string('equipo', 29)->nullable();
            $table->string('marca', 21)->nullable();
            $table->string('modelo', 25)->nullable();
            $table->string('tipo_servicio', 23)->nullable();
            $table->string('observacion', 254)->nullable();
            $table->string('valor_estimado', 255)->nullable();
            $table->string('diagnostico', 248)->nullable();
            $table->string('accion_correctiva', 254)->nullable();
            $table->string('tecnico', 15)->nullable();
            $table->string('fecha_trabajo', 10)->nullable();
            $table->string('fecha_reparacion', 10)->nullable();
            $table->float('costo_reparacion')->nullable();
            $table->string('numero_servicio', 29)->nullable();
            $table->string('comprado_por', 45)->nullable();
            $table->string('fecha_compra', 10)->nullable();
            $table->string('estatus', 40)->nullable();
            $table->string('observacion_extra', 255)->nullable();
            $table->string('numero_orden', 20)->nullable();
            $table->string('entregado', 10)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('domicilio', 100)->nullable();
            $table->string('hora', 8)->nullable();
            $table->string('lugar_compra', 57)->nullable();
            $table->string('costo_adicional', 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes');
    }
};

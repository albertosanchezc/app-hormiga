<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pantallas', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('orden_servicio')->unique()->nullable(); // Puede haber folios nulos
            $table->string('marca')->nullable();
            $table->string('pulgadas')->nullable();
            $table->foreignId('estado_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('recibido_con')->nullable();
            $table->text('notas')->nullable();
            $table->text('detectado')->nullable();
            $table->date('fecha_registro')->nullable();
            $table->date('fecha_revision')->nullable();
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pantallas');
    }
};

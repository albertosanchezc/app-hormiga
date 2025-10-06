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
        Schema::table('ordenes', function (Blueprint $table) {
            $table->dateTime('fecha_trabajo')->nullable()->change();
            $table->dateTime('fecha_reparacion')->nullable()->change();
            $table->dateTime('entregado')->nullable()->change();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ordenes', function (Blueprint $table) {
            $table->string('fecha_trabajo')->nullable()->change();
            $table->string('fecha_reparacion')->nullable()->change();
            $table->string('entregado')->nullable()->change();
        });
    }
};

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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del servicio
            $table->string('categoria'); // Categoría (ej: soporte, desarrollo)
            $table->string('modelo_cobro'); // ej: 'fijo', 'horas'
            $table->decimal('tarifa_base', 12, 2); // Precio (con 2 decimales)
            $table->string('moneda', 3)->default('CLP'); // Moneda
            $table->string('estado')->default('activo'); // Estado: activo, pausado
            $table->text('exclusiones')->nullable(); // Alcance/Exclusiones
            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};

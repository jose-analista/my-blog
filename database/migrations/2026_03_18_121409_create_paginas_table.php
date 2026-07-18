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
        Schema::create('paginas', function (Blueprint $table) {
                $table->id();

        $table->string('nombre'); // Google Maps, Yapo, Instagram, etc
        $table->string('tipo')->nullable(); // marketplace, redes_sociales, directorio

        $table->string('url'); // link base o búsqueda directa

        $table->string('nicho')->nullable(); 
        // ej: restaurantes, ferreterias, colegios

        $table->text('descripcion')->nullable(); 
        // cómo usar esta fuente

        // $table->integer('prioridad')->default(1); 
        // 1 = baja, 5 = alta

        // $table->boolean('activo')->default(true);

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paginas');
    }
};

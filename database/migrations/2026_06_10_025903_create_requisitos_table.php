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
        Schema::create('requisitos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('titulo');
            $table->text('descripcion')->nullable();

            $table->integer('horas_estimadas')->default(0);

            $table->decimal('valor_hora', 12, 2)->default(0);

            $table->decimal('costo_estimado', 12, 2)->default(0);

            $table->enum('prioridad', [
                'Baja',
                'Media',
                'Alta',
            ])->default('Media');

            $table->enum('estado', [
                'Pendiente',
                'En Progreso',
                'Completado',
            ])->default('Pendiente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitos');
    }
};

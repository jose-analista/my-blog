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
        Schema::create('interaccions', function (Blueprint $table) {
            $table->id();
            // OPCIÓN RECOMENDADA: Crea la columna empresa_id y la relación a la vez
            $table->foreignId('empresa_id')
          ->constrained('empresas') // Laravel asume que la tabla es 'empresas'
          ->onDelete('cascade');

            // Para el usuario, lo mismo:
            $table->foreignId('user_id')
          ->constrained('users')
          ->onDelete('cascade');
            $table->enum('tipo', ['llamada', 'correo', 'reunion', 'mensaje']);
            $table->text('notas');
            $table->timestamp('fecha_interaccion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interaccions');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('requisitos', function (Blueprint $table) {

            // Agregar proyecto_id
            $table->foreignId('proyecto_id')
                  ->nullable()
                  ->after('id')
                  ->constrained('proyectos')
                  ->nullOnDelete();

            // Eliminar FK de empresa_id
            $table->dropForeign(['empresa_id']);

            // Eliminar columna empresa_id
            $table->dropColumn('empresa_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requisitos', function (Blueprint $table) {

            $table->foreignId('empresa_id')
                  ->nullable()
                  ->after('id')
                  ->constrained('empresas')
                  ->nullOnDelete();

            $table->dropForeign(['proyecto_id']);
            $table->dropColumn('proyecto_id');
        });
    }
};

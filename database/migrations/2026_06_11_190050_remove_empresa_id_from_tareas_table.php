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
        Schema::table('tareas', function (Blueprint $table) {
                    // Si existe una foreign key, elimínala primero
            $table->dropForeign(['empresa_id']);

            // Luego elimina la columna
            $table->dropColumn('empresa_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tareas', function (Blueprint $table) {
                   $table->foreignId('empresa_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();
        });
    }
};

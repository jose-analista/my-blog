<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('rut')->nullable();
            $table->string('nombre');
            $table->string('a_paterno')->nullable();
            $table->string('a_materno')->nullable();
            $table->string('fono')->nullable();
            $table->string('correo')->nullable();
            $table->string('cargo')->nullable();
            $table->string('red_social')->nullable();
            $table->unsignedBigInteger('empresa_id')->nullable();

            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};

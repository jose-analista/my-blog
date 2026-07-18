<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOportunidadesTable extends Migration
{
    public function up()
    {
        Schema::create('oportunidades', function (Blueprint $table) {
            $table->id();
            
            // Relación con la empresa
            $table->foreignId('empresa_id')
                  ->constrained('empresas')
                  ->onDelete('cascade');

            // Información del negocio
            $table->string('titulo', 200); // Ej: "Desarrollo de API Laravel"
            $table->decimal('valor_estimado', 12, 2)->nullable();
            
            // Estados del Pipeline
            $table->enum('etapa', [
                'prospeccion', 
                'propuesta', 
                'negociacion', 
                'ganada', 
                'perdida'
            ])->default('prospeccion');

            $table->date('fecha_cierre_estimada')->nullable();
            $table->text('descripcion')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('oportunidades');
    }
}
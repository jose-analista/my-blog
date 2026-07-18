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
         Schema::create('servicio_venta', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('servicio_id');

            $table->integer('cantidad')->default(1);

            $table->decimal('precio', 12, 2)->nullable();

            $table->foreign('venta_id')
                ->references('id')
                ->on('ventas')
                ->onDelete('cascade');

            $table->foreign('servicio_id')
                ->references('id')
                ->on('servicios')
                ->onDelete('cascade');

            $table->timestamps();
        });
        
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('paginas', function (Blueprint $table) {
        // Añadimos la columna. Usamos nullable() por si algunas filas no tienen captura todavía
        $table->string('screenshot')->nullable()->after('descripcion');
    });
}

public function down()
{
    Schema::table('paginas', function (Blueprint $table) {
        $table->dropColumn('screenshot');
    });
}
};

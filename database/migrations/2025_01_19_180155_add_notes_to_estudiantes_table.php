<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNotesToEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->float('nota1')->nullable(); // Nota 1
            $table->float('nota2')->nullable(); // Nota 2
            $table->float('nota3')->nullable(); // Nota 3
            $table->float('nota_final')->nullable(); // Columna para la nota final
            $table->enum('estado', ['Aprobado', 'Reprobado'])->nullable(); // Estado aprobado/reprobado
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->dropColumn(['nota1', 'nota2', 'nota3', 'nota_final', 'estado']); // Eliminar los campos
        });
    }
}

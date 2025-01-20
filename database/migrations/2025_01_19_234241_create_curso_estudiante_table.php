<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoEstudianteTable extends Migration
{
    public function up()
    {
        Schema::create('curso_estudiante', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained()->onDelete('cascade'); // Clave foránea a cursos
            $table->foreignId('estudiante_id')->constrained()->onDelete('cascade'); // Clave foránea a estudiantes
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('curso_estudiante');
    }
}

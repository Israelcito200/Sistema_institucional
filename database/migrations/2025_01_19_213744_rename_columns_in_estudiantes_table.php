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
        Schema::table('estudiantes', function (Blueprint $table) {
            // Crear las nuevas columnas
            $table->float('nota1')->nullable()->after('correo');
            $table->float('nota2')->nullable()->after('nota1');
            $table->float('nota3')->nullable()->after('nota2');

            // Eliminar las columnas antiguas
            $table->dropColumn(['parcial1', 'parcial2', 'examen']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            // Restaurar las columnas antiguas
            $table->float('parcial1')->nullable()->after('correo');
            $table->float('parcial2')->nullable()->after('parcial1');
            $table->float('examen')->nullable()->after('parcial2');

            // Eliminar las columnas de notas
            $table->dropColumn(['nota1', 'nota2', 'nota3']);
        });
    }
};

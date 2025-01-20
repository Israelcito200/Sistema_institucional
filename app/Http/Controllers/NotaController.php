<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function update(Request $request, Estudiante $estudiante)
    {
        // Validar las notas
        $request->validate([
            'nota1' => 'required|numeric|min:0|max:10',
            'nota2' => 'required|numeric|min:0|max:10',
            'nota3' => 'required|numeric|min:0|max:10',
            'curso_id' => 'required|exists:cursos,id', // Asegurarse de que curso_id es válido
        ]);

        // Calcular la nota final (promedio de las tres notas)
        $notaFinal = ($request->nota1 + $request->nota2 + $request->nota3) / 3;
        
        // Actualizar la nota final y el estado del estudiante
        $estudiante->nota1 = $request->nota1;
        $estudiante->nota2 = $request->nota2;
        $estudiante->nota3 = $request->nota3;
        $estudiante->nota_final = $notaFinal;

        // Determinar el estado basado en la nota final
        $estado = $notaFinal >= 7 ? 'Aprobado' : 'Reprobado';
        $estudiante->estado = $estado;

        // Guardar los cambios
        $estudiante->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('cursos.show', $request->curso_id)
                         ->with('success', 'Notas actualizadas correctamente');
    }
}


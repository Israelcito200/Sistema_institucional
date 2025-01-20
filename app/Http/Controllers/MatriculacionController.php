<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class MatriculacionController extends Controller
{
    public function edit(Estudiante $estudiante)
    {
        return view('matriculacion.edit', compact('estudiante'));
    }

    public function update(Request $request, Estudiante $estudiante)
    {
       // Validación
    $request->validate([
        'nombre' => 'required|string|max:255',
        'cedula' => 'required|string|max:20|unique:estudiantes,cedula,' . $estudiante->id,
        'correo' => 'required|email|unique:estudiantes,correo,' . $estudiante->id,
        'nota1' => 'required|numeric|min:0|max:10',
        'nota2' => 'required|numeric|min:0|max:10',
        'nota3' => 'required|numeric|min:0|max:10',
    ]);

    // Actualizar la información del estudiante
    $estudiante->nombre = $request->nombre;
    $estudiante->cedula = $request->cedula;
    $estudiante->correo = $request->correo;

    // Actualizar las notas
    $estudiante->nota1 = $request->nota1;
    $estudiante->nota2 = $request->nota2;
    $estudiante->nota3 = $request->nota3;

    // Cálculo de la nota final (promedio ponderado)
    $notaFinal = ($request->nota1 + $request->nota2) * 0.5 + $request->nota3 * 0.5;

    // Actualizar el estado en función de la nota final
    $estudiante->estado = $notaFinal >= 7 ? 'Aprobado' : 'Reprobado';

    // Guardar cambios
    $estudiante->save();

    // Verificar si el curso existe antes de redirigir
    $curso = $estudiante->cursos()->first(); // Obtener el primer curso del estudiante (ajusta si necesario)

    if ($curso) {
        return redirect()->route('cursos.show', ['id' => $curso->id])
                         ->with('success', 'Estudiante actualizado correctamente');
    } else {
        // Si no hay curso, redirigir a alguna página de error o página predeterminada
        return redirect()->route('cursos.index')->with('error', 'Curso no encontrado.');
    }
}
}

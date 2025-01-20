<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Models\Curso;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $estudiantes = Estudiante::with('curso')->get();
    return view('estudiantes.index', compact('estudiantes'));
}

public function create()
{
    $cursos = Curso::all();
    return view('estudiantes.create', compact('cursos'));
}

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'cedula' => 'required|unique:estudiantes',
        'correo' => 'required|unique:estudiantes',
        'curso_id' => 'required|exists:cursos,id',
    ]);

    $estudiante = Estudiante::create($request->all());

    // Asociar el estudiante al curso (puede ser con attach o sync)
    $estudiante->cursos()->attach($request->curso_id);
    return view('estudiantes.matriculado');
}
    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Encuentra al estudiante
    $estudiante = Estudiante::findOrFail($id);

    // Elimina el estudiante (también elimina relaciones si están configuradas con 'cascade')
    $estudiante->delete();

    // Redirige a la página anterior con un mensaje de éxito
    return redirect()->back()->with('success', 'Estudiante eliminado correctamente.');
}


    // Método para actualizar las notas
    public function updateNotas(Request $request, Estudiante $estudiante)
    {
        // Validar las notas
        $validated = $request->validate([
            'parcial1' => 'required|numeric|min:0|max:100',
            'parcial2' => 'required|numeric|min:0|max:100',
            'examen' => 'required|numeric|min:0|max:100',
        ]);

        // Calcular la nota final
        $parcial1 = $request->parcial1;
        $parcial2 = $request->parcial2;
        $examen = $request->examen;

        $notaFinal = ($parcial1 + $parcial2) * 0.5 + $examen * 0.5;

        // Asignar las notas y estado
        $estudiante->parcial1 = $parcial1;
        $estudiante->parcial2 = $parcial2;
        $estudiante->examen = $examen;
        $estudiante->estado = $notaFinal >= 70 ? 'Aprobado' : 'Reprobado';
        $estudiante->save();

        return redirect()->route('cursos.show', $estudiante->curso_id)->with('success', 'Notas actualizadas exitosamente.');
    }
}

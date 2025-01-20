<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $cursos = Curso::all();
    return view('cursos.index', compact('cursos'));
}

public function create()
{
    return view('cursos.create');
}

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'descripcion' => 'nullable',
    ]);

    Curso::create($request->all());
    return redirect()->route('cursos.index')->with('success', 'Curso creado correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    // Obtener el curso con el id correspondiente
    $curso = Curso::findOrFail($id);
    
    // Pasar el curso a la vista
    return view('cursos.show', compact('curso'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
        ]);

        $curso->update($request->all());
        return redirect()->route('cursos.index')->with('success', 'Curso actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso eliminado correctamente.');
    }
}

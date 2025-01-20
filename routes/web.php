<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\MatriculacionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CursoController::class, 'index'])->name('home');

Route::get('/prueba', function () {
    return view('prueba');
});

Route::resource('estudiantes', EstudianteController::class);
Route::resource('cursos', CursoController::class);
Route::get('cursos/{id}', [CursoController::class, 'show'])->name('cursos.show');

Route::put('/notas/{estudiante}', [NotaController::class, 'update'])->name('notas.update');
Route::get('/matriculacion/{estudiante}/edit', [MatriculacionController::class, 'edit'])->name('matriculacion.edit');
Route::put('/matriculacion/{estudiante}', [MatriculacionController::class, 'update'])->name('matriculacion.update');
Route::delete('/estudiantes/{id}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'cedula',
        'correo',
        'nota_final',
        'estado', // Agrega las nuevas columnas
    ];

    // Relación con la tabla 'notas'
    public function notas()
    {
        return $this->hasMany(Nota::class);
    }

    // Relación con el modelo Curso
    public function cursos()
{
    return $this->belongsToMany(Curso::class);
}
}

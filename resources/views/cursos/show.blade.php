<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Curso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .delete-btn {
            padding: 8px 12px;
            background-color: #dc3545;
            color: white;
            border: none;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        /* Formulario de edición de notas */
        .nota-form {
            display: none;
            margin-top: 20px;
        }

        .nota-form input {
            padding: 5px;
            margin-right: 10px;
            border-radius: 5px;
        }

        .nota-form button {
            background-color: #28a745;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .nota-form button:hover {
            background-color: #218838;
        }

        .estado {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $curso->nombre }}</h1>
        <p>{{ $curso->descripcion }}</p>

        <a href="{{ route('cursos.edit', $curso->id) }}" class="btn">Editar Curso</a>

        <!-- Eliminar curso -->
        <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn" onclick="return confirm('¿Estás seguro de eliminar este curso?')">Eliminar Curso</button>
        </form>

        <h2>Estudiantes en este curso</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                    <th>Notas</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($curso->estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->nombre }}</td>
                        <td>{{ $estudiante->cedula }}</td>
                        <td>{{ $estudiante->correo }}</td>

                        <!-- Botones para editar estudiante y eliminar estudiante -->
                        <td>
                        <a href="{{ route('matriculacion.edit', $estudiante->id) }}" class="btn">Editar Estudiante</a>

                        <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete-btn" onclick="return confirm('¿Estás seguro de eliminar este estudiante?')">Eliminar</button>
</form>

                        </td>

                        <!-- Botón para editar notas -->
                        <td>
                        @php
                    
        // Usar las notas correctas
        $nota1 = $estudiante->nota1 ?? 0;
        $nota2 = $estudiante->nota2 ?? 0;
        $nota3 = $estudiante->nota3 ?? 0;
        $notaFinal = ($nota1 + $nota2 + $nota3) / 3; // Promedio de las tres notas
    @endphp

    <strong>{{ number_format($notaFinal, 2) }}</strong>
                        </td>

                        <!-- Mostrar el estado basado en las notas -->
                        <td>
                        @if ($estudiante->nota1 && $estudiante->nota2 && $estudiante->nota3)
        @php
            // Calcular estado basado en la nota final
            $notaFinal = ($estudiante->nota1 + $estudiante->nota2 + $estudiante->nota3) / 3;
            $estado = $notaFinal >= 7 ? 'Aprobado' : 'Reprobado';
        @endphp
        <span class="estado">{{ $estado }}</span>
    @else
        <span class="estado">Pendiente</span>
    @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 20px;">
            <a href="{{ route('cursos.index') }}" class="btn">Regresar a la lista de cursos</a>
        </div>

    </div>

   
    <script>
        function toggleNotasForm(estudianteId) {
            var form = document.getElementById('nota-form-' + estudianteId);
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes</title>
</head>
<body>
    <h1>Lista de Estudiantes</h1>
    <a href="{{ route('estudiantes.create') }}">Crear Estudiante</a>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Correo</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->cedula }}</td>
                    <td>{{ $estudiante->correo }}</td>
                    <td>{{ $estudiante->curso->nombre ?? 'No asignado' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

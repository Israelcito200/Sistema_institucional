<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante - Matrícula</title>
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Resaltar botones */
        button:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Matrícula del Estudiante</h1>

        <form action="{{ route('matriculacion.update', $estudiante->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="{{ $estudiante->nombre }}" required>

            <label for="cedula">Cédula:</label>
            <input type="text" name="cedula" value="{{ $estudiante->cedula }}" required>

            <label for="correo">Correo:</label>
            <input type="email" name="correo" value="{{ $estudiante->correo }}" required>

            <!-- Notas -->
            <label for="nota1">Nota 1:</label>
            <input type="number" name="nota1" value="{{ $estudiante->nota1 }}" required>

            <label for="nota2">Nota 2:</label>
            <input type="number" name="nota2" value="{{ $estudiante->nota2 }}" required>

            <label for="nota3">Nota 3:</label>
            <input type="number" name="nota3" value="{{ $estudiante->nota3 }}" required>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>


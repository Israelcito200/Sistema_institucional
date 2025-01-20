<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Curso</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 1.1em;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input:focus, select:focus {
            outline-color: #007bff;
        }

        button {
            background-color: #28a745;
            color: white;
            font-size: 1.1em;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            padding: 12px;
        }

        button:hover {
            background-color: #218838;
        }

        .form-actions {
            text-align: center;
        }
        
        .back-btn {
            text-decoration: none;
            color: #007bff;
            font-size: 1em;
        }

        .back-btn:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Crear Nuevo Curso</h1>
        <form action="{{ route('cursos.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre del Curso:</label>
                <input type="text" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción del Curso:</label>
                <input type="text" name="descripcion" required>
            </div>

            <div class="form-actions">
                <button type="submit">Crear Curso</button>
            </div>
        </form>

        <div class="form-actions">
            <a href="{{ route('cursos.index') }}" class="back-btn">Volver a la lista de cursos</a>
        </div>
    </div>

</body>
</html>


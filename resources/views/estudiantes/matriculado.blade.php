<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiante Matriculado</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .message-container {
            text-align: center;
            background-color: #28a745;
            color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .message-container h1 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .message-container .icon {
            font-size: 5rem;
            margin-bottom: 20px;
        }

        /* Temporizador de redirección */
        .redirect-message {
            font-size: 1.2rem;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="message-container">
        <div class="icon">✔️</div> <!-- Icono de visto -->
        <h1>Estudiante Matriculado Exitosamente</h1>
        <p class="redirect-message">Serás redirigido a la página de cursos en 3 segundos...</p>
    </div>

    <script>
        // Redirigir después de 3 segundos
        setTimeout(function() {
            window.location.href = "{{ route('cursos.index') }}";
        }, 3000); // 3000ms = 3 segundos
    </script>

</body>
</html>

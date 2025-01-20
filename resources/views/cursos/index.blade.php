<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/d11.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>CUERPO DE AGENTES DE CONTROL</title>
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Fondo gris claro */;
            display: flex;
            min-height: 100vh;
            flex-direction: row;
        }

        /* Sidebar */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            left: -250px;
            top: 0;
            background-color: #112a4a;
            color: #fff;
            transition: 0.3s;
            padding-top: 30px;
            z-index: 1000;
            overflow: auto;
        }

        .sidebar a {
            color: #fff;
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar .logo img {
            width: 60%;
            margin-bottom: 15px;
        }

        /* Button to open the sidebar */
        .open-btn {
            position: absolute;
            top: 15px;
            left: 20px;
            font-size: 30px;
            cursor: pointer;
            color: #333;
            background-color: transparent;
            border: none;
            padding: 10px 15px;
            z-index: 1001;
        }

        .open-btn.open {
            color: white; /* Cambia el color del icono a blanco */
        }

        .sidebar.open {
            left: 0 !important;
        }

        /* Main Content Styles */
        .main-content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 0;
            transition: margin-left 0.3s ease;
            background-color: #f4f4f9;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .card h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #333;
        }

        .card p {
            color: #666;
            margin-bottom: 15px;
        }

        .card .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .card .btn:hover {
            background-color: #0056b3;
        }

        .create-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .create-btn:hover {
            background: #218838;
        }

        /* Media Query for smaller screens */
        @media (max-width: 768px) {
            .sidebar {
                left: -250px;
            }
            .sidebar.open {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .open-btn {
                display: block;
                position: fixed;
                top: 20px;
                left: 20px;
                z-index: 2000;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="logo">
        <img src="{{ asset('img/d11.png') }}" alt="Logo Institución">
    </div>
    <a href="{{ route('cursos.create') }}">Crear Curso</a>
    <a href="{{ route('estudiantes.create') }}">Matricular Estudiante</a>
</div>

<!-- Botón para abrir/cerrar el Sidebar -->
<button class="open-btn" id="open-btn">&#9776;</button>

<!-- Main Content -->
<div class="main-content" id="main-content">
    <br>
    <center>
    <h1 style="font-family: Roboto, sans-serif;">      CURSOS - CUERPO DE AGENTES DE CONTROL</h1>
   
    <a href="{{ route('cursos.create') }}" class="create-btn">Crear Curso</a>
    </center>
    <div class="grid">
        @foreach ($cursos as $curso)
            <div class="card">
                <h2>{{ $curso->nombre }}</h2>
                <p>{{ $curso->descripcion }}</p>
                <a href="{{ route('cursos.show', $curso->id) }}" class="btn">Ver Curso</a>
            </div>
        @endforeach
    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const openBtn = document.getElementById('open-btn');
    const mainContent = document.getElementById('main-content');

    openBtn.addEventListener('click', function() {
        if (sidebar.classList.contains('open')) {
            sidebar.classList.remove('open');
            mainContent.style.marginLeft = '0';
        } else {
            sidebar.classList.add('open');
            mainContent.style.marginLeft = '250px';
        }
    });
</script>

</body>
</html>


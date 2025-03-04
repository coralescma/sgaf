<!DOCTYPE html>
<! -- views/menu.php -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        nav {
            background-color: #333;
            color: white;
            padding: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }
        nav a:hover {
            background-color: #575757;
        }
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="dashboard.php">Inicio</a>
        <a href="profile.php">Perfil</a>
        <a href="settings.php">Configuración</a>
        <a href="formulario_profesor.php">Profesor</a>
        <a href="formulario_alumno.php">Alumno</a>
        <a href="formulario_ciclo.php">Ciclo Escolar</a> <!-- Nueva sección para el ciclo escolar -->
        <a href="listar_planificaciones.php">planificación</a>
        <a href="logout.php">Cerrar Sesión</a>
    </nav>


</body>
</html>

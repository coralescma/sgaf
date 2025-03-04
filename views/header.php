

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= APP_NAME; ?></title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #007bff;
            color: white;
            padding: 10px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }
        .sidebar {
            width: 200px;
            background-color: #343a40;
            color: white;
            position: fixed;
            height: 100%;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content-wrapper {
            margin-left: 220px;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="<?= APP_URL; ?>/admin"><?= APP_NAME; ?></a>
    <a href="<?= APP_URL; ?>/login/logout.php" style="float: right;">Cerrar sesión</a>
</div>

<div class="sidebar">
    <a href="<?= APP_URL; ?>/admin/alumnos">Alumnos</a>
    <a href="<?= APP_URL; ?>/admin/profesores">Profesores</a>
    <a href="<?= APP_URL; ?>/admin/roles">Roles</a>
    <a href="<?= APP_URL; ?>/admin/materias">Materias</a>
</div>

<!-- Contenido de la página -->
<div class="content-wrapper">
    <h1>Bienvenido, <?= htmlspecialchars($nombre_sesion_usuario); ?></h1>
    <section class="content">
        <div class="container-fluid">
            <!-- Aquí va el contenido específico de cada página -->
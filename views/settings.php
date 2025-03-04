<?php
// views/settings.php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuración</title>
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

<?php include('menu.php'); ?> <!-- Incluir el menú aquí -->

    <div class="container">
        <h2>Configuración</h2>
        <p>Aquí puedes ajustar la configuración de tu cuenta.</p>
    </div>
</body>
</html>
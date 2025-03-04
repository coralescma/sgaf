<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

// Inicializar mensaje
$message = "";

// Verificar si hay un mensaje en la URL
if (isset($_GET['message'])) {
    $message = $_GET['message'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Objetivo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex; /* Usar flexbox para el diseño */
            flex-direction: column; /* Colocar los elementos en columna */
        }
        .menu-container {
            width: 100%; /* Ancho completo para el menú principal */
            background-color: #f4f4f4;
            padding: 10px;
            border-bottom: 1px solid #ccc; /* Línea de separación */
        }
        .sub-menu-container {
            display: flex; /* Usar flexbox para el menú de planificación y el formulario */
        }
        .left-menu {
            width: 200px; /* Ancho del menú de planificación anual */
            background-color: #f4f4f4;
            padding: 10px;
            border-right: 1px solid #ccc; /* Línea de separación */
        }
        .form-container {
            flex: 1; /* Ocupa el espacio restante */
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="menu-container">
        <?php include('menu.php'); ?> <!-- Incluir el menú principal aquí -->
    </div>

    <div class="sub-menu-container">
        <div class="left-menu">
            <?php include('menu_planificacion_anual.php'); ?> <!-- Incluir el menú de planificación anual aquí -->
        </div>

        <div class="form-container">
            <h1>Agregar Nuevo Objetivo</h1>
            <?php if ($message): ?>
                <p class="message"><?= htmlspecialchars($message); ?></p>
            <?php endif; ?>
            <form action="insertar_objetivo.php" method="POST">
                <label for="descripcion">Descripción del Objetivo:</label>
                <input type="text" id="descripcion" name="descripcion" required>

                <input type="submit" value="Registrar Objetivo">
            </form>
        </div>
    </div>

</body>
</html>
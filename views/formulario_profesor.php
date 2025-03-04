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

// Conectar a la base de datos
require '../src/Database.php'; // Asegúrate de que la ruta sea correcta
$db = new Database();
$conn = $db->getConnection();

// Consulta para obtener las especialidades
$query = $conn->prepare("SELECT id_especialidad, nombre_especialidad FROM especialidad");
$query->execute();
$especialidades = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Profesor</title>
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
            display: flex; /* Usar flexbox para el menú de gestión de profesores y el formulario */
            flex: 1; /* Ocupa el espacio restante */
        }
        .left-menu {
            width: 200px; /* Ancho del menú de gestión de profesores */
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
        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        select {
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
    </style>
</head>
<body>

    <div class="menu-container">
        <?php include('menu.php'); ?> <!-- Incluir el menú principal aquí -->
    </div>

    <div class="sub-menu-container">
        <div class="left-menu">
            <?php include('menu_profesores.php'); ?> <!-- Incluir el menú de gestión de profesores aquí -->
        </div>

        <div class="form-container">
            <h1>Agregar Nuevo Profesor</h1>
            <?php if ($message): ?>
                <p><?= htmlspecialchars($message); ?></p>
            <?php endif; ?>
            <form action="insertar_profesor.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" required>

                <label for="email">Correo:</label>
                <input type="email" id="email" name="email" required>

                <label for="asignaturas">Asignaturas:</label>
                <input type="text" id="asignaturas" name="asignaturas" required>

                <label for="telefono">Teléfono:</label>
                <input type="number" id="telefono" name="telefono" required>

                <label for="celular">Celular:</label>
                <input type="number" id="celular" name="celular" required>

                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo" required>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>

                <input type="submit" value="Agregar Profesor">
            </form>
        </div>
    </div>

</body>
</html>

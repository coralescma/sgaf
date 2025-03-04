<?php
session_start();
require '../src/Database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

$db = new Database();
$conn = $db->getConnection();

// Consulta para obtener todos los contenidos
$query = $conn->prepare("SELECT * FROM contenidos");
$query->execute();
$contenidos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contenidos</title>
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
            display: flex; /* Usar flexbox para el menú de planificación y la lista */
        }
        .left-menu {
            width: 200px; /* Ancho del menú de gestión de alumnos */
            background-color: #f4f4f4;
            padding: 10px;
            border-right: 1px solid #ccc; /* Línea de separación */
        }
        .list-container {
            flex: 1; /* Ocupa el espacio restante */
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
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

        <div class="list-container">
            <h1>Lista de Contenidos</h1>
            <p>
                <a href="formulario_objetivo.php">Agregar Objetivo</a> <!-- Hipervínculo para agregar objetivo -->
                <a href="formulario_contenido.php">Agregar contenido</a>
            </p>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Descripción del Contenido</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($contenidos as $contenido): ?>
                <tr>
                    <td><?= $contenido['id_contenido']; ?></td>
                    <td><?= htmlspecialchars($contenido['descripcion_contenido']); ?></td>
                    <td>
                        <a href="editar_contenido.php?id=<?= $contenido['id_contenido']; ?>">Editar</a>
                        <a href="eliminar_contenido.php?id=<?= $contenido['id_contenido']; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

</body>
</html>
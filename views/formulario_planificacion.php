<?php
session_start();
require '../src/Database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

$db = new Database();
$conn = $db->getConnection();

// Consulta para obtener todas las planificaciones
$query = $conn->prepare("SELECT * FROM planificacion_anual");
$query->execute();
$planificaciones = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Planificaciones Anuales</title>
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
            <h1>Lista de Planificaciones Anuales</h1>
            <p><a href="formulario_planificacion.php">Agregar Planificación Anual</a></p> <!-- Hipervínculo para agregar planificación -->

            <table>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Objetivo</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($planificaciones as $planificacion): ?>
                <tr>
                    <td><?= $planificacion['id_planificacion']; ?></td>
                    <td><?= htmlspecialchars($planificacion['descripcion']); ?></td>
                    <td><?= htmlspecialchars($planificacion['id_objetivo']); ?></td> <!-- Suponiendo que id_objetivo es un ID, puedes hacer una consulta para obtener el nombre del objetivo -->
                    <td><?= htmlspecialchars($planificacion['id_contenido']); ?></td> <!-- Suponiendo que id_contenido es un ID, puedes hacer una consulta para obtener el nombre del contenido -->
                    <td>
                        <a href="editar_planificacion.php?id=<?= $planificacion['id_planificacion']; ?>">Editar</a>
                        <a href="eliminar_planificacion.php?id=<?= $planificacion['id_planificacion']; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

</body>
</html>
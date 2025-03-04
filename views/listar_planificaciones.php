<?php
session_start();
require '../src/Database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

$db = new Database();
$conn = $db->getConnection();

// Consulta para obtener todas las planificaciones junto con sus detalles
$query = $conn->prepare("
    SELECT pa.id_planificacion_anual, c.nombre_ciclo AS descripcion_ciclo, m.nombre_materia AS descripcion_materia, p.nombre AS nombre_profesor, o.descripcion_objetivo, co.descripcion_contenido FROM planificacion_anual pa JOIN ciclo_escolar c ON pa.id_ciclo = c.id_ciclo JOIN materia m ON pa.id_materia = m.id_materia JOIN profesores p ON pa.id_profesor = p.id JOIN objetivos o ON pa.id_objetivo = o.id_objetivo JOIN contenidos co ON pa.id_contenido = co.id_contenido;
");
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
            display: flex;
            flex-direction: column;
        }
        .menu-container {
            width: 100%;
            background-color: #f4f4f4;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .sub-menu-container {
            display: flex;
        }
        .left-menu {
            width: 200px;
            background-color: #f4f4f4;
            padding: 10px;
            border-right: 1px solid #ccc;
        }
        .list-container {
            flex: 1;
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
                    <th>Ciclo</th>
                    <th>Materia</th>
                    <th>Profesor</th>
                    <th>Objetivo</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($planificaciones as $planificacion): ?>
                <tr>
                    <td><?= $planificacion['id_planificacion_anual']; ?></td>
                    <td><?= htmlspecialchars($planificacion['descripcion_ciclo']); ?></td>
                    <td><?= htmlspecialchars($planificacion['descripcion_materia']); ?></td>
                    <td><?= htmlspecialchars($planificacion['nombre_profesor']); ?></td>
                    <td><?= htmlspecialchars($planificacion['descripcion_objetivo']); ?></td>
                    <td><?= htmlspecialchars($planificacion['descripcion_contenido']); ?></td>
                    <td>
                        <a href="editar_planificacion.php?id=<?= $planificacion['id_planificacion_anual']; ?>">Editar</a>
                        <a href="eliminar_planificacion.php?id=<?= $planificacion['id_planificacion_anual']; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

</body>
</html>
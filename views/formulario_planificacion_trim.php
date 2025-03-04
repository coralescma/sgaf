<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

require '../src/Database.php'; // Asegúrate de que la ruta sea correcta

// Conectar a la base de datos
$db = new Database();
$conn = $db->getConnection();

// Consultar los ciclos escolares
$queryCiclo = $conn->prepare("SELECT * FROM ciclo_escolar");
$queryCiclo->execute();
$ciclos = $queryCiclo->fetchAll(PDO::FETCH_ASSOC);

// Consultar las materias
$queryMateria = $conn->prepare("SELECT * FROM materia");
$queryMateria->execute();
$materias = $queryMateria->fetchAll(PDO::FETCH_ASSOC);

// Consultar los profesores
$queryProfesor = $conn->prepare("SELECT * FROM profesores");
$queryProfesor->execute();
$profesores = $queryProfesor->fetchAll(PDO::FETCH_ASSOC);

// Consultar los objetivos generales
$queryObjetivo = $conn->prepare("SELECT * FROM objetivos");
$queryObjetivo->execute();
$objetivos = $queryObjetivo->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Planificación Trimestral</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

    <h1>Consulta de Planificación Trimestral</h1>

    <h2>Ciclos Escolares</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Ciclo Escolar</th>
        </tr>
        <?php foreach ($ciclos as $ciclo): ?>
        <tr>
            <td><?= htmlspecialchars($ciclo['id_ciclo']); ?></td>
            <td><?= htmlspecialchars($ciclo['nombre_ciclo']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Materias</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Materia</th>
        </tr>
        <?php foreach ($materias as $materia): ?>
        <tr>
            <td><?= htmlspecialchars($materia['id_materia']); ?></td>
            <td><?= htmlspecialchars($materia['nombre_materia']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Profesores</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
        </tr>
        <?php foreach ($profesores as $profesor): ?>
        <tr>
            <td><?= htmlspecialchars($profesor['id']); ?></td>
            <td><?= htmlspecialchars($profesor['nombre']); ?></td>
            <td><?= htmlspecialchars($profesor['apellidos']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Objetivos Generales</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Objetivo General</th>
        </tr>
        <?php foreach ($objetivos as $objetivo): ?>
        <tr>
            <td><?= htmlspecialchars($objetivo['id_objetivo']); ?></td>
            <td><?= htmlspecialchars($objetivo['descripcion_objetivo']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
<?php
// views/listar_profesores.php

session_start();
require '../src/Database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

$db = new Database();
$conn = $db->getConnection();

$query = $conn->prepare("SELECT * FROM profesores");
$query->execute();
$profesores = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Profesores</title>
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
            display: flex; /* Usar flexbox para el menú de gestión de profesores y la lista */
            flex: 1; /* Ocupa el espacio restante */
        }
        .left-menu {
            width: 200px; /* Ancho del menú de gestión de profesores */
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
            <?php include('menu_profesores.php'); ?> <!-- Incluir el menú de gestión de profesores aquí -->
        </div>

        <div class="list-container">
            <h1>Lista de Profesores</h1>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Asignaturas</th>
                    <th>Especialidad</th>
                    <th>Fecha Nac.</th> <!-- Nuevo campo -->
                    <th>Teléfono</th> <!-- Nuevo campo -->
                    <th>Celular</th> <!-- Nuevo campo -->
                    <th>Sexo</th> <!-- Nuevo campo -->
                    <th>Acciones</th>
                </tr>
                <?php foreach ($profesores as $profesor): ?>
                <tr>
                    <td><?= htmlspecialchars($profesor['id']); ?></td>
                    <td><?= htmlspecialchars($profesor['nombre']); ?></td>
                    <td><?= htmlspecialchars($profesor['apellidos']); ?></td>
                    <td><?= htmlspecialchars($profesor['email']); ?></td>
                    <td><?= htmlspecialchars($profesor['asignaturas']); ?></td>
                    <td><?= htmlspecialchars($profesor['id_especialidad']); ?></td>
                    <td><?= htmlspecialchars($profesor['fecha_nacimiento']); ?></td> <!-- Mostrar nuevo campo -->
                    <td><?= htmlspecialchars($profesor['telefono']); ?></td> <!-- Mostrar nuevo campo -->
                    <td><?= htmlspecialchars($profesor['celular']); ?></td> <!-- Mostrar nuevo campo -->
                    <td><?= htmlspecialchars($profesor['sexo']); ?></td> <!-- Mostrar nuevo campo -->
                    <td>
                        <a href="editar_profesor.php?id=<?= $profesor['id']; ?>">Editar</a>
                        <a href="eliminar_profesor.php?id=<?= $profesor['id']; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

</body>
</html>
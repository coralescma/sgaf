<?php
session_start();
require '../src/Database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

$db = new Database();
$conn = $db->getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $conn->prepare("SELECT * FROM alumnos WHERE id = :id");
    $query->bindParam(':id', $id);
    $query->execute();
    $alumno = $query->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location: listar_alumnos.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
</head>
<body>
    <h1>Editar Alumno</h1>
    <form action="actualizar_alumno.php" method="POST">
        <input type="hidden" name="id" value="<?= $alumno['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= $alumno['nombre']; ?>" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?= $alumno['apellido']; ?>" required><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="<?= $alumno['edad']; ?>" required><br>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?= $alumno['correo']; ?>" required><br>

        <input type="submit" value="Actualizar Alumno">
    </form>
</body>
</html>
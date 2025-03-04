<?php
// Incluir el archivo de conexión a la base de datos
include '../src/Database.php';

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $sexo = $_POST['sexo'];

    // Consulta para insertar un nuevo alumno
    $query = "INSERT INTO alumnos (nombre, apellido, edad, correo, fecha_nacimiento, sexo) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$nombre, $apellido, $edad, $correo, $fecha_nacimiento, $sexo]);

    echo "Alumno agregado exitosamente.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alumno</title>
</head>
<body>
    <header>
        <h1>Agregar Alumno</h1>
    </header>
    <main>
        <form method="POST" action="">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            <br>
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" required>
            <br>
            <label for="edad">Edad:</label>
            <input type="number" name="edad" required>
            <br>
            <label for="correo">Correo:</label>
            <input type="email" name="correo" required>
            <br>
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required>
            <br>
            <label for="sexo">Sexo:</label>
            <select name="sexo" required>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
            <br>
            <input type="submit" value="Agregar Alumno">
        </form>
    </main>
</body>
</html>
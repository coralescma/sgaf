<?php
// views/insertar_alumno.php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

require '../src/Database.php';

$db = new Database();
$conn = $db->getConnection();

// Inicializar mensaje
$message = "";

// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];

    // Consulta SQL para insertar datos
    $sql = "INSERT INTO alumnos (nombre, apellido, edad, correo) VALUES (:nombre, :apellido, :edad, :correo)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':correo', $correo);

    if ($stmt->execute()) {
        // Mensaje de éxito
        $message = "Nuevo alumno registrado exitosamente.";
    } else {
        // Mensaje de error
        $message = "Error: " . $stmt->errorInfo()[2];
    }

    // Cerrar conexión
    $conn = null;

    // Redirigir de nuevo al formulario con el mensaje
    header("Location: formulario_alumno.php?message=" . urlencode($message));
    exit();
}
?>
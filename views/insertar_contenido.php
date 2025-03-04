<?php
session_start();
require '../src/Database.php'; // Asegúrate de que la ruta sea correcta

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener la descripción del contenido del formulario
    $descripcion = $_POST['descripcion'];

    // Conectar a la base de datos
    $db = new Database();
    $conn = $db->getConnection();

    // Preparar la consulta para insertar el nuevo contenido
    $query = $conn->prepare("INSERT INTO contenidos (descripcion_contenido) VALUES (:descripcion)");
    $query->bindParam(':descripcion', $descripcion);

    // Ejecutar la consulta
    if ($query->execute()) {
        // Redirigir con un mensaje de éxito
        header("Location: formulario_contenido.php?message=Contenido agregado exitosamente.");
    } else {
        // Redirigir con un mensaje de error
        header("Location: formulario_contenido.php?message=Error al agregar contenido.");
    }
    exit();
}
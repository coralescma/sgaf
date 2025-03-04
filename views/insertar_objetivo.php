<?php
session_start();
require '../src/Database.php'; // Asegúrate de que la ruta sea correcta

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener la descripción del objetivo del formulario
    $descripcion = $_POST['descripcion'];

    // Conectar a la base de datos
    $db = new Database();
    $conn = $db->getConnection();

    // Preparar la consulta para insertar el nuevo objetivo
    $query = $conn->prepare("INSERT INTO objetivos (descripcion_objetivo) VALUES (:descripcion)");
    $query->bindParam(':descripcion', $descripcion);

    // Ejecutar la consulta
    if ($query->execute()) {
        // Redirigir con un mensaje de éxito
        header("Location: formulario_objetivo.php?message=Objetivo agregado exitosamente.");
    } else {
        // Redirigir con un mensaje de error
        header("Location: formulario_objetivo.php?message=Error al agregar objetivo.");
    }
    exit();
}
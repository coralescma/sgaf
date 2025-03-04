<?php
session_start();
require '../src/Database.php'; // Asegúrate de que la ruta sea correcta

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el ID y la descripción del objetivo del formulario
    $id_objetivo = $_POST['id_objetivo'];
    $descripcion = $_POST['descripcion'];

    // Conectar a la base de datos
    $db = new Database();
    $conn = $db->getConnection();

    // Preparar la consulta para actualizar el objetivo
    $query = $conn->prepare("UPDATE objetivos SET descripcion_objetivo = :descripcion WHERE id_objetivo = :id_objetivo");
    $query->bindParam(':descripcion', $descripcion);
    $query->bindParam(':id_objetivo', $id_objetivo);

    // Ejecutar la consulta
    if ($query->execute()) {
        // Redirigir con un mensaje de éxito
        header("Location: listar_objetivos.php?message=Objetivo actualizado exitosamente.");
    } else {
        // Redirigir con un mensaje de error
        header("Location: listar_objetivos.php?message=Error al actualizar objetivo.");
    }
    exit();
} else {
    // Redirigir si no se proporciona un ID
    header("Location: listar_objetivos.php?message=ID de objetivo no proporcionado.");
    exit();
}
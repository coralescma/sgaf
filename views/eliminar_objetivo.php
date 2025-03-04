<?php
session_start();
require '../src/Database.php'; // Asegúrate de que la ruta sea correcta

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id_objetivo = $_GET['id'];

    // Conectar a la base de datos
    $db = new Database();
    $conn = $db->getConnection();

    // Preparar la consulta para eliminar el objetivo
    $query = $conn->prepare("DELETE FROM objetivos WHERE id_objetivo = :id_objetivo");
    $query->bindParam(':id_objetivo', $id_objetivo);

    // Ejecutar la consulta
    if ($query->execute()) {
        // Redirigir con un mensaje de éxito
        header("Location: listar_objetivos.php?message=Objetivo eliminado exitosamente.");
    } else {
        // Redirigir con un mensaje de error
        header("Location: listar_objetivos.php?message=Error al eliminar objetivo.");
    }
    exit();
} else {
    // Redirigir si no se proporciona un ID
    header("Location: listar_objetivos.php?message=ID de objetivo no proporcionado.");
    exit();
}
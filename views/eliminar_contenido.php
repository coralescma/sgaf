<?php
session_start();
require '../src/Database.php'; // Asegúrate de que la ruta sea correcta

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id_contenido = $_GET['id'];

    // Conectar a la base de datos
    $db = new Database();
    $conn = $db->getConnection();

    // Preparar la consulta para eliminar el contenido
    $query = $conn->prepare("DELETE FROM contenidos WHERE id_contenido = :id_contenido");
    $query->bindParam(':id_contenido', $id_contenido);

    // Ejecutar la consulta
    if ($query->execute()) {
        // Redirigir con un mensaje de éxito
        header("Location: listar_contenidos.php?message=Contenido eliminado exitosamente.");
    } else {
        // Redirigir con un mensaje de error
        header("Location: listar_contenidos.php?message=Error al eliminar contenido.");
    }
    exit();
} else {
    // Redirigir si no se proporciona un ID
    header("Location: listar_contenidos.php?message=ID de contenido no proporcionado.");
    exit();
}
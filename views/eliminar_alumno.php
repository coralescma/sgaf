<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

require '../src/Database.php';

$db = new Database();
$conn = $db->getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM alumnos WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: listar_alumnos.php?message=" . urlencode("Alumno eliminado exitosamente."));
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }

    $conn = null;
} else {
    header("Location: listar_alumnos.php");
    exit();
}
?>
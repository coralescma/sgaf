<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

require '../src/Database.php';

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];

    $sql = "UPDATE alumnos SET nombre = :nombre, apellido = :apellido, edad = :edad, correo = :correo WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: listar_alumnos.php?message=" . urlencode("Alumno actualizado exitosamente."));
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }

    $conn = null;
}
?>
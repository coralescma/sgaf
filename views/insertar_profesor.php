<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

require '../src/Database.php'; // Asegúrate de que la ruta sea correcta

// Inicializar mensaje
$message = "";

// Verificar si se han enviado datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $email = trim($_POST['email']);
    $asignaturas = trim($_POST['asignaturas']);

    // Validar los datos (puedes agregar más validaciones según sea necesario)
    if (empty($nombre) || empty($apellidos) || empty($email) || empty($asignaturas)) {
        $message = "Todos los campos son obligatorios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "El correo electrónico no es válido.";
    } else {
        // Conectar a la base de datos
        $db = new Database();
        $conn = $db->getConnection();

        // Preparar la consulta para insertar el profesor
        $query = $conn->prepare("INSERT INTO profesores (nombre, apellidos, email, asignaturas) VALUES (:nombre, :apellidos, :email, :asignaturas)");

        // Vincular los parámetros
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':apellidos', $apellidos);
        $query->bindParam(':email', $email);
        $query->bindParam(':asignaturas', $asignaturas);

        // Ejecutar la consulta
        if ($query->execute()) {
            $message = "Profesor agregado exitosamente.";
        } else {
            $message = "Error al agregar el profesor. Intente nuevamente.";
        }
    }
}

// Redirigir de vuelta al formulario con el mensaje
header("Location: formulario_profesor.php?message=" . urlencode($message));
exit();
?>
<?php
// public/index.php

require '../src/Database.php';
require '../src/User.php';

session_start();

// Crear una nueva instancia de la clase Database
$db = new Database();
$conn = $db->getConnection(); // Obtener la conexión

// Verificar si la conexión fue exitosa
if (!$conn) {
    die("Error de conexión a la base de datos.");
}

// Manejo del inicio de sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; // Sin hashing

    $user = new User($conn);
    $loggedInUser   = $user->login($username, $password);

    if ($loggedInUser ) {
        $_SESSION['user_id'] = $loggedInUser ['id'];
        header("Location: /sgaf/views/dashboard.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
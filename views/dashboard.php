<?php
// views/dashboard.php


session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<body>
    
<?php include('menu.php'); ?> <!-- Incluir el menú aquí -->

    <div class="container">
        <h2>Bienvenido al Dashboard</h2>
        <p>Esta es la página principal después de iniciar sesión.</p>
        <p><a href="formulario_alumno.php">Agregar un nuevo alumno</a></p>
    </div>
</body>
</html>

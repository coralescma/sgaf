<?php
session_start();
require '../src/Database.php'; // Asegúrate de que la ruta sea correcta

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

// Verificar si se ha proporcionado un ID
if (isset($_GET['id'])) {
    $id_objetivo = $_GET['id'];

    // Conectar a la base de datos
    $db = new Database();
    $conn = $db->getConnection();

    // Preparar la consulta para obtener el objetivo
    $query = $conn->prepare("SELECT * FROM objetivos WHERE id_objetivo = :id_objetivo");
    $query->bindParam(':id_objetivo', $id_objetivo);
    $query->execute();
    $objetivo = $query->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró el objetivo
    if (!$objetivo) {
        header("Location: listar_objetivos.php?message=Objetivo no encontrado.");
        exit();
    }
} else {
    header("Location: listar_objetivos.php?message=ID de objetivo no proporcionado.");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Objetivo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .menu-container {
            width: 100%;
            background-color: #f4f4f4;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .form-container {
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="menu-container">
        <?php include('menu.php'); ?> <!-- Incluir el menú principal aquí -->
    </div>

    <div class="form-container">
        <h1>Editar Objetivo</h1>
        <form action="actualizar_objetivo.php" method="POST">
            <input type="hidden" name="id_objetivo" value="<?= $objetivo['id_objetivo']; ?>">
            <label for="descripcion">Descripción del Objetivo:</label>
            <input type="text" id="descripcion" name="descripcion" value="<?= htmlspecialchars($objetivo['descripcion_objetivo']); ?>" required>

            <input type="submit" value="Actualizar Objetivo">
        </form>
    </div>

</body>
</html>
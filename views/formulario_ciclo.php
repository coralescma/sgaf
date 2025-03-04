<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

// Inicializar mensaje
$message = "";

// Verificar si hay un mensaje en la URL
if (isset($_GET['message'])) {
    $message = $_GET['message'];
}

// Conectar a la base de datos
require '../src/Database.php'; // Asegúrate de que la ruta sea correcta
$db = new Database();
$conn = $db->getConnection();

// Consulta para obtener los ciclos escolares
$query = $conn->prepare("SELECT id_ciclo, nombre_ciclo FROM ciclo_escolar;");
$query->execute();
$ciclos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Ciclo Escolar</title>
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
        select {
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
        <h1>Formulario de Ciclo Escolar</h1>
        <?php if ($message): ?>
            <p><?= htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form action="insertar_ciclo.php" method="POST">
            <label for="ciclo_escolar">Ciclo Escolar:</label>
            <select name="ciclo_escolar" id="ciclo_escolar" required>
                <option value="">Seleccione un ciclo escolar</option>
                <?php foreach ($ciclos as $ciclo): ?>
                    <option value="<?php echo $ciclo['id_ciclo']; ?>">
                        <?php echo htmlspecialchars($ciclo['nombre_ciclo']); ?>

                    </option>
                <?php endforeach; ?>
            </select>


            </select>

            <input type="submit" value="Agregar Ciclo Escolar">
        </form>
    </div>

</body>
</html>

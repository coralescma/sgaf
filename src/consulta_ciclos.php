<?php
// Conectar a la base de datos
require '../src/Database.php'; // Asegúrate de que la ruta sea correcta
$db = new Database();
$conn = $db->getConnection();

// Consulta para obtener los ciclos escolares
$query = $conn->prepare("SELECT id, ciclo_escolar FROM ciclos_escolares");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

// Mostrar resultados
foreach ($result as $row) {
    echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['ciclo_escolar']) . "</option>";
}
?>

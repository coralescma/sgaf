<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

require '../src/Database.php';
require '../src/fpdf186/fpdf.php'; // Asegúrate de que la ruta sea correcta

$db = new Database();
$conn = $db->getConnection();

// Consulta para obtener todos los profesores
$query = $conn->prepare("SELECT * FROM profesores");
$query->execute();
$profesores = $query->fetchAll(PDO::FETCH_ASSOC);

// Crear un nuevo PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Reporte de Profesores', 0, 1, 'C');
$pdf->Ln(10); // Espacio adicional después del título

// Encabezados de la tabla
$pdf->SetFillColor(200, 220, 255); // Color de fondo para encabezados
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 5, 'ID', 1, 0, 'C', true);
$pdf->Cell(50, 5, 'Nombre', 1, 0, 'C', true);
$pdf->Cell(50, 5, 'Apellidos', 1, 0, 'C', true);
$pdf->Cell(50, 5, 'Correo', 1, 0, 'C', true);
$pdf->Cell(30, 5, 'Asignaturas', 1, 1, 'C', true); // Cambia a 1 para nueva línea

// Datos de los profesores
$pdf->SetFont('Arial', '', 10);
$fill = false; // Alternar colores de fondo
foreach ($profesores as $profesor) {
    $pdf->Cell(10, 5, $profesor['id'], 1, 0, 'C', $fill);
    $pdf->Cell(50, 5, htmlspecialchars($profesor['nombre']), 1, 0, 'C', $fill);
    $pdf->Cell(50, 5, htmlspecialchars($profesor['apellidos']), 1, 0, 'C', $fill);
    $pdf->Cell(50, 5, htmlspecialchars($profesor['email']), 1, 0, 'C', $fill);
    $pdf->Cell(30, 5, htmlspecialchars($profesor['asignaturas']), 1, 1, 'C', $fill);
    $fill = !$fill; // Alternar el color de fondo
}

// Salida del PDF en una nueva pestaña
$pdf->Output('I', 'reporte_profesores.pdf'); // 'I' para mostrar en el navegador
?>
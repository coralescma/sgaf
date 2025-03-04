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

// Consulta para obtener todos los alumnos
$query = $conn->prepare("SELECT * FROM alumnos");
$query->execute();
$alumnos = $query->fetchAll(PDO::FETCH_ASSOC);

// Crear un nuevo PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Reporte de Alumnos', 0, 1, 'C');

// Encabezados de la tabla
$pdf->SetFillColor(200, 220, 255); // Color de fondo para encabezados
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 5, 'ID', 1, 0, 'C', true);
$pdf->Cell(50, 5, 'Nombre', 1, 0, 'C', true);
$pdf->Cell(50, 5, 'Apellido', 1, 0, 'C', true);
$pdf->Cell(30, 5, 'Edad', 1, 0, 'C', true);
$pdf->Cell(50, 5, 'Correo', 1, 0, 'C', true);
$pdf->Cell(30, 5, 'Fecha Nac.', 1, 0, 'C', true); // Nueva columna
$pdf->Cell(20, 5, 'Sexo', 1, 1, 'C', true); // Nueva columna

// Datos de los alumnos
$pdf->SetFont('Arial', '', 10);
$fill = false; // Alternar colores de fondo
foreach ($alumnos as $alumno) {
    $pdf->Cell(10, 5, $alumno['id'], 1, 0, 'C', $fill);
    $pdf->Cell(50, 5, $alumno['nombre'], 1, 0, 'C', $fill);
    $pdf->Cell(50, 5, $alumno['apellido'], 1, 0, 'C', $fill);
    $pdf->Cell(30, 5, $alumno['edad'], 1, 0, 'C', $fill);
    $pdf->Cell(50, 5, $alumno['correo'], 1, 0, 'C', $fill);
    $pdf->Cell(30, 5, $alumno['fecha_nacimiento'], 1, 0, 'C', $fill); // Mostrar nuevo campo
    $pdf->Cell(20, 5, $alumno['sexo'], 1, 1, 'C', $fill); // Mostrar nuevo campo
    $fill = !$fill; // Alternar el color de fondo
}

// Salida del PDF en una nueva pestaña
$pdf->Output('I', 'reporte_alumnos.pdf');
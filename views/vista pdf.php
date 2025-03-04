<?php
require('../fpdf186/fpdf.php'); // Asegúrate de que la ruta sea correcta
require '../src/Database.php'; // Asegúrate de que la ruta a tu clase de base de datos sea correcta

// Crear una nueva instancia de la clase de base de datos
$db = new Database();
$conn = $db->getConnection();

// Crear una nueva instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Lista de Alumnos', 0, 1, 'C');
$pdf->Ln(10);

// Establecer el encabezado de la tabla
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 10, 'Nombre', 1);
$pdf->Cell(60, 10, 'Apellido', 1);
$pdf->Cell(30, 10, 'Edad', 1);
$pdf->Cell(60, 10, 'Correo', 1);
$pdf->Ln();

// Establecer el contenido de la tabla
$pdf->SetFont('Arial', '', 12);

// Consulta para obtener la lista de alumnos
$sql = "SELECT nombre, apellido, edad, correo FROM alumnos";
$stmt = $conn->prepare($sql);
$stmt->execute();
$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Agregar los datos de los alumnos al PDF
foreach ($alumnos as $alumno) {
    $pdf->Cell(60, 10, $alumno['nombre'], 1);
    $pdf->Cell(60, 10, $alumno['apellido'], 1);
    $pdf->Cell(30, 10, $alumno['edad'], 1);
    $pdf->Cell(60, 10, $alumno['correo'], 1);
    $pdf->Ln();
}

// Cerrar la conexión
$conn = null;

// Salida del PDF
$pdf->Output()
#$pdf->Output('D', 'lista_alumnos.pdf'); // 'D' para forzar la descarga
?>
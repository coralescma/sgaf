<?php
session_start();
require '../src/Database.php'; // Asegúrate de que la ruta sea correcta

if (!isset($_SESSION['user_id'])) {
    header("Location: /sgaf/public/index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el ID y la descripción del contenido del formulario
    $id_contenido = $_POST['id_contenido'];
    $descripcion = $_POST['descripcion'];

    // Con
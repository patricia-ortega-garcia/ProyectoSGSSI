<?php
session_start();
// Configuración de encabezados de seguridad
//header("X-Frame-Options: SAMEORIGIN");
//header("X-Content-Type-Options: nosniff");
//header("X-Powered-By: MyWebServer"); // Puedes cambiar esto según tus preferencias

// Iniciar sesión

// Verificar la sesión del usuario
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php"); // Redirigir si no está autenticado
    exit();
}

// Conexión a la base de datos
$hostname = "db";
$username = "admin";
$password = "test";
$db = "database";

$conn = mysqli_connect($hostname, $username, $password, $db);
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

?>


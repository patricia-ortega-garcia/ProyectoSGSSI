<?php
/*
$servername = "localhost"; // Cambia esto al nombre del servidor si es diferente
$username = "admin";
$password = "test";
$dbname = "database";
$port = 8890;

// Crea una conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// Verifica si la conexión fue exitosa
if (!$conn) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}
*/

// phpinfo();
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }

  /*
  $backupFolder = "ProyectoSGSSI";

  // Verificar si la carpeta existe, si no, la creamos
  if (!is_dir($backupFolder)) {
      mkdir($backupFolder, 0777, true); // Crea la carpeta con permisos
  }

  $backupFilePath = "$backupFolder/usuarios.sql"; // Ruta relativa

  // Comando para crear una copia de seguridad de la base de datos
  $command = "mysqldump -u $username -p $password $db > $backupFilePath";
  

  if (file_exists($backupFilePath)) {
    echo "Copia de seguridad creada exitosamente.";
  } else {
    echo "Error al crear la copia de seguridad.";
  }
  */

?>

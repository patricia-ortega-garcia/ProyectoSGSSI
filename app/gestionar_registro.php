<?php
include("config.php"); // Incluye el archivo de configuración

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash de la contraseña

    // Valida y procesa los datos (puedes agregar más validaciones)


    
    // Verifica la conexión
    if (!$conn) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Crea la consulta SQL para insertar el nuevo usuario en la tabla
    $sql = "INSERT INTO usuarios (nombre, apellidos, dni, telefono, fecha_nacimiento, email, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepara la consulta SQL
    $stmt = mysqli_prepare($conn, $sql);

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Error al preparar la consulta SQL: " . mysqli_error($conn));
    }

    // Asocia los parámetros con los valores
    mysqli_stmt_bind_param($stmt, "ssssssss", $nombre, $apellidos, $dni, $telefono, $fechaNacimiento, $email, $username, $password);

    // Ejecuta la consulta SQL
    if (mysqli_stmt_execute($stmt)) {
        echo "Registro exitoso. ¡Bienvenido, $nombre!";
    } else {
        echo "Error al registrar el usuario: " . mysqli_error($conn);
    }

    // Cierra la conexión y la declaración
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

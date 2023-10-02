<?php
include("config.php"); // Incluye el archivo de configuración

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $usuario = $_POST["username"];
    $contraseña = $_POST["password"];

    // Verifica la conexión
    if (!$conn) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Crea la consulta SQL para buscar al usuario en la tabla
    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ?";

    // Prepara la consulta SQL
    $stmt = mysqli_prepare($conn, $sql);

    // Verificar que la función 'mysqli_prepare' haya tenido éxito
    if (!$stmt) {
        die("Error al preparar la consulta SQL: " . mysqli_error($conn));
    }

    // Asocia los parámetros con los valores
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $contraseña);

    // Ejecuta la consulta SQL
    if (mysqli_stmt_execute($stmt)) {
        // Obtiene el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);

        // Comprueba si se encontró un usuario con las credenciales proporcionadas
        if (mysqli_num_rows($resultado) === 1) {
            // Inicio de sesión exitoso
            session_start();
            $_SESSION["usuario"] = $usuario;
            header("Location: principal.php"); // Redirige a la página de inicio
            exit();
        } else {
            // Credenciales incorrectas
            header("Location: login.html?error=Credenciales incorrectas");
            exit();
        }
    } else {
        echo "Error al ejecutar la consulta: " . mysqli_error($conn);
    }

    // Cierra la conexión y la declaración
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

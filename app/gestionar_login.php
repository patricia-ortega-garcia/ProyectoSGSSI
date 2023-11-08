<?php
session_start();
include("config.php"); // Incluye el archivo de configuración



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $usuario = $_POST["username"];
    $contraseña = $_POST["password"];
    $dni = $_POST["dni"];

    // Verifica la conexión
    if (!$conn) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Crea la consulta SQL para buscar al usuario en la tabla
    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ? AND dni = ?";
    #$sql2 = "SELECT dni FROM usuarios WHERE usuario = ? AND contraseña = ?";

    // Prepara la consulta SQL
    $stmt = mysqli_prepare($conn, $sql);
    #$stmt2 = mysqli_prepare($conn, $sql);

    // Verificar que la función 'mysqli_prepare' haya tenido éxito
    if (!$stmt) {
        die("Error al preparar la consulta SQL: " . mysqli_error($conn));
    }

    // Asocia los parámetros con los valores
    mysqli_stmt_bind_param($stmt, "sss", $usuario, $contraseña, $dni);

    // Ejecuta la consulta SQL
    if (mysqli_stmt_execute($stmt)) {
        // Obtiene el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);

        // Comprueba si se encontró un usuario con las credenciales proporcionadas
        if (mysqli_num_rows($resultado) === 1) { // Inicio de sesión exitoso
            // Recuperar DNI
                #mysqli_stmt_bind_param($stmt2, "ss", $usuario, $contraseña);
                #$dni = mysqli_stmt_get_result($stmt2);
            
            // Crear la sesión
            session_start();
            $_SESSION["usuario"] = $usuario;
            $_SESSION['dni'] = $dni;
            
            #$sesion=mysqli_fetch_array($usuario);
            header("Location: principal.php"); // Redirige a la página de inicio
        } else {
            // Credenciales incorrectas
            if ($_SESSION['intentosIncorrectos'] == ''){
                $_SESSION['intentosIncorrectos'] = 1;
            }
            else{
                $_SESSION['intentosIncorrectos'] = $_SESSION['intentosIncorrectos'] + 1;
                error_log("Fecha: ".date("d-m-20y, H:i:s")." | IP: ".$_SERVER["REMOTE_ADDR"]." --> ERROR de autentificación password o nombre de user incorrectos. Intentos gastados: ".$_SESSION["intentosIncorrectos"]."/5 \n", 3, "logs.log");

                if ($_SESSION['intentosIncorrectos'] == 5) {
                    error_log("Fecha: ".date("d-m-20y, H:i:s")." | IP: ".$_SERVER['REMOTE_ADDR']." --> Redirección a dirección antibotting. \n", 3, "logs.log");
                    echo "<script> window.location.replace('http://localhost:81/control5veces.php'); </script> ";
                } else {
                    echo "<script> window.location.replace('http://localhost:81/index.php'); </script> ";
                }
            }
        exit();
           // header("Location: index.php");
            //exit();
        }

    // Cierra la conexión y la declaración
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    }
}

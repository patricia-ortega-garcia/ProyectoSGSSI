<?php
    session_start();
    include("config.php");
    include("funciones.php");

    if (!isset($_SESSION["usuario"])) {
        header("Location: index.php"); // Redirigir a la página de inicio de sesión si el usuario no está autenticado
        exit();
    }
    
?>
<!DOCTYPE html>
<html>
<head>
<<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Agrega tu archivo CSS personalizado aquí -->
    <title>Goodgames</title>
</head>
<body>

    <header>
        <h1>Goodgames</h1>
    </header>
    <main>
        <section>
        <?php
        // Establece la conexión a la base de datos aquí
        if (isset($_SESSION['ultimo_eliminar_tiempo']) && (time() - $_SESSION['ultimo_eliminar_tiempo'] < 60)) {
            echo "No puedes eliminar elementos durante 1 minuto.";
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
            $videojuego_id = $_GET["id"];

            if (!$conn) {
                die("La conexión a la base de datos falló: " . mysqli_connect_error());
            }

            // Ejecuta la consulta SQL para eliminar el videojuego
            $sql = "DELETE FROM mytable WHERE id = $videojuego_id"; // Reemplaza 'videojuegos' por el nombre de tu tabla
            if ($conn->query($sql) === TRUE) {
                echo "Videojuego eliminado con éxito.";
                escribirLog("eliminar");
            } else {
                echo "Error al eliminar el videojuego: " . $conn->error;
            }

    }

        // Cierra la conexión a la base de datos aquí
        mysqli_close($conn);
        ?>
        </section>
        <div class="button-container">
            <pre>   </pre>
            <button class="button secondary-button" onclick="window.location.href='principal.php'">Volver a Juegos</button>
        </div>
    </main>
    
    </body>
    </html>


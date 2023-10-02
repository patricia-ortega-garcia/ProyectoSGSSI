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
        include("config.php"); // Incluye el archivo de configuración

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
            $videojuego_id = $_GET["id"];

            if (!$conn) {
                die("La conexión a la base de datos falló: " . mysqli_connect_error());
            }

            // Ejecuta la consulta SQL para eliminar el videojuego
            $sql = "DELETE FROM mytable WHERE id = $videojuego_id"; // Reemplaza 'videojuegos' por el nombre de tu tabla
            if ($conn->query($sql) === TRUE) {
                echo "Videojuego eliminado con éxito.";
            } else {
                echo "Error al eliminar el videojuego: " . $conn->error;
            }
        }

        // Cierra la conexión a la base de datos aquí
        mysqli_close($conn);
        ?>
        </section>
    </main>
    </body>
    </html>

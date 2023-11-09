<?php
header("X-Frame-Options: SAMEORIGIN");
header("X-Content-Type-Options: nosniff");
header_remove("X-Powered-By");

include("config.php"); // Incluye el archivo de configuración
session_start();
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


if (isset($_GET['id'])) {
    $videojuegoId = $_GET['id'];
}


    //Validar parametros (Falta hacer)


    
    // Verifica la conexión
    if (!$conn) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Crea la consulta SQL para insertar el nuevo usuario en la tabla
    $sql = "SELECT * FROM mytable WHERE id = $videojuegoId";
    

    // Prepara la consulta SQL
    //Verificar que la función 'mysqli_prepare' haya tenido éxito
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        echo "<h2>" . $row["Name"] . "</h2>";
        echo "<p>Desarrollador: " . $row["Developer"] . "</p>";
        echo "<p>Productora: " . $row["Producer"] . "</p>";
        echo "<p>Género: " . $row["Genre"] . "</p>";
        echo "<p>Sistema Operativo: " . $row["Operating_System"] . "</p>";
        echo "<p>Fecha de Lanzamiento: " . $row["Date_Released"] . "</p>";

    }

    // Cierra la conexión y la declaración
    
    mysqli_close($conn);
    
?>
 

</section>
    </main>
    <main>
        <div class="button-container">
        <button class="button secondary-button" onclick= "window.location.href='modificar_videojuego.php?id=<?php echo $row['id']?>'">Modificar Videojuego</button>

        <pre>     </pre>
        <button class="button secondary-button" onclick= "eliminarVideojuego(<?php echo $row['id']; ?>)">Eliminar Videojuego</button>

            <pre>     </pre>
            <button class="button secondary-button" onclick="window.location.href='principal.php'">Volver a Juegos</button>
        </div>
    </main>

    <script>
        function eliminarVideojuego(id) {
            if (confirm("¿Estás seguro de que deseas eliminar este videojuego?")) {
                window.location.href = 'eliminar_videojuego.php?id=' + id;
            }
            else
            {}
        }
</script>
</body>
</html>

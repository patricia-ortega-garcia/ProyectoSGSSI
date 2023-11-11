<?php
session_start();
header("X-Frame-Options: SAMEORIGIN");
header("X-Content-Type-Options: nosniff");
header_remove("X-Powered-By");

// Verificar la sesión del usuario (debes implementar esta lógica)
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php"); // Redirigir a la página de inicio de sesión si el usuario no está autenticado
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Goodgames</title>
</head>
<body>
    <header>
        <h1>Goodgames</h1>
    </header>
    <main>
<?php
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php"); // Redirigir a la página de inicio de sesión si el usuario no está autenticado
    exit();
}
// Establece la conexión a la base de datos aquí
include("config.php"); // Incluye el archivo de configuración


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $videojuego_id = $_POST["videojuegoId"];
    $name = $_POST["Name"];
    $dev = $_POST["Developer"];
    $prod = $_POST["Producer"];
    $gen = $_POST["Genre"];
    $op_sys = $_POST["Operating_System"];
    $date= $_POST["Date_Released"];
    // Puedes recibir y validar otros campos aquí
    if (!$conn) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }
    // Consulta SQL para actualizar los datos del producto
    $sql = "UPDATE mytable SET Name = '$name', Developer = '$dev', Producer = '$prod', Genre = '$gen', Operating_System = '$op_sys', Date_Released = '$date' WHERE id = $videojuego_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ver_videojuego.php?id=" . $videojuego_id);
        exit();
    } else {
        $error_message="Error al guardar los cambios: " . $conn->error;
    }
    mysqli_close($conn);


    }
if (isset($_GET['id'])) {
    $videojuegoId = $_GET['id'];
}
    if (!$conn) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Crea la consulta SQL para insertar el nuevo usuario en la tabla
    $sql = "SELECT * FROM mytable WHERE id = $videojuegoId";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $nm= $row["Name"];
        $dv= $row["Developer"];
        $pr= $row["Producer"];
        $gn= $row["Genre"];
        $op= $row["Operating_System"];
        $dt= $row["Date_Released"];

    }

    // Cierra la conexión y la declaración
    
    mysqli_close($conn); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./script.js"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Goodgames</title>
</head>
<body>
    <header>
        <h1>Goodgames</h1>
    </header>
    <main>
 
<form action="modificar_videojuego.php" method="POST"  onsubmit="return check_videojuego();">
        <input type="hidden" name="videojuegoId" value="<?php echo $videojuegoId; ?>">
        <label for="Name">Nombre:</label>
        <input type="text" id="Name" name="Name" value="<?php echo $nm; ?>"><br>
        <label for="Developer">Desarrollador:</label>
        <input type="text" id="Developer" name="Developer" value="<?php echo $dv; ?>"><br>
        <label for="Producer">Productor:</label>
        <input type="text" id="Producer" name="Producer" value="<?php echo $pr; ?>"><br>
        <label for="Genre">Género:</label>
        <input type="text" id="Genre" name="Genre" value="<?php echo $gn; ?>"><br>
        <label for="Operating_System">Sistema Operativo:</label>
        <input type="text" id="Operating_System" name="Operating_System" value="<?php echo $op; ?>"><br>
        <label for="Date_Released">Fecha de Lanzamiento:</label>
        <input type="text" id="Date_Released" name="Date_Released" value="<?php echo $dt; ?>"><br>
        <div class="button-container">
            <button class="button secondary-button" type="submit"> Guardar Cambios</button>
        </div>
</form>
<pre> </pre>
<div class="button-container">
            <button class="button secondary-button" onclick="window.location.href='principal.php'">Volver a Juegos</button> 
</div>
    
    
</main>
</body>
</html>
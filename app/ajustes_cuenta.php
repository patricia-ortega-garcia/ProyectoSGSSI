<?php
include("config.php");
session_start();


$dni=$_SESSION['DNI'];
$datosusu="SELECT * FROM Usuario WHERE(DNI='$dni')";
$lista=mysqli_query($conn,$datosusu);


// Verificar si el usuario está autenticado; si no, redirigirlo a la página de inicio de sesión
 if (!isset($_SESSION['usuario'])) {
     header("Location: index.php");
     exit();
 }

$nombre = "";
$apellidos = "";
$dni = "";
$telefono =  "";
$fechaNacimiento = "";
$email = "";
$usuario = "";
$contraseña = "";



?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <script src="./script.js"></script>
        <title>Goodgames</title>
    </head>

    <body>
        <header>
            <h1>Goodgames</h1>
        </header>
        <main>
            <h2>¡Bienvenido <?php echo $_SESSION['usuario']?>!</h2>
            <h2>¿Qué quiere hacer?</h2>

            <div class="button-container">
                <button class="button secondary-button" onclick="window.location.href='modificar_usuario.php'">Modificar Datos</button>
                <pre>     </pre>
                <button class="button secondary-button" onclick="window.location.href='principal.php'">Volver a Juegos</button>
                <pre>     </pre>
                <button class="button secondary-button" onclick="window.location.href='index.php'">Cerrar Sesión</button>
            </div>
            
            <div>
                <h3>Tus datos:</h3>
                <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>FechaNacimiento</th>
                    <th>Email</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><?= $_SESSION['usuario'] ?></th>
                    <th><?= $_SESSION['apellidos'] ?></th>
                    <th><?= $_SESSION['telefonos'] ?></th>
                    <th><?= $_SESSION['fecha_nacimiento'] ?></th>
                    <th><?= $_SESSION['email'] ?></th>
                    <th><?= $_SESSION['username'] ?></th>
                    <th><?= $_SESSION['password'] ?></th>
                </tr>
            </tbody>
        </table>    
            </div>
        </main>
    </body>

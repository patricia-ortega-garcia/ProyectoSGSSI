<?php
session_start();

//si no se ha creado un token para evitar csfr, se crea:
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
var_dump($_SESSION['token'])

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
        <section>
            <h2>Inicia sesión en Goodgames</h2>
            <!-- <p>Nombre de usuario</p> 
            <p>Contraseña</p> -->
            <?php
                if (isset($_SESSION["mensaje"])) {
                    echo $_SESSION["mensaje"];
                    unset($_SESSION["mensaje"]); // Borra el mensaje para que no se muestre de nuevo
            }
            ?>
            <pre>   </pre>
            <form id="inicio-sesion-form" action="gestionar_login.php" method="POST">
                <input type ="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" placeholder="p. ej: Anita" required><br>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="p. ej: contraseña1234" required><br>
  
                <label for="dni">DNI:</label>
                <input type="dni" id="dni" name="dni" placeholder="p. ej: 99999999R" required><br>

                <!-- <button type="submit">Iniciar Sesión </button> -->

                <div class="button-container">
                    <button class="button secondary-button" type="submit">Iniciar Sesión </button>
                    <pre>     </pre>
                    <button class="button secondary-button" onclick="window.location.href='gestionar_registro.php'">Registrarse</button>
                    <pre>     </pre>
                    <button class="button secondary-button" onclick="window.location.href='principal.php'">Ver Catálogo</button>
                </div>

            </form>

            <!-- <button onclick="window.location.href='registro.html'">Registrarse</button> -->
        </section>
    </main>
    <<script type="text/javascript" src="./script.js"></script> 
</body>
</html>


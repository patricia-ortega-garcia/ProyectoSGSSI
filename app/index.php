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
            <form id="inicio-sesion-form" action="gestionar_login.php" method="POST">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" placeholder="Usuario" required><br>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Contraseña" required><br>

                <!-- <button type="submit">Iniciar Sesión </button> -->

                <div class="button-container">
                    <button class="button secondary-button" type="submit">Iniciar Sesión </button>
                    <pre>     </pre>
                    <button class="button secondary-button" onclick="window.location.href='gestionar_registro.php'">Registrarse</button>
                </div>

            </form>

            <!-- <button onclick="window.location.href='registro.html'">Registrarse</button> -->
        </section>
    </main>
    <!-- <script src="script.js"></script> -->
</body>
</html>


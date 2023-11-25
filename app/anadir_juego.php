<?php
session_start();

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
        <section>
            <h2>Formulario de Videojuego</h2>
            
            <form id="videojuego-form" action="anadir_videojuego.php" method="POST">
                <input type ="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" required><br>

                <label for="creador">Creador:</label>
                <input type="text" id="creador" name="creador" placeholder="Creador" required><br>

                <label for="productora">Productora:</label>
                <input type="text" id="productora" name="productora" placeholder="Productora" required><br>

                <label for="genero">Género:</label>
                <input type="text" id="genero" name="genero" placeholder="Género" required><br>

                <label for="sistema_operativo">Sistema operativo:</label>
                <input type="text" id="sistema_operativo" name="sistema_operativo" placeholder="Sistema operativo" required><br>

                <label for="fecha_lanzamiento">Fecha lanzamiento:</label>
                <input type="text" id="fecha_lanzamiento" name="fecha_lanzamiento" placeholder="Fecha lanzamiento" required><br>
                <div class="button-container">
                    <button class="button secondary-button" type="submit"> Añadir</button>
                </div>
            </form>
            <pre>   </pre>
            <div class="button-container">
                <button class="button secondary-button" onclick="window.location.href='principal.php'">Volver a Juegos</button>
             </div>
        </section>
    </main>
</body>
</html>
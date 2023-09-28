<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Agrega tu archivo CSS personalizado aquí -->
    <title>Goodgames</title>
</head>
<body>
    <header>
        <h1>Página principal</h1>
    </header>

    <main>
        <section>
            <h2>Catalogo de videojuegos</h2>
            <form id="catalogo-videojuegos-form" action="buscar_videojuego.php" method="POST">
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
               <!-- button type="submit">Iniciar Sesión </button> -->

                <div class="button-container">
                    <button type="submit">Buscar </button>
                    <pre>     </pre>
                    <button onclick="window.location.href='anadir_videojuego.html'">Añadir videojuego</button>
                </div>

            </form>
        </section>
    </main>
</body>
</html>

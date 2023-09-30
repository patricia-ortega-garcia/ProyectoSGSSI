<?php
include("config.php"); // Incluye el archivo de configuración
//desde página principal o desde buscar, seleccionar videojuego de catálogo --> pantalla videojuego con botón eliminar.
if (!$conn) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

// Parámetros para la paginación
$porPagina = 10; // Número de elementos por página
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$inicio = ($pagina - 1) * $porPagina;

// Consulta SQL con LIMIT para paginación
$sql = "SELECT * FROM mytable LIMIT $inicio, $porPagina";
$result = $conn->query($sql);



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Agrega tu archivo CSS personalizado aquí -->
    <title>Goodgames</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <header>
        <h1>Goodgames</h1>
    </header>

    <main>
        <section>
            <h2>Catálogo de videojuegos</h2>
            <table>
        <tr>
            <th>Nombre</th>
            <th>Desarrollador</th>
            <th>Género</th>
        </tr>
            <?php
               while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Developer"] . "</td>";
                echo "<td>" . $row["Genre"] . "</td>";
                echo "</tr>";
            }
            $sql = "SELECT COUNT(*) AS total FROM mytable";
             $result = $conn->query($sql);
             $fila = $result->fetch_assoc();
            $totalPaginas = ceil($fila["total"] / $porPagina);

            // Mostrar enlaces de paginación
            echo "<div>";
            for ($i = 1; $i <= $totalPaginas; $i++) {
                if ($i == $pagina) {
                    echo "<strong>$i</strong> ";
                } else {
                    echo "<a href='?pagina=$i'>$i</a> ";
                }
            }
            echo "</div>";
                ?>
                </table>
            <!--  <form id="catalogo-videojuegos-form" action="buscar_videojuego.php" method="POST"> -->
            <label for="nombre">Nombre:</label>
               <!--  <input type="text" id="nombre" name="nombre" placeholder="Nombre" required><br>

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
               button type="submit">Iniciar Sesión </button> -->

                <div class="button-container">
                    <button class="button secondary-button" onclick="window.location.href='buscar_juegos.html'">Buscar videojuegos</button>
                    <pre>     </pre>
                    <button class="button secondary-button" onclick="window.location.href='anadir_videojuego.html'">Añadir videojuego</button>
                </div>

            <!--  </form> -->
        </section>
    </main>

    <main>
        <div class="button-container">
            <button class="button secondary-button" onclick="window.location.href='ajustes_cuenta.php'">Mi Perfil </button>
            <pre>     </pre>
            <button class="button secondary-button" onclick="window.location.href='index.php'">Cerrar Sesión</button>
        </div>
    </main>

    <!-- 
    <footer>
        <section>
            <button onclick="window.location.href='index.php'">Cerrar Sesión</button>
             
            <ul class= "footer-left">

            </ul>
            <ul class= "footer-right">

            </ul> 
        </section>
    </footer>
    -->

</body>
</html>

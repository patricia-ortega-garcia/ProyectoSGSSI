<?php
include("config.php"); // Incluye el archivo de configuración
//desde página principal o desde buscar, seleccionar videojuego de catálogo --> pantalla videojuego con botón eliminar.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $creador = $_POST["creador"];
    $productora = $_POST["productora"];
    $genero = $_POST["genero"];
    $sistema_operativo = $_POST["sistema_operativo"];
    $fecha_lanzamiento = $_POST["fecha_lanzamiento"];


if (!$conn) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}


// Parámetros para la paginación
$porPagina = 10; // Número de elementos por página
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$inicio = ($pagina - 1) * $porPagina;

// Consulta SQL con LIMIT para paginación
$sql = "SELECT * FROM mytable WHERE Name=$nombre AND Developer=$creador AND Producer=$productora AND Genre LIKE '*$genero*' AND Operating_System LIKE '*$sistema_operativo*' AND Date_Released=$fecha_lanzamiento LIMIT $inicio, $porPagina";
$result = $conn->query($sql);

}

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

    <main>
        <section>
            <h2>Catálogo de videojuegos</h2>
            <table>
        <tr>
            <th>Nombre</th>
            <th>Desarrollador</th>
            <th>Productora</th>
            <th>Género</th>
            <th>sistema_operativo</th>
            <th>fecha_lanzamiento</th>
        </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Developer"] . "</td>";
                echo "<td>" . $row["Producer"] . "</td>";
                echo "<td>" . $row["Genre"] . "</td>";
                echo "<td>" . $row["Operating_System"] . "</td>";
                echo "<td>" . $row["Date_Released"] . "</td>";
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
            ?>
            </table>
        </section>
    </main>
</head>
</html>

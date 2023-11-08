<?php
    session_start();
    include("config.php");
    if ($_SESSION['intentosIncorrectos'] == 5){
        $_SESSION['intentosIncorrectos'] = 0;
        echo "<h1> ERROR </h1>";
        echo "<p class = mensaje> Has fallado 5 veces seguidas, pulsa el botón de abajo para volver </p>";
    }
    else{
        echo "<h1> ERROR </h1>";
        echo "<p class = mensaje> Se ha intentado navegar desde una URL no permitida </p>";
    }
?>
<link rel="stylesheet" href="styles.css">
	<br>			
	<a href="index.php"><input class="button-container" type="button secondary-button" value="Volver a inicio de sesión"> </a>
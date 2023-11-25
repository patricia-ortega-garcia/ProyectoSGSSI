<?php 

  session_start(); 
  // Verificar la sesión del usuario (debes implementar esta lógica)
    /*if (!isset($_SESSION["usuario"])) {
        header("Location: index.php"); // Redirigir a la página de inicio de sesión si el usuario no está autenticado
        exit();
    }*/

    if ($_SESSION['incorrectosSeguidos'] == 3) {
        $_SESSION['incorrectosSeguidos'] = 0;
        echo "<p class = mensaje> Tenemos sospechas de que eres un bot, pulsa en el botón de abajo que te llevará al inicio de sesión </p>";
    } else {
    	echo "<h1> ERROR!! </h1>";
        echo "<p class = mensaje> Se ha intentado navegar desde una URl no permitida, pulsa en el botón de abajo que te llevará al inicio de sesión </p>";
}
?>
<link rel="stylesheet" href="styles.css">
	<br>			
	<a href="index.php"><input class="button-container" type="button secondary-button" value="Volver a inicio de sesión"> </a>



	
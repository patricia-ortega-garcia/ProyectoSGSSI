<?php 
header("X-Frame-Options: SAMEORIGIN");
header("X-Content-Type-Options: nosniff");
//header_remove("X-Powered-By");


  session_start(); 
  // Verificar la sesión del usuario (debes implementar esta lógica)
    /*if (!isset($_SESSION["usuario"])) {
        header("Location: index.php"); // Redirigir a la página de inicio de sesión si el usuario no está autenticado
        exit();
    }*/

    if ($_SESSION['incorrectosSeguidos'] == 3) {
        $_SESSION['incorrectosSeguidos'] = 0;
    	echo "<h1> ¡Ups! </h1>";
        echo "<p class = mensaje> Has fallado 5 veces seguidas, para asegurarte de que no eres un bot pulsa en el botón de abajo para volver </p>";
    } else {
    	echo "<h1> Vaya... Ha habido un error... </h1>";
        echo "<p class = mensaje> Se ha intentado navegar desde una URl no permitida, pulse en el botón para volver al inicio de sesión </p>";
}
?>
<link rel="stylesheet" href="styles.css">
	<br>			
	<a href="index.php"><input class="button-container" type="button secondary-button" value="Volver a inicio de sesión"> </a>



	
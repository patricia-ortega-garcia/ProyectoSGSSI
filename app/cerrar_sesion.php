<?php
session_start();
$_SESSION['identificado'] = false;
session_destroy();

header("Location: index.php");
exit(); 
?>

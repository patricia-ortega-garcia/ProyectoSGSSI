<?php
session_start();
function cifrar($dato) {
	//$puntero = fopen("clave_simetrica.txt", "r");
	//$clave = fgets($puntero, 50);
	//fclose($puntero);
	$clave = $_ENV['CLAVE_SECRETA'];
	$clave_hash = hash('sha256', $clave);
	$iv = substr($clave_hash, 0, 16);
	return base64_encode(openssl_encrypt($dato, 'AES-256-CBC', $clave_hash, 0, $iv));

}

function descifrar($dato) {
	//$puntero = fopen("clave_simetrica.txt", "r");
	//$clave = fgets($puntero, 50);
	//fclose($puntero);
	$clave = $_ENV['CLAVE_SECRETA'];
	$clave_hash = hash('sha256', $clave);
	$iv = substr($clave_hash, 0, 16);
	return openssl_decrypt(base64_decode($dato), 'AES-256-CBC', $clave_hash, 0, $iv);

}

function tokenCaducado($token){
	$duracion = 600;
	return (isset($_SESSION['anticsrf']) && (time() - $_SESSION['token_tiempo']) > $duracion);
}

function escribirLog($razon){

	if ($razon == "login"){
	error_log("Fecha: ".date("d-m-20y, H:i:s")." | La IP del usuario es: ".$_SERVER["REMOTE_ADDR"]." --> El usuario se ha identificado de manera incorrecta. Intentos gastados: ".$_SESSION["incorrectosSeguidos"]."/3 \n", 3, "logs/logs.log");
	} else if ($razon == "antibotting"){
		error_log("Fecha: ".date("d-m-20y, H:i:s")." | La IP del usuario es: ".$_SERVER['REMOTE_ADDR']." --> El usuario ha fallado la contraseña 3 veces seguidas. \n", 3, "logs/logs.log");
	} else if ($razon == "eliminar"){
		error_log("Fecha: ".date("d-m-20y, H:i:s")." | La IP del usuario es: ".$_SERVER['REMOTE_ADDR']." --> El usuario ha eliminado un elemento \n", 3, "logs/logs.log");
	}
}

?>
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
	return (isset($_SESSION['token']) && (time() - $_SESSION['token_tiempo']) > $duracion);
}


?>
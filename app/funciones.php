<?php
header("X-Frame-Options: SAMEORIGIN");
header("X-Content-Type-Options: nosniff");

session_start();
if (!$_SESSION['identificado']){
    echo "<script> window.location.replace('http://localhost:81'); </script> "; 
}

function cifrar($dato) {
	$puntero = fopen("clave_simetrica.txt", "r");
	$clave = fgets($puntero, 50);
	$clave = hash('sha256', $clave);
	$iv = substr($clave, 0, 16);
	return base64_encode(openssl_encrypt($dato, 'AES-256-CBC', $clave, 0, $iv));
	

}

function descifrar($dato) {
	$puntero = fopen("clave_simetrica.txt", "r");
	$clave = fgets($puntero, 50);
	$clave = hash('sha256', $clave);
	$iv = substr($clave, 0, 16);
	return openssl_decrypt(base64_decode($dato), 'AES-256-CBC', $clave, 0, $iv);

}

?>
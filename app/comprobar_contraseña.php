<?php
    function comprobar($contraseña) {
        $archivo = fopen("10000-peores-contraseñas.txt", "r");
        $es_mala = false;
        while (!feof($archivo) && !$es_mala) {
            $linea = trim(fgets($archivo));
            if (strcmp($linea, $contraseña) === 0) {
                $es_mala = true;
            }
        }
        fclose($archivo);
        return $es_mala;
    }
?>
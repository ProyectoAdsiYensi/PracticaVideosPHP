<?php

$archivo = "text.txt";
$contenido = "Este es otro contenido";

$manejador = fopen($archivo, 'a+');
fwrite($manejador,$contenido);

?>
<?php

$conexion = new PDO('sqlite:biblioteca.sqlite'); 

$consulta = "UPDATE Discos SET Artista ='Yensi' WHERE Artista = 'maluma'";

$conexion = $conexion -> exec($consulta);

$conexion = null;

?>
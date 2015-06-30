
<?php

$conexion = new PDO('sqlite:biblioteca.sqlite'); 

$consulta = "DELETE FROM Discos WHERE Artista='andres cepeda'";

$conexion = $conexion -> exec($consulta);

$conexion=null;


?>
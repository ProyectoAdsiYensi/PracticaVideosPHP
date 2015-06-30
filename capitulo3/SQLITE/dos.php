<?php

$conexion =  new PDO('sqlite:prueba.sqlite'); 

$consulta = '

CREATE TABLE Discos(

Artista Char(20) Not Null,
Disco Char(40),
Anio Integer);';

 $resultado = $conexion -> exec($consulta);

?>
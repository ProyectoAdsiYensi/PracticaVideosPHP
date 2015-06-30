<?php

$conexion =  new PDO('sqlite:biblioteca.sqlite'); 

$INSERT= $conexion -> exec("INSERT INTO Discos ('Artista','Disco','Anio') VALUES ('maluma','besos',2015)");
$INSERT= $conexion -> exec("INSERT INTO Discos ('Artista','Disco','Anio') VALUES ('samo','sin ti ',2015)");
$INSERT= $conexion -> exec("INSERT INTO Discos ('Artista','Disco','Anio') VALUES ('andres cepeda','amor',2015)");


?>
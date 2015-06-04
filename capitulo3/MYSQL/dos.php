<?php

$conexion = mysql_connect("localhost","miusuario","miusuario");

if(!$conexion){
die ("No he podido conectar por la siguiente razon: ".mysql_error());
}

mysql_select_db("baseprincipal",$conexion);

mysql_query("INSERT INTO tablauno (Nombre, Apellido, Edad, Telefono)
VALUES ('Marta','Lopez',14,'5400001')");

mysql_close($conexion);

?>
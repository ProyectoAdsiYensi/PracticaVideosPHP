<?php

$conexion = mysql_connect("localhost","miusuario","miusuario");


if(!$conexion){

die ("No se ha podido conectar por la siguiente razon: ".mysql_error());
}


mysql_select_db("baseprincipal",$conexion);


mysql_query("INSERT INTO tablauno (Nombre, Apellido, Edad, Telefono)
VALUES ('Jose Vicente','Puebla',32,'000001')");


mysql_query("INSERT INTO tablauno (Nombre, Apellido, Edad, Telefono)
VALUES ('Maia Caro','sogamoso',87,'000001')"); 

mysql_close($conexion);

?>

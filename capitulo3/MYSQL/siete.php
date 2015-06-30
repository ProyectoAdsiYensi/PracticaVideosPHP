<?php

$conexion = mysql_connect("localhost","miusuario","miusuario");

mysql_select_db("baseprincipal",$conexion);

mysql_query("UPDATE tablauno SET Edad = '24' WHERE Nombre = 'Marta' AND Apellido = 'Lopez'");

mysql_close($conexion);

?>
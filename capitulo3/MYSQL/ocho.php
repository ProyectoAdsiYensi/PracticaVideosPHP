<?php

$conexion = mysql_connect("localhost","miusuario","miusuario");

mysql_select_db("baseprincipal",$conexion);

mysql_query("DELETE FROM tablauno WHERE Nombre= 'Marta' AND Apellido= 'Lopez'");

mysql_close($conexion);

?>
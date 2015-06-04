<?php

$conexion = mysql_connect("localhost","miusuario","miusuario");

if(!$conexion){

die(mysql_error());

}

mysql_select_db("baseprincipal",$conexion);

$peticion = mysql_query("SELECT * FROM tablauno WHERE Nombre='maria fernanda'");

while($fila = mysql_fetch_array($peticion))
{
echo $fila['Nombre']. " ".$fila['Apellido']." ".$fila['Edad']." ".$fila['Telefono'];
echo "<br>";
}

mysql_close($conexion);
?>
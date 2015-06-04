<?php
//Realizamos la conexion
$conexion = mysql_connect("localhost","miusuario","miusuario");
//Estructura de control por si falla
if(!$conexion){
die("No he podido conectar porque: ".mysql_error());
}
//Seleccion la base de datos
mysql_select_db("baseprincipal",$conexion);
//realizo la peticion
$peticion = mysql_query("SELECT * FROM tablauno");
//Listo los elementos de la base de datos
while ($fila = mysql_fetch_array($peticion))
{
echo $fila['Nombre']." ".$fila['Apellido']." ".$fila['Edad']." ".$fila['Telefono'];
echo "<br>";
}
//Cerrar la conexion
mysql_close($conexion);



?>
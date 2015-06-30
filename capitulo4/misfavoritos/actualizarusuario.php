<?php

session_start();

$conexion = new PDO('sqlite:favoritos.sqlite');

$usuarioantiguo = $_SESSION['usuario'];

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];

//$tituloantiguo = $_SESSION['titulo'];

$consulta = "UPDATE usuarios SET usuario='".$usuario."', contrasena='".$contrasena."', nombre='".$nombre."', apellido='".$apellido."', edad='".$edad."' WHERE usuario='".$usuarioantiguo."'";

$resultado =  $conexion -> exec($consulta);



echo'
<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=gestionusuarios.php">
	</head>
</html>
';

?>

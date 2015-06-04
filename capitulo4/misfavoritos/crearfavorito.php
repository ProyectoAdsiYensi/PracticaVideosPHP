<?php

session_start();

//Crear variables

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$addtitulo = $_POST['titulo'];
$adddireccion = $_POST['direccion'];
$addcategoria = $_POST['categoria'];
$addcomentario = $_POST['comentario'];
$addvaloracion = $_POST['valoracion'];

//Conexion

$conexion = new PDO('sqlite:favoritos.sqlite');

//Consulta

$consulta = "INSERT INTO favoritos VALUES ('$usuario','$contrasena','$addtitulo','$adddireccion','$addcategoria','$addcomentario','$addvaloracion');";


//Ejecuto
$conexion = $conexion -> exec($consulta);
//Cierro

//Y vuelvo
echo '
<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=principal.php">
	</head>
</html>
';

?>

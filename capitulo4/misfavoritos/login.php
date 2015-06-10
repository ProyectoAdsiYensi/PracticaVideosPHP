<?php

session_start();

//Obtener variables

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

//Crearemos conexion

$conexion = new PDO('sqlite:favoritos.sqlite');


//Consulta
$consulta = "SELECT * FROM usuarios;";
//Lanzar la consulta

$resultado = $conexion -> query($consulta);
//repasar los resultados


foreach ($resultado as $fila) {
$usuariobasedatos = $fila['usuario'];
$contrasenabasedatos = $fila['contrasena'];
$permisosenbase = $fila['permisos'];

if($usuario == $usuariobasedatos & $contrasena == $contrasenabasedatos){
//Si el resultado es positivo, entonces asignar

$_SESSION['usuario'] = $usuario;
$_SESSION['contrasena'] = $contrasena;
$_SESSION['permisos'] = $permisosenbase;

echo'

<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=principal.php">
	</head>
</html>

';


}else{
//Si el resultado es nagativo, entonces nada
}
}
//Cerramos base de datos

?>

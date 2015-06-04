<?php

session_start();

//Recupero variables

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$usuario = $_GET['usuario'];
$contrasena = $_GET['contrasena'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$edad = $_GET['edad'];

$conexion = new PDO('sqlite:favoritos.sqlite');

$consulta = "SELECT * FROM usuarios WHERE usuario='".$usuario."' AND contrasena='".$contrasena."' AND nombre='".$nombre."' AND apellido='".$apellido."' AND edad=".$edad."";

$resultado =  $conexion -> exec($consulta);

echo"

<table border=1 width=100%>
<tr>
	<td>Usuario</td>
	<td>Contraseña</td>
	<td>Nombre</td>
	<td>Apellido</td>
	<td>Edad</td>
	<td></td>
</tr>

";

while($fila = sqlite_fetch_array($resultado)){

echo"

<tr><form action='actualizarusuario.php' method='post'>
	<td><input type='text' name='usuario' value='".$fila['usuario']."'></td>
	<td><input type='text' name='contrasena' value='".$fila['contrasena']."'></td>
	<td><input type='text' name='nombre' value='".$fila['nombre']."'>
	
	</td>
	<td><input type='text' name='apellido' value='".$fila['apellido']."'></td>
	<td><input type='text' name='edad' value='".$fila['edad']."'></td><td><input type='submit'</td>
	</form>
</tr>

";

}

echo "</table>";

$_SESSION['usuario'] = $usuario;


?>

<?php

session_start();

//Recupero variables

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$titulo = $_GET['titulo'];
$direccion = $_GET['direccion'];
$categoria = $_GET['categoria'];
$comentario = $_GET['comentario'];
$valoracion = $_GET['valoracion'];

$conexion = new PDO('sqlite:favoritos.sqlite');

$consulta = "SELECT * FROM favoritos WHERE titulo='".$titulo."' AND direccion='".$direccion."' AND categoria='".$categoria."' AND comentario='".$comentario."' AND valoracion=".$valoracion."";

echo"

<table border=1 width=100%>
<tr>
	<td>Titulo</td>
	<td>Direccion</td>
	<td>Categoria</td>
	<td>Comentarios</td>
	<td>Valoracion</td>

</tr>

";
$result = $conexion->query($consulta);

foreach ($result as $fila) {

echo"

<tr><form action='actualizarfavorito.php' method='post'>
	<td><input type='text' name='titulo' value='".$fila['titulo']."'></td>
	<td><input type='text' name='direccion' value='".$fila['direccion']."'></td>
	<td>
	<select name='categoria'>
		<option value='salud'>Salud</option>
		<option value='trabajo'>Trabajo</option>
		<option value='hobby'>Hobby</option>
		<option value='personal'>Personal</option>
		<option value='otros'>Otros</option>
		<option value='".$fila['categoria']."' selected>".$fila['categoria']."</option>
	</select>
	</td>
	<td><input type='text' name='comentario' value='".$fila['comentario']."'></td>
	<td><input type='text' name='valoracion' value='".$fila['valoracion']."'></td><td><input type='submit'</td>
	</form>
</tr>

";

}

echo "</table>";

$_SESSION['titulo'] = $titulo;



?>

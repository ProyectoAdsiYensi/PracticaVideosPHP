<?php

//include("log.php");
session_start();

echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

echo "<br/>Pulsa <a href='unlog.php'>AQUI</a> para cerrar tu sesion<br/>";
//Crear conexion

$conexion = new PDO('sqlite:favoritos.sqlite');
//ESTABLECER una consulta

$consulta = "SELECT * FROM favoritos WHERE usuario='".$_SESSION['usuario']."' AND contrasena='".$_SESSION['contrasena']."';";

//Ejecutar la consulta
$resultado = $conexion -> query($consulta);

//Imprimir la consulta 

echo "
<table border=1 width=100%>
<tr>
<td>Titulo</td>
<td>Direccion</td>
<td>Categoria</td>
<td>Comentario</td>
<td>Valoracion</td>
<td>Actualizar</td>
<td>Eliminar</td>

</tr>
";


foreach ($resultado as $fila) {

echo "<tr>

<td>".$fila['titulo']."</td>
<td>".$fila['direccion']."</td>
<td>".$fila['categoria']."</td>
<td>".$fila['comentario']."</td>
<td>".$fila['valoracion']."</td>
<td><a href='formularioactualizar.php?titulo=".$fila['titulo']."&direccion=".$fila['direccion']."&categoria=".$fila['categoria']."&comentario=".$fila['comentario']."&valoracion=".$fila['valoracion']."'>Actualizar</a>
<td><a href='eliminarfavorito.php?titulo=".$fila['titulo']."&direccion=".$fila['direccion']."&categoria=".$fila['categoria']."&comentario=".$fila['comentario']."&valoracion=".$fila['valoracion']."'>Eliminar</a>
</tr>";
}



//Añadir un registro

echo "
<tr>
	<form action='crearfavorito.php' method='POST'>
	<td><input type='text' name='titulo'></td>
	<td><input type='text' name='direccion'></td>
	<td><select name='categoria'>
		<option value='salud'>Salud</option>
		<option value='trabajo'>Trabajo</option>
		<option value='hobby'>Hobby</option>
		<option value='personal'>Personal</option>
		<option value='otros'>Otros</option>
	</td>
	<td><input type='text' name='comentario'></td>
	<td><input type='text' name='valoracion'></td>
	<td><input type='submit'></td>
</tr>

";


echo "</table>";
/*
//Cerramos la conexion



////socializo//////////////////////////////////////////////////////

function muestraCategoria($damecategoria){
echo "ALgunos links de la categoria ".$damecategoria." que quizas te puedan interesar";

$conexion = new PDO('sqlite:favoritos.sqlite');

$consulta = "SELECT * FROM favoritos WHERE usuario != '".$_SESSION['usuario']."' AND categoria='".$damecategoria."' ORDER BY RANDOM() LIMIT 3;";

$conexion = $conexion -> exec($consulta);

echo "

<table border=1 width=100%>
<tr>
<td>Titulo</td>
<td>Direccion</td>
<td>Categoria</td>
<td>Comentario</td>
<td>Valoracion</td>
<td></td>
<td></td>
</tr>

";

while ($fila = sqlite_fetch_array($conexion)){
echo "<tr><td>".$fila['titulo']."</td><td>".$fila['direccion']."</td><td>".$fila['categoria']."</td><td>".$fila['comentario']."</td><td>".$fila['valoracion']."</td><td></td><td></td></tr>";
}

echo "</table>";

}

muestraCategoria("salud");

muestraCategoria("trabajo");

muestraCategoria("personal");

muestraCategoria("hobby");

muestraCategoria("otros");

*/
?>

<?php

session_start();

$codigo = $_SESSION['permisos'];

if($codigo == 1){

echo "Pulsa <a href='verlogs.php'>AQUI</a> para ver los logs <br/>";

echo "Pulsa <a href='gestionusuarios.php'>AQUI</a> para gestionar a los usuarios";

}

else {

echo'

<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=index.php">
	</head>
</html>

';

}

?>

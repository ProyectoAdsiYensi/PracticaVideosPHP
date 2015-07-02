<?php
	session_start();
	require_once("install.php");
	/* REQUEST = $_POST $_GET */
	if (!empty($_REQUEST['action'])){
		$accion = $_REQUEST['action'];
		if($accion == 'crear'){
			crearAutomovil();
		}else if ($accion == 'ver'){
			verAutomovil();
		}else if ($accion == 'update'){
			updateAutomovil();
		}else if ($accion == 'delete'){
			deleteAutomovil();
		}

	}

	function crearPosts(){
		/* Proteccion de Datos */
		$params = array(
			':utc' => $_POST['utc'],
			':anio' => $_POST['anio'],
			':mes' => $_POST['mes'],
			':dia' => $_POST['dia'],
			':hora' => $_POST['hora'],
			':minuto' => $_POST['minuto'],
			':segundo' => $_POST['segundo'],
			':usuario' => $_POST['usuario'],
			':titulo' => $_POST['titulo'],
			':subtitulo' => $_POST['subtitulo'],
			':icono' => $_POST['icono'],
			':texto' => $_POST['texto'],
			':imagen' => $_POST['imagen'],
			':video' => $_POST['video'],
			':sonido' => $_POST['sonido'],
			

		);

		/* Preparamos el query apartir del array $params*/
		$query = 'INSERT INTO 
					Posts (utc,anio,mes,dia,hora,minuto,segundo,usuario,titulo,subtitulo,icono,texto,imagen,video,sonido)
				VALUES
					(:utc,:anio,:mes,:dia,:hora,:minuto,:segundo,:usuario,:titulo,:subtitulo,:icono,:texto,:imagen,:video,:sonido)';

		/* Ejecutamos el query con los parametros */
		$result = excuteQuery("Usuarios","", $query, $params);
		if ($result > 0){
			header('Location: viewPosts.php?result=true');
		}else{
			header('Location: addPosts.php?result=false');
		}
	}

	function verPosts(){
		$query = "SELECT * FROM Posts";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				echo "<tr>";
				echo "    <td>".$value['idutc']."</td>";
				echo "    <td>".$value['anio']."</td>";
				echo "    <td>".$value['mes']."</td>";
				echo "    <td>".$value['dia']."</td>";
				echo "    <td>".$value['hora']."</td>";
				echo "    <td>".$value['minuto']."</td>";
				echo "    <td>".$value['segundo']."</td>";
				echo "    <td>".$value['usuario']."</td>";
				echo "    <td>".$value['titulo']."</td>";
				echo "    <td>".$value['subtitulo']."</td>";
				echo "    <td>".$value['icono']."</td>";
                echo "    <td>".$value['texto']."</td>";
				echo "    <td>".$value['imagen']."</td>";
				echo "    <td>".$value['video']."</td>";
				echo "    <td>".$value['sonido']."</td>";

				echo "</tr>";
			}
		}else{
			echo "No se encontraron resultados";
		}
	}

	function getAutomovil($id){
		$query = "SELECT * FROM Automovil WHERE idAutomovil = '".$id."'";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				return $value;
			}
		}else{
			return false;
		}
	}

	function updateAutomovil (){

		/* Proteccion de Datos */
		$params = array(
			':idAutomovil' => $_SESSION['idAutomovil'],
			':marca' => $_POST['marca'],
			':modelo' => $_POST['modelo'],
			':color' => $_POST['color'],
			':placa' => $_POST['placa'],
			':estado' => $_POST['estado'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='UPDATE Automovil SET
					Marca = :marca,
					Modelo = :modelo,
					Color = :color,
					Placa = :placa,
					Estado = :estado  
				 WHERE idAutomovil= :idAutomovil;
				';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			unset($_SESSION['idAutomovil']);
			$_SESSION['idAutomovil'] = NULL;
			header('Location: viewAutomoviles.php?result=true');
		}else{
			header('Location: editAutomovil.php?result=false');
		}
	}

	function deleteAutomovil (){

		$idAutomovil = $_GET['id'];

		/* Proteccion de Datos */
		$params = array(
			':id' => $_GET['id'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='DELETE FROM Automovil
				 WHERE idAutomovil = :id;';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			header('Location: viewAutomoviles.php?result=true');
		}else{
			header('Location: viewAutomoviles.php?result=false');
		}
	}

?>
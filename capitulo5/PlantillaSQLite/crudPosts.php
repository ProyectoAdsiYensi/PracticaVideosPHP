<?php
	session_start();
	require_once("install.php");
	/* REQUEST = $_POST $_GET */
	if (!empty($_REQUEST['action'])){
		$accion = $_REQUEST['action'];
		if($accion == 'crear'){
			crearPosts();
		}else if ($accion == 'ver'){
			verPosts();
		}else if ($accion == 'update'){
			updatePosts();
		}else if ($accion == 'delete'){
			deletePosts();
		}

	}

	function crearPosts(){
		/* Proteccion de Datos */
		$params = array(
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
			':sonido' => $_POST['sonido']
			

		);

		/* Preparamos el query apartir del array $params*/
		$query = 'INSERT INTO 
					Posts (anio,mes,dia,hora,minuto,segundo,usuario,titulo,subtitulo,icono,texto,imagen,video,sonido)
				VALUES
					(:anio,:mes,:dia,:hora,:minuto,:segundo,:usuario,:titulo,:subtitulo,:icono,:texto,:imagen,:video,:sonido)';

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

	function getPosts($id){
		$query = "SELECT * FROM Posts WHERE idutc = '".$id."'";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				return $value;
			}
		}else{
			return false;
		}
	}

	function updatePosts (){

		/* Proteccion de Datos */
		$params = array(
			':idutc' => $_SESSION['idutc'],
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
			':sonido' => $_POST['sonido']
		);

		/* Preparamos el query apartir del array $params*/
		$query ='UPDATE Posts SET
					anio = :anio,
					mes = :mes,
					hora = :hora,
					minuto = :minuto,
					segundo = :segundo,
                    usuario  =:usuario,
                    titulo=:titulo,
                    subtitulo=:subtitulo,
                    icono=icono,
                    texto=:texto,
                    imagen=:imagen,
                    video=:video,
                    sonido=:sonido
				 WHERE idutc= :idutc;
				';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			unset($_SESSION['idutc']);
			$_SESSION['idutc'] = NULL;
			header('Location: viewPosts.php?result=true');
		}else{
			header('Location: editPosts.php?result=false');
		}
	}

	function deletePosts (){

		$idutc = $_GET['id'];

		/* Proteccion de Datos */
		$params = array(
			':id' => $_GET['id'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='DELETE FROM Posts
				 WHERE idutc = :id;';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			header('Location: viewPosts.php?result=true');
		}else{
			header('Location: viewPosts.php?result=false');
		}
	}

?>
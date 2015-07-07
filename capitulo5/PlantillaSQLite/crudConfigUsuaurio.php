<?php
	session_start();
	require_once("install.php");
	/* REQUEST = $_POST $_GET */
	if (!empty($_REQUEST['action'])){
		$accion = $_REQUEST['action'];
		if($accion == 'crear'){
			crearConfigUsuario();
		}else if ($accion == 'ver'){
			verConfigUsuarios();
		}else if ($accion == 'update'){
			updateConfigUsuario();
		}else if ($accion == 'delete'){
			deleteConfigUsuario();
		}

	}


	function crearConfigUsuario(){
		/* Proteccion de Datos */
		$params = array(
			':usuario' => $_POST['usuario'],
			':piel' => $_POST['piel'],
			':respuestas' => $_POST['respuestas'],
			);

		/* Preparamos el query apartir del array $params*/
		$query = 'INSERT INTO Configusuarios
					(usuario, piel, respuestas) 
				VALUES 
                    (:usuario,:piel,:respuestas)';
		/* Ejecutamos el query con los parametros */
		$result = excuteQuery("Usuarios","", $query, $params);
		if ($result > 0){
			header('Location: viewConfigusuarios.php?result=true');
		}else{
			header('Location: addConfigusuarios.php?result=false');
		}
	}					


	function verConfigUsuarios (){
		$query = "SELECT * FROM Configusuarios";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				echo "<tr>";
				echo "    <td>".$value['idconfigusuarios']."</td>";
				echo "    <td>".$value['usuario']."</td>";
				echo "    <td>".$value['piel']."</td>";
				echo "    <td>".$value['respuestas']."</td>";
				echo "</tr>";
			}
		}else{
			echo "No se encontraron resultados";
		}
	}

	function getConfigUsuarios($id){
		$query = "SELECT * FROM ConfigUsuarios WHERE idconfigusuarios = '".$id."'";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				return $value;
			}
		}else{
			return false;
		}
	}

	function updateConfigUsuario (){

		/* Proteccion de Datos */
		$params = array(
			':idconfigusuarios' => $_SESSION['idconfigusuarios'],
			':usuario' => $_POST['usuario'],
			':piel' => $_POST['piel'],
			':respuestas' => $_POST['respuestas']
		);

		/* Preparamos el query apartir del array $params*/
		$query ='UPDATE Configusuarios SET
					usuario = :usuario,
					piel = :piel,
					respuestas = :respuestas
			     WHERE idconfigusuarios = :idconfigusuarios;
				';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			unset($_SESSION['idconfigusuarios']);
			$_SESSION['idconfigusuarios'] = NULL;
			header('Location: viewconfigusuarios.php?result=true');
		}else{
			header('Location: editconfigusuarios.php?result=false');
		}
	}

	function deleteConfigUsuario (){

		$idUser = $_GET['id'];

		/* Proteccion de Datos */
		$params = array(
			':id' => $_GET['id'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='DELETE FROM Configusuarios 
				 WHERE idconfigusuarios = :id;';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			header('Location: viewconfigusuarios.php?result=true');
		}else{
			header('Location: viewconfigusuario.php?result=false');
		}
	}

?>
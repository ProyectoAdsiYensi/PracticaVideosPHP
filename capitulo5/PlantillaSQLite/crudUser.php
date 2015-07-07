<?php
	session_start();
	require_once("install.php");
	/* REQUEST = $_POST $_GET */
	if (!empty($_REQUEST['action'])){
		$accion = $_REQUEST['action'];
		if($accion == 'crear'){
			crearUsuario();
		}else if ($accion == 'ver'){
			verUsuarios();
		}else if ($accion == 'update'){
			updateUser();
		}else if ($accion == 'delete'){
			deleteUser();
		}

	}

	function crearUsuario(){
		var_dump($_POST);
		/* Proteccion de Datos */
		$params = array(
			':usuario' => $_POST['usuario'],
			':contrasena' => $_POST['contrasena'],
			':nombre' => $_POST['nombre'],
			':apellidouno' => $_POST['apellidouno'],
			':apellidodos' => $_POST['apellidodos'],
			':titulo' => $_POST['titulo'],
			':descripcion' => $_POST['descripcion'],
			':foto' => $_POST['foto'],
			':email'	=> $_POST['email']
				
		);

		/* Preparamos el query apartir del array $params*/
		$query = 'INSERT INTO Usuarios 
					(usuario,contrasena, nombre,apellidouno,apellidodos,titulo,descripcion,foto,email) 
				VALUES 
					(:usuario,:contrasena, :nombre,:apellidouno,:apellidodos,:titulo,:descripcion,:foto,:email)';

		/* Ejecutamos el query con los parametros */
		$result = excuteQuery("Usuarios","", $query, $params);
		if ($result > 0){
			header('Location: viewUsers.php?result=true');
		}else{
			header('Location: addUser.php?result=false');
		}
	}

	function verUsuarios (){
		$query = "SELECT * FROM Usuarios";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				echo "<tr>";
				echo "    <td>".$value['idUsuario']."</td>";
				echo "    <td>".$value['usuario']."</td>";
				echo "    <td>".$value['contrasena']."</td>";
				echo "    <td>".$value['nombre']."</td>";
				echo "    <td>".$value['apellidouno']."</td>";
				echo "    <td>".$value['apellidodos']."</td>";
				echo "    <td>".$value['titulo']."</td>";
				echo "    <td>".$value['descripcion']."</td>";
				echo "    <td>".$value['foto']."</td>";
				echo "    <td>".$value['email']."</td>";
							
				echo "</tr>";
			}
		}else{
			echo "No se encontraron resultados";
		}
	}

	function getUser($id){
		$query = "SELECT * FROM Usuarios WHERE idUsuario = '".$id."'";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				return $value;
			}
		}else{
			return false;
		}
	}

	function updateUser (){

		/* Proteccion de Datos */
		$params = array(
			':idUser' => $_SESSION['idUser'],
			':usuario' => $_POST['usuario'],
			':contrasena' => $_POST['contrasena'],
			':nombre' => $_POST['nombre'],
			':apellidouno' => $_POST['apellidouno'],
			':apellidodos' => $_POST['apellidodos'],
			':titulo' => $_POST['titulo'],
			':descripcion' => $_POST['descripcion'],
			':foto' => $_POST['foto'],
			':email'	=> $_POST['email']
			);

		/* Preparamos el query apartir del array $params*/
		$query ='UPDATE Usuarios SET
					usuario = :usuario,
					contrasena= :contrasena,
					nombre = :nombre,
					apellidouno = :apellidouno,
					apellidodos = :apellidodos,  
					titulo = :titulo,
					descripcion= :descripcion,
					foto = :foto,
					email = :email  
				 WHERE idUsuario = :idUser;
				';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			unset($_SESSION['idUser']);
			$_SESSION['idUser'] = NULL;
			header('Location: viewUsers.php?result=true');
		}else{
			header('Location: editUser.php?result=false');
		}
	}

	function deleteUser (){

		$idUser = $_GET['id'];

		/* Proteccion de Datos */
		$params = array(
			':id' => $_GET['id'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='DELETE FROM Usuarios
				 WHERE idUsuario = :id;';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			header('Location: viewUsers.php?result=true');
		}else{
			header('Location: viewUser.php?result=false');
		}
	}

?>
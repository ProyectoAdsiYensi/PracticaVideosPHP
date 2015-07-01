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
		/* Proteccion de Datos */
		$params = array(
			':Usuario' => $_POST['Usuario'],
			':Contrasena' => $_POST['Contrasena'],
			':Nombres' => $_POST['Nombres'],
			':Apellidouno' => $_POST['Apellidouno'],
			':Apellidodos' => $_POST['Apellidodos'],
            ':Titulo' => $_POST['Titulo'],
			':Descripcion' => $_POST['Descripcion'],
            ':foto' => $_POST['foto'],
	 		':WebPersonal' => $_POST['WebPersonal'],
            ':Email' => $_POST['Email']
			);

		/* Preparamos el query apartir del array $params*/
		$query = 'INSERT INTO Usuarios 
					(Usuario, Contrasena, Nombres, Apellidouno, Apellidodos,Titulo,Descripcion,foto,WebPersonal,Email) 
				VALUES 
                    (:Usuario,:Contrasena,:Nombres,:Apellidouno,:Apellidodos,:Titulo,:Descripcion,:foto,:WebPersonal,:Email)';
		/* Ejecutamos el query con los parametros */
		$result = excuteQuery("Usuarios","", $query, $params);
		if ($result > 0){
			//header('Location: viewUsers.php?result=true');
		}else{
			//header('Location: addUser.php?result=false');
		}
	}					


	function verUsuarios (){
		$query = "SELECT * FROM Usuarios";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				echo "<tr>";
				echo "    <td>".$value['idUsuario']."</td>";
				echo "    <td>".$value['Usuario']."</td>";
				echo "    <td>".$value['Contrasena']."</td>";
				echo "    <td>".$value['Nombres']."</td>";
				echo "    <td>".$value['Apellidouno']."</td>";
				echo "    <td>".$value['Apellidodos']."</td>";
				echo "    <td>".$value['Titulo']."</td>";
				echo "    <td>".$value['Descripcion']."</td>";
				echo "    <td>".$value['foto']."</td>";
                echo "    <td>".$value['WebPersonal']."</td>";
				echo "    <td>".$value['Email']."</td>";
				//echo "    <td>".$value['Permisos']."</td>";

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
			':Nombres' => $_POST['Nombres'],
			':Apellidouno' => $_POST['Apellidouno'],
			':Apellidodos' => $_POST['Apellidodos'],
			':Titulo' => $_POST['Titulo'],
			':Descripcion' => $_POST['Descripcion'],
			':foto' => $_POST['foto'],
			':WebPersonal' => $_POST['WebPersonal'],
			':Email' => $_POST['Email'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='UPDATE Usuarios SET
					Nombres = :Nombres,
					Apellidouno = :Apellidouno,
					Apellidodos = :Apellidodos,
					Titulo = :Titulo,
					Descripcion = :Descripcion,  
					foto = :foto,
					WebPersonal = :WebPersonal,
					Email = :Email
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
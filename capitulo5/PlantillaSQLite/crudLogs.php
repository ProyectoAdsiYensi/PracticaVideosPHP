<?php
	session_start();
	require_once("install.php");
	/* REQUEST = $_POST $_GET */
	if (!empty($_REQUEST['action'])){
		$accion = $_REQUEST['action'];
		if($accion == 'crear'){
			crearlogs();
		}else if ($accion == 'ver'){
			verlogs();
		}else if ($accion == 'update'){
			updatelogs();
		}else if ($accion == 'delete'){
			deletelogs();
		}

	}

	function crearlogs(){
		/* Proteccion de Datos */
		$params = array(
			':anio' => $_POST['anio'],
			':mes' => $_POST['mes'],
			':dia' => $_POST['dia'],
			':hora' => $_POST['hora'],
			':minuto' => $_POST['minuto'],
			':segundo' => $_POST['segundo'],
			':ip' => $_POST['ip'],
			':navegador' => $_POST['navegador'],
			':usuario' => $_POST['usuario'],
			':operacion' => $_POST['operacion'],
			 		

		);

		/* Preparamos el query apartir del array $params*/
		$query = 'INSERT INTO 
					Logs (anio,mes,dia,hora,minuto,segundo,ip,navegador,usuario,operacion)
				VALUES
					(:anio,:mes,:dia,:hora,:minuto,:segundo,:ip,:navegador,:usuario,:operacion)';

		/* Ejecutamos el query con los parametros */
		$result = excuteQuery("Usuarios","", $query, $params);
		if ($result > 0){
			header('Location: viewLogs.php?result=true');
		}else{
			header('Location: addLogs.php?result=false');
		}
	}

	function verLogs(){
		$query = "SELECT * FROM Logs";
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
				echo "    <td>".$value['ip']."</td>";
				echo "    <td>".$value['navegador']."</td>";
				echo "    <td>".$value['usuario']."</td>";
				echo "    <td>".$value['operacion']."</td>";
                echo "</tr>";
			}
		}else{
			echo "No se encontraron resultados";
		}
	}

	function getLogs($id){
		$query = "SELECT * FROM Logs WHERE idutc = '".$id."'";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				return $value;
			}
		}else{
			return false;
		}
	}

	function updateLogs (){

		/* Proteccion de Datos */
		$params = array(
			':idutc' => $_SESSION['idutc'],
			':anio' => $_POST['anio'],
			':mes' => $_POST['mes'],
			':dia' => $_POST['dia'],
			':hora' => $_POST['hora'],
			':minuto' => $_POST['minuto'],
			':segundo' => $_POST['segundo'],
			':ip' => $_POST['ip'],
			':navegador' => $_POST['navegador'],
			':usuario' => $_POST['usuario'],
			':operacion' => $_POST['operacion']
			
		);

		/* Preparamos el query apartir del array $params*/
		$query ='UPDATE Posts SET
					anio = :anio,
					mes = :mes,
					hora = :hora,
					minuto = :minuto,
					segundo = :segundo,
                    ip  =:ip,
                    navegador=:navegador,
                    usuario=:usuario,
                    operacion=operacion
				 WHERE idutc= :idutc;
				';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			unset($_SESSION['idutc']);
			$_SESSION['idutc'] = NULL;
			header('Location: viewLogs.php?result=true');
		}else{
			header('Location: editLogs.php?result=false');
		}
	}

	function deleteLogs(){

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
			header('Location: viewLogs.php?result=true');
		}else{
			header('Location: viewLogs.php?result=false');
		}
	}

?>
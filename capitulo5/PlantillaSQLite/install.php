<?php



	function createDB ($nameDB = "Usuarios", $pathDB = ""){
		try {
			/* Creacion de la Base de Datos o Seleccion de la misma*/
		    $db = new PDO("sqlite:".$pathDB.$nameDB.".sqlite"); //Creamos una conexion
		    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    echo "<i class='fa fa-check-square-o'></i> Se ha creado/seleccionado la base de datos correctamente."."<br/>";

		    /* Creacion de la tabla Usuarios */
		    $query = "CREATE TABLE 'Usuarios' (
						'idUsuario'	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
						'Usuario'	TEXT NOT NULL,
						'Contrasena'	TEXT NOT NULL,
						'Nombres'	TEXT NOT NULL,
						'Apellidouno'	TEXT NOT NULL,
						'Apellidodos'	TEXT NOT NULL,
						'Titulo'	TEXT NOT NULL,
						'Descripcion'	TEXT NOT NULL,
						'foto'	TEXT NOT NULL,
						'WebPersonal'	TEXT NOT NULL,
						'Email'	TEXT NOT NULL
					);"; //Creacion del query para crear la tabla.
		    $result = $db->exec($query); //Ejecutamos el query. Se usa exec para todos los casos excepto para los select.
		    echo ($result === false) ? "<i class='fa fa-times-circle'></i> No se pudo crear la Tabla Usuarios."."<br/>" : "<i class='fa fa-check-square-o'></i> Se creo correctamente la Tabla Usuarios."."<br/>";

		    /* Creacion de la tabla Automoviles */
		    $query = "CREATE TABLE `Posts` (
						`idutc`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
						`anio`	INTEGER NOT NULL,
						`mes`	INTEGER NOT NULL,
						`dia`	INTEGER NOT NULL,
						`hora`	INTEGER NOT NULL,
						`minuto` INTEGER NOT NULL,
                        `segundo` INTEGER NOT NULL,
                        `usuario` TEXT NOT NULL,
                        `titulo` INTEGER NOT NULL,
                        `subtitulo` INTEGER NOT NULL,
                        `icono` INTEGER NOT NULL,
                        `texto` INTEGER NOT NULL,
                        `imagen` INTEGER NOT NULL,
                        `video` INTEGER NOT NULL,
                        `sonido` INTEGER NOT NULL

					);";
			$result = $db->exec($query); //Ejecutamos el query. Se usa exec para todos los casos excepto para los select.
			echo ($result === false) ? "<i class='fa fa-times-circle'></i> No se pudo crear la Tabla Posts."."<br/>" : "<i class='fa fa-check-square-o'></i> Se creo correctamente la Tabla Posts."."<br/>";

		    $db = NULL; //Cerramos la conexion a la Base de datos.
		}catch(PDOException $e){
		    echo $e->getMessage();
		}
	}

	/* Funcion para ejecutar querys de tipo Insert, Update, Deleted */
	function excuteQuery ($nameDB = "Usuarios", $pathDB = "", $query, $params=NULL){
		try {
			/* Creacion de la Base de Datos o Seleccion de la misma*/
		    $db = new PDO("sqlite:".$pathDB.$nameDB.".sqlite"); //Creamos una conexion
		    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    if ($params === NULL){
				/* Intentamos Ejecutar el Query */
		    	$result = $db->exec($query);
		    }else{
		    	/* Intentamos Ejecutar el Query */
		    	$cmd = $db->prepare($query);
		    	var_dump($query);
		    	$result = $cmd->execute($params);
		    }

		    $db = NULL; //Cerramos la conexion a la Base de datos.
		    return ($result);
		}catch(PDOException $e){
		    echo $e->getMessage();
		}
	}

	/* Funcion para ejecutar querys de tipo Selects */
	function newQuery ($nameDB = "Usuarios", $pathDB = "", $query){
		try {
			/* Creacion de la Base de Datos o Seleccion de la misma*/
		    $db = new PDO("sqlite:".$pathDB.$nameDB.".sqlite"); //Creamos una conexion
		    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    /* Intentamos Ejecutar el Query */
		    $result = $db->query($query);

		    $db = NULL; //Cerramos la conexion a la Base de datos.
		    return ($result);
		}catch(PDOException $e){
		    echo $e->getMessage();
		}
	}

?>
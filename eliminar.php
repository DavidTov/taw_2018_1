<?php 

	$id = $_GET['var'];

	try{
		include 'db.php'; //Se incluye el archivo de configuración de la BD

		//Consulta sql para insertar los datos ingresados en el formulario.html
		$sql = "DELETE FROM usuarios WHERE id = :id";

		$resultado = $base->prepare($sql);
		//Se pasan los parametros para las consultas preparadas
		$resultado->bindParam(":id",$id);

		//Se ejecuta la consulta
		$resultado->execute();	


		//Se redirige a la página de listar.php
		header("Location: listar.php");


	}catch(Exception $e){
		die("Error " . $e->GetMessage()); //Si hay error en la conexión
	}finally{
		$base = null; // Se libera la memoria del objeto tipo conexion
	}

 ?>
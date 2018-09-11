
<?php 

	$id = $_GET['var'];
	$ban = 0;

	try {
		include "db.php";
		if(!isset($_POST['enviar'])){
			echo "LLene el formulario para editar<br><br>";						
		}else{
			$ban=1;
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$genero = $_POST['genero'];

			//----EDITAR DATOS DEL FORMULARIO.HTML------
			$sql = "UPDATE usuarios
					SET nombre = :nombre, apellido = :apellido, genero = :genero
					WHERE id = :id";

			$resultado = $base->prepare($sql);

			$resultado->bindParam(":nombre",$nombre);
			$resultado->bindParam(":apellido",$apellido);
			$resultado->bindParam(":genero",$genero);
			$resultado->bindParam(":id",$id);

			$resultado->execute();
			//header("Location: listar.php");

		}

		
		
	} catch (Exception $e) {
		die("Error " . $e->GetMessage());
	}finally{
		$base = null;
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title> Editar </title>
</head>
<body>
	<?php 

		if(!$ban){
			echo "<form action='editar.php?var=$id' method='POST' >
		<label> Nombre </label>
		<input type='text' name='nombre' required>
		<br><br>
		<label> apellidos </label>
		<input type='text' name='apellido' required>
		<br><br>
		<label> sexo </label>
		<input type='text' name='genero' required>
		<input type='submit' name='enviar'>
		</form>";
		}

	 ?>
	
</body>
</html>

<?php if($ban) echo " <br><h4><a href='listar.php'> Ver lista </a></h4>"; ?>
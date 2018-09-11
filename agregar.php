<?php 


	

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $genero = $_POST["genero"];

    try{
       include 'db.php';


       //----INSERTAR DATOS DEL FORMULARIO.HTML------

       //Consulta sql para insertar los datos ingresados en el formulario.html
       $sql = "INSERT INTO usuarios(nombre,apellido,genero) VALUES(:nombre,:apellido,:genero)";       

       //Variable donde se almacena el objeto del tipo PDOStatement, es igual al objeto $base llmanado al
       //método prepare el cual recibe la consulta sql.
       $resultado = $base->prepare($sql); //Se prerara la consulta con el método prepare()


       //Se pasan los parametros para las consultas preparadas
       $resultado->bindParam(":nombre",$nombre); 
       $resultado->bindParam(":apellido",$apellido);
       $resultado->bindParam(":genero",$genero);

       //Se ejecuta la consulta
       $resultado->execute();

       echo "Agregado con exito!! <br> <br>";
       echo "Nombre: " . $nombre . " " . $apellido . "<br>Sexo: " . $genero . "<br><br>";

       echo "<a href='listar.php'> Ver lista </a>" . "<br>"; // Link para ver la lista 
       echo "<a href='index.html'> Regresar </a>"; //Link para regresar al formulario principal
    

	 }catch(Exception $e){
	      die('Error ' . $e->GetMessage()); //Si hay error en la conexión
	 }finally{
	      $base=null; // Se libera la memoria del objeto tipo conexion
	 }
 ?>
  
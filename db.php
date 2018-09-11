<?php 
	
	include 'config.php';

	//Se crea un objeto del tipo PDO para la conexión a la BD
	//Se le pasan los parametros de host, nombreBD, nombre usuario y password
	$base = new PDO('mysql:host=localhost; dbname=10_sep;', DB_USER, DB_PASSWORD);       
    
    //Se ejecuta el metodo exec para establecer o especificar el encoding/juego de caracteres
    $base->exec("SET CHARACTER SET utf8");

 ?>
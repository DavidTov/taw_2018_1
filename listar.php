<?php   

    try{
       
       include 'db.php';     

       //----MOSTRAR DATOS DE LA BD EN UNA TABLA------

       //Consulta sql para traer todos los datos de la tabla usuarios
       $sql = "SELECT * FROM usuarios";

       //
       $resultado = $base->prepare($sql);
       $resultado->execute();

?>       
       

 <!DOCTYPE html>
 <html>
 <head>
   <title> Listar </title>
 </head>
 <body>
    <table>
      <head>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Genero</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </head>
      <tbody>
        
          <?php      // Se crea una tabla html y mediante un ciclo recorrer todos los registros que tiene el objeto PDO Statement
                    //  mediante el método fetch(),
            while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
              echo "<tr>";
              $id = $registro["id"]; //Se almacena en $id el name 'id'
              echo "<td>" . $registro["id"]       . "</td>";
              echo "<td>" . $registro["nombre"]   . "</td>";
              echo "<td>" . $registro["apellido"] . "</td>";
              echo "<td>" . $registro["genero"]   . "</td>";
              
              //Se pasa una variable como parametro para ser recibida con el método GET
              echo "<td>" .  "<a href='editar.php?var=$id'>" . "Editar</a>" . "</td>";
              //Se pasa una variable como parametro para ser recibida con el método GET
              echo "<td>" . "<a href='eliminar.php?var=$id'>Eliminar</a>"   . "</td>";
              echo "</tr>";
            }


            //Se cierra el cursor con el método closeCursor
            $resultado->closeCursor();

            }catch(Exception $e){
              die('Error ' . $e->GetMessage());  //Si hay error en la conexión
            }finally{
              $base=null; // Se libera la memoria del objeto tipo conexion
            }
           ?>
        
      </tbody>
    </table>
    <?php echo "<br><br> <a href='index.html'> Ir al formulario </a> "; ?>
 </body>
 </html>
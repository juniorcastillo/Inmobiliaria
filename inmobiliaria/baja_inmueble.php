<!DOCTYPE html>
<!--
 Darle de baja a los alumnos 
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
      <script type="text/javascript">
          
                 
       </script>
    
     <?php
     
      // Conexión a la base de datos
      try {
       $conexion = new PDO("mysql:host=localhost;dbname=inmobiliaria;charset=utf8", "root", "");
       
      } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $e->getMessage());
        
      }
      
      
      
//-------------Elimino el alumno select ------------------------------------------------------//
        $propiedad= $_REQUEST['clave'];
         $consultaEli =("DELETE FROM propiedad WHERE Referencia=$propiedad");
         $conexion->exec($consultaEli);
    
  
      echo '<script type="text/javascript">
                 
                  alert("Eliminacion realizada");
                  window.location="index.php";
                  
            </script>';
        //Cierro la conexion en esta pagina
         $conexion=null;
      
      ?>
  </body>
</html>

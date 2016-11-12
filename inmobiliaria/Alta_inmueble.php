<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
      // Conexión a la base de datos
      try {
       $conexion = new PDO("mysql:host=localhost;dbname=inmobiliaria;charset=utf8", "root", "");
      } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $e->getMessage());
      }
      
      // Comprueba si ya existe un cliente con el DNI introducido
      $consulta = $conexion->query("SELECT Referencia FROM propiedad WHERE Referencia =".$_POST['clave']);
      
     ///////----------Compruebo que la clave no exista --///////////////////// 
      
      if ($consulta->rowCount() > 0) {
      ?>
      <script>
        alert("Esta clave existe , introduzca otra clave");
        window.location="index.php";
      </script>
      
      <?php
      } else {
       //---------------------Añado el inmuble----------------------------------//
        
        $insercion = "INSERT INTO propiedad (Referencia, FechaAlta,Tipo,Operacion,Provincia ,Superficie,PrecioVenta,FechaVenta,Vendedor) "
         . "VALUES ('$_POST[clave]','$_POST[fechaalta] ','$_POST[tipo]','$_POST[operacion] ','$_POST[provincia]','$_POST[superficie]','$_POST[precioventa]','$_POST[fechaventa] ','$_POST[vendedor]')";
        //echo $insercion;
         $conexion->exec($insercion);
     
        echo "<script>
          alert('El alumno se a añadido correctamente');
          window.location='index.php';
         </script> ";
       // $conexion=null;
      }
    ?>
  </body>
</html>

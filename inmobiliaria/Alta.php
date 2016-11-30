<?php
session_start();
/*************************************************************************
    @Junior Miguel Castillo santana
   
 *************************************************************************/
$_SESSION['index'] = true;
if(!isset($_SESSION['accesopermitido'])){
  
  $_SESSION['accesopermitido']=false;
}
//-----------Compruebo si han iniciado session -------------------//
if ($_SESSION['accesopermitido'] == true) {
  ?>




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
      die("Error: " . $e->getMessage());
    }
    if (isset($_REQUEST['altaInmueble'])) {//Si quiero añadir un inmueble   
      $consulta = $conexion->query("SELECT Referencia FROM propiedad WHERE Referencia =" . $_POST['clave']);

      ///////----------Compruebo que la clave no exista --///////////////////// 
      // Comprueba si ya existe un cliente con el DNI introducido
      if ($consulta->rowCount() > 0) {//Si hay claves parecidas no la agrega
        ?>
        <script>
          alert("Esta clave existe , introduzca otra clave");
          window.location = "index.php";
        </script>

        <?php
       
      } else {//Si no hay claves
        //---------------------Añado el inmuble----------------------------------//
        
      $img=$_FILES["imagen"]["name"];
      move_uploaded_file($_FILES["imagen"]["tmp_name"], "interfaz_usuario/imagen/".$img );
     
        $insercion = "INSERT INTO propiedad (Referencia, FechaAlta,Tipo,Operacion,Provincia ,Superficie,PrecioVenta,FechaVenta,Vendedor,Imagen) "
                . "VALUES ('$_POST[clave]','$_POST[fechaalta] ','$_POST[tipo]','$_POST[operacion] ','$_POST[provincia]','$_POST[superficie]','$_POST[precioventa]','$_POST[fechaventa] ','$_POST[vendedor] ','interfaz_usuario/imagen/$img')";
       
        

//echo $insercion;
        $conexion->exec($insercion);

        echo "<script>
            alert('El inmueble se a añadido correctamente');
            window.location='index.php';
           </script> ";
        // $conexion=null;
      }
    } else if (isset($_REQUEST['altaVendedor'])) {//Si lo que quiero añadir es un vendedor   
      $consulta = $conexion->query("SELECT ClaveVendedor FROM vendedor WHERE ClaveVendedor =" . $_POST['clave']);

      if ($consulta->rowCount() > 0) {//Si hay claves parecidas no la agrega
        ?>
        <script>
          alert("Esta clave existe , introduzca otra clave");
          window.location = "Vendedor.php";
        </script>

        <?php
      } else {//Si no hay claves 
        $insercion = "INSERT INTO vendedor (ClaveVendedor,Nombre,DNI,Telefono,Direccion) "
                . "VALUES ('$_POST[clave]','$_POST[nombre] ','$_POST[dni]','$_POST[telefono] ','$_POST[direccion]')";

        $conexion->exec($insercion);

        echo "<script>
            alert('El Vendedor  $_POST[nombre] se a añadido correctamente');
            window.location='Vendedor.php';
           </script> ";
      }
    }
    ?>
  </body>
</html>
<?php
}else{
 //--------------Si no ha iniciado session se envia a la pagina para que inicie session ------------------------- //
  echo '<script type="text/javascript">
           alert("iniciar sesion");
           window.location="control_Usuario.php";
          </script>'; 
  
  
}

?>
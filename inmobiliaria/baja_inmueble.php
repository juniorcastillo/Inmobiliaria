<?php
session_start();
$_SESSION['index'] = true;
if(!isset($_SESSION['accesopermitido'])){
  
  $_SESSION['accesopermitido']=false;
}
//-----------Compruebo si han iniciado session -------------------//
if ($_SESSION['accesopermitido'] == true) {
  ?>




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
      
    //Guardo la accion que elige el administrador  
      $accion= $_REQUEST['accion'];
//-------------Elimino el inmueble select ------------------------------------------------------//
     if($accion=='eliminarInmueble'){
        $propiedad= $_REQUEST['clave'];
         $consultaEli =("DELETE FROM propiedad WHERE Referencia=$propiedad");
         $conexion->exec($consultaEli);
    
  
      echo '<script type="text/javascript">
                 
                  alert("Eliminacion realizada");
                  window.location="index.php";
                  
            </script>';
        //Cierro la conexion en esta pagina
         $conexion=null;
     }else if($accion=='eliminarVendedor'){
        $vendedor= $_REQUEST['clave'];
         $consultaEli =("DELETE FROM vendedor WHERE ClaveVendedor=$vendedor");
         $conexion->exec($consultaEli);
    
  
      echo '<script type="text/javascript">
                 
                  alert("Eliminacion realizada");
                  window.location="Vendedor.php";
                  
            </script>';
       
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
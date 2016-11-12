<?php
session_start();

//-----------Compruebo si han iniciado session -------------------//
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
    <title>Modificacion de inmueble</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link href="Style/Css.css" rel="stylesheet">
      <!-- librerías opcionales que activan el soporte de HTML5 para IE8 --> 
      <!--[if lt IE 9]> <script src="../../assets/js/html5shiv.js"></script> <script src="../../assets/js/respond.min.js">
      </script> <![endif]-->
      
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
    
      $claveCambio=$_REQUEST['modificar'];
      if (isset($_REQUEST['accionModificar'])) {
          
            $modificacion = "UPDATE propiedad SET  Referencia=\"$_POST[modif]\",FechaAlta=\"$_POST[fechaalta]\",Tipo=\"$_POST[tipo]\",FechaAlta=\"$_POST[fechaalta]\",Operacion=\"$_POST[operacion]\",Provincia=\"$_POST[provincia]\",Superficie=\"$_POST[superficie]\",PrecioVenta=\"$_POST[precioventa]\", FechaVenta=\"$_POST[fechaventa]\",Vendedor=\"$_POST[vendedor]\" WHERE Referencia=\"$_POST[modif]\"";

            //echo $insercion;*/
            $conexion->exec($modificacion);
            
          echo '<script type="text/javascript">
                 
                  alert("Modificacion realizada");
                  window.location="index.php";
                  
            </script>';
        //Cierro la conexion en esta pagina
         $conexion=null;
          }
  
    ?>
    <h1>Modificacion</h1>
    <table id="vendedorTabla">
      
      <tr><form action="#" method="post">
        <td>Referencia <input type="number"  size="1"  min="1" max="300" value="<?= $claveCambio?>"  disabled></td>
             <td>Fecha Alta <input type="date" name="fechaalta" required></td>
              <input type="hidden" name="modif" value="<?=$claveCambio?>">
              <td>Tipo<input type="text" name="tipo" size="10"   required ></td>
              <td>Operacion<input type="text" name="operacion" size="10"  required ></td>
              <td> Provincia <input type="text" name="provincia" size="10" required></td>
              <td> Superficie <input type="number" name="superficie" size="10" min="100" max="10000" required></td>
              <td> Precio Venta <input type="number" name="precioventa" size="2" min="100" max="1000000" required></td>
              <td> Fecha Venta<input type="date" name="fechaventa" required></td>
              <td> Vendedor <input type="number" name="vendedor" size="1"  min="1" max="3"  required></td>
             
              <td><button type="submit" name="accionModificar"  class="btn btn-default">Modificar</button>
                
             
             </form></td></tr>
             
        </table>
         
 
  </body>
</html>

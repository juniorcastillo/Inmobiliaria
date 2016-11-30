<?php
session_start();
/* * ***********************************************************************
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * *********************************************************************** */
$_SESSION['index'] = true;

if (!isset($_SESSION['accesopermitido'])) {

  $_SESSION['accesopermitido'] = false;
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
      <title>Modificacion de inmueble</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
      $claveCambio = $_REQUEST['modificar']; //Clave de la propiedad
      //Consulta para obtener los datos de la propiedad
      $datosMod = $conexion->query("SELECT * FROM propiedad where Referencia= $claveCambio ");

      $accionM = $_REQUEST['accion'];
      if ($accionM == "modificarInmueble") {
        if (isset($_REQUEST['modif'])) {
          $modificacion = "UPDATE propiedad SET  Referencia=\"$_POST[modif]\",FechaAlta=\"$_POST[fechaalta]\",Tipo=\"$_POST[tipo]\",FechaAlta=\"$_POST[fechaalta]\",Operacion=\"$_POST[operacion]\",Provincia=\"$_POST[provincia]\",Superficie=\"$_POST[superficie]\",PrecioVenta=\"$_POST[precioventa]\", FechaVenta=\"$_POST[fechaventa]\",Vendedor=\"$_POST[vendedor]\" WHERE Referencia=\"$_POST[modif]\"";

          //echo $insercion;*/
          $conexion->exec($modificacion);

          echo '<script type="text/javascript">
                 
                  alert("Modificacion realizada");
                  window.location="index.php";
                  
            </script>';
          //Cierro la conexion en esta pagina
          $conexion = null;
        }
        ?>
        <h1>Modificacion</h1>
        <table id="tableModi">
          <?php
          while ($casa = $datosMod->fetchObject()) {
            ?>




            <tr><form action="#" method="post">
              <td>Referencia <input type="number"  size="1"  min="1" max="300" value="<?= $claveCambio ?>"  disabled></td>
              <td>Fecha Alta <input type="date" name="fechaalta"  value="<?= $casa->FechaAlta ?>"></td>
              <input type="hidden" name="modif" value="<?= $claveCambio ?>">
              <td>Tipo<input type="text" name="tipo"  value="<?= $casa->Tipo ?>" size="10"   ></td>
              <td>Operacion<input type="text" name="operacion"  value="<?= $casa->Operacion ?>" size="10"  ></td>
              <td> Provincia <input type="text" name="provincia"   value="<?= $casa->Provincia ?>" size="10" ></td>
              <td> Superficie <input type="number" name="superficie"  value="<?= $casa->Superficie ?>" size="10" min="100" max="10000" ></td>
              <td> Precio Venta <input type="number" name="precioventa"  value="<?= $casa->PrecioVenta ?>" size="2" min="100" max="1000000" ></td>
              <td> Fecha Venta<input type="date" name="fechaventa"   value="<?= $casa->FechaVenta ?>" ></td>
              <td> Vendedor <input type="number" name="vendedor"  value="<?= $casa->Vendedor ?>" size="1"  min="1" max="3"></td>

              <td><button type="submit" name="accionModificar"  class="btn btn-default">Modificar</button>


            </form></td></tr>

      </table>
      <?php
    }
  } else if ($accionM == "modificarVendedor") {
    if (isset($_REQUEST['modif'])) {
      $modificacion = "UPDATE vendedor SET  ClaveVendedor=\"$_POST[modif]\",Nombre=\"$_POST[nombre]\",DNI=\"$_POST[dni]\",Telefono=\"$_POST[telefono]\",Direccion=\"$_POST[direccion]\" WHERE ClaveVendedor=\"$_POST[modif]\"";

      //echo $insercion;*/
      $conexion->exec($modificacion);

      echo '<script type="text/javascript">
                 
                  alert("Modificacion Del vendedor realizada");
                  window.location="Vendedor.php";
                  
            </script>';
      //Cierro la conexion en esta pagina
      $conexion = null;
    }
    ?>
    <h1>Modificacion del vendedor</h1>
    <table id="vendedorTabla">

      <tr><form action="#" method="post">
        <td>Codigo <input type="number"  size="1"  min="1" max="300" value="<?= $claveCambio ?>"  disabled></td>
        <td>Nombre<input type="text" name="nombre" required></td>
        <input type="hidden" name="modif" value="<?= $claveCambio ?>">
        <td>DNI<input type="text" name="dni" size="10"   required ></td>
        <td>Telefono<input type="text" name="telefono" size="10"  required ></td>
        <td>Direccion<input type="text" name="direccion" size="20" required></td>

        <td><button type="submit" name="accionModificar"  class="btn btn-default">Modificar</button>


      </form></td></tr>

    </table>
    <?php
  }
  ?> 
  </body>
  </html>
  <?php
} else {
  //--------------Si no ha iniciado session se envia a la pagina para que inicie session ------------------------- //
  echo '<script type="text/javascript">
           alert("iniciar sesion");
           window.location="control_Usuario.php";
          </script>';
}
?>
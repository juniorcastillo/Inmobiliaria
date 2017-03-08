<<<<<<< HEAD
 <?php header("Location: Controlador/index.php");
=======
<?php
session_start();

/* * ***********************************************************************
  @Junior Miguel Castillo santana

 * *********************************************************************** */


$CuentaVendedor = " ";
$contador = 0;
$_SESSION['index'] = true;

if (!isset($_SESSION['accesopermitido'])) {

  $_SESSION['accesopermitido'] = false;
}
//-----------Compruebo si han iniciado session -------------------//
if ($_SESSION['accesopermitido'] == true) {
  ?>

  <!DOCTYPE html>

  <html>
    <head>
      <meta charset="UTF-8">

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <link href="Style_Admin/Css.css" rel="stylesheet">
      <!-- librerías opcionales que activan el soporte de HTML5 para IE8 --> 
      <!--[if lt IE 9]> <script src="../../assets/js/html5shiv.js"></script> <script src="../../assets/js/respond.min.js">
      </script> <![endif]-->
    </head>
    <body>
      <div id="salir"> <a href="interfaz_usuario/index.php"><img src="interfaz_usuario/imagen/salir.png" alt="Smiley face" height="45" width="69" style="border-radius: 25px;"></a></div>

      <?php
     // Conexión a la base de datos
      require_once 'Modelo/Conectar.php';
      $conexion = Inmobiliaria::conectar();

      $consulta = $conexion->query("SELECT * FROM propiedad order by 1");
      ?>
      <div class="table-responsive">
        <h1>Base de Datos inmobiliaria</h1>
        <table border="1">
          <tr>
            <th>Referencia</th>
            <th>Fecha Alta</th>
            <th>Tipo</th>
            <th>Operacion</th>
            <th>Provincia</th>
            <th>Superficie</th> 
            <th>Precio Venta</th>
            <th>Fecha Venta</th>
            <th><a href="Vendedor.php">Vendedor</a></th>
            <th>Imagen</th>
            <th colspan="2">Funciones de Admin</th>



          </tr>

          <?php
          while ($casa = $consulta->fetchObject()) {
            ?>
            <tr>
              <td><?= $casa->Referencia ?></td>
              <td><?= $casa->FechaAlta ?></td>
              <td><?= $casa->Tipo ?></td>
              <td><?= $casa->Operacion ?></td>
              <td><?= $casa->Provincia ?></td>
              <td><?= $casa->Superficie ?></td>
              <td><?= $casa->PrecioVenta ?></td>
              <td><?= $casa->FechaVenta ?></td>
              <td><?= $casa->Vendedor ?></td>
              <td> <img  src="<?= $casa->Imagen ?>" alt="casa" width="70"  height="40"></td>

              <!--*********************** Elimino jr estudiantes ********************************-->  

              <td><form action="baja_inmueble.php" method="GET">
                  <input type="hidden"  name="clave" value="<?= $casa->Referencia ?>" >
                  <input type="hidden"  name="accion" value="eliminarInmueble" >
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
              </td>
              <td><form action="Modificacion.php" method="GET">
                  <input type="hidden"  name="modificar" value="<?= $casa->Referencia ?>" >
                  <input type="hidden"  name="accion" value="modificarInmueble" >
                  <button type="submit" class="btn btn-warning">Modificar</button>
                </form>
              </td>
            </tr>
            <?php
          }
          ?>

          <!-- *********************** Añado estudiantes nuevos jr************************* -->  

          <tr><form action="Alta.php" enctype="multipart/form-data" method="post">

            <td>Referencia <input type="number" name="clave" size="1"  min="1" max="300" required ></td>
            <td>Fecha Alta <input type="date" name="fechaalta" required></td>
            <td>Tipo<input type="text" name="tipo" size="10"   required ></td>
            <td>Operacion<input type="text" name="operacion" size="10"  required ></td>
            <td> Provincia <input type="text" name="provincia" size="10" required></td>
            <td> Superficie <input type="number" name="superficie" size="10" min="100" max="10000" required></td>
            <td> Precio Venta <input type="number" name="precioventa" size="2" min="100" max="1000000" required></td>
            <td> Fecha Venta<input type="date" name="fechaventa" required></td>


            <td>
              <?php
              //Saco las cantidad de vendedores que hay                       
              $CuentaVendedor = $conexion->query("SELECT * FROM vendedor");
              while ($casa = $CuentaVendedor->fetchObject()) {
                $contador+=1;
              }
              ?>

              Vendedor <br><input type="number" name="vendedor" size="1"  min="1" max="<?= $contador ?>"  required></td>
            <td><input type="file"  name="imagen" class="inputfile"></td>
            <td ><button type="submit"  name="altaInmueble" class="btn btn-success" width="160">Añadir</button>
          </form></td></tr>

        </table>
        <br>
        <!--Número de clientes: // $consulta->rowCount()?>-->

      </div>
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
>>>>>>> origin/master

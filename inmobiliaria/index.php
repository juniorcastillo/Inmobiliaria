<?php
session_start();
$_SESSION['index'] = true;
//-----------Compruebo si han iniciado session -------------------//
if ($_SESSION['accesopermitido'] == true) {
  ?>
  <!DOCTYPE html>

  <html>
    <head>
      <meta charset="UTF-8">

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
              <!--*********************** Elimino jr estudiantes ********************************-->  

              <td><form action="baja_inmueble.php" method="GET">
                  <input type="hidden"  name="clave" value="<?= $casa->Referencia ?>" >
                  <button type="submit" class="btn btn-default">Eliminar</button>
                </form>
              </td>
              <td><form action="Modificacion.php" method="GET">
                  <input type="hidden"  name="modificar" value="<?= $casa->Referencia ?>" >
                  <button type="submit" class="btn btn-default">Modificar</button>
                </form>
              </td>
            </tr>
            <?php
          }
        
          ?>

          <!-- *********************** Añado estudiantes nuevos jr************************* -->  

          <tr><form action="Alta_inmueble.php" method="post">
            <td>Referencia <input type="number" name="clave" size="1"  min="1" max="300" required ></td>
            <td>Fecha Alta <input type="date" name="fechaalta" required></td>
            <td>Tipo<input type="text" name="tipo" size="10"   required ></td>
            <td>Operacion<input type="text" name="operacion" size="10"  required ></td>
            <td> Provincia <input type="text" name="provincia" size="10" required></td>
            <td> Superficie <input type="number" name="superficie" size="10" min="100" max="10000" required></td>
            <td> Precio Venta <input type="number" name="precioventa" size="2" min="100" max="1000000" required></td>
            <td> Fecha Venta<input type="date" name="fechaventa" required></td>
            <td> Vendedor <br><input type="number" name="vendedor" size="1"  min="1" max="3"  required></td>

            <td><button type="submit" class="btn btn-default">Añadir</button>
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
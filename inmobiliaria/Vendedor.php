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
    <title>Datos Vendedor</title>
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

    $consulta = $conexion->query("SELECT * FROM vendedor order by 1");
    ?>
    <div class="table-responsive">
      <h1>Base de Datos inmobiliaria</h1>
      <table id="vendedorTabla"  border="1">
        <tr>
          <th>Codigo</th>
          <th>Nombre Vendedor</th>
          <th>DNI</th>
          <th>Telefono</th>
          <th>Direccion</th>




        </tr>

<?php
while ($InfVendedor = $consulta->fetchObject()) {
  ?>
          <tr>
            <td><?= $InfVendedor->ClaveVendedor ?></td>
            <td><?= $InfVendedor->Nombre ?></td>
            <td><?= $InfVendedor->DNI ?></td>
            <td><?= $InfVendedor->Telefono ?></td>
            <td><?= $InfVendedor->Direccion ?></td>
            <td><form action="baja_inmueble.php" method="GET">
                <input type="hidden"  name="clave" value="<?= $InfVendedor->ClaveVendedor ?>" >
                <input type="hidden"  name="accion" value="eliminarVendedor" >
                <button type="submit" class="btn btn-danger">Eliminar</button>
              </form>
            </td>
            <td><form action="Modificacion.php" method="GET">
                <input type="hidden"  name="modificar" value="<?= $InfVendedor->ClaveVendedor ?>" >
                <input type="hidden"  name="accion" value="modificarVendedor" >
                <button type="submit" class="btn btn-warning">Modificar</button>
              </form>
            </td>


          </tr>

  <?php
}
?>
        <tr><form action="Alta.php" method="post">
          <td>Codigo <input type="number" name="clave"  size="1"  min="1" max="300" required></td>
          <td>Nombre<input type="text" name="nombre" required></td>
          <td>DNI<input type="text" name="dni" size="10"   required ></td>
          <td>Telefono<input type="tel" name="telefono" size="10"  required ></td>
          <td>Direccion<input type="text" name="direccion" size="20" required></td>
          <td><button type="submit" name="altaVendedor"  class="btn btn-success">Añadir</button>


        </form></td></tr>
      </table>
      <form action="index.php" method="post">
          <button type="submit" regresar class="btn btn-success">
            <img src="img/regresar.png" alt="Regresar" height="42" width="102">
          </button>
       </form>
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
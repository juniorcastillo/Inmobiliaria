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
        <table id="vendedorTabla">
          <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Telefono</th>
            <th>Direccion</th>
            



          </tr>

          <?php
          while ($InfVendedor= $consulta->fetchObject()) {
            ?>
            <tr>
              <td><?= $InfVendedor->ClaveVendedor ?></td>
              <td><?= $InfVendedor->Nombre ?></td>
              <td><?= $InfVendedor->DNI ?></td>
              <td><?= $InfVendedor->Telefono ?></td>
              <td><?= $InfVendedor->Direccion?></td></tr>
           
              <?php
             }
              ?>
        </table>
  </body>
</html>

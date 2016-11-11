<?php
session_start();
$_SESSION['pagProfesor'] = true;
//-----------Compruebo si han iniciado session -------------------//
if ($_SESSION['accesopermitido'] == true) {
  ?>
  <!DOCTYPE html>

  <html>
    <head>
      <meta charset="UTF-8">
      <link href="Style/Css.css" rel="stylesheet">
    </head>
    <body>
      <div id="contenedor">
        <h1>Gestion de alumnos</h1>
  
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
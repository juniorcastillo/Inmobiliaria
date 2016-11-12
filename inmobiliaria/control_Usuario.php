<?php
session_start();
//--------------------------- Conexión a la base de datos ----------------------------------------------------
try {
  $conexion = new PDO("mysql:host=localhost;dbname=escuela;charset=utf8", "root", "");
} catch (PDOException $e) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die("Error: " . $e->getMessage());
}
//Consulta a la base de datos
$claves_profesores = $conexion->query("SELECT nombre ,contraseña FROM profesores order by 1");
$_SESSION['accesopermitido'] = false;
if (!isset($_SESSION['contadoracceso'])) {





  $_SESSION['admin'] = 1234;
  $_SESSION['contadoracceso'] = 0;
  $_SESSION['user'] = "administrador";
  $_SESSION['mal'] = true;
}
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link href="Style/Css.css" rel="stylesheet">
      <!-- librerías opcionales que activan el soporte de HTML5 para IE8 --> 
      <!--[if lt IE 9]> <script src="../../assets/js/html5shiv.js"></script> <script src="../../assets/js/respond.min.js">
      </script> <![endif]-->
    </head>
    <style>

      *{
        margin: 0xp;
        padding: 0px;
      }
      body{
        background-color: aqua;
      }
      div{
        background-color:#ccccff; 
        width: 450px;
        border:1px aqua solid;
        margin-left: 32%;
        margin-top: 10%;
        text-align: center;  

      }



    </style>
    <?php
    //No entra si la contraseña no se ha enviado  
    if (isset($_REQUEST['clave'])) {
      $_SESSION['contadoracceso'] += 1;
      $usuariointro = $_REQUEST['usuario'];
      $claveintro = $_REQUEST['clave'];

      //**********************************************************************************************//     
      //-----------------*****Compruebo que la clave y el usuario son correcto*****-------------------//
      //**********************************************************************************************//  
      //
        
//------Compruebo las claves de los profesores que estan registrados y sus nombres y si son correctos entro como userP -------//


      while ($profe = $claves_profesores->fetchObject()) {

        if (($claveintro == $profe->nombre) && ($usuariointro == $profe->contraseña)) {

          $_SESSION['accesopermitido'] = true;
          $_SESSION['mal'] ==false; //Comprueba si esta mala la contraeña
          //----------------Envio a las personas a las pagina de inicio --------------//
          if ($_SESSION['pagProfesor'] == true) {
            echo '<script type="text/javascript">
            
                      alert("Bienvenido '. $profe->nombre. ' ");
                      window.location="index.php";
                      
              </script>';
          }
        }
        
      }
    
  //-----------------Miro si es el administrador que esta inciando sesion---------//
      
    if (($claveintro == $_SESSION['admin']) && ($usuariointro == $_SESSION['user'])) {

      $_SESSION['accesopermitido'] = true;
      $_SESSION['mal'] == false; //Comprueba si esta mala la contraeña
      //----------------Envio a las personas a las pagina de inicio --------------//
      if ($_SESSION['index'] == true) {
        echo '<script type="text/javascript">
            
                      alert("Has iniciado sesion correctamente");
                      window.location="index.php";
                      
              </script>';
      }
    }
    if (!$_SESSION['mal'] == true) {
      echo '<h1>Contraseña incorrecta</h1>';
    }

    if (isset($_REQUEST['cerrar'])) {


      session_destroy();
      header("refresh: 0;"); // refresca la página
     }
  }
    ?>
  </head>
  <body>
    <?php
    if ($_SESSION['accesopermitido'] == false) {
      ?>
      <div>
        <h1>Iniciar sesion</h1>
        <form action="#" method="GET">

          <input type="text" name="usuario" placeholder="Usuario" autofocus required><br> 
          <input type="password" name="clave"  id="ejemplo_password_1" placeholder="Contraseña" required><br>   
          <button type="submit" class="btn btn-default">Enviar</button>

        </form>   
  <?php
}
?>
      <br><form action="#" method="GET">  

        <button name="cerrar" > close session</button>     

      </form>
    </div>
  </body>
</html>

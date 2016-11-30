<?php
session_start();

/* * ***********************************************************************
 *    @Junior Miguel Castillo santana                                    *
 *                                                                       *   
 * *********************************************************************** */

//--------------------------- Conexión a la base de datos  ----------------------------------------------------
try {
  $conexion = new PDO("mysql:host=localhost;dbname=inmobiliaria;charset=utf8", "root", "");
} catch (PDOException $e) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die("Error: " . $e->getMessage());
}
//Consulta a la base de datos
$usuario = $conexion->query("SELECT * FROM control_acceso order by 1");




//**********************Cierro la sesion*******************************************//

if (isset($_REQUEST['cerrar'])) {
  session_destroy();
  echo '<script type="text/javascript">                
                  alert("Sesion cerrada");
            </script>';

  echo '<div class="alert alert-success" class="Centrado">
                  <strong>Bye, Siempre seras Bienvenido!</strong></div>'
  . '<script type="text/javascript"> function redireccionar(){window.location="interfaz_usuario/index.php";}'
  . 'setTimeout ("redireccionar()", 2000); //tiempo expresado en milisegundos </script> ';
}
//*************Inicializo variables de sesiones********************************************// 
if (!isset($_SESSION['accesopermitido'])) {
  $_SESSION['accesopermitido'] = false;
}

if (!isset($_SESSION['contadoracceso'])) {
  $_SESSION['contadoracceso'] = 0;
  $_SESSION['mal'] = true;
}
if (!isset($_SESSION['index'])) {
  $_SESSION['index'] = false;
}
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

    <style>
      body{


        background-image: url(http://www.jonaga.com/imagenes/fondo%20pagina%20fijo.jpg);
      }

    </style>
  </head>
<?php
//No entra si la contraseña no se ha enviado  
if (isset($_REQUEST['clave'])) {
  $_SESSION['contadoracceso'] += 1;
  $usuariointro = $_REQUEST['usuario'];
  $claveintro = $_REQUEST['clave'];

  //**********************************************************************************************//     
  //-----------------*****Compruebo que la clave y el usuario son correcto*****-------------------//
  //**********************************************************************************************//  
//------Compruebo las claves de los profesores que estan registrados @JR y sus nombres y si son correctos entro como userP -------//


  while ($login = $usuario->fetchObject()) {

    if (($usuariointro == $login->Usuario) && ($claveintro == $login->Contraseña) && ("admin" == $login->Rol)) {
      $_SESSION['sesisonUser'] = true;
      $_SESSION['mal'] = false;
      $_SESSION['accesopermitido'] = true;
      // $_SESSION['mal'] ==false; //Comprueba si esta mala la contraeña
      //----------------Envio a las personas a las pagina de inicio --------------//
      if ($_SESSION['index'] == true) {
        echo '<div class="alert alert-success" class="Centrado">
                  <strong>Bienvenido!</strong> ' . $login->Usuario . ' </div>' .
        header("refresh:5; url=index.php");
        ;
      } else {
        $_SESSION['sesisonUser'] = true;
        $_SESSION['mal'] = false; //booleana que comprueba que la contraseña es buena o mala
        echo '<div class="alert alert-success" class="Centrado">
               <strong>Bienvenido!</strong> ' . $login->Usuario . ' </div>'
        . '<script type="text/javascript"> function redireccionar(){window.location="index.php";}'
        . 'setTimeout ("redireccionar()", 5000); //tiempo expresado en milisegundos </script> ';
      }//cierro el else 
    } else if (($usuariointro == $login->Usuario) && ($claveintro == $login->Contraseña) && ("user" == $login->Rol)) {
      $_SESSION['accesopermitido'] = true;
      $_SESSION['sesisonUser'] = true;
      $_SESSION['mal'] = false;
      echo '<div class="alert alert-success" class="Centrado">
              <strong>Bienvenido!</strong> ' . $login->Usuario . ' </div>'
      . '<script type="text/javascript"> function redireccionar(){window.location="interfaz_usuario/index.php";}'
      . 'setTimeout ("redireccionar()", 5000); //tiempo expresado en milisegundos </script> ';
    }
  }//cierro el while
  if ($_SESSION['mal']) {
    echo '<script>
            alert("Usuario o Contraseña Incorrecto");
         
         </script>';
  }
}//cierro el JRif principal
?>
</head>
<body>
  <?php
  if ($_SESSION['accesopermitido'] == false) {
    ?>
    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Inmobiliaria Castillo</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-6">
              <div class="well">
                <form id="loginForm" method="POST" action="#" >
                  <div class="form-group">
                    <label for="username" class="control-label">Username</label>
                    <input type="email" class="form-control"  id="username" name="usuario" required   title="Please enter you username" placeholder="example@gmail.com"  >
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" class="form-control" id="password" name="clave"   required title="Please enter your password"  >
                    <span class="help-block"></span>
                  </div>
                  <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember" id="remember"> Remember login
                    </label>
                    <p class="help-block">(if this is a private computer)</p>
                  </div>
                  <input type="submit" class="btn btn-success btn-block" value="Iniciar"/>
                  <a href="#" class="btn btn-default btn-block">Help to login</a>
                </form>
              </div>
            </div>
            <div class="col-xs-6">
              <p class="lead">Register now for <span class="text-success">FREE</span></p>
              <ul class="list-unstyled" style="line-height: 2">
                <li><span class="fa fa-check text-success"></span> See all your orders</li>
                <li><span class="fa fa-check text-success"></span> Fast re-order</li>
                <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                <li><a href="#"><u>Read more</u></a></li>
              </ul>
              <p><a href="#" class="btn btn-info btn-block">Yes please, register now!</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php
}//Si no ha iniciado sesion @JR(Es el cierre del if)
?>


</body>
</html>

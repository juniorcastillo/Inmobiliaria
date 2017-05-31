<?php

error_reporting(E_ALL ^ E_NOTICE); //Que me notifique de todos los errores menso de la notice
require_once '../Modelo/Usuario.php';
 $validar = Usuario::validarUsuario($_REQUEST['emailNuevoUsuario']);
//echo $_GET['nombreNuevoUsuario'] . " ESte es el Rol del usuario";
$fecha = date("Y") . "-" . date("m") . "-" . date("d");

if (isset($_GET['rolNuevoUsuario'])) {
    $contrase=$_REQUEST['contrasenaNuevoUsuario'];
    $hash= password_hash($contrase, PASSWORD_DEFAULT);
    $Anadir_usuario = new Usuario("", $_REQUEST['nombreNuevoUsuario'], $hash, $_REQUEST['direccionNuevoUsuario'], $_REQUEST['telefonoNuevoUsuario'], $_REQUEST['fechaNuevoUsuario'], $_REQUEST['emailNuevoUsuario'], $_REQUEST['rolNuevoUsuario']);
    $Anadir_usuario->insertUsuario();
} else {
    $rol = 2;

   
    if ($validar == 1) {

        echo "<b>El email " . $_REQUEST['emailNuevoUsuario'] . " existe</b>";
    } else {
        $contrase=$_REQUEST['contrasenaNuevoUsuario'];
        $hash= password_hash($contrase, PASSWORD_DEFAULT);
        echo "exito";
        $Anadir_usuario = new Usuario("", $_REQUEST['nombreNuevoUsuario'], $hash, $_REQUEST['direccionNuevoUsuario'], $_REQUEST['telefonoNuevoUsuario'],$fecha, $_REQUEST['emailNuevoUsuario'], $rol);
        $Anadir_usuario->insertUsuario();
    }
}


<?php
//error_reporting(E_ALL ^ E_NOTICE);//Que me notifique de todos los errores menso de la notice
require_once '../Modelo/Usuario.php';

echo $_GET['rolNuevoUsuario'] . " ESte es el Rol del usuario";
$Anadir_usuario = new Usuario("",$_GET['nombreNuevoUsuario'],$_GET['contrasenaNuevoUsuario'],$_GET['direccionNuevoUsuario'],$_GET['telefonoNuevoUsuario'],$_GET['fechaNuevoUsuario'],$_GET['emailNuevoUsuario'],$_GET['rolNuevoUsuario']);
$Anadir_usuario->insertUsuario();

//echo '<script type="text/javascript" src="ajax.js"></script>';
//include "../Modelo/index.php";

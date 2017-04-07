<?php

error_reporting(E_ALL ^ E_NOTICE); //Que me notifique de todos los errores menso de la notice
// Conexión a la base de datos
require_once '../Modelo/Usuario.php';
//$img = $_FILES["imagen"]["name"];
//move_uploaded_file($_FILES["imagen"]["tmp_name"], "interfaz_usuario/imagen/" . $img);
//,$_POST[$img]
//echo 'Esto es una prueba ' . $_POST[idModificarUsuario];
$originalDate = "$_POST[fechaAltaModificarUsuario]"; //Cambio el formato de la fecha para que se pueda almacenar el BD
$newDate = date("Y-m-d", strtotime($originalDate));
//echo "$newDate ". " Esta es la fecha <br>"; 
//
//Encripto la contraseña
$contrase = $_POST[passwordModificarUsuario];
$hash = password_hash($contrase, PASSWORD_DEFAULT);
//$img=" ";
$inmueble_Modificar = new Usuario($_POST[idModificarUsuario], $_POST[nombreModificarUsuario], $hash, $_POST[direccionModificarUsuario], $_POST[telefonoModificarUsuario], $newDate);
//echo "Este es el vendedor $_POST[vendedorModificar] <br>";
$inmueble_Modificar->update();

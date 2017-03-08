<?php
error_reporting(E_ALL ^ E_NOTICE);//Que me notifique de todos los errores menso de la notice
require_once '../Modelo/Contenido.php';
//  $img = $_FILES["imagen"]["name"];
// move_uploaded_file($_FILES["imagen"]["tmp_name"]["size"] > 500000, "interfaz_usuario/imagen/" . $img);
//echo $_POST[fechaAltaNuevo] . "Esta es la fecha de alta";

$inmueble_Anadir = new Contenido($_POST[idNuevo],$_POST[fechaAltaNuevo],$_POST[precioNuevo],$_POST[direccionNuevo],$_POST[operacionNuevo],$_POST[provinciaNuevo],$_POST[tipoNuevo],0,1);
$inmueble_Anadir->insert();

//echo '<script type="text/javascript" src="ajax.js"></script>';
//include "../Modelo/index.php";
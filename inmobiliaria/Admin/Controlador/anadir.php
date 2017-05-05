<?php

error_reporting(E_ALL ^ E_NOTICE); //Que me notifique de todos los errores menso de la notice
require_once '../Modelo/Contenido.php';

$inmueble_Anadir = new Contenido($_POST[idNuevo],$_POST[fechaAltaNuevo],$_POST[precioNuevo],$_POST[direccionNuevo],$_POST[operacionNuevo],$_POST[provinciaNuevo],$_POST[tipoNuevo],0,1);
$inmueble_Anadir->insert();

//echo '<script type="text/javascript" src="ajax.js"></script>';
//include "../Modelo/index.php";
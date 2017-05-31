<?php

require_once '../../Admin/Modelo/Imagen.php';
require_once '../../Admin/Modelo/Contenido.php';

include "../Vista/Inmueble_seleccionado.php";
//Incremento las visitas al inmueble
Contenido::incrementaVisita($_REQUEST['idInmueble'],$visitas_calculada);
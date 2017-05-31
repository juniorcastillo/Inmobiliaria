<?php

require_once '../Modelo/Contenido.php';
require_once '../Modelo/Imagen.php';

$data['list_imagenes_inmueble'] = Imagen::list_imagenes_inmueble($_GET['idinmueble']); //listados de imagen
    foreach ($data['list_imagenes_inmueble'] as $img) {
         unlink($img->getnomreIMG());
    }
$inmueble_borrar = new Contenido($_GET['idinmueble']);
$inmueble_borrar->delete();
Imagen::borrar_imagenes_inmueble($_GET['idinmueble']); //borrar imagenes de la base de datos
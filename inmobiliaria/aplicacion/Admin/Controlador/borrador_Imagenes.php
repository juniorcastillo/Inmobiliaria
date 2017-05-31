<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //eliminando del servidor 
    require_once '../Modelo/Imagen.php';
        $data['list_imagenes_inmueble'] = Imagen::list_imagenes_inmueble($_GET['idinmueble']); //listados de imagen
        foreach ($data['list_imagenes_inmueble'] as $img) {
            unlink($img->getnomreIMG());
        }
        ?>
    </body>
</html>

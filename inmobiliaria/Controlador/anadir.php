<?php
error_reporting(E_ALL ^ E_NOTICE);//Que me notifique de todos los errores menso de la notice
require_once '../Modelo/Contenido.php';



echo " Esta es la inmagen--> " . $_REQUEST["img"];

// move_uploaded_file($_REQUEST['imagen'], "../Vista/img/");
 //  echo "<img src='../Vista/imagen/imagen.png'>";
/**if (isset($_FILES["file"]))
{
    $file = $_FILES["file"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../Vista/img_inmueble/";
    
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
      echo "Error, el archivo no es una imagen"; 
    }
    else if ($size > 1024*1024)
    {
      echo "Error, el tamaño máximo permitido es un 1MB";
    }
    else if ($width > 500 || $height > 500)
    {
        echo "Error la anchura y la altura maxima permitida es 500px";
    }
    else if($width < 60 || $height < 60)
    {
        echo "Error la anchura y la altura mínima permitida es 60px";
    }
    else
    {
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
       // echo "<img src='$src'>";
    }
}

$inmueble_Anadir = new Contenido($_POST[idNuevo],$_POST[fechaAltaNuevo],$_POST[precioNuevo],$_POST[direccionNuevo],$_POST[operacionNuevo],$_POST[provinciaNuevo],$_POST[tipoNuevo],0,1,$src);
$inmueble_Anadir->insert();

//echo '<script type="text/javascript" src="ajax.js"></script>';
//include "../Modelo/index.php";
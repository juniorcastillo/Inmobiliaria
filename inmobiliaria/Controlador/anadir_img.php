<?php
if (isset($_REQUEST['id_inmueble'])) {
    $id_casa = $_REQUEST['id_inmueble'];
}

?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> </title>
        <link href="../Vista/Style_Admin/Css.css" rel="stylesheet">
      
    </head>
    <body>
        <header>

            <ul>
                <li id="homeMenu"><a href="index.php">Inmueble</a></li>
                <li id="usuarioMenu"><a href="usuario.php" >Usuario</a></li>
                <li><a href="#">Interfaz_usuario</a></li>
                <li style="float:right"><a href="./control_usuario.php?cerrar=true">Sign out</a></li>
            </ul><br><br>
          
          
        </header>
        <br>     <br>     <br>     <br>     <br>    

        <?php
        require_once '../Modelo/Imagen.php';
        if (isset($_FILES['imagen'])) {

            $cantidad = count($_FILES["imagen"]["tmp_name"]);

            for ($i = 0; $i < $cantidad; $i++) {
                //Comprobamos si el fichero es una imagen
                if ($_FILES['imagen']['type'][$i] == 'image/png' || $_FILES['imagen']['type'][$i] == 'image/jpeg') {

                    $nombre = "./image/" . $_FILES["imagen"]["name"][$i];
                    move_uploaded_file($_FILES["imagen"]["tmp_name"][$i], $nombre);
                    $prioridad = 2;
                    $imagen_Anadir = new Imagen("", $nombre, $prioridad, $_REQUEST['inmueble']);
                    $imagen_Anadir->insertIMG();
                    $nombre = "";
                    $prioridad = "";
                    $_REQUEST['inmueble'] = "";
                    $validar = true;
                } else
                    $validar = false;
            }
        }else{
      
            ?>

            <form method="post" action="?" enctype="multipart/form-data">
                <input type="file" name="imagen[]" value="" multiple><br>
                <input type="hidden" name="inmueble" value="<?= $id_casa ?>">
                <input type="submit" value="Subir Imagen">
            </form>

            <?php
        }
        
        if (isset($_FILES['imagen']) && $validar == true) {
            ?>
            <?php
            $cantidad = count($_FILES["imagen"]["tmp_name"]);

            for ($i = 0; $i < $cantidad; $i++) {
                $nombre = "./image/" . $_FILES["imagen"]["name"][$i];
                ?>
                <h1><?php echo $_FILES["imagen"]["name"][$i] ?></h1>
                <img src="<?php echo $nombre ?>" width="100">
                <?php
            }
        }
        ?>
    </body>
</html>


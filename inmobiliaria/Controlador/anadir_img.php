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
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        //Reco el valor del array mandado por el formulario con los datos de las imagenes.
        if (isset($_FILES['imagen'])) {

            $cantidad = count($_FILES["imagen"]["tmp_name"]);

            for ($i = 0; $i < $cantidad; $i++) {
                //Comprobamos si el fichero es una imagen
                if ($_FILES['imagen']['type'][$i] == 'image/png' || $_FILES['imagen']['type'][$i] == 'image/jpeg') {

                    $nombre = "./image/" . $_FILES["imagen"]["name"][$i];
                    move_uploaded_file($_FILES["imagen"]["tmp_name"][$i], $nombre);
                    $prioridad = 2;
                    $validar = Imagen::validarIMG($nombre, $_REQUEST['inmueble']);

                    //comprobar que la imagen no se repita
                    if ($validar <= 0) {
                        $imagen_Anadir = new Imagen("", $nombre, $prioridad, $_REQUEST['inmueble']);
                        $imagen_Anadir->insertIMG();
                    } else {
                        echo '<div style="color:red">Existe una imagen con ese nombre,cambiarlo y intentelo de nuevo </div>';
                    }
                    $nombre = "";
                    $prioridad = "";
                    $_REQUEST['inmueble'] = "";
                    $validar = true;
                } else
                    $validar = false;
            }
        }else {
            ?>

            <form method="post" action="#" enctype="multipart/form-data" id="foto">
                <input type="file" class="btn btn-info" name="imagen[]" value="" multiple required><br>
                <input type="hidden" name="inmueble" value="<?= $id_casa ?>">
                <button type="submit" class="btn btn-success">Enviar</button>
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


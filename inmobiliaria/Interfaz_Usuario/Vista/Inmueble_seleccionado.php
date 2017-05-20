<?php
session_start();
/* * ***********************************************************************
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * *********************************************************************** */
if (!isset($_SESSION['sesisonUser'])) {
    $_SESSION['sesisonUser'] = false;
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
        <title>Inmobiliaria Castillo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <style>
            #galeria, #galeria * {
                box-sizing:border-box;
                -moz-box-sizing:border-box;

            }
            #galeria {
              
       
                border: 1px solid #EAEAEA;  /* Borde de la galería */
                padding: 10px;
                padding-bottom: 0;
                background: white;  /* Fondo de la galería */
                width: 50%;  /* Ancho de la galería */
            }
            #galeria_miniaturas {
                display: table;
                margin: 0 auto;
                width: 90%;
            }
            #galeria_imagen{
                width: 100%;  /* Ancho de la galería */ 
            }
            #imgGaleria {
                border: 1px solid #F2F2F2;  /* Borde de la imagen */
                padding: 3px;
                max-width: 100%;
                width: 100%;
                height: 400px;

            }
            .miniatura {
                width:  60px;  /* Ancho de las miniaturas */
                height:  60px;  /* Alto de las miniaturas */
                float: left;
                cursor: pointer;
                padding: 5px;
                margin: 10px 5px;
            }
            .miniatura:hover {
                opacity:.8;   /* Opacidad */
                -moz-opacity:.8;
                -khtml-opacity:.8;
                filter:alpha(opacity=80);
            }
            .miniatura:active {
                opacity:1;
                -moz-opacity:1;
                -khtml-opacity:1;
                filter:alpha(opacity=80);

            }
        </style>
        <link rel="stylesheet" type="text/css" href="../Vista/Style/Main.css">
        <script src="../Vista/svg/snap.svg-min.js"></script>
        <script src="../Vista/svg/codigo.js"></script>
      
    </head>
    <body>
        <div id="logo">

            <svg width="60px" height="60px" id="svg">
            </svg>


        </div>
        <header class="limpiador">
            <div class="container">
                <div class="header-left">
                    <h1 id="pagTitulo">Inmobiliaria Castillo</h1>
                </div>
                <div class="header-right">


                    <label for="open">
                        <span class="spanMenu"></span>
                    </label>
                    <input type="checkbox" name="" id="open">
                    <nav>
                        <a href="../Controlador/home.php">Inicio</a>
                        <a href="Articulo.php">Venta</a>
                        <a href="Articulo.php">Alquiler</a>
                        <a href="Articulo.php">Informacion</a>
                        <a href="../Vista/Contacto.php">Contacto</a>
                        <?php
                        if ($_SESSION['sesisonUser']) {
                            echo '<a href="../../Admin/Controlador/control_usuario.php?cerrar=true">Cerrar sesion</a>';
                        } else {
                            ?>

                            <a href="../../Admin/Vista/formulario_controlUsuario.php">Iniciar sesion</a>

                            <?php
                        }
                        ?>
                    </nav>
                </div>
            </div>
        </header>

        <div id="galeria">
            <div id="galeria_imagen">
                <img id="imgGaleria" src="../Vista/imagen/2.jpg" /></div>
            <div id="galeria_miniaturas">
                <?php
                require_once '../../Admin/Modelo/Imagen.php';
                $data['listado'] = Imagen::list_imagenes_inmueble($_REQUEST['idInmueble']);
                //Esta es la imagen --><td class="imagen"> $casa->getImagen()</td> <th>Imagen</th>
                foreach ($data['listado'] as $casa) {
                    ?>
                    <img class="miniatura" onclick="javascript:document.getElementById('imgGaleria').src = '../../Admin/Controlador/<?= $casa->getnomreIMG() ?>';" src="../../Admin/Controlador/<?= $casa->getnomreIMG() ?>" alt="Casa" />
                    <?php
                  
                }
                ?>
            </div>
        </div>
        <h1>Mostrare los datos</h1>

    </body>
</html>

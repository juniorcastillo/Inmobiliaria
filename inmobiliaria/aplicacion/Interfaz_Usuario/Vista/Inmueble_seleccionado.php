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
            body{
                padding:0px;
                margin: 0px;
            }
            #galeriaydetalle{
                display: -webkit-flex;
                display: flex;
                width: 100%;


            }
            #galeria, #galeria * {
                box-sizing:border-box;
                -moz-box-sizing:border-box;

            }
            #galeria {

                padding: 10px;
                padding-bottom: 0;
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
            #contendedor_informacion{

                width: 49%;
                background-color: #c4e3f3;
                height: 390px;
                margin-top: 15px;
            }
            #contendedor_informacion h1{
                text-align: center;
                font-weight: bold;
            }
            #contendedor_informacion ul li{
                list-style-position:inside;
                margin-top: 10px;
                font-size: 1.3rem;
            }
            #descripcion_inmueble {

                height: 100%;
                background-color: #F6ECF5;
            }
            #descripcion_inmueble h1{
                font-weight: bold;
                text-align: center;
            }
            #descripcion_inmueble p{
                margin: 10px 5px 10px 5px;
                
                font-size: 1.3rem;
                word-wrap: break-word;
            }
            .linea{

                border-top: 1px solid #8c8b8b;
                border-bottom: 1px solid #fff;

            }

            @media (max-width: 534px){
                #galeriaydetalle{
                    display:table;
                }
                #galeria {

                    width: 100%;  /* Ancho de la galería */
                }
                #contendedor_informacion{

                    width: 100%;

                }
            }
        </style>
        <link rel="stylesheet" type="text/css" href="../Vista/Style/Main.css">
        <script src="../Vista/svg/snap.svg-min.js"></script>
        <script src="../Vista/svg/codigo.js"></script>
         <script>
         var audio = new Audio('../Vista/sonido/burbuja.mp3');
          audio.play();
          </script>
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
                        <a href="Articulo.php">Video</a>
                      
                        <a href="../Vista/Informacion.php">Informacion</a>
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
        <div id="galeriaydetalle">


            <div id="galeria">
                <div id="galeria_imagen">
                    
                    <img id="imgGaleria" src="../../Admin/Controlador/<?= Imagen::portadaInmueble($_REQUEST['idInmueble'])?>" /></div>
                <div id="galeria_miniaturas">
                    <?php
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
            <div id="contendedor_informacion">
                <h1>Detalle inmueble</h1><br><br>
                <?php
                $data['listado'] = Contenido::getListInmuebleByid($_REQUEST['idInmueble']);
                //Esta es la imagen --><td class="imagen"> $casa->getImagen()</td> <th>Imagen</th>
                foreach ($data['listado'] as $inmueble) {
                    ?>
                    <ul>
                        <li><strong>Tipo de propiedad:</strong> <?= $inmueble->getNombreTipo() ?></li>
                        <li><strong>Tipo de operación:</strong> <?= $inmueble->getOperacion() ?></li>
                        <li><strong>Precio de propiedad:</strong> <?= $inmueble->getPrecio() ?> €</li>
                        <li><strong>Provincia:</strong> <?= $inmueble->getProvincia() ?> </li>
                    </ul>
                    <?php
                }
                ?>

            </div>
        </div>
        <br>
        <hr class="linea">
        <div id="descripcion_inmueble">

            <h1>Descripción</h1>
            <?php
            $data['listado'] = Contenido::getListInmuebleByid($_REQUEST['idInmueble']);
            //Esta es la imagen --><td class="imagen"> $casa->getImagen()</td> <th>Imagen</th>
            foreach ($data['listado'] as $inmueble) {
                $visitas_calculada=$inmueble->getVisita() + 1;
                ?>
                <p><?= $inmueble->getDescripcion() ?></p>
                 
                <?php
            }
            ?>
        </div>
        <footer>
              <span id="copyright">©Junior Miguel Castillo santana</span>
            <div><a href="https://www.facebook.com/ "  target="_blank"><p id="Facebook" ></p></a></div>

            <div><a href="#">  <p id="Gmail" ></p></a></div>

            <div><a href="#"> <p  id="youtube"><span  class="span"></span></p></a></div>

            <div><a href="#"><p id="Twitter"><span  class="span"></span></p></a></div>



        </footer>
    </body>
</html>

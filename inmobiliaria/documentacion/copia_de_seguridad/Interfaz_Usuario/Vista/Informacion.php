<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
        session_start();
        /*         * ***********************************************************************
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


<html>
    <head>
         <meta charset="UTF-8">
        <title>Inmobiliaria Castillo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                        <a href="Video.php">Video</a>
                      
                        <a href="#">Informacion</a>
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
        <iframe src="../documentacion/Documentacion_ingles (1).pdf" style="width:100%; height:600px;" frameborder="0"></iframe>
    </body>
</html>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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


<html>
    <head>
      <meta charset="UTF-8">
        <title>Inmobiliaria Castillo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../Vista/Style/Main.css">
        <script src="../Vista/svg/snap.svg-min.js"></script>
        <script src="../Vista/svg/codigo.js"></script>

        <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

       
        <style>
  
            
            #contenedor_icono_informacion{
                width: 100%;
                height: 70px;
                background-color: #323639;
            }
            #icono_en img{
                border-radius: 100%;
            }
            #icono_en img, #icono_es img{
                cursor: pointer;

            }
            .icono_paginformacion{
                float: left;
                margin-right: 10px; 
                margin-top: 25px;

            }
        </style>

        <script>
            $(document).ready(function () {
                $("#ingles").hide();
				var alturabody= $("#body").height();
                $(document).on("click", "#icono_en", function () {


                    $("#espanol").slideUp("slow", function () {
                        $("#ingles").slideDown("slow");
                    });


                });
                $(document).on("click", "#icono_es", function () {
                    $("#ingles").slideUp("slow", function () {
                        $("#espanol").slideDown("slow");
                    });



                });
            });
        </script>

    </head>

    <body id="body">
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
        <div id="contenedor_icono_informacion">
		
            <div id="icono_es" class="icono_paginformacion"><img src="./imagen/icono_espaniol.png" alt="icono" height="42" width="42"></div>
            <div id="icono_en" class="icono_paginformacion"><img src="./imagen/icono_ingles.png" alt="icono" height="42" width="42"></div>

        </div>

       
        
		 <div id="ingles"> <iframe src="../documentacion/Documentacion_ingles (1).pdf" style="width:100%; height:800px;" frameborder="0"></iframe></div>
		 <div id="espanol"> <iframe src="../documentacion/Documentacion_proyecto_final.pdf" style="width:100%; height:800px;" frameborder="0"></iframe></div>
    </body>
</html>

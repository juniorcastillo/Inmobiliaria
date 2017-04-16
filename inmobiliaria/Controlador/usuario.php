<?php
session_start();

error_reporting(E_ALL ^ E_NOTICE); //Que me notifique de todos los errores menso de la notic
if ($_SESSION['accesopermitido']) {
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
            <title>Gestion_usuario</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
            <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
            <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js" type="text/javascript"></script>
            <script type="text/javascript" src="ajax.js"></script>
            <link href="../Vista/Style_Admin/Css.css" rel="stylesheet">

        </head>
        <body>
            <header>

                <ul>
                    <li id="homeMenu"><a href="index.php" >Inmueble</a></li>
                    <li id="usuarioMenu"><a href="#" >Usuario</a></li>
                    <li><a href="#">Interfaz_usuario</a></li>
                    <li style="float:right"><a href="./control_usuario.php?cerrar=true">Sign out</a></li>
                </ul>
            </header><br>

            <div id="seleccion"> <b>Order By</b>  <select name="campos" id="campos">
                    <option value="1">Id</option>
                    <option value="2">Nombre</option>
                    <option value="4">Direccion</option>

                    <option value="6">Fecha</option>


                </select>
                <select name="forma" id="forma">
                    <option value="ASC">Asc</option>
                    <option value="DESC">Desc</option>

                </select></div>

            <div class="container-fluid">
                <div style="cursor:pointer; width:30px; "><img src="../Vista/img/nuevo.png" width="30" height="30" id="nuevo" title="Nuevo Inmueble"></div>

                <hr>
                <!-- Muestra los datos -->
                <div id="accion" class="contenedorUsuario">
                    <div class="row">
                        <div class="col-xs-12">

                            <div id="loader" class="text-center"> </div>


                            <div class="outer_div"></div><!-- Datos ajax Final -->
                        </div>

                    </div>
                </div>
                <!-- CAPA DE DIALOGO NUEVO USUARIO -->
                <div id="dialogoNuevoUsuario" class="dialogo" title="Nuevo usuario">
                    <?php include "../Vista/formulario_nuevoUsuario.php";
                    ?>
                </div>
                <!-- CAPA DE DIALOGO BORRAR USUARIO -->
                <div id="dialogoborrarUsuario" class="dialogo" title="Eliminar Usuario">
                    <p>¿Esta seguro que desea eliminar el usuario?</p>
                </div>

                <!-- CAPA DE DIALOGO MODIFICAR USUARIO -->
                <div id="dialogomodificarUsuario" class="dialogo" title="Modificar Inmueble">
                    <?php include "../Vista/formulario_modificar_usuario.php";
                    ?>
                </div>
            </div>


        </body>
    </html>
    <?php
} else {


    header("refresh:0; url=../Vista/formulario_controlUsuario.php");
}

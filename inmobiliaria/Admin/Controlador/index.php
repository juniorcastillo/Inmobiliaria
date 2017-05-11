<?php
session_start();

error_reporting(E_ALL ^ E_NOTICE); //Que me notifique de todos los errores menso de la notic
if ($_SESSION['accesopermitido']) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">

            <title>Inmobiliaria Castillo</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
            <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
            <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js" type="text/javascript"></script>
            <script type="text/javascript" src="ajax.js"></script>
            <link href="../Vista/Style_Admin/Css.css" rel="stylesheet">


            <script>
                $(document).ready(function () {
                    $('li#homeMenu').addClass('active');
                });
            </script>
        </head>
        <body >
            <div id="accion" class="contenedorInmueble" >
                <header>

                    <ul>
                        <li id="homeMenu"><a href="#" >Inmueble</a></li>
                        <li id="usuarioMenu"><a href="usuario.php" >Usuario</a></li>
                        <li><a href="../Vista/interfaz_usuario/index.php">Interfaz_usuario</a></li>
                        <li style="float:right"><a href="./control_usuario.php?cerrar=true">Sign out</a></li>
                    </ul><br>
                </header>
                <div id="funciones">
                    
                    <div class="funciones-flex" style="cursor:pointer; width:30px; "><img src="../Vista/img/nuevo.png" width="30" height="30" id="nuevo" title="Nuevo Inmueble"></div>
                    <div class="funciones-flex"><b>Buscar Operaciones</b><br><input type="text" id="busqueda"/></div>
                    <div id="seleccion" class="funciones-flex"> <b>Order By</b><br> 
                        <select name="campos" id="campos">
                            <option value="1">Id</option>
                            <option value="2">Fecha</option>
                            <option value="7">Tipo</option>

                            <option value="5">Operacion</option>
                            <option value="3">Precio</option>

                        </select>
                        <select name="forma" id="forma">
                            <option value="ASC">Asc</option>
                            <option value="DESC">Desc</option>

                        </select>
                    </div>


                </div>


                <div class="container-fluid">



                    <hr>

                    <div class="row">
                        <div class="col-xs-12">

                            <div id="loader" class="text-center"> </div>
                            <div class="outer_div"></div><!-- Datos ajax Final -->
                        </div>

                    </div>

                    <!-- CAPA DE DIALOGO Borrar INMUEBLE -->
                    <div id="dialogoborrar" class="dialogo" title="Eliminar Inmueble">
                        <p>¿Esta seguro que desea eliminar el inmueble?</p>
                    </div>
                    <?php
                    require_once '../Modelo/Tipo.php';
                    $data['listadoTipo'] = Tipo::getListTipo();
                    ?>
                    <!-- CAPA DE DIALOGO MODIFICAR INMUEBLE -->
                    <div id="dialogomodificar" class="dialogo" title="Modificar Inmueble">
                        <?php include "../Vista/inmueble_formulario_modificar.php";
                        ?>
                    </div>

                    <!-- CAPA DE DIALOGO NUEVO INMUEBLE -->
                    <div id="dialogonuevo" class="dialogo" title="Nuevo Inmueble">
                        <?php include "../Vista/formulario_nuevos.php";
                        ?>
                    </div>

                </div>
            </div>

        </body>
    </html>
    <?php
} else {


    header("refresh:0; url=../Vista/formulario_controlUsuario.php");
}

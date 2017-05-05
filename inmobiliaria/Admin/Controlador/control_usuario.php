<?php

session_start();
/* * ***********************************************************************
 *    @Junior Miguel Castillo santana                                     *
 *                                                                        *   
 * *********************************************************************** */
//--------Regojemos tanto la clave como el usuario introduccido ------------
error_reporting(E_ALL ^ E_NOTICE); //Que me notifique de todos los errores menso de la notice

$_SESSION['accesopermitido'] = false;
$_SESSION['sesisonUser'] = false;
$tamano = 0;
if (isset($_REQUEST['cerrar'])) {

    session_destroy();

    echo '<script type="text/javascript">                
                      alert("Sesion cerrada");
             </script>';

    header("refresh:0; url=../Vista/formulario_controlUsuario.php");
} else {//Si no le dan a cerrar sesion 
    // echo "Usuario-->" . $_REQUEST['usuario'] .  " Contraseña-->". $_REQUEST['clave'] ;
    // $usuariointro = $_REQUEST['usuario'];
    //$claveintro = $_REQUEST['clave'];
    //--------------------------- Compruebo si el usuario existe o si es el correcto junto con su password  ----------------------------------------------------
    require_once '../Modelo/Usuario.php';

    $validar = Usuario::validarUsuario($_REQUEST['usuario']);
    if ($validar > 0) {//Compruebo que el usuario introducido existe
        $data['listadoTipo'] = Usuario::controlUsuario($_REQUEST['usuario']);


        foreach ($data['listadoTipo'] as $usuario) {

            $usuario->getEmailUsuario();
            $usuario->getPasswordUsuario();
            $hash = $usuario->getPasswordUsuario();
            if (password_verify($_REQUEST['clave'], $hash)) {
                $_SESSION['sesisonUser'] = true;


                if ($usuario->getRolUsuario() == 1) {
                    $_SESSION['accesopermitido'] = true;
                    header("refresh:3; url=./index.php");
                    include "../Vista/formulario_controlUsuario.php";
                    echo '<div class="alert alert-success navbar-fixed-top">
                                      <strong>Bienvenido! '.$_REQUEST['usuario'].'</strong>
                                      </div>';
                } else {

                    header("refresh:3; url=../../Interfaz_Usuario/Controlador/home.php");
                    echo '<div class="alert alert-success navbar-fixed-top">
                                      <strong>Usuarion o contraseña son correctos.</strong>
                                      </div>';
                    include "../Vista/formulario_controlUsuario.php";
                }

                //fin del foreach
            } else {
                $_SESSION['accesopermitido'] = false;
                header("refresh:1; url=../Vista/formulario_controlUsuario.php");
                include "../Vista/formulario_controlUsuario.php";
                echo '  <div class="alert alert-danger navbar-fixed-top">
                 <strong>Contraseña incorrecta!</strong>
                </div>';
            }//fin else usuario o contraseña incorrecto
        }//fin del forech
    } else {



        header("refresh:1; url=../Vista/formulario_controlUsuario.php");
        include "../Vista/formulario_controlUsuario.php";
        echo '  <div class="alert alert-danger navbar-fixed-top">
                 <strong>Usuario No existe!</strong>
                </div>';
    }//Fin del else que comprueba que el usuario no existe.
}//Fin del else principal
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
                echo '<div Style=" background-color:green; text-align: center;" >
                                      <strong>Usuarion o contraseña son correctos.</strong>
                                      </div>';
                include "../Vista/formulario_controlUsuario.php";
            } else {

                header("refresh:3; url=../Vista/interfaz_usuario/index.php");
                echo '<div Style=" background-color:green; text-align: center;" >
                                      <strong>Usuarion o contraseña son correctos.</strong>
                                      </div>';
                include "../Vista/formulario_controlUsuario.php";
            }

            //fin del foreach
        } else {
            $_SESSION['accesopermitido'] = false;
            echo '<div Style=" background-color:red; text-align: center;" >
                      <strong>Danger! Usuarion o contraseña incorrectos.</strong>
                      </div>';
            header("refresh:1; url=../Vista/formulario_controlUsuario.php");
            include "../Vista/formulario_controlUsuario.php";
        }
    }//fin del forech
}//Fin del else principal
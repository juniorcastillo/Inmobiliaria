<?php

session_start();
/* * ***********************************************************************
 *    @Junior Miguel Castillo santana                                     *
 *                                                                        *   
 * *********************************************************************** */
//--------Regojemos tanto la clave como el usuario introduccido ------------
$_SESSION['accesopermitido'] = false;

if (isset($_REQUEST['cerrar'])) {

    session_destroy();

    echo '<script type="text/javascript">                
                  alert("Sesion cerrada");
         </script>';

    header("refresh:0; url=../Vista/formulario_controlUsuario.php");
} else {

    //echo "Usuario-->$usuariointro Contraseña-->  $claveintro  ";
    // $usuariointro = $_REQUEST['usuario'];
    //$claveintro = $_REQUEST['clave'];
//--------------------------- Compruebo si el usuario existe o si es el correcto junto con su password  ----------------------------------------------------
    require_once '../Modelo/Usuario.php';
    $data['listadoTipo'] = Usuario::controlUsuario();
    foreach ($data['listadoTipo'] as $fila) {



        if ($fila->getEmailUsuario() == $_REQUEST['usuario'] && $fila->getPasswordUsuario() == $_REQUEST['clave']) {

            if ($fila->getRolUsuario() == 1) {
                $_SESSION['accesopermitido'] = true;
                 header("refresh:3; url=./index.php");
                echo '<div Style=" background-color:green; text-align: center;" > 
                            <strong>Usuarion o contraseña son correctos.</strong>
                      </div>';
                 include "../Vista/formulario_controlUsuario.php";
              
            }
        } else {
            $_SESSION['accesopermitido'] = false;
               echo '<div Style=" background-color:red; text-align: center;" > 
                      <strong>Danger! Usuarion o contraseña incorrectos.</strong>
                    </div>';
                header("refresh:1; url=../Vista/formulario_controlUsuario.php");
                include "../Vista/formulario_controlUsuario.php";
            
        }
    }
}
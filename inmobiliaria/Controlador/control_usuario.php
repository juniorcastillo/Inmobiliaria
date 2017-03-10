<?php

session_start();
/* * ***********************************************************************
 *    @Junior Miguel Castillo santana                                     *
 *                                                                        *   
 * *********************************************************************** */
//--------Regojemos tanto la clave como el usuario introduccido ------------
$_SESSION['accesopermitido'] = false;
 $_SESSION['sesisonUser'] = false;
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
    $data['listadoTipo'] = Usuario::controlUsuario($_REQUEST['usuario'], $_REQUEST['clave']);
    $tamano = count($data['listadoTipo']); //Compruebo el tamaño del array
 // echo "<h1>$tamano</h1>";


    if ($tamano >= 1) {
         $_SESSION['sesisonUser']=true;
        foreach ($data['listadoTipo'] as $fila) {

            
            if ($fila->getRolUsuario() == 1) {
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
        }//fin del foreach
    } else {
        $_SESSION['accesopermitido'] = false;
        echo '<div Style=" background-color:red; text-align: center;" > 
                      <strong>Danger! Usuarion o contraseña incorrectos.</strong>
                    </div>';
        header("refresh:1; url=../Vista/formulario_controlUsuario.php");
        include "../Vista/formulario_controlUsuario.php";
    }//fin del else
}//Fin del else principal
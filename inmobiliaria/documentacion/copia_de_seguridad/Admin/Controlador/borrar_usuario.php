<?php
//Envia el id del usuario que querermos borrar

require_once '../Modelo/Usuario.php';
$borrar = new Usuario($_GET['idusuario']);
$borrar->delete();

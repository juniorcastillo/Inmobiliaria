<?php
# conecta a la base de datos
//si accion esta definido y no esta null coje el valor sino ponerlo vacio
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
//Recojo el paramentro enviado por ajax Para ordenar
$o = (isset($_REQUEST['ordenar']) && $_REQUEST['ordenar'] != NULL) ? $_REQUEST['ordenar'] : '1';
$p=(isset($_REQUEST['forma']) && $_REQUEST['forma'] != NULL) ? $_REQUEST['forma'] : 'ASC';
//Recojo el nombre del usuario para el buscador 
$b=(isset($_REQUEST['consultab']) && $_REQUEST['consultab'] != NULL) ? $_REQUEST['consultab'] :'';
//si es igual a Inmueble
if ($action == 'inmueble') {
  // Obtiene todas las propiedades
  require_once '../Modelo/Contenido.php';
  $data['listado'] = Contenido::getListInmueble($b,$o,$p);
  include '../Modelo/listadoPag.php';

  include '../Vista/listado.php';
  ?>

<?php
}  elseif ($action == 'usuario') {
   
    require_once '../Modelo/Usuario.php';
    $data['listadoUsuario'] = Usuario::listadoUsuario($b,$o,$p);
    include '../Modelo/cuenta_listado_usuario.php';
    include "../Vista/listado_usuario.php";
  
  
}else {
  ?>
  <div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>Aviso!!!</h4> No hay datos para mostrar
  </div>
  <?php
}
?>
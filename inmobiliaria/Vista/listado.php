
<table  class="table table-bordered" id="tabladatos">
  <tr>
    <th id="i">ID</th>
    <th id="f">Fecha Alta</th>
    <th id="t">Precio</th>
    <th id="t">Direccion</th>
    <th id="o">Operacion</th>
    <th id="m">Provincia</th>
    <th id="s">idTipo</th> 
    <th id="p">Visita</th>

    <th colspan="2">Funciones de Admin</th>

  </tr>
  <?php
  //Esta es la imagen --><td class="imagen"> $casa->getImagen()</td> <th>Imagen</th>
  foreach ($data['listado'] as $casa) {
    ?>
    <tr id="inmueble_<?= $casa->getId() ?>" align="center" data-idinmueble="<?= $casa->getId() ?>">

      <td class="id"><?= $casa->getId() ?></td>
      <td class="alta"><?= $casa->getFechaAlta() ?></td>
      <td class="precio"><?= $casa->getPrecio() ?></td>
      <td class="direccion"><?= $casa->getdireccion() ?></td>
      <td class="operacion"><?= $casa->getOperacion() ?></td>
      <td class="provincia"><?= $casa->getProvincia() ?></td>
      <td class="idtipo" name="<?= $casa->getTipo() ?>"><?= $casa->getNombreTipo() ?></td>

      <td class="visita"><?= $casa->getVisita() ?></td>

      <td class="accion"> <button id="borrar" type="button" class="btn btn-danger">Delete</button>
        &nbsp; <button id="modificar" type="button" class="btn btn-warning" >Change</button></td>

    </tr>


    <?php
  }
  ?>
</table>
<div class="table-pagination pull-right">
  <?php echo paginate($reload, $page, $total_pages, $adjacents, $o, $p); ?>
</div>




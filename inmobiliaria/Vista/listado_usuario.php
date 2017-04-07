  

<script>
    $(document).ready(function () {
        $('li#usuarioMenu').addClass('active');

    });
</script>


<table  class="table table-bordered" id="tabladatos">
    <tr>
        <th id="i">ID</th>
        <th id="n">Nombre</th>
        <th id="e">Email</th>
        <th id="c">Contraseña</th>
        <th id="d">Direccion</th>
        <th id="t">Telefono</th>
        <th id="f">Fecha Alta</th>


        <th colspan="2">Funciones de Admin</th>

    </tr>
    <?php
    //Esta es la imagen --><td class="imagen"> $casa->getImagen()</td> <th>Imagen</th>
    foreach ($data['listadoUsuario'] as $usuario) {
        ?>
        <tr id="usuario_<?= $usuario->getIdUsuario() ?>" align="center" data-idusuario="<?= $usuario->getIdUsuario() ?>">

            <td class="idUsuario"><?= $usuario->getIdUsuario() ?></td>
            <td class="nombreUsuario"><?= $usuario->getNombreUsuario() ?></td>
            <td class="emailUsuario"><?= $usuario->getEmailUsuario() ?></td>
            <td class="passwordUsaurio"><?= $usuario->getPasswordUsuario() ?></td>
            <td class="direccionUsuario"><?= $usuario->getdireccionUsuario() ?></td>
            <td class="telefonoUsuario"><?= $usuario->getTelUsuario() ?></td>
            <td class="fechaaltaUsuario"><?= $usuario->getFechaAltaUsuario() ?></td>
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




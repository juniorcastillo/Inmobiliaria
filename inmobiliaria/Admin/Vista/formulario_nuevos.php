

<form id="formulario_alta" enctype="multipart/form-data">

    <div id="th">Fecha</div> <div id="td"><input type="date" name="fechaalta" id="fechaAltaNuevo"><br></div>
    <div id="th"> Precio</div><div id="td"> <input type="number" name="precioventa" size="2" id="precioNuevo" min="100" max="1000000" required><br></div>
    <div id="th">  Direccion</div><div id="td"> <input type="text" name="direccion" size="10" id="direccionNuevo" required><br></div>
    <div id="th">Operacion</div><div id="td">
        <select  name="operacion" id="operacionNuevo">
            <option value="Alquiler">Alquiler</option>
            <option value="Venta">Venta</option>
        </select><br>
    </div>
    <div id="th"> Provincia</div>
    <div> <select  name="provincia" id="provinciaNuevo">
            <option value="Malaga">Malaga</option>
            <option value="Sevilla">Sevilla</option>
             <option value="Jaen">Jaèn</option>
             <option value="Granada">Granada</option>
        </select></div><br>
    <div id="th"> Tipo<select placeholder="Tipo" name="idtipo" id="idtiponuevo" >
            <?php
            //Esta es la imagen --><td class="imagen"> $casa->getImagen()</td> <th>Imagen</th>
            foreach ($data['listadoTipo'] as $fila2) {
                ?>
                <option value="<?php echo $fila2->getIdTipo(); ?>"><?php echo$fila2->getNombreTipo(); ?></option>
            <?php } //while  ?>
        </select></div>

</form>



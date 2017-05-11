<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>


        <style>
            body{


                background-image: url(http://www.jonaga.com/imagenes/fondo%20pagina%20fijo.jpg);
            }

        </style>
    </head>


    <body>
        <form id="formulario">

            <div id="th">Referencia</div>
            <div id="td"> <input type="number" id="idModificar"  disabled></div>


            <div id="th">Fecha Alta</div>
            <div id="td"> <input type="text" name="alta" class="fecha" id="fechaAltaModificar"></div>

            <div id="th">Precio</div>
            <div id="td"><input type="number" name="precio" id="precioModificar" value="" size="10" ></div>



            <div id="th">Direccion</div>
            <div id="td"> <input type="text" name="dire"  id="direModificar" value="" size="10"  ></div>

            <div id="th">Operacion</div>
            <div id="td">
                <select  name="operacion" id="operacionModificar">
                    <option value="Alquiler">Alquiler</option>
                    <option value="Venta">Venta</option>
                </select><br>
            </div>
            <div id="th">Provincia</div>
            <div id="td"> 
                <select  name="provincia" id="provinciaModificar">
                    <option value="Malaga">Malaga</option>
                    <option value="Sevilla">Sevilla</option>
                    <option value="Jaen">Jaèn</option>
                    <option value="Granada">Granada</option>
                </select>
            </div>
            <div id="th">Tipo</div>
            <div id="td"><select placeholder="Tipo" name="idtipo" id="tipoModificar">
                    <?php
                    //Esta es la imagen --><td class="imagen"> $casa->getImagen()</td> <th>Imagen</th>
                    foreach ($data['listadoTipo'] as $fila2) {
                        ?>
                        <option value="<?php echo $fila2->getIdTipo(); ?>"><?php echo$fila2->getNombreTipo(); ?></option>
                    <?php } //while  ?>
                </select></div>


            <div id="th">Visita</div>
            <div id="td"> <input type="number" name="visita" id="visitaModificar" value="" min="0" size="1"> </div>

        </form>


    </body>
</html>

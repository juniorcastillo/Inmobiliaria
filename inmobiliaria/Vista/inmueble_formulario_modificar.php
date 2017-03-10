<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

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
          <div id="td"><input type="text" name="operacion"  id="operacionModificar" value="" size="10"  ></div>
        <div id="th">Provincia</div>
          <div id="td"> <input type="text" name="provincia" id="provinciaModificar" value="" size="10" ></div>
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

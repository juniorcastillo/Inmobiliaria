<?php
session_start();
/* * ***********************************************************************
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * *********************************************************************** */
if (!isset($_SESSION['sesisonUser'])) {
  $_SESSION['sesisonUser'] = false;
}
?>



<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Inmobiliaria Castillo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Css.css">
  </head>
  <body>
    <header class="limpiador">
      <div class="container">
        <div class="header-left">
          <h1 id="pagTitulo">Inmobiliaria Castillo</h1>
        </div>
        <div class="header-right">
          <label for="open">
            <span class="spanMenu"></span>
          </label>
          <input type="checkbox" name="" id="open">
          <nav>
            <a href="index.php">Home</a>
            <a href="#">Inspiration</a>
            <a href="#">Articles</a>
            <a href="#">Works</a>
            <a href="#">Contact</a>
            <?php
            if ($_SESSION['sesisonUser']) {
              echo '<a href="../control_Usuario.php?cerrar=cierro">Sign out</a>';
            } else {
              ?>

              <a href="../control_Usuario.php">Login</a>

              <?php
            }
            ?>
          </nav>
        </div>
      </div>
    </header>
    <section class="limpiador">
      <div class="container">
        <div class="section-left">
          <h1 class="section-title">Virvir bien es tu opciòn</h1>

        </div>
        <div class="section-right">
          <button class="learn-more">Learn more</button>
        </div>
      </div>
    </section>
    <hr>
    <div id="mapa">
      <h1 class="Subtitulo">Contacto</h1>
      <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d13191.136825829724!2d-4.602100384849979!3d36.580562168679165!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1479624687573"  id="googlemap" height="250" frameborder="0"  allowfullscreen></iframe>
      <form action="#" method="post" id="frm">
    </div>
    <div class="datosContacto">

      <div id="contactoForm">
        <div id="frm">
        <form action="#frm" method="post" >

         

          <div>  <label for="nombre" class="fa">Nombre</label></div>

          <div><input name="nombre" type="text" class="input-contacto"  title="El campo  'Nombre' no es válido"></div>

          <div> <label for="email" class="fa">E-mail</label></div>

          <div> <input name="email" type="email" class="input-contacto" title="El campo  'E-mail' no es válido"></div>
          <div> <label for="email" class="fa">Telefono</label></div>
          <div> <input name="tno" type="text" class="input-contacto" value="" title="El campo  'Teléfono' no es válido"></div>



          <div><label for="comentario" class="fa">Comentarios</label></div>

          <div><textarea id="textarea_contacto" name="comentario"  title="El campo  'Comentarios' no es válido" rows="7"></textarea></div>

          <div>  <input type="submit" value="Enviar" style="padding: 10px; background-color: #555; cursor:pointer;"></div>

        </form>

        </div>
      </div>

      <div id="contactoForm">


        <div class="direcciones">

          <ul>
            <li class="Subtitulo">INMOBILIARIA CASTILLO</li><br>

            <li><i>MALAGA, CAMPANILLAS</i></li>

            <li><i>29016 Málaga</i>  <span>(Málaga)</span></li>

            <li>123 456 789</li>

          </ul>
        </div>

      </div>


    </div>
       <footer>
      <div><a href="https://www.facebook.com/ "  target="_blank"><p id="Facebook" ></p></a></div>
      
      <div><a href="#">  <p id="Gmail" ></p></a></div>
       
      <div><a href="#"> <p  id="youtube"><span  class="span"></span></p></a></div>
        
       <div><a href="#"><p id="Twitter"><span  class="span"></span></p></a></div>
       
     
        
    </footer>

  </body>
</html>

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
    <header class="clearfix">
      <div class="container">
        <div class="header-left">
          <h1>Inmobiliaria Castillo</h1>
        </div>
        <div class="header-right">
          <label for="open">
            <span class="hidden-desktop"></span>
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
    <section class="clearfix">
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
      <h1>Contacto</h1>
      <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d13191.136825829724!2d-4.602100384849979!3d36.580562168679165!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1479624687573"  id="googlemap" height="250" frameborder="0"  allowfullscreen></iframe>
      <form action="#" method="post" id="frm">
    </div>
    <div class="datosContacto">
   
      <div id="contactoForm">
        <table>
          <form action="#frm" method="post" id="frm">


            <tr>
              <td>  <label for="nombre" class="fa">Nombre</label></td></tr>

            <tr><td><input name="nombre" type="text" class="input-contacto"  title="El campo  'Nombre' no es válido"></td></tr>

            <tr><td><label for="email" class="fa">E-mail</label></td></tr>

            <tr><td> <input name="email" type="email" class="input-contacto" title="El campo  'E-mail' no es válido"></td></tr>



            <tr><td> <label for="tno" class="fa">Teléfono</label></td></tr>

            <tr><td>  <input name="tno" type="text" class="input-contacto" value="" title="El campo  'Teléfono' no es válido"></td></tr>



            <tr><td> <label for="comentario" class="fa">Comentarios</label></td></tr>

            <tr><td><textarea name="comentario"  title="El campo  'Comentarios' no es válido"></textarea></td></tr>

            <tr><td><button type="button">Click Me!</button></td>
            </tr>
          </form>

        </table>
      </div>


    </div>


</body>
</html>

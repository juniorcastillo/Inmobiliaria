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

<html>
  <head>
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
            <a href="#">Home</a>
            <a href="#">Inspiration</a>
            <a href="#">Articles</a>
            <a href="#">Works</a>
            <a href="Contacto.php">Contact</a>
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
    <section>
      <div id="main">
        <div id="contenedorImagenes">
        <div id="imageness">
          <img  src="imagen/casa1.jpg" alt="Smiley face" >

          <img  src="imagen/casa2.jpg" alt="Smiley face" >

          <img  src="imagen/casa3.jpg" alt="Smiley face" >

          <img  src="imagen/casa4.jpg" alt="Smiley face" >

          <img  src="imagen/casa5.jpg" alt="Smiley face" >

          <img  src="imagen/casa6.jpg" alt="Smiley face" >
          <img  src="imagen/casa7.jpg" alt="Smiley face" >
        </div>
        </div> 
      </div>
    </section>

    <aside>

    </aside>
    <footer>

    </footer>
  </body>
</html>
</body>
</html>
<?php
/* * ***********************************************************************
  @Junior Miguel Castillo santana

 * *********************************************************************** */
?>
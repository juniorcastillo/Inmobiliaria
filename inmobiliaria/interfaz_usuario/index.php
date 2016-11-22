<?php
  session_start();
/*************************************************************************
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 * @Junior Miguel Castillo santana             @Junior Miguel Castillo santana 
 *************************************************************************/
  if(!isset($_SESSION['sesisonUser'])){
   $_SESSION['sesisonUser']=false;
    
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
           if( $_SESSION['sesisonUser']){
             echo  '<a href="../control_Usuario.php?cerrar=cierro">Sign out</a>';
           
           }else{
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
         <div class="imagen"> <img  src="imagen/casa3.jpg" alt="Smiley face" >
          <h3>IMAGEN 4</h3>
          <span>123456789 - 12345678910 - 12345678910 - 1     2   3   4   5   6   7   8   9    10    11    12    1 3   1 4</span>
        </div>
        <div class="imagen"> <img  src="imagen/casa5.jpg" alt="Smiley face" >
          <h3>IMAGEN 5</h3>
          <span>123456789 - 12345678910 - 12345678910 - 1     2   3   4   5   6   7   8   9    10    1 1    12    1 3   1 4</span>
        </div>

        <div class="imagen"> <img  src="imagen/casa6.jpg" alt="Smiley face" >
          <h3>IMAGEN 6</h3>
          <span>adfkjahdsjfosadhgfiadhfaihsdfjbAVSIUDHFUSADFHASUIDBFKJSD BLASCIOAS NO SON COMO TU LAS ESTYAS PEMSSANKFDDO OOLK FDPEFJBFIWALAN FJapujefdedenes 0ehn</span>
        </div>
        <div class="imagen"> <img  src="imagen/casa7.jpg" alt="Smiley face" >
          <h3>IMAGEN 7</h3>

        </div>
        <div class="imagen"> <img  src="imagen/casa8.jpg" alt="Smiley face" >
          <h3>IMAGEN 8</h3>
        </div>
        <div class="imagen"> <img  src="imagen/casa9.jpg" alt="Smiley face" >
          <h3>IMAGEN 9</h3>

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
/*************************************************************************
    @Junior Miguel Castillo santana
   
 *************************************************************************/

?>
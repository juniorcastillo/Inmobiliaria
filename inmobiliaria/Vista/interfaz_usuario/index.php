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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Style/Main.css">
        <script src="svg/snap.svg-min.js"></script>
        <script src="svg/codigo.js"></script>
    </head>
    <body>
        <div id="logo">

            <svg width="800px" height="600px" id="svg">
            </svg>


        </div>
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
                        <a href="#">Home</a>
                        <a href="Articulo.php">Inspiration</a>
                        <a href="Articulo.php">Articles</a>
                        <a href="Articulo.php">Works</a>
                        <a href="Contacto.php">Contact</a>
                        <?php
                        if ($_SESSION['sesisonUser']) {
                            echo '<a href="../../Controlador/control_usuario.php?cerrar=true">Sign out</a>';
                        } else {
                            ?>

                            <a href="../formulario_controlUsuario.php">Login</a>

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
                    <h1 class="section-title">Vivir bien es tu opciòn</h1>

                </div>
                <div class="section-right">
                    <button class="learn-more">Learn more</button>
                </div>
            </div>
        </section>

        <div id="main">
            <div id="contenedorImagenes">

                <div id="imageness">
                    <img  src="imagen/casa1.jpg" alt="Smiley face" >
                    <img  src="imagen/casa5.jpg" alt="Smiley face" >

                    <img  src="imagen/casa2.jpg" alt="Smiley face" >

                    <img  src="imagen/casa3.jpg" alt="Smiley face" >

                    <img  src="imagen/casa5.jpg" alt="Smiley face" >

                    <img  src="imagen/casa1.jpg" alt="Smiley face" >
                    <img  src="imagen/casa9.jpg" alt="Smiley face" >


                </div>
            </div> 
        </div>
        <div id="casa_disponibles"></div>


        <footer>
            <div><a href="https://www.facebook.com/ "  target="_blank"><p id="Facebook" ></p></a></div>

            <div><a href="#">  <p id="Gmail" ></p></a></div>

            <div><a href="#"> <p  id="youtube"><span  class="span"></span></p></a></div>

            <div><a href="#"><p id="Twitter"><span  class="span"></span></p></a></div>



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
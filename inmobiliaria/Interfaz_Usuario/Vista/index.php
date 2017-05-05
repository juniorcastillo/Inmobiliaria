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
        <link rel="stylesheet" type="text/css" href="../Vista/Style/Main.css">
        <script src="../Vista/svg/snap.svg-min.js"></script>
        <script src="../Vista/svg/codigo.js"></script>
    </head>
    <body>
        <div id="logo">

            <svg width="60px" height="60px" id="svg">
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
                        <a href="../Vista/Contacto.php">Contact</a>
                        <?php
                        if ($_SESSION['sesisonUser']) {
                            echo '<a href="../../Admin/Controlador/control_usuario.php?cerrar=true">Sign out</a>';
                        } else {
                            ?>

                        <a href="../../Admin/Vista/formulario_controlUsuario.php">Login</a>

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
                    <h1 class="section-title">Live well is your choice</h1>

                </div>
                <div class="section-right">
                    <button class="learn-more">Learn more</button>
                </div>
            </div>
        </section>

        <div id="main">

            <div id="contenedorImagenes">
                <div id="imageness">
                    <?php
                   
                    $data['listado'] = Imagen::list_galeriaIMG();
                    //Esta es la imagen --><td class="imagen"> $casa->getImagen()</td> <th>Imagen</th>
                    foreach ($data['listado'] as $casa) {
                        ?>

                    <img  src="../../Admin/Controlador/<?= $casa->getnomreIMG()?>" alt="Galeria" >
                       

                        <?php
                    }
                    ?>
                </div>
            </div> 
        </div>
        <div id="casa_disponibles">
            <h1 style="font-family: fantasy">Ventas</h1>  
            <div id="venta">   
                <?php
                   
                    $data['list_venta'] = Imagen::list_ventaIMG();
                    //Esta es la imagen --><td class="imagen"> $casa->getImagen()</td> <th>Imagen</th>
                    foreach ($data['list_venta'] as $casa) {
                        ?>
    
                      <img src="../../Admin/Controlador/<?= $casa->getnomreIMG()?>" alt="Venta">
                       

                        <?php
                    }
                    ?>
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
</body>
</html>
<?php
/* * ***********************************************************************
  @Junior Miguel Castillo santana

 * *********************************************************************** */
?>
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
                        <a href="#">Inicio</a>
                        <a href="Articulo.php">Venta</a>
                        <a href="Articulo.php">Alquiler</a>
                        <a href="Articulo.php">Informacion</a>
                        <a href="../Vista/Contacto.php">Contacto</a>
                        <?php
                        if ($_SESSION['sesisonUser']) {
                            echo '<a href="../../Admin/Controlador/control_usuario.php?cerrar=true">Cerrar sesion</a>';
                        } else {
                            ?>

                            <a href="../../Admin/Vista/formulario_controlUsuario.php">Iniciar sesion</a>

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
                    <h1 class="section-title">Vivi bien es tu Opción</h1>

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

                        <img  src="../../Admin/Controlador/<?= $casa->getnomreIMG() ?>" alt="<?= $casa->getnomreIMG() ?>" >


                        <?php
                    }
                    ?>
                </div>
            </div> 
        </div>
        <h1 class="producto">Ventas</h1> 
        
        <div id="casa_disponibles">
            
            <div class="list_img_inmuebles">   
                <?php
                $data['list_venta'] = Imagen::list_ventaIMG();
                //Esta es la imagen --><td class="imagen"> $casa->getImagen()</td> <th>Imagen</th>
                foreach ($data['list_venta'] as $casa) {
                    ?>
                   <div class="contenedor-img_Informacion">
                       <a href="../Controlador/detalles.php?idInmueble=<?= $casa->getid_inmuebleIMG()?>"> <img src="../../Admin/Controlador/<?= $casa->getnomreIMG() ?>" alt="<?= $casa->getnomreIMG() ?>"></a>
                    <div class="informacion_inmueble">
  
                        <h2><?= $casa->getprovincia_inmuebleIMG()?> </h2>
                        
                        
                    </div>
                   </div>
                    <?php
                }
                ?>
            </div>

          </div>
        <h1 class="producto">Alquiler</h1>  
          <div id="casa_disponibles">
            <div class="list_img_inmuebles"> 
                
                <?php
                $data['$list_alquiler'] = Imagen::list_alquilerIMG();
                //Esta es la imagen --><td class="imagen"> $casa->getImagen()</td> <th>Imagen</th>
                foreach ($data['$list_alquiler'] as $casa) {
                    ?>
                <div class="contenedor-img_Informacion">
                    <a href="../Controlador/detalles.php?idInmueble=<?= $casa->getid_inmuebleIMG()?>"><img src="../../Admin/Controlador/<?= $casa->getnomreIMG() ?>" alt="<?= $casa->getnomreIMG() ?>"> </a>
                    <div class="informacion_inmueble">
                          <h2><?= $casa->getprovincia_inmuebleIMG()?> </h2>
                     </div>
                    
                </div>
                   
                    <?php
                }
                ?>
            </div>
       
          </div>

        <footer>
            <span id="copyright">©Junior Miguel Castillo santana</span>
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
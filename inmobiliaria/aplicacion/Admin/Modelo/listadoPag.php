
    <?php
     $vacio="";//le mando valor vacio a cuenta usuario para poder identificar que no es de listado usuario
    //las variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page = 5; //la cantidad de registros que desea mostrar
    $adjacents = 3; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    //Cuenta el número total de filas de la tabla*/
    $numrows=Contenido::cuenta($b);//Encio el valor del buscador
    $total_pages = ceil($numrows / $per_page);
    $reload = 'index.php'; //parametro que envio a el metodo 
    // consulta principal para recuperar los datos
    // $query = $con->query("SELECT * FROM propiedad ORDER BY Referencia LIMIT $offset,$per_page");
    ?>

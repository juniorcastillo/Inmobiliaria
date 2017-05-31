<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Buscador con ajax Y php</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js" type="text/javascript"></script>


    </head>
    <body>  
        <h1>Mi Buscador</h1>
        <input type="text" id="busqueda" />
        <div id="resultado"></div>

    </body>

</html>
<script>
    $(document).ready(function () {
        var consulta;
        //hacemos focus al campo de búsqueda
        $("#busqueda").focus();

        //comprobamos si se pulsa una tecla
        $("#busqueda").keyup(function (e) {

            //obtenemos el texto introducido en el campo de búsqueda
            consulta = $("#busqueda").val();
            //hace la búsqueda                                                                                  
            $.ajax({
                type: "POST",
                url: "../Controlador/buscar.php",
                data: "b=" + consulta,
                dataType: "html",
                beforeSend: function () {
                    //imagen de carga
                    $("#resultado").html("<p align='center'><img src='img/ajax-loader.gif' /></p>");
                },
                error: function () {
                    alert("error petición ajax");
                },
                success: function (data) {
                    $("#resultado").empty();
                    $("#resultado").append(data);
                }
            });
        });
    });
</script> 
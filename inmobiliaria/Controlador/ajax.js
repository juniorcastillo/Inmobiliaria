
$(document).ready(function () {
    var idtipo;
    var idinmueble;

//---------Ordenar por el Valor del select --------------------------------------//

//Ordenar
    $('select#campos').on('change', function () {
        load(1);
    });
//Ordenar
    $('select#forma').on('change', function () {
        load(1);
    });
    load(1);
//Fin de ordenar
//-----------------------------------------------------------------------------------------------------------------

    //---- Nuevao inmueble --------------------------------------------------------------------------------------
    //Boton de nuevo inmueble 
    //Crea nueva fila al final de la tabla
    //Con dos nuevos botones (guardarnuevo y cancelarnuevo)
    //**********Valido el formulario de alta************************
    $("#formulario_alta").validate({
        errorClass: "rojo",
        validClass: "verde",
        rules: {
            fechaalta: {
                required: true,
                date: true
            },
            precioventa: {
                required: true,
                minlength: 3
            },
            direccion: {
                required: true
            },
            operacion: {
                minlength: 5,
                maxlength: 8
            },
            provincia: {
                required: true
            },
            idtipo: {
                required: true,
                minlength: 1}
        },
        messages: {
            fechaalta: {
                required: "Introducir la fecha",
                date: "No es una fecha"
            },
            precioventa: {
                required: "El campo  precio esta vacio",
                minlength: "Debes instroduccir mas digitos"
            },
            direccion: "El campo direccion esta vacio",
            operacion: "El campo operacion esta vacio",
            provincia: "El campo provincia esta vacio",
            idtipo: "El campo   esta vacio",
        }

    });
//--------Dialogo-------------------------------//
    $("#dialogonuevo").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        buttons: {
            "Guardar": function () {
                if ($("#formulario_alta").valid()) {
                    $.post("../Controlador/anadir.php", {
                        idNuevo: $("#idNuevo").val(),
                        fechaAltaNuevo: $("#fechaAltaNuevo").val(),
                        precioNuevo: $("#precioNuevo").val(),
                        direccionNuevo: $("#direccionNuevo").val(),
                        operacionNuevo: $("#operacionNuevo").val(),
                        provinciaNuevo: $("#provinciaNuevo").val(),
                        tipoNuevo: $("select#idtiponuevo").val()
                                //Campio los valores antes de que actualize
                    }, function (data, status) {
                        //$(".container-fluid").html(data);
                        load(1);

                    })//get			

                    $(this).dialog("close");
                }
            },
            "Cancelar": function () {
                $(this).dialog("close");

            }
        }//buttons
    });
    $(document).on("click", "#nuevo", function () {
        $("#dialogonuevo").dialog("open")
    });

    //------------Fin de nuevo---------------------------------------

//****************************************************//
    //Se ejecuta en el tiempo de espera del servidor
    function cargar() {
        //Muestra el gráfico de cargar
        $("#cargando").show();
    }

    //Una vez cargado vuelve a ocultar el gif animado			
    function fin() {
        $("#cargando").hide();
    }
///Date piker 
//Muestro un formulario hecho con jquery
    $("#fechaAltaModificar").datepicker({
        dateFormat: "dd-mm-yy"
    });





});//Fin Ready
//--- PAGINACION -------------------------------------------------
//--------------------------------------------------------------------------------------------------
////document ready
//Carga la pagina
function load(page) {
    var ordena_Formas = $("select#forma").val();
    var ordena_Campos = $("select#campos").val();
    var accion = "";
    //Compruebo que en que pag estoy actualmente
    if ($("div#accion").hasClass("contenedorInmueble")) {
        accion = "inmueble";
        // alert("si funciona");
    }
    if ($("div#accion").hasClass("contenedorUsuario")) {
        accion = "usuario";
        // alert("si funciona");
    }
    var parametros = {"action": accion, "page": page, "ordenar": ordena_Campos, "forma": ordena_Formas};
    $("#loader").fadeIn('slow');
    $.ajax({
        url: 'listado_controlador.php',
        data: parametros,
        beforeSend: function (objeto) {
            $("#loader").html("<img src='../Vista/img/loader.gif'>");
        },
        success: function (data) {
            $(".outer_div").html(data).fadeIn('slow');
            $("#loader").html("");
        }
    })//Ajax
//-----------Fin de la carga del listad--------------------------------------
//--------------------------------------------------------------------------------------------
//-----------Comienzo DIALOGO DE BORRADO ------------------------------------------

    $("#dialogoborrar").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        buttons: {
            //BOTON DE BORRAR
            "Borrar": function () {
                //Ajax con get
                $.get("../Controlador/borrar.php", {"idinmueble": idinmueble}, function (data, status) {
                    $("#inmueble_" + idinmueble).fadeOut(1000);
                })//get			
                //Cerrar la ventana de dialogo				
                $(this).dialog("close");
            },
            "Cancelar": function () {
                //Cerrar la ventana de dialogo
                $(this).dialog("close");
            }
        }//buttons
    });//Fin de dialogo borrar

    //Evento click que pulsa el boton borrar
    $(document).on("click", "#borrar", function () {
        //Obtenemos el idinmueble a eliminar
        //a traves del atributo idrecord del tr
        idinmueble = $(this).parents("tr").data("idinmueble");
        //Accion para mostrar el dialogo de borrar
        $("#dialogoborrar").dialog("open");
    });
//-----------------------------------------------------------------------------------------------
//**************Validate del fomulario modificar ************************
    $("#formulario").validate({
        errorClass: "rojo",
        validClass: "verde",
        rules: {
            alta: {
                required: true,
                date: true
            },
            precio: {
                required: true,
                minlength: 1
            },
            dire: {
                required: true,
            },
            operacion: {
                required: true,
                minlength: 5,
                maxlength: 8
            },
            provincia: {
                required: true
            },
            idtipo: {
                required: true,
                minlength: 1}
        },
        messages: {
            alta: {
                required: "Debe introducir la fecha.",
            },
            precio: "El campo precio esta vacio.",
            dire: "El campo direccion esta vacio",
            operacion: {
                required: "El campo operacion esta vacio",
                minlength: "la operancion no es correcta",
                maxlength: "la operancion no es correcta"
            },
            provincia: "El campo provincia esta vacio",
            idtipo: "El campo Mensaje es obligatorio.",
        }

    });//FIn de la validacion 

    //---------------------------------------------------------------------------------------------
    //-----MODIFICAR EL INMUEBLE-----------------------------------------------

    $("#dialogomodificar").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        buttons: {
            "Guardar": function () {
                if ($("#formulario").valid()) {


                    $.post("../Controlador/modificar.php", {
                        idModificar: idinmueble,
                        fechaAltaModificar: $("#fechaAltaModificar").val(),
                        precioModificar: $("#precioModificar").val(),
                        direccionModificar: $("#direModificar").val(),
                        operacionModificar: $("#operacionModificar").val(),
                        provinciaModificar: $("#provinciaModificar").val(),
                        tipoModificar: $("#tipoModificar").val(),
                        visitaModificar: $("#visitaModificar").val()
                                //Campio los valores antes de que actualize
                    }, function (data, status) {
                        //$(".container-fluid").html(data);
                        //Cambio los dadtos al instante 
                        $("#inmueble_" + idinmueble + " td.alta").html($("#fechaAltaModificar").val());
                        $("#inmueble_" + idinmueble + " td.precio").html($("#precioModificar").val());
                        $("#inmueble_" + idinmueble + " td.direccion").html($("#direModificar").val());
                        $("#inmueble_" + idinmueble + " td.operacion").html($("#operacionModificar").val());
                        $("#inmueble_" + idinmueble + " td.provincia").html($("#provinciaModificar").val());
                        $("#inmueble_" + idinmueble + " td.idtipo").html($("#tipoModificar").val());
                        $("#inmueble_" + idinmueble + " td.visita").html($("#visitaModificar").val());

                    })//get			

                    $(this).dialog("close");
                }
            },
            "Cancelar": function () {
                $(this).dialog("close");
            }
        }//buttons
    });//Fin de dialogo modificar

    //Boton Modificar	
    //Pinto los datos de cada campo
    $(document).on("click", "#modificar", function () {
        //Obtenemos lo valores de la fila que queremos modificar
        //Obtenemos el idinmueble de la fila
        idinmueble = $(this).parents("tr").data("idinmueble");
        //muentra el valor de esa fila 
        $("#idModificar").val($(this).parent().siblings("td.id").html());
        //Para que ponga el campo de la fecha de alta con su val
        $("#fechaAltaModificar").val($(this).parent().siblings("td.alta").html());
        //precio que cuesta el inmueble
        $("#precioModificar").val($(this).parent().siblings("td.precio").html());
        //direccion del inmueble
        $("#direModificar").val($(this).parent().siblings("td.direccion").html());
        //operacion este sera un select
        $("#operacionModificar").val($(this).parent().siblings("td.operacion").html());
        //provincia 
        $("#provinciaModificar").val($(this).parent().siblings("td.provincia").html());
        //Tipo de inmueble
        //Para que me seleccione el idtipomodificar
        var idtipomodificar = $(this).parent().siblings("td.idtipo").attr("name");
        $("#tipoModificar option[value='" + idtipomodificar + "']").attr("selected", true);

        //Visita
        $("#visitaModificar").val($(this).parent().siblings("td.visita").html());
        //Muestro el dialogo
        $("#dialogomodificar").dialog("open");

    });


//----------------------------------------------------


//Se ejecuta en el tiempo de espera del servidor
    function cargar() {
        //Muestra el gráfico de cargar
        $("#cargando").show();
    }

//Una vez cargado vuelve a ocultar el gif animado			
    function fin() {
        $("#cargando").hide();
    }
//-------AutoCompleta -------------//
//AUTOCOMPLETADO
    $(document).on("keypress keyup", "#buscadireccion", function () {
        var valor = $("#buscadireccion").val();
        $.get("../Vista/listado.php",
                {
                    busquedadireccion: valor
                },
                function (data) {
                    //vuelve a pintar el listado
                    $("#contenedor").html(data);
                });//get

    });
//************************************************************************************************//
//************************************************************************************************//
    // GESTION DE LOS USUARIOS CON AJAX 
//************************************************************************************************//
//***********************************************************************************************//

//**************Validate del fomulario Nuevo Usuario************************
    $("#formulario_alta_usuario").validate({
        errorClass: "rojo",
        validClass: "verde",
        rules: {
            nombreNuevoUsuario: {
                required: true,
                minlength: 3
            },
            contrasenaNuevoUsuario: {
                required: true,
                minlength: 9,
                maxlength: 16
            },
            direccionNuevoUsuario: {
                required: true
            },
            telefonoNuevoUsuario: {
                required: true,
                 minlength: 9
             
            },
            fechaNuevoUsuario: {
                required: true,
                date: true
            },
            emailNuevoUsuario: {
                required: true,
                email: true
            },
            rolNuevoUsuario: {
                required: true
                
            }
        },
        messages: {
            nombreNuevoUsuario: {
                required: "Campo nombre obligatorio",
                minlength: "No es real"
            },
            contrasenaNuevoUsuario: {
                required: "Campo contraseña obligatorio",
                minlength: "La contraseña es muy corta",
                maxlength: "La contraseña es muy larga"
            },
            direccionNuevoUsuario: {
                required: "Campo telefono obligatorio",
             
            },
            telefonoNuevoUsuario: {
                required: "Campo telefono obligatorio",
                minlength: "El numero no es correcto"
            },
            fechaNuevoUsuario: {
                required: "Campo telefono obligatorio"
                
            },
            emailNuevoUsuario: {
                required: "Campo telefono obligatorio",
                email: "Email invalido"
            },
            rolNuevoUsuario: {
                required: "Campo telefono obligatorio",
               
            }

        }

    });//FIn de la validacion 

//--------Dialogo de nuevo usuario -------------------------------//
    $("#dialogoNuevoUsuario").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        buttons: {
            "Guardar": function () {
                if ($("#formulario_alta_usuario").valid()) {
                    $.get("../Controlador/Anadir_usuario.php", {

                        nombreNuevoUsuario: $("#nombreNuevoUsuario").val(),
                        contrasenaNuevoUsuario: $("#contrasenaNuevoUsuario").val(),
                        direccionNuevoUsuario: $("#direccionNuevoUsuario").val(),
                        telefonoNuevoUsuario: $("#telefonoNuevoUsuario").val(),
                        fechaNuevoUsuario: $("#fechaNuevoUsuario").val(),
                        emailNuevoUsuario: $("#emailNuevoUsuario").val(),
                         rolNuevoUsuario: $("#rolNuevoUsuario").val()
                                //Campio los valores antes de que actualize
                    }, function (data, status) {
                       //   $(".container-fluid").html(data);
                      load(1);

                    })//get			

                    $(this).dialog("close");
                }
            },
            "Cancelar": function () {
                $(this).dialog("close");

            }
        }//buttons
    });
    $(document).on("click", "#nuevo", function () {
        $("#dialogoNuevoUsuario").dialog("open")
    });

    //------------Fin de nuevo usuario---------------------------------------

//----------Borrar Usuario---------------------------------//
    //inicio del Dialogo borrar
    $("#dialogoborrarUsuario").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        buttons: {
            //BOTON DE BORRAR
            "Borrar": function () {
                //Ajax con get
                $.get("../Controlador/borrar_usuario.php", {"idusuario": idusuario}, function (data, status) {
                    $("#usuario_" + idusuario).fadeOut(1000);
                })//get			
                //Cerrar la ventana de dialogo				
                $(this).dialog("close");
            },
            "Cancelar": function () {
                //Cerrar la ventana de dialogo
                $(this).dialog("close");
            }
        }//buttons
    });//Fin de dialogo borrar

    //Evento click que pulsa el boton borrar
    $(document).on("click", "#borrar", function () {
        //Obtenemos el idinmueble a eliminar
        //a traves del atributo idrecord del tr
        idusuario = $(this).parents("tr").data("idusuario");
        //Accion para mostrar el dialogo de borrar
        $("#dialogoborrarUsuario").dialog("open");
    });//Fin de la gestion borrar


//---------- Modificar Usuario ---------------------------------//  
//
//-----------------------------------------------------------------------------------------------
//**************Validate del fomulario modificar Usuario************************
    $("#formularioUsuario").validate({
        errorClass: "rojo",
        validClass: "verde",
        rules: {
            nombre: {
                required: true,
                minlength: 3
            },
            password: {
                required: true,
                minlength: 9,
                maxlength: 16
            },
            direccion: {
                required: true
            },
            alta: {
                required: true,
                date: true
            },
            telefono: {
                required: true,
                minlength: 9}
        },
        messages: {
            nombre: {
                required: "Campo nombre obligatorio",
                minlength: "No es real"
            },
            password: {
                required: "Campo contraseña obligatorio",
                minlength: "La contraseña es muy corta",
                maxlength: "La contraseña es muy larga"
            },
            direccion: "Campo direccion obligatorio",
            alta: "Campo fecha obligatorio",
            telefono: {
                required: "Campo telefono obligatorio",
                minlength: "El numero no es correcto"
            }
        }

    });//FIn de la validacion 

//---------Inicio de dialogo modificar Usuario--------------------//

    $("#dialogomodificarUsuario").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        buttons: {
            "Guardar": function () {
                if ($("#formularioUsuario").valid()) {


                    $.post("../Controlador/modificar_usuario.php", {
                        idModificarUsuario: idusuario,
                        nombreModificarUsuario: $("#nombreModificarUsuario").val(),
                        passwordModificarUsuario: $("#passwordModificarUsuario").val(),
                        direccionModificarUsuario: $("#direccionModificarUsuario").val(),
                        telefonoModificarUsuario: $("#telefonoModificarUsuario").val(),
                        fechaAltaModificarUsuario: $("#fechaaltaModificarUsuario").val()
                                //Campio los valores antes de que actualize
                    }, function (data, status) {
                        //  $(".container-fluid").html(data);
                        //Cambio los dadtos al instante 
                        $("#usuario_" + idusuario + " td.nombreUsuario").html($("#nombreModificarUsuario").val());
                        $("#usuario_" + idusuario + " td.passwordUsuario").html($("#passwordModificarUsuario").val());
                        $("#usuario_" + idusuario + " td.direccionUsuario").html($("#direccionModificarUsuario").val());
                        $("#usuario_" + idusuario + " td.telefonoUsuario").html($("#telefonoModificarUsuario").val());
                        $("#usuario_" + idusuario + " td.fechaaltaUsuario").html($("#fechaaltaModificarUsuario").val());

                    })//get			

                    $(this).dialog("close");
                }
            },
            "Cancelar": function () {
                $(this).dialog("close");
            }
        }//buttons
    });//Fin de dialogo modificar

//---- Inicio del boton modificar Usuario	
    //Pinto los datos de cada campo
    $(document).on("click", "#modificar", function () {
        //Obtenemos lo valores de la fila que queremos modificar
        //Obtenemos el idinmueble de la fila
        idusuario = $(this).parents("tr").data("idusuario");
        //muentra el valor de esa fila 
        $("#idModificarUsuario").val($(this).parent().siblings("td.idUsuario").html());


        //Nombre del usuario
        $("#nombreModificarUsuario").val($(this).parent().siblings("td.nombreUsuario").html());
        //Contraseña usuario
        $("#passwordModificarUsuario").val($(this).parent().siblings("td.passwordUsaurio").html());
        //direccion del usuario
        $("#direccionModificarUsuario").val($(this).parent().siblings("td.direccionUsuario").html());
        //operacion este sera un select

        //Telefono
        $("#telefonoModificarUsuario").val($(this).parent().siblings("td.telefonoUsuario").html());
        //Para que ponga el campo de la fecha de alta con su val
        $("#fechaaltaModificarUsuario").val($(this).parent().siblings("td.fechaaltaUsuario").html());
        //Muestro el dialogo
        $("#dialogomodificarUsuario").dialog("open");

    });

    ///Date piker 
//Muestro un formulario hecho con jquery
    $("#fechaaltaModificarUsuario").datepicker({

        dateFormat: 'dd-mm-yy'

    });


}
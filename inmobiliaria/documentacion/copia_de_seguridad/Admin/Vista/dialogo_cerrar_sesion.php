
<meta charset="utf-8">
<title>Mostrar Ventane Modal de forma Automático</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script>
    $(document).ready(function ()
    {
        $("#mostrarmodal").hide();
        $("#mostrarmodal").fadeIn(3000);
    });
</script>
</head>
<body style="background-color: #C5D4F7;">
    <div class="modal" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3>Cerrando sesion</h3>
                </div>
                <div class="modal-body">
                    <h4><b>BYE,  REGRESE PRONTO</b></h4>

                </div>
                <div class="modal-footer">
                    
                    <span><a href="../Vista/formulario_controlUsuario.php" data-dismiss="modal" class="btn btn-danger">Cerrar</a></span>
                </div>
            </div>
        </div>

    </div>

</body>

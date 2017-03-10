 
<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

    <style>
      body{


        background-image: url(http://www.jonaga.com/imagenes/fondo%20pagina%20fijo.jpg);
      }

    </style>
  </head>


<body>
<div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Inmobiliaria Castillo</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-6">
              <div class="well">
                  <form id="loginForm" method="POST" action="../Controlador/control_usuario.php" >
                  <div class="form-group">
                    <label for="username" class="control-label">Username</label>
                    <input type="email" class="form-control"  id="username" name="usuario" required   title="Please enter you username" placeholder="example@gmail.com"  >
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" class="form-control" id="password" name="clave"   required title="Please enter your password"  >
                    <span class="help-block"></span>
                  </div>
                  <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember" id="remember"> Remember login
                    </label>
                    <p class="help-block">(if this is a private computer)</p>
                  </div>
                  <input type="submit" class="btn btn-success btn-block" value="Iniciar"/>
                  <a href="../Vista/interfaz_usuario/index.php" class="btn btn-default btn-block">Go to the main page</a>
                </form>
              </div>
            </div>
            <div class="col-xs-6">
              <p class="lead">Register now for <span class="text-success">FREE</span></p>
              <ul class="list-unstyled" style="line-height: 2">
                <li><span class="fa fa-check text-success"></span> See all your orders</li>
                <li><span class="fa fa-check text-success"></span> Fast re-order</li>
                <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                <li><a href="#"><u>Read more</u></a></li>
              </ul>
              <p><a href="#" class="btn btn-info btn-block">Yes please, register now!</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  

</body>
</html>
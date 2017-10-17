<?php
SESSION_START();

if (isset($_SESSION['errores'])) {
 $_SESSION["errores"] = null;
}
if (isset($_SESSION['inputsValues'])) {
  $_SESSION['inputsValues'] = null;
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Log in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/css/login.css">
  </head>
  <body>
    <?php if (!empty($_SESSION['error'])): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                        <p><?php echo "El usuario no esta registrado"; ?></p>
                </div>
            </div>
        </div>
    <?php endif ?>


    <div class="contenedor">
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="registro.php">Registro</a></li>
            <li><a href="faq.php">About Us</a></li>
          </ul>
        </div>
      </nav>
      <div class="logo">
        <a href="index.php">
          <img src="./assets/images/logo.png"  style="display:inline" alt="Logo" width="250" height="250">
        </a>
      </div>

      <div class="row rompebolas">
        <div class="col-md-12">
            <div class="pr-wrap">
              <div class="pass-reset">
                <label>Enter the email you signed up with</label>
                <input type="email" placeholder="Email" />
                <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
              </div>
            </div>
          <div class="wrap">
              <p class="form-title">Sign In</p>
            <form class="login" method="post" action="controllers/login.controller.php">
                <input type="text" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" value="Sign In" class="btn btn-success btn-sm" />
              <div class="remember-forgot">
                <div class="row">
                  <div class="col-md-6">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="remember" value="True" />Remember Me
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6 forgot-pass-content">
                    <a href="javascription:void(0)" class="forgot-pass">Forgot Password</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<?php
session_start();
if (isset($_SESSION['error'])) {
 $_SESSION["error"] = null;
};

$nombre = $_SESSION['inputsValues']['nombre'] ?? '';
$email = $_SESSION['inputsValues']['email'] ?? '';
$password = $_SESSION['inputsValues']['password'] ?? '';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/registro.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php if (!empty($_SESSION['errores'])): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <?php foreach ($_SESSION['errores'] as $value): ?>
                        <p><?php echo $value; ?></p>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    <?php endif ?>

    <nav class="navbar navbar-default">
      <div class="contenedor">
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
            <li><a href="login.php">Log in</a></li>
            <li><a href="faq.php">About Us</a></li>
          </ul>
        </div>
      </div>
    </nav>
        <div class="logo">
            <a href="index.php">
            <img src="./assets/images/logo.png"  style="display:inline" alt="Bird" width="250" height="250">
          </a>
        </div>
      <div class="form-style-5">
      <form action="controllers/registro.controller.php" enctype="multipart/form-data" method="post" novalidate>
          <fieldset>
              <legend><span class="number">1</span> Register</legend>

              <div class="form-group">

                  <input type="text" class="form-control" placeholder="Nombre Completo" name="nombre" id="nombre" value="<?php echo $nombre ?>" />
                  <span class="help-block"></span>
              </div>

              <div class="form-group">

                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email ?>" />
                  <span class="help-block"></span>
              </div>

              <div class="form-group">

                  <input type="password" class="form-control" name="password" placeholder="Contraseña" id="password" value="<?php echo $password ?>" />
                  <span class="help-block" ></span>
              </div>

              <div class="form-group">

                  <input type="file" class="form-control" name="avatar" id="avatar" value="" />
                  <span class="help-block"></span>
              </div>

          </fieldset>
        <button type="submit" class="btn btn-default">Enviar</button>
      </form>
    </div>
  </body>
</html>

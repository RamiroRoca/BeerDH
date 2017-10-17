<?php

session_start();

$json = json_decode(file_get_contents('../db/usuarios.json'),true);

$errores = [];

foreach ($json as $key => $value) {
  if($value["email"] == $_POST['email']) {

    if (password_verify($_POST['password'], $value['password'])) {

      foreach ($value as $llave => $valor) {
        $_SESSION["$llave"] = $valor;
      }

      if ($_POST['remember'] == true) {
        foreach ($value as $llave => $valor) {
          $vencimiento = time() + 60 * 60 * 3;
          setcookie("$llave","$valor", "$vencimiento" ,"/");
        }
      }
      header('Location: ../index.php');
    } else {
      $_SESSION['error'] = true;
      header('Location: ../login.php');
    }
  } else {
    $_SESSION['error'] = true;
   header('Location: ../login.php');
  }
}

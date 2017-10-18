<?php
include "../db/conn.php";

session_start();

$query1 = $db->prepare('SELECT * FROM user where email = :email');
$query1->bindValue(':email', $_POST["email"], PDO::PARAM_STR);
$query1->execute();

$user = $query1->fetch(PDO::FETCH_ASSOC);
//var_dump($user);
//exit();

$errores = [];

foreach ($user as $key => $value) {
  if($key == 'email' && $value == $_POST['email']) {

    if (password_verify($_POST['password'], $user['password'])) {
    
      foreach ($user as $llave => $valor) {
        $_SESSION["$llave"] = $valor;
      }

      if ($_POST['remember'] == true) {
        foreach ($user as $llave => $valor) {
          $vencimiento = time() + 60 * 60 * 3;
          setcookie("$llave","$valor", "$vencimiento" ,"/");
        }
      }
      //var_dump($_SESSION);
      //exit;
      header('Location: ../index.php');exit;
    } 
}
}
$_SESSION['error'] = true;
header('Location: ../login.php');exit;

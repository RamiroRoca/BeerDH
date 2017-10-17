<?php
$base = 'unify_db';
$host = 'localhost';
$usuario = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$base;charset=utf8mb4;3306";
try{
  $db = new PDO($dsn, $usuario, $pass);
}
catch(PDOException $e){
  echo $e->getMessage();
  echo '<br>Disculpe las molestias, estamos en mantenimiento!';
}

/*
$first_name = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "INSERT INTO user (first_name,last_name, email, password)VALUES ('$first_name', 'hola', '$email', '$password')";
$query = $db->prepare($sql);
$query->execute();
$query = $db->query('SELECT * from user');
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);*/
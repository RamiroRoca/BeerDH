<?php

session_start();
require_once '../clases/usuario.php';
require_once '../clases/DBFactory.php';
require_once '../clases/MySQLDB.php';

include "../db/conn.php";

DBFactory::$db_type = 'MySQLDB';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];


$errores = [];
$query1 = $db->query('SELECT $email FROM user');  

//Validación
$nombre = trim($_POST['nombre']);
if (empty($nombre)) {
	$errores['nombre'] = 'El nombre es obligatorio';
}

$email = trim($_POST['email']);
if (empty($email)) {
	$errores['email'] = 'El email es obligatorio';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errores['email'] = 'El email ingresado no es válido';
}

$password = trim($_POST['password']);
if (empty($password)) {
	$errores['password'] = 'El password es obligatorio';
}

if ($query1 != null) {
	$errores['email'] = 'El email ya existe en la base';
}

if ($errores) {
	$_SESSION['errores'] = $errores;
	$_SESSION['inputsValues'] = $_POST;
	header('Location: ../registro.php');
	exit;
} if (isset($_SESSION['errores'])) {
	unset($_SESSION['errores']);
};

//Crear Imagen
$imageName = uniqid();
$nombreCompleto = guardarImagen('avatar', $imageName, '../avatars/');
/*
//Password hash
$password = password_hash("$password", PASSWORD_DEFAULT);

//Guardar usuario
$sql = "INSERT INTO user (nombre, email, password)VALUES ('$nombre', '$email', '$password')";
$query = $db->prepare($sql);
$query->execute();
*/


$usuario = new Usuario( $_POST['nombre'],$_POST['email'],$_POST['password']);
$usuario->save();


/*
$usuario->find();
$actualUser = $usuario->fetchAll(PDO::FETCH_ASSOC);

//Recuperar data
$query2 = $db->query('SELECT * from user');
$query2->execute();
$results = $query2->fetchAll(PDO::FETCH_ASSOC);
*/


function guardarImagen($inputName, $imageName, $path)
{
	if ($_FILES[$inputName]['error'] == UPLOAD_ERR_OK) {
		$ext = pathinfo($_FILES[$inputName]['name'], PATHINFO_EXTENSION);
		move_uploaded_file(
			$_FILES[$inputName]['tmp_name'],
			$path.$imageName.'.'.$ext
		);
		return $imageName.'.'.$ext;
	}
}

header('Location: ../login.php');
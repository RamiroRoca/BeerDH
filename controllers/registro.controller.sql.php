<?php

session_start();

include "../db/conn.php";

$first_name = $_POST['nombre'];
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


//Guardar usuario
$sql = "INSERT INTO user (first_name,last_name, email, password)VALUES ('$first_name', 'hola', '$email', '$password')";
$query = $db->prepare($sql);
$query->execute();


//Recuperar data
$query2 = $db->query('SELECT * from user');
$query2->execute();
$results = $query2->fetchAll(PDO::FETCH_ASSOC);


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


<?php
	session_start();
	session_destroy();

	foreach ($_COOKIE as $key => $value) {
		setcookie("$key", "$value", time() - 3000, "/");
	}

	header("Location: ../index.php");

<?php
if (session_status() !== PHP_SESSION_ACTIVE){
	session_start();
	if (empty($_SESSION['userName']) and empty($_SESSION['userPassword'])) {
		header('location: login.php');
	}
}

include("connection.php");

if (isset($_POST['func'])) {
	session_destroy();
	header('location: index.php');
}
	


?>
<!DOCTYPE html>
<html>
<head>
	<title>O login deu certo!!</title>
	<style>
		body{
			font-family:Arial;
		}
	</style>
</head>
<body>
	<h1>Olá, Mundo!</h1>
	<p>Esse é um site que foi acessado graças ao sistema de login :)</p>

	<form action="index.php" method="POST">
		<input type="submit" name="func" value="Sair">
	</form>
</body>
</html>
<?php 

include("connection.php");

if (isset($_POST["login"])) {

	$name = $_POST["userName"];
	$password = md5($_POST["userPassword"]);

	$sql = "SELECT count(*) FROM user WHERE userName = '$name' AND userPassword = md5('$password')";

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="loginBody">
		<h1 class="title">Login</h1>
		<form action="login.php" method="POST">
			<p><input type="text" name="userName" placeholder="Nome ou E-mail" class="data" required></p>
			<p><input type="password" name="userPassword" placeholder="Senha" maxlength="15" class="data" required></p>
			<p><input type="submit" name="login" value="Fazer login" class="send"><a href="register.php" id="register">Cadastre-se</a></p>
		</form>
	</div>
</body>
</html>
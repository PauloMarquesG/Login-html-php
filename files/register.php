<?php 

include("connection.php");

	if (isset($_POST["register"])) {
		if ($_POST["userPassword"]==$_POST["userPassword2"]) {

			$name = $_POST["userName"];
			$password = md5($_POST["userPassword"]);
			$email = $_POST["userEmail"];

			$sql = "INSERT INTO user (idUser, userName, userPassword, userEmail) VALUES (null, '$name', '$password', '$email')";
			if ($connection -> query($sql)){
				header("Location: login.php");
			}else{
				echo "Erros no banco de dados";
			}
		}else{
			echo "<script type='text/javascript'>alert('Senhas diferentes!');</script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="_css/style.css">
</head>
<body>
	<div id="loginBody">
		<h1 class="title">Cadastro</h1>
		<form action="register.php" method="POST">
			<p><input type="text" name="userName" placeholder="Nome" class="data" required></p>
			<p><input type="email" name="userEmail" placeholder="E-mail" class="data" required></p>
			<p><input type="password" name="userPassword" placeholder="Senha" maxlength="15" class="data" required>
			<p><input type="password" name="userPassword2" placeholder="Confirme senha" maxlength="15" class="data" required></p>
			<p><input type="submit" name="register" value="Fazer Cadastro" class="send"></p>
		</form>
	</div>
</body>
</html>
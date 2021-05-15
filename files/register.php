<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
  session_start();
}
include("connection.php");

	if (isset($_POST["register"])) {
		if ($_POST["userPassword"]==$_POST["userPassword2"]) {
			$fullName = $_POST["fullName"];
			$name = $_POST["userName"];
			$password = md5($_POST["userPassword"]);
			$email = $_POST["userEmail"];

			$sql = "SELECT * FROM user WHERE userName = '$name' AND userEmail = '$email'";

			$sqli = $connection->query($sql) or die($connection->error);
			$aux=1;
			while ($dado = $sqli->fetch(PDO::FETCH_OBJ)) {	
				$aux++;
			}
			if ($aux>1) {
				echo '<script>window.alert("Nome de usuário ou e-mail já cadastrado!")</script>';
			}else{
			
				$sql = "INSERT INTO user (idUser, fullName, userName, userPassword, userEmail) VALUES (null, '$fullName', '$name', '$password', '$email')";
			
				if ($connection -> query($sql)){
					include("login.php");
				}else{
					echo "Erros no banco de dados";
				}

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
			<p><input type="text" name="fullName" placeholder="Nome completo" class="data" required></p>
			<p><input type="text" name="userName" placeholder="Nome de usuário" class="data" required></p>
			<p><input type="email" name="userEmail" placeholder="E-mail" class="data" required></p>
			<p><input type="password" name="userPassword" placeholder="Senha" maxlength="15" class="data" required>
			<p><input type="password" name="userPassword2" placeholder="Confirme senha" maxlength="15" class="data" required></p>
			<p><input type="submit" name="register" value="Fazer Cadastro" class="send"><a href="login.php" class="lr">Login</a></p>
		</form>
	</div>
	<footer>
		<hr/>
		<p class="rights">&copy; 2021 | By - <span style="font-style: italic;">Paulo Marques Gonçalves</span></p>
	</footer>
</body>
</html>
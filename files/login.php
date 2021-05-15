<?php 

if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
	session_start();
}

include("connection.php");//conexão com banco de dados

	if (isset($_POST['login'])) {//Verifica se o login foi chamado

		$name = $_POST['userName'];
		$password = md5($_POST['userPassword']);

		$sql = "SELECT * FROM user WHERE userName = '$name' AND userPassword = '$password'";

		$sqli = $connection->query($sql) or die($connection->error);

		if ($dado = $sqli->fetch(PDO::FETCH_OBJ)) {
			$_SESSION['userName'] = $name;//salva os dados na sessão
			$_SESSION['userPassword'] = $password;//salva os dados na sessão
			header('location: index.php');//direciona para o site index
		}else{
			echo '<script>window.alert("Login não encontrado!")</script>';
		}

	}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="_css/style.css">
</head>
<body>
	<div id="loginBody">
		<h1 class="title">Login</h1>
		<form action="login.php" method="POST">
			<p><input type="text" name="userName" placeholder="Nome ou E-mail" class="data" required></p><!-- Nome para login -->
			<p><input type="password" name="userPassword" placeholder="Senha" maxlength="15" class="data" required></p><!-- Senha para login -->
			<p><input type="submit" name="login" value="Fazer login" class="send"><a href="register.php" class="lr">Cadastre-se</a></p><!-- Fazer login ou cadastro -->
		</form>
	</div>
	<footer>
		<hr/>
		<p class="rights">&copy; 2021 | By - <span style="font-style: italic;">Paulo Marques Gonçalves</span></p><!-- Rodapé genérico -->
	</footer>
</body>
</html>
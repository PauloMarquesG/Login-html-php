<?php
	try{
		$connection = new PDO("mysql:host=localhost; dbname=Company","root","");
		$connection->exec("set names utf-8");
	}
	catch(PDOException $e){
		echo "Falha:". $e->getMessage();
		exit();
	}
?>
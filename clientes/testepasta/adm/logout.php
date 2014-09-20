<?php 
	require("../class/Conexao.class.php");
	require("../class/Login.class.php");
	require("../class/Security.class.php");
	//Variaveis
	$conect = new Conexao();
	$seguranca = new Security();

	$logando = new Login();
	$logando->logout('index.php');
?>
<?php
	//Require
	require("../class/Conexao.class.php");
	require("../class/Login.class.php");
	require("../class/Security.class.php");
	//Variaveis
	$conect = new Conexao();
	$seguranca = new Security();
	//Pegando Posts
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	//Metodos de Seguranca
	$login = $seguranca->escapeString($login);
	$senha = $seguranca->escapeString($senha);
	//Hash e Salt
	$salt = '18a7sdzxssawdrr';
	$login = $login.$salt;
	$senha = $senha.$salt;
	
	$login = $seguranca->sha512($login);
	$senha = $seguranca->sha512($senha);
	
//echo $login.'<br />'.$senha;

	$pagina = "painel.php";
	$logando = new Login();
	$logando->logar($login,$senha,$pagina);
	if(($logando->logar($login,$senha,$pagina))){
		header('Location: index.php?login=erro');
	}
?>
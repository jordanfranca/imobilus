<?php
	//Require
	require('../models/CRUD.model.php');
	require('../etc/class/Conexao.class.php');
	require("../etc/class/Login.class.php");
	require("../etc/helpers/Helpers.class.php");
	//Variaveis
	//Conexão
	mysql_connect('localhost', 'root', '');
	mysql_select_db('imobilus');
	//Pegando Posts
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	//Metodos de Seguranca
	$login = Helpers::escapeString($login);
	$senha = Helpers::escapeString($senha);
	//Hash e Salt
	$login = $login;
	$senha = $senha;
	
	$login = Helpers::sha512($login);
	$senha = Helpers::sha512($senha);

	$pagina = "/adm/?pg=painel";
	$logando = new Login();
	if(($logando->logar($login,$senha,$pagina))){
		header('Location: /login&erro=true');
	}
?>
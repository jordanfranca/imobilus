<?php 
	//Require de Models
	require('models/CRUD.model.php');
	require('etc/class/Conexao.class.php');
	require("models/Cadastro.model.php");
	require("etc/helpers/Helpers.class.php");
	require("etc/class/Email.class.php");
	require("etc/phpmailer/phpmailer.inc.php");
	require("etc/phpmailer/smtp.inc.php");
	require("controllers/page.controller.php");
	
	//Conexão
	$objConexao = new Conexao();
	$objConexao->instance();

	//Definições do website
	$strTitulo = 'Imobilus -  ';

	//Logica das páginas
	$strAtual       = (isset($_GET['pg'])) ? $_GET['pg'] : 'home';
	$arrPermissao   = array('home');
	$strPasta       = 'controllers';
	if(substr_count($strAtual, '/') > 0) {
		$strAtual   = explode('/',$strAtual);
		$strPagina  = (file_exists("{$strPasta}/".$strAtual[0].'.controller.php') && in_array($strAtual[0], $arrPermissao)) ? $strAtual[0] : 'erro';
	}
	else
		$strPagina  = (file_exists("{$strPasta}/".$strAtual.'.controller.php') && in_array($strAtual, $arrPermissao)) ? $strAtual : 'erro';

	//Lógica de Metodos
	$strMetodo       = ((isset($strAtual[1])) && (strlen($strAtual[1]) > 1)) ? $strAtual[1] : 'index';
	//Header
	require("views/header.view.php");
	//Conteudo
	require("{$strPasta}/{$strPagina}.controller.php");
	//Footer
	require("views/footer.view.php");
	
	//Fechar Conexao
	$objConexao->__destruct();
?>

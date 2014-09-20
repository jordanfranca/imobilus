<?php
//Recupera o valor do metodo para o painel adm
$strMetodo       = ((isset($_GET['pg'])) && (strlen($_GET['pg']) > 1)) ? $_GET['pg'] : false;

//Caso não exista, irá para a página de login
if(!$strMetodo)
	header('Location: /login');

//Caso exista, continua a logica
//Require de Models
require('../models/CRUD.model.php');
require('../etc/class/Conexao.class.php');
require("../models/Cadastro.model.php");
require("../models/Slide.model.php");
require("../models/Website.model.php");
require("../etc/helpers/Helpers.class.php");
require("../etc/class/Email.class.php");
require("../etc/phpmailer/phpmailer.inc.php");
require("../etc/phpmailer/smtp.inc.php");
require("../controllers/page.controller.php");
require("../etc/helpers/HTML.class.php");
require("../etc/class/Login.class.php");

if($strMetodo == 'login') {
	//Redireciona para login
	header('Location: /login');
}
else {
	mysql_connect('localhost', 'root', '');
	mysql_select_db('gts');


	$verifica = new Login();
	$verifica->verificar('/adm/?pg=login');

	mysql_close();

	//Conexão
	$objConexao = new Conexao();
	$objConexao->instance();

	//Buscar Website do usuário
	$website = new Website();
	$website->setUsuario($_SESSION['codigo']);
	$_SESSION['websitebool'] = $website->getWebsite();
	$_SESSION['codigowebsite']  = $website->getCodigo();
	$_SESSION['websiteativo'] = $website->getAtivo();

	//Header
	require("../views/adm/header.view.php");

	//Menu
	require("../views/adm/menu.view.php");

	//Controlador de todo o adm
	require("../controllers/adm.controller.php");

	//Footer
	require("../views/adm/footer.view.php");

}




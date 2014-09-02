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
require("../etc/helpers/Helpers.class.php");
require("../etc/class/Email.class.php");
require("../etc/phpmailer/phpmailer.inc.php");
require("../etc/phpmailer/smtp.inc.php");
require("../controllers/page.controller.php");
require("../etc/helpers/HTML.class.php");

//Conexão
$objConexao = new Conexao();
$objConexao->instance();


//Header
require("../views/adm/header.view.php");

//Menu
require("../views/adm/menu.view.php");

//Controlador de todo o adm
require("../controllers/adm.controller.php");

//Footer
require("../views/adm/footer.view.php");
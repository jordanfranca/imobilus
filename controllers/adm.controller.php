<?php

	class AdmController extends Page{
		public function index() {
			require("views/adm/cadastro.view.php");
		}
		
		public function painel() {
			$imovel = new Imovel();
			$imovel->setWebsite($_SESSION['codigowebsite']);
			$boolimovel = $imovel->getImoveis();
			require("../views/adm/painel.view.php");
		}
		
		public function adicionarimovel() {
			require("../views/adm/adicionarimovel.view.php");
		}

		public function adicionarfoto() {
			require("../views/adm/adicionarfoto.view.php");
		}

		public function criarwebsite() {
			$template = new Template();
			$templates = $template->getTemplates();
			require("../views/adm/criarwebsite.view.php");
		}

		public function editarwebsite() {
			$template = new Template();
			$templates = $template->getTemplates();
			$website = new Website();
			$website->setUsuario($_SESSION['codigo']);
			$boolwebsite = $website->getWebsite();

			if($boolwebsite)
				require("../views/adm/editarwebsite.view.php");
			else
				self::error();
		}

		public function template() {
			$template = new Template();
			$templates = $template->getTemplates();
			require("../views/adm/template.view.php");
		}

		public function editarconta() {
			$objUsuario = new Cadastro();
			$objUsuario->setStrEmail($_SESSION['login']);
			$objUsuario->getCadastroByEmail();
			require("../views/adm/editarconta.view.php");
		}

		public function slides() {
			$slide = new Slide();
			$slide->setWebsite($_SESSION['codigowebsite']);
			$slides = $slide->getSlides();
			require("../views/adm/slides.view.php");
		}
		
		public function error() {
			require("../views/adm/erro.view.php");
		}
	}
	
	//Verifica Metodo na classe
	$objClass = new AdmController();
	Helpers::getMetodo($objClass, $strMetodo);
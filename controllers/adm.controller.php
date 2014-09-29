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
			$estado = new Estados();
            $bool = $estado->getEstados();
			require("../views/adm/adicionarimovel.view.php");
		}

		public function adicionarfotosimovel() {
			$imovel = new Imovel();
			$id = (int) $_GET['id'];
			$imovel->setWebsite($_SESSION['codigowebsite']);
			$imovel->setCodigo($id);
			$foto = new Fotos();
			$foto->setImovel($id);
			$bool = $imovel->getImoveisID();
			if($bool != false) {
				$boolfotos = $foto->getFotos();
				require("../views/adm/adicionarfotosimovel.view.php");
			}
			else
				self::error();
		}


		public function editarimovel(){
			$imovel = new Imovel();
			$id = (int) $_GET['id'];
			$imovel->setWebsite($_SESSION['codigowebsite']);
			$imovel->setCodigo($id);

			$bool = $imovel->getImoveisID();
			if($bool != false)
				require("../views/adm/editarimovel.view.php");
			else
				self::error();
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
<?php

	class AdmController extends Page{
		public function index() {
			require("views/adm/cadastro.view.php");
		}
		
		public function painel() {
			require("../views/adm/painel.view.php");
		}
		
		public function adicionarimovel() {
			require("../views/adm/adicionarimovel.view.php");
		}

		public function adicionarfoto() {
			require("../views/adm/adicionarfoto.view.php");
		}

		public function editarconta() {
			$objUsuario = new Cadastro();
			$objUsuario->setStrEmail($_SESSION['login']);
			$objUsuario->getCadastroByEmail();
			require("../views/adm/editarconta.view.php");
		}

		public function slides() {
			require("../views/adm/slides.view.php");
		}
		
		public function error() {
			require("../views/adm/erro.view.php");
		}
	}
	
	//Verifica Metodo na classe
	$objClass = new AdmController();
	Helpers::getMetodo($objClass, $strMetodo);
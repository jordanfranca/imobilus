<?php

	class CadastroController extends Page{
		public function index() {
			require("views/cadastro/cadastro.view.php");
		}
	
		public function error() {
			require("views/erro/erro.view.php");
		}
	}
	
	//Verifica Metodo na classe
	$objClass = new CadastroController();
	Helpers::getMetodo($objClass, $strMetodo);
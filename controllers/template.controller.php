<?php

	class TemplateController extends Page{
		public function index() {
			$template = new Template();
			$templates = $template->getTemplates();
			require("views/template/templates.view.php");
		}
	
		public function error() {
			require("views/erro/erro.view.php");
		}
		
	}
	
	//Verifica Metodo na classe
	$objClass = new TemplateController();
	Helpers::getMetodo($objClass, $strMetodo);
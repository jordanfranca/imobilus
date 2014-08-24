<?php

	class HomeController extends Page{
		public function index() {
			require("views/home/home.view.php");
		}
	
		public function error() {
			require("views/erro/erro.view.php");
		}
		
	}
	
	//Verifica Metodo na classe
	$objClass = new HomeController();
	Helpers::getMetodo($objClass, $strMetodo);
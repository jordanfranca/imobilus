<?php

	class LoginController extends Page{
		public function index() {
			$intConfirma = 0;
			require("views/login/login.view.php");
		}
	
		public function error() {
			require("views/erro/erro.view.php");
		}
	}
	
	//Verifica Metodo na classe
	$objClass = new LoginController();
	Helpers::getMetodo($objClass, $strMetodo);
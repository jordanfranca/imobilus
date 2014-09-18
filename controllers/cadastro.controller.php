<?php

	class CadastroController extends Page{
		public function index() {
			$intConfirma = 0;
			require("views/cadastro/cadastro.view.php");
		}
	
		public function error() {
			require("views/erro/erro.view.php");
		}
		
		public function add() {
			$objCadastro = new Cadastro();
			$objCadastro->setIntCreci($_POST['creci']);
			$objCadastro->setStrEmail($_POST['email']);
			$objCadastro->setStrNome($_POST['nome']);
			$objCadastro->setStrSenha(Helpers::sha512($_POST['creci'] . $_POST['senha']));
			$objCadastro->setStrHash($strHash = Helpers::sha512(Helpers::geraSenha()));
				
			$objCadastro->Inserir();
			$objEmail = new Email();
			$objEmail->confirmaCadastro($_POST['email'], $_POST['nome'], $strHash);
				
		}
		
		public function confirmacao() {
			//Pegando inputs
			$strHash = $_GET['cod'];
			$strEmail = $_GET['email'];
			
			//Obj de Cadastro
			$objCadastro = new Cadastro();
			$objCadastro->setStrEmail($strEmail);
			$boolCadastro = $objCadastro->getCadastroByEmail();
			if($boolCadastro) {
				if($objCadastro->getStrHash() == $strHash) {
					$boolCadastro = $objCadastro->confirmaCadastro();
					if($boolCadastro)
						$intConfirma = 1;
					else 
						$intConfirma = 2;
				}
				else 
					$intConfirma = 2;
			}
			else 
				$intConfirma = 3;
			require('views/cadastro/cadastro.view.php');
		}
		
		public function consultarId () {
			$objCadastro = new Cadastro();
			$objCadastro->setIntCodigo($_POST['id']);
			$objCadastro->getCadastro();
		}
		
	}
	
	//Verifica Metodo na classe
	$objClass = new CadastroController();
	Helpers::getMetodo($objClass, $strMetodo);
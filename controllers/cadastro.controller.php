<?php

	class CadastroController extends Page{
		public function index() {
			require("views/cadastro/cadastro.view.php");
		}
	
		public function error() {
			require("views/erro/erro.view.php");
		}
		
		public function add() {
			//Validações de Cadastro
			

			$objCadastro = new Cadastro();
			$objCadastro->setIntCreci($_POST['creci']);
			$objCadastro->setStrEmail(Helpers::sha512($_POST['email']));
			$objCadastro->setStrNome($_POST['nome']);
			$objCadastro->setStrSenha(Helpers::sha512($_POST['senha']));
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
			$objCadastro->setStrEmail(base64_encode($strEmail));
			$boolCadastro = $objCadastro->getCadastroByEmail();
			if($boolCadastro) {
				if($objCadastro->getStrHash() == $strHash) {
					$boolCadastro = $objCadastro->confirmaCadastro();
					if($boolCadastro) {
						$confirm = 1;
						$msg = base64_encode("Cadastro confirmado com sucesso!");
					}
					else {
						$confirm = 2;
						$msg = base64_encode("Ocorreu algum erro, por favor tente novamente!");
					}
				}
				else {
					$confirm = 2;
					$msg = base64_encode("Ocorreu algum erro, por favor tente novamente!");
				}
			}
			else {
				$confirm = 2;
				$msg = base64_encode("Cadastro não encontrado!");
			}
			require('views/login/login.view.php');
		}
		
		public function consultarId () {
			$objCadastro = new Cadastro();
			$objCadastro->setIntCodigo($_POST['id']);
			$objCadastro->getCadastro();
		}
		
		public function recuperarsenha() {
			require('views/cadastro/recuperarsenha.view.php');
		}

	}
	
	//Verifica Metodo na classe
	$objClass = new CadastroController();
	Helpers::getMetodo($objClass, $strMetodo);
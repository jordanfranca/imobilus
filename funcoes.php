<?php 
	//Require de models
	require('models/CRUD.model.php');
	require('etc/class/Conexao.class.php');
	require("models/Cadastro.model.php");
	require("etc/helpers/Helpers.class.php");
	require("etc/class/Email.class.php");
	require("etc/phpmailer/phpmailer.inc.php");
	require("etc/phpmailer/smtp.inc.php");
	require("controllers/page.controller.php");
	require("etc/helpers/HTML.class.php");
	
	//Conexão
	$objConexao = new Conexao();
	$objConexao->instance();

	if(!(isset($_GET['ac']))) 
		header('Location: /');
	else {
		$ac = $_GET['ac'];
		switch ($ac) {
			case 'adduser':
				//Valida posts
				$boolPosts = false;
				$msgErro   = 'Ocorreu um erro ao enviar o formulário por favor preencha o(s) campo(s) obrigatório(s) : ';

				//Pegando get de post
				if($_POST['nome'] == '') {
					$msgErro .= 'Nome, ';
					$boolPosts = true;
				}

				if($_POST['email'] == '') {
					$msgErro .= 'E-mail, ';
					$boolPosts = true;
				}

				if($_POST['senha'] == '') {
					$msgErro .= 'Senha, ';
					$boolPosts = true;
				}

				if($_POST['senha2'] == '') {
					$msgErro .= 'Senha novamente, ';
					$boolPosts = true;
				}

				if($_POST['creci'] == '') {
					$msgErro .= 'CRECI, ';
					$boolPosts = true;
				}

				if($boolPosts)
					header('Location: /cadastro/&confirm=2&msg='.base64_encode($msgErro));
				else {
					//Pegando posts
					$nome = $_POST['nome'];
					$email = $_POST['email'];
					$senha = $_POST['senha'];
					$senha2 = $_POST['senha2'];
					$creci = $_POST['creci'];

					if($senha != $senha2)
						header('Location: /cadastro/&confirm=2&msg='.base64_encode("Digite a senha corretamente nos campos Senha e Repita a senha!"));
					else {
						$objCadastro = new Cadastro();
						$objCadastro->setStrEmail(Helpers::sha512($email));
						$boolemail = $objCadastro->getCadastroByEmail();
						if($boolemail)
							header('Location: /cadastro/&confirm=2&msg='.base64_encode("E-mail já cadastrado no sistema, por favor tente novamente!"));
						else {
							if(!(Helpers::validaemail($email))) 
								header('Location: /cadastro/&confirm=2&msg='.base64_encode("Digite um e-mail válido"));
							else {
								//Adiciona usuário
								$objCadastro->setIntCreci($creci);
								$objCadastro->setStrEmail(Helpers::sha512($email));
								$objCadastro->setStrNome($nome);
								$objCadastro->setStrSenha(Helpers::sha512($senha));
								$objCadastro->setStrHash($strHash = Helpers::sha512(Helpers::geraSenha()));
									
								$objCadastro->Inserir();
								$objEmail = new Email();
								$objEmail->confirmaCadastro($email, $nome, $strHash);
								header('Location: /login/&confirm=1&msg='.base64_encode("Usuário cadastrado com sucesso! Confirme seu cadastro via e-mail!"));
							}
						}
					}
				}
			break;
			
			default:
				header('Location: /');
			break;
		}
	}

?>
<?php 
	//Require de Models
	require('../models/CRUD.model.php');
	require('../etc/class/Conexao.class.php');
	require("../etc/helpers/Helpers.class.php");
	require("../etc/helpers/HTML.class.php");
	require("../models/Template.model.php");
	require("../etc/class/Canvas.class.php");
	require("../etc/apis/cpanel/xmlapi.php");

	//Conexão
	$objConexao = new Conexao();
	$objConexao->instance();

	//Sessao
	session_start();

	//Pega a ação do usuário
	$action = $_GET['ac'];

	switch ($action) {

		case 'deslogar':
			session_destroy();
			header('Location: /');
		break;

		case 'adicionartemplate':
			//Valida posts
			$boolPosts = false;
			$msgErro   = 'Ocorreu um erro ao enviar o formulário por favor preencha o(s) campo(s) obrigatório(s) : ';

			//Pegando get de post
			if(!(isset($_POST['nome']))) {
				$msgErro .= 'Nome, ';
				$boolPosts = true;
			}
				
			if(!(isset($_POST['versao']))) {
				$msgErro .= 'Versão, ';
				$boolPosts = true;
			}
				
			if($_FILES['zip']['tmp_name'] == '') {
				$msgErro .= 'Arquivo .zip, ';
				$boolPosts = true;
			}
				
			if($_FILES['miniatura']['tmp_name'] == '' ) {
				$msgErro .= 'Miniatura do template, ';
				$boolPosts = true;
			}
				
			if(!(isset($_POST['ativo']))) {
				$msgErro .= 'Ativo ';
				$boolPosts = true;
			}

			if($boolPosts)
				header('Location: /admgeral/?pg=template&confirm=2&msg='.base64_encode($msgErro));

			else {
				//Get Posts
				$nome = $_POST['nome'];
				$versao = $_POST['versao'];
				$zip = $_FILES['zip'];
				$miniatura = $_FILES['miniatura'];
				$ativo = $_POST['ativo'];
				
				//Novo nome para template
				$novonome = Helpers::sha512($zip['name'].date('D/M/Y hh:mm:ss'));
				if(!move_uploaded_file($zip['tmp_name'], '../templates/zip/'.$novonome.'.zip')) {
					$msg = base64_encode("Ocorreu um erro ao adicionar um novo template, tente novamente!");
					header('Location: /admgeral/?pg=template&confirm=2&msg='.$msg);
				}
					
				//Miniatura
				$relogo = Helpers::fotos($miniatura, 150, "../templates/miniaturas", 'template');
				$canvas = new Canvas();

				//Miniatura
				$canvas->carrega("../templates/miniaturas/".$relogo."");
				$canvas->redimensiona(150,150,'crop');
				$canvas->grava("../templates/miniaturas/".$relogo."", 100);
				$canvas->resetar();	
				
				$template = new Template();
				$template->setNome($nome);
				$template->setVersao($versao);
				$template->setPasta($novonome.'.zip');
				$template->setMiniatura($relogo);
				$template->setAtivo($ativo);

				$template->Adicionar();

				//Mensagem para o usuário
				$msg = base64_encode("Tempalte adicionado com sucesso!");
				header('Location: /admgeral/?pg=template&confirm=1&msg='.$msg);
			}
		break;

		//Desativar Template
		case 'desativartemplate':
			$template = new Template();
			if(!(isset($_GET['id']))) {
				$msg = base64_encode("Ocorreu um erro ao tentar desativar o template, tente novamente!");
				header('Location: /admgeral/?pg=template&confirm=2&msg='.$msg);
			}
			else {
				$id = (int) $_GET['id'];
				$template->setCodigo($id);
				$template->desativarTemplate();

				$msg = base64_encode("Template desativado com sucesso!");
				header('Location: /admgeral/?pg=template&confirm=1&msg='.$msg);
			}
		break;

		//Ativar Template
		case 'ativartemplate':
			$template = new Template();
			if(!(isset($_GET['id']))) {
				$msg = base64_encode("Ocorreu um erro ao tentar ativar o template, tente novamente!");
				header('Location: /admgeral/?pg=template&confirm=2&msg='.$msg);
			}
			else {
				$id = (int) $_GET['id'];
				$template->setCodigo($id);
				$template->ativarTemplate();

				$msg = base64_encode("Template ativado com sucesso");
				header('Location: /admgeral/?pg=template&confirm=1&msg='.$msg);
			}
		break;

		//Default
		default:
			header('Location: /admgeral/?pg=painel');
		break;
	}
?>
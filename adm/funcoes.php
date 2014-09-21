<?php 
	//Require de Models
	require('../models/CRUD.model.php');
	require('../etc/class/Conexao.class.php');
	require("../etc/helpers/Helpers.class.php");
	require("../etc/class/Email.class.php");
	require("../models/Slide.model.php");
	require("../models/Cadastro.model.php");
	require("../models/Subdominio.model.php");
	require("../models/Website.model.php");
	require("../models/Template.model.php");
	require("../etc/class/Canvas.class.php");
	require("../etc/class/Subdominio.class.php");
	require("../etc/apis/cpanel/xmlapi.php");

	//Conexão
	$objConexao = new Conexao();
	$objConexao->instance();

	//Sessao
	session_start();

	$action = $_GET['ac'];

	switch ($action) {
		case 'addSlide':
				$slide = $_FILES['slide'];
				$reslide = Helpers::fotos($slide, 800, "../web/storage/slides");
				$canvas = new Canvas();

				//Faz foto no formato de templates
				$canvas->carrega("../web/storage/slides/".$reslide."");
				$canvas->redimensiona(800,400,'crop');
				$canvas->grava("../web/storage/slides/".$reslide."", 100);
				$canvas->resetar();	

				$slide = new Slide();
				$slide->setCaminho($reslide);
				$slide->setWebsite($_SESSION['codigowebsite']);
				$slide->Inserir();

				header('Location: /adm/?pg=slides');
			break;

		case 'excluirslide':
			$id = (int) $_GET['id'];
			$foto = $_GET['foto'];
			$objSlide = new Slide();
			$objSlide->setCodigo($id);
			$objSlide->Deletar();
			unlink("../web/storage/slides/".$foto);
			header('Location: /adm/?pg=slides');
		break;

		case 'editarconta':

			$nome = $_POST['nome'];
			$creci = $_POST['creci'];
			$senha = $_SESSION['senha'];

			$cadastro = new Cadastro();
			$cadastro->setStrEmail($_SESSION['login']);
			$cadastro->setIntCreci($creci);
			$cadastro->setStrSenha($senha);
			$cadastro->setStrNome($nome);

			$cadastro->Atualizar();

			//Atualizando session
			$_SESSION['nome'] = $nome;

			header('Location: /adm/?pg=editarconta');
		break;
		
		case 'desativarconta':
			//Desativar conta
			$cadastro = new Cadastro();
			$cadastro->setStrEmail($_SESSION['login']);
			$cadastro->desativarConta();

			session_destroy();
			header('Location: /login');
		break;

		case 'deslogar':
			session_destroy();
			header('Location: /login');
		break;

		case 'criarwebsite':
			$titulo = $_POST['titulo'];
			$subdominiotxt = Helpers::removeAcentos(utf8_decode($_POST['subdominio']));
			$email = $_POST['email'];
			$telefone = $_POST['telefone'];
			$corprimaria = $_POST['corprimaria'];
			$corsecundaria = $_POST['corsecundaria'];
			$sobre = $_POST['sobre'];
			$template = $_POST['template'];
			$ativo = $_POST['ativo'];
			$publicado = $_POST['publicado'];
			$logo = $_FILES['logo'];

			//Verifica subdominio
			$subdominio = new SubdominioModel();
			$subdominio->setDescricao($subdominiotxt);
			$bool = $subdominio->getVerificarSubdominio();
			
			if($bool) 
				header('Location: /adm/?pg=criarwebsite');
			else {
				$subdominio->Inserir();
				$subdominio->getVerificarSubdominio();

				//Logo
				$relogo = Helpers::fotos($logo, 200, "../web/storage/logo");
				$canvas = new Canvas();

				//Faz foto no formato de logos
				$canvas->carrega("../web/storage/logo/".$relogo."");
				$canvas->redimensiona(200,150,'crop');
				$canvas->grava("../web/storage/logo/".$relogo."", 100);
				$canvas->resetar();	

				//Website
				$website = new Website();
				$website->setTitulo($titulo);
				$website->setSubdominio($subdominio->getCodigo());
				$website->setEmail($email);
				$website->setTelefone($telefone);
				$website->setCorprimaria($corprimaria);
				$website->setCorsecundaria($corsecundaria);
				$website->setSobre($sobre);
				$website->setTemplate($template);
				$website->setAtivo($ativo);
				$website->setPublicado($publicado);
				$website->setLogo($relogo);
				$website->setUsuario($_SESSION['codigo']);

				$website->Adicionar();

				$website->getWebsite();
				//Faz sessão com o codigo do website
				$_SESSION['codigowebsite'] = $website->getCodigo();

				//Criar subdominio
				$subdominioCpanel = new Subdominio();
				$subdominioCpanel->gerarSubdominio($subdominiotxt);

				//Criar template para o cliente
				$templates = new Template();
				$templates->setCodigo($template);
				$bool = $templates->getTemplateByCodigo();
				if($bool) {
					$zip = new ZipArchive;
					$res = $zip->open('../templates/zip/'.$templates->getPasta());
					if ($res === TRUE) {
				  		$zip->extractTo('../clientes/'.$subdominiotxt.'/');
				  		$zip->close();
					} 
					else {
					}
				}

				//Gerar Arquivo de configuração
				$fp = fopen("../clientes/".$subdominiotxt."/config.php", "w");
				$conteudo = "<?php 
					\$usuario = $_SESSION[codigo];
					\$site = $_SESSION[codigowebsite];
				?>";
				$escreve = fwrite($fp, $conteudo);
				fclose($fp);
				
				header('Location: /adm/?pg=painel');
			}



		break;

		case 'adicionartemplate':
			$nome = $_POST['nome'];
			$versao = $_POST['versao'];
			$zip = $_FILES['zip'];
			$miniatura = $_FILES['miniatura'];
			$ativo = $_POST['ativo'];

			//Novo nome para template
			$novonome = Helpers::sha512($zip['name'].date('D/M/Y hh:mm:ss'));
			if(!move_uploaded_file($zip['tmp_name'], '../templates/zip/'.$novonome.'.zip'))
				header('Location: /adm/?pg=painel');

			//Miniatura
			$relogo = Helpers::fotos($miniatura, 150, "../templates/miniaturas");
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

			header('Location: /adm/?pg=template');
		break;
		//Desativar Site
		case 'desativarsite':
			$website = new Website();
			$website->setUsuario($_SESSION['codigo']);
			$website->DesativarAtivarWebsite();

			header('Location: /adm/?pg=painel');
		break;
		//Ativar Site
		case 'ativarsite':
			$website = new Website();
			$website->setUsuario($_SESSION['codigo']);
			$website->DesativarAtivarWebsite(1);

			header('Location: /adm/?pg=painel');
		break;

		//Desativar Template
		case 'desativartemplate':
			$template = new Template();
			$id = (int) $_GET['id'];
			$template->setCodigo($id);
			$template->desativarTemplate();

			header('Location: /adm/?pg=template');
		break;
		//Ativar
		case 'ativartemplate':
			$template = new Template();
			$id = (int) $_GET['id'];
			$template->setCodigo($id);
			$template->ativarTemplate();

			header('Location: /adm/?pg=template');
		break;

		default:
			header('Location: /adm/?pg=painel');
		break;
	}
?>
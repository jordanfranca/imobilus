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
				$reslide = Helpers::fotos($slide, 800, "../web/storage/slides", 'slides');
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

				$msg = base64_encode("Slide inserido com sucesso!");
				header('Location: /adm/?pg=slides&confirm=1&msg='.$msg);
			break;

		case 'excluirslide':
			$id = (int) $_GET['id'];
			$foto = $_GET['foto'];
			$objSlide = new Slide();
			$objSlide->setCodigo($id);
			$objSlide->Deletar();

			if(unlink("../web/storage/slides/".$foto)) {
				$msg = base64_encode("Slide excluido com sucesso!");
				header('Location: /adm/?pg=slides&confirm=1&msg='.$msg);
			}
			else {
				$msg = base64_encode("Ocorreu um erro ao excluir seu slide, tente novamente!");
				header('Location: /adm/?pg=slides&confirm=2&msg='.$msg);
			}
		break;

		case 'editarconta':
			//Valida posts
			$boolPosts = false;
			$boolsenha = false;
			$msgErro   = 'Ocorreu um erro ao enviar o formulário por favor preencha o(s) campo(s) obrigatório(s) : ';

			//Pegando get de post
			if(!(isset($_POST['nome']))) {
				$msgErro .= 'Nome, ';
				$boolPosts = true;
			}

			if(!(isset($_POST['creci']))) {
				$msgErro .= 'Creci , ';
				$boolPosts = true;
			}

			if($boolPosts)
				header('Location: /adm/?pg=editarwebsite&confirm=2&msg='.base64_encode($msgErro));

			else {
				$nome = $_POST['nome'];
				$creci = $_POST['creci'];
				$senha = $_SESSION['senha'];
				$senhanova1 = $_POST['senha1'];
				$senhanova = $_POST['senha2'];
				if($senhanova != '' && $senhanova1 != '') {
					if(Helpers::sha512($senhanova) == Helpers::sha512($senhanova1)) {
						$senha = Helpers::sha512($_POST['senha2']);
						$boolsenha = true;
					}
					else {
						header('Location: /adm/?pg=editarconta&confirm=2&msg='.base64_encode('Os campos de senha DEVEM ser obrigatóriamente iguais, tente novamente!'));
						exit;
					}
				}

				$cadastro = new Cadastro();
				$cadastro->setStrEmail($_SESSION['login']);
				$cadastro->setIntCreci($creci);
				$cadastro->setStrSenha($senha);
				$cadastro->setStrNome($nome);

				$cadastro->Atualizar();

				//Atualizando session
				$_SESSION['nome'] = $nome;
				if($boolsenha)
					$_SESSION['senha'] = $senha;

				header('Location: /adm/?pg=editarconta&confirm=1&msg='.base64_encode('Conta editada com sucesso!'));
			}
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
			//Valida posts
			$boolPosts = false;
			$msgErro   = 'Ocorreu um erro ao enviar o formulário por favor preencha o(s) campo(s) obrigatório(s) : ';

			//Pegando get de post
			if(!(isset($_POST['titulo']))) {
				$msgErro .= 'Titulo, ';
				$boolPosts = true;
			}

			if(!(isset($_POST['subdominio']))) {
				$msgErro .= 'Subdominio , ';
				$boolPosts = true;
			}
				
			if(!(isset($_POST['email']))) {
				$msgErro .= 'E-mail , ';
				$boolPosts = true;
			}

			if(!(isset($_POST['telefone']))) {
				$msgErro .= 'Telefone, ';
				$boolPosts = true;
			}

			if(!(isset($_POST['corprimaria']))) {
				$msgErro .= 'Cor primária, ';
				$boolPosts = true;
			}

			if(!(isset($_POST['corsecundaria']))) {
				$msgErro .= 'Cor secundária, ';
				$boolPosts = true;
			}

			if(!(isset($_POST['sobre']))) {
				$msgErro .= 'Sobre, ';
				$boolPosts = true;
			}

			if(!(isset($_POST['template']))) {
				$msgErro .= 'Template, ';
				$boolPosts = true;
			}

			if(!(isset($_POST['ativo']))) {
				$msgErro .= 'Ativo, ';
				$boolPosts = true;
			}

			if(!(isset($_POST['publicado']))) {
				$msgErro .= 'Publicado, ';
				$boolPosts = true;
			}

			if($_FILES['publicado']) {
				$msgErro .= 'Logo, ';
				$boolPosts = true;
			}

			if($boolPosts)
				header('Location: /adm/?pg=editarwebsite&confirm=2&msg='.base64_encode($msgErro));

			else {

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
				
				if($bool) {
					$msg = base64_encode("Este subdominio já está em uso, por favor, escolha um diferente!");
					header('Location: /adm/?pg=criarwebsite&confirm=2&msg='.$msg);
				}
				else {
					$subdominio->Inserir();
					$subdominio->getVerificarSubdominio();

					//Logo
					$relogo = Helpers::fotos($logo, 200, "../web/storage/logo", 'criarwebsite');
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
							$msg = base64_encode("Ocorreu um erro na de criar seu template, tente novamente!");
							header('Location: /adm/?pg=painel&confirm=2&msg='.$msg);
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
					
					//Mensagem para o usuario
					$msg = base64_encode("Website criado com sucesso!");
					header('Location: /adm/?pg=painel&confirm=1&msg='.$msg);
				}
			}
		break;

		case 'editarwebsite':
			//Valida posts
			$boolPosts = false;
			$msgErro   = 'Ocorreu um erro ao enviar o formulário por favor preencha o(s) campo(s) obrigatório(s) : ';

			//Pegando get de post
			if(!(isset($_POST['titulo']))) {
				$msgErro .= 'Titulo, ';
				$boolPosts = true;
			}
				
			if(!(isset($_POST['email']))) {
				$msgErro .= 'E-mail , ';
				$boolPosts = true;
			}

			if(!(isset($_POST['telefone']))) {
				$msgErro .= 'Telefone, ';
				$boolPosts = true;
			}

			if(!(isset($_POST['corprimaria']))) {
				$msgErro .= 'Cor primária, ';
				$boolPosts = true;
			}

			if(!(isset($_POST['corsecundaria']))) {
				$msgErro .= 'Cor secundária, ';
				$boolPosts = true;
			}

			if(!(isset($_POST['sobre']))) {
				$msgErro .= 'Sobre, ';
				$boolPosts = true;
			}

			if(!(isset($_POST['publicado']))) {
				$msgErro .= 'Publicado, ';
				$boolPosts = true;
			}

			if($boolPosts)
				header('Location: /adm/?pg=editarwebsite&confirm=2&msg='.base64_encode($msgErro));

			else {

				$titulo = $_POST['titulo'];
				$email = $_POST['email'];
				$telefone = $_POST['telefone'];
				$corprimaria = $_POST['corprimaria'];
				$corsecundaria = $_POST['corsecundaria'];
				$sobre = $_POST['sobre'];
				$template = $_POST['template'];
				$publicado = $_POST['publicado'];
				$logo = $_FILES['logo'];
				$templateatual = $_POST['templateatual'];

				//Verifica se o logo vem vazio
				if($logo['tmp_name'] == '')
					$relogo = $_POST['logoatual'];
				else {
					//Logo
					$relogo = Helpers::fotos($logo, 200, "../web/storage/logo", 'editarwebsite');
					$canvas = new Canvas();

					//Faz foto no formato de logos
					$canvas->carrega("../web/storage/logo/".$relogo."");
					$canvas->redimensiona(200,150,'crop');
					$canvas->grava("../web/storage/logo/".$relogo."", 100);
					$canvas->resetar();	
				}

				//Website
				$website = new Website();
				$website->setTitulo($titulo);
				$website->setEmail($email);
				$website->setTelefone($telefone);
				$website->setCorprimaria($corprimaria);
				$website->setCorsecundaria($corsecundaria);
				$website->setSobre($sobre);
				$website->setTemplate($template);
				$website->setPublicado($publicado);
				$website->setLogo($relogo);
				$website->setUsuario($_SESSION['codigo']);

				$website->Atualizar();

				//Logica para alterar template
				if($templateatual != $template) {
					//Pegar propriedades atuais
					$website->getWebsite();

					//Subdominio
					$objsubdominio = new SubdominioModel();
					$objsubdominio->setCodigo($website->getSubdominio());
					$objsubdominio->getSubdominio();
					$subdominiotxt = $objsubdominio->getDescricao();
					
					//Limpar pasta
					Helpers::recursiveRemoveDirectory('../clientes/'.$subdominiotxt.'');

					//Criar template para o cliente
					$templates = new Template();
					$templates->setCodigo($template);
					$bool = $templates->getTemplateByCodigo();

					//Descompactar Site
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
				}

				//Mensagem para o usuario
				$msg = base64_encode("Website editado com sucesso!");
				header('Location: /adm/?pg=editarwebsite&confirm=1&msg='.$msg);
			}
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
				header('Location: /adm/?pg=template&confirm=2&msg='.base64_encode($msgErro));

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
					header('Location: /adm/?pg=template&confirm=2&msg='.$msg);
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
				header('Location: /adm/?pg=template&confirm=1&msg='.$msg);
			}
		break;

		//Desativar Site
		case 'desativarsite':
			$website = new Website();
			$website->setUsuario($_SESSION['codigo']);
			$website->DesativarAtivarWebsite();

			$msg = base64_encode("Website desativado com sucesso!");
			header('Location: /adm/?pg=painel&confirm=1&msg='.$msg);
		break;

		//Ativar Site
		case 'ativarsite':
			$website = new Website();
			$website->setUsuario($_SESSION['codigo']);
			$website->DesativarAtivarWebsite(1);

			$msg = base64_encode("Website ativado com sucesso!");
			header('Location: /adm/?pg=painel&confirm=1&msg='.$msg);
		break;

		//Desativar Template
		case 'desativartemplate':
			$template = new Template();
			if(!(isset($_GET['id']))) {
				$msg = base64_encode("Ocorreu um erro ao tentar desativar o template, tente novamente!");
				header('Location: /adm/?pg=template&confirm=2&msg='.$msg);
			}
			$id = (int) $_GET['id'];
			$template->setCodigo($id);
			$template->desativarTemplate();

			$msg = base64_encode("Template desativado com sucesso!");
			header('Location: /adm/?pg=template&confirm=1&msg='.$msg);
		break;

		//Ativar Template
		case 'ativartemplate':
			$template = new Template();
			if(!(isset($_GET['id']))) {
				$msg = base64_encode("Ocorreu um erro ao tentar ativar o template, tente novamente!");
				header('Location: /adm/?pg=template&confirm=2&msg='.$msg);
			}
			$id = (int) $_GET['id'];
			$template->setCodigo($id);
			$template->ativarTemplate();

			$msg = base64_encode("Template ativado com sucesso");
			header('Location: /adm/?pg=template&confirm=1&msg='.$msg);
		break;

		//Default
		default:
			header('Location: /adm/?pg=painel');
		break;
	}
?>
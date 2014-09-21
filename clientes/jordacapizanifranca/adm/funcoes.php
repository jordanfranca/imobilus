<?php 
	//Require
	require("../class/Conexao.class.php");
	require("../class/Login.class.php");
	require("../class/Security.class.php");
	require("../class/Blog.class.php");
	require("../class/funcoes.php");
	require("../class/Canvas.class.php");
	require("../class/Clientes.class.php");

	$conexao = new Conexao();

	$acao = $_GET['ac'];

	switch ($acao) {
		case 'addblog':
			$titulo = $_POST['titulo'];
			$capa   = $_FILES['capa'];
			$tipo   = $_POST['tipo'];
			$conteudo = $_POST['conteudo'];
			$fotopequena = $_FILES['capapequena'];
			$fotomedia = $_FILES['capamedia'];

			$foto = fotos($capa, 392);
			$ftpequena = fotos($fotopequena, 142);
			$ftmedia  = fotos($fotomedia, 302);

			//Faz Capa
			$canvas = new canvas();
			$canvas->carrega("../blog/".$foto."");
			$canvas->redimensiona(392,193,'crop');
			$canvas->grava("../blog/capa/".$foto."", 100);
			$canvas->resetar();

			//Faz Miniatura Media
			$canvas->carrega("../blog/".$ftmedia."");
			$canvas->redimensiona(302,120,'crop');
			$canvas->grava("../blog/medio/".$ftmedia."", 100);
			$canvas->resetar();
			//Faz Miniatura Pequena	
			$canvas->carrega("../blog/".$ftpequena."");
			$canvas->redimensiona(142,120,'crop');
			$canvas->grava("../blog/pequeno/".$ftpequena."", 100);

			$blog = new Blog();
			$blog->setBlog($titulo,$tipo,$conteudo,$foto, $ftmedia, $ftpequena);

			header('Location: painel.php?operacao=true');
		break;

		case 'editarpost':
			$titulo = $_POST['titulo'];
			$tipo   = $_POST['tipo'];
			$conteudo = $_POST['conteudo'];

			$id = (int) $_GET['id'];
			$blog = new Blog();
			$canvas = new canvas();

			$blog->getBlogByid($id);



			if($_FILES['capa']['tmp_name'] != ''){
				$ftcapa = $_FILES['capa'];
				$capa = fotos($ftcapa, 392);


				//Canvas
				$canvas->carrega("../blog/".$capa."");
				$canvas->redimensiona(392,193,'crop');
				$canvas->grava("../blog/capa/".$capa."", 100);
				$canvas->resetar();

				unlink("../blog/".$capa."");
			}
			else {
				$pequena = $blog->getCapa();
			}

			if($_FILES['capapequena']['tmp_name'] != ''){
				$ftpequena = $_FILES['capapequena'];
				$pequena = fotos($ftpequena, 142);

				//Canvas
				$canvas->carrega("../blog/".$pequena."");
				$canvas->redimensiona(142,120,'crop');
				$canvas->grava("../blog/pequeno/".$pequena."", 100);
				$canvas->resetar();

				unlink("../blog/".$pequena."");
			}
			else {
				$pequena = $blog->getPequena();
			}

			if($_FILES['capamedia']['tmp_name'] != '') {
				$ftmedia = $_FILES['capamedia'];
				$media = fotos($ftmedia, 302);

				//Canvas
				$canvas->carrega("../blog/".$media."");
				$canvas->redimensiona(302,120,'crop');
				$canvas->grava("../blog/medio/".$media."", 100);
				$canvas->resetar();

				unlink("../blog/".$media."");
			}
			else {
				$media = $blog->getMedia();
			}

			$blog->editaBlog($id, $titulo,$tipo, $conteudo, $capa, $media, $pequena);

			header('Location: lista.php?ac=posts');
		break;


		case 'excluirpost':
			$id = (int) $_GET['id'];
			$blog = new Blog();
			$blog->deleteBlog($id);

			header('Location: lista.php?ac=posts');
		break;
		
		case 'addcliente':
			$titulo = $_POST['titulo'];
			$capa   = $_FILES['capa'];
			$site   = $_POST['link'];

			$site = str_replace("http://", "", $site);

    		if($site == ""){
    		    $site = NULL;
    		}

			$foto = fotos2($capa, 160);

			$clientes = new Clientes();
			$clientes->addCliente($titulo,$foto,$site);

			header('Location: painel.php?operacao=true');
		break;

		case 'editarcliente':
			$titulo = $_POST['titulo'];
			$site   = $_POST['link'];

			$site = str_replace("http://", "", $site);

    		if($site == ""){
    		    $site = NULL;
    		}

    		$id = (int) $_GET['id'];

    		$clientes = new Clientes();
    		$clientes->editaCliente($id, $titulo, $site);
    		header('Location: lista.php?ac=clientes');
		break;

		case 'excluirclientes':
			$id = (int) $_GET['id'];
			$clientes = new Clientes();
			$clientes->deletaClientes($id);

			header('Location: lista.php?ac=clientes');
		break;

		default:
			# code...
			break;
	}
?>
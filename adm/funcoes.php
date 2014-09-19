<?php 
	//Require de Models
	require('../models/CRUD.model.php');
	require('../etc/class/Conexao.class.php');
	require("../etc/helpers/Helpers.class.php");
	require("../etc/class/Email.class.php");
	require("../models/Slide.model.php");
	require("../etc/class/Canvas.class.php");

	//Conexão
	$objConexao = new Conexao();
	$objConexao->instance();

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
				$slide->setWebsite($_SESSION['website']);
				$slide->Inserir();

				header('Location: /adm/?pg=slides');
			break;

		case 'excluirSlide':
			$id = (int) $_GET['id'];
			$objSlide = new Slide();
			$objSlide->setCodigo($id);
			$objSlide->Deletar();
			header('Location: /adm/?pg=addcategoria');
		break;

		
		default:
			header('Location: /adm/?pg=painel');
			break;
	}
?>
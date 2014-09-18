<?php 
	//Require de Models
	require('../models/CRUD.model.php');
	require('../etc/class/Conexao.class.php');
	require("../etc/helpers/Helpers.class.php");
	require("../etc/class/Email.class.php");
	require("../models/Slide.model.php");

	//Conexão
	$objConexao = new Conexao();
	$objConexao->instance();

	$action = $_GET['ac'];

	switch ($action) {
		case 'addSlide':
				

				header('Location: /adm/?pg=addcategoria');
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
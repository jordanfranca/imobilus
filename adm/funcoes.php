<?php 
	//Require de Models
	require('../models/CRUD.model.php');
	require('../etc/class/Conexao.class.php');
	require("../etc/helpers/Helpers.class.php");
	require("../etc/class/Email.class.php");
	require("../models/Categoria.model.php");

	//Conexão
	$objConexao = new Conexao();
	$objConexao->instance();

	$action = $_GET['ac'];

	switch ($action) {
		case 'addCategoria':
				$descricao = $_POST['descricao'];
				$ativo = $_POST['ativo'];

				$categoria = new Categoria();
				$categoria->setDescricao($descricao);
				$categoria->setAtivo($ativo);

				$categoria->Inserir();

				header('Location: /adm/?pg=addcategoria');
			break;

		case 'excluircategoria':
			$id = (int) $_GET['id'];
			$categoria = new Categoria();
			$categoria->setCodigo($id);

			$categoria->deletaCategoria();
			header('Location: /adm/?pg=addcategoria');
		break;

		case 'updatecategoria':
			$id = (int) $_GET['id'];
			$descricao = $_POST['descricao'];
			$ativo = $_POST['ativo'];

			$categoria = new Categoria();
			$categoria->setDescricao($descricao);
			$categoria->setAtivo($ativo);
			$categoria->setCodigo($id);

			$categoria->updateCategoria();

			header('Location: /adm/?pg=addcategoria');
		break;
		
		default:
			header('Location: /adm/?pg=painel');
			break;
	}
?>
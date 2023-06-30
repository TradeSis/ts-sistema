<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');


function buscaCategorias($idCategoria=null)
{
	
	$categorias = array();
	
	$apiEntrada = array(
		'idCategoria' => $idCategoria,
	);

	$categorias = chamaAPI(null, '/sistema/categorias', json_encode($apiEntrada), 'GET');
	return $categorias;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {

		$apiEntrada = array(
			'nomeCategoria' => $_POST['nomeCategoria'],	
		);
		$categorias = chamaAPI(null, '/sistema/categorias', json_encode($apiEntrada), 'PUT');
		
	}

	$operacao = $_GET['operacao'];

    if ($operacao=="alterar") {

		$apiEntrada = array(
			'idCategoria' => $_POST['idCategoria'],
			'nomeCategoria' => $_POST['nomeCategoria'],
			
		);
		$categorias = chamaAPI(null, '/sistema/categorias', json_encode($apiEntrada), 'POST');
		
	}
	
	if ($operacao=="excluir") {

		$apiEntrada = array(
			'idCategoria' => $_POST['idCategoria'],
		);

		$categorias = chamaAPI(null, '/sistema/categorias', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../cadastros/categorias.php');	
	
}

?>
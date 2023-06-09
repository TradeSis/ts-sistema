<?php

include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');

function buscaSecaoPagina($idPagina)
{
	
	$secoesPagina = array();

	$apiEntrada = array(
		'idPagina' => $idPagina,
	);
	$secoesPagina = chamaAPI(null, '/sistema/secoesPagina_individual', json_encode($apiEntrada), 'GET');
	return $secoesPagina;
}

function buscaSecaoPaginas($idSecaoPagina=null, $idPagina=null)
{
	
	$secoesPagina = array();
	
	$apiEntrada = array(
		'idSecaoPagina' => $idSecaoPagina,
		'idPagina' => $idPagina
	);
	
	$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'GET');
	return $secoesPagina;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {
		
		$apiEntrada = array(

            'idPagina' => $_POST['idPagina'],
		    'idSecao' => $_POST['idSecao'],
		    'ordem' => $_POST['ordem'],
			'parametros' => $_POST['parametros'],
			
		);

		/* echo json_encode($apiEntrada);
		return; */
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'PUT');
		
	}

    if ($operacao=="alterar") {
		$apiEntrada = array(

            'idSecaoPagina' => $_POST['idSecaoPagina'],
            'idPagina' => $_POST['idPagina'],
		    'idSecao' => $_POST['idSecao'],
		    'ordem' => $_POST['ordem'],
			'parametros' => $_POST['parametros']
			
		);
       /*  echo json_encode($apiEntrada);
		return; */
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
		
	}
	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
		);
		/* echo json_encode($apiEntrada);
		return; */
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../perfil/paginas.php');	
	
}

<?php

include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');

function buscaSecaoPagina($idPagina)
{
	
	$secoesPagina = array();

	$apiEntrada = array(
		'idPagina' => $idPagina,
	);
	$secoesPagina = chamaAPI(null, '/api/sistema/secoesPagina_individual', json_encode($apiEntrada), 'GET');
	//echo json_encode($secoesPagina);
	return $secoesPagina;
}

function buscaSecaoPaginas($idSecaoPagina=null)
{
	
	$secoesPagina = array();
	
	$apiEntrada = array(
		'idSecaoPagina' => $idSecaoPagina
	);
	
	$secoesPagina = chamaAPI(null, '/api/sistema/secoesPagina', json_encode($apiEntrada), 'GET');
	
	return $secoesPagina;
}

function buscaIdPaginas($idPagina=null)
{
	
	$secoesPagina = array();
	
	$apiEntrada = array(
		'idPagina' => $idPagina,
	);
	
	$secoesPagina = chamaAPI(null, '/api/sistema/secoesIdPagina', json_encode($apiEntrada), 'GET');
	
	return $secoesPagina;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {
		$apiEntrada = array(

            'idPagina' => $_POST['idPagina'],
		    'idSecao' => $_POST['idSecao'],
		    'ordem' => $_POST['ordem'],
			
		);
		$secoesPagina = chamaAPI(null, '/api/sistema/secoesPagina', json_encode($apiEntrada), 'PUT');
		
	}

    if ($operacao=="alterar") {
		$apiEntrada = array(

            'idSecaoPagina' => $_POST['idSecaoPagina'],
            'idPagina' => $_POST['idPagina'],
		    'idSecao' => $_POST['idSecao'],
		    'ordem' => $_POST['ordem'],
			
		);
       /*  echo json_encode($apiEntrada);
		return; */
		$secoesPagina = chamaAPI(null, '/api/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
		
	}
	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
		);
		/* echo json_encode($apiEntrada);
		return; */
		$secoesPagina = chamaAPI(null, '/api/sistema/secoesPagina', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../perfil/paginas.php');	
	
}

?>
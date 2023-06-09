<?php
// gabriel 060623 15:06

include_once('../conexao.php');

function buscaProcesso($idProcesso=null)
{
	
	$processos = array();
	$apiEntrada = array(
		'idProcesso' => $idProcesso,
	);
	$processos = chamaAPI(null, '/sistema/fisprocesso', json_encode($apiEntrada), 'GET');
	return $processos;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="inserir") {
		$apiEntrada = array(
			'nomeProcesso' => $_POST['nomeProcesso']
		);
		$processos = chamaAPI(null, '/sistema/fisprocesso', json_encode($apiEntrada), 'PUT');
	}

	if ($operacao=="alterar") {
		$apiEntrada = array(
			'idProcesso' => $_POST['idProcesso'],
			'nomeProcesso' => $_POST['nomeProcesso']
		);
		$processos = chamaAPI(null, '/sistema/fisprocesso', json_encode($apiEntrada), 'POST');
	}
	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idProcesso' => $_POST['idProcesso']
		);
		$processos = chamaAPI(null, '/sistema/fisprocesso', json_encode($apiEntrada), 'DELETE');
	}



	header('Location: ../fiscal/fisprocesso.php');	
	
}

?>


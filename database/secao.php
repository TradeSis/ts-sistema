<?php
include_once('../conexao.php');

function buscaSecao($idSecao=null)
{
	
	$secao = array();
	//echo json_encode($secao);
	//return;
	$apiEntrada = array(
		'idSecao' => $idSecao,
	);
	/* echo "-ENTRADA->".json_encode($apiEntrada)."\n";
	return; */
	$secao = chamaAPI(null, '/api/sistema/secoes', json_encode($apiEntrada), 'GET');
	//echo json_encode($secao);
	return $secao;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {
		$apiEntrada = array(
			'tituloSecao' => $_POST['tituloSecao'],
			'arquivoFonte' => $_POST['arquivoFonte'],
			
		);
		$secao = chamaAPI(null, '/api/sistema/secoes', json_encode($apiEntrada), 'PUT');
		
	}

	if ($operacao=="alterar") {
		$apiEntrada = array(
            'idSecao' => $_POST['idSecao'],
			'tituloSecao' => $_POST['tituloSecao'],
			'arquivoFonte' => $_POST['arquivoFonte'],
		);

		$secao = chamaAPI(null, '/api/sistema/secoes', json_encode($apiEntrada), 'POST');
		
	}

	
	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idSecao' => $_POST['idSecao'],
		);
		/* echo json_encode($apiEntrada);
		return; */
		$secao = chamaAPI(null, '/api/sistema/secoes', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../perfil/secao.php');	
	
}

?>
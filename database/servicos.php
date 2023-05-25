<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');
//Lucas 25052023 - modificado para Api
function buscaServicosCards()
{
    $servicos = array();
	//echo json_encode($servicos);
	//return;
	$apiEntrada = array(
		
	);
	/* echo "-ENTRADA->".json_encode($apiEntrada)."\n";
	return; */
	$servicos = chamaAPI(null, '/api/sistema/servicos_card', json_encode($apiEntrada), 'GET');
	//echo json_encode($servicos);
	return $servicos;
}

function buscaServicos($idServico=null)
{
    $servicos = array();
	//echo json_encode($servicos);
	//return;
	$apiEntrada = array(
		'idServico' => $idServico,
	);
	/* echo "-ENTRADA->".json_encode($apiEntrada)."\n";
	return; */
	$servicos = chamaAPI(null, '/api/sistema/servicos', json_encode($apiEntrada), 'GET');
	//echo json_encode($servicos);
	return $servicos;
}





?>


<?php
// helio 21032023 - compatibilidade chamada chamaApi
// helio 01022023 alterado para include_once
// helio 31012023 - eliminado funcao buscaCliente, ficou apenas buscaClientes,
//					o parametro mudou para o idCliente, e não mais string(where)
//					colocado chamada chamaAPI					
// helio 26012023 - function buscasClientes - Retirado mysql e Colocado CURL (API)
// helio 26012023 16:16

//include_once('../conexao.php');
include_once __DIR__ . "/../conexao.php";

function buscaEmpresas($idEmpresa=null)
{
	
	$empresa = array();
	
	$apiEntrada = array(
		'idEmpresa' => $idEmpresa,
	);
	
	$empresa = chamaAPI(null, '/sistema/empresa', json_encode($apiEntrada), 'GET');
	
	return $empresa;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="inserir") {
		$apiEntrada = array(
			'nomeEmpresa' => $_POST['nomeEmpresa']
		);
		$empresa = chamaAPI(null, '/sistema/empresa', json_encode($apiEntrada), 'PUT');
	}

	if ($operacao=="alterar") {
		$apiEntrada = array(
			'idEmpresa' => $_POST['idEmpresa'],
			'nomeEmpresa' => $_POST['nomeEmpresa']
		);
		$empresa = chamaAPI(null, '/sistema/empresa', json_encode($apiEntrada), 'POST');
	}
	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idEmpresa' => $_POST['idEmpresa']
		);
		$empresa = chamaAPI(null, '/sistema/empresa', json_encode($apiEntrada), 'DELETE');
	}


//	include "../configuracao/empresa_ok.php";

	header('Location: ../configuracao/empresa.php');	
	
}

?>


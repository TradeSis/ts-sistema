<?php
//Lucas 26122023 criado
include_once __DIR__ . "/../conexao.php";

function buscaEstados($codigoEstado = null)
{

	$estados = array();

	$apiEntrada = array(
		'codigoEstado' => $codigoEstado
	);
	$estados = chamaAPI(null, '/sistema/estados', json_encode($apiEntrada), 'GET');
	return $estados;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao == "inserir") {

		$apiEntrada = array(
			'codigoEstado' => $_POST['codigoEstado'],
			'nomeEstado' => $_POST['nomeEstado']
		);
	
		$estados = chamaAPI(null, '/sistema/estados', json_encode($apiEntrada), 'PUT');
	}

	if ($operacao == "alterar") {

		$apiEntrada = array(
			'codigoEstado' => $_POST['codigoEstado'],
			'nomeEstado' => $_POST['nomeEstado']
		);
	
		$estados = chamaAPI(null, '/sistema/estados', json_encode($apiEntrada), 'POST');
	}

	if ($operacao == "buscar") {

		$codigoEstado = $_POST["codigoEstado"];

		if ($codigoEstado == "") {
			$codigoEstado = null;
		}


		$apiEntrada = array(
			'idAplicativo' => null,
			'codigoEstado' => $codigoEstado
		);

		$estados = chamaAPI(null, '/sistema/estados', json_encode($apiEntrada), 'GET');

		echo json_encode($estados);
		return $estados;
	}

	if ($operacao == "filtrar") {

		$buscaEstado = $_POST["buscaEstado"];

		if ($buscaEstado == "") {
			$buscaEstado = null;
		}


		$apiEntrada = array(
			'idAplicativo' => null,
			'buscaEstado' => $buscaEstado
		);

		$estados = chamaAPI(null, '/sistema/estados', json_encode($apiEntrada), 'GET');

		echo json_encode($estados);
		return $estados;
	}


	header('Location: ../configuracao/estados.php');
}

<?php
//Lucas 26122023 criado
include_once __DIR__ . "/../conexao.php";

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao == "inserir") {

		$apiEntrada = array(
			'codigoEstado' => $_POST['codigoEstado'],
			'nomeEstado' => $_POST['nomeEstado']
		);
	
		$app = chamaAPI(null, '/sistema/estados', json_encode($apiEntrada), 'PUT');
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

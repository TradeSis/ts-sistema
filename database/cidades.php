<?php
//Lucas 26122023 criado
include_once __DIR__ . "/../conexao.php";

function buscaAplicativos($idAplicativo = null)
{

	$app = array();

	$apiEntrada = array(
		'idAplicativo' => $idAplicativo
	);
	$app = chamaAPI(null, '/sistema/aplicativo', json_encode($apiEntrada), 'GET');
	return $app;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao == "inserir") {

		$apiEntrada = array(
			'codigoCidade' => $_POST['codigoCidade'],
			'nomeCidade' => $_POST['nomeCidade'],
			'codigoEstado' => $_POST['codigoEstado']

		);

		$app = chamaAPI(null, '/sistema/cidades', json_encode($apiEntrada), 'PUT');
	}

	if ($operacao == "filtrar") {

		$buscaCidade = $_POST["buscaCidade"];

		if ($buscaCidade == "") {
			$buscaCidade = null;
		}


		$apiEntrada = array(
			'idAplicativo' => null,
			'buscaCidade' => $buscaCidade
		);

		$cidades = chamaAPI(null, '/sistema/cidades', json_encode($apiEntrada), 'GET');

		echo json_encode($cidades);
		return $cidades;
	}


	header('Location: ../configuracao/cidades.php');
}

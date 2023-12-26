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
			'codigoEstado' => $_POST['codigoEstado'],
			'nomeEstado' => $_POST['nomeEstado']
		);
	
		$app = chamaAPI(null, '/sistema/estados', json_encode($apiEntrada), 'PUT');
	}

	if ($operacao == "alterar") {

		$img = $_FILES['imgAplicativo'];

		$pasta = "../img/imgAplicativo/";
		$imgAplicativo = $img['name'];
		$novoNomeImg = uniqid(); //gerar nome aleatorio para ser guardado na pasta 
		$extensao = strtolower(pathinfo($imgAplicativo, PATHINFO_EXTENSION)); //extensao do arquivo

		if ($extensao != "" && $extensao != "jpg" && $extensao != "png")
			die("Tipo de aquivo não aceito");

		$pathImg = $pasta . $novoNomeImg . "." . $extensao;
		move_uploaded_file($img["tmp_name"], $pathImg);

		$apiEntrada = array(
			'idAplicativo' => $_POST['idAplicativo'],
			'nomeAplicativo' => $_POST['nomeAplicativo'],
			'appLink' => $_POST['appLink'],
			'nivelMenu' => $_POST['nivelMenu'],
			'imgAplicativo' => $_POST['imgAplicativo'],
			'pathImg' => $pathImg,
		);

		/* echo json_encode($apiEntrada);
		return; */
		$app = chamaAPI(null, '/sistema/aplicativo', json_encode($apiEntrada), 'POST');
	}

	if ($operacao == "excluir") {
		$apiEntrada = array(
			'idAplicativo' => $_POST['idAplicativo']
		);

		$app = chamaAPI(null, '/sistema/aplicativo', json_encode($apiEntrada), 'DELETE');
	}

	//BUSCA PRINCIPAL DA TABELA DE APLICATIVOS
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

<?php
//Gabriel 28042023

include_once('../conexao.php');

function buscaUsuarioAplicativo($idUsuario = null, $idAplicativo = null)
{

	$usuarioaplicativo = array();
	$apiEntrada = array(
		'idUsuario' => $idUsuario,
		'idAplicativo' => $idAplicativo
	);
	$usuarioaplicativo = chamaAPI(null, '/sistema/usuarioaplicativo', json_encode($apiEntrada), 'GET');
	return $usuarioaplicativo;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao == "inserir") {

		$apiEntrada = array(
			'idUsuario' => $_POST['idUsuario'],
			'idAplicativo' => $_POST['idAplicativo'],
			'nivelMenu' => $_POST['nivelMenu']

		);

		$usuarioaplicativo = chamaAPI(null, '/sistema/usuarioaplicativo', json_encode($apiEntrada), 'PUT');

	}

	if ($operacao == "alterar") {

		$apiEntrada = array(
			'idUsuario' => $_POST['idUsuario'],
			'idAplicativo' => $_POST['idAplicativo'],
			'nivelMenu' => $_POST['nivelMenu']
		);

		$usuarioaplicativo = chamaAPI(null, '/sistema/usuarioaplicativo', json_encode($apiEntrada), 'POST');

	}

	if ($operacao == "excluir") {
		$apiEntrada = array(
			'idUsuario' => $_POST['idUsuario'],
			'idAplicativo' => $_POST['idAplicativo']
		);

		$usuarioaplicativo = chamaAPI(null, '/sistema/usuarioaplicativo', json_encode($apiEntrada), 'DELETE');

	}

	header('Location: ../configuracao/usuario_alterar.php?idUsuario=' . $_POST['idUsuario']);

}
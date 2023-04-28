<?php
//Gabriel 28042023

include_once('../conexao.php');

function buscaUsuarioAplicativo($idUsuario=null, $aplicativo=null)
{

    $usuarioaplicativo = array();
    $apiEntrada = array(
        'idUsuario' => $idUsuario,
        'aplicativo' => $aplicativo
    );
    $usuarioaplicativo = chamaAPI(null, '/api/services/usuarioaplicativo', json_encode($apiEntrada), 'GET');
    return $usuarioaplicativo;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao == "inserir") {

		$apiEntrada = array(
			'idUsuario' => $_POST['idUsuario'],
			'aplicativo' => $_POST['aplicativo'],
			'nivelMenu' => $_POST['nivelMenu']
			
		);

		$usuarioaplicativo = chamaAPI(null, '/api/services/usuarioaplicativo', json_encode($apiEntrada), 'PUT');
		
	}

    if ($operacao == "alterar") {

		$apiEntrada = array(
			'idUsuario' => $_POST['idUsuario'],
			'aplicativo' => $_POST['aplicativo'],
			'nivelMenu' => $_POST['nivelMenu']
		);

		$usuarioaplicativo = chamaAPI(null, '/api/services/usuarioaplicativo', json_encode($apiEntrada), 'POST');
		
	}

	if ($operacao == "excluir") {
		$apiEntrada = array(
			'idUsuario' => $_POST['idUsuario'],		
			'aplicativo' => $_POST['aplicativo']		
		);

		$usuarioaplicativo = chamaAPI(null, '/api/services/usuarioaplicativo', json_encode($apiEntrada), 'DELETE');
		
	}

	
	header('Location: ../sistema/usuarioaplicativo.php');
}

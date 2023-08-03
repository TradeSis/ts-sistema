<?php
// helio 21032023 - compatibilidade chamada chamaApi
// Lucas 08032023 alterado buscaUsuarios(nomeUsuario=null) para buscaUsuarios($idUsuario=null)
// gabriel 06022023 adicionado função busca atendente
// helio 01022023 consertado operacao inserir
// helio 01022023 altereado para include_once, usando funcao conectaMysql
// helio 26012023 16:16

//include_once('../conexao.php');
include_once __DIR__ . "/../conexao.php";

function buscaUsuarios($idUsuario=null)
{

	$usuario = array();	

	$idCliente = null;
	if (isset($_SESSION['idCliente'])) {
    	$idCliente = $_SESSION['idCliente'];
	}
	
	$apiEntrada = array(
		'idUsuario' => $idUsuario,
		'idCliente' => $idCliente,
	);	
	$usuario = chamaAPI(null, '/sistema/usuario', json_encode($apiEntrada), 'GET');
	return $usuario;
}

function buscaAtendente($idUsuario=null)
{
	$atendente = array();
	$apiEntrada = array(
		'idUsuario' => $idUsuario,
	);
	$atendente = chamaAPI(null, '/sistema/atendente', json_encode($apiEntrada), 'GET');
	return $atendente;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao == "inserir") {
		$apiEntrada = array(
			'nomeUsuario' => $_POST['nomeUsuario'],
			'email' => $_POST['email'],
			'cpfCnpj' => $_POST['cpfCnpj'],
			'telefone' => $_POST['telefone'],
			'idCliente' => $_POST['idCliente'],
			'password' => md5 ($_POST['password'])
			
		);
		$usuario = chamaAPI(null, '/sistema/usuario', json_encode($apiEntrada), 'PUT');

		header('Location: ../configuracao/usuario.php');
	}

	if ($operacao == "alterar") {
		
		$apiEntrada = array(
			'idUsuario' => $_POST['idUsuario'],
			'nomeUsuario' => $_POST['nomeUsuario'],
			'email' => $_POST['email'],
			'cpfCnpj' => $_POST['cpfCnpj'],
			'telefone' => $_POST['telefone'],
			'password' => md5 ($_POST['password'])
		);
		
		$usuario = chamaAPI(null, '/sistema/usuario', json_encode($apiEntrada), 'POST');

		header('Location: ../configuracao/usuario.php');
	}

	if ($operacao == "usuarioalterar") {
		
		$apiEntrada = array(
			'idUsuario' => $_POST['idUsuario'],
			'nomeUsuario' => $_POST['nomeUsuario'],
			'email' => $_POST['email'],
			'cpfCnpj' => $_POST['cpfCnpj'],
			'telefone' => $_POST['telefone'],
			'password' => $_POST['password'],
		);
		
		$usuario = chamaAPI(null, '/sistema/usuario', json_encode($apiEntrada), 'POST');

		header('Location:' . $_POST['ultimaulr']);
	}

	if ($operacao == "alterar") {
		
		$apiEntrada = array(
			'idUsuario' => $_POST['idUsuario'],
			'nomeUsuario' => $_POST['nomeUsuario'],
			'email' => $_POST['email'],
			'cpfCnpj' => $_POST['cpfCnpj'],
			'telefone' => $_POST['telefone'],
			'password' => md5 ($_POST['password'])
		);
		
		$usuario = chamaAPI(null, '/sistema/usuario', json_encode($apiEntrada), 'POST');

		header('Location: ../configuracao/usuario.php');
	}


	if ($operacao == "excluir") {
		$apiEntrada = array(
			'idUsuario' => $_POST['idUsuario']
		);
		$usuario = chamaAPI(null, '/sistema/usuario', json_encode($apiEntrada), 'DELETE');

		header('Location: ../configuracao/usuario.php');
	}
	
	if ($operacao == "ativar") {
		$apiEntrada = array(
			'idLogin' => $_POST['idLogin'],
			'secret_key' => $_POST['secret_key'] // no ativar, guarda a secret
		);

/* 	echo json_encode($apiEntrada);
	return; */
		$usuario = chamaAPI(null, '/sistema/login/ativar', json_encode($apiEntrada), 'POST');
	
		header('Location: ../login.php');
	}


}

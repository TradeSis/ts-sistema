<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');

function buscaPerfil($idPerfil=null)
{
	
	$perfil = array();
	//echo json_encode($perfil);
	//return;
	$apiEntrada = array(
		'idPerfil' => $idPerfil,
	);
	/* echo "-ENTRADA->".json_encode($apiEntrada)."\n";
	return; */
	$perfil = chamaAPI(null, '/sistema/perfil', json_encode($apiEntrada), 'GET');
		
	return $perfil[0];
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="alterar") {
        
		$apiEntrada = array(
			'idPerfil' => $_POST['idPerfil'],
			'nome' => $_POST['nome'],
			'foto' => $_FILES['foto'],
			'endereco' => $_POST['endereco'],
			'numero' => $_POST['numero'],
			'bairro' => $_POST['bairro'],
			'cep' => $_POST['cep'],
			'cidade' => $_POST['cidade'],
			'estado' => $_POST['estado'],
			'email' => $_POST['email'],
			'telefone' => $_POST['telefone'],
			'whatsapp' => $_POST['whatsapp'],
			'logo' => $_FILES['logo'],
			'twitter' => $_POST['twitter'],
			'facebook' => $_POST['facebook'],
			'instagram' => $_POST['instagram'],
		);
        /* echo json_encode($apiEntrada);
        return; */
		$perfil = chamaAPI(null, '/sistema/perfil', json_encode($apiEntrada), 'POST');
		
	}

	
	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idCliente' => $_POST['idCliente']
		);
		$clientes = chamaAPI(null, '/services/clientes', json_encode($apiEntrada), 'DELETE');
	}


//	include "../cadastros/clientes_ok.php";

	header('Location: ../perfil/perfil.php');	
	
}

?>
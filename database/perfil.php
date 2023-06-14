<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');

function buscaPerfil($idPerfil=null)
{
	
	$perfil = array();

	$apiEntrada = array(
		'idPerfil' => $idPerfil,
	);
	$perfil = chamaAPI(null, '/sistema/perfil', json_encode($apiEntrada), 'GET');
		
	return $perfil[0];
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="alterar") {

		$foto = $_FILES['foto'];

		if($foto !== null) {
			preg_match("/\.(png|jpg|jpeg){1}$/i", $foto["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/imgPerfil/";
				$novoNomeFoto = $_POST['nome']. "-" .$foto["name"];
				
				move_uploaded_file($foto['tmp_name'], $pasta.$novoNomeFoto);
		
			}else{
				$novoNomeFoto = "Sem_imagem";
			}
	
		}
        
		$apiEntrada = array(
			'idPerfil' => $_POST['idPerfil'],
			'nome' => $_POST['nome'],
			'foto' => $novoNomeFoto,
			'endereco' => $_POST['endereco'],
			'numero' => $_POST['numero'],
			'bairro' => $_POST['bairro'],
			'cep' => $_POST['cep'],
			'cidade' => $_POST['cidade'],
			'estado' => $_POST['estado'],
			'email' => $_POST['email'],
			'telefone' => $_POST['telefone'],
			'whatsapp' => $_POST['whatsapp'],
			'twitter' => $_POST['twitter'],
			'facebook' => $_POST['facebook'],
			'instagram' => $_POST['instagram'],
		);

		$perfil = chamaAPI(null, '/sistema/perfil', json_encode($apiEntrada), 'POST');
		
	}

	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idCliente' => $_POST['idCliente']
		);
		$clientes = chamaAPI(null, '/services/clientes', json_encode($apiEntrada), 'DELETE');
	}

	header('Location: ../perfil/perfil.php');	
	
}

?>
<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');


function buscaReceitas($idReceita=null)
{
	
	$receitas = array();
	
	$apiEntrada = array(
		'idReceita' => $idReceita,
	);

	$receitas = chamaAPI(null, '/sistema/receitas', json_encode($apiEntrada), 'GET');
	return $receitas;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {

		$imgReceita = $_FILES['imgReceita'];

		if($imgReceita !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgReceita["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['nomeReceita']. "_" .$imgReceita["name"];
				
				move_uploaded_file($imgReceita['tmp_name'], $pasta.$novoNomeImg);
		
			}else{
				$novoNomeImg = "Sem_imagem";
			}
	
		}


		$apiEntrada = array(
			'nomeReceita' => $_POST['nomeReceita'],
			'conteudoReceita' => $_POST['conteudoReceita'],
			'autorReceita' => $_POST['autorReceita'],
			'imgReceita' => $novoNomeImg,
			
		);
		/* echo json_encode($apiEntrada);
		return; */
		$receitas = chamaAPI(null, '/sistema/receitas', json_encode($apiEntrada), 'PUT');
		
	}

	$operacao = $_GET['operacao'];

    if ($operacao=="alterar") {

		$imgReceita = $_FILES['imgReceita'];

		if($imgReceita !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgReceita["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['nomeReceita']. "_" .$imgReceita["name"];
				
				move_uploaded_file($imgReceita['tmp_name'], $pasta.$novoNomeImg);
		
			}else{
				$novoNomeImg = "Sem_imagem";
			}
	
		}

		$apiEntrada = array(
			'idReceita' => $_POST['idReceita'],
			'nomeReceita' => $_POST['nomeReceita'],
			'conteudoReceita' => $_POST['conteudoReceita'],
			'autorReceita' => $_POST['autorReceita'],
			'imgReceita' => $novoNomeImg,
			
		);
		/* echo json_encode($apiEntrada);
		return; */
		$receitas = chamaAPI(null, '/sistema/receitas', json_encode($apiEntrada), 'POST');
		
	}

	

	
	if ($operacao=="excluir") {

		$apiEntrada = array(
			'idReceita' => $_POST['idReceita'],
		);

		$receitas = chamaAPI(null, '/sistema/receitas', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../cadastros/receitas.php');	
	
}

?>
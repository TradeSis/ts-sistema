<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');


function buscaCatalogo($idProduto=null)
{
	
	$catalogo = array();
	
	$apiEntrada = array(
		'idProduto' => $idProduto,
	);

	$catalogo = chamaAPI(null, '/sistema/catalogo', json_encode($apiEntrada), 'GET');
	return $catalogo;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {

		$imgProduto = $_FILES['imgProduto'];

		if($imgProduto !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgProduto["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['nomeProduto']. "_" .$imgProduto["name"];
				
				move_uploaded_file($imgProduto['tmp_name'], $pasta.$novoNomeImg);
		
			}else{
				$novoNomeImg = "Sem_imagem";
			}
	
		}


		$apiEntrada = array(
			'nomeProduto' => $_POST['nomeProduto'],
            'imgProduto' => $novoNomeImg,
			'idMarca' => $_POST['idMarca'],
			'precoProduto' => $_POST['precoProduto'],
			'ativoProduto' => $_POST['ativoProduto'],
			'propagandaProduto' => $_POST['propagandaProduto'],
			'descricaoProduto' => $_POST['descricaoProduto'],
			
		);
		/* echo json_encode($apiEntrada);
		return; */
		$catalogo = chamaAPI(null, '/sistema/catalogo', json_encode($apiEntrada), 'PUT');
		
	}

	$operacao = $_GET['operacao'];

    if ($operacao=="alterar") {

		$imgProduto = $_FILES['imgProduto'];

		if($imgProduto !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgProduto["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['nomeProduto']. "_" .$imgProduto["name"];
				
				move_uploaded_file($imgProduto['tmp_name'], $pasta.$novoNomeImg);
		
			}else{
				$novoNomeImg = "Sem_imagem";
			}
	
		}

		$apiEntrada = array(
			'idProduto' => $_POST['idProduto'],
			'nomeProduto' => $_POST['nomeProduto'],
            'imgProduto' => $novoNomeImg,
			'idMarca' => $_POST['idMarca'],
			'precoProduto' => $_POST['precoProduto'],
			'ativoProduto' => $_POST['ativoProduto'],
			'propagandaProduto' => $_POST['propagandaProduto'],
			'descricaoProduto' => $_POST['descricaoProduto'],
			
		);
		/* echo json_encode($apiEntrada);
		return; */
		$catalogo = chamaAPI(null, '/sistema/catalogo', json_encode($apiEntrada), 'POST');
		
	}

	

	
	if ($operacao=="excluir") {

		$apiEntrada = array(
			'idProduto' => $_POST['idProduto'],
		);

		$catalogo = chamaAPI(null, '/sistema/catalogo', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../cadastros/catalogo.php');	
	
}

?>
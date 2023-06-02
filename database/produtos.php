<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');


function buscaProdutos()
{
	
	$produto = array();

	
	$produto = chamaAPI(null, '/api/sistema/produtos_card', null, 'GET');
	//echo json_encode($produto);
	return $produto;
}

function buscaTodosProdutos($idProduto=null)
{
	
	$produto = array();
	
	$apiEntrada = array(
		'idProduto' => $idProduto,
	);
	/* echo "-ENTRADA->".json_encode($apiEntrada)."\n";
	return; */
	$produto = chamaAPI(null, '/api/sistema/produtos', json_encode($apiEntrada), 'GET');
	//echo json_encode($produto);
	return $produto;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {
		$fotoProduto = $_FILES['fotoProduto'];

		if($fotoProduto !== null) {
			preg_match("/\.(png|jpg|jpeg){1}$/i", $fotoProduto["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/imgProdutos/";
				$novoNomeFoto = $_POST['nomeProduto']. "_" .$fotoProduto["name"];
				
				move_uploaded_file($fotoProduto['tmp_name'], $pasta.$novoNomeFoto);
		
			}else{
				$novoNomeFoto = "Sem_imagem";
			}
	
		}

		$apiEntrada = array(
			'nomeProduto' => $_POST['nomeProduto'],
			'valorProduto' => $_POST['valorProduto'],
            'fotoProduto' => $novoNomeFoto,
            'destaque' => $_POST['destaque'],
			
		);
		$produto = chamaAPI(null, '/api/sistema/produtos', json_encode($apiEntrada), 'PUT');
		
	}

	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idProduto' => $_POST['idProduto'],
		);
		/* echo json_encode($apiEntrada);
		return; */
		$produto = chamaAPI(null, '/api/sistema/produtos', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../cadastros/produtos.php');	
	
}

?>
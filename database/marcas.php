<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');


function buscaMarcas($idMarca=null)
{
	
	$autor = array();
	
	$apiEntrada = array(
		'idMarca' => $idMarca,
	);

	$autor = chamaAPI(null, '/sistema/marcas', json_encode($apiEntrada), 'GET');
	return $autor;
}

function buscaMarcasEspecializadas()
{
	
	$autor = array();
	
	$apiEntrada = array(
	);

	$autor = chamaAPI(null, '/sistema/marcas_especializadas', json_encode($apiEntrada), 'GET');
	return $autor;
}

function buscaMarcasParceiras()
{
	
	$autor = array();
	
	$apiEntrada = array(
	);

	$autor = chamaAPI(null, '/sistema/marcas_parceiras', json_encode($apiEntrada), 'GET');
	return $autor;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {

		$imgMarca = $_FILES['imgMarca'];

		if($imgMarca !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgMarca["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['nomeMarca']. "_" .$imgMarca["name"];
				
				move_uploaded_file($imgMarca['tmp_name'], $pasta.$novoNomeImg);
		
			}else{
				$novoNomeImg = "Sem_imagem";
			}
	
		}

		$bannerMarca = $_FILES['bannerMarca'];

		if($bannerMarca !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $bannerMarca["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeBanner = $_POST['nomeMarca']. "_" .$bannerMarca["name"];
				
				move_uploaded_file($bannerMarca['tmp_name'], $pasta.$novoNomeBanner);
		
			}else{
				$novoNomeBanner = "Sem_imagem";
			}
	
		}

		$apiEntrada = array(
			'nomeMarca' => $_POST['nomeMarca'],
            'imgMarca' => $novoNomeImg,
            'bannerMarca' => $novoNomeBanner,
			'descricaoMarca' => $_POST['descricaoMarca'],
			'cidadeMarca' => $_POST['cidadeMarca'],
			'estado' => $_POST['estado'],
			'urlMarca' => $_POST['urlMarca'],
			'ativoMarca' => $_POST['ativoMarca'],
			'catalogo' => $_POST['catalogo'],
			'lojasEspecializadas' => $_POST['lojasEspecializadas'],
			
		);/* 
		echo json_encode($apiEntrada);
		return; */
		$marca = chamaAPI(null, '/sistema/marcas', json_encode($apiEntrada), 'PUT');
		
	}

	$operacao = $_GET['operacao'];

    if ($operacao=="alterar") {

		$imgMarca = $_FILES['imgMarca'];

		if($imgMarca !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgMarca["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['nomeMarca']. "_" .$imgMarca["name"];
				
				move_uploaded_file($imgMarca['tmp_name'], $pasta.$novoNomeImg);
		
			}
			$apiEntrada = array(
				'idMarca' => $_POST['idMarca'],
				'nomeMarca' => $_POST['nomeMarca'],
				'imgMarca' => $novoNomeImg,
				'descricaoMarca' => $_POST['descricaoMarca'],
				'cidadeMarca' => $_POST['cidadeMarca'],
				'estado' => $_POST['estado'],
				'urlMarca' => $_POST['urlMarca'],
				'ativoMarca' => $_POST['ativoMarca'],
				'catalogo' => $_POST['catalogo'],
				'lojasEspecializadas' => $_POST['lojasEspecializadas'],
				
			);
	
		}else{
			$apiEntrada = array(
				'idMarca' => $_POST['idMarca'],
				'nomeMarca' => $_POST['nomeMarca'],
				'descricaoMarca' => $_POST['descricaoMarca'],
				'cidadeMarca' => $_POST['cidadeMarca'],
				'estado' => $_POST['estado'],
				'urlMarca' => $_POST['urlMarca'],
				'ativoMarca' => $_POST['ativoMarca'],
				'catalogo' => $_POST['catalogo'],
				'lojasEspecializadas' => $_POST['lojasEspecializadas'],
				
			);
		}

		$marca = chamaAPI(null, '/sistema/marcas', json_encode($apiEntrada), 'POST');
		
	}

	

	
	if ($operacao=="excluir") {

		$apiEntrada = array(
			'idMarca' => $_POST['idMarca'],
		);

		if(!empty($_POST['imgMarca'])){
			$pasta = ROOT . "/img/";
			$imagem = $pasta . $_POST['imgMarca'];
			
			if(file_exists($imagem)){
				unlink($imagem);
			}

		}

		if(!empty($_POST['bannerMarca'])){
			$pasta = ROOT . "/img/";
			$imagem2 = $pasta . $_POST['bannerMarca'];
			
			if(file_exists($imagem2)){
				unlink($imagem2);
			}

		}

		$marca = chamaAPI(null, '/sistema/marcas', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../cadastros/marcas.php');	
	
}

?>
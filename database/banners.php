<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');


function buscaBanners($idBanner=null)
{
	
	$post = array();
	
	$apiEntrada = array(
		'idBanner' => $idBanner
	);
	
	$post = chamaAPI(null, '/sistema/banners', json_encode($apiEntrada), 'GET');
	
	return $post;
}


if (isset($_GET['operacao'])) {
	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {

		$imgBanner = $_FILES['imgBanner'];

		if($imgBanner !== null) {
			preg_match("/\.(png|jpg|jpeg){1}$/i", $imgBanner["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/imgBanner/";
				$novoNomeBanner = $_POST['nomeBanner']. "_" .$imgBanner["name"];
				
				move_uploaded_file($imgBanner['tmp_name'], $pasta.$novoNomeBanner);
		
			}else{
				$novoNomeBanner = "Sem_imagem";
			}
	
		}
		
		$apiEntrada = array(

		    'nomeBanner' => $_POST['nomeBanner'],
		    'imgBanner' => $novoNomeBanner,
		    'statusBanner' => $_POST['statusBanner'],
			
		);
		$post = chamaAPI(null, '/sistema/banners', json_encode($apiEntrada), 'PUT');
		
	}

	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idBanner' => $_POST['idBanner'],
		);

		if(!empty($_POST['imgBanner'])){
			$pasta = ROOT . "/img/imgBanner/";
			$imagem = $pasta . $_POST['imgBanner'];

			
			if(file_exists($imagem)){
				unlink($imagem);
			}
		}
		$post = chamaAPI(null, '/sistema/banners', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../cadastros/banners.php');	
	
}

?>
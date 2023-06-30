<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');


function buscaNoticias($idNoticia=null)
{
	
	$noticias = array();
	
	$apiEntrada = array(
		'idNoticia' => $idNoticia,
	);

	$noticias = chamaAPI(null, '/sistema/noticias', json_encode($apiEntrada), 'GET');
	return $noticias;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {

		$imgNoticia = $_FILES['imgNoticia'];

		if($imgNoticia !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgNoticia["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['tituloNoticia']. "_" .$imgNoticia["name"];
				
				move_uploaded_file($imgNoticia['tmp_name'], $pasta.$novoNomeImg);
		
			}else{
				$novoNomeImg = "Sem_imagem";
			}
	
		}

		$apiEntrada = array(
			'tituloNoticia' => $_POST['tituloNoticia'],
			'conteudoNoticia' => $_POST['conteudoNoticia'],
			'idAutor' => $_POST['idAutor'],
            'imgNoticia' => $novoNomeImg,
			'idCategoria' => $_POST['idCategoria'],
			
		);
		$noticias = chamaAPI(null, '/sistema/noticias', json_encode($apiEntrada), 'PUT');
		
	}

	$operacao = $_GET['operacao'];

    if ($operacao=="alterar") {

		$imgNoticia = $_FILES['imgNoticia'];

		if($imgNoticia !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgNoticia["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['tituloNoticia']. "_" .$imgNoticia["name"];
				
				move_uploaded_file($imgNoticia['tmp_name'], $pasta.$novoNomeImg);
		
			}else{
				$novoNomeImg = "Sem_imagem";
			}
	
		}

		$apiEntrada = array(
			'idNoticia' => $_POST['idNoticia'],
			'tituloNoticia' => $_POST['tituloNoticia'],
			'conteudoNoticia' => $_POST['conteudoNoticia'],
			'idAutor' => $_POST['idAutor'],
            'imgNoticia' => $novoNomeImg,
			'idCategoria' => $_POST['idCategoria'],
			
		);
		$noticias = chamaAPI(null, '/sistema/noticias', json_encode($apiEntrada), 'POST');
		
	}

	

	
	if ($operacao=="excluir") {

		$apiEntrada = array(
			'idNoticia' => $_POST['idNoticia'],
		);

		$noticias = chamaAPI(null, '/sistema/noticias', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../cadastros/noticias.php');	
	
}

?>
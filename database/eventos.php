<?php
include_once('../conexao.php');

function buscaEventosSlug($slug)
{
	
	$eventos = array();
	
	$apiEntrada = array(
		'slug' => $slug,
	);

	$eventos = chamaAPI(null, '/sistema/eventos_slug', json_encode($apiEntrada), 'GET');
	return $eventos;
}

function buscaEventos($idEvento=null)
{
	
	$eventos = array();
	
	$apiEntrada = array(
		'idEvento' => $idEvento,
	);

	$eventos = chamaAPI(null, '/sistema/eventos', json_encode($apiEntrada), 'GET');
	return $eventos;
}

function buscaTipoEvento($tipoEvento,$qtdEvento)
{
	
	$eventos = array();
	
	$apiEntrada = array(
		'tipoEvento' => $tipoEvento,
		'qtdEvento' => $qtdEvento,
	);

	$eventos = chamaAPI(null, '/sistema/eventos', json_encode($apiEntrada), 'GET');
	return $eventos;
}

/* 

function buscaProximosEventos($idEvento=null)
{
	
	$eventos = array();
	
	$apiEntrada = array(
		'idEvento' => $idEvento,
	);

	$eventos = chamaAPI(null, '/sistema/eventos_proximos', json_encode($apiEntrada), 'GET');
	return $eventos;
}

function buscaEventosCursos($idEvento=null)
{
	
	$eventos = array();
	
	$apiEntrada = array(
		'idEvento' => $idEvento,
	);

	$eventos = chamaAPI(null, '/sistema/eventos_cursos', json_encode($apiEntrada), 'GET');
	return $eventos;
}

function buscaVisitacaoEventos($idEvento=null)
{
	
	$eventos = array();
	
	$apiEntrada = array(
		'idEvento' => $idEvento,
	);

	$eventos = chamaAPI(null, '/sistema/eventos_visitacao', json_encode($apiEntrada), 'GET');
	return $eventos;
}

function buscaEventosPodcasts($idEvento=null)
{
	
	$eventos = array();
	
	$apiEntrada = array(
		'idEvento' => $idEvento,
	);

	$eventos = chamaAPI(null, '/sistema/eventos_podcasts', json_encode($apiEntrada), 'GET');
	return $eventos;
} */

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {

		$capaEvento = $_FILES['capaEvento'];

		if($capaEvento !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $capaEvento["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['nomeEvento']. "_" .$capaEvento["name"];
				
				move_uploaded_file($capaEvento['tmp_name'], $pasta.$novoNomeImg);
		
			}else{
				$novoNomeImg = "Sem_imagem";
			}
	
		}

		$bannerEvento = $_FILES['bannerEvento'];

		if($bannerEvento !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $bannerEvento["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeBanner = $_POST['nomeEvento']. "_" .$bannerEvento["name"];
				
				move_uploaded_file($bannerEvento['tmp_name'], $pasta.$novoNomeBanner);
		
			}else{
				$novoNomeBanner = "Sem_imagem";
			}
	
		}


		$apiEntrada = array(
			'slug' => $_POST['slug'],
			'nomeEvento' => $_POST['nomeEvento'],
			'descricaoEvento' => $_POST['descricaoEvento'],
			'dataEvento' => $_POST['dataEvento'],
			'cidadeEvento' => $_POST['cidadeEvento'],
			'localEvento' => $_POST['localEvento'],
			'capaEvento' => $novoNomeImg,
			'esconderEvento' => $_POST['esconderEvento'],
			'tipoEvento' => $_POST['tipoEvento'],
			'linkEvento' => $_POST['linkEvento'],
			'bannerEvento' => $novoNomeBanner,
		);
		/* echo json_encode($apiEntrada);
		return; */
		$eventos = chamaAPI(null, '/sistema/eventos', json_encode($apiEntrada), 'PUT');
		
	}

	$operacao = $_GET['operacao'];

    if ($operacao=="alterar") {

		$capaEvento = $_FILES['capaEvento'];

		if($capaEvento !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $capaEvento["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['nomeEvento']. "_" .$capaEvento["name"];
				
				move_uploaded_file($capaEvento['tmp_name'], $pasta.$novoNomeImg);
		
			}else{
				$novoNomeImg = "Sem_imagem";
			}
	
		}

		$bannerEvento = $_FILES['bannerEvento'];

		if($bannerEvento !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $bannerEvento["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeBanner = $_POST['nomeEvento']. "_" .$bannerEvento["name"];
				
				move_uploaded_file($bannerEvento['tmp_name'], $pasta.$novoNomeBanner);
		
			}else{
				$novoNomeBanner = "Sem_imagem";
			}
	
		}

		$apiEntrada = array(
			'idEvento' => $_POST['idEvento'],
			'nomeEvento' => $_POST['nomeEvento'],
			'descricaoEvento' => $_POST['descricaoEvento'],
			'dataEvento' => $_POST['dataEvento'],
			'cidadeEvento' => $_POST['cidadeEvento'],
			'localEvento' => $_POST['localEvento'],
			'capaEvento' => $novoNomeImg,
			'esconderEvento' => $_POST['esconderEvento'],
			'tipoEvento' => $_POST['tipoEvento'],
			'linkEvento' => $_POST['linkEvento'],
			'bannerEvento' => $novoNomeBanner,
			
		);
		/* echo json_encode($apiEntrada);
		return; */
		$eventos = chamaAPI(null, '/sistema/eventos', json_encode($apiEntrada), 'POST');
		
	}

	

	
	if ($operacao=="excluir") {

		$apiEntrada = array(
			'idEvento' => $_POST['idEvento'],
		);

		$eventos = chamaAPI(null, '/sistema/eventos', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../configuracao/eventos.php');	
	
}

?>
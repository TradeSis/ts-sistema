<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');


function buscaAutor($idAutor=null)
{
	
	$autor = array();
	
	$apiEntrada = array(
		'idAutor' => $idAutor,
	);

	$autor = chamaAPI(null, '/sistema/autor', json_encode($apiEntrada), 'GET');
	return $autor;
}

function buscaAutorCard($idAutor=null)
{
	
	$autor = array();
	
	$apiEntrada = array(
		'idAutor' => $idAutor,
	);

	$autor = chamaAPI(null, '/sistema/autor_card', json_encode($apiEntrada), 'GET');
	return $autor;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {

		$fotoAutor = $_FILES['fotoAutor'];

		if($fotoAutor !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $fotoAutor["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeFoto = $_POST['nomeAutor']. "_" .$fotoAutor["name"];
				
				move_uploaded_file($fotoAutor['tmp_name'], $pasta.$novoNomeFoto);
		
			}else{
				$novoNomeFoto = "Sem_imagem";
			}
	
		}

		$bannerAutor = $_FILES['bannerAutor'];

		if($bannerAutor !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $bannerAutor["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeBanner = $_POST['nomeAutor']. "_" .$bannerAutor["name"];
				
				move_uploaded_file($bannerAutor['tmp_name'], $pasta.$novoNomeBanner);
		
			}else{
				$novoNomeBanner = "Sem_imagem";
			}
	
		}

		$apiEntrada = array(
			'nomeAutor' => $_POST['nomeAutor'],
            'fotoAutor' => $novoNomeFoto,
            'bannerAutor' => $novoNomeBanner,
			'sobreMimAutor' => $_POST['sobreMimAutor'],
			
		);
		/* echo json_encode($apiEntrada);
		return; */
		$autor = chamaAPI(null, '/sistema/autor', json_encode($apiEntrada), 'PUT');
		
	}

	if ($operacao=="alterar") {

		//echo json_encode($_FILES);
		//return;
		$fotoAutor = $_FILES['fotoAutor'];
		$fotoAutorNome = $_FILES['fotoAutor']['name'];
		$bannerAutor = $_FILES['bannerAutor'];
		$bannerAutorNome = $_FILES['bannerAutor']['name'];
		echo json_encode($fotoAutorNome);
		echo json_encode($bannerAutorNome);
		//return;


		if ($fotoAutorNome != '' && $bannerAutorNome != '') {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $fotoAutor["name"],$ext);
		
				if($ext == true) {
					$pasta = ROOT . "/img/";
					$novoNomeFoto = $_POST['nomeAutor']. "_" .$fotoAutor["name"];
					
					move_uploaded_file($fotoAutor['tmp_name'], $pasta.$novoNomeFoto);
			
				}

				preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $bannerAutor["name"],$ext);
		
				if($ext == true) {
					$pasta = ROOT . "/img/";
					$novoNomeBanner = $_POST['nomeAutor']. "_" .$bannerAutor["name"];
					
					move_uploaded_file($bannerAutor['tmp_name'], $pasta.$novoNomeBanner);
			
				}

				$apiEntrada = array(
					'idAutor' => $_POST['idAutor'],
					'nomeAutor' => $_POST['nomeAutor'],
					'fotoAutor' => $novoNomeFoto,
					'bannerAutor' => $novoNomeBanner,
					'sobreMimAutor' => $_POST['sobreMimAutor'],
					
				);
		}elseif($fotoAutorNome != ''){
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $fotoAutor["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeFoto = $_POST['nomeAutor']. "_" .$fotoAutor["name"];
				
				move_uploaded_file($fotoAutor['tmp_name'], $pasta.$novoNomeFoto);
		
			}else{
				$apiEntrada = array(
					'idAutor' => $_POST['idAutor'],
					'nomeAutor' => $_POST['nomeAutor'],
					'bannerAutor' => $novoNomeBanner,
					'sobreMimAutor' => $_POST['sobreMimAutor'],
					
				);
			}
		}elseif ($bannerAutorNome != '') {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $bannerAutor["name"],$ext);
		
				if($ext == true) {
					$pasta = ROOT . "/img/";
					$novoNomeBanner = $_POST['nomeAutor']. "_" .$bannerAutor["name"];
					
					move_uploaded_file($bannerAutor['tmp_name'], $pasta.$novoNomeBanner);
			
				}else{
					$apiEntrada = array(
						'idAutor' => $_POST['idAutor'],
						'nomeAutor' => $_POST['nomeAutor'],
						'fotoAutor' => $novoNomeFoto,
						'sobreMimAutor' => $_POST['sobreMimAutor'],
						
					);
				}
		}else{
			$apiEntrada = array(
				'idAutor' => $_POST['idAutor'],
				'nomeAutor' => $_POST['nomeAutor'],
				'sobreMimAutor' => $_POST['sobreMimAutor'],
				
			);
			
		echo json_encode($apiEntrada);
		return; 
		$autor = chamaAPI(null, '/sistema/autor', json_encode($apiEntrada), 'POST');
		}

		
		
		

		
	}

	
	if ($operacao=="excluir") {

		$apiEntrada = array(
			'idAutor' => $_POST['idAutor'],
		);

		if(!empty($_POST['fotoAutor'])){
			$pasta = ROOT . "/img/";
			$imagem = $pasta . $_POST['fotoAutor'];
			
			if(file_exists($imagem)){
				unlink($imagem);
			}

		}

		if(!empty($_POST['bannerAutor'])){
			$pasta = ROOT . "/img/";
			$imagem2 = $pasta . $_POST['bannerAutor'];
			
			if(file_exists($imagem2)){
				unlink($imagem2);
			}

		}

		$autor = chamaAPI(null, '/sistema/autor', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../cadastros/autor.php');	
	
}

?>
<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');


function buscaSlug($slug)
{
	
	$post = array();

	$apiEntrada = array(
		'slug' => $slug,
	);
	$post = chamaAPI(null, '/api/sistema/posts_slug', json_encode($apiEntrada), 'GET');
	//echo json_encode($post);
	return $post;
}

function buscaPosts($idPost=null, $titulo=null, $categoria=null)
{
	
	$post = array();
	
	$apiEntrada = array(
		'idPost' => $idPost,
		'titulo' => $titulo,
		'categoria' => $categoria
	);
	
	$post = chamaAPI(null, '/api/sistema/posts', json_encode($apiEntrada), 'GET');
	
	return $post;
}


function buscaPostsRecentes()
{
	
	$post = array();
	
	$apiEntrada = array(
	
	);
	
	$post = chamaAPI(null, '/api/sistema/posts_recentes', json_encode($apiEntrada), 'GET');
	
	return $post;
	
}

if (isset($_GET['operacao'])) {
	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {

		$imgDestaque = $_FILES['imgDestaque'];

		if($imgDestaque !== null) {
			preg_match("/\.(png|jpg|jpeg){1}$/i", $imgDestaque["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/imgPosts/";
				$novoNomeFoto = $_POST['slug']. "_" .$imgDestaque["name"];
				
				move_uploaded_file($imgDestaque['tmp_name'], $pasta.$novoNomeFoto);
		
			}else{
				$novoNomeFoto = "Sem_imagem";
			}
	
		}
		
		$apiEntrada = array(

            'slug' => $_POST['slug'],
		    'titulo' => $_POST['titulo'],
		    'imgDestaque' => $novoNomeFoto,
		    'autor' => $_POST['autor'],
		    'data' => $_POST['data'],
		    'comentarios' => $_POST['comentarios'],
		    'textoIntro' => $_POST['textoIntro'],
		    'txtConteudo' => $_POST['txtConteudo'],
			
		);
		$post = chamaAPI(null, '/api/sistema/posts', json_encode($apiEntrada), 'PUT');
		
	}

	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idPost' => $_POST['idPost'],
		);
		/* echo json_encode($apiEntrada);
		return; */
		$post = chamaAPI(null, '/api/sistema/posts', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../cadastros/posts.php');	
	
}

?>
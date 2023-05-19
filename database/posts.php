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

function buscaPosts($idPost=null)
{
	
	$post = array();
	
	$apiEntrada = array(
		'idPost' => $idPost,
	);
	
	$post = chamaAPI(null, '/api/sistema/posts', json_encode($apiEntrada), 'GET');
	
	return $post;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {
		$apiEntrada = array(

            'slug' => $_POST['slug'],
		    'titulo' => $_POST['titulo'],
		    'imgDestaque' => $_FILES['imgDestaque'],
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
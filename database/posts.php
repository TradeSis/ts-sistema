<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');


function buscaPostSlug($slug)
{
	
	$post = array();

	$apiEntrada = array(
		'slug' => $slug,
	);
	$post = chamaAPI(null, '/sistema/posts_slug', json_encode($apiEntrada), 'GET');
	//echo json_encode($post);
	return $post;
}

function buscaPosts($idPost=null)
{
	
	$post = array();
	
	$apiEntrada = array(
		'idPost' => $idPost
	);
	
	$post = chamaAPI(null, '/sistema/posts', json_encode($apiEntrada), 'GET');
	
	return $post;
}

function buscaPostsCategoria($idCategoria=null,$qtdPosts=null)
{
	
	$post = array();
	
	$apiEntrada = array(
		'idCategoria' => $idCategoria,
		'qtdPosts' => $qtdPosts,
	);
	
	$post = chamaAPI(null, '/sistema/posts', json_encode($apiEntrada), 'GET');
	
	return $post;
}





if (isset($_GET['operacao'])) {
	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {

		$imgDestaque = $_FILES['imgDestaque'];

		if($imgDestaque !== null) {
			preg_match("/\.(png|jpg|jpeg){1}$/i", $imgDestaque["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
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
		    'idAutor' => $_POST['idAutor'],
		    'data' => $_POST['data'],
		    'comentarios' => $_POST['comentarios'],
		    'idCategoria' => $_POST['idCategoria'],
		    'txtConteudo' => $_POST['txtConteudo'],
			
		);
		$post = chamaAPI(null, '/sistema/posts', json_encode($apiEntrada), 'PUT');
		
	}

	if ($operacao=="alterar") {

		$imgDestaque = $_FILES['imgDestaque'];
		if($imgDestaque !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgDestaque["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['slug']. "_" .$imgDestaque["name"];
				
				move_uploaded_file($imgDestaque['tmp_name'], $pasta.$novoNomeImg);
		
			}
			$apiEntrada = array(
			'idPost' => $_POST['idPost'],
		    'slug' => $_POST['slug'],
		    'titulo' => $_POST['titulo'],
		    'imgDestaque' => $novoNomeImg,
		    'idAutor' => $_POST['idAutor'],
		    'data' => $_POST['data'],
		    'comentarios' => $_POST['comentarios'],
		    'idCategoria' => $_POST['idCategoria'],
		    'txtConteudo' => $_POST['txtConteudo'],
			);
	
		}else{
			$apiEntrada = array(
				'idPost' => $_POST['idPost'],
				'slug' => $_POST['slug'],
				'titulo' => $_POST['titulo'],
				'idAutor' => $_POST['idAutor'],
				'data' => $_POST['data'],
				'comentarios' => $_POST['comentarios'],
				'idCategoria' => $_POST['idCategoria'],
				'txtConteudo' => $_POST['txtConteudo'],
			);
		}

		$receitas = chamaAPI(null, '/sistema/posts', json_encode($apiEntrada), 'POST');
		
	}

	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idPost' => $_POST['idPost'],
		);

		if(!empty($_POST['imgDestaque'])){
			$pasta = ROOT . "/img/";
			$imagem = $pasta . $_POST['imgDestaque'];

			
			if(file_exists($imagem)){
				unlink($imagem);
			}
		}

		$post = chamaAPI(null, '/sistema/posts', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../cadastros/posts.php');	
	
}

?>
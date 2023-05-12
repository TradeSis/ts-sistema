<?php
include_once ('../conexao.php');
function buscaPosts($idPost=null)
{
	
	$post = array();
	$conexao = conectaMysql();

	$sql = "SELECT * FROM posts";
	if (isset($idPost)) {
	  $sql = $sql . " where posts.idPost = " . $idPost;
	}

    $rows = 0;
	
    $buscar = mysqli_query($conexao, $sql);
	
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
      array_push($post, $row);
      $rows = $rows + 1;
    }
    
    if (isset($idPost) && $rows==1) {
      $post = $post[0];
    }

	/* echo json_encode($post);
	return; */
	return $post;
}


function buscaSlug($slug)
{
	
	$post = array();
	$conexao = conectaMysql();

	$sql = "SELECT * FROM posts";
	
	  $sql = $sql . " where posts.slug = '" . $slug . "'";
	
    $rows = 0;
	
    $buscar = mysqli_query($conexao, $sql);
	
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
      array_push($post, $row);
      $rows = $rows + 1;
    }
    
    
    $post = $post[0];
    
	/* echo json_encode($post);
	return; */
	return $post;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="inserir") {
		
		$slug = $_POST['slug'];
		$titulo = $_POST['titulo'];
		$imgDestaque = $_FILES['imgDestaque'];
		$autor = $_POST['autor'];
		$data = $_POST['data'];
		$comentarios = $_POST['comentarios'];
		$textoIntro = $_POST['textoIntro'];
		$txtConteudo = $_POST['txtConteudo'];

		if($imgDestaque !== null) {
            preg_match("/\.(png|jpg|jpeg){1}$/i", $imgDestaque["name"],$ext);
        
            if($ext == true) {
                $pasta = "../admin/imgPosts/";
                $nome_foto = md5(uniqid(time())) . "." . $ext[1];
                
                move_uploaded_file($imgDestaque['tmp_name'], $pasta.$nome_foto);
        
            }

        }

		/* echo json_encode($_POST);
		return; */
		
		$sql = "INSERT INTO `posts`(`slug`, `imgDestaque`, `titulo`, `autor`, `data`, `comentarios`, `textoIntro`, `txtConteudo`) VALUES ('$slug','$nome_foto','$titulo','$autor','$data','$comentarios','$textoIntro','$txtConteudo')";
		/* echo json_encode($sql);
		return; */
	}

	if ($operacao=="editar") {
	
		
		$sql = "";

		
		/* echo json_encode($sql);
		return; */
	}
	
	if ($operacao=="excluir") {
		$idPost = $_POST['idPost'];
		$sql = "DELETE FROM posts WHERE idPost = $idPost";
		
	}

	$conexao = conectaMysql();
	
    $atualizar = mysqli_query($conexao,$sql);
    
	header('Location: ../cadastros/posts.php');
	
}

?>


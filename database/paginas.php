<?php
include_once ('../conexao.php');
function buscaPagina($slug)
{
	
	$pagina = array();
	$conexao = conectaMysql();

	$sql = "SELECT * FROM paginas";

	$sql = $sql . " where paginas.slug = '" . $slug . "'";


    $rows = 0;
	
    $buscar = mysqli_query($conexao, $sql);
	
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
      array_push($pagina, $row);
      $rows = $rows + 1;
    }

    if ($rows==1) {
      $pagina = $pagina[0];
    }


	return $pagina;
}

function buscaPaginas($idPagina=null)
{
	
	$pagina = array();
	$conexao = conectaMysql();

	$sql = "SELECT * FROM paginas";
	if (isset($idPagina)) {
	  $sql = $sql . " where paginas.idPagina = " . $idPagina;
	}

    $rows = 0;
	
    $buscar = mysqli_query($conexao, $sql);
	
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
      array_push($pagina, $row);
      $rows = $rows + 1;
    }
    
    if (isset($idPagina) && $rows==1) {
      $pagina = $pagina[0];
    }

	return $pagina;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="inserir") {
		
		
		$slug = $_POST['slug'];
		$tituloPagina = $_POST['tituloPagina'];
		$conteudoHTML = $_POST['conteudoHTML'];
		$arquivoFonte = $_POST['arquivoFonte'];
		$arquivoSingle = $_POST['arquivoSingle'];
	

		
		$sql = "INSERT INTO `paginas`(`slug`, `tituloPagina`, `conteudoHTML`, `arquivoFonte`, `arquivoSingle`) VALUES ('$slug','$tituloPagina','$conteudoHTML','$arquivoFonte','$arquivoSingle')";
		
	}

	if ($operacao=="editar") {
    	$idPagina = $_POST['idPagina'];
		$tituloPagina = $_POST['tituloPagina'];
		$conteudoHTML = $_POST['conteudoHTML'];
		$arquivoFonte = $_POST['arquivoFonte'];
		$arquivoSingle = $_POST['arquivoSingle'];
	
		
		$sql = "UPDATE `paginas` SET `tituloPagina`='$tituloPagina',`conteudoHTML`='$conteudoHTML',`arquivoFonte`='$arquivoFonte',`arquivoSingle`='$arquivoSingle' WHERE idPagina = $idPagina";

		
		/* echo json_encode($sql);
		return; */
	}
	
	if ($operacao=="excluir") {
		$idPagina = $_POST['idPagina'];
		$sql = "DELETE FROM paginas WHERE idPagina = $idPagina";
		
	}

	$conexao = conectaMysql();
	
    $atualizar = mysqli_query($conexao,$sql);
    
	header('Location: ../perfil/paginas.php');
	
}



?>


<?php
include_once ('../conexao.php');
function buscaSecaoPagina($idPagina)

{
	
	$secao = array();
		$conexao = conectaMysql();

	$sql = "SELECT secoesPagina.*, secoes.* FROM secoesPagina
          INNER JOIN secoes on secoes.idSecao = secoesPagina.idSecao
		  /* INNER JOIN paginas on paginas.idPagina = secoesPagina.idSecao */";
 

	$sql = $sql . " where secoesPagina.idPagina = " . $idPagina;
  	$sql = $sql ." order by secoesPagina.ordem ";

  /* echo json_encode($sql);
  return; */
           

    $rows = 0;
	
    $buscar = mysqli_query($conexao, $sql);
	
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
      array_push($secao, $row);
      $rows = $rows + 1;
    }

	/* echo json_encode($secao);
	return; */
	return $secao;
}

function buscaSecaoPaginas($idSecaoPagina=null)
{
	
	$secao = array();
		$conexao = conectaMysql();

	$sql = "SELECT secoesPagina.*, secoes.*, paginas.* FROM secoesPagina
          INNER JOIN secoes on secoes.idSecao = secoesPagina.idSecao
          INNER JOIN paginas on paginas.idPagina = secoesPagina.idSecao";

if (isset($idSecaoPagina)) {
	$sql = $sql . " where secoesPagina.idSecaoPagina = " . $idSecaoPagina;
  }
	
 
    $rows = 0;
	
    $buscar = mysqli_query($conexao, $sql);
	
	
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
		
      array_push($secao, $row);
      $rows = $rows + 1;
    }
    
    if (isset($idSecaoPagina) && $rows==1) {
      $secao = $secao[0];
    }

	/* echo json_encode($secao);
	return; */
	return $secao;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="inserir") {

    	$idPagina = $_POST['idPagina'];
		$idSecao = $_POST['idSecao'];
		$ordem = $_POST['ordem'];
		
		$sql = "INSERT INTO `secoespagina`(`idPagina`,`idSecao`, `ordem`) VALUES ('$idPagina','$idSecao','$ordem')";
		/* echo json_encode($sql);
		return; */
	}

	if ($operacao=="editar") {
    	$idSecaoPagina = $_POST['idSecaoPagina'];
		$idPagina = $_POST['idPagina'];
    	$idSecao = $_POST['idSecao'];
		$ordem = $_POST['ordem'];
		
		
		$sql = "UPDATE `secoespagina` SET `idPagina`='$idPagina', `idSecao`='$idSecao',`ordem`='$ordem' WHERE idSecaoPagina = $idSecaoPagina";

		
		/* echo json_encode($sql);
		return; */
	}
	
	if ($operacao=="excluir") {
		$idSecaoPagina = $_POST['idSecaoPagina'];
		$sql = "DELETE FROM secoespagina WHERE idSecaoPagina = $idSecaoPagina";
	
	}

		$conexao = conectaMysql();
	
    $atualizar = mysqli_query($conexao,$sql);
    
	header('Location: ../perfil/secoesPaginas.php');
	
}



?>


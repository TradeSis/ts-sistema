<?php
include_once ('../conexao.php');
function buscaSecao($idSecao=null)
{
	
	$secao = array();
	$conexao = conectaMysql();

	$sql = "SELECT * FROM secoes";
	if (isset($idSecao)) {
	  $sql = $sql . " where secoes.idSecao = " . $idSecao;
	}

             

    $rows = 0;
	
    $buscar = mysqli_query($conexao, $sql);
	
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
      array_push($secao, $row);
      $rows = $rows + 1;
    }
    
    if (isset($idSecao) && $rows==1) {
      $secao = $secao[0];
    }

	/* echo json_encode($secao);
	return; */
	return $secao;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="inserir") {

		$tituloSecao = $_POST['tituloSecao'];
		$arquivoFonte = $_POST['arquivoFonte'];
	

		
		$sql = "INSERT INTO `secoes`(`tituloSecao`, `arquivoFonte`) VALUES ('$tituloSecao','$arquivoFonte')";
		/* echo json_encode($sql);
		return; */
	}

	if ($operacao=="editar") {
    $idSecao = $_POST['idSecao'];
		$tituloSecao = $_POST['tituloSecao'];
		$arquivoFonte = $_POST['arquivoFonte'];
		
	
		/* echo json_encode($_POST);
		return; */
		
		$sql = "UPDATE `secoes` SET `tituloSecao`='$tituloSecao',`arquivoFonte`='$arquivoFonte' WHERE idSecao = $idSecao";

		
		/* echo json_encode($sql);
		return; */
	}
	
	if ($operacao=="excluir") {
		$idSecao = $_POST['idSecao'];
		$sql = "DELETE FROM secoes WHERE idSecao = $idSecao";
		
	}

	$conexao = conectaMysql();
	
    $atualizar = mysqli_query($conexao,$sql);
    
	header('Location: ../perfil/secao.php');
	
}


?>


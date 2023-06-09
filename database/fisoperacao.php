<?php
// gabriel 060623 15:06

include_once('../conexao.php');

function buscaOperacao($idOperacao=null)
{
	
	$operacao = array();
	$apiEntrada = array(
		'idOperacao' => $idOperacao,
	);
	$operacao = chamaAPI(null, '/sistema/fisoperacao', json_encode($apiEntrada), 'GET');
	return $operacao;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="inserir") {
		$apiEntrada = array(
			'nomeOperacao' => $_POST['nomeOperacao'],
			'idAtividade' => $_POST['idAtividade'],
			'idProcesso' => $_POST['idProcesso'],
			'idNatureza' => $_POST['idNatureza'],
			'idGrupoOper' => $_POST['idGrupoOper'],
			'idEntSai' => $_POST['idEntSai'],
			'xfop' => $_POST['xfop']
		);
		$operacao = chamaAPI(null, '/sistema/fisoperacao', json_encode($apiEntrada), 'PUT');
	}

	if ($operacao=="alterar") {
		$apiEntrada = array(
			'idOperacao' => $_POST['idOperacao'],
			'nomeOperacao' => $_POST['nomeOperacao'],
			'idAtividade' => $_POST['idAtividade'],
			'idProcesso' => $_POST['idProcesso'],
			'idNatureza' => $_POST['idNatureza'],
			'idGrupoOper' => $_POST['idGrupoOper'],
			'idEntSai' => $_POST['idEntSai'],
			'xfop' => $_POST['xfop']
		);
		$operacao = chamaAPI(null, '/sistema/fisoperacao', json_encode($apiEntrada), 'POST');
	}
	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idOperacao' => $_POST['idOperacao']
		);
		$operacao = chamaAPI(null, '/sistema/fisoperacao', json_encode($apiEntrada), 'DELETE');
	}

    if ($operacao == "filtrar") {

		$idAtividade = $_POST["idAtividade"];
		$idProcesso  = $_POST["idProcesso"];
		$idNatureza  = $_POST["idNatureza"];
       

		if ($idAtividade == ""){
			$idAtividade = null;
		} 

		if ($idProcesso == ""){
			$idProcesso = null;
		}

		if ($idNatureza == ""){
			$idNatureza = null;
		}

		$apiEntrada = array(
			'idAtividade' => $idAtividade,
			'idProcesso' => $idProcesso,
			'idNatureza' => $idNatureza
		);
		
	
		$operacao = chamaAPI(null, '/sistema/fisoperacao', json_encode($apiEntrada), 'GET');

		echo json_encode($operacao);
		return $operacao;

	}



	header('Location: ../fiscal/fisoperacao.php');	
	
}

?>


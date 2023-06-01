<?php
include_once('../conexao.php');

function buscaMarcas($idMarca=null)
{
	
	$marca = array();
	//echo json_encode($marca);
	//return;
	$apiEntrada = array(
		'idMarca' => $idMarca,
	);
	/* echo "-ENTRADA->".json_encode($apiEntrada)."\n";
	return; */
	$marca = chamaAPI(null, 'sistema/marcas', json_encode($apiEntrada), 'GET');
	//echo json_encode($marca);
	return $marca;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {
		$apiEntrada = array(
			'nomeMarca' => $_POST['nomeMarca'],
			'imgMarca' => $_FILES['imgMarca'],
			
		);
		$marca = chamaAPI(null, 'sistema/marcas', json_encode($apiEntrada), 'PUT');
		
	}

	
	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idMarca' => $_POST['idMarca'],
		);
		/* echo json_encode($apiEntrada);
		return; */
		$marca = chamaAPI(null, 'sistema/marcas', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../cadastros/marcas.php');	
	
}

?>
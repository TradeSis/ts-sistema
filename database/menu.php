<?php
//Lucas 05042023 criado
/* include_once __DIR__."/../head.php";
include_once (ROOT.'/sistema/conexao.php'); */
include_once __DIR__ . "/../conexao.php";

function buscaMenu($IDMenu=null)
{
	
	$menu = array();
	//echo json_encode($menu);
	//return;
	$apiEntrada = array(
		'IDMenu' => $IDMenu,
	);
	/* echo "-ENTRADA->".json_encode($apiEntrada)."\n";
	return; */
	$menu = chamaAPI(null, '/sistema/menu', json_encode($apiEntrada), 'GET');
	//echo json_encode($menu);
	return $menu;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="inserir") {
		$apiEntrada = array(
			'nomeMenu' => $_POST['nomeMenu'],
            'idAplicativo' => $_POST['idAplicativo'],
            'nivelMenu' => $_POST['nivelMenu'],
            'menuHeader' => $_POST['menuHeader']
		);
		$menu = chamaAPI(null, '/sistema/menu', json_encode($apiEntrada), 'PUT');
	}

	if ($operacao=="alterar") {
		$apiEntrada = array(
            
			'IDMenu' => $_POST['IDMenu'],
			'nomeMenu' => $_POST['nomeMenu'],
            'idAplicativo' => $_POST['idAplicativo'],
            'nivelMenu' => $_POST['nivelMenu'],
            'menuHeader' => $_POST['menuHeader']
		);

		$menu = chamaAPI(null, '/sistema/menu', json_encode($apiEntrada), 'POST');
	}
	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'IDMenu' => $_POST['IDMenu']
		);
		$menu = chamaAPI(null, '/sistema/menu', json_encode($apiEntrada), 'DELETE');
	}



	header('Location: ../configuracao/menu.php');	
	
}

?>


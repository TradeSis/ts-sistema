<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');


function buscaNCM($Descricao=null, $Codigo=null)
{
	
	$ncm = array();
	
	$apiEntrada = array(
		'Descricao' => $Descricao,
		'Codigo' => $Codigo
        
	);
	
    /* echo json_encode($apiEntrada);
    return; */
	$ncm = chamaAPI(null, '/sistema/ncm', json_encode($apiEntrada), 'GET');
	
	return $ncm;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];
    if ($operacao == "filtrar") {

		$Descricao = $_POST["Descricao"];
		$Codigo = $_POST["Codigo"];
       

		if ($Descricao == ""){
			$Descricao = null;
		} 

		if ($Codigo == ""){
			$Codigo = null;
		}

		$apiEntrada = array(

			'Descricao' => $Descricao,
			'Codigo' => $Codigo
		);
		
	
		//echo json_encode(($apiEntrada));
		/* return; */
		$ncm = chamaAPI(null, '/sistema/ncm', json_encode($apiEntrada), 'GET');

		echo json_encode($ncm);
		return $ncm;

		header('Location: ../ncm/ncm.php');
	}
	


}

?>
<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');


function buscaNCM($Descricao=null, $codigoNcm=null)
{
	
	$ncm = array();
	
	$apiEntrada = array(
		'Descricao' => $Descricao,
		'codigoNcm' => $codigoNcm
        
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
		$codigoNcm  = $_POST["codigoNcm"];
       

		if ($Descricao == ""){
			$Descricao = null;
		} 

		if ($codigoNcm == ""){
			$codigoNcm = null;
		}

		$apiEntrada = array(

			'Descricao' => $Descricao,
			'codigoNcm' => $codigoNcm
		);
		
	
		//echo json_encode(($apiEntrada));
		/* return; */
		$ncm = chamaAPI(null, '/sistema/ncm', json_encode($apiEntrada), 'GET');

		echo json_encode($ncm);
		return $ncm;

	}
	


}

?>
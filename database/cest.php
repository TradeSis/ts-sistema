<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');


function buscaCest($nomeCest=null, $codigoCest=null, $codigoNcm=null)
{
	
	$cest = array();
	
	$apiEntrada = array(
		'nomeCest' => $nomeCest,
		'codigoCest' => $codigoCest,
		'codigoNcm' => $codigoNcm
        
	);
	
    /* echo json_encode($apiEntrada);
    return; */
	$cest = chamaAPI(null, '/sistema/cest', json_encode($apiEntrada), 'GET');
	
	return $cest;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];
    if ($operacao == "filtrar") {

		$nomeCest = $_POST["nomeCest"];
		$codigoCest  = $_POST["codigoCest"];
		$codigoNcm  = $_POST["codigoNcm"];
       

		if ($nomeCest == ""){
			$nomeCest = null;
		} 

		if ($codigoCest == ""){
			$codigoCest = null;
		}

		if ($codigoNcm == ""){
			$codigoNcm = null;
		}

		$apiEntrada = array(

			'nomeCest' => $nomeCest,
			'codigoCest' => $codigoCest,
			'codigoNcm' => $codigoNcm
		);
		
	
		//echo json_encode(($apiEntrada));
		/* return; */
		$cest = chamaAPI(null, '/sistema/cest', json_encode($apiEntrada), 'GET');

		echo json_encode($cest);
		return $cest;

	}
	


}

?>
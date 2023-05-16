<?php
include_once ('../conexao.php');
function buscaPagina($slug)
{
	
	$pagina = array();
	
	$apiEntrada = array(
		'slug' => $slug,
	);
	/* echo "-ENTRADA->".json_encode($apiEntrada)."\n";
	return; */
	$pagina = chamaAPI(null, '/api/sistema/paginas_slug', json_encode($apiEntrada), 'GET');
	
	return $pagina;
}

function buscaPaginas($idPagina=null)
{
	
	
	$pagina = array();
	
	$apiEntrada = array(
		'idPagina' => $idPagina,
	);
	/* echo "-ENTRADA->".json_encode($apiEntrada)."\n";
	return; */
	$pagina = chamaAPI(null, '/api/sistema/paginas', json_encode($apiEntrada), 'GET');
	
	return $pagina;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="inserir") {

		$apiEntrada = array(
			'slug' => $_POST['slug'],
			'tituloPagina' => $_POST['tituloPagina'],
			'conteudoHTML' => $_POST['conteudoHTML'],
			'arquivoFonte' => $_POST['arquivoFonte'],
			'arquivoSingle' => $_POST['arquivoSingle'],
		);

		$pagina = chamaAPI(null, '/api/sistema/paginas', json_encode($apiEntrada), 'PUT');
		
	}

	if ($operacao=="alterar") {

        $apiEntrada = array(
            'idPagina' => $_POST['idPagina'],
            'tituloPagina' => $_POST['tituloPagina'],
            'conteudoHTML' => $_POST['conteudoHTML'],
            'arquivoFonte' => $_POST['arquivoFonte'],
            'arquivoSingle' => $_POST['arquivoSingle'],
        );

		$pagina = chamaAPI(null, '/api/sistema/paginas', json_encode($apiEntrada), 'POST');

		
		/* echo json_encode($sql);
		return; */
	}
	
	if ($operacao=="excluir") {
        $apiEntrada = array(
            'idPagina' => $_POST['idPagina']
        );

		$pagina = chamaAPI(null, '/api/sistema/paginas', json_encode($apiEntrada), 'DELETE');
		
	}

    
	header('Location: ../perfil/paginas.php');
	
}



?>


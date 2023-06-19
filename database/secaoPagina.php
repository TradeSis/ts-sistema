<?php

include_once __DIR__ . "/../../config.php";
include_once(ROOT . '/sistema/conexao.php');

function buscaSecaoPagina($idPagina)
{

	$secoesPagina = array();

	$apiEntrada = array(
		'idPagina' => $idPagina,
	);
	$secoesPagina = chamaAPI(null, '/sistema/secoesPagina_individual', json_encode($apiEntrada), 'GET');
	return $secoesPagina;
}

function buscaSecaoPaginas($idSecaoPagina = null, $idPagina = null)
{

	$secoesPagina = array();

	$apiEntrada = array(
		'idSecaoPagina' => $idSecaoPagina,
		'idPagina' => $idPagina
	);

	$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'GET');
	return $secoesPagina;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao == "inserir") {

		$apiEntrada = array(

			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => $_POST['parametros'],

		);

		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'PUT');
	}

	if ($operacao == "alterar") {

		/* echo json_encode($_POST['parametros']);
		echo json_encode($_POST['titulo']);
		return; */

		$parametros1 = array(

			'titulo' => $_POST['titulo'],
			'subTitulo' => $_POST['subTitulo'],
			'descricao' => $_POST['descricao'],
			'pastaImg' => $_POST['pastaImg'],
			'nomeImg' => $_POST['nomeImg'],
			'textoBotao' => $_POST['textoBotao'],
			'corCard' => $_POST['corCard'],
			'textoFooter1' => $_POST['textoFooter1'],
			'textoFooter2' => $_POST['textoFooter2'],
		);


		$parametros = array_map('htmlentities', $parametros1);

		$apiEntrada = array(

			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),

		);

		/* echo json_encode($apiEntrada);
		return; */
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	if ($operacao == "excluir") {
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
		);

		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'DELETE');
	}

	// cardImg3col
	if ($operacao == "cardImg3col") {
		$parametros1 = array(

			'titulo' => $_POST['titulo'],
			'subTitulo' => $_POST['subTitulo'],
			'pastaImg' => $_POST['pastaImg'],
			'img1' => $_POST['img1'],
			'href1' => $_POST['href1'],
			'img2' => $_POST['img2'],
			'href2' => $_POST['href2'],
			'img3' => $_POST['img3'],
			'href3' => $_POST['href3'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// cardImg5col
	if ($operacao == "cardImg5col") {
		$parametros1 = array(

			'pastaImg' => $_POST['pastaImg'],
			'tituloCard1' => $_POST['tituloCard1'],
			'img1' => $_POST['img1'],
			'href1' => $_POST['href1'],
			'tituloCard2' => $_POST['tituloCard2'],
			'img2' => $_POST['img2'],
			'href2' => $_POST['href2'],
			'tituloCard3' => $_POST['tituloCard3'],
			'img3' => $_POST['img3'],
			'href3' => $_POST['href3'],
			'tituloCard4' => $_POST['tituloCard4'],
			'img4' => $_POST['img4'],
			'href4' => $_POST['href4'],
			'tituloCard5' => $_POST['tituloCard5'],
			'img5' => $_POST['img5'],
			'href5' => $_POST['href5'],

		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		/* echo json_encode($apiEntrada);
			return; */
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// cardServicos2col
	if ($operacao == "cardServicos2col") {
		$parametros1 = array(

			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'pastaImg' => $_POST['pastaImg'],
			'textoBotao' => $_POST['textoBotao'],

		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		/* echo json_encode($apiEntrada);
						return; */
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// cardServicos3col
	if ($operacao == "cardServicos3col") {
		$parametros1 = array(

			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'pastaImg' => $_POST['pastaImg'],
			'textoBotao' => $_POST['textoBotao'],

		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		/* echo json_encode($apiEntrada);
					return; */
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// cardServicos3colBordaRedonda
	if ($operacao == "cardServicos3colBordaRedonda") {
		$parametros1 = array(

			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'pastaImg' => $_POST['pastaImg'],
			'corCard' => $_POST['corCard'],

		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		/* echo json_encode($apiEntrada);
						return; */
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}


	// divisorListra
	if ($operacao == "divisorListra") {
		$parametros1 = array(

			'titulo' => $_POST['titulo'],

		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);

		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// divisorListraComItens
	if ($operacao == "divisorListraComItens") {
		$parametros1 = array(

			'titulo' => $_POST['titulo'],
			'item1' => $_POST['item1'],
			'item2' => $_POST['item2'],
			'item3' => $_POST['item3'],
			'item4' => $_POST['item4'],
			'item5' => $_POST['item5'],

		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// footer2col
	if ($operacao == "footer2col") {
		$parametros1 = array(

			'texto1' => $_POST['texto1'],
			'texto2' => $_POST['texto2'],

		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}
	// footerImgFundo3col
	if ($operacao == "footerImgFundo3col") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'nomeImg' => $_POST['nomeImg'],
			'pastaImg' => $_POST['pastaImg'],
			'tituloLinks' => $_POST['tituloLinks'],
			'nome1' => $_POST['nome1'],
			'href1' => $_POST['href1'],
			'nome2' => $_POST['nome2'],
			'href2' => $_POST['href2'],
			'nome3' => $_POST['nome3'],
			'href3' => $_POST['href3'],
			'tituloContato' => $_POST['tituloContato'],
			'textoEndereco' => $_POST['textoEndereco'],
			'textoWhatsapp' => $_POST['textoWhatsapp'],
			'textoEmail' => $_POST['textoEmail'],
			'textoFinal' => $_POST['textoFinal'],


		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// footerlogo3col
	if ($operacao == "footerlogo3col") {
		$parametros1 = array(

			'nomeImg' => $_POST['nomeImg'],
			'pastaImg' => $_POST['pastaImg'],
			'tituloContato' => $_POST['tituloContato'],
			'textoWhatsapp' => $_POST['textoWhatsapp'],
			'textoEmail' => $_POST['textoEmail'],
			'tituloEndereco' => $_POST['tituloEndereco'],
			'textoEndereco' => $_POST['textoEndereco'],
			'textoBairro' => $_POST['textoBairro'],
			'textoCep' => $_POST['textoCep'],
			'textoCidade' => $_POST['textoCidade'],
			'textoRedesSociais' => $_POST['textoRedesSociais'],


		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// listaProdutos5col
	if ($operacao == "listaProdutos5col") {
		$parametros1 = array(

			'titulo' => $_POST['titulo'],
			'pastaImg' => $_POST['pastaImg'],


		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}


	// listaServicos3col
	if ($operacao == "listaServicos3col") {
		$parametros1 = array(

			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'pastaImg' => $_POST['pastaImg'],
			'textoBotao' => $_POST['textoBotao'],

		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// listaServicos4col
	if ($operacao == "listaServicos4col") {
		$parametros1 = array(

			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'pastaImg' => $_POST['pastaImg'],
			'textoBotao' => $_POST['textoBotao'],

		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// listaServicos4colHorizaontal
	if ($operacao == "listaServicos4colHorizaontal") {
		$parametros1 = array(

			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'pastaImg' => $_POST['pastaImg'],
			'textoBotao' => $_POST['textoBotao'],

		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// tituloPrincipal1col
	if ($operacao == "tituloPrincipal1col") {
		$parametros1 = array(

			'titulo' => $_POST['titulo'],
			'subTitulo' => $_POST['subTitulo'],
			'textoBotao' => $_POST['textoBotao'],

		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}


	// tituloPrincipal2col
	if ($operacao == "tituloPrincipal2col") {
		$parametros1 = array(

			'titulo' => $_POST['titulo'],
			'subTitulo' => $_POST['subTitulo'],
			'textoBotao' => $_POST['textoBotao'],
			'nomeImg' => $_POST['nomeImg'],
			'pastaImg' => $_POST['pastaImg'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}
	// quemSomosSimples
	if ($operacao == "quemSomosSimples") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'nomeImg' => $_POST['nomeImg'],
			'pastaImg' => $_POST['pastaImg'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// quemSomosImg
	if ($operacao == "quemSomosImg") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'nomeImg' => $_POST['nomeImg'],
			'nomeImgFundo' => $_POST['nomeImgFundo'],
			'pastaImg' => $_POST['pastaImg'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// formContatoSimples
	if ($operacao == "formContatoSimples") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'textoBotao' => $_POST['textoBotao'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// formContatoImg
	if ($operacao == "formContatoImg") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'textoBotao' => $_POST['textoBotao'],
			'nomeImg' => $_POST['nomeImg'],
			'pastaImg' => $_POST['pastaImg'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// headerFaixaTopo
	if ($operacao == "headerFaixaTopo") {
		$parametros1 = array(
			'textoWhatsapp' => $_POST['textoWhatsapp'],
			'textoEmail' => $_POST['textoEmail'],
			'nomeImg' => $_POST['nomeImg'],
			'pastaImg' => $_POST['pastaImg'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	header('Location: ../perfil/paginas.php');
}

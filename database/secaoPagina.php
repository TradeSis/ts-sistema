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
		$img1 = $_FILES['img1'];
		if ($img1 !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $img1["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg1 = $img1["name"];

				move_uploaded_file($img1['tmp_name'], $pasta . $novoNomeImg1);
			} else {
				$novoNomeImg1 = "Sem_imagem";
			}
		}
		$img2 = $_FILES['img2'];
		if ($img2 !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $img2["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg2 = $img2["name"];

				move_uploaded_file($img2['tmp_name'], $pasta . $novoNomeImg2);
			} else {
				$novoNomeImg2 = "Sem_imagem";
			}
		}
		$img3 = $_FILES['img3'];
		if ($img3 !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $img3["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg3 = $img3["name"];

				move_uploaded_file($img3['tmp_name'], $pasta . $novoNomeImg3);
			} else {
				$novoNomeImg3 = "Sem_imagem";
			}
		}

		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'subTitulo' => $_POST['subTitulo'],
			'img1' => $novoNomeImg1,
			'link1' => $_POST['link1'],
			'img2' => $novoNomeImg2,
			'link2' => $_POST['link2'],
			'img3' => $novoNomeImg3,
			'link3' => $_POST['link3'],
		);

		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		/* echo json_encode($apiEntrada);
		return; */
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// cardImg5col
	if ($operacao == "cardImg5col") {
		$img1 = $_FILES['img1'];
		if ($img1 !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $img1["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg1 = $img1["name"];

				move_uploaded_file($img1['tmp_name'], $pasta . $novoNomeImg1);
			} else {
				$novoNomeImg1 = "Sem_imagem";
			}
		}
		$img2 = $_FILES['img2'];
		if ($img2 !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $img2["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg2 = $img2["name"];

				move_uploaded_file($img2['tmp_name'], $pasta . $novoNomeImg2);
			} else {
				$novoNomeImg2 = "Sem_imagem";
			}
		}
		$img3 = $_FILES['img3'];
		if ($img3 !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $img3["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg3 = $img3["name"];

				move_uploaded_file($img3['tmp_name'], $pasta . $novoNomeImg3);
			} else {
				$novoNomeImg3 = "Sem_imagem";
			}
		}

		$img4 = $_FILES['img4'];
		if ($img4 !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $img4["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg4 = $img4["name"];

				move_uploaded_file($img4['tmp_name'], $pasta . $novoNomeImg4);
			} else {
				$novoNomeImg4 = "Sem_imagem";
			}
		}

		$img5 = $_FILES['img5'];
		if ($img5 !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $img5["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg5 = $img5["name"];

				move_uploaded_file($img5['tmp_name'], $pasta . $novoNomeImg5);
			} else {
				$novoNomeImg5 = "Sem_imagem";
			}
		}

		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'img1' => $novoNomeImg1,
			'link1' => $_POST['link1'],
			'tituloCard1' => $_POST['tituloCard1'],
			'img2' => $novoNomeImg2,
			'link2' => $_POST['link2'],
			'tituloCard2' => $_POST['tituloCard2'],
			'img3' => $novoNomeImg3,
			'link3' => $_POST['link3'],
			'tituloCard3' => $_POST['tituloCard3'],
			'img4' => $novoNomeImg4,
			'link4' => $_POST['link4'],
			'tituloCard4' => $_POST['tituloCard4'],
			'img5' => $novoNomeImg5,
			'link5' => $_POST['link5'],
			'tituloCard5' => $_POST['tituloCard5'],
		);

		$parametros = array_map('htmlentities', $parametros1);

		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// cardServicos2col
	if ($operacao == "cardServicos2col") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'textoBotao' => $_POST['textoBotao'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// cardServicos3col
	if ($operacao == "cardServicos3col") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'textoBotao' => $_POST['textoBotao'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// cardServicos3colBordaRedonda
	if ($operacao == "cardServicos3colBordaRedonda") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'corCard' => $_POST['corCard'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
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
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);

		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// divisorListraComItens
	if ($operacao == "divisorListraComItens") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
			'listas' => $_POST['listas'],
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
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}
	// footerImgFundo3col
	if ($operacao == "footerImgFundo3col") {
		$img = $_FILES['img'];
		if ($img !== null) {
			preg_match("/\.(png|jpg|jpeg){1}$/i", $img["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $img["name"];

				move_uploaded_file($img['tmp_name'], $pasta . $novoNomeImg);
			} else {
				$novoNomeImg = "Sem_imagem";
			}
		}
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'img' => $novoNomeImg,
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
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// footerlogo3col
	if ($operacao == "footerlogo3col") {
		$logo = $_FILES['logo'];
		if ($logo !== null) {
			preg_match("/\.(png|jpg|jpeg){1}$/i", $logo["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeLogo = $logo["name"];

				move_uploaded_file($logo['tmp_name'], $pasta . $novoNomeLogo);
			} else {
				$novoNomeLogo = "Sem_imagem";
			}
		}
		$parametros1 = array(
			'logo' => $novoNomeLogo,
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
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// listaProdutos5col
	if ($operacao == "listaProdutos5col") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}


	// listaServicos3col
	if ($operacao == "listaServicos3col") {
		$parametros1 = array(

			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'textoBotao' => $_POST['textoBotao'],

		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// listaServicos4col
	if ($operacao == "listaServicos4col") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'textoBotao' => $_POST['textoBotao'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// listaServicos4colHorizaontal
	if ($operacao == "listaServicos4colHorizaontal") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'textoBotao' => $_POST['textoBotao'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
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
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}


	// tituloPrincipal2col
	if ($operacao == "tituloPrincipal2col") {
		$img = $_FILES['img'];
		if ($img !== null) {
			preg_match("/\.(png|jpg|jpeg){1}$/i", $img["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $img["name"];

				move_uploaded_file($img['tmp_name'], $pasta . $novoNomeImg);
			} else {
				$novoNomeImg = "Sem_imagem";
			}
		}
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'subTitulo' => $_POST['subTitulo'],
			'textoBotao' => $_POST['textoBotao'],
			'img' => $novoNomeImg,
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}
	// quemSomosSimples
	if ($operacao == "quemSomosSimples") {
		$img = $_FILES['img'];
		if ($img !== null) {
			preg_match("/\.(png|jpg|jpeg){1}$/i", $img["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $img["name"];

				move_uploaded_file($img['tmp_name'], $pasta . $novoNomeImg);
			} else {
				$novoNomeImg = "Sem_imagem";
			}
		}

		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'img' => $novoNomeImg,
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// quemSomosImg
	if ($operacao == "quemSomosImg") {

		$img = $_FILES['img'];
		if ($img !== null) {
			preg_match("/\.(png|jpg|jpeg){1}$/i", $img["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $img["name"];

				move_uploaded_file($img['tmp_name'], $pasta . $novoNomeImg);
			} else {
				$novoNomeImg = "Sem_imagem";
			}
		}

		$imgFundo = $_FILES['imgFundo'];
		if ($imgFundo !== null) {
			preg_match("/\.(png|jpg|jpeg){1}$/i", $imgFundo["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImgFundo = $imgFundo["name"];

				move_uploaded_file($imgFundo['tmp_name'], $pasta . $novoNomeImgFundo);
			} else {
				$novoNomeImgFundo = "Sem_imagem";
			}
		}

		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
			'imgFundo' => $novoNomeImgFundo,
			'img' => $novoNomeImg,
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		/* echo json_encode($apiEntrada);
		return; */
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
			'coluna' => $_POST['coluna'],
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
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// headerFaixaTopo
	if ($operacao == "headerFaixaTopo") {

		$logo = $_FILES['logo'];
		if ($logo !== null) {
			preg_match("/\.(png|jpg|jpeg){1}$/i", $logo["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeLogo = $logo["name"];

				move_uploaded_file($logo['tmp_name'], $pasta . $novoNomeLogo);
			} else {
				$novoNomeLogo = "Sem_imagem";
			}
		}

		$parametros1 = array(
			'textoWhatsapp' => $_POST['textoWhatsapp'],
			'textoEmail' => $_POST['textoEmail'],
			'logo' => $novoNomeLogo,
		);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros1),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// listaPosts_modelo1
	if ($operacao == "listaPosts_modelo1") {
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => $_POST['parametros'],
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// sliderProdutos
	if ($operacao == "sliderProdutos") {
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => $_POST['parametros'],
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// postsRecentes
	if ($operacao == "postsRecentes") {
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => $_POST['parametros'],
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// siderBar_modelo1 
	if ($operacao == "siderBar_modelo1") {
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => $_POST['parametros'],
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// sobre_modelo1
	if ($operacao == "sobre_modelo1") {

		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'descricao' => $_POST['descricao'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// header2linha
	if ($operacao == "header2linha") {

		$logo = $_FILES['logo'];
		if ($logo !== null) {
			preg_match("/\.(png|jpg|jpeg){1}$/i", $logo["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeLogo = $logo["name"];

				move_uploaded_file($logo['tmp_name'], $pasta . $novoNomeLogo);
			} else {
				$novoNomeLogo = "Sem_imagem";
			}
		}

		$parametros1 = array(
			'logo' => $novoNomeLogo,
		);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros1),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// slidePosts3col
	if ($operacao == "slidePosts3col") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
			'subTitulo' => $_POST['subTitulo'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// slideMarcas
	if ($operacao == "slideMarcas") {

		$parametros = '';
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => $parametros,
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// listaReceitas
	if ($operacao == "listaReceitas") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// cardUltimasNoticias
	if ($operacao == "cardUltimasNoticias") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// cardSobreChocolate
	if ($operacao == "cardSobreChocolate") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// cardCuriosidades
	if ($operacao == "cardCuriosidades") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// cardCursos
	if ($operacao == "cardCursos") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// cardPodcast
	if ($operacao == "cardPodcast") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// cardEventos
	if ($operacao == "cardEventos") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}


	// cardVisitacao
	if ($operacao == "cardVisitacao") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// siderBarColunistas
	if ($operacao == "siderBarColunistas") {

		$parametros = '';
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}


	// listaMarcasEspecializadas
	if ($operacao == "listaMarcasEspecializadas") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

	// listaMarcas
	if ($operacao == "listaMarcas") {
		$parametros1 = array(
			'titulo' => $_POST['titulo'],
		);
		$parametros = array_map('htmlentities', $parametros1);
		$apiEntrada = array(
			'idSecaoPagina' => $_POST['idSecaoPagina'],
			'idPagina' => $_POST['idPagina'],
			'idSecao' => $_POST['idSecao'],
			'ordem' => $_POST['ordem'],
			'coluna' => $_POST['coluna'],
			'parametros' => json_encode($parametros),
		);
		$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
	}

		// listaMarcas_mapa
		if ($operacao == "listaMarcas_mapa") {
			
			$parametros = '';
			$apiEntrada = array(
				'idSecaoPagina' => $_POST['idSecaoPagina'],
				'idPagina' => $_POST['idPagina'],
				'idSecao' => $_POST['idSecao'],
				'ordem' => $_POST['ordem'],
				'coluna' => $_POST['coluna'],
				'parametros' => json_encode($parametros),
			);
			$secoesPagina = chamaAPI(null, '/sistema/secoesPagina', json_encode($apiEntrada), 'POST');
		}



	header("Location: ../perfil/paginas.php");
}

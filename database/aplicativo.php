<?php
//Lucas 05042023 criado
//echo "sistema/aplicativo.php<hr>";
include_once __DIR__."/../conexao.php";

function buscaAplicativos($idAplicativo=null)
{

    $app = array();

	$idCliente = null;
	if (isset($_SESSION['idCliente'])) {
    	$idCliente = $_SESSION['idCliente'];
	}
	
    $apiEntrada = array(
        'idAplicativo' => $idAplicativo,
		'idCliente' => $idCliente,
    );
    $app = chamaAPI(null, '/sistema/aplicativo', json_encode($apiEntrada), 'GET');
    return $app;
}

function buscaAplicativosMenu($idUsuario)
{

    $app = array();
    $apiEntrada = array(
        'idUsuario' => $idUsuario
    );
    $app = chamaAPI(null, '/sistema/aplicativo', json_encode($apiEntrada), 'GET');
    return $app;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao == "inserir") {


		$img = $_FILES['imgAplicativo'];
		
		$pasta = "/img/brand/";
		$imgAplicativo = $img['name'];
		$novoNomeImg = uniqid(); //gerar nome aleatorio para ser guardado na pasta 
		$extensao = strtolower(pathinfo($imgAplicativo,PATHINFO_EXTENSION)); //extensao do arquivo

		if($extensao != "" && $extensao != "jpg" && $extensao != "png")
        die("Tipo de aquivo não aceito");

		$pathImgFisico = defineROOT() . $pasta . $novoNomeImg . "." . $extensao;
		$pathImgURL = "/ts" . $pasta . $novoNomeImg . "." . $extensao;
		move_uploaded_file($img["tmp_name"],$pathImgFisico);


		$apiEntrada = array(
			'nomeAplicativo' => $_POST['nomeAplicativo'],
			'appLink' => $_POST['appLink'],
			'nivelMenu' => $_POST['nivelMenu'],
			'imgAplicativo' => $imgAplicativo,
			'pathImg'=> $pathImgURL,
			
		);
		/*  echo json_encode($_POST);
		echo "\n";
		echo json_encode($apiEntrada);
		return;  */
		$app = chamaAPI(null, '/sistema/aplicativo', json_encode($apiEntrada), 'PUT');
		
	}

    if ($operacao == "alterar") {

		$img = $_FILES['imgAplicativo'];
		
		$pasta = "../img/imgAplicativo/";
		$imgAplicativo = $img['name'];
		$novoNomeImg = uniqid(); //gerar nome aleatorio para ser guardado na pasta 
		$extensao = strtolower(pathinfo($imgAplicativo,PATHINFO_EXTENSION)); //extensao do arquivo

		if($extensao != "" && $extensao != "jpg" && $extensao != "png")
        die("Tipo de aquivo não aceito");

		$pathImg = $pasta . $novoNomeImg . "." . $extensao;
		move_uploaded_file($img["tmp_name"],$pathImg);
		
		$apiEntrada = array(
			'idAplicativo' => $_POST['idAplicativo'],
			'nomeAplicativo' => $_POST['nomeAplicativo'],
			'appLink' => $_POST['appLink'],
			'nivelMenu' => $_POST['nivelMenu'],
			'imgAplicativo' => $_POST['imgAplicativo'],
			'pathImg'=> $pathImg,
		);

		$app = chamaAPI(null, '/sistema/aplicativo', json_encode($apiEntrada), 'POST');
		
	}

	if ($operacao == "excluir") {
		$apiEntrada = array(
			'idAplicativo' => $_POST['idAplicativo']		
		);

		$app = chamaAPI(null, '/sistema/aplicativo', json_encode($apiEntrada), 'DELETE');
		
	}

	
	header('Location: ../configuracao/aplicativo.php');
}

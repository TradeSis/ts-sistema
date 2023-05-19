<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');

function buscaServicos($titulo=null)
{
	
	$servicos = array();
    $conexao = conectaMysql();

	$sql = "SELECT * FROM secao_servicos";
	if (isset($titulo)) {
	  $sql = $sql . " where secao_servicos.titulo = " . $titulo;
	}

    $rows = 0;
	
    $buscar = mysqli_query($conexao, $sql);
	
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
      array_push($servicos, $row);
      $rows = $rows + 1;
    }
    
    if (isset($titulo) && $rows==1) {
      $servicos = $servicos[0];
    }

	/* echo json_encode($servicos);
	return */;
	return $servicos;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];
    global $conexao;
	if ($operacao=="inserir") {

		$titulo = $_POST['titulo'];
		$descricao = $_POST['descricao'];

		$imgCard1 = $_FILES['imgCard1'];
		$tituloCard1 = $_POST['tituloCard1'];
		$descricaoCard1 = $_POST['descricaoCard1'];

		$imgCard2 = $_FILES['imgCard2'];
		$tituloCard2 = $_POST['tituloCard2'];
		$descricaoCard2 = $_POST['descricaoCard2'];

		$imgCard3 = $_FILES['imgCard3'];
		$tituloCard3 = $_POST['tituloCard3'];
		$descricaoCard3 = $_POST['descricaoCard3'];

        //$imgCard1
        if($imgCard1 !== null) {
            preg_match("/\.(png|jpg|jpeg){1}$/i", $imgCard1["name"],$ext);
        
            if($ext == true) {
                $pasta = "../admin/imgServicos/";
                $nome_arquivo1 = md5(uniqid(time())) . "." . $ext[1];
                
                move_uploaded_file($imgCard1['tmp_name'], $pasta.$nome_arquivo1);
        
            }

            /* return $imgCard1; */
        }

        //$imgCard2
        if($imgCard2 !== null) {
            preg_match("/\.(png|jpg|jpeg){1}$/i", $imgCard2["name"],$ext);
        
            if($ext == true) {
                $pasta = "../admin/imgServicos/";
                $nome_arquivo2 = md5(uniqid(time())) . "." . $ext[1];
                
                move_uploaded_file($imgCard2['tmp_name'], $pasta.$nome_arquivo2);
        
            }
            /* return $imgCard2; */
        }

        //$imgCard3
        if($imgCard3 !== null) {
            preg_match("/\.(png|jpg|jpeg){1}$/i", $imgCard3["name"],$ext);
        
            if($ext == true) {
                $pasta = "../admin/imgServicos/";
                $nome_arquivo3 = md5(uniqid(time())) . "." . $ext[1];
                
                move_uploaded_file($imgCard3['tmp_name'], $pasta.$nome_arquivo3);
        
            }
           /*  return $imgCard3; */
        }


		/* echo json_encode($_POST);
		return; */
		
		$sql = "INSERT INTO `secao_servicos`(`titulo`, `descricao`, `imgCard1`, `tituloCard1`, `descricaoCard1`, `imgCard2`, `tituloCard2`, `descricaoCard2`, `imgCard3`, `tituloCard3`, `descricaoCard3`) VALUES ('$titulo','$descricao','$nome_arquivo1','$tituloCard1','$descricaoCard1','$nome_arquivo2','$tituloCard2','$descricaoCard2','$nome_arquivo3','$tituloCard3','$descricaoCard3')";
        /* echo json_encode($sql);
		return; */
	}

	/* if ($operacao=="alterar") {
		$idCliente = $_POST['idCliente'];
		$nomeCliente = $_POST['nomeCliente'];
		$sql = "UPDATE cliente SET nomeCliente='$nomeCliente' WHERE idCliente = $idCliente";
	}
	
	if ($operacao=="excluir") {
		$id = $_POST['id'];
		$sql = "DELETE FROM sliders WHERE id = $id";
	} */

	global $conexao;
	
    $atualizar = mysqli_query($conexao,$sql);
    
	header('Location: ../servicos.php');
	
}

?>


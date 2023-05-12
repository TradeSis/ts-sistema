<?php

include_once ('../conexao.php');
/* include_once ('../conexao.php'); */
function buscaProdutos()
{
	
	$produtos = array();
	$conexao = conectaMysql();

	$sql = "SELECT * FROM produtos WHERE destaque = 1 Limit 3";
	
    /* echo json_encode($sql);
	return */
    $rows = 0;
	
    $buscar = mysqli_query($conexao, $sql);
	
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
      array_push($produtos, $row);
      $rows = $rows + 1;
    }
    
    if ($rows==1) {
      $produtos = $produtos[0];
    }

	/* echo json_encode($produtos);
	return */;
	return $produtos;
}

function buscaTodosProdutos($idProduto=null)
{
	
	$produtos = array();
	$conexao = conectaMysql();

	$sql = "SELECT * FROM produtos";
	if (isset($idProduto)) {
        $sql = $sql . " where produtos.idProduto = " . $idProduto;
      }

    $rows = 0;
	
    $buscar = mysqli_query($conexao, $sql);
	
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
      array_push($produtos, $row);
      $rows = $rows + 1;
    }
    
    if (isset($idProduto) &&$rows==1) {
      $produtos = $produtos[0];
    }

	/* echo json_encode($produtos);
	return; */
	return $produtos;
}



if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];
    $conexao = conectaMysql();
	if ($operacao=="inserir") {

		$nomeProduto = $_POST['nomeProduto'];
		$valorProduto = $_POST['valorProduto'];
		$fotoProduto = $_FILES['fotoProduto'];
		$destaque = $_POST['destaque'];
		

        //$imgCard1
        if($fotoProduto !== null) {
            preg_match("/\.(png|jpg|jpeg){1}$/i", $fotoProduto["name"],$ext);
        
            if($ext == true) {
                $pasta = "../admin/imgProdutos/";
                $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
                
                move_uploaded_file($fotoProduto['tmp_name'], $pasta.$nome_arquivo);
        
            }else{
                $nome_arquivo = "sem_foto";
            }

            /* return $fotoProduto; */
        }

       
		
		$sql = "INSERT INTO `produtos`(`nomeProduto`, `valorProduto`, `fotoProduto`, `destaque`) VALUES ('$nomeProduto','$valorProduto','$nome_arquivo','$destaque')";
        /* echo json_encode($sql);
		return; */
	}

	if ($operacao=="alterar") {
		$idProduto = $_POST['idProduto'];
        $nomeProduto = $_POST['nomeProduto'];
		$valorProduto = $_POST['valorProduto'];
		$sql = "UPDATE produtos SET nomeProduto='$nomeProduto', valorProduto='$valorProduto' WHERE idProduto = $idProduto";
	}
	
	if ($operacao=="excluir") {
		$idProduto = $_POST['idProduto'];
		$sql = "DELETE FROM produtos WHERE idProduto = $idProduto";
	}

	$conexao = conectaMysql();
	
    $atualizar = mysqli_query($conexao,$sql);
    
	header('Location: ../produtos.php');
	
}

?>


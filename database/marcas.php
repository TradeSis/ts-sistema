<?php
// Lucas 12052023 - adicionado tabela "marcas no banco" 
include_once ('../conexao.php');
function buscaMarcas($idMarca=null)
{
	
	$marcas = array();
	$conexao = conectaMysql();

	$sql = "SELECT * FROM marcas";
	if (isset($idMarca)) {
	  $sql = $sql . " where marcas.idMarca = " . $idMarca;
	}

    $rows = 0;
	
    $buscar = mysqli_query($conexao, $sql);
	
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
      array_push($marcas, $row);
      $rows = $rows + 1;
    }
    
    if (isset($idMarca) && $rows==1) {
      $marcas = $marcas[0];
    }

	/* echo json_encode($marcas);
	return */;
	return $marcas;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];
    $conexao = conectaMysql();
	if ($operacao=="inserir") {

		$nomeMarca = $_POST['nomeMarca'];

		$imgMarca = $_FILES['imgMarca'];
        

       
        if($imgMarca !== null) {
            preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgMarca["name"],$ext);
        
            if($ext == true) {
                $pasta = "../admin/imgMarcas/";
                $nome_marca = md5(uniqid(time())) . "." . $ext[1];
                
                move_uploaded_file($imgMarca['tmp_name'], $pasta.$nome_marca);
        
            }

         
        }


		$sql = "INSERT INTO `marcas`(`nomeMarca`, `imgMarca`) VALUES ('$nomeMarca', '$nome_marca')";
     
	}

	
	if ($operacao=="excluir") {
		$idMarca = $_POST['idMarca'];
		$sql = "DELETE FROM marcas WHERE idMarca = $idMarca";
	}

	$conexao = conectaMysql();
	
    $atualizar = mysqli_query($conexao,$sql);
    
	header('Location: ../perfil/marcas.php');
	
}

?>


<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/sistema/conexao.php');

function buscaBanner($id=null)
{
	
	$banner = array();
    $conexao = conectaMysql();

	$sql = "SELECT * FROM secao_banner";
	if (isset($id)) {
	  $sql = $sql . " where secao_banner.id = " . $id;
	}


    $rows = 0;
	
    $buscar = mysqli_query($conexao, $sql);
	
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
      array_push($banner, $row);
      $rows = $rows + 1;
    }
    
    if (isset($id) && $rows==1) {
      $banner = $banner[0];
    }

	/* echo json_encode($banner);
	return */;
	return $banner;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];
    global $conexao;
	if ($operacao=="inserir") {

		$nomeBanner = $_POST['nomeBanner'];
        $imgBanner1 = $_FILES['imgBanner1'];
        $imgBanner2 = $_FILES['imgBanner2'];
        $imgBanner3 = $_FILES['imgBanner3'];
        $imgBanner4 = $_FILES['imgBanner4'];
		$linkBanner = $_POST['linkBanner'];


        
        if($imgBanner1 !== null) {
            preg_match("/\.(png|jpg|jpeg){1}$/i", $imgBanner1["name"],$ext);
        
            if($ext == true) {
                $pasta = "../admin/imgBanner/";
                $nome_arquivo1 = md5(uniqid(time())) . "." . $ext[1];
                
                move_uploaded_file($imgBanner1['tmp_name'], $pasta.$nome_arquivo1);
        
            }

        }

        if($imgBanner2 !== null) {
            preg_match("/\.(png|jpg|jpeg){1}$/i", $imgBanner2["name"],$ext);
        
            if($ext == true) {
                $pasta = "../admin/imgBanner/";
                $nome_arquivo2 = md5(uniqid(time())) . "." . $ext[1];
                
                move_uploaded_file($imgBanner2['tmp_name'], $pasta.$nome_arquivo2);
        
            }

        }

        if($imgBanner3 !== null) {
            preg_match("/\.(png|jpg|jpeg){1}$/i", $imgBanner3["name"],$ext);
        
            if($ext == true) {
                $pasta = "../admin/imgBanner/";
                $nome_arquivo3 = md5(uniqid(time())) . "." . $ext[1];
                
                move_uploaded_file($imgBanner3['tmp_name'], $pasta.$nome_arquivo3);
        
            }

        }

        if($imgBanner4 !== null) {
            preg_match("/\.(png|jpg|jpeg){1}$/i", $imgBanner4["name"],$ext);
        
            if($ext == true) {
                $pasta = "../admin/imgBanner/";
                $nome_arquivo4 = md5(uniqid(time())) . "." . $ext[1];
                
                move_uploaded_file($imgBanner4['tmp_name'], $pasta.$nome_arquivo4);
        
            }

        }


		/* echo json_encode($_POST);
		return; */
		
		$sql = "INSERT INTO `secao_banner`(`nomeBanner`, `imgBanner1`, `imgBanner2`, `imgBanner3`, `imgBanner4`,`linkBanner`) VALUES ('$nomeBanner','$nome_arquivo1','$nome_arquivo2','$nome_arquivo3','$nome_arquivo4','$linkBanner')";
       /*  echo json_encode($sql);
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
    
	header('Location: ../banners.php');
	
}

?>


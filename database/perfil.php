<?php
include_once ('../conexao.php');
function buscaPerfil($idPerfil=null)
{
	
	$perfil = array();
	$conexao = conectaMysql();

	$sql = "SELECT * FROM perfil";
	if (isset($idPerfil)) {
	  $sql = $sql . " where perfil.idPerfil = " . $idPerfil;
	}

    $rows = 0;
	
    $buscar = mysqli_query($conexao, $sql);
	
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
      array_push($perfil, $row);
      $rows = $rows + 1;
    }
    
    if (isset($idPerfil) && $rows==1) {
      $perfil = $perfil[0];
    }

	/* echo json_encode($perfil);
	return; */
	return $perfil;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="inserir") {

		$nome = $_POST['nome'];
		$foto = $_FILES['foto'];
		$endereco = $_POST['endereco'];
		$numero = $_POST['numero'];
		$bairro = $_POST['bairro'];
		$cep = $_POST['cep'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$whatsapp = $_POST['whatsapp'];
		$logo = $_FILES['logo'];
		$twitter = $_POST['twitter'];
		$facebook = $_POST['facebook'];
		$instagram = $_POST['instagram'];


		if($logo !== null) {
            preg_match("/\.(png|jpg|jpeg){1}$/i", $logo["name"],$ext);
        
            if($ext == true) {
                $pasta = "../admin/imgPerfil/";
                $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
                
                move_uploaded_file($logo['tmp_name'], $pasta.$nome_arquivo);
        
            }

        }

		if($foto !== null) {
            preg_match("/\.(png|jpg|jpeg){1}$/i", $foto["name"],$ext);
        
            if($ext == true) {
                $pasta = "../admin/imgPerfil/";
                $nome_foto = md5(uniqid(time())) . "." . $ext[1];
                
                move_uploaded_file($foto['tmp_name'], $pasta.$nome_foto);
        
            }

        }

		/* echo json_encode($_POST);
		return; */
		
		$sql = "INSERT INTO `perfil`(`nome`, `foto`, `endereco`, `numero`, `bairro`, `cep`, `cidade`, `estado`, `email`, `telefone`, `whatsapp`, `logo`, `twitter`, `facebook`, `instagram`) VALUES ('$nome','$nome_foto','$endereco','$numero','$bairro','$cep','$cidade','$estado','$email','$telefone','$whatsapp', '$nome_arquivo','$twitter','$facebook','$instagram')";
		/* echo json_encode($sql);
		return; */
	}

	if ($operacao=="editar") {
		$idPerfil = $_POST['idPerfil'];
		$nome = $_POST['nome'];
		$foto = $_FILES['foto'];
		$endereco = $_POST['endereco'];
		$numero = $_POST['numero'];
		$bairro = $_POST['bairro'];
		$cep = $_POST['cep'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$whatsapp = $_POST['whatsapp'];
		$logo = $_FILES['logo'];
		$twitter = $_POST['twitter'];
		$facebook = $_POST['facebook'];
		$instagram = $_POST['instagram'];

		echo json_encode($logo);
		echo json_encode($foto);
		return;

	

		

		if($logo !== null) {
            preg_match("/\.(png|jpg|jpeg){1}$/i", $logo["name"],$ext);
        
            if($ext == true) {
                $pasta = "../admin/imgPerfil/";
                $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
                
                move_uploaded_file($logo['tmp_name'], $pasta.$nome_arquivo);
        
            }
        }else{
			$nome_arquivo = "sem_logo";
		}		
		
		if($foto !== null) {
            preg_match("/\.(png|jpg|jpeg){1}$/i", $foto["name"],$ext);
        
            if($ext == true) {
                $pasta = "../admin/imgPerfil/";
                $nome_foto = md5(uniqid(time())) . "." . $ext[1];
                
                move_uploaded_file($foto['tmp_name'], $pasta.$nome_foto);
        
            }
        }else{
			$nome_foto = "sem_foto";
		}
		
		
	
		
		
	
		/* echo json_encode($_POST);
		return; */
		
		$sql = "UPDATE `perfil` SET `nome`='$nome',`foto`='$nome_foto',`endereco`='$endereco',`numero`='$numero',`bairro`='$bairro',`cep`='$cep',`cidade`='$cidade',`estado`='$estado',`email`='$email',`telefone`='$telefone',`whatsapp`='$whatsapp',`logo`='$nome_arquivo',`twitter`='$twitter',`facebook`='$facebook',`instagram`='$instagram' WHERE idPerfil = $idPerfil";

		
		echo json_encode($sql);
		return;
	}
	
	if ($operacao=="excluir") {
		$idPerfil = $_POST['idPerfil'];
		$sql = "DELETE FROM perfil WHERE idPerfil = $idPerfil";
		
	}

	$conexao = conectaMysql();
	
    $atualizar = mysqli_query($conexao,$sql);
    
	header('Location: ../perfil.php');
	
}

?>


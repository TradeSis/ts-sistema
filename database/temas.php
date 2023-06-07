<?php

include_once (ROOT.'/sistema/conexao.php');

function buscaTemas($idTema=null){
  $temas = array();

  $apiEntrada = array(
		'idTema' => $idTema,
	);
  
	$temas = chamaAPI(null, '/api/sistema/temas', json_encode($apiEntrada), 'GET');
	return $temas;

}

function buscaTema()
{
	
	$tema = array();
	$conexao = conectaMysql();

	$sql = "SELECT * FROM temas WHERE ativo = 1 LIMIT 1";
		

    $rows = 0;
	
    $buscar = mysqli_query($conexao, $sql);
	
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
      array_push($tema, $row);
      $rows = $rows + 1;
    }
    
    if ($rows==1) {
      $tema = $tema[0];
    }

	/* echo json_encode($tema);
	return; */
	return $tema;
}

/* $tema = $_POST['tema'];



	mysqli_query($conexao,"update temas set ativo = false");//desativa todos os temas

  $insere = mysqli_query($conexao,"select * from temas where descricao = '$tema' limit 1");
  if (mysqli_num_rows($insere) > 0){
  	$inserir = mysqli_query($conexao,"update temas set ativo = true where descricao = '$tema'");
  }else{
	$inserir = mysqli_query($conexao,"insert into temas VALUES (0, '$tema',true)");
}


if ($inserir){
	echo "1";
	header('Location: ../perfil/temas.php');
	
}else{
	echo "0";
} */

?>
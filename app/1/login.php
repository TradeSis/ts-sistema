<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

$idEmpresa = null;
/* 	if (isset($jsonEntrada["idEmpresa"])) {
    	$idEmpresa = $jsonEntrada["idEmpresa"];
	} */

$conexao = conectaMysql($idEmpresa);
$login = array();

$sql = "SELECT login.*, empresa.nomeEmpresa FROM login
        LEFT JOIN empresa on empresa.idEmpresa = login.idEmpresa ";
if (isset($jsonEntrada["idLogin"])) {
  $idLogin = $jsonEntrada["idLogin"];
  $sql = $sql . " where login.idLogin = '$idLogin'";
} 

/* if($parametro !=""){

  $sql = "SELECT * FROM usuario ";
} */


$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($login, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idLogin"]) && $rows==1) {
  $login = $login[0];
}


$jsonSaida = $login;
//echo "-SAIDA->".json_encode($jsonSaida)."\n";



?>
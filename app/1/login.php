<?php
//Lucas 09032023 - linha 16, adicionado condição para receber mais um valor "nomeUsuario". 
//Lucas 08032023- 
//gabriel 06022023 16:52
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

$idCliente = null;
	if (isset($jsonEntrada["idCliente"])) {
    	$idCliente = $jsonEntrada["idCliente"];
	}

$conexao = conectaMysql($idCliente);
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
/** VARIAVEL A MAO 
$retorno = '[{"idCliente":"3","nomeCliente":"Loja Aduana"},{"idCliente":"24","nomeCliente":"Lebes"}]';
$jsonSaida =  json_decode($retorno, TRUE);
**/


?>
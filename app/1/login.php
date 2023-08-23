<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

$idEmpresa = null;

$conexao = conectaMysql();
$login = array();

$sql = "SELECT login.*, empresa.nomeEmpresa, empresa.timeSessao FROM login
        LEFT JOIN empresa on empresa.idEmpresa = login.idEmpresa ";
if (isset($jsonEntrada["idLogin"])) {
  $idLogin = $jsonEntrada["idLogin"];
  $sql = $sql . " where login.idLogin = $idLogin";
} 


$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {

   //Busca idCliente no banco da empresa
   $conexao2 = conectaMysql($row["idEmpresa"]);
   $sql2 = "SELECT usuario.idCliente FROM usuario where usuario.idLogin = " . $row["idLogin"];
   $buscar2 = mysqli_query($conexao2, $sql2);
   $dadosUsuario = mysqli_fetch_assoc($buscar2);

   $row['idCliente'] = $dadosUsuario['idCliente'];

  array_push($login, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idLogin"]) && $rows==1) {
  $login = $login[0];
}


$jsonSaida = $login;
//echo "-SAIDA->".json_encode($jsonSaida)."\n";



?>
<?php
// helio 31012023 - ajustado a api para receber o jsonEntrada, e pegar parametro od idCliente
// helio 26012023 18:10 - Criacao primeira api - falta parametros para where
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$idEmpresa = null;

$conexao = conectaMysql($idEmpresa);
$empresa = array();

$sql = "SELECT * FROM empresa ";
if (isset($jsonEntrada["idEmpresa"])) {
  $sql = $sql . " where empresa.idEmpresa = " . $jsonEntrada["idEmpresa"];
}

//echo $sql;
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($empresa, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idEmpresa"]) && $rows==1) {
  $empresa = $empresa[0];
}
$jsonSaida = $empresa;



?>
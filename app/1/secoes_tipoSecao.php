<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

$idEmpresa = null;
	if (isset($jsonEntrada["idEmpresa"])) {
    	$idEmpresa = $jsonEntrada["idEmpresa"];
	}
$conexao = conectaMysql($idEmpresa);
$secoes = array();

$sql = "SELECT * FROM secoes ";

if (isset($jsonEntrada["tipoSecao"])) {
  $sql = $sql . " where secoes.tipoSecao = " . "'" . $jsonEntrada["tipoSecao"] . "'" ;
}

//echo $sql;
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($secoes, $row);
  $rows = $rows + 1;
}

$jsonSaida = $secoes;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>
<?php
//Lucas 05042023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

$conexao = conectaMysql();
$app = array();

$sql = "SELECT loginaplicativo.*, login.loginNome, aplicativo.nomeAplicativo FROM loginaplicativo
        LEFT JOIN login on loginaplicativo.idLogin = login.idLogin
        LEFT JOIN aplicativo on loginaplicativo.idAplicativo = aplicativo.idAplicativo";
$where = " WHERE ";

if (isset($jsonEntrada["idLogin"])) {
  $sql = $sql . $where . " loginaplicativo.idLogin = " . $jsonEntrada["idLogin"];
  $where = " AND ";
} 
if (isset($jsonEntrada["idAplicativo"])) {
  $sql = $sql . $where . " loginaplicativo.idAplicativo = " . $jsonEntrada["idAplicativo"];
  $where = " AND ";
}

$sql = $sql . " ORDER BY idLogin";

//echo "-SQL->" . $sql . "\n";
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($app, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idAplicativo"]) && $rows == 1) {
  $app = $app[0];
}
$jsonSaida = $app;
//echo "-SAIDA->".json_encode($usuarioaplicativo)."\n";
?>

<?php
// lucas 26122023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql(null);

//LOG
$LOG_CAMINHO=defineCaminhoLog();
if (isset($LOG_CAMINHO)) {
    $LOG_NIVEL=defineNivelLog();
    $identificacao=date("dmYHis")."-PID".getmypid()."-"."cidades";
    if(isset($LOG_NIVEL)) {
        if ($LOG_NIVEL>=1) {
            $arquivo = fopen(defineCaminhoLog()."sistema_".date("dmY").".log","a");
        }
    }
    
}
if(isset($LOG_NIVEL)) {
    if ($LOG_NIVEL==1) {
        fwrite($arquivo,$identificacao."\n");
    }
    if ($LOG_NIVEL>=2) {
        fwrite($arquivo,$identificacao."-ENTRADA->".json_encode($jsonEntrada)."\n");
    }
}
//LOG

$cidades = array();

$sql = "SELECT * FROM cidades ";
if (isset($jsonEntrada["codigoCidade"])) {
  $sql = $sql . " where cidades.codigoCidade = " . $jsonEntrada["codigoCidade"];
}
$where = " where ";
if (isset($jsonEntrada["buscaCidade"])) {
  $sql = $sql . $where . " cidades.codigoCidade like " . "'%" . $jsonEntrada["buscaCidade"] . "%'
    OR cidades.nomeCidade like " . "'%" . $jsonEntrada["buscaCidade"] . "%'
    OR cidades.	codigoEstado like " . "'%" . $jsonEntrada["buscaCidade"] . "%'" ;
  $where = " and ";
}

//echo $sql;

//LOG
if(isset($LOG_NIVEL)) {
  if ($LOG_NIVEL>=3) {
      fwrite($arquivo,$identificacao."-SQL->".$sql."\n");
  }
}
//LOG

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($cidades, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["codigoCidade"]) && $rows==1) {
  $cidades = $cidades[0];
}
$jsonSaida = $cidades;


//LOG
if(isset($LOG_NIVEL)) {
  if ($LOG_NIVEL>=2) {
      fwrite($arquivo,$identificacao."-SAIDA->".json_encode($jsonSaida)."\n\n");
  }
}
//LOG
?>
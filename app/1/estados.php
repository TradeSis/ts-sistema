<?php
// lucas 26122023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql(null);

//LOG
$LOG_CAMINHO=defineCaminhoLog();
if (isset($LOG_CAMINHO)) {
    $LOG_NIVEL=defineNivelLog();
    $identificacao=date("dmYHis")."-PID".getmypid()."-"."estados";
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

$estados = array();

$sql = "SELECT * FROM estados ";
if (isset($jsonEntrada["codigoEstado"])) {
  $sql = $sql . " where estados.codigoEstado = " . $jsonEntrada["codigoEstado"];
}
$where = " where ";
if (isset($jsonEntrada["buscaEstado"])) {
  $sql = $sql . $where . " estados.codigoEstado like " . "'%" . $jsonEntrada["buscaEstado"] . "%'
    OR estados.nomeEstado like " . "'%" . $jsonEntrada["buscaEstado"] . "%'" ;
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
  array_push($estados, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["codigoEstado"]) && $rows==1) {
  $estados = $estados[0];
}
$jsonSaida = $estados;


//LOG
if(isset($LOG_NIVEL)) {
  if ($LOG_NIVEL>=2) {
      fwrite($arquivo,$identificacao."-SAIDA->".json_encode($jsonSaida)."\n\n");
  }
}
//LOG
?>
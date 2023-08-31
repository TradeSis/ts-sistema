<?php
//Lucas 05042023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

//LOG
$LOG_CAMINHO=defineCaminhoLog();
if (isset($LOG_CAMINHO)) {
    $LOG_NIVEL=defineNivelLog();
    $identificacao=date("dmYHis")."-PID".getmypid()."-"."aplicativo";
    if(isset($LOG_NIVEL)) {
        if ($LOG_NIVEL>=1) {
            $arquivo = fopen(defineCaminhoLog()."services_".date("dmY").".log","a");
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

$idEmpresa = null;
	if (isset($jsonEntrada["idEmpresa"])) {
    	$idEmpresa = $jsonEntrada["idEmpresa"];
	}

$conexao = conectaMysql($idEmpresa);
$app = array();

if (isset($jsonEntrada["idLogin"])) {
  $sql = "SELECT aplicativo.*, loginaplicativo.idLogin FROM aplicativo
          LEFT JOIN loginaplicativo on aplicativo.idAplicativo = loginaplicativo.idAplicativo";
  if (isset($jsonEntrada["idLogin"])) {
    $sql = $sql . " where loginaplicativo.idLogin = " . $jsonEntrada["idLogin"];
  } 
} else {
$sql = $sql = "SELECT aplicativo.* FROM aplicativo";
  if (isset($jsonEntrada["idAplicativo"])) {
    $sql = $sql . " where aplicativo.idAplicativo = " . $jsonEntrada["idAplicativo"]; 
  }
}
//echo "-SQL->".json_encode($sql)."\n";

$sql = $sql . " order by idAplicativo";

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
  array_push($app, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idLogin"]) && $rows==1) {
  $app = $app[0];
}

if (isset($jsonEntrada["idAplicativo"]) && $rows==1) {
  $app = $app[0];
}
$jsonSaida = $app;
//echo "-SAIDA->".json_encode($aplicativo)."\n";


//LOG
if(isset($LOG_NIVEL)) {
  if ($LOG_NIVEL>=2) {
      fwrite($arquivo,$identificacao."-SAIDA->".json_encode($jsonSaida)."\n\n");
  }
}
//LOG
?>
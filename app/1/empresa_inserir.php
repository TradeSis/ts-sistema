<?php
// helio 31012023 criacao
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

$idEmpresa = null;
$conexao = conectaMysql($idEmpresa);
if (isset($jsonEntrada['nomeEmpresa'])) {
    $nomeEmpresa = $jsonEntrada['nomeEmpresa'];
    $timeSessao = $jsonEntrada['timeSessao'];
    $sql = "INSERT INTO empresa (nomeEmpresa, timeSessao) values ('$nomeEmpresa', $timeSessao)";
    if ($atualizar = mysqli_query($conexao, $sql)) {
        $jsonSaida = array(
            "status" => 200,
            "retorno" => "ok"
        );
    } else {
        $jsonSaida = array(
            "status" => 500,
            "retorno" => "erro no mysql"
        );
    }
} else {
    $jsonSaida = array(
        "status" => 400,
        "retorno" => "Faltaram parametros"
    );

}

?>
<?php
// helio 31012023 criacao
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

$idEmpresa = null;
$conexao = conectaMysql($idEmpresa);
if (isset($jsonEntrada['idEmpresa'])) {
    $idEmpresa = $jsonEntrada['idEmpresa'];
    $nomeEmpresa = $jsonEntrada['nomeEmpresa'];
    $sql = "UPDATE empresa SET nomeEmpresa='$nomeEmpresa' WHERE idEmpresa = $idEmpresa";
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
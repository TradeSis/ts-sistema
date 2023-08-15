<?php
// gabriel 150523 - criação 
 //echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idLogin'])) {
    $idLogin = $jsonEntrada['idLogin'];
    $secret = $jsonEntrada['secret_key']; /* Guarda secret */
    $statusLogin = 1;

    $sql = "UPDATE `login` SET `statusLogin` = $statusLogin, `secret` = '$secret' WHERE idLogin = $idLogin";
   // echo "-ENTRADA->".$sql."\n"; 
    
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
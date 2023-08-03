<?php

$conexao = conectaMysql();
if (isset($jsonEntrada['loginNome'])) {
    $loginNome = $jsonEntrada['loginNome'];
    $idEmpresa = $jsonEntrada['idEmpresa'];
    $email = $jsonEntrada['email'];
    $cpfCnpj = $jsonEntrada['cpfCnpj'];
    $telefone = $jsonEntrada['telefone'];
    $password = $jsonEntrada['password'];

    $statusLogin = 0;

    $sql = "INSERT INTO `login`( `loginNome`, `idEmpresa`, `email`, `cpfCnpj`, `telefone`, `password`, `statusLogin`) VALUES ('$loginNome', $idEmpresa, '$email', '$cpfCnpj', '$telefone', '$password', $statusLogin)";
    
    if ($idEmpresa=="") { // sem id , tira do insert para deixar NULL
        $sql = "INSERT INTO `login`( `loginNome`, `email`, `cpfCnpj`, `telefone`, `password`, `statusLogin`) VALUES ('$loginNome', '$email', '$cpfCnpj', '$telefone', '$password', $statusLogin)";
    };


        echo "-SQL->".$sql."\n"; 

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
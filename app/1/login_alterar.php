<?php
 //echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idLogin'])) {
    $idLogin = $jsonEntrada['idLogin'];
    $loginNome = $jsonEntrada['loginNome'];
    $email = $jsonEntrada['email'];
    $cpfCnpj = $jsonEntrada['cpfCnpj'];
    $telefone = $jsonEntrada['telefone'];
    $password = $jsonEntrada['password'];

    $sql = "UPDATE `login` SET `loginNome`='$loginNome', `email`='$email', `cpfCnpj`='$cpfCnpj', `telefone`='$telefone', `password` = '$password' WHERE idLogin = $idLogin";
    //echo "-ENTRADA->".$sql."\n"; 
    
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
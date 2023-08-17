<?php

$idEmpresa = null;
    if (isset($jsonEntrada["idEmpresa"])) {
        $idEmpresa = $jsonEntrada["idEmpresa"];
    }
$conexao = conectaMysql();
if (isset($jsonEntrada['loginNome'])) {
    $loginNome = $jsonEntrada['loginNome'];
    $idEmpresa = $jsonEntrada['idEmpresa'];
    $email = $jsonEntrada['email'];
    $cpfCnpj = $jsonEntrada['cpfCnpj'];
    $pedeToken = $jsonEntrada['pedeToken'];
    $password = md5($jsonEntrada['password']);

    $statusLogin = 0;
    $statusUsuario = 1;
    if($cpfCnpj===""){$cpfCnpj="NULL";}

    if($email===""){
        $sql = "INSERT INTO login( `loginNome`, `idEmpresa`, `cpfCnpj`, `pedeToken`, `password`, `statusLogin`) VALUES ('$loginNome', $idEmpresa, $cpfCnpj, $pedeToken, '$password', $statusLogin)";
    } else {
        $sql = "INSERT INTO login( `loginNome`, `idEmpresa`, `email`, `cpfCnpj`, `pedeToken`, `password`, `statusLogin`) VALUES ('$loginNome', $idEmpresa, '$email', $cpfCnpj, $pedeToken, '$password', $statusLogin)";
    }
    //echo "-SQL->".$sql."\n";
    $atualizar = mysqli_query($conexao, $sql);


    // busca dados idLogin    
    $sql2 = "SELECT * FROM login WHERE loginNome = '$loginNome'";
    $buscar2 = mysqli_query($conexao, $sql2);
    $row = mysqli_fetch_array($buscar2, MYSQLI_ASSOC);
    $idLogin = $row["idLogin"];
    //echo "-SQL2->".$sql2."\n";

    $conexao2 = conectaMysql($idEmpresa);
    $sql3 = "INSERT INTO `usuario`( `nomeUsuario`, `email`, `idLogin`, `statusUsuario`) VALUES ('$loginNome', '$email', $idLogin, $statusUsuario)";
    //echo "-SQL3->".$sql3."\n";
    $atualizar3 = mysqli_query($conexao2, $sql3);



    if ($atualizar && $atualizar3) {
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
        "retorno" => "Faltaram parâmetros"
    );
}

?>
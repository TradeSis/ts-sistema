<?php
// Lucas 20042023 adicionado no if "email"
//gabriel 220323 11:10 envio de idcliente
//Lucas 08032023
//echo "-ENTRADA->" . json_encode($jsonEntrada) . "\n";

require_once '../vendor/autoload.php';

$google2fa = new \PragmaRX\Google2FA\Google2FA();

if (!isset($jsonEntrada["loginNome"])||!isset($jsonEntrada["nomeEmpresa"])||!isset($jsonEntrada["token"])||$jsonEntrada["loginNome"]==""||$jsonEntrada["nomeEmpresa"]==""||$jsonEntrada["token"]=="") {
    $jsonSaida = array(
        "status" => 400,
        "retorno" => "Faltou dados de login"
    );
} else {
    $nomeEmpresa = $jsonEntrada["nomeEmpresa"];
    $loginNome = $jsonEntrada["loginNome"];
    $token = $jsonEntrada["token"];

    $conexao = conectaMysql();
    $loginNomes = array();

    $sql = "SELECT login.*, empresa.nomeEmpresa, empresa.timeSessao FROM login
                LEFT JOIN empresa on empresa.idEmpresa = login.idEmpresa 
                WHERE nomeEmpresa='$nomeEmpresa' AND (email = '$loginNome' OR loginNome = '$loginNome' OR cpfCnpj = '$loginNome')";
    //echo $sql;

    $buscar = mysqli_query($conexao, $sql);
    $rows = mysqli_num_rows($buscar);


    if ($rows == 0) {
        $jsonSaida = array(
            "status" => 401,
            "retorno" => "Empresa ou usuario incorreto"
        );
    } else {

        $loginNomes = mysqli_fetch_assoc($buscar);
        if ($loginNomes["loginNome"] == $loginNome || $loginNomes["email"] == $loginNome || $loginNomes["cpfCnpj"] == $loginNome) {
            if ($google2fa->verifyKey($loginNomes["secret"], $jsonEntrada['token'])) {

                //Busca idCliente no banco da empresa
                $conexao2 = conectaMysql($loginNomes["idEmpresa"]);
                $sql2 = "SELECT usuario.idCliente FROM usuario where usuario.idLogin = " . $loginNomes["idLogin"];
                $buscar2 = mysqli_query($conexao2, $sql2);
                $dadosUsuario = mysqli_fetch_assoc($buscar2);

                $jsonSaida = array(
                    "idLogin" => $loginNomes["idLogin"],
                    "loginNome" => $loginNomes["loginNome"],
                    "nomeEmpresa" => $loginNomes["nomeEmpresa"],
                    "idEmpresa" => $loginNomes["idEmpresa"],
                    "idCliente" => $dadosUsuario["idCliente"],
                    "timeSessao" => $loginNomes["timeSessao"],
                    "statusLogin" => $loginNomes["statusLogin"],
                    "email" => $loginNomes["email"],
                    "cpfCnpj" => $loginNomes["cpfCnpj"],
                    "pedeToken" => $loginNomes["pedeToken"],
                    "token" => "true",
                    "status" => 200,
                    "retorno" => ""
                );
            } else {
                $jsonSaida = array(
                    "status" => 401,
                    "retorno" => "Token incorreto"
                );
            }
        }
    }
}

?>
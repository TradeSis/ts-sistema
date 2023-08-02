<?php
// Lucas 20042023 adicionado no if "email"
//gabriel 220323 11:10 envio de idcliente
//Lucas 08032023
//echo "-ENTRADA->" . json_encode($jsonEntrada) . "\n";


/* if (isset($jsonEntrada["idUsuario"])) {
    $idUsuario = $jsonEntrada["idUsuario"];
    $sql = $sql . " where usuario.idUsuario = '$idUsuario'";
  }  */

if (!isset($jsonEntrada["loginNome"])) {
    $jsonSaida = array(
        "status" => 400,
        "retorno" => "Faltou parâmetro de login"
    );
} else {


    $loginNome = $jsonEntrada["loginNome"];


    $conexao = conectaMysql();
    $loginNomes = array();
   


    $sql = "SELECT * FROM login WHERE email = '$loginNome' or loginNome = '$loginNome' or cpf = '$loginNome'";
//echo $sql;

    $rows = 0;
    $buscar = mysqli_query($conexao, $sql);
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
        array_push($loginNomes, $row);
        $rows = $rows + 1;
    }


    if (isset($jsonEntrada["loginNome"]) && $rows == 1) {
        $loginNomes = $loginNomes[0];
        $jsonSaida = array(
            "idLogin" => $loginNomes["idLogin"],
            "idEmpresa" => $loginNomes["idEmpresa"],
            "loginNome" => $loginNomes["loginNome"],
            "cpf" => $loginNomes["cpf"],
            "password" => $loginNomes["password"],
            "statusLogin" => $loginNomes["statusLogin"],
            "email" => $loginNomes["email"],
            "status" => 200,
            "retorno" => ""
        );
   
    } else {
       /*  $jsonSaida = array(
            "nomeUsuario" => null,
            "password" => null,
            "statusUsuario" => null,
            "status" => 400,
            "retorno" => "Usuario Nao Encontrado",
            
        ); */


    }
 
}


?>

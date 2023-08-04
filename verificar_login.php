<?php
//Lucas 10/04/2023 modificado a header para ser redirecionado para painel.php
//gabriel 220323 11:19 adicionado idcliente
// helio 26012023 16:16




include_once 'conexao.php';
$loginNome = $_POST['loginNome'];
$passwordDigitada = $_POST['password'];

$dados = array();
$apiEntrada = array(
        'loginNome' => $loginNome,
);
$dados = chamaAPI(null, '/sistema/login/verifica', json_encode($apiEntrada), 'GET');

$password = $dados['password'];

$statusLogin = $dados['statusLogin'];
$user = $dados['loginNome'];
$idLogin = $dados['idLogin'];
$idEmpresa = $dados['idEmpresa'];
$email = $dados['email'];
$senhaVerificada = md5($passwordDigitada);

//
if (!$user == "") {

        if ($password == $senhaVerificada) {
                if ($statusLogin == 0) {
                        header('Location: auth.php?idLogin=' . $idLogin . '&email=' . $email);
                } else {

                        header('Location: autenticar.php?idLogin=' . $idLogin);
                }
        } else {
                $mensagem = "senha errada!";
                header('Location: login.php?mensagem=' . $mensagem);
        }
} else {
        $mensagem = "usuario não cadastrado!";
        //$mensagem = $dados['retorno'];
        /* echo $mensagem; */
        header('Location: login.php?mensagem=' . $mensagem);
}

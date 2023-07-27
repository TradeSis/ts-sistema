<?php
//Lucas 10/04/2023 modificado a header para ser redirecionado para painel.php
//gabriel 220323 11:19 adicionado idcliente
// helio 26012023 16:16




include_once 'conexao.php';
$usuario = $_POST['usuario'];
$passwordDigitada = $_POST['password'];

$dados = array();
$apiEntrada = array(
        'usuario' => $usuario,
);
$dados = chamaAPI(null, '/sistema/usuario/verifica', json_encode($apiEntrada), 'GET');

$password = $dados['password'];
$statusUsuario = $dados['statusUsuario'];
$user = $dados['nomeUsuario'];
$idUsuario = $dados['idUsuario'];
$idCliente = $dados['idCliente'];
$email = $dados['email'];
$senhaVerificada = md5($passwordDigitada);

//
if (!$user == "") {

        if ($password == $senhaVerificada) {
                if ($statusUsuario == 0) {
                        header('Location: auth.php?idUsuario=' . $idUsuario . '&email=' . $email);
                } else {

                        header('Location: autenticar.php?idUsuario=' . $idUsuario);
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
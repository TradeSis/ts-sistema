<?php
//Lucas 10/04/2023 modificado a header para ser redirecionado para painel.php
//gabriel 220323 11:19 adicionado idcliente
// helio 26012023 16:16

include_once 'conexao.php';
$nomeEmpresa = $_POST['nomeEmpresa'];
$loginNome = $_POST['loginNome'];
$vpassword = $_POST['password'];

$dados = array();
$apiEntrada = array(
        'nomeEmpresa' => $nomeEmpresa,
        'loginNome' => $loginNome,
        'vpassword' => $vpassword
);
$dados = chamaAPI(null, '/sistema/login/verifica', json_encode($apiEntrada), 'GET');


$statusLogin = $dados['statusLogin'];
$user = $dados['loginNome'];
$idLogin = $dados['idLogin'];
$idEmpresa = $dados['idEmpresa'];
$nomeEmpresa = $dados['nomeEmpresa'];
$email = $dados['email'];
$pedeToken = $dados['pedeToken'];
$timeSessao = $dados['timeSessao'];

if (!$user == "") {

        if ($pedeToken == ATIVO_PADRAOBD) {
                if ($statusLogin == INATIVO_PADRAOBD) {
                        header('Location: auth.php?idLogin=' . $idLogin . '&email=' . $email);
                } else {
                        header('Location: autenticar.php?idLogin=' . $idLogin);
                }
        } else {
                session_start();

                $_SESSION['START'] = time();
                $_SESSION['LAST_ACTIVITY'] = time(); 
                $_SESSION['usuario'] = $user;
                $_SESSION['idLogin'] = $idLogin;
                $_SESSION['idEmpresa'] = $idEmpresa;
                $_SESSION['email'] = $email;
                $_SESSION['timeSessao'] = $timeSessao;

                $expiry = time() + (86400 * 7); // Cookie expira em 7 dias
                setcookie('Empresa', $nomeEmpresa, $expiry, '/');
                setcookie('User', $user, $expiry, '/');

                header('Location: ' . URLROOT . '/sistema/');
        }
} else {
        $mensagem = $dados['retorno'];
        header('Location: login.php?mensagem=' . $mensagem);
}
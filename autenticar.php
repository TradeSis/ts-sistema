<?php
include_once __DIR__ . "/../config.php";
include_once 'conexao.php';
require_once '../vendor/autoload.php';

$google2fa = new \PragmaRX\Google2FA\Google2FA();

$idLogin = $_GET['idLogin'];
$dados = array();
$apiEntrada = array(
        'idLogin' => $idLogin,
);
$dados = chamaAPI(null, '/sistema/login', json_encode($apiEntrada), 'GET');

$secret_key = $dados['secret'];
$user = $dados['loginNome'];
$idLogin = $dados['idLogin'];
$idEmpresa = $dados['idEmpresa'];
$email = $dados['email'];
//$pedeToken = $dados['pedeToken'];
if(isset($_POST['token'])){
    $token = $_POST['token'];
    if($google2fa->verifyKey($secret_key, $token)){
        session_start();

        $_SESSION['START'] = time();
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
        $_SESSION['usuario'] = $user;
        $_SESSION['idLogin'] = $idLogin;
        $_SESSION['idEmpresa'] = $idEmpresa;
        $_SESSION['email'] = $email;
        header('Location: '. URLROOT . '/sistema/');
    }
    else {

        $mensagem = "Token inválido ou expirado!";
                header('Location: '. URLROOT . '/sistema/login.php?mensagem=' . $mensagem);
    }
    die();
}
?>

    

<!DOCTYPE html>
<html lang="en">

<head>
    <title>TS/painel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="<?php echo URLROOT ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo URLROOT ?>/vendor/animacoes/bodymovin.js"></script>
    <script src="<?php echo URLROOT ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo URLROOT ?>/vendor/jquery/jquery.mask.min.js" type="text/javascript"></script>
    <script src="<?php echo URLROOT ?>/vendor/jquery/tabletojson.min.js" type="text/javascript"></script>
    <script src="<?php echo URLROOT ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo URLROOT ?>/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo URLROOT ?>/vendor/bootstrap/bootbox/bootbox.min.js" type="text/javascript"></script>
    <link href="<?php echo URLROOT ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="<?php echo URLROOT ?>/sistema/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo URLROOT ?>/sistema/css/padrao.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo URLROOT ?>/sistema/css/menu.css" rel="stylesheet" type="text/css"/>

    <script src="<?php echo URLROOT ?>/sistema/js/input.js"></script>
</head>


<body class="bg-default">
    <div>
        <!-- Header -->
        <div class="header ">
            <div class="container">
                <div class="header-body text-center mb-7">

                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-7">
                            <h1 class="text-white">Bem Vindo!</h1>
                            <p class="text-lead text-light">Para acessar o nosso painel de serviços, por favor faça
                                login.</p>
                        </div>
                        <div class="container">
                            <a class="brand">
                                <img src="<?php echo URLROOT ?>/img/brand/logo.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--7 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-gray-200 shadow border-1">

                        <div class="card-body px-lg-4 py-lg-6">
                            <form method="post">
                                <h5 class="text-center">Informe o token</h5>
                                <input type="text" name="token" class="form-control" required autocomplete="off" >
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Autenticar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</body>

</html>
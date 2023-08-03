<?php
include_once __DIR__ . "/../config.php";
include_once 'conexao.php';
require_once '../vendor/autoload.php';

use PragmaRX\Google2FA\Google2FA;

$idLogin = $_GET['idLogin'];
$email  = $_GET['email'];


$google2fa = new Google2FA();

$secret_key = $google2fa->generateSecretKey(); /* gera secret */

$text = $google2fa->getQRCodeUrl(
    $_SERVER["HTTP_HOST"].URLROOT,
    $email,
    $secret_key
);

$image_url = 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl='.$text;

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
                                <img src="../img/brand/logo.png">
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
                            <form action="database/login.php?operacao=ativar" method="post">
                                <h5 class="text-center">Registre a autenticação em 2 fatores</h5>
                                <p style="text-align:center"><?php echo '<img src="'.$image_url.'" />'; ?></p>
                                <input type="text" class="form-control" name="idLogin" value="<?php echo $idLogin ?>" hidden>
                                <input type="text" class="form-control" name="secret_key" value="<?php echo $secret_key ?>" hidden>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Voltar ao Login</button>
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
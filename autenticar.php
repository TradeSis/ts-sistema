<?php
include_once __DIR__ . "/../config.php";
include_once 'conexao.php';


if (isset($_POST['token'])) {
    $dados = array();
    $apiEntrada = $_GET['apiEntrada'];
    $apiEntrada['token'] = $_POST['token'];
    $dados = chamaAPI(null, '/sistema/login/token', json_encode($apiEntrada), 'GET');

    $nomeEmpresa = $dados['nomeEmpresa'];
    if ($dados['token'] == true) {
        session_start();

        $_SESSION['START'] = time();
        $_SESSION['LAST_ACTIVITY'] = time();
        $_SESSION['usuario'] = $dados['loginNome'];
        $_SESSION['idLogin'] = $dados['idLogin'];
        $_SESSION['idEmpresa'] = $dados['idEmpresa'];
        $_SESSION['idCliente'] = $dados['idCliente'];
        $_SESSION['email'] = $dados['email'];
        $_SESSION['timeSessao'] = $dados['timeSessao'];

        setcookie('Empresa', $dados['nomeEmpresa'], strtotime("+1 year"), "/", "", false, true);
        setcookie('User', $dados['loginNome'], strtotime("+1 year"), "/", "", false, true);

        header('Location: ' . URLROOT . '/sistema/');
    } else {
        $mensagem = $dados['retorno'];
        header('Location: ' . URLROOT . '/sistema/login.php?mensagem=' . $mensagem);
    }
    die();
}
?>



<!DOCTYPE html>
<html lang="en" class="bg-white">

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
    <link href="<?php echo URLROOT ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="<?php echo URLROOT ?>/sistema/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT ?>/sistema/css/padrao.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT ?>/sistema/css/menu.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo URLROOT ?>/sistema/js/input.js"></script>
</head>


<body class="bg-default mt-5">
    <div>
        <!-- Header -->
        <div class="header ">
            <div class="container">
                <div class="header-body text-center mb-2">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-7">
                            <p class="text-lead text">Por favor faça login.</p>
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
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-gray-200 shadow border-1">

                        <div class="card-body px-lg-4 py-lg-6">
                            <form method="post">
                                <h5 class="text-center">Informe o token</h5>
                                <input type="text" name="token" class="form-control" required autocomplete="off">
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
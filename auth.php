<?php
include_once __DIR__ . "/../config.php";
include_once 'conexao.php';
require_once '../vendor/autoload.php';

use PragmaRX\Google2FA\Google2FA;

$idLogin = $_GET['idLogin'];
$email = $_GET['email'];


$google2fa = new Google2FA();

$secret_key = $google2fa->generateSecretKey(); /* gera secret */

$text = $google2fa->getQRCodeUrl(
    $_SERVER["HTTP_HOST"] . URLROOT,
    $email,
    $secret_key
);

$image_url = 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=' . $text;

?>

<!DOCTYPE html>
<html lang="en" class="bg-white">

<?php
        include_once ROOT. "/vendor/vendor.php";
?>


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
                                <img src="<?php echo URLROOT ?>/img/logo.png">
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
                            <form action="database/login.php?operacao=ativar" method="post">
                                <h5 class="text-center">Registre a autenticação em 2 fatores</h5>
                                <p style="text-align:center">
                                    <?php echo '<img src="' . $image_url . '" />'; ?>
                                </p>
                                <input type="text" class="form-control" name="idLogin" value="<?php echo $idLogin ?>"
                                    hidden>
                                <input type="text" class="form-control" name="secret_key"
                                    value="<?php echo $secret_key ?>" hidden>
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
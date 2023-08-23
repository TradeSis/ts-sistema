<?php
// Lucas 08032023 - modificado o action do form para chamar api, linha 67
// helio 26012023 16:16

include_once __DIR__ . "/../config.php";

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
  <link href="<?php echo URLROOT ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  <link href="<?php echo URLROOT ?>/sistema/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="<?php echo URLROOT ?>/sistema/css/padrao.css" rel="stylesheet" type="text/css">
  <link href="<?php echo URLROOT ?>/sistema/css/menu.css" rel="stylesheet" type="text/css">

  <script src="<?php echo URLROOT ?>/sistema/js/input.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>


<body class="bg-default mt-5">
  <div>
    <!-- Header -->
    <div class="header">
      <div class="container">
        <div class="header-body text-center mb-2">

          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
              <h1 class="text">Bem Vindo!</h1>
              <p class="text-lead text">Para acessar o nosso painel de serviços, por favor faça login.</p>
            </div>
            <div class="container">
              <a class="brand">
                <img src="../img/logo.png">
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
              <?php

              if (isset($_GET['mensagem'])) {
              ?>
                <div class="alert alert-dark" role="alert">
                  <?php echo $_GET['mensagem'] ?>
                </div>
              <?php
              }

              ?>

              <form role="form" action="verificar_login.php" method="post">
                <div class="form-group mb-3">

                  <div class="input-group input-group-alternative">
                    <span class="input-group-text"></i><i class="bi bi-building-fill"></i></span>
                    <input class="form-control" type="text" name="nomeEmpresa" value="<?php echo isset($_COOKIE['Empresa']) ? $_COOKIE['Empresa'] : '' ?>" placeholder="Empresa" autocomplete="off" autofocus>
                  </div>
                </div>
                <div class="form-group mb-3">

                  <div class="input-group input-group-alternative">
                    <span class="input-group-text"></i><i class="bi bi-person-fill"></i></span>
                    <input class="form-control" type="text" name="loginNome" value="<?php echo isset($_COOKIE['User']) ? $_COOKIE['User'] : '' ?>" placeholder="Usuário" autocomplete="off" autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative" id="show_hide_password">
                    <span class="input-group-text" style="width: 42px;"></i><i class="bi bi-lock-fill"></i></span>
                    <input class="form-control" placeholder="Senha" type="password" id="pass" name="password">
                    <i class="bi bi-eye pt-3" aria-hidden="true" style="width:30px; text-align: right;border-bottom:1px solid #40505B"></i>
                  </div>

                  <div class="custom-control custom-control-alternative custom-checkbox">
                    <input class="custom-control-input" id=" customCheckLogin" type="checkbox">

                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4">Entrar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
    <footer class="sticky-footer fixed bottom">
      <div class="container">
        <div class="copyright text-center">
          <span class="text text-gray-600 small">Copyright &copy; TRADESIS Soluções em Sistemas 2022</span>
        </div>
      </div>
    </footer>
  </div>

  <script>
    $(document).ready(function() {
      $("#show_hide_password i").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bi bi-eye");
          $('#show_hide_password i').removeClass("bi bi-eye-slash");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bi bi-eye");
          $('#show_hide_password i').addClass("bi bi-eye-slash");
        }
      });
    });
  </script>
</body>

</html>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sistema</title>
</head>

<style>
    .corFundo{
        background-color: #EEEEEE
    }
</style>

<body>
    <div class="container-fluid ">

        <div class="row d-md-flex ">
            <div class="p-0 col-md-1">

                <nav class="p-0 navbar navbar-light">
                    <!-- logo em dispositivo grande -->
                    <a class="navbar-brand d-none d-md-block" href="indexSistema.php"><img src="../img/logo.png" width="100%"></a>
                    <!-- logo em dispositivo pequeno com botão -->
                    <a class="navbar-brand  d-md-none" href="#"><img src="../img/logo.png" width="40%"></a>
                    
                     <!-- menu dispositivo pequeno -->
                    <div class="d-sm-block d-md-none " id="colp">
                    <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="indexServices.php">Serviços</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Notas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Financeiro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Cadastros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Paginas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="indexSistema.php">Sistema</a>
                            </li>
                        </ul>
                    </div> 

                    <!-- menu dispositivo grande -->
                    <div class="navbar-collapse collapse   d-none d-md-block">
                        <ul class="nav navbar-nav" id="menu">
                            <li class="nav-item">
                                <a class="nav-link" href="indexServices.php">Serviços</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Notas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Financeiro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Cadastros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Paginas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="indexSistema.php">Sistema</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-11 corFundo" style="height: 100vh;">
                <div class="row d-flex flex-row flex-sm-row-reverse">
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-12 bg-danger">
                                <h5 style="text-align:right">PERFIL</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <ul class="nav nav-tabs ">

                            <?php
                            $tab = '';
                            if (isset($_GET['tab'])) {
                                $tab = $_GET['tab'];
                            }
                            if ($tab == '') {
                                $tab = 'empresa';
                            } ?>

                            <li class="nav-item mr-1 ">
                                <a class="nav-link1 nav-link <?php if ($tab == "empresa") {
                                    echo " active ";
                                } ?>" href="?tab=empresa"
                                    role="tab">Empresa</a>
                            </li>
                           
                            <li class="nav-item mr-1 ">
                                <a class="nav-link1 nav-link <?php if ($tab == "login") {
                                                                    echo " active ";
                                                                } ?>" href="?tab=login" role="tab">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php

                $src = "";
                $title = "Sistema";

                if ($tab == "login") {
                    $src = "configuracao/login.php";
                    $title = "Sistema/Login";
                }
                if ($tab == "empresa") {
                    $src = "configuracao/empresa.php";
                    $title = "Sistema/Empresa";
                }
                

                if ($src !== "") {
        
                ?>
                    <div class="row" style="width: 100%; height: 90vh;">
                        <iframe class="container-fluid" id="myIframe" src="../sistema/<?php echo $src ?>"></iframe>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
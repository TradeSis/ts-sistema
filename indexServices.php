<!doctype html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Services</title>
</head>

<style>
    .corFundo {
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
                                $tab = 'demandas';
                            } ?>

                            <li class="nav-item mr-1">
                                <a class="nav-link1 nav-link <?php if ($tab == "demandas") {
                                                                    echo " active ";
                                                                } ?>" href="?tab=demandas" role="tab">Demandas</a>
                            </li>

                            <li class="nav-item mr-1">
                                <a class="nav-link1 nav-link <?php if ($tab == "contratos") {
                                                                    echo " active ";
                                                                } ?>" href="?tab=contratos" role="tab">Contratos</a>
                            </li>

                            <li class="nav-item mr-1 ">
                                <a class="nav-link1 nav-link <?php if ($tab == "tabelaPrincipal") {
                                                                    echo " active ";
                                                                } ?>" href="?tab=tabelaPrincipal" role="tab">tabelaPrincipal</a>
                            </li>

                            <li class="nav-item mr-1 ">
                                <a class="nav-link1 nav-link <?php if ($tab == "tabelaSecundaria") {
                                                                    echo " active ";
                                                                } ?>" href="?tab=tabelaSecundaria" role="tab">tabelaSecundaria</a>
                            </li>

                            <li class="nav-item mr-1 ">
                                <a class="nav-link1 nav-link <?php if ($tab == "formulario") {
                                                                    echo " active ";
                                                                } ?>" href="?tab=formulario" role="tab">formulario</a>
                            </li>

                            <li class="nav-item mr-1 ">
                                <a class="nav-link1 nav-link <?php if ($tab == "tabelaDemanda") {
                                                                    echo " active ";
                                                                } ?>" href="?tab=tabelaDemanda" role="tab">tabelaDemanda</a>
                            </li>

                            <li class="nav-item mr-1 ">
                                <a class="nav-link1 nav-link <?php if ($tab == "visializarDemanda") {
                                                                    echo " active ";
                                                                } ?>" href="?tab=visializarDemanda" role="tab">visializarDemanda</a>
                            </li>

                            <li class="nav-item mr-1 ">
                                <a class="nav-link1 nav-link <?php if ($tab == "modalDemanda") {
                                                                    echo " active ";
                                                                } ?>" href="?tab=modalDemanda" role="tab">modalDemanda</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php

                $src = "";
                $title = "Sistema";

                if ($tab == "demandas") {
                    $src = "demandas/";
                    $title = "Serviços/Demandas";
                }
                if ($tab == "contratos") {
                    $src = "contratos/?tipo=contratos";
                    $title = "Serviços/Contratos";
                }

                if ($tab == "tabelaPrincipal") {
                    $src = "../sistema/tabelaPrincipal.php";
                    $title = "Serviços/tabelaPrincipal";
                }

                if ($tab == "tabelaSecundaria") {
                    $src = "../sistema/tabelaSecundaria.php";
                    $title = "Serviços/tabelaSecundaria";
                }

                if ($tab == "formulario") {
                    $src = "../sistema/formulario.php";
                    $title = "Serviços/formulario";
                }

                if ($tab == "tabelaDemanda") {
                    $src = "../sistema/tabelaDemanda.php";
                    $title = "Serviços/tabelaDemanda";
                }

                if ($tab == "visializarDemanda") {
                    $src = "../sistema/visializarDemanda.php";
                    $title = "Serviços/visializarDemanda";
                }

                if ($tab == "modalDemanda") {
                    $src = "../sistema/modalDemanda.php";
                    $title = "Serviços/modalDemanda";
                }


                if ($src !== "") {
                ?>
                    <div class="row" style="width: 100%; height: 90vh;">
                        <iframe class="container-fluid" id="myIframe" src="../services/<?php echo $src ?>"></iframe>
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
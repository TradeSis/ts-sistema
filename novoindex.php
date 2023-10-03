<?php
include_once __DIR__ . "/../config.php";

include_once "novopainel.php";
include_once ROOT . "/sistema/database/loginAplicativo.php";
$nivelMenuLogin = null;

if ($_SESSION["idEmpresa"] == 1) { // Proteção
    $nivelMenuLogin = buscaLoginAplicativo($_SESSION['idLogin'], 'Sistema'); //Sistema
}

$configuracao = 1;
$nivelMenu = 0;

if ($nivelMenuLogin == null) {
    return;
} else {
    $nivelMenu = $nivelMenuLogin['nivelMenu'];
}

/* pega a ultima parte da url */
$url = $_SERVER['QUERY_STRING'];
?>


<div class="container-fluid" >
    <div class="row">
        <div class="col-6 col-md-8 ">
        </div>
        <div class="col-6 col-md-4" >
            <h5 style="text-align:right">PERFIL</h5>
        </div>
    </div>
                   
    <select class="form-select d-md-none position-sticky" id="linksub" style="color:#000; width:200px;text-align:center; margin-left:auto;margin-right:auto;margin-top:-30px">         
        <option value="<?php echo URLROOT ?>/sistema/novoindex.php?tab=empresa" 
            <?php if ($url == "tab=empresa") {echo " selected ";} ?>
        >Empresa</option>

        <option value="<?php echo URLROOT ?>/sistema/novoindex.php?tab=login" 
            <?php if ($url == "tab=login") {echo " selected ";} ?>
        >Login</option>

        <option value="<?php echo URLROOT ?>/sistema/novoindex.php?tab=aplicativo" 
            <?php if ($url == "tab=aplicativo") {echo " selected ";} ?>
        >Aplicativo</option>

        <option value="<?php echo URLROOT ?>/sistema/novoindex.php?tab=anexos" 
            <?php if ($url == "tab=anexos") {echo " selected ";} ?>
        >Anexos</option>
    </select>
                    
    <div class="row border-bottom d-none d-md-block fixed-top">
        <div class="col-md-12 d-flex justify-content-center">
            <ul class="nav a" id="myTabs">

                <?php
                $tab = '';

                if (isset($_GET['tab'])) {
                    $tab = $_GET['tab'];
                }
                ?>
                <?php if ($nivelMenu == 5) {
                    if ($tab == '') {
                        $tab = 'empresa';
                    } ?>
                    <li class="nav-item mr-1 ">
                        <a class="nav-link1 nav-link <?php if ($tab == "empresa") {
                                                            echo " active ";
                                                        } ?>" href="?tab=empresa" role="tab">Empresa</a>
                    </li>
                <?php }
                if ($nivelMenu == 5) { ?>
                    <li class="nav-item mr-1 ">
                        <a class="nav-link1 nav-link <?php if ($tab == "login") {
                                                            echo " active ";
                                                        } ?>" href="?tab=login" role="tab">Login</a>
                    </li>
                <?php }
                if ($nivelMenu == 5) { ?>
                    <li class="nav-item mr-1 ">
                        <a class="nav-link1 nav-link <?php if ($tab == "aplicativo") {
                                                            echo " active ";
                                                        } ?>" href="?tab=aplicativo" role="tab">Aplicativos</a>
                    </li>
                <?php }
                if ($nivelMenu == 5) { ?>
                    <li class="nav-item mr-1 ">
                        <a class="nav-link1 nav-link <?php if ($tab == "anexos") {
                                                            echo " active ";
                                                        } ?>" href="?tab=anexos" role="tab">Anexos</a>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </div>


    <?php

    $src = "";
    $title = "Sistema";

    if ($tab == "empresa") {
        $src = "configuracao/empresa.php";
        $title = "Sistema/Empresa";
    }
    if ($tab == "login") {
        $src = "configuracao/login.php";
        $title = "Sistema/Login";
    }
    if ($tab == "aplicativo") {
        $src = "configuracao/aplicativo.php";
        $title = "Sistema/Aplicativo";
    }
    if ($tab == "anexos") {
        $src = "configuracao/anexos.php";
        $title = "Sistema/Anexos";
    }

    if ($tab == "configuracao") {
        $src = "configuracao/";
        $title = "Sistema/Configuração";
        if (isset($_GET['stab'])) {
            $src = $src . "?stab=" . $_GET['stab'];
        }
    }

    if ($src !== "") {

    ?>


        <div class="container-fluid p-0 m-0">
            <iframe class="row p-0 m-0" id="iFrameTab" style="width: 100%; height: 82vh; border:none" src="<?php echo URLROOT ?>/sistema/<?php echo $src ?>"></iframe>
        </div>

    <?php
    }
    ?>
</div><!--div container-->
<!-- temporario -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('#linksub').on('change', function() {
            var url = $(this).val();
            if (url) {
                window.open(url, '_self');
            }
            return false;
        });
    });
</script>
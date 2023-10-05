<?php
include_once __DIR__ . "/../config.php";
include_once "novohead.php";
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
// helio 051023 - TODO PROGRAMA PRECISA TER DOCTYPE/HTML/HEAD no seu inicio
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once ROOT. "/vendor/head_css.php";?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="<?php echo URLROOT ?>/sistema/css/painel.css" rel="stylesheet" type="text/css">
    
    <link rel="icon" href="../img/meucontrole_icon.png" type="image/png">

    <title>Sistema</title>

</head>

<body>

    <?php include_once  ROOT . "/sistema/painelmobile.php"; ?>

    <div class="d-flex">

        <?php include_once  ROOT . "/sistema/novopainel.php"; ?>

        <div class="container-fluid">

            <div class="row ">
                <div class="col-lg-10 d-none d-md-none d-lg-block pr-0 pl-0" style="background-color: #13216A;">
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
                                <a class="nav-link1 nav-link 
                                <?php if ($tab == "empresa") {echo " active ";} ?>" 
                                href="?tab=empresa" role="tab">Empresa</a>
                            </li>
                        <?php }
                        if ($nivelMenu == 5) { ?>
                            <li class="nav-item mr-1 ">
                                <a class="nav-link1 nav-link 
                                <?php if ($tab == "login") {echo " active ";} ?>" 
                                href="?tab=login" role="tab">Login</a>
                            </li>
                        <?php }
                        if ($nivelMenu == 5) { ?>
                            <li class="nav-item mr-1 ">
                                <a class="nav-link1 nav-link 
                                <?php if ($tab == "aplicativo") {echo " active ";} ?>" 
                                href="?tab=aplicativo" role="tab">Aplicativos</a>
                            </li>
                        <?php }
                        if ($nivelMenu == 5) { ?>
                            <li class="nav-item mr-1 ">
                                <a class="nav-link1 nav-link 
                                <?php if ($tab == "anexos") {echo " active ";} ?>" 
                                href="?tab=anexos" role="tab">Anexos</a>
                            </li>
                        <?php } ?>

                    </ul>
                </div>
                <!--Essa coluna só vai aparecer em dispositivo mobile-->
                <div class="col-7 col-md-9 d-md-block d-lg-none" style="background-color: #13216A;">
                <!--atraves do GET testa o valor para selecionar um option no select-->
                <?php if(isset($_GET['tab'])){
                    $getTab = $_GET['tab'];
                }else{
                    $getTab = '';
                }?>
                    <select class="form-select mt-2" id="subtabSistema" style="color:#000; width:160px;text-align:center;">
                        <option value="<?php echo URLROOT ?>/sistema/novoindex.php?tab=empresa"
                        <?php if ($getTab == "empresa") {echo " selected ";} ?>>Empresa</option>

                        <option value="<?php echo URLROOT ?>/sistema/novoindex.php?tab=login" 
                        <?php if ($getTab == "login") {echo " selected ";} ?>>Login</option>

                        <option value="<?php echo URLROOT ?>/sistema/novoindex.php?tab=aplicativo" 
                        <?php if ($getTab == "aplicativo") {echo " selected ";} ?>>Aplicativo</option>

                        <option value="<?php echo URLROOT ?>/sistema/novoindex.php?tab=anexos" 
                        <?php if ($getTab == "anexos") {echo " selected ";} ?>>Anexos</option>
                    </select>
                </div>

                <div class="col-5 col-md-3 col-lg-2" style="text-align:right;background-color: #13216A;">
                    <button class="btn text-white  dropdown-toggle position-relative mt-2 mr-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill"></i>&#32;Lucas
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            99+
                            <span class="visually-hidden">unread messages</span>
                    </button>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="#">Mensagens</a>
                        <a class="dropdown-item" href="#">Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                    </ul>
                </div>

            </div><!--row-->
         
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
            if ($src !== "") { ?>
                <div class="container-fluid p-0 m-0">
                    <iframe class="row p-0 m-0" id="iFrameTab" style="width: 100%; height: 82vh; border:none" src="<?php echo URLROOT ?>/sistema/<?php echo $src ?>"></iframe>
                </div>
            <?php } ?>

        </div><!-- div container -->
    </div><!-- div class="d-flex" -->


    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT. "/vendor/footer_js.php";?>

    <script src="js/mobileSelectTabs.js"></script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
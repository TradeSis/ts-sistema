<?php
include_once __DIR__ . "/../config.php";


include_once "painel.php";
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


?>


<div class="container-fluid mt-1">
    <div class="row">
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
                        } ?>" href="?tab=empresa"
                            role="tab">Empresa</a>
                    </li>
                <?php }
                if ($nivelMenu == 5) { ?>
                    <li class="nav-item mr-1 ">
                        <a class="nav-link1 nav-link <?php if ($tab == "login") {
                            echo " active ";
                        } ?>" href="?tab=login"
                            role="tab">Login</a>
                    </li>
                <?php }
                if ($nivelMenu == 5) { ?>
                    <li class="nav-item mr-1 ">
                        <a class="nav-link1 nav-link <?php if ($tab == "aplicativo") {
                            echo " active ";
                        } ?>"
                            href="?tab=aplicativo" role="tab">Aplicativos</a>
                    </li>
                <?php }
             if ($nivelMenu==5) { ?>
                <li class="nav-item mr-1 ">
                    <a class="nav-link1 nav-link <?php if ($tab=="anexos") {echo " active ";} ?>" 
                        href="?tab=anexos" 
                        role="tab"                        
                        >Anexos</a>
                </li>
            <?php } ?>


            </ul>


        </div>

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
    //echo URLROOT ."/sistema/". $src;
    ?>
    </body>

    </html>

    <!DOCTYPE html>

    <head>
        <title><?php echo $title; ?></title>
    </head>
    <html>

    <body>

        <div class="diviFrame">
            <iframe class="iFrame container-fluid " id="iFrameTab"
                src="<?php echo URLROOT ?>/sistema/<?php echo $src ?>"></iframe>
        </div>
        <?php
}
?>

</body>

</html>
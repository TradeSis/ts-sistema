<?php 
//Lucas 29022024 - id862 Empresa Administradora
include_once 'header.php';
include_once ROOT . "/sistema/database/aplicativo.php";
$aplicativos = buscaAplicativosMenu($_SESSION['idLogin']);


$aplicativo = array();
if (isset($aplicativos['nomeAplicativo'])) {
    $aplicativo[] = $aplicativos["nomeAplicativo"];
} else {
    foreach ($aplicativos as $unico) {
        //echo '<hr> aplicativos -> ' . json_encode($unico);
        $aplicativo[] = $unico["nomeAplicativo"];
    }
}

$URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = (parse_url($URL_ATUAL, PHP_URL_PATH));
?>


<!-- MENU PAINEL -->

    <div class="ts-sidebar pt-2 d-none d-md-none d-lg-block ts-bgAplicativos">
        <a href="#"><img src="../img/meucontrole.png" width="100vh 100vw"></a>
        <div class="list-group mt-4" id="menu">
        <?php
        if (in_array("Services", $aplicativo)) { ?>
            <a class="ts-itemsiderbar <?php if ($url == URLROOT . "/services/") {echo " active ";} ?> p-3" 
            href="<?php echo URLROOT ?>/services/">Serviços</a>
        <?php }
        if (in_array("Notas", $aplicativo)) { ?>
            <a class="ts-itemsiderbar <?php if ($url == URLROOT . "/notas/") {echo " active ";} ?> p-3" 
            href="<?php echo URLROOT ?>/notas/">Notas</a>
        <?php }
        if (in_array("Financeiro", $aplicativo)) { ?>
            <a class="ts-itemsiderbar <?php if ($url == URLROOT . "/financeiro/") {echo " active ";} ?> p-3" 
            href="<?php echo URLROOT ?>/financeiro/">Financeiro</a>
        <?php }
        if (in_array("Cadastros", $aplicativo)) { ?>
            <a class="ts-itemsiderbar <?php if ($url == URLROOT . "/cadastros/") {echo " active ";} ?> p-3" 
            href="<?php echo URLROOT ?>/cadastros/">Cadastros</a>
        <?php }
        /** DESATIVADO EM 15/12/2023
        if (in_array("Paginas", $aplicativo)) { ?>
            <a class="ts-itemsiderbar <?php if ($url == URLROOT . "/paginas/") {echo " active ";} ?> p-3" 
            href="<?php echo URLROOT ?>/paginas/">Paginas</a>
        <?php }
        **/
        if (in_array("Impostos", $aplicativo)) { ?>
            <a class="ts-itemsiderbar <?php if ($url == URLROOT . "/impostos/") {echo " active ";} ?> p-3" 
            href="<?php echo URLROOT ?>/impostos/">Impostos</a>
        <?php }
        //Lucas 29022024 - id862 alterado campo idEmpresa para administradora
        if ($_SESSION['administradora'] == 1 && in_array("Sistema", $aplicativo)) { ?>
            <a class="ts-itemsiderbar <?php if ($url == URLROOT . "/sistema/") {echo " active ";} ?> p-3" 
            href="<?php echo URLROOT ?>/sistema/">Sistema</a>
        <?php }  ?>
        
        </div>
    </div>
<!-- MENU PAINEL -->


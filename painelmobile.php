<!-- pega url -->
<?php $URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = (parse_url($URL_ATUAL, PHP_URL_PATH));
?>

<!-- MENU MOBILE -->
        <nav class="navbar-dark d-lg-none p-2 ts-bgAplicativos">
            <div class="row d-flex flex">
                <div class="col-6 col-sm-8 ">
                    <a class="navbar-brand" href="#"><img src="../img/meucontrole.png" width="100vh 100vw"></a>
                </div>
                <div class="col-6 col-sm-4 text-end ">
                
                    <select class="form-select mt-2 ts-selectAplicativos" id="tabaplicativosmobile">
                     
                        <option value="<?php echo URLROOT ?>/services/" <?php if ($url == URLROOT . "/services/") {
                                            echo " selected ";
                                        } ?>>Serviços</option>
                        <option value="<?php echo URLROOT ?>/notas/" <?php if ($url == URLROOT . "/notas/") {
                                            echo " selected ";
                                        } ?>>Notas</option>
                        <option value="<?php echo URLROOT ?>/financeiro/" <?php if ($url == URLROOT . "/financeiro/") {
                                            echo " selected ";
                                        } ?>>Financeiro</option>
                        <option value="<?php echo URLROOT ?>/cadastros/" <?php if ($url == URLROOT . "/cadastros/") {
                                            echo " selected ";
                                        } ?>>Cadastros</option>
                        <option value="<?php echo URLROOT ?>/paginas/" <?php if ($url == URLROOT . "/paginas/") {
                                            echo " selected ";
                                        } ?>>Paginas</option>
                        <option value="<?php echo URLROOT ?>/sistema/" <?php if ($url == URLROOT . "/sistema/") {
                                            echo " selected ";
                                        } ?>>Sistema</option>
                    </select>
                </div>
            </div>
        </nav>

        
<!-- MENU MOBILE -->        
<!-- pega url -->
<?php $URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = (parse_url($URL_ATUAL, PHP_URL_PATH));
?>
<!-- MENU MOBILE -->
<nav class="navbar-dark d-lg-none p-2" style="background-color: #13216A;">
            <div class="row d-flex flex">
                <div class="col-6 col-sm-8 ">
                    <a class="navbar-brand" href="#"><img src="../img/meucontrole.png" width="100vh 100vw"></a>
                </div>
                <div class="col-6 col-sm-4 text-end ">
                
                    <select class="form-select mt-2" id="tabaplicativosmobile" style="color:#FFF; background-color: #13216A;border:none; border-bottom:2px solid #fff">
                     
                        <option value="<?php echo URLROOT ?>/services/novoindex.php" <?php if ($url == URLROOT . "/services/novoindex.php") {
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
                        <option value="<?php echo URLROOT ?>/sistema/novoindex.php" <?php if ($url == URLROOT . "/sistema/novoindex.php") {
                                            echo " selected ";
                                        } ?>>Sistema</option>
                    </select>
                </div>
            </div>
    </nav>

<script>
    //Pega o valor do select e passa para url(js puro)
    var select = document.getElementById('tabaplicativosmobile')
    select.addEventListener('change', function(){
    //alert(select.value)
    var url = select.value
        if (url) {
            window.open(url, '_self');
            }
        return false;
    })
</script>
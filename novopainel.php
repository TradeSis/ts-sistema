<?php
$URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = (parse_url($URL_ATUAL, PHP_URL_PATH));


?>


<?php include 'novohead.php' ?>


<style>

    .sidebar {
        height: 100vh;
        width: 120px;
        background: #ccc;
        transition: all 0.5s ease-in-out;
    }

    .itemsiderbar {
        background-color: #13216A;
        color: #ffffff;
        text-decoration: none;
    }

    .itemsiderbar.active {
        background-color: #ffffff;
        color: #13216A;
        text-decoration: none;
        font-weight: 900;
    }

    .itemsiderbar:hover,
    .itemsiderbar:focus {
        color: #13216A;
        background-color: #ffffff;
        font-weight: 900;
        text-decoration: none;
    }

</style>

<body>
    <!-- MENU MOBILE -->
    <nav class="navbar-dark d-lg-none p-2" style="background-color: #13216A;">
            <div class="row d-flex flex">
                <div class="col-6 col-sm-8 ">
                    <a class="navbar-brand" href="#"><img src="../img/meucontrole.png" width="100vh 100vw"></a>
                </div>
                <div class="col-6 col-sm-4 text-end ">
                    <select class="form-select mt-2" id="link" style="color:#FFF; background-color: #13216A;border:none; border-bottom:2px solid #fff">
                     
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

    <div class="d-flex" > <!-- essa div não fecha porque, abaixo vai ser carregado o conteudo dos index -->
        <div class="sidebar pt-2 d-none d-md-none d-lg-block" style="background-color: #13216A;">
            <a href="#"><img src="../img/meucontrole.png" width="100vh 100vw"></a>
            <div class="list-group mt-4" id="menu">

                <a class="itemsiderbar <?php if ($url == URLROOT . "/services/novoindex.php") {
                                            echo " active ";
                                        } ?> p-3" href="<?php echo URLROOT ?>/services/novoindex.php">Serviços</a>

                <a class="itemsiderbar <?php if ($url == URLROOT . "/notas/") {
                                            echo " active ";
                                        } ?> p-3" href="<?php echo URLROOT ?>/notas/">Notas</a>

                <a class="itemsiderbar <?php if ($url == URLROOT . "/financeiro/") {
                                            echo " active ";
                                        } ?> p-3" href="<?php echo URLROOT ?>/financeiro/">Financeiro</a>

                <a class="itemsiderbar <?php if ($url == URLROOT . "/cadastros/") {
                                            echo " active ";
                                        } ?> p-3" href="<?php echo URLROOT ?>/cadastros/">Cadastros</a>

                <a class="itemsiderbar <?php if ($url == URLROOT . "/paginas/") {
                                            echo " active ";
                                        } ?> p-3" href="<?php echo URLROOT ?>/paginas/">Paginas</a>

                <a class="itemsiderbar <?php if ($url == URLROOT . "/sistema/novoindex.php") {
                                            echo " active ";
                                        } ?> p-3" href="<?php echo URLROOT ?>/sistema/novoindex.php">Sistema</a>

            </div>
        </div>
       
        <!--</div> CONTEUDO DOS INDEX -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <script>
            $(document).ready(function() {

                $('#link').on('change', function() {
                    var url = $(this).val();
                    if (url) {
                        window.open(url, '_self');
                    }
                    return false;
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
<?php

include_once 'head.php';
include_once ROOT . "/sistema/database/aplicativo.php";
$aplicativos = buscaAplicativosMenu($_SESSION['idUsuario']);


?>

<style>
    .navbar-nav .name span:focus{
        background-color: red;
    }
</style>
<body>

    
    <nav class="Menu navbar navbar-expand topbar static-top shadow">




        <a href="<?php echo URLROOT ?>/painel" class="logo"><img src="../img/white.png" width="150"></a>

        <div class=" col-md navbar navbar-expand navbar1">
            <ul class="navbar-nav mx-auto ml-4" id="novoMenu2">
                <?php
                 $URL_ATUAL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                 //echo $URL_ATUAL;
                 $url = (parse_url($URL_ATUAL, PHP_URL_PATH));

                  foreach ($aplicativos as $aplicativo) {  ?>

                    <li>
                        <a src="#" href="<?php echo $aplicativo['appLink'] ?>" class="nav-link name <?php if ($url == "/ts/services/") {echo " active ";} ?>" role="button">
                            <span class="fs-5 text">
                                <?php echo $aplicativo['nomeAplicativo'] ?>
                            </span>
                        </a>
                        <a src="#" href="/ts/services/" class="nav-link name <?php if ($url == "/ts/services/") {echo " active ";} ?>" role="button">
                            <span class="fs-5 text">
                                Services
                            </span>
                        </a>
                    </li>
                <?php } ?>


            </ul>
        </div>
        <?php echo $url ?>
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ">

            <!-- Email -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-envelope-exclamation-fill"></i>

                    <span class="badge badge-danger badge-counter"></span>
                </a>

                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">
                        Emails Recebidos
                    </h6>

                    <a class="dropdown-item text-center small text-gray-500" href="#">Ver todas as mensagens</a>
                </div>
            </li>

            <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- <img class="img-profile rounded-circle" src="../imgs/undraw_profile.svg"> -->
                    <!--  <i class="bi bi-person-circle"></i>&#32; -->
                    <span class="fs-1 text"><?php echo $logado ?></span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?php echo URLROOT ?>/sistema/usuario/usuario_alterar.php?idUsuario=<?php echo $_SESSION['idUsuario'] ?>">
                        <i class="bi bi-person-circle"></i>&#32;
                        Perfil
                    </a>
                    <a class="dropdown-item" href="<?php echo URLROOT ?>/painel/">
                        <i class="bi bi-display"></i>&#32;
                        Painel
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="bi bi-box-arrow-right"></i>&#32;
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>




    <!-- Modal sair -->
    <div class="modal fade" id="logoutModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Logout" abaixo se você deseja encerrar sua sessão.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary logout" href="<?php echo URLROOT ?>/painel/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


   
    <script type="text/javascript" src="menu.js"></script>
    <script>
        var tab;
        var tabContent;

        window.onload = function() {
            tabContent = document.getElementsByClassName('tabContent');
            tab = document.getElementsByClassName('tab');
            hideTabsContent(1);
        }

        document.getElementById('tabs').onclick = function(event) {
            var target = event.target;
            if (target.className == 'tab') {
                for (var i = 0; i < tab.length; i++) {
                    if (target == tab[i]) {
                        showTabsContent(i);
                        break;
                    }
                }
            }
        }

        function hideTabsContent(a) {
            for (var i = a; i < tabContent.length; i++) {
                tabContent[i].classList.remove('show');
                tabContent[i].classList.add("hide");
                tab[i].classList.remove('whiteborder');
            }
        }

        function showTabsContent(b) {
            if (tabContent[b].classList.contains('hide')) {
                hideTabsContent(0);
                tab[b].classList.add('whiteborder');
                tabContent[b].classList.remove('hide');
                tabContent[b].classList.add('show');
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            // SELECT MENU
            $("#novoMenu a").click(function() {

                var value = $(this).text();
                value = $(this).attr('id');

                //IFRAME TAG

                $("#myIframe").attr('src', value);
            })
            // SELECT MENU
            $("#novoMenu2 a").click(function() {

                var value = $(this).text();
                value = $(this).attr('src');

                //IFRAME TAG
                if (value) {

                    $("#myIframe").attr('src', value);
                    $('.menuLateral').removeClass('mostra');
                    $('.menusecundario').removeClass('mostra');
                    $('.diviFrame').removeClass('mostra');


                }

            })

            // SELECT MENU
            $("#menuCadastros a").click(function() {

                var value = $(this).text();
                value = $(this).attr('id');

                //IFRAME TAG
                if (value != '') {
                    $("#myIframe").attr('src', value);
                }

            })


        });
    </script>
</body>

</html>
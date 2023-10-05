<!doctype html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="../img/meucontrole_icon.png" type="image/png">
    <title>meucontrole.pro</title>
</head>


<style>
    .sidebar-item .nav-link {
        font-weight: 600;
        color: #ffffff;
    }

    .sidebar-item .nav-link:hover,
    .sidebar-item .nav-link:focus {
        color: rgba(0, 0, 0, .85);
        background-color: #d2f4ea;
    }
    .nav-item .nav-link{
        font-weight: 600;
        color: #ffffff;
    }
</style>

<body>
    <div class="container-fluid ">
        <div class="row d-md-flex ">

            <div class="p-0 col-md-2 col-lg-1" style="background-color: #13216A;">
                <!-- NAVBAR MOBILE -->
                <!-- <nav class="navbar-dark d-md-none p-2">
                    <div class="container-fluid">
                    <div class="row d-flex flex">
                        <div class="col-6 col-sm-6 ">
                            <a class="navbar-brand" href="#"><img src="../img/meucontrole.png" width="40%"></a>
                        </div>
                        <div class="col-6 col-sm-6 text-end">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="nav" id="menu">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#" src="configuracao/empresa.php"> Empresa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" src="configuracao/login.php"> Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" src="configuracao/aplicativo.php"> Aplicativos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" src="configuracao/anexos.php"> Anexos</a>
                            </li>
                            
                        </ul>
                    </div>
                    </div>
                </nav> -->

                
                <nav class="navbar-dark d-md-none p-2">
                    <div class="container-fluid">
                        <div class="row d-flex flex align-items-center">
                            <div class="col-12 col-sm-4" id="menu">
                                <a class="navbar-brand" href="#"><img src="../img/meucontrole.png" width="150px"></a>
                            </div>
                            <ul class="col-12 col-sm-8 nav" id="menu">
                                <li class="nav-item col-3 col-sm-3">
                                    <a class="nav-link" aria-current="page" href="#" src="configuracao/empresa.php"> Empresa</a>
                                </li>
                                <li class="nav-item col-3 col-sm-3">
                                    <a class="nav-link" href="#" src="configuracao/login.php"> Login</a>
                                </li>
                                <li class="nav-item col-3 col-sm-3">
                                    <a class="nav-link" href="#" src="configuracao/aplicativo.php"> Aplicativos</a>
                                </li>
                                <li class="nav-item col-3 col-sm-3">
                                    <a class="nav-link" href="#" src="configuracao/anexos.php"> Anexos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- fim NAVBAR MOBILE -->

                <!-- SIDERBAR DESKTOP -->
                <div class="d-none d-md-block"> <!-- style="width: 200px;" -->
                    <a href="/" class="d-flex align-items-center pb-3 mb-3 mt-2">
                        <img src="../img/meucontrole.png" width="100%">
                    </a>
                    <ul class="ps-0" id="menu">
                        <li class="sidebar-item">
                            <a class="nav-link " href="#" src="configuracao/empresa.php"> Empresa </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="nav-link" href="#" src="configuracao/login.php"> Login </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="nav-link" href="#" src="configuracao/aplicativo.php"> Aplicativos </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="nav-link" href="#" src="configuracao/anexos.php"> Anexos </a>
                        </li>
                    </ul>
                </div>
            <!-- fim SIDERBAR DESKTOP -->

            </div> <!-- col -->
            <div class="col-md-10 col-lg-11" style="height: 100vh;">
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
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Agenda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Execução</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Demandas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contratos</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row" style="width: 100%; height: 90vh;">

                    <iframe class="container-fluid" id="myIframe" src="iframe.php"></iframe>

                </div>
            </div>
        </div> <!-- row dflex -->
    </div> <!-- container -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {


            // SELECT MENU
            $("#menu a").click(function() {

                var value = $(this).text();
                value = $(this).attr('src');

                //IFRAME TAG
                if (value != '') {
                    $("#myIframe").attr('src', value);
                }

            })


        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
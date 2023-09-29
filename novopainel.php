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
    .nav-item .nav-link {
        font-weight: 600;
        color: #ffffff;
    }

    .sidebar {
        height: 100vh;
        width: 150px;
        background: #ccc;
        transition: all 0.5s ease-in-out;
    }

    .itemsiderbar {
        background-color: #13216A;
        color: #ffffff;
        text-decoration: none;
    }

    .itemsiderbar:hover,
    .itemsiderbar:focus {
        color: #ffffff;
        /* background-color: #d2f4ea; */
        border-bottom: 2px solid #d2f4ea;
        font-weight: 900;
        width: 100px;
    }
</style>

<body>
    <nav class="navbar-dark d-md-none p-2" style="background-color: #13216A;">
        <div class="container-fluid">

            <div class="row d-flex flex">
                <div class="col-3 col-sm-3 ">
                    <a class="navbar-brand" href="#"><img src="../img/meucontrole.png" width="120vh 120vw"></a>
                </div>
                <div class="col-9 col-sm-9 text-end d-sm-none">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <!-- MENU MOBILE FIXO -->
                <div class="col-sm-12 d-none d-sm-block">
                    <ul class="col-sm-12 nav text-center" id="menu">
                        <li class="nav-item mt-1 col-2 ">
                            <a class="nav-link active " aria-current="page" href="#" src="configuracao/empresa.php"> Serviços2</a>
                        </li>
                        <li class="nav-item mt-1 col-2 ">
                            <a class="nav-link" href="#" src="configuracao/login.php"> Notas</a>
                        </li>
                        <li class="nav-item mt-1 col-2 ">
                            <a class="nav-link" href="#" src="configuracao/aplicativo.php"> Financeiro</a>
                        </li>
                        <li class="nav-item mt-1 col-2 ">
                            <a class="nav-link" href="#" src="configuracao/anexos.php"> Cadastros</a>
                        </li>
                        <li class="nav-item mt-1 col-2 ">
                            <a class="nav-link" href="#" src="configuracao/anexos.php"> Paginas</a>
                        </li>
                        <li class="nav-item mt-1 col-2 ">
                            <a class="nav-link" href="#" src="configuracao/anexos.php"> Sistema</a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- MENU MOBILE FIXO ATIVADO POR BOTÂO-->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav mt-3 text-center" id="menu">
                    <li class="nav-item col-sm-2">
                        <a class="nav-link active" aria-current="page" href="#" src="configuracao/empresa.php"> Serviços1</a>
                    </li>
                    <li class="nav-item col-sm-2">
                        <a class="nav-link" href="#" src="configuracao/login.php"> Notas</a>
                    </li>
                    <li class="nav-item col-sm-2">
                        <a class="nav-link" href="#" src="configuracao/aplicativo.php"> Financeiro</a>
                    </li>
                    <li class="nav-item col-sm-2">
                        <a class="nav-link" href="#" src="configuracao/anexos.php"> Cadastros</a>
                    </li>
                    <li class="nav-item col-sm-2">
                        <a class="nav-link" href="#" src="configuracao/anexos.php"> Paginas</a>
                    </li>
                    <li class="nav-item col-sm-2">
                        <a class="nav-link" href="#" src="configuracao/anexos.php"> Sistema</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex" style="background-color: #EEEEEE;">
        <div class="sidebar pt-2 d-none d-md-block" style="background-color: #13216A;">
            <a class="p-3" href="#"><img src="../img/meucontrole.png" width="120vh 120vw"></a>
            <div class="list-group mt-4" id="menu">
                <a class="itemsiderbar   p-3" href="#" src="../services/">Serviços</a>
                <a class="itemsiderbar   p-3" href="#" src="#!">Notas</a>
                <a class="itemsiderbar   p-3" href="#" src="#">Financeiro</a>
                <a class="itemsiderbar   p-3" href="#" src="#">Cadastros</a>
                <a class="itemsiderbar   p-3" href="#" src="#">Paginas</a>
                <a class="itemsiderbar   p-3" href="#" src="novoindex.php">Sistema</a>
            </div>
        </div>
        <div class="container-fluid p-0 m-0">
            <div class="row p-0 m-0" style="width: 100%; height: 100vh;">
                <iframe class="container-fluid" id="myIframe" src="iframe.php"></iframe>
            </div>
        </div>

    </div>


    <!-- JQUERY TEMPORARIO -->
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
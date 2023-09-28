<!doctype html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<!-- head>
    <title> Vertical Menu </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head -->

<body>
    <div class="container-fluid ">

        <div class="row d-md-flex ">
            <div class="p-0 col-md-1">
                <!-- ul class="nav flex-md-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <p>LOGO</p>
                        </a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Financeiro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#" >Sistema</a>
                    </li>
                </ul -->

                <nav class="p-0 navbar navbar-light">
                    <!-- logo em dispositivo grande -->
                    <a class="navbar-brand d-none d-md-block" href="#"><img src="../img/logo.png" width="100%"></a>
                    <!-- logo em dispositivo pequeno com botão -->
                    <a class="navbar-brand  d-md-none" href="#"><img src="../img/logo.png" width="40%"></a>
                    <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!--   <div class="d-sm-block d-md-none " id="colp">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Home TABLET </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Services </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Sistema </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Blogs </a>
                            </li>
                        </ul>
                    </div> -->

                    <!-- menu dispositivo pequeno -->
                    <div class="collapse d-md-none" id="navbarHeader">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Home TABLET </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Services </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Sistema </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Blogs </a>
                            </li>
                        </ul>
                    </div>
                    <!-- menu dispositivo grande -->
                    <div class="navbar-collapse collapse   d-none d-md-block">
                        <ul class="nav navbar-nav" id="menu">
                            <li class="nav-item">
                                <a class="nav-link" src="" href="#"> Home NORMAL </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" src="../services/demandas/" href="#"> Services </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" src="configuracao/empresa.php" href="#"> Sistema </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" src="indexBlog.php" href="#"> Blogs </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-11 bg-success" style="height: 100vh;">
                <div class="row d-flex flex-row flex-sm-row-reverse">
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-12 bg-danger">
                                <h5 style="text-align:right">PERFIL</h5>
                            </div>
                        </div>
                    </div>
                    <!-- carrega conteudo do menu -->
                    <div class="col-md-10">
                        <?php include 'paginateste.php' ?>
                    </div>
                </div>
               
            </div>

        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
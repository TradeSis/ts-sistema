<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sistema</title>
</head>



<body>
    <div class="container-fluid ">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Orders
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Products
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Customers
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>

        <div class="row d-md-flex ">
            <div class="p-0 col-md-1">

                <nav class="p-0 navbar navbar-light">
                    <!-- logo em dispositivo grande -->
                    <a class="navbar-brand d-none d-md-block" href="indexSistema.php"><img src="../img/logo.png" width="100%"></a>
                    <!-- logo em dispositivo pequeno com botão -->
                    <a class="navbar-brand  d-md-none" href="#"><img src="../img/logo.png" width="40%"></a>
                    
                     <!-- menu dispositivo pequeno -->
                    <div class="d-sm-block d-md-none " id="colp">
                    <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="indexServices.php">Serviços</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Notas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Financeiro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Cadastros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Paginas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="indexSistema.php">Sistema</a>
                            </li>
                        </ul>
                    </div> 

                    <!-- menu dispositivo grande -->
                    <div class="navbar-collapse collapse   d-none d-md-block">
                        <ul class="nav navbar-nav" id="menu">
                            <li class="nav-item">
                                <a class="nav-link" href="indexServices.php">Serviços</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Notas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Financeiro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Cadastros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Paginas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="indexSistema.php">Sistema</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-11 corFundo" style="height: 100vh;">
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

                            <?php
                            $tab = '';
                            if (isset($_GET['tab'])) {
                                $tab = $_GET['tab'];
                            }
                            if ($tab == '') {
                                $tab = 'empresa';
                            } ?>

                            <li class="nav-item mr-1 ">
                                <a class="nav-link1 nav-link <?php if ($tab == "empresa") {
                                    echo " active ";
                                } ?>" href="?tab=empresa"
                                    role="tab">Empresa</a>
                            </li>
                           
                            <li class="nav-item mr-1 ">
                                <a class="nav-link1 nav-link <?php if ($tab == "login") {
                                                                    echo " active ";
                                                                } ?>" href="?tab=login" role="tab">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php

                $src = "";
                $title = "Sistema";

                if ($tab == "login") {
                    $src = "configuracao/login.php";
                    $title = "Sistema/Login";
                }
                if ($tab == "empresa") {
                    $src = "configuracao/empresa.php";
                    $title = "Sistema/Empresa";
                }
                

                if ($src !== "") {
        
                ?>
                    <div class="row" style="width: 100%; height: 90vh;">
                        <iframe class="container-fluid" id="myIframe" src="../sistema/<?php echo $src ?>"></iframe>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
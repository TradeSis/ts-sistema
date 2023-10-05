<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>


    <div class="container-fluid mt-2 ">
        <div class="row bg-warning">
            MENSAGENS
        </div>

        <!-- TOTAIS -->
        <div class="row bg-info d-flex flex">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
            </div>

        </div>
        <!-- fim TOTAIS -->
        <div class="d-sm-none">
            PEQUENO
        </div>
        <div class="d-none d-sm-block">
            GRANDE
        </div>

        <div class="row align-items-center bg-danger p-3 ">

            <div class="col-4 order-1 col-sm-4  col-md-4 order-md-1 col-lg-1 order-lg-1">
                <button type="button" class="btn btn-primary">Filtro</button>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 order-lg-2">
                <h2 class="tituloTabela">
                    Nome da Tabela
                </h2>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 order-lg-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="pesquisa">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button" id="button-addon2">Botão</button>
                    </div>
                </div>
            </div>

            <div class="col-4 order-2 col-sm-4 col-md-4 order-md-2 d-flex col-lg-2 order-lg-4">
                <div class="col-6">
                    <form class="d-flex" action="" method="post" style="text-align: right;">
                        <select class="form-control" name="exportoptions" id="exportoptions">
                            <option value="excel">Excel</option>
                            <option value="pdf">PDF</option>
                            <option value="csv">csv</option>
                        </select>
                    </form>
                </div>
                <div class="col-6">
                    <button class="btn btn-warning" id="export" name="export" type="submit">Gerar</button>
                </div>

            </div>

            <div class="col-4 order-3 col-sm-4 col-md-4 order-md-3 col-lg-2 order-lg-5 text-end">
                <a href="aplicativo_inserir.php" role="button" class="btn btn-success"><i class="bi bi-plus-square"></i>Novo</a>
            </div>
        </div>

        <div class="table bg-body mt-3" style="width: 100%; height: 75vh; overflow-y:scroll; overflow-x:auto;">

            </tr>

            <table class="table table-hover table-sm align-middle">
                <thead class="table-light">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>Adam</td>
                        <td>Johnson</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                        <td>67</td>
                    </tr>

                </tbody>
            </table>



        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
<?php
//Lucas 04042023 criado
include_once(__DIR__ . '/../head.php');
include_once(__DIR__ . '/../database/aplicativo.php');


$aplicativos = buscaAplicativos();
//echo json_encode($aplicativos);
?>

<body class="bg-transparent">
    <div class="container" style="margin-top:30px">


        <div class="row mt-4">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Aplicativo</h2>
            </div>

            <div class="col-sm-4" style="text-align:right">
                <a href="aplicativo_inserir.php" role="button" class="btn btn-success"><i class="bi bi-plus-square"></i>&nbsp Novo</a>
            </div>

        </div>

        <div class="card mt-2 text-center">
            <div class="table scrollbar-tabela">
                <table class="table">
                    <thead class="cabecalhoTabela">
                        <tr>
                            <th>Aplicativo</th>
                            <th>Caminho</th>
                            <th>Imagem</th>
                            <th>Ação</th>

                        </tr>
                    </thead>

                    <?php
                    foreach ($aplicativos as $aplicativo) {
                    ?>
                        <tr>
                            <td><?php echo $aplicativo['nomeAplicativo'] ?></td>
                            <td><?php echo $aplicativo['appLink'] ?></td>
                            <!-- <td><?php echo $aplicativo['imgAplicativo'] ?></td> -->

                            <td><img height="50" width="100" src="<?php echo $aplicativo['pathImg']; ?>" alt=""></td>

                            <td>
                                <a class="btn btn-warning btn-sm" href="aplicativo_alterar.php?idAplicativo=<?php echo $aplicativo['idAplicativo'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger btn-sm" href="aplicativo_excluir.php?idAplicativo=<?php echo $aplicativo['idAplicativo'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
        </div>

    </div>

</body>

</html>
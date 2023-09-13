<?php
// helio 01022023 altereado para include_once
// helio 26012023 16:16
include_once(__DIR__ . '/../head.php');
include_once(__DIR__ . '/../database/anexos.php');


$anexos = buscaAnexos();

?>

<body class="bg-transparent">
    <div class="container" style="margin-top:30px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Anexos</h2>
            </div>

            <div class="col-sm-4" style="text-align:right">
                <a href="anexos_inserir.php" role="button" class="btn btn-success"><i class="bi bi-plus-square"></i>&nbsp Novo</a>
            </div>

        </div>
        <div class="card mt-2 text-center">
            <div class="table scrollbar-tabela">
                <table class="table">
                    <thead class="cabecalhoTabela">
                        <tr>
                            <th>Nome</th>
                            <th>Imagem gif</th>
                            <th>Imagem</th>
                            <th>Ação</th>

                        </tr>
                    </thead>

                   <?php
                    foreach ($anexos as $anexo) {
                    ?>
                        <tr>
                            <td><?php echo $anexo['nomeAnexo'] ?></td>
                            <td><?php echo '<img src="data:image/gif;base64,' . $anexo['base64'] . '" width="60px" height="60px" alt=""/>' ?></td>
                            <td><?php echo '<img src="' . $anexo['base64'] . '" width="60px" height="60px" alt=""/>' ?></td>
                            
                            <td>
                                <a class="btn btn-warning btn-sm" href="anexos_alterar.php?idAnexo=<?php echo $anexo['idAnexo'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger btn-sm" href="anexos_excluir.php?idAnexo=<?php echo $anexo['idAnexo'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
        </div>
    </div>


</body>

</html>
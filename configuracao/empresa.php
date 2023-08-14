<?php
// helio 01022023 altereado para include_once
// helio 26012023 16:16
include_once(__DIR__ . '/../head.php');
include_once(__DIR__ . '/../database/empresa.php');


$empresas = buscaEmpresas();

?>

<body class="bg-transparent">
    <div class="container" style="margin-top:30px"> 
        
            <div class="row mt-4">
                <div class="col-sm-8">
                        <h2 class="tituloTabela">Empresas</h2>
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="empresa_inserir.php" role="button" class="btn btn-success"><i class="bi bi-plus-square"></i>&nbsp Novo</a>
                    </div>
          
            </div>
        <div class="card mt-2 text-center">
            <table class="table">
                <thead class="cabecalhoTabela">
                    <tr>
                        <th>Empresa</th>
                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($empresas as $empresa) {
                ?>
                    <tr>
                        <td><?php echo $empresa['nomeEmpresa'] ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="empresa_alterar.php?idEmpresa=<?php echo $empresa['idEmpresa'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger btn-sm" href="empresa_excluir.php?idEmpresa=<?php echo $empresa['idEmpresa'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
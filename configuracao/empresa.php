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
                        <p class="tituloTabela">Empresas</p>
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="empresa_inserir.php" role="button" class="btn btn-primary">Adicionar Empresa</a>
                    </div>
          
            </div>
        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Empresa</th>
                        <th class="text-center">Tempo Sessão</th>
                        <th class="text-center">Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($empresas as $empresa) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $empresa['nomeEmpresa'] ?></td>
                        <td class="text-center"><?php echo $empresa['timeSessao'] ?></td>
                        <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="empresa_alterar.php?idEmpresa=<?php echo $empresa['idEmpresa'] ?>" role="button">Editar</a>
                            <a class="btn btn-danger btn-sm" href="empresa_excluir.php?idEmpresa=<?php echo $empresa['idEmpresa'] ?>" role="button">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
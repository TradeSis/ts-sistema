<?php

include_once('../head.php');
include_once('../database/marcas.php');

$marcas = buscaMarcas();
//echo json_encode($marcas);

?>

<body class="bg-transparent">
    <div class="container text-center" style="margin-top:30px"> 
        
            <div class="row mt-4">
                <div class="col-sm-8">
                        <h4 class="tituloTabela">Marcas</h4>
                        
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="marcas_inserir.php" role="button" class="btn btn-primary">Adicionar</a>
                    </div>
          
            </div>
        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>nome</th>
                        <th>imagem</th>

                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($marcas as $marca) {
                ?>
                    <tr>
                        <td><?php echo $marca['nomeMarca'] ?></td>
                        <td><img class="img-profile " src="admin/imgMarcas/<?php echo $marca["imgMarca"] ?>" height="60px" width="60"></td>
                        
                        
                        <td>
                            <!-- <a class="btn btn-primary btn-sm" href="clientes_alterar.php?idCliente=<?php echo $perfil['idCliente'] ?>" role="button">Editar</a> -->
                            <a class="btn btn-danger btn-sm" href="marcas_excluir.php?idMarca=<?php echo $marca['idMarca'] ?>" role="button">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
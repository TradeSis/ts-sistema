<?php
// helio 01022023 altereado para include_once
// helio 26012023 16:16

include_once('../head.php');
include_once('../database/produtos.php');

$produtos = buscaTodosProdutos();
/* echo json_encode($produtos); */

?>

<body class="bg-transparent">
    <div class="container text-center" style="margin-top:30px"> 
        
            <div class="row mt-4">
                <div class="col-sm-8">
                        <h4 class="tituloTabela">Produtos</h4>
                        
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="produtos_inserir.php" role="button" class="btn btn-primary">Adicionar</a>
                    </div>
          
            </div>
        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Destaque</th>

                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($produtos as $produto) {
                ?>
                    <tr>
                    
                        <td><img src="admin/imgProdutos/<?php echo $produto['fotoProduto'] ?>" width="60px" height="60px" alt=""></td>
                        <td><?php echo $produto['nomeProduto'] ?></td>
                        <td><?php echo $produto['valorProduto'] ?></td>
                        <td><?php echo $produto['destaque'] ?></td>
                        
                        
                        <td>
                            
                            <a class="btn btn-danger btn-sm" href="produtos_excluir.php?idProduto=<?php echo $produto['idProduto'] ?>" role="button">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
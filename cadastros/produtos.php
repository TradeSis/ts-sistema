<?php
include_once('../head.php');
include_once('../database/produtos.php');

$produtos = buscaProdutos();
?>

<body class="bg-transparent">
    <div class="container text-center" style="margin-top:30px"> 
        
            <div class="row mt-4">
                <div class="col-sm-8">
                        <h4 class="tituloTabela">Catalogo</h4>
                        
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
                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($produtos as $produtos) {
                ?>
                    <tr>
                        <td><img src="<?php echo URLROOT ?>/img/<?php echo $produtos['imgProduto'] ?>" width="60px" height="60px" alt=""></td>
                        <td><?php echo $produtos['nomeProduto'] ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="#" role="button"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="produtos_alterar.php?idProduto=<?php echo $produtos['idProduto'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger btn-sm" href="produtos_excluir.php?idProduto=<?php echo $produtos['idProduto'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
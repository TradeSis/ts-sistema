<?php
include_once('../head.php');
include_once('../database/categorias.php');

$categorias = buscaCategorias();
?>

<body class="bg-transparent">
    <div class="container text-center" style="margin-top:30px"> 
        
            <div class="row mt-4">
                <div class="col-sm-8">
                        <h4 class="tituloTabela">Categorias</h4>
                        
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="categorias_inserir.php" role="button" class="btn btn-primary">Adicionar</a>
                    </div>
          
            </div>
        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($categorias as $categoria) {
                ?>
                    <tr>
                        <td><?php echo $categoria['nomeCategoria'] ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="categorias_alterar.php?idCategoria=<?php echo $categoria['idCategoria'] ?>" role="button">Editar</a>
                            <a class="btn btn-danger btn-sm" href="categorias_excluir.php?idCategoria=<?php echo $categoria['idCategoria'] ?>" role="button">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
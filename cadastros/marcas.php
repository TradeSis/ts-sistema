<?php
include_once('../head.php');
include_once('../database/marcas.php');

$marcas = buscaMarcas();
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
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($marcas as $marca) {
                ?>
                    <tr>
                        <td><img src="<?php echo URLROOT ?>/img/<?php echo $marca['imgMarca'] ?>" width="60px" height="60px" alt=""></td>
                        <td><?php echo $marca['nomeMarca'] ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="#" role="button"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="marcas_alterar.php?idMarca=<?php echo $marca['idMarca'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger btn-sm" href="marcas_excluir.php?idMarca=<?php echo $marca['idMarca'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
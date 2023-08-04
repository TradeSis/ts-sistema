<?php
include_once('../head.php');
include_once('../database/autor.php');

$autores = buscaAutor();
?>

<body class="bg-transparent">
    <div class="container text-center" style="margin-top:30px"> 
        
            <div class="row mt-4">
                <div class="col-sm-8">
                        <h4 class="tituloTabela">Autor</h4>
                        
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="autor_inserir.php" role="button" class="btn btn-primary">Adicionar</a>
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
                foreach ($autores as $autor) {
                ?>
                    <tr>
                        <td><img src="<?php echo URLROOT ?>/img/<?php echo $autor['fotoAutor'] ?>" width="60px" height="60px" alt=""></td>
                        <td><?php echo $autor['nomeAutor'] ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="#" role="button"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="autor_alterar.php?idAutor=<?php echo $autor['idAutor'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger btn-sm" href="autor_excluir.php?idAutor=<?php echo $autor['idAutor'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
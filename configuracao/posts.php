<?php
include_once('../head.php');
include_once('../database/posts.php');

$posts = buscaPosts();
?>

<body class="bg-transparent">
    <div class="container text-center" style="margin-top:30px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h4 class="tituloTabela">Posts</h4>

            </div>

            <div class="col-sm-4" style="text-align:right">
                <a href="post_inserir.php" role="button" class="btn btn-primary">Adicionar</a>
            </div>

        </div>
        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Categoria</th>
                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($posts as $post) {
                ?>
                    <tr>

                        <td><img src="<?php echo URLROOT ?>/img/<?php echo $post['imgDestaque'] ?>" width="60px" height="60px" alt=""></td>
                        <td><?php echo $post['titulo'] ?></td>
                        <td><?php echo $post['nomeAutor'] ?></td>
                        <td><?php echo $post['nomeCategoria'] ?></td>

                        <td>
                            <a class="btn btn-info btn-sm" href="#" role="button"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="post_alterar.php?idPost=<?php echo $post['idPost'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger btn-sm" href="post_excluir.php?idPost=<?php echo $post['idPost'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
<?php
include_once('../head.php');
include_once('../database/noticias.php');
$noticias = buscaNoticias();
?>

<body class="bg-transparent">
    <div class="container text-center" style="margin-top:30px"> 
        
            <div class="row mt-4">
                <div class="col-sm-8">
                        <h4 class="tituloTabela">Noticias</h4>
                        
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="noticias_inserir.php" role="button" class="btn btn-primary">Adicionar</a>
                    </div>
          
            </div>
        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Titulo</th>
                        <th>Colunista</th>
                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($noticias as $noticia) {
                ?>
                    <tr>
                        <td><img src="<?php echo URLROOT ?>/img/<?php echo $noticia['imgNoticia'] ?>" width="60px" height="60px" alt=""></td>
                        <td><?php echo $noticia['tituloNoticia'] ?></td>
                        <td><?php echo $noticia['nomeAutor'] ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="#" role="button"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="noticias_alterar.php?idNoticia=<?php echo $noticia['idNoticia'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger btn-sm" href="noticias_excluir.php?idNoticia=<?php echo $noticia['idNoticia'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
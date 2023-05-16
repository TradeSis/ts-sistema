
<?php
include_once('../head.php');
include_once('../database/posts.php');

$post = buscaPosts($_GET['idPost']);
/* echo json_encode($post); */
?>




<body class="bg-transparent">

    <div class="container" style="margin-top:10px">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row">
                    <div class="col-sm">
                        <h3 class="col">Excluir Post</h3>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="posts.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/posts.php?operacao=excluir" method="post" enctype="multipart/form-data">
             
                    <div class="row">
                        <div class="col-sm-12" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -40px;">Titulo</label>
                                <input type="text" name="titulo" class="form-control" value="<?php echo $post['titulo'] ?>" >
                                <input type="text" class="form-control" name="idPost" value="<?php echo $post['idPost'] ?>" style="display: none">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent" style="text-align:right">

                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


   
</body>

</html>

<?php
include_once('../head.php');
include_once('../database/posts.php');

$post = buscaPosts($_GET['idPost']);
/* echo json_encode($post); */
?>




<body class="bg-transparent">

    <div class="container" style="margin-top:10px">
            <div class="row mt-4">
                    <div class="col-sm-8">
                        <h3 class="col">Excluir Post</h3>
                    </div>
                    <div class="col-sm-4" style="text-align:right">
                        <a href="posts.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/posts.php?operacao=excluir" method="post" enctype="multipart/form-data">
             
                    <div class="row">
                        <div class="col-sm-12" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -40px;">Titulo</label>
                                <input type="text" name="titulo" class="form-control" value="<?php echo $post['titulo'] ?>" disabled>
                                <input type="text" class="form-control" name="idPost" value="<?php echo $post['idPost'] ?>" style="display: none">
                                <input type="text" class="form-control" name="imgDestaque" value="<?php echo $post['imgDestaque'] ?>" style="display: none">
                            </div>
                        </div>
                    </div>
                    <div style="text-align:right; margin-right:-20px; margin-top:20px">
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </div>
                </form>
            </div>
    </div>


   
</body>

</html>
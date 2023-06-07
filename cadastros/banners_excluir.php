
<?php
include_once('../head.php');
include_once('../database/banners.php');

$post = buscaBanners($_GET['idBanner']);
/* echo json_encode($post); */
?>




<body class="bg-transparent">

    <div class="container" style="margin-top:10px">
            <div class="row mt-4">
                    <div class="col-sm-8">
                        <h3 class="col">Excluir Banner</h3>
                    </div>
                    <div class="col-sm-4" style="text-align:right">
                        <a href="banners.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/banners.php?operacao=excluir" method="post" enctype="multipart/form-data">
             
                    <div class="row">
                        <div class="col-sm-12" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -40px;">Nome</label>
                                <input type="text" name="nomeBanner" class="form-control" value="<?php echo $post['nomeBanner'] ?>" >
                                <input type="text" class="form-control" name="idBanner" value="<?php echo $post['idBanner'] ?>" style="display: none">
                                <input type="text" class="form-control" name="imgBanner" value="<?php echo $post['imgBanner'] ?>" style="display: none">
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
<?php
include_once('../head.php');
include_once('../database/banners.php');

$banners = buscaBanners();
?>

<body class="bg-transparent">
    <div class="container text-center" style="margin-top:30px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h4 class="tituloTabela">Posts</h4>

            </div>

            <div class="col-sm-4" style="text-align:right">
                <a href="banners_inserir.php" role="button" class="btn btn-primary">Adicionar</a>
            </div>

        </div>
        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Status</th>
                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($banners as $banner) {
                ?>
                    <tr>

                        <td><img src="<?php echo URLROOT ?>/img/imgBanner/<?php echo $banner['imgBanner'] ?>" width="60px" height="60px" alt=""></td>
                        <td><?php echo $banner['nomeBanner'] ?></td>
                        <td><?php echo $banner['statusBanner'] ?></td>

                        <td>
                            <!-- <a class="btn btn-primary btn-sm" href="banners_completo.php?idBanner=<?php echo $banner['idBanner'] ?>" role="button">Visualizar</a> -->
                            <a class="btn btn-danger btn-sm" href="banners_excluir.php?idBanner=<?php echo $banner['idBanner'] ?>" role="button">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
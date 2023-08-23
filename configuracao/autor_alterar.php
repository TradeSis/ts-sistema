<?php

include_once('../head.php');
include_once('../database/autor.php');


$idAutor = $_GET['idAutor'];
$autor = buscaAutor($idAutor);
?>

<body class="bg-transparent">

    <div class="container" style="margin-top:20px">

        <div class="row mt-4">

            <div class="col-sm-8">
                <h4 class="tituloTabela">Editar Autor</h4>
            </div>

            <div class="col-sm-4" style="text-align:right">
                <a href="autor.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>

        </div>
        <div class="container" style="margin-top: 10px">

            <form action="../database/autor.php?operacao=alterar" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                            <label class="labelForm">Nome</label>
                            <input type="text" name="nomeAutor" class="form-control" value="<?php echo $autor['nomeAutor'] ?>">
                            <input type="text" class="form-control" name="idAutor" value="<?php echo $autor['idAutor'] ?>" style="display: none">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6" style="margin-top: 50px">
                        <div class="col-sm-6" style="margin-top: -20px">
                            <label>Foto</label>
                            <label class="picture" for="foto" tabIndex="0">
                                <img src="<?php echo URLROOT ?>/img/<?php echo $autor["fotoAutor"] ?>" width="100%" height="100%" alt="">  
                            </label>
                            <input type="file" name="fotoAutor" id="foto">
                        </div>
                    </div>

                    <div class="col-sm-6" style="margin-top: 50px">
                        <div class="col-sm-6" style="margin-top: -20px">
                            <label>Banner</label>
                            <label class="picture" for="banner" tabIndex="0">
                            <img src="<?php echo URLROOT ?>/img/<?php echo $autor["bannerAutor"] ?>" width="100%" height="100%" alt="">
                            </label>
                            <input type="file" name="bannerAutor" id="banner" value="<?php echo $autor['bannerAutor'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -43px;">Sobre Mim</label>
                            <textarea name="sobreMimAutor" id="" cols="135" rows="10"><?php echo $autor['sobreMimAutor'] ?></textarea>
                        </div>
                    </div>
                </div>

                <div style="text-align:right; margin-right:-10px">
                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                </div>
                <div class="card-footer bg-transparent" style=" margin-top: 40px">
                </div>
            </form>
            

        </div>

    </div>

</body>

</html>
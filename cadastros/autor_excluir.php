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
                <h4 class="tituloTabela">Excluir Autor</h4>
            </div>

            <div class="col-sm-4" style="text-align:right">
                <a href="autor.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>

        </div>
        <div class="container" style="margin-top: 10px">

            <form action="../database/autor.php?operacao=excluir" method="post">

                <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                            <label class="labelForm">Nome</label>
                            <input type="text" name="nomeAutor" class="form-control" value="<?php echo $autor['nomeAutor'] ?>" disabled>
                            <input type="text" class="form-control" name="idAutor" value="<?php echo $autor['idAutor'] ?>" style="display: none">
                            <input type="text" class="form-control" name="fotoAutor" value="<?php echo $autor['fotoAutor'] ?>" style="display: none">
                            <input type="text" class="form-control" name="bannerAutor" value="<?php echo $autor['bannerAutor'] ?>" style="display: none">
                        </div>
                    </div>
                </div>

                <div style="text-align:right; margin-right:-10px">
                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                </div>
                <div class="card-footer bg-transparent" style=" margin-top: 40px">
                </div>
            </form>

        </div>

    </div>


</body>

</html>
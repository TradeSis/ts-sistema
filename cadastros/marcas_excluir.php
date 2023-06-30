<?php
include_once('../head.php');
include_once('../database/marcas.php');


$idMarca = $_GET['idMarca'];
$marca = buscaMarcas($idMarca);
?>


<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h3 class="col">Adicionar Marca</h3>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="marcas.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>
        </div>
        <div class="container" style="margin-top: 10px">

            <form action="../database/marcas.php?operacao=excluir" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">nome da marca</label>
                            <input type="text" name="nomeMarca" class="form-control" value="<?php echo $marca['nomeMarca'] ?>">
                            <input type="text" class="form-control" name="idMarca" value="<?php echo $marca['idMarca'] ?>" style="display: none">
                            <input type="text" class="form-control" name="imgMarca" value="<?php echo $marca['imgMarca'] ?>" style="display: none">
                            <input type="text" class="form-control" name="bannerMarca" value="<?php echo $marca['bannerMarca'] ?>" style="display: none">
                        </div>
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
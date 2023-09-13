<?php
include_once('../head.php');
include_once('../database/anexos.php');

$anexo = buscaAnexos($_GET['idAnexo']);

?>

<body class="bg-transparent">

    <div class="container formContainer">

        <div class="row">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Excluir Empresa</h2>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="../configuracao/?tab=configuracao&stab=anexos" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

        <form action="../database/anexos.php?operacao=excluir" method="post" enctype="multipart/form-data">
            <div class="col-md-12 form-group mb-4">

                <label class='control-label' for='inputNormal'></label>
                <div class="for-group">
                    <input type="text" class="form-control" name="nomeAnexo" value="<?php echo $anexo['nomeAnexo'] ?>">
                    <input type="text" class="form-control" name="idAnexo" value="<?php echo $anexo['idAnexo'] ?>" style="display: none">
                </div>

            </div>

            <div style="text-align:right; margin-top:20px">
                <button type="submit" id="botao" class="btn btn-sm btn-danger"><i class="bi bi-x-octagon"></i>&#32;Excluir</button>
            </div>
        </form>

    </div>


</body>

</html>
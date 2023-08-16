<?php
//Lucas 04042023 criado

include_once('../head.php');
include_once('../database/aplicativo.php');

$aplicativo = buscaAplicativos($_GET['idAplicativo']);

//echo json_encode($aplicativo);
?>

<body class="bg-transparent">

    <div class="container formContainer">

        <div class="row">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Excluir Aplicativo</h2>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="../configuracao/?tab=configuracao&stab=aplicativo" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

        <form action="../database/aplicativo.php?operacao=excluir" method="post">
            <div class="form-group" style="margin-top:10px">
                <label class='control-label' for='inputNormal'></label>
                <input type="text" class="form-control" name="nomeAplicativo" value="<?php echo $aplicativo['nomeAplicativo'] ?>">
                <input type="text" class="form-control" name="idAplicativo" value="<?php echo $aplicativo['idAplicativo'] ?>" style="display: none">
            </div>
            <div style="text-align:right; margin-top:30px">
                <button type="submit" id="botao" class="btn btn-sm btn-danger"><i class="bi bi-x-octagon"></i>&#32;Excluir</button>
            </div>

        </form>


    </div>


</body>

</html>
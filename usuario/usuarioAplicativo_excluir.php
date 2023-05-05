<?php
//Lucas 04042023 criado

include_once('../head.php');
include_once('../database/usuarioaplicativo.php');

$idUsuario = $_GET['idUsuario'];
$idAplicativo = $_GET['idAplicativo'];
$usuarioaplicativo = buscaUsuarioAplicativo($idUsuario, $idAplicativo);

//echo json_encode($usuarioaplicativo);
?>

<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="col-sm mt-4" style="text-align:right">
            <a href="#" onclick="history.back()" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
        </div>
        <div class="col-sm">
            <spam class="col titulo">Excluir Usuario/Aplicativo</spam>
        </div>

        <div class="container" style="margin-top: 30px">

            <form action="../database/usuarioaplicativo.php?operacao=excluir" method="post">
                <div class="form-group" style="margin-top:10px">
                    <label class='control-label' for='inputNormal'></label>
                    <input type="text" class="form-control" name="idUsuario" value="<?php echo $usuarioaplicativo['idUsuario'] ?>">
                    <input type="text" class="form-control" name="idAplicativo" value="<?php echo $usuarioaplicativo['idAplicativo'] ?>" style="display: none">
                </div>
                <div style="text-align:right; margin-top:30px">
                    <button type="submit" id="botao" class="btn btn-danger"><i class="bi bi-x-octagon"></i>&#32;Excluir</button>
                </div>
        </div>
        </form>


    </div>


</body>

</html>
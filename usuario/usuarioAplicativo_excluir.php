<?php
//Lucas 04042023 criado

include_once('../head.php');
include_once('../database/usuarioAplicativo.php');
include_once('../database/usuario.php');
include_once('../database/aplicativo.php');

$usuario = buscaUsuarios($_GET['idUsuario']);
$aplicativo = buscaAplicativos($_GET['idAplicativo']);
$usuarioaplicativo = buscaUsuarioAplicativo($_GET['idUsuario'],$_GET['idAplicativo']);
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

            <form action="../database/usuarioAplicativo.php?operacao=excluir" method="post">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Usuário</label>
                            <input type="text" class="form-control" name="nomeUsuario" value="<?php echo $usuario['nomeUsuario'] ?>" readonly>
                            <input type="text" class="form-control" name="idUsuario" value="<?php echo $usuario['idUsuario'] ?>" hidden>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Aplicativo</label>
                            <input type="text" class="form-control" name="nomeAplicativo" value="<?php echo $aplicativo['nomeAplicativo'] ?>" readonly>
                            <input type="text" class="form-control" name="idAplicativo" value="<?php echo $aplicativo['idAplicativo'] ?>" hidden>
                        </div>
                    </div>
                </div>
                <div style="text-align:right; margin-top:30px">
                    <button type="submit" id="botao" class="btn btn-danger"><i class="bi bi-x-octagon"></i>&#32;Excluir</button>
                </div>
        </div>
        </form>


    </div>


</body>

</html>
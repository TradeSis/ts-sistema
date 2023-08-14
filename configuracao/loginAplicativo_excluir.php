<?php
//Lucas 04042023 criado

include_once('../head.php');
include_once('../database/loginAplicativo.php');
include_once('../database/login.php');
include_once('../database/aplicativo.php');

$login = buscaLogins($_GET['idLogin']);
$aplicativo = buscaAplicativos($_GET['idAplicativo']);
$usuarioaplicativo = buscaLoginAplicativo($_GET['idLogin'], $_GET['idAplicativo']);
?>

<body class="bg-transparent">

    <div class="container p-4" style="margin-top:10px">

        <div class="row">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Excluir Usuario/Aplicativo</h2>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="#" onclick="history.back()" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

        <form class="mb-4" action="../database/loginAplicativo.php?operacao=excluir" method="post">
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -20px;">Usuário</label>
                        <input type="text" class="form-control" name="loginNome" value="<?php echo $login['loginNome'] ?>" readonly>
                        <input type="text" class="form-control" name="idLogin" value="<?php echo $login['idLogin'] ?>" hidden>
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

            <div style="text-align:right; margin-top:20px">
                <button type="submit" id="botao" class="btn btn-sm btn-danger"><i class="bi bi-x-octagon"></i>&#32;Excluir</button>
            </div>
        </form>


    </div>


</body>

</html>
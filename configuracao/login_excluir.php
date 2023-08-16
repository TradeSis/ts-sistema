<?php
// helio 01022023 altereado para include_once
// helio 26012023 16:16
include_once('../head.php');
include_once('../database/login.php');

$idLogin = $_GET['idLogin'];
$login = buscaLogins($idLogin);

?>

<body class="bg-transparent">

    <div class="container formContainer">

        <div class="row">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Excluir Usuário</h2>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="../configuracao/?tab=configuracao&stab=login" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>
    
            <form action="../database/login.php?operacao=excluir" method="post">

                <div class="col-md-12 form-group">
                    <label class='control-label' for='inputNormal'></label>
                    <input type="text" class="form-control" name="loginNome" value="<?php echo $login['loginNome'] ?>">
                    <input type="text" class="form-control" name="idLogin" value="<?php echo $login['idLogin'] ?>" style="display: none">
                </div>

                <div style="text-align:right; margin-top:20px">
                    <button type="submit" id="botao" class="btn btn-sm btn-danger"><i class="bi bi-x-octagon"></i>&#32;Excluir</button>
                </div>
            </form>

    </div>


</body>

</html>
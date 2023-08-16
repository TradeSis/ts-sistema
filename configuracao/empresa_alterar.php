<?php
// helio 01022023 altereado para include_once
// helio 26012023 16:16

include_once('../head.php');
include_once('../database/empresa.php');

$empresa = buscaEmpresas($_GET['idEmpresa']);

?>

<body class="bg-transparent">

    <div class="container formContainer">

        <div class="row">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Alterar Empresa</h2>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="../configuracao/?tab=configuracao&stab=empresa" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

        <form action="../database/empresa.php?operacao=alterar" method="post">

            <div class="col-md-12 form-group mb-4">
                <label class='control-label' for='inputNormal'></label>
                <div class="for-group">
                    <input type="text" class="form-control" name="nomeEmpresa" value="<?php echo $empresa['nomeEmpresa'] ?>">
                    <input type="text" class="form-control" name="idEmpresa" value="<?php echo $empresa['idEmpresa'] ?>" style="display: none">
                </div>
            </div>

            <div style="text-align:right; margin-top:20px">
                <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Salvar</button>
            </div>
        </form>

    </div>


</body>

</html>
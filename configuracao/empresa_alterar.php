<?php
// helio 01022023 altereado para include_once
// helio 26012023 16:16

include_once('../head.php');
include_once('../database/empresa.php');

$empresa = buscaEmpresas($_GET['idEmpresa']);

?>

<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="col-sm mt-4" style="text-align:right">
            <a href="../configuracao/?tab=configuracao&stab=empresa" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
        </div>
        <div class="col-sm">
            <spam class="col titulo">Alterar Empresa</spam>
        </div>
        <div class="container" style="margin-top: 10px">
            <form action="../database/empresa.php?operacao=alterar" method="post">
        
                <div class="col-md-12 form-group mb-4">

                    <label class='control-label' for='inputNormal'></label>
                    <div class="for-group">
                        <input type="text" class="form-control" name="nomeEmpresa" value="<?php echo $empresa['nomeEmpresa'] ?>">
                    </div>
                    <input type="text" class="form-control" name="idEmpresa" value="<?php echo $empresa['idEmpresa'] ?>" style="display: none">
                </div>

                <div style="text-align:right">
                <button type="submit" id="botao" class="btn btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Salvar</button>
                </div>
            </form>
        </div>

    </div>


</body>

</html>

<?php

include_once('../head.php');
include_once('../database/secao.php');

$secao = buscaSecao($_GET['idSecao']);
/* echo json_encode($secao); */
?>



<body class="bg-transparent">

    <div class="container" style="margin-top:10px">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row">
                    <div class="col-sm">
                        <h3 class="col">Excluir Seção</h3>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="secao.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/secao.php?operacao=excluir" method="post">  

                    <div class="row">
                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -40px;">Titulo</label>
                                <input type="text" name="tituloSecao" class="form-control" value="<?php echo $secao ['tituloSecao'] ?>" >
                                <input type="text" class="form-control" name="idSecao" value="<?php echo $secao ['idSecao'] ?>" style="display: none">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent" style="text-align:right">

                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</body>

</html>
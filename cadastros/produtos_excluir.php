
<?php
include_once('../head.php');
include_once('../database/produtos.php');

$produto = buscaTodosProdutos($_GET['idProduto']);
/* echo json_encode($produto); */
?>




<body class="bg-transparent">

    <div class="container" style="margin-top:10px">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row">
                    <div class="col-sm">
                        <h3 class="col">Excluir Produto</h3>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="produtos.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/produtos.php?operacao=excluir" method="post" enctype="multipart/form-data">
             
   

                    <div class="row">
                        <div class="col-sm-12" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -40px;">Nome</label>
                                <input type="text" name="nomeProduto" class="form-control" value="<?php echo $produto['nomeProduto'] ?>" >
                                <input type="text" class="form-control" name="idProduto" value="<?php echo $produto['idProduto'] ?>" style="display: none">
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
<?php
include_once('../head.php');
include_once('../database/categorias.php');

$idCategoria = $_GET['idCategoria']; 
$categoria = buscaCategorias($idCategoria);
?>


<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h3 class="col">Excluir Categoria</h3>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="categorias.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>
        </div>
        <div class="container" style="margin-top: 10px">

            <form action="../database/categorias.php?operacao=excluir" method="post">

                <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome da Categoria</label>
                            <input type="text" name="nomeCategoria" class="form-control" value="<?php echo $categoria['nomeCategoria'] ?>" disabled>
                            <input type="text" class="form-control" name="idCategoria" value="<?php echo $categoria['idCategoria'] ?>" style="display: none">
                        </div>
                    </div>
                </div>

                

        </div>

        <div style="text-align:right; margin-right:-20px; margin-top:20px">
            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
        </div>
        </form>
    </div>

    </div>
</body>

</html>
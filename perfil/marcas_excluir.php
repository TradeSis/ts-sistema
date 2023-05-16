
<?php

include_once('../head.php');
include_once('../database/marcas.php');

$marca = buscaMarcas($_GET['idMarca']);
?>



<body class="bg-transparent">

    <div class="container" style="margin-top:10px">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row">
                    <div class="col-sm">
                        <h3 class="col">Excluir Marca</h3>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="marca.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/marcas.php?operacao=excluir" method="post" enctype="multipart/form-data">

                    <div class="form-group" style="margin-top:10px">
                        
                        <div class="row">
                            <div class="col-sm-6" style="margin-top: 10px">
                                <label>Nome</label>
                                <input type="text" name="nomeMarca" class="form-control" value="<?php echo $marca['nomeMarca'] ?>">
                                <input type="text" class="form-control" name="idMarca" value="<?php echo $marca['idMarca'] ?>" style="display: none">
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
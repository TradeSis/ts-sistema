<?php
include_once('../head.php');
?>


<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h3 class="col">Adicionar Categoria</h3>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="categorias.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>
        </div>
        <div class="container" style="margin-top: 10px">

            <form action="../database/categorias.php?operacao=inserir" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome da Categoria</label>
                            <input type="text" name="nomeCategoria" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                </div>

        </div>

        <div style="text-align:right; margin-right:-20px; margin-top:20px">
            <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
        </div>
        </form>
    </div>

    </div>

</body>

</html>
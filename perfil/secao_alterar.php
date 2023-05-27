<?php

include_once('../head.php');
include_once('../database/secao.php');

$secao = buscaSecao($_GET['idSecao']);
/* echo json_encode($secao); */
?>



<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h3 class="col">Seções</h3>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="secao.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>
        </div>

        <div class="container" style="margin-top: 10px">
            <form action="../database/secao.php?operacao=alterar" method="post">
                <div class="row">
                    <div class="col-sm-6" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -40px;">Titulo</label>
                            <input type="text" name="tituloSecao" class="form-control" value="<?php echo $secao['tituloSecao'] ?>">
                            <input type="text" class="form-control" name="idSecao" value="<?php echo $secao['idSecao'] ?>" style="display: none">
                        </div>
                    </div>

                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -40px;">Arquivo Fonte</label>
                            <input type="text" name="arquivoFonte" class="form-control" value="<?php echo $secao['arquivoFonte'] ?>">
                        </div>
                    </div>

                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="select-form-group">

                            <label class="labelForm">Tipo</label>
                            <select class="select form-control" name="tipoSecao">
                                <option value="<?php echo $secao['tipoSecao'] ?>"><?php echo $secao['tipoSecao'] ?></option>
                                <option value="header">header</option>
                                <option value="footer">footer</option>
                                <option value="html">html</option>
                                <option value="card">card</option>
                                <option value="form">form</option>
                                <option value="banner">banner</option>
                                <option value="sobreNos">sobre Nós</option>
                                <option value="principal">Principal</option>
                                <option value="divisaoPagina">divisão de Pagina</option>
                            </select>

                        </div>
                    </div>
                </div>

                <div style="text-align:right; margin-right:-20px">
                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                </div>
            </form>
        </div>

    </div>


</body>

</html>
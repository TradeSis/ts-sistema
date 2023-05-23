<?php
include_once('../head.php');
include_once('../database/secao.php');
include_once('../database/paginas.php');

$secoes = buscaSecao();
$paginas = buscaPaginas($_GET["idPagina"]);


?>



<body class="bg-transparent">

    <div class="container" style="margin-top:10px">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row">
                    <div class="col-sm">
                        <h3 class="col">Seções das Paginas</h3>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="paginas.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/secaoPagina.php?operacao=inserir" method="post">



                    <div class="row">

                        <div class="col-sm-3" style="margin-top: -5px">
                            <div class="select-form-group">                               
                                <label class="labelForm">Pagina</label>
                                <input type="text" class="form-control" name="tituloPagina" value="<?php echo $paginas['tituloPagina'] ?>" readonly>
                                <input type="text" class="form-control" name="idPagina" value="<?php echo $paginas['idPagina'] ?>" hidden>
                            </div>
                        </div>

                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="select-form-group">

                                <label class="labelForm">Seção</label>
                                <select class="select form-control" name="idSecao">
                                    <?php
                                    foreach ($secoes as $secao) {
                                    ?>
                                        <option value="<?php echo $secao['idSecao'] ?>"><?php echo $secao['tituloSecao']  ?></option>
                                    <?php  } ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="select-form-group">
                                    <label class="labelForm">Ordem</label>
                                    <select class="select form-control" name="ordem">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>                            
                            </div>
                        </div>
                    </div>



                    <div class="card-footer bg-transparent" style="text-align:right">

                        <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
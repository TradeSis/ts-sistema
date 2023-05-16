<?php
include_once('../head.php');
include_once('../database/secaoPagina.php');
include_once('../database/secao.php');
include_once('../database/paginas.php');

$secoes = buscaSecao();
$paginas = buscaPaginas();


$idSecaoPagina = $_GET['idSecaoPagina'];
/* echo json_encode($_GET['idSecaoPagina']);
return; */
$secoesPagina = buscaSecaoPaginas($idSecaoPagina);
/* echo json_encode($secoesPagina); */
?>



<body class="bg-transparent">

    <div class="container" style="margin-top:10px">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row">
                    <div class="col-sm">
                        <h3 class="col">Seções da Paginas</h3>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="secoesPaginas.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/secaoPagina.php?operacao=alterar" method="post">

                    <div class="row">

                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="select-form-group">

                                <label class="labelForm">Pagina</label>
                                <select class="select form-control" name="idPagina">
                                <option value="<?php echo $secoesPagina['idPagina'] ?>"><?php echo $secoesPagina['tituloPagina']  ?></option>
                                    <?php
                                    foreach ($paginas as $pagina) {
                                    ?>
                                        <option value="<?php echo $pagina['idPagina'] ?>"><?php echo $pagina['tituloPagina']  ?></option>
                                    <?php  } ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="select-form-group">

                                <label class="labelForm">Seção</label>
                                <select class="select form-control" name="idSecao">
                                <option value="<?php echo $secoesPagina['idSecao'] ?>"><?php echo $secoesPagina['tituloSecao']  ?></option>
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
                            <select class="select form-control" name="ordem" >
                                        <option value="<?php echo $secoesPagina['ordem'] ?>"><?php echo $secoesPagina['ordem'] ?></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
						    <input type="text" class="form-control" name="idSecaoPagina" value="<?php echo $secoesPagina['idSecaoPagina'] ?>" style="display: none">
                          


                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent" style="text-align:right">

                        <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>
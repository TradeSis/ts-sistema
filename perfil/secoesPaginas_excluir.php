
<?php
include_once('../head.php');
include_once('../database/secaoPagina.php');

$secaoPagina = buscaSecaoPaginas($_GET['idSecaoPagina']);
/* echo json_encode($secaoPagina); */
?>


<body class="bg-transparent">

    <div class="container" style="margin-top:10px">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row">
                    <div class="col-sm">
                        <h3 class="col">Remover seção da pagina</h3>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="paginas.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/secaoPagina.php?operacao=excluir" method="post" enctype="multipart/form-data">
             
   

                    <div class="row">
                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -40px;">Seção</label>
                                <input type="text" name="tituloSecao" class="form-control" value="<?php echo $secaoPagina ['tituloSecao'] ?>" >
                                <input type="text" class="form-control" name="idSecaoPagina" value="<?php echo $secaoPagina ['idSecaoPagina'] ?>" style="display: none">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent" style="text-align:right">

                        <button type="submit" class="btn btn-sm btn-warning">Remover</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




</body>

</html>
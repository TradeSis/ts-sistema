
<?php

include_once('../head.php');
include_once('../database/paginas.php');

$pagina = buscaPaginas($_GET['idPagina']);
/* echo json_encode($pagina); */
?>



<body class="bg-transparent">

    <div class="container" style="margin-top:10px">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row">
                    <div class="col-sm">
                        <h3 class="col">Paginas</h3>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="paginas.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/paginas.php?operacao=alterar" method="post" >

                    <div class="row">
                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -40px;">Slug</label>
                                <input type="text" name="slug" class="form-control" value="<?php echo $pagina ['slug'] ?>" disabled>
                                <input type="text" class="form-control" name="idPagina" value="<?php echo $pagina ['idPagina'] ?>" style="display: none">
                            </div>
                        </div>
                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -40px;">Titulo</label>
                                <input type="text" name="tituloPagina" class="form-control" value="<?php echo $pagina ['tituloPagina'] ?>" >
                            </div>
                        </div>
                        
                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -40px;">Arquivo Fonte</label>
                                <input type="text" name="arquivoFonte" class="form-control" value="<?php echo $pagina ['arquivoFonte'] ?>" >
                            </div>
                        </div>

                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -40px;">Arquivo Single</label>
                                <input type="text" name="arquivoSingle" class="form-control" value="<?php echo $pagina ['arquivoSingle'] ?>" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -40px;">Conteúdo</label>
                                <textarea name="conteudoHTML" id="" cols="120" rows="5"><?php echo $pagina ['conteudoHTML'] ?></textarea>
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
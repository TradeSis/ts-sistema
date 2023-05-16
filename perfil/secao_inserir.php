
<?php
include_once('../head.php');
?>



<body class="bg-transparent">

    <div class="container" style="margin-top:10px">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row">
                    <div class="col-sm">
                        <h3 class="col">Seções</h3>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="secao.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/secao.php?operacao=inserir" method="post"> 

                    <div class="row">
                       
                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Titulo</label>
                                <input type="text" name="tituloSecao" class="form-control" required autocomplete="off" >
                            </div>
                        </div>
                       
                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Arquivo Fonte</label>
                                <input type="text" name="arquivoFonte" class="form-control" required autocomplete="off" >
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
<?php
// Lucas 06102023 padrao novo
// helio 01022023 altereado para include_once
// helio 26012023 16:16
include_once('../header.php');
?>
<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>

<body>

    <div class="container-fluid">

        <div class="row">
            <BR> <!-- MENSAGENS/ALERTAS -->
        </div>
        <div class="row">
            <BR> <!-- BOTOES AUXILIARES -->
        </div>
        <div class="row"> <!-- LINHA SUPERIOR A TABLE -->
            <div class="col-3" style="text-align:left">
                <!-- TITULO -->
                <h2 class="tituloTabela">Inserir Empresa</h2>
            </div>
            <div class="col-7">
                <!-- FILTROS -->
            </div>

            <div class="col-2" style="text-align: end;">
                <a href="/sistema/configuracao/empresa.php" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

        <form action="../database/empresa.php?operacao=inserir" method="post">
            <div class="row">
                <div class="col-md-10 form-group">
                    <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome da Empresa</label>
                    <div class="for-group">
                        <input type="text" class="form-control" name="nomeEmpresa" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md form-group">
                    <label class='control-label' for='inputNormal' style="margin-top: -20px;">Tempo Sessão</label>
                    <div class="for-group">
                        <input type="number" min="1" placeholder="1" class="form-control" name="timeSessao" autocomplete="off" required>
                    </div>
                </div>
            </div>

            <div style="text-align:right; margin-top:20px">
                <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Cadastrar</button>
            </div>
        </form>

    </div>

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script>
        $('input').bind('input', function() {
            var c = this.selectionStart,
                r = /[^a-z0-9 .]/gi,
                v = $(this).val();
            if (r.test(v)) {
                $(this).val(v.replace(r, ''));
                c--;
            }
            this.setSelectionRange(c, c);
        });
    </script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
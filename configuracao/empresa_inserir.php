<?php
// helio 01022023 altereado para include_once
// helio 26012023 16:16

include_once('../head.php');
?>


<body class="bg-transparent">

    <div class="container" style="margin-top:10px">


        <div class="col-sm mt-4" style="text-align:right">
            <a href="../configuracao/?tab=configuracao&stab=empresa" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
        </div>
        <div class="col-sm">
            <spam class="col titulo">Inserir Empresa</spam>
        </div>
        
        <div class="container" style="margin-top: 30px">
            <form action="../database/empresa.php?operacao=inserir" method="post">
                <div class="row">
                    <div class="col-md-10 form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome da Empresa</label>
                        <div class="for-group">
                            <input type="text" class="form-control" name="nomeEmpresa" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-sm mt-1">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Tempo Sessão</label>
                            <select class="form-control" style="padding-right: 50px;" name="timeSessao">
                                <option value="1">1 hora</option>
                                <option value="2">2 horas</option>
                                <option value="3">3 horas</option>
                                <option value="4">4 horas</option>
                                <option value="5">5 horas</option>
                                <option value="6">6 horas</option>
                                <option value="7">7 horas</option>
                                <option value="8">8 horas</option>
                            </select>
                        </div>
                    </div>
                 </div>
                <div style="text-align:right">

                    <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Cadastrar</button>
                </div>
            </form>
        </div>

    </div>

    </body>

    <script>
        $('input').bind('input', function() {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if(r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
        });
    </script>
</html>
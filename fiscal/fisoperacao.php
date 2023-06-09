<?php
// gabriel 060623 15:06

include_once('../head.php');
include_once('../database/fisoperacao.php');
include_once('../database/fisatividade.php');
include_once('../database/fisnatureza.php');
include_once('../database/fisprocesso.php');

$atividades = buscaAtividade();
$processos = buscaProcesso();
$naturezas = buscaNatureza();
$operacoes = buscaOperacao();

?>

<style>
    ul {
        list-style-type: none;
    }
</style>

<body class="bg-transparent">

    <nav id="menuFiltros" class="menuFiltros" style="width:165px;margin-left:15px;margin-top:-89px">
        <div class="titulo"><span>Filtrar por:</span></div>
        <ul>
            <li class="ls-label col-sm-12">
                <form class="d-flex" action="" method="post" style="text-align: right; margin-right:5px">
                    <select class="form-control fonteSelect" name="idAtividade" id="FiltroAtividade"
                        style="font-size: 14px; width: 130px; height: 35px">
                        <option value="<?php echo null ?>"><?php echo " Atividade" ?></option>
                        <?php
                        foreach ($atividades as $atividade) {
                            ?>
                            <option value="<?php echo $atividade['idAtividade'] ?>"><?php echo $atividade['nomeAtividade'] ?></option>
                        <?php } ?>
                    </select>
                </form>
            </li>

            <li class="ls-label col-sm-12">
                <form class="d-flex" action="" method="post" style="text-align: right;">
                    <select class="form-control" name="idProcesso" id="FiltroProcesso"
                        style="font-size: 14px; width: 130px; height: 35px">
                        <option value="<?php echo null ?>"><?php echo " Processo" ?></option>
                        <?php
                        foreach ($processos as $processo) {
                            ?>
                            <option value="<?php echo $processo['idProcesso'] ?>"><?php echo $processo['nomeProcesso'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </form>
            </li>

            <li class="ls-label col-sm-12">
                <form class="d-flex" action="" method="post" style="text-align: right;">
                    <select class="form-control" name="idNatureza" id="FiltroNatureza"
                        style="font-size: 14px; width: 130px; height: 35px">
                        <option value="<?php echo null ?>"><?php echo " Natureza" ?></option>
                        <?php
                        foreach ($naturezas as $natureza) {
                            ?>
                            <option value="<?php echo $natureza['idNatureza'] ?>"><?php echo $natureza['nomeNatureza'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </form>
            </li>
        </ul>

        <div class="col-sm" style="text-align:right;color: #fff;margin-bottom:167px">
            <a onClick="limpar()" role=" button" class="btn btn-sm" style="background-color:#84bfc3; ">Limpar</a>
        </div>
    </nav>


    <div class="container-fluid text-center mt-4">

        <div class="row">
            <div class=" btnAbre">
                <span style="font-size: 25px" class="material-symbols-outlined">
                    filter_alt
                </span>

            </div>

            <div class="col-sm-3 ml-2">
                <p class="tituloTabela">Operações Fiscais</p>
            </div>

            <div class="col-sm" style="text-align:right">
                <a href="fisoperacao_inserir.php" role="button" class="btn btn-success">Adicionar Operação</a>
            </div>
        </div>

        <div class="card mt-2">
            <div class="table table-sm table-hover table-striped table-wrapper-scroll-y my-custom-scrollbar diviFrame">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Operação</th>
                            <th class="text-center">Atividade</th>
                            <th class="text-center">Processo</th>
                            <th class="text-center">Natureza</th>
                            <th class="text-center">idGrupoOper</th>
                            <th class="text-center">idEntSai</th>
                            <th class="text-center">xfop</th>
                            <th class="text-center">Ação</th>
                        </tr>
                    </thead>

                    <tbody id='dados' class="fonteCorpo">

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>

        buscar($("#FiltroAtividade").val(), $("#FiltroProcesso").val(), $("#FiltroNatureza").val());

        function limpar() {
            buscar(null, null, null);
            window.location.reload();
        }

        function buscar(idAtividade, idProcesso, idNatureza) {

            $.ajax({

                type: 'POST',
                dataType: 'html',
                url: '../database/fisoperacao.php?operacao=filtrar',
                beforeSend: function () {
                    $("#dados").html("Carregando...");
                },
                data: {
                    idAtividade: idAtividade,
                    idProcesso: idProcesso,
                    idNatureza: idNatureza

                },

                success: function (msg) {
                    var json = JSON.parse(msg);

                    var linha = "";
                    for (var $i = 0; $i < json.length; $i++) {
                        var object = json[$i];

                        linha = linha + "<TR>";
                        linha = linha + "<TD>" + object.nomeOperacao + "</TD>";
                        linha = linha + "<TD>" + object.nomeAtividade + "</TD>";
                        linha = linha + "<TD>" + object.nomeProcesso + "</TD>";
                        linha = linha + "<TD>" + object.nomeNatureza + "</TD>";
                        linha = linha + "<TD>" + object.idGrupoOper + "</TD>";
                        linha = linha + "<TD>" + object.idEntSai + "</TD>";
                        linha = linha + "<TD>" + object.xfop + "</TD>";
                        linha = linha + "<TD>" + "<a class='btn btn-primary btn-sm' href='fisoperacao_alterar.php?idOperacao=" + object.idOperacao + "' role='button'><i class='bi bi-pencil-square'></i></i></a>" + "</TD>";
                        linha = linha + "</TR>";
                    }

                    $("#dados").html(linha);


                }
            });
        }


        $("#FiltroAtividade").change(function () {
            buscar($("#FiltroAtividade").val(), $("#FiltroProcesso").val(), $("#FiltroNatureza").val());
        })

        $("#FiltroProcesso").change(function () {
            buscar($("#FiltroAtividade").val(), $("#FiltroProcesso").val(), $("#FiltroNatureza").val());
        })

        $("#FiltroNatureza").change(function () {
            buscar($("#FiltroAtividade").val(), $("#FiltroProcesso").val(), $("#FiltroNatureza").val());
        })


        document.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                buscar($("#FiltroAtividade").val(), $("#FiltroProcesso").val(), $("#FiltroNatureza").val());
            }
        });

        $('.btnAbre').click(function () {
            $('.menuFiltros').toggleClass('mostra');
            $('.diviFrame').toggleClass('mostra');
        });
    </script>

</body>

</html>
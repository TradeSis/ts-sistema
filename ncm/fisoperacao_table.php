<?php

include_once('../head.php');
include_once('../database/fisoperacao.php');
include_once('../database/fisatividade.php');
include_once('../database/fisnatureza.php');
include_once('../database/fisprocesso.php');

$atividades = buscaAtividade();
$processos = buscaProcesso();
$naturezas = buscaNatureza();
$operacoes = buscaOperacao();

$filtroEntrada = null;
$dadosOp = null;
$FiltroTipoOp = null;
$idAtividade = null;
$idProcesso = null;
$idNatureza = null;


if (isset($_SESSION['filtro_operacao'])) {
    $filtroEntrada = $_SESSION['filtro_operacao'];
    $FiltroTipoOp = $filtroEntrada['FiltroTipoOp'];
    $dadosOp = $filtroEntrada['dadosOp'];
    $idAtividade = $filtroEntrada['idAtividade'];
    $idProcesso = $filtroEntrada['idProcesso'];
    $idNatureza = $filtroEntrada['idNatureza'];
}

?>

<body class="bg-transparent">


    <div class="container-fluid">
        <div class="mt-3">
            <div class="card mt-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="ncm_table.php">NCM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="cest_table.php">Cest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="color:blue" href="#">Operação</a>
                    </li>
                </ul>

                <div class="row justify-content-center">
                    <div class="col-sm-2">
                        <form class="d-flex" action="" method="post" style="text-align: right;">
                            <select class="form-control" name="FiltroTipoOp" id="FiltroTipoOp">
                                <option <?php if ($FiltroTipoOp == "nomeOperacao") {
                                    echo "selected";
                                } ?>
                                    value="nomeOperacao">Nome</option>
                                <option <?php if ($FiltroTipoOp == "idEntSai") {
                                    echo "selected";
                                } ?> value="idEntSai">
                                    idEntSai</option>
                                <option <?php if ($FiltroTipoOp == "xfop") {
                                    echo "selected";
                                } ?> value="xfop">xfop
                                </option>
                            </select>
                        </form>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-group">
                            <?php if (!empty($dadosOp)) { ?>
                                <input type="text" class="form-control" id="dadosOp" value="<?php echo $dadosOp ?>">
                            <?php } else { ?>
                                <input type="text" class="form-control" id="dadosOp" placeholder="Operação">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <button class="btn btn-primary w-50 mt-3" id="buscar" type="button">Pesquisar</button>
                    </div>
                    <div class="col-sm-3" style="margin-left:-100px;">
                        <button class="btn btn-warning w-50 mt-3" id="export" name="export" type="submit">Gerar CSV</button>
                    </div>
                </div>

                <div
                    class="table table-sm table-hover table-striped table-bordered table-wrapper-scroll-y my-custom-scrollbar diviFrame mt-2">
                    <table class="table" id="myIframe">
                        <thead class="thead-light">

                            <tr>
                                <th class="text-center">Operação</th>
                                <th class="text-center">
                                    <form action="" method="post">
                                        <select class="form-control fonteSelect text-center" name="idAtividade"
                                            id="FiltroAtividade" style="font-size: 16px; font-weight: bold; margin-top:-10px; margin-bottom:-6px;">
                                            <option value="<?php echo null ?>"><?php echo " Atividade" ?></option>
                                            <?php
                                            foreach ($atividades as $atividade) {
                                                ?>
                                                <option <?php
                                                if ($atividade['idAtividade'] == $idAtividade) {
                                                    echo "selected";
                                                }
                                                ?> value="<?php echo $atividade['idAtividade'] ?>"><?php echo $atividade['nomeAtividade'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </form>
                                </th>
                                <th class="text-center">
                                    <form action="" method="post">
                                        <select class="form-control text-center" name="idProcesso" id="FiltroProcesso"
                                            style="font-size: 16px; font-weight: bold; margin-top:-10px; margin-bottom:-6px;">
                                            <option value="<?php echo null ?>"><?php echo " Processo" ?></option>
                                            <?php
                                            foreach ($processos as $processo) {
                                                ?>
                                                <option <?php
                                                if ($processo['idProcesso'] == $idProcesso) {
                                                    echo "selected";
                                                }
                                                ?> value="<?php echo $processo['idProcesso'] ?>"><?php echo $processo['nomeProcesso'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </form>
                                </th>
                                <th class="text-center">
                                    <form action="" method="post">
                                        <select class="form-control text-center" name="idNatureza" id="FiltroNatureza"
                                            style="font-size: 16px; font-weight: bold; margin-top:-10px; margin-bottom:-6px;">
                                            <option value="<?php echo null ?>"><?php echo " Natureza" ?></option>
                                            <?php
                                            foreach ($naturezas as $natureza) {
                                                ?>
                                                <option <?php
                                                if ($natureza['idNatureza'] == $idNatureza) {
                                                    echo "selected";
                                                }
                                                ?> value="<?php echo $natureza['idNatureza'] ?>"><?php echo $natureza['nomeNatureza'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </form>
                                </th>
                                <th class="text-center">idGrupoOper</th>
                                <th class="text-center">idEntSai</th>
                                <th class="text-center">xfop</th>
                            </tr>
                        </thead>

                        <tbody id='dados' class="fonteCorpo">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <script>
            buscar($("#FiltroTipoOp").val(), $("#dadosOp").val(), $("#FiltroAtividade").val(), $("#FiltroProcesso").val(), $("#FiltroNatureza").val());

            function limpar() {
                buscar(null, null, null, null, null);
                window.location.reload();
            }

            function buscar(FiltroTipoOp, dadosOp, idAtividade, idProcesso, idNatureza) {
                $.ajax({
                    type: 'POST',
                    dataType: 'html',
                    url: '../database/fisoperacao.php?operacao=filtrar',
                    beforeSend: function () {
                        $("#dados").html("Carregando...");
                    },
                    data: {
                        FiltroTipoOp: FiltroTipoOp,
                        dadosOp: dadosOp,
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
                            linha = linha + "</TR>";
                        }

                        $("#dados").html(linha);
                    },
                    error: function (e) {
                        alert('Erro: ' + JSON.stringify(e));
                    }
                });
            }

            $("#FiltroAtividade").change(function () {
                buscar($("#FiltroTipoOp").val(), $("#dadosOp").val(), $("#FiltroAtividade").val(), $("#FiltroProcesso").val(), $("#FiltroNatureza").val());
            })

            $("#FiltroProcesso").change(function () {
                buscar($("#FiltroTipoOp").val(), $("#dadosOp").val(), $("#FiltroAtividade").val(), $("#FiltroProcesso").val(), $("#FiltroNatureza").val());
            })

            $("#FiltroNatureza").change(function () {
                buscar($("#FiltroTipoOp").val(), $("#dadosOp").val(), $("#FiltroAtividade").val(), $("#FiltroProcesso").val(), $("#FiltroNatureza").val());
            })

            $(document).ready(function () {
                $("#buscar").click(function () {
                    buscar($("#FiltroTipoOp").val(), $("#dadosOp").val(), $("#FiltroAtividade").val(), $("#FiltroProcesso").val(), $("#FiltroNatureza").val());
                });

                $(document).keypress(function (e) {
                    if (e.key === "Enter") {
                        buscar($("#FiltroTipoOp").val(), $("#dadosOp").val(), $("#FiltroAtividade").val(), $("#FiltroProcesso").val(), $("#FiltroNatureza").val());
                    }
                });
            });

            function exportToCSV() {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '../database/fisoperacao.php?operacao=filtrar',
                    data: {
                        FiltroTipoOp: $("#FiltroTipoOp").val(),
                        dadosOp: $("#dadosOp").val(),
                        idAtividade: $("#FiltroAtividade").val(),
                        idProcesso: $("#FiltroProcesso").val(),
                        idNatureza: $("#FiltroNatureza").val()
                    },
                    success: function (json) {
                        var csvContent = "data:text/csv;charset=utf-8,\uFEFF"; 
                        csvContent += "NomeOperacao,NomeAtividade,NomeProcesso,NomeNatureza,IdGrupoOper,IdEntSai,XFOP\n";

                        for (var i = 0; i < json.length; i++) {
                            var object = json[i];
                            csvContent += object.nomeOperacao + "," +
                                object.nomeAtividade + "," +
                                object.nomeProcesso + "," +
                                object.nomeNatureza + "," +
                                object.idGrupoOper + "," +
                                object.idEntSai + "," +
                                object.xfop + "\n";
                        }

                        var encodedUri = encodeURI(csvContent);
                        var link = document.createElement("a");
                        link.setAttribute("href", encodedUri);
                        link.setAttribute("download", "data.csv");
                        document.body.appendChild(link);

                        link.click();

                        document.body.removeChild(link);
                    },
                    error: function (e) {
                        alert('Erro: ' + JSON.stringify(e));
                    }
                });
            }

            $("#export").click(function () {
                exportToCSV();
            });

        </script>


</body>

</html>
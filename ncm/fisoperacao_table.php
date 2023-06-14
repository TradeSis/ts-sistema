<?php

include_once '../head.php';
include_once '../database/ncm.php';

$filtroEntrada = null;
$dadosOp = null;
$FiltroTipoOp = null;


if (isset($_SESSION['filtro_operacao_table'])) {
    $filtroEntrada = $_SESSION['filtro_operacao_table'];
    $FiltroTipoOp = $filtroEntrada['FiltroTipoOp'];
    $dadosOp = $filtroEntrada['dadosOp'];
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
                                <option <?php if ($FiltroTipoOp == "nomeOperacao") { echo "selected"; } ?> value="nomeOperacao">Nome</option>
                                <option <?php if ($FiltroTipoOp == "idEntSai") { echo "selected"; } ?> value="idEntSai">idEntSai</option>
                                <option <?php if ($FiltroTipoOp == "xfop") { echo "selected"; } ?> value="xfop">xfop</option>
                            </select>
                        </form>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-group">
                            <?php if (!empty($dadosOp)){ ?>
                                <input type="text" class="form-control" id="dadosOp" value="<?php echo $dadosOp ?>">
                            <?php } else { ?>
                                <input type="text" class="form-control" id="dadosOp" placeholder="Operação">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <button class="btn btn-primary w-50 mt-3" id="buscar" type="button">Pesquisar</button>
                    </div>
                </div>

                <div
                    class="table table-sm table-hover table-striped table-bordered table-wrapper-scroll-y my-custom-scrollbar diviFrame mt-2">
                    <table class="table" id="myIframe">
                        <thead class="thead-light">

                        <tr>
                            <th class="text-center">Operação</th>
                            <th class="text-center">Atividade</th>
                            <th class="text-center">Processo</th>
                            <th class="text-center">Natureza</th>
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
        buscar($("#FiltroTipoOp").val(), $("#dadosOp").val());

        function limpar() {
            buscar(null, null);
            window.location.reload();
        }

        function buscar(FiltroTipoOp, dadosOp) {
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '../database/fisoperacao.php?operacao=filtrar_table',
                beforeSend: function () {
                    $("#dados").html("Carregando...");
                },
                data: {
                    FiltroTipoOp: FiltroTipoOp,
                    dadosOp: dadosOp
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

        $(document).ready(function () {
            $("#buscar").click(function () {
                if ($("#dadosOp").val() === "") {
                    alert("Campo Codigo vazio!");
                } else {
                    buscar($("#FiltroTipoOp").val(), $("#dadosOp").val());
                }
            });

            $(document).keypress(function (e) {
                if (e.key === "Enter") {
                    buscar($("#FiltroTipoOp").val(), $("#dadosOp").val());
                }
            });
        });
    </script>


</body>

</html>
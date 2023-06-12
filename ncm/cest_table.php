<?php

include_once '../head.php';
include_once '../database/ncm.php';

$codigoNcm = null;

if (isset($_GET['codigoNcm'])) {
    $codigoNcm = $_GET['codigoNcm'];
}


?>

<body class="bg-transparent">


    <div class="container-fluid">
        <div class="mt-3">
            <div class="card mt-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="ncm_table.php">Tabela NCM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="color:blue" href="#">Tabela Cest</a>
                    </li>
                </ul>

                <div class="row justify-content-center">
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="nomeCest" placeholder="Nome">
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="input-group">
                            <input type="text" class="form-control" id="codigoCest" placeholder="Código Cest">
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="input-group">
                            <?php if (isset($_GET['codigoNcm'])) { ?>
                                <input type="text" class="form-control" id="codigoNcm" placeholder="Código Ncm"
                                    value="<?php echo $_GET['codigoNcm']; ?>">
                            <?php } else { ?>
                                <input type="text" class="form-control" id="codigoNcm" placeholder="Código Ncm">
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
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Cest</th>
                                <th>superior</th>
                                <th>ncm</th>
                            </tr>
                        </thead>
                        <tbody id='dados' class="fonteCorpo">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        <?php if (isset($_GET['codigoNcm'])) { ?>
            buscar($("#nomeCest").val(), $("#codigoCest").val(), $("#codigoNcm").val());
        <?php } ?>

        function limpar() {
            buscar(null, null, null);
            window.location.reload();
        }

        function buscar(nomeCest, codigoCest, codigoNcm) {
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '../database/cest.php?operacao=filtrar',
                beforeSend: function () {
                    $("#dados").html("Carregando...");
                },
                data: {
                    nomeCest: nomeCest,
                    codigoCest: codigoCest,
                    codigoNcm: codigoNcm
                },
                success: function (msg) {
                    var json = JSON.parse(msg);

                    var linha = "";
                    for (var i = 0; i < json.length; i++) {
                        var object = json[i];

                        linha += "<tr>";
                        linha += "<td>" + object.codigoCest + "</td>";
                        linha += "<td>" + object.nomeCest + "</td>";
                        linha += "<td>" + object.cest + "</td>";
                        linha += "<td>" + object.superior + "</td>";
                        linha += "<td>" + object.codigoNcm + "</td>";
                        linha += "</tr>";
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
                if ($("#nomeCest").val() === "" && $("#codigoCest").val() === "" && $("#codigoNcm").val() === "") {
                    alert("Preencher o campo de Descrição ou Codigo!");
                } else {
                    buscar($("#nomeCest").val(), $("#codigoCest").val(), $("#codigoNcm").val());
                }
            });

            $(document).keypress(function (e) {
                if (e.key === "Enter") {
                    buscar($("#nomeCest").val(), $("#codigoCest").val(), $("#codigoNcm").val());
                }
            });
        });
    </script>

    <style>
        .bold-row {
            font-weight: bold;
        }
    </style>


</body>

</html>
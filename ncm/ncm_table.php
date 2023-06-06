<?php

include_once '../head.php';
include_once '../database/ncm.php';

?>
<link href="https://cdn.jsdelivr.net/npm/jquery-treegrid@0.3.0/css/jquery.treegrid.css" rel="stylesheet">
<link href="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/jquery-treegrid@0.3.0/js/jquery.treegrid.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/treegrid/bootstrap-table-treegrid.min.js"></script>

<body class="bg-transparent">


    <div class="container-flex text-center pt-2 mt-3" style="width: 90vw;">

        <div class="row" style="margin-left: 10vw">
            <div class="col-sm-3 ml-2">

            </div>

            <div class="col-sm-4 ml-4">
                <div class="input-group">
                    <input type="text" class="form-control" id="Descricao" placeholder="Descricao">
                </div>

                <div class="input-group">
                    <input type="text" class="form-control" id="Codigo" placeholder="Codigo">
                </div>

                <div class="col-sm">

                    <button class="btn btn-primary w-50 mt-3" id="buscar" type="button">Pesquisar</button>

                </div>
            </div>

        </div>

        <div class="" style="margin-left: 10vw; text-align:left">
            <label class="tituloTabela pl-4">NCM</label>
        </div>
        <div class="card mt-2" style="margin-left: 10vw; text-align:left">
            <div class="table table-sm table-hover table-striped table-wrapper-scroll-y my-custom-scrollbar diviFrame">

                <table id="table"></table>
            </div>
        </div>

        <div class="card mt-2" style="margin-left: 10vw; text-align:left">
            <div class="table table-sm table-hover table-striped table-wrapper-scroll-y my-custom-scrollbar diviFrame">

                <table class="table" id="myIframe">
                    <thead class="thead-light">

                        <tr>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Superior</th>
                            <th>nivel</th>
                            <th>ultimo nivel</th>
                        </tr>
                    </thead>
                    <tbody id='dados' class="fonteCorpo">

                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <script>

        function limpar() {
            buscar(null, null);
            window.location.reload();
        }

        function buscar(Descricao, Codigo) {


            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '../database/ncm.php?operacao=filtrar',
                beforeSend: function () {
                    $("#dados").html("Carregando...");
                },
                data: {
                    Descricao: Descricao,
                    Codigo: Codigo
                },


                success: function (msg) {
                    var json = JSON.parse(msg);
                    buscartable(json);


                    var linha = "";
                    for (var $i = 0; $i < json.length; $i++) {
                        var object = json[$i];


                        linha = linha + "<tr>";
                        linha = linha + "<td>" + object.Codigo + "</td>";
                        linha = linha + "<td>" + object.Descricao + "</td>";
                        linha = linha + "<td>" + object.superior + "</td>";
                        linha = linha + "<td>" + object.nivel + "</td>";
                        linha = linha + "<td>" + object.ultimonivel + "</td>";
                        linha = linha + "</tr>";
                    }

                    //alert(linha);
                    $("#dados").html(linha);

                },
                error: function (e) {
                    alert('Erro: ' + JSON.stringify(e));

                    return null;
                }
            });

        }

        $("#buscar").click(function () {
            if ($("#Descricao").val() == "" && $("#Codigo").val() == "") {
                alert("Preencher o campo de Descrição ou Codigo!")
            }
            else {
                buscar($("#Descricao").val(), $("#Codigo").val());

            }
        })

        document.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                buscar($("#Descricao").val(), $("#Codigo").val());
            }
        });

        $('.btnAbre').click(function () {
            $('.menuFiltros').toggleClass('mostra');
            $('.diviFrame').toggleClass('mostra');
        });
    </script>

    <script>
        var $table = $('#table')

        function buscartable(json) {
            var $table = $('#table')
        
            $table.bootstrapTable('load', json)
            
            $table.bootstrapTable({
                data: json,
                idField: 'Codigo',
                showColumns: true,
                columns: [
                    {
                        field: 'ck',
                        checkbox: true
                    },
                    {
                        field: 'Codigo',
                        title: 'Codigo',
                        width: '180px'
                    },
                    {
                        field: 'Descricao',
                        title: 'Descricao'
                    },
                    {
                        field: 'superior',
                        title: 'superior'
                    },
                    {
                        field: 'pesquisado',
                        title: 'pesquisado'
                    },
                    {
                        field: 'nivel',
                        title: 'nivel'
                    }
                ],
                treeShowField: 'Descricao',
                parentIdField: 'superior',
                onPostBody: function () {
                    var columns = $table.bootstrapTable('getOptions').columns

                    if (columns && columns[0][1].visible) {
                        $table.treegrid({
                            treeColumn: 1,
                            onChange: function () {
                                $table.bootstrapTable('resetView')
                            }
                        })
                    }
                }
            })
        }

        

        
    </script>

</body>

</html>
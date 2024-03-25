<?php
//Lucas 27122023 - id747 cadastros, alterado estrutura do programa
//Helio 05102023 padrao novo
//Lucas 04042023 criado
include_once(__DIR__ . '/../header.php');
include_once(ROOT . '/cadastros/database/marcas.php');
$marcas = buscaMarcas();
//echo json_encode($marcas);

?>
<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>

<body>
    <div class="container-fluid">

        <div class="row ">
            <!--<BR> MENSAGENS/ALERTAS -->
        </div>
        <div class="row">
            <!--<BR> BOTOES AUXILIARES -->
        </div>
        <div class="row d-flex align-items-center justify-content-center mt-1 pt-1 ">

            <div class="col-3 col-lg-3">
                <h2 class="ts-tituloPrincipal">Produtos</h2>
            </div>

            <div class="col-2 pt-2">
                <!-- FILTROS -->
                <form method="post">
                    <select class="form-select ts-input" name="filtroDataAtualizacao" id="filtroDataAtualizacao">
                        <option value="">Todos</option>
                        <option value="dataAtualizada">Atualizados</option>
                        <option value="dataNaoAtualizada">Nao Atualizados</option>
                    </select>
                </form>
            </div>

            <div class="col-1">
                <form id="form-atualizarProdutos" method="post">
                    <div class="col-md-3">
                        <input type="hidden" class="form-control ts-input" name="idGeralProduto" id="idGeralProduto" value="null">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-sm btn-warning">Atualizar</button>
                    </div>
                </form>
            </div>

            <div class="col-6 col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control ts-input" id="buscaProduto" placeholder="Buscar por nome ou eanProduto">
                    <button class="btn btn-primary rounded" type="button" id="buscar"><i class="bi bi-search"></i></button>
                    <button type="button" class="ms-4 btn btn-success" data-bs-toggle="modal" data-bs-target="#inserirPessoaModal"><i class="bi bi-plus-square"></i>&nbsp Novo</button>
                </div>
            </div>

        </div>

        <div class="table mt-2 ts-divTabela ts-tableFiltros text-center">
            <table class="table table-sm table-hover">
                <thead class="ts-headertabelafixo">
                    <tr class="ts-headerTabelaLinhaCima">
                        <th>ID</th>
                        <th>eanProduto</th>
                        <th>nomeProduto</th>
                        <th>Marca</th>
                        <th>Att Trib.</th>
                        <th>Imendes</th>
                        <th>Grupo</th>
                        <th>prodZFM</th>
                        <th colspan="2">Ação</th>
                    </tr>
                </thead>

                <tbody id='dados' class="fonteCorpo">

                </tbody>
            </table>
        </div>


        <!--------- INSERIR --------->
        <div class="modal fade bd-example-modal-lg" id="inserirPessoaModal" tabindex="-1" aria-labelledby="inserirPessoaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Inserir Produtos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="form-inserirProdutos">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label ts-label">eanProduto</label>
                                    <input type="text" class="form-control ts-input" name="eanProduto">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label ts-label">nomeProduto</label>
                                    <input type="text" class="form-control ts-input" name="nomeProduto">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">Marca</label>
                                    <select class="form-select ts-input" name="idMarca">
                                        <?php
                                        foreach ($marcas as $marca) {
                                        ?>
                                            <option value="<?php echo $marca['idMarca'] ?>"><?php echo $marca['nomeMarca']  ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md">
                                    <label class="form-label ts-label">dataAtualizacaoTributaria</label>
                                    <input type="datetime-local" class="form-control ts-input" name="dataAtualizacaoTributaria">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">codImendes</label>
                                    <input type="text" class="form-control ts-input" name="codImendes">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">idGrupo</label>
                                    <input type="text" class="form-control ts-input" name="idGrupo">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">prodZFM</label>
                                    <input type="text" class="form-control ts-input" name="prodZFM">
                                </div>
                            </div>
                    </div><!--body-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--------- ALTERAR --------->
        <div class="modal fade bd-example-modal-lg" id="alterarProdutoModal" tabindex="-1" aria-labelledby="alterarProdutoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alterar Produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <form method="post" id="form-alterarProdutos">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label ts-label">eanProduto</label>
                                    <input type="text" class="form-control ts-input" name="eanProduto" id="eanProduto">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label ts-label">nomeProduto</label>
                                    <input type="text" class="form-control ts-input" name="nomeProduto" id="nomeProduto">
                                    <input type="hidden" class="form-control ts-input" name="idGeralProduto" id="idGeralProduto">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">Marca</label>
                                    <select class="form-select ts-input" name="idMarca" id="idMarca">
                                        <?php
                                        foreach ($marcas as $marca) {
                                        ?>
                                            <option value="<?php echo $marca['idMarca'] ?>"><?php echo $marca['nomeMarca']  ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md">
                                    <label class="form-label ts-label">dataAtualizacaoTributaria</label>
                                    <input type="datetime-local" class="form-control ts-input" name="dataAtualizacaoTributaria" id="dataAtualizacaoTributaria">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">codImendes</label>
                                    <input type="text" class="form-control ts-input" name="codImendes" id="codImendes">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">codigoGrupo</label>
                                    <input type="text" class="form-control ts-input" name="codigoGrupo" id="codigoGrupo">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">prodZFM</label>
                                    <input type="text" class="form-control ts-input" name="prodZFM" id="prodZFM">
                                </div>
                            </div>
                    </div><!--body-->
                    <div class="modal-footer">
                        <div class="col align-self-start pl-0">
                            <button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#atualizaProdutoModal' data-id="idProdutoAtualiza">Atualizar fiscal</button>
                        </div>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div><!--container-fluid-->

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script>
        buscar($("#buscaProduto").val(), $("#filtroDataAtualizacao").val());

        function buscar(buscaProduto, filtroDataAtualizacao) {
            //alert(filtroDataAtualizacao)
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '<?php echo URLROOT ?>/sistema/database/geral.php?operacao=buscarGeralProduto',
                beforeSend: function() {
                    $("#dados").html("Carregando...");
                },
                data: {
                    filtroDataAtualizacao: filtroDataAtualizacao,
                    buscaProduto: buscaProduto
                },
                success: function(msg) {
                    //alert("segundo alert: " + msg);
                    var json = JSON.parse(msg);

                    var linha = "";
                    for (var $i = 0; $i < json.length; $i++) {
                        var object = json[$i];

                        linha = linha + "<tr>";
                        linha = linha + "<td>" + (object.idGeralProduto ? object.idGeralProduto : "--") + "</td>";
                        linha = linha + "<td>" + (object.eanProduto ? object.eanProduto : "--") + "</td>";
                        linha = linha + "<td>" + (object.nomeProduto ? object.nomeProduto : "--") + "</td>";
                        linha = linha + "<td>" + (object.idMarca ? object.idMarca : "--") + "</td>";
                        linha = linha + "<td>" + (object.dataAtualizacaoTributaria ? formatarData(object.dataAtualizacaoTributaria) : "--") + "</td>";
                        linha = linha + "<td>" + (object.codImendes ? object.codImendes : "--") + "</td>";
                        linha = linha + "<td>" + (object.idGrupo ? object.idGrupo : "--") + "</td>";
                        linha = linha + "<td>" + (object.prodZFM ? object.prodZFM : "--") + "</td>";

                        linha = linha + "<td>" + "<button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#alterarProdutoModal' data-idGeralProduto='" + object.idGeralProduto + "'><i class='bi bi-pencil-square'></i></button> "
                        linha = linha + "</tr>";
                    }
                    $("#dados").html(linha);
                }
            });
        }

        function formatarData(data) {
            var d = new Date(data);
            var dia = d.getDate().toString().padStart(2, '0');
            var mes = (d.getMonth() + 1).toString().padStart(2, '0');
            var ano = d.getFullYear();
            var hora = d.getHours().toString().padStart(2, '0');
            var minutos = d.getMinutes().toString().padStart(2, '0');
            return dia + '/' + mes + '/' + ano + ' ' + hora + ':' + minutos;
        }

        $("#buscar").click(function() {
            buscar($("#buscaProduto").val(), $("#filtroDataAtualizacao").val());
        })

        $("#filtroDataAtualizacao").change(function() {
            buscar($("#buscaProduto").val(), $("#filtroDataAtualizacao").val());
        })

        document.addEventListener("keypress", function(e) {
            if (e.key === "Enter") {
                buscar($("#buscaProduto").val(), $("#filtroDataAtualizacao").val());
            }
        });

        $(document).on('click', 'button[data-bs-target="#atualizaProdutoModal"]', function() {

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '../database/geral.php?operacao=atualizar',
                data: {
                    idGeralProduto: idProdutoAtualiza
                }
            });
            window.location.reload();

        });


        $(document).on('click', 'button[data-bs-target="#alterarProdutoModal"]', function() {
            var idGeralProduto = $(this).attr("data-idGeralProduto");
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '../database/geral.php?operacao=buscarGeralProduto',
                data: {
                    idGeralProduto: idGeralProduto
                },
                success: function(data) {
                    console.log(JSON.stringify(data, null, 2));
                    $('#idGeralProduto').val(data.idGeralProduto);
                    idProdutoAtualiza = data.idGeralProduto;
                    $('#eanProduto').val(data.eanProduto);
                    $('#nomeProduto').val(data.nomeProduto);
                    $('#idMarca').val(data.idMarca);
                    $('#dataAtualizacaoTributaria').val(data.dataAtualizacaoTributaria);
                    $('#codImendes').val(data.codImendes);
                    $('#codigoGrupo').val(data.codigoGrupo);
                    $('#prodZFM').val(data.prodZFM);

                    $('#alterarProdutoModal').modal('show');
                }

            });
        });

        $(document).ready(function() {
            $("#form-inserirProdutos").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/geral.php?operacao=geralProdutosInserir",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: refreshPage,
                });
            });

            $("#form-alterarProdutos").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/geral.php?operacao=geralProdutosAlterar",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: refreshPage,
                });
            });

            $("#form-atualizarProdutos").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/geral.php?operacao=atualizar",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: refreshPage,
                });
            });

        });

        function refreshPage() {
            window.location.reload();
        }
    </script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
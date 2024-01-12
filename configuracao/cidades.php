<?php
// lucas 2612023 criado
include_once(__DIR__ . '/../header.php');
?>
<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>

<body>
    <div class="container-fluid">

        <div class="row ">
            <BR><!-- MENSAGENS/ALERTAS -->
        </div>
        <div class="row">
            <BR><!-- BOTOES AUXILIARES -->
        </div>
        <div class="row d-flex align-items-center justify-content-center mt-1 pt-1 ">

            <div class="col-6 col-lg-6">
                <h2 class="ts-tituloPrincipal">Cidades</h2>
            </div>
       
            <div class="col-6 col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control ts-input" id="buscaCidade" placeholder="Buscar por código, nome ou estado">
                    <button class="btn btn-primary rounded" type="button" id="buscar"><i class="bi bi-search"></i></button>
                    <button type="button" class="ms-4 btn btn-success" data-bs-toggle="modal" data-bs-target="#inserirCidades"><i class="bi bi-plus-square"></i>&nbsp Novo</button>
                </div>
            </div>

        </div>

        <div class="table mt-2 ts-divTabela ts-tableFiltros">
            <table class="table table-sm table-hover">
                <thead class="ts-headertabelafixo">
                    <tr>
                        <th>codigoCidade</th>
                        <th>nomeCidade</th>
                        <th>codigoEstado</th>
                    </tr>
                </thead>

                <tbody id='dados' class="fonteCorpo">

                </tbody>
            </table>
        </div>


        <!--------- INSERIR --------->
        <div class="modal fade bd-example-modal-lg" id="inserirCidades" tabindex="-1" aria-labelledby="inserirCidadesLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Inserir Cidade</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="form-inserirCidades">
                            <div class="row mt-4">
                                <div class="col-md-3">
                                    <label class='form-label ts-label'>codigoCidade</label>
                                    <input type="text" class="form-control ts-input" name="codigoCidade" autocomplete="off" required>
                                </div>
                                <div class="col-md-6">
                                    <label class='form-label ts-label'>nomeCidade</label>
                                    <input type="text" class="form-control ts-input" name="nomeCidade" autocomplete="off" required>
                                </div>
                                <div class="col-md-3">
                                    <label class='form-label ts-label'>codigoEstado</label>
                                    <input type="text" class="form-control ts-input" name="codigoEstado" autocomplete="off" required>
                                </div>

                            </div>
                    </div>
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div><!--container-fluid-->

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script>
        buscar($("#buscaCidade").val());

        function limpar() {
            buscar(null, null, null, null);
            window.location.reload();
        }

        function buscar(buscaCidade) {
            //alert (buscaCidade);
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '<?php echo URLROOT ?>/sistema/database/cidades.php?operacao=filtrar',
                beforeSend: function() {
                    $("#dados").html("Carregando...");
                },
                data: {
                    buscaCidade: buscaCidade
                },
                success: function(msg) {
                    //alert("segundo alert: " + msg);
                    var json = JSON.parse(msg);

                    var linha = "";
                    for (var $i = 0; $i < json.length; $i++) {
                        var object = json[$i];


                        linha = linha + "<tr>";
                        linha = linha + "<td>" + object.codigoCidade + "</td>";
                        linha = linha + "<td>" + object.nomeCidade + "</td>";
                        linha = linha + "<td>" + object.codigoEstado + "</td>";

                        linha = linha + "</tr>";
                    }
                    $("#dados").html(linha);
                }
            });
        }

        $("#buscar").click(function() {
            buscar($("#buscaCidade").val());
        })

        document.addEventListener("keypress", function(e) {
            if (e.key === "Enter") {
                buscar($("#buscaCidade").val());
            }
        });

        $(document).ready(function() {
            $("#form-inserirCidades").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/cidades.php?operacao=inserir",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: refreshPage,
                });
            });

            function refreshPage() {
                window.location.reload();
            }
        });

    </script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
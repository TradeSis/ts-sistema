<?php
// lucas 11102023 novo padrao
include_once(__DIR__ . '/../header.php');
include_once(__DIR__ . '/../database/aplicativo.php');
include_once(ROOT . '/cadastros/database/clientes.php');

$clientes = buscaClientes();
?>
<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>

<body>
    <div class="container-fluid">
        <!-- MENUFILTROS -->
        <nav class="ts-menuFiltros" style="margin-top: -40px;">
            <label class="pl-2" for="">Filtrar por:</label>
            <div class="col-12">
                <!-- FILTROS -->
            </div>

            <div class="col-sm text-end mt-2">
                <a onClick="limpar()" role=" button" class="btn btn-sm bg-info text-white">Limpar</a>
            </div>
        </nav>

        <div class="row">
            <!-- MENSAGENS/ALERTAS -->
        </div>
        <div class="row">
            <!-- BOTOES AUXILIARES -->
        </div>
        <div class="row">
            <div class="col-6 order-1 col-sm-6  col-md-6 order-md-1 col-lg-1 order-lg-1 mt-3">
                <button type="button" class="ts-btnFiltros btn btn-sm"><span class="material-symbols-outlined">
                        filter_alt
                    </span></button>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-2 order-lg-2 mt-4">
                <h2 class="ts-tituloPrincipal">Aplicativo padrao 3</h2>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-5 order-lg-3">
                <div class="input-group">
                    <input type="text" class="form-control ts-input mt-4" id="buscaaplicativo" placeholder="Buscar aplicativo">
                    <span class="input-group-btn">
                        <button class="btn btn-primary mt-4" id="buscar" type="button"><span style="font-size: 20px;font-family: 'Material Symbols Outlined'!important;" class="material-symbols-outlined">
                                search
                            </span></button>
                    </span>
                </div>
            </div>

            <div class="col-6 order-2 col-sm-6 col-md-6 order-md-2 col-lg-4 order-lg-4 mt-3 text-end" style=" margin-left:-30px ">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#inserirModal"><i class="bi bi-plus-square"></i>&nbsp Novo</button>
            </div>
        </div>

        <div class="table mt-2 ts-divTabela ts-tableFiltros text-center">
            <table class="table table-hover table-sm">
                <thead class="ts-headertabelafixo">
                    <tr class="ts-headerTabelaLinhaCima">
                        <th>ID</th>
                        <th>Aplicativo</th>
                        <th>Caminho</th>
                        <th>Imagem</th>
                        <th colspan="2">Ação</th>
                    </tr>
                    <tr class="ts-headerTabelaLinhaBaixo">
                        <th></th>
                        <th>
                            <form action="" method="post">
                                <select class="form-select ts-input ts-selectFiltrosHeaderTabela" name="idCliente" id="FiltroClientes">
                                    <option value="<?php echo null ?>"><?php echo "Selecione" ?></option>
                                    <option value="">exemplo1</option>
                                    <option value="">exemplo2</option>
                                    <option value="">exemplo3</option>
                                </select>
                            </form>
                        </th>
                        <th></th>
                        <th>
                            <form action="" method="post">
                                <select class="form-select ts-input ts-selectFiltrosHeaderTabela" name="idCliente" id="FiltroClientes">
                                    <option value="<?php echo null ?>"><?php echo "Selecione" ?></option>
                                    <option value="">exemplo1</option>
                                    <option value="">exemplo2</option>
                                    <option value="">exemplo3</option>
                                </select>
                            </form>
                        </th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody id='dados' class="fonteCorpo">

                </tbody>
            </table>
        </div>


        <!--------- INSERIR --------->
        <div class="modal fade bd-example-modal-lg" id="inserirModal" tabindex="-1" aria-labelledby="inserirModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Inserir Aplicativo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="inserirFormAplicativo">
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label class='form-label ts-label'>Nome do Aplicativo</label>
                                    <input type="text" class="form-control ts-input" name="nomeAplicativo" autocomplete="off" required>
                                </div>
                                <div class="col-md-6">
                                    <label class='form-label ts-label'>Caminho</label>
                                    <input type="text" class="form-control ts-input" name="appLink" autocomplete="off">
                                </div>

                            </div>
                            <div class="row mt-3">
                                <label class="form-label ts-label">Imagem</label>
                                <label class="picture ml-4 mt-4" for="imgAplicativo" tabIndex="0">
                                    <span class="picture__image"></span>
                                </label>

                                <input type="file" name="imgAplicativo" id="imgAplicativo">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--------- ALTERAR --------->
        <div class="modal fade bd-example-modal-lg" id="alterarmodal" tabindex="-1" aria-labelledby="alterarmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alterar Nota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="alterarFormAplicativo">
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label class='form-label ts-label'>Nome do Aplicativo</label>
                                    <input type="text" class="form-control ts-input" name="nomeAplicativo" id="nomeAplicativo">
                                    <input type="hidden" class="form-control ts-input" name="idAplicativo" id="idAplicativo">
                                </div>
                                <div class="col-md-6">
                                    <label class='form-label ts-label'>Caminho</label>
                                    <input type="text" class="form-control ts-input" name="appLink" id="appLink">
                                </div>

                            </div>
                            <div class="row mt-3">
                                <label class="form-label ts-label">Imagem</label>
                                <label class="picture ml-4 mt-4" for="imgAplicativo" tabIndex="0">
                                    <span class="picture__image"></span>
                                </label>

                                <input type="file" name="imgAplicativo" id="imgAplicativo">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div><!--container-fluid-->

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>
    <!-- script para menu de filtros -->
    <script src="<?php echo URLROOT ?>/sistema/js/filtroTabela.js"></script>

    <script>
        buscar(null);

        function limpar() {
            buscar(null, null, null, null);
            window.location.reload();
        }

        function buscar(buscaaplicativo) {
            //alert (buscaaplicativo);
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '<?php echo URLROOT ?>/sistema/database/aplicativo.php?operacao=filtrar',
                beforeSend: function() {
                    $("#dados").html("Carregando...");
                },
                data: {
                    buscaaplicativo: buscaaplicativo
                },
                success: function(msg) {
                    //alert("segundo alert: " + msg);
                    var json = JSON.parse(msg);

                    var linha = "";
                    for (var $i = 0; $i < json.length; $i++) {
                        var object = json[$i];


                        linha = linha + "<tr>";
                        linha = linha + "<td>" + object.idAplicativo + "</td>";
                        linha = linha + "<td>" + object.nomeAplicativo + "</td>";
                        linha = linha + "<td>" + object.appLink + "</td>";
                        linha = linha + "<td>" + object.imgAplicativo + "</td>";

                        linha = linha + "<td>" + "<button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#alterarmodal' data-idAplicativo='" + object.idAplicativo + "'><i class='bi bi-pencil-square'></i></button>"
                        linha = linha + "</tr>";
                    }
                    $("#dados").html(linha);
                }
            });
        }

        $("#buscar").click(function() {
            buscar($("#buscaaplicativo").val());
        })

        document.addEventListener("keypress", function(e) {
            if (e.key === "Enter") {
                buscar($("#buscaaplicativo").val());
            }
        });

        $(document).on('click', 'button[data-bs-target="#alterarmodal"]', function() {
            var idAplicativo = $(this).attr("data-idAplicativo");
            //alert(idAplicativo)
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo URLROOT ?>/sistema/database/aplicativo.php?operacao=buscar',
                data: {
                    idAplicativo: idAplicativo
                },
                success: function(data) {
                    $('#idAplicativo').val(data.idAplicativo);
                    $('#nomeAplicativo').val(data.nomeAplicativo);
                    $('#appLink').val(data.appLink);
                    $('#pathImg').val(data.pathImg);

                    /* alert(data) */
                    $('#alterarmodal').modal('show');
                }
            });
        });

        $(document).ready(function() {
            $("#inserirFormAplicativo").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/aplicativo.php?operacao=inserir",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: refreshPage,
                });
            });

            $("#alterarFormAplicativo").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/aplicativo.php?operacao=alterar",
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

        //Carregar a imagem na tela
        const inputFile = document.querySelector("#imgAplicativo");
        const pictureImage = document.querySelector(".picture__image");
        const pictureImageTxt = "Carregar imagem";
        pictureImage.innerHTML = pictureImageTxt;

        inputFile.addEventListener("change", function(e) {
            const inputTarget = e.target;
            const file = inputTarget.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function(e) {
                    const readerTarget = e.target;

                    const img = document.createElement("img");
                    img.src = readerTarget.result;
                    img.classList.add("picture__img");

                    pictureImage.innerHTML = "";
                    pictureImage.appendChild(img);
                });

                reader.readAsDataURL(file);
            } else {
                pictureImage.innerHTML = pictureImageTxt;
            }
        });
    </script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
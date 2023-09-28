<?php

include_once('../services/database/demanda.php');
include_once('../cadastros/database/clientes.php');
include_once('../cadastros/database/usuario.php');
include_once('../services/database/tipostatus.php');
include_once('../services/database/tipoocorrencia.php');
include '../services/database/contratotipos.php';
include_once '../services/database/contratos.php';

$urlContratoTipo = null;
if (isset($_GET["tipo"])) {
    $urlContratoTipo = $_GET["tipo"];
    $contratoTipo = buscaContratoTipos($urlContratoTipo);
} else {
    $contratoTipo = buscaContratoTipos('contratos');
}
$ClienteSession = null;
if (isset($_SESSION['idCliente'])) {
    $ClienteSession = $_SESSION['idCliente'];
}

$usuario = buscaUsuarios(null, $_SESSION['idLogin']);
$clientes = buscaClientes();
$atendentes = buscaAtendente();
$usuarios = buscaUsuarios();
$tiposstatus = buscaTipoStatus();
$tipoocorrencias = buscaTipoOcorrencia();
$cards = buscaCardsDemanda();
$contratos = buscaContratosAbertos();

if ($_SESSION['idCliente'] == null) {
    $idCliente = null;
} else {
    $idCliente = $_SESSION['idCliente'];
}

if ($_SESSION['idCliente'] == null) {
    $idAtendente = $_SESSION['idUsuario'];
} else {
    $idAtendente = null;
}
$statusDemanda = "1"; //ABERTO

$filtroEntrada = null;
$idTipoStatus = null;
$idTipoOcorrencia = null;
$idSolicitante = null;


if (isset($_SESSION['filtro_demanda'])) {
    $filtroEntrada = $_SESSION['filtro_demanda'];
    $idCliente = $filtroEntrada['idCliente'];
    $idSolicitante = $filtroEntrada['idSolicitante'];
    $idAtendente = $filtroEntrada['idAtendente'];
    $idTipoStatus = $filtroEntrada['idTipoStatus'];
    $idTipoOcorrencia = $filtroEntrada['idTipoOcorrencia'];
    $statusDemanda = $filtroEntrada['statusDemanda'];
    //lucas 26092023 ID 576 Adicionado posicao no filtro_demanda
    $posicao = $filtroEntrada['posicao'];
}


?>
<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>


    <div class="container-fluid mt-2 ">
        <div class="row bg-warning">
            MENSAGENS
        </div>

        <!-- TOTAIS -->
        <div class="row bg-info d-flex flex">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
            </div>

        </div>
      

        <div class="row align-items-center bg-danger p-3 ">

            <div class="col-4 order-1 col-sm-4  col-md-4 order-md-1 col-lg-1 order-lg-1">
                <button type="button" class="btn btn-primary">Filtro</button>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 order-lg-2">
                <h2 class="tituloTabela">
                    Nome da Tabela
                </h2>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 order-lg-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="pesquisa">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button" id="button-addon2">Botão</button>
                    </div>
                </div>
            </div>

            <div class="col-4 order-2 col-sm-4 col-md-4 order-md-2 d-flex col-lg-2 order-lg-4">
                <div class="col-6">
                    <form class="d-flex" action="" method="post" style="text-align: right;">
                        <select class="form-control" name="exportoptions" id="exportoptions">
                            <option value="excel">Excel</option>
                            <option value="pdf">PDF</option>
                            <option value="csv">csv</option>
                        </select>
                    </form>
                </div>
                <div class="col-6">
                    <button class="btn btn-warning" id="export" name="export" type="submit">Gerar</button>
                </div>

            </div>

            <div class="col-4 order-3 col-sm-4 col-md-4 order-md-3 col-lg-2 order-lg-5 text-end">
                <a href="aplicativo_inserir.php" role="button" class="btn btn-success"><i class="bi bi-plus-square"></i>Novo</a>
            </div>
        </div>


        <div class="table bg-body mt-3" style="width: 100%; height: 75vh; overflow-y:scroll; overflow-x:auto;">


            <table class="table table-hover table-sm align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Prioridade</th>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Solicitante</th>
                        <th>Titulo</th>
                        <th>Responsavel</th>
                        <th>Abertura</th>
                        <th>Status</th>
                        <th>Ocorrência</th>
                        <th>Fechamento</th>
                        <th>Posição</th>
                        <th>Ação</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th style="width: 10%;">
                            <form action="" method="post">
                                <select class="form-control text-center" name="idCliente" id="FiltroClientes" style="font-size: 14px;color:#fff; font-style:italic; margin-top:-10px; margin-bottom:-6px;background-color:#13216A">
                                    <option value="<?php echo null ?>">
                                        <?php echo "Selecione" ?>
                                    </option>
                                    <?php
                                    foreach ($clientes as $cliente) {
                                    ?>
                                        <option <?php
                                                if ($cliente['idCliente'] == $idCliente) {
                                                    echo "selected";
                                                }
                                                ?> value="<?php echo $cliente['idCliente'] ?>">
                                            <?php echo $cliente['nomeCliente'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </form>
                        </th>
                        <th style="width: 10%;">
                            <form action="" method="post">
                                <select class="form-control text-center" name="idSolicitante" id="FiltroSolicitante" style="font-size: 14px;color:#fff; font-style:italic; margin-top:-10px; margin-bottom:-6px;background-color:#13216A">
                                    <option value="<?php echo null ?>">
                                        <?php echo "Selecione" ?>
                                    </option>
                                    <?php
                                    foreach ($usuarios as $usuario) {
                                    ?>
                                        <option <?php
                                                if ($usuario['idUsuario'] == $idSolicitante) {
                                                    echo "selected";
                                                }
                                                ?> value="<?php echo $usuario['idUsuario'] ?>">
                                            <?php echo $usuario['nomeUsuario'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </form>
                        </th>
                        <th></th>
                        <th>
                            <form action="" method="post">
                                <select class="form-control text-center" name="idAtendente" id="FiltroUsuario" style="font-size: 14px;color:#fff; font-style:italic; margin-top:-10px; margin-bottom:-6px;background-color:#13216A">
                                    <option value="<?php echo null ?>">
                                        <?php echo "Selecione" ?>
                                    </option>
                                    <?php
                                    foreach ($atendentes as $atendente) {
                                    ?>
                                        <option <?php
                                                if ($atendente['idUsuario'] == $idAtendente) {
                                                    echo "selected";
                                                }
                                                ?> value="<?php echo $atendente['idUsuario'] ?>">
                                            <?php echo $atendente['nomeUsuario'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </form>
                        </th>
                        <th></th>
                        <th>
                            <form action="" method="post">
                                <select class="form-control text-center" name="idTipoStatus" id="FiltroTipoStatus" autocomplete="off" style="font-size: 14px;color:#fff; font-style:italic; margin-top:-10px; margin-bottom:-6px;background-color:#13216A">
                                    <option value="<?php echo null ?>">
                                        <?php echo "Selecione" ?>
                                    </option>
                                    <?php foreach ($tiposstatus as $tipostatus) { ?>
                                        <option <?php
                                                if ($tipostatus['idTipoStatus'] == $idTipoStatus) {
                                                    echo "selected";
                                                }
                                                ?> value="<?php echo $tipostatus['idTipoStatus'] ?>">
                                            <?php echo $tipostatus['nomeTipoStatus'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </form>
                        </th>
                        <th style="width: 10%;">
                            <form action="" method="post">
                                <select class="form-control text-center" name="idTipoOcorrencia" id="FiltroOcorrencia" style="font-size: 14px;color:#fff; font-style:italic; margin-top:-10px; margin-bottom:-6px;background-color:#13216A">
                                    <option value="<?php echo null ?>">
                                        <?php echo "Selecione" ?>
                                    </option>
                                    <?php
                                    foreach ($tipoocorrencias as $tipoocorrencia) {
                                    ?>
                                        <option <?php
                                                if ($tipoocorrencia['idTipoOcorrencia'] == $idTipoOcorrencia) {
                                                    echo "selected";
                                                }
                                                ?> value="<?php echo $tipoocorrencia['idTipoOcorrencia'] ?>">
                                            <?php echo $tipoocorrencia['nomeTipoOcorrencia'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </form>
                        </th>
                        <th></th>
                        <!-- lucas 26092023 ID 576 Adicionado filtro posicao -->
                        <th style="width: 10%;">
                            <form action="" method="post">
                                <select class="form-control text-center" name="posicao" id="FiltroPosicao" style="font-size: 14px;color:#fff; font-style:italic; margin-top:-10px; margin-bottom:-6px;background-color:#13216A">
                                    <option value="<?php echo null ?>"><?php echo "Selecione" ?></option>
                                    <option value="0">Atendente</option>
                                    <option value="1">Cliente</option>
                                </select>
                            </form>
                        </th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id='dados' class="fonteCorpo">

                </tbody>
            </table>



        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    <?php if ($ClienteSession === NULL): ?>
      var urlContratoTipo = '<?php echo $urlContratoTipo ?>';
      //lucas 26092023 ID 576 Adicionado posicao no buscar
      buscar(null, null, null, null, null, null, null, null);

      function limparTrade() {
        buscar(null, null, null, null, null, null, null, null, function () {
          window.location.reload();
        });
      }
     
      //lucas 26092023 ID 576 Modificado função clickCard, passando os valores dos outros filtros
      function clickCard(statusDemanda) {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), $("#FiltroUsuario").val(), $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), 
        statusDemanda, $("#buscaDemanda").val(), $("#FiltroPosicao").val())
      } 

      function buscar(idCliente, idSolicitante, idAtendente, idTipoStatus, idTipoOcorrencia, statusDemanda, buscaDemanda, posicao, callback) {
        //alert(posicao)
        $.ajax({
          type: 'POST',
          dataType: 'html',
          url: '../services/database/demanda.php?operacao=filtrar',
          beforeSend: function () {
            $("#dados").html("Carregando...");
          },
          data: {
            idCliente: idCliente,
            idSolicitante: idSolicitante,
            idAtendente: idAtendente,
            idTipoStatus: idTipoStatus,
            idTipoOcorrencia: idTipoOcorrencia,
            statusDemanda: statusDemanda,
            buscaDemanda: buscaDemanda,
            urlContratoTipo: urlContratoTipo,
            /* lucas 26092023 ID 576 Adicionado posicao */
            posicao: posicao
          },
          success: function (msg) {
            var json = JSON.parse(msg);
            var linha = "";
            for (var $i = 0; $i < json.length; $i++) {
              var object = json[$i];
              var dataAbertura = new Date(object.dataAbertura);
              var dataFormatada = dataAbertura.toLocaleDateString("pt-BR");

              if (object.dataFechamento == null) {
                var dataFechamentoFormatada = "<p>---</p>";
              } else {
                var dataFechamento = new Date(object.dataFechamento);
                dataFechamentoFormatada = dataFechamento.toLocaleDateString("pt-BR") + "<br> " + dataFechamento.toLocaleTimeString("pt-BR");
              }
              /* lucas 22092023 ID 358 logica para mostar o nome em vez do numero */
              if(object.posicao == 0){
                var posicao = "Atendente"
              }
              if(object.posicao == 1){
                var posicao = "Cliente"
              }
              /*  */
              linha += "<tr>";
              linha += "<td>" + object.prioridade + "</td>";
              linha += "<td>" + object.idDemanda + "</td>";
              linha += "<td>" + object.nomeCliente + "</td>";
              linha += "<td>" + object.nomeSolicitante + "</td>";
              linha += "<td>" + object.tituloDemanda + "</td>";
              linha += "<td>" + object.nomeAtendente + "</td>";
              linha += "<td>" + dataFormatada + "</td>";
              linha += "<td class='" + object.idTipoStatus + "'>" + object.nomeTipoStatus + "</td>";
              linha += "<td>" + object.nomeTipoOcorrencia + "</td>";
              /* lucas 22092023 ID 358 Removido comentario */
              linha += "<td>" + dataFechamentoFormatada + "</td>";
              /* lucas 22092023 ID 358 Adicionado campo na tabela */
              linha += "<td>" + posicao + "</td>";
              linha += "<td><a class='btn btn-warning btn-sm' href='visualizar.php?idDemanda=" + object.idDemanda + "' role='button'><i class='bi bi-pencil-square'></i></a></td>";

              linha += "</tr>";
            }

            $("#dados").html(linha);

            if (typeof callback === 'function') {
              callback();
            }
          }
        });
      }

      /* lucas 26092023 ID 576 Adicionado filtro posicao */
      $("#FiltroTipoStatus").change(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), $("#FiltroUsuario").val(), $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val());
      });

      $("#FiltroClientes").change(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), $("#FiltroUsuario").val(), $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val());
      });

      $("#FiltroSolicitante").change(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), $("#FiltroUsuario").val(), $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val());
      });

      $("#FiltroOcorrencia").change(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), $("#FiltroUsuario").val(), $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val());
      });

      $("#FiltroUsuario").change(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), $("#FiltroUsuario").val(), $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val());
      });

      $("#FiltroStatusDemanda").change(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), $("#FiltroUsuario").val(), $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val());
      });

      $("#buscar").click(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), $("#FiltroUsuario").val(), $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val());
      });

      $("#FiltroPosicao").change(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), $("#FiltroUsuario").val(), $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val());
      });

      document.addEventListener("keypress", function (e) {
        if (e.key === "Enter") {
          buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), $("#FiltroUsuario").val(), $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val());
        }
      });
      /*  */
    <?php else: ?>
      var urlContratoTipo = '<?php echo $urlContratoTipo ?>';
      /* lucas 26092023 ID 576 Adicionado filtro posicao */
      buscar(null, null, null, null, null, null, null, null, null);


      function limpar() {
        var idClienteOriginal = $("#FiltroClientes").val();
        buscar(idClienteOriginal, null, null, null, null, null, null, null, function () {
          window.location.reload();
        });
      }

    //lucas 26092023 ID 576 Modificado função clickCard, passando os valores dos outros filtros
    function clickCard(statusDemanda) {
      buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), null, $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), 
      statusDemanda, $("#buscaDemanda").val(), $("#FiltroPosicao").val())
    } 

      /* lucas 26092023 ID 576 Adicionado posicao no buscar */
      function buscar(idCliente, idSolicitante, idAtendente, idTipoStatus, idTipoOcorrencia, statusDemanda, buscaDemanda, posicao, callback) {

        $.ajax({
          type: 'POST',
          dataType: 'html',
          url: '../services/database/demanda.php?operacao=filtrar',
          beforeSend: function () {
            $("#dados").html("Carregando...");
          },
          data: {
            idCliente: idCliente,
            idSolicitante: idSolicitante,
            idAtendente: idAtendente,
            idTipoStatus: idTipoStatus,
            idTipoOcorrencia: idTipoOcorrencia,
            statusDemanda: statusDemanda,
            buscaDemanda: buscaDemanda,
            urlContratoTipo: urlContratoTipo,
            /* lucas 26092023 ID 576 Adicionado posicao */
            posicao: posicao
          },
          success: function (msg) {

            var json = JSON.parse(msg);
            var linha = "";
            for (var $i = 0; $i < json.length; $i++) {
              var object = json[$i];

              if (object.dataFechamento == null) {
                var dataFechamentoFormatada = "<p>---</p>";
              } else {
                var dataFechamento = new Date(object.dataFechamento);
                dataFechamentoFormatada = dataFechamento.toLocaleDateString("pt-BR") + "<br> " + dataFechamento.toLocaleTimeString("pt-BR");
              }
              
              if(object.posicao == 0){
                var posicao = "Atendente"
              }
              if(object.posicao == 1){
                var posicao = "Cliente"
              }

              linha += "<tr>";
              linha += "<td>" + object.prioridade + "</td>";
              linha += "<td>" + object.idDemanda + "</td>";
              linha += "<td>" + object.nomeCliente + "</td>";
              linha += "<td>" + object.nomeSolicitante + "</td>";
              linha += "<td>" + object.tituloDemanda + "</td>";
              linha += "<td class='" + object.idTipoStatus + "'>" + object.nomeTipoStatus + "</td>";
              linha += "<td>" + object.nomeTipoOcorrencia + "</td>";
              linha += "<td>" + dataFechamentoFormatada + "</td>";
              /* lucas 22092023 ID 358 Adicionado campo na tabela */
              linha += "<td>" + posicao + "</td>";
              linha += "<td><a class='btn btn-warning btn-sm' href='visualizar.php?idDemanda=" + object.idDemanda + "' role='button'><i class='bi bi-pencil-square'></i></a></td>";

              linha += "</tr>";
            }

            $("#dados").html(linha);

            if (typeof callback === 'function') {
              callback();
            }
          }
        });
      }
/* lucas 26092023 ID 576 Adicionado filtro posicao */
      $("#FiltroTipoStatus").change(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), null, $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val(), null);
      });

      $("#FiltroClientes").change(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), null, $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val(), null);
      });

      $("#FiltroSolicitante").change(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), null, $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val(), null);
      });

      $("#FiltroOcorrencia").change(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), null, $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val(), null);
      });

      $("#FiltroUsuario").change(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), null, $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val(), null);
      });

      $("#FiltroStatusDemanda").change(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), null, $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val(), null);
      });

      $("#buscar").click(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), null, $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val(), null);
      });

      $("#FiltroPosicao").change(function () {
        buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), null, $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val(), null);
      });

      document.addEventListener("keypress", function (e) {
        if (e.key === "Enter") {
          buscar($("#FiltroClientes").val(), $("#FiltroSolicitante").val(), null, $("#FiltroTipoStatus").val(), $("#FiltroOcorrencia").val(), $("#FiltroStatusDemanda").val(), $("#buscaDemanda").val(), $("#FiltroPosicao").val(), null);
        }
      });
      /*  */
    <?php endif; ?>


    //Gabriel 22092023 id544 trocado setcookie por httpRequest enviado para gravar origem em session//ajax
    $(document).on('click', '#visualizarDemandaButton', function () {
      var currentPath = window.location.pathname;
      $.ajax({
        type: 'POST',
        url: '../services/database/demanda.php?operacao=origem',
        data: { origem: currentPath },
        success: function(response) {
          console.log('Session variable set successfully.');
        },
        error: function(xhr, status, error) {
          console.error('An error occurred:', error);
        }
      });
    });

    $('.btnAbre').click(function() {
      $('.menuFiltros').toggleClass('mostra');
      $('.diviFrame').toggleClass('mostra');
    });


    //**************exporta excel 
    function exportToExcel() {
      var idAtendenteValue = <?php echo $_SESSION['idCliente'] === NULL ? '$("#FiltroUsuario").val()' : 'null' ?>;
      var tamanhoValue = <?php echo $_SESSION['idCliente'] === NULL ? '$("#FiltroTamanho").val()' : 'null' ?>;
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '../services/database/demanda.php?operacao=filtrar',
        data: {
          idCliente: $("#FiltroClientes").val(),
          idSolicitante: $("#FiltroSolicitante").val(),
          idAtendente: idAtendenteValue,
          idTipoStatus: $("#FiltroTipoStatus").val(),
          idTipoOcorrencia: $("#FiltroOcorrencia").val(),
          statusDemanda: $("#FiltroStatusDemanda").val(),
          buscaDemanda: $("#buscaDemanda").val(),
          tamanho: tamanhoValue,
          urlContratoTipo: urlContratoTipo
        },
        success: function (json) {
          var excelContent =
            "<html xmlns:x='urn:schemas-microsoft-com:office:excel'>" +
            "<head>" +
            "<meta charset='UTF-8'>" +
            "</head>" +
            "<body>" +
            "<table>";

          excelContent += "<tr><th>Prioridade</th><th>ID</th><th>Cliente</th><th>Solicitante</th><th>Demanda</th><th>Responsavel</th><th>Abertura</th><th>Status</th><th>Ocorrencia</th><th>Tamanho</th></tr>";

          for (var i = 0; i < json.length; i++) {
            var object = json[i];
            excelContent += "<tr><td>" + object.prioridade + "</td>" +
              "<td>" + object.idDemanda + "</td>" +
              "<td>" + object.nomeCliente + "</td>" +
              "<td>" + object.nomeSolicitante + "</td>" +
              "<td>" + object.tituloDemanda + "</td>" +
              "<td>" + object.nomeAtendente + "</td>" +
              "<td>" + object.dataAbertura + "</td>" +
              "<td>" + object.nomeTipoStatus + "</td>" +
              "<td>" + object.nomeTipoOcorrencia + "</td>" +
              "<td>" + object.tamanho + "</td></tr>";
          }

          excelContent += "</table></body></html>";

          var excelBlob = new Blob([excelContent], {
            type: 'application/vnd.ms-excel'
          });
          var excelUrl = URL.createObjectURL(excelBlob);
          var link = document.createElement("a");
          link.setAttribute("href", excelUrl);
          link.setAttribute("download", "demandas.xls");
          document.body.appendChild(link);

          link.click();

          document.body.removeChild(link);
        },
        error: function (e) {
          alert('Erro: ' + JSON.stringify(e));
        }
      });
    }

    

    //**************exporta csv
    function exportToCSV() {
      var idAtendenteValue = <?php echo $_SESSION['idCliente'] === NULL ? '$("#FiltroUsuario").val()' : 'null' ?>;
      var tamanhoValue = <?php echo $_SESSION['idCliente'] === NULL ? '$("#FiltroTamanho").val()' : 'null' ?>;
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '../services/database/demanda.php?operacao=filtrar',
        data: {
          idCliente: $("#FiltroClientes").val(),
          idSolicitante: $("#FiltroSolicitante").val(),
          idAtendente: idAtendenteValue,
          idTipoStatus: $("#FiltroTipoStatus").val(),
          idTipoOcorrencia: $("#FiltroOcorrencia").val(),
          statusDemanda: $("#FiltroStatusDemanda").val(),
          buscaDemanda: $("#buscaDemanda").val(),
          tamanho: tamanhoValue,
          urlContratoTipo: urlContratoTipo
        },
        success: function (json) {
          var csvContent = "data:text/csv;charset=utf-8,\uFEFF";
          csvContent += "Prioridade,ID,Cliente,Solicitante,Demanda,Responsavel,Abertura,Status,Ocorrencia,Tamanho,Previsao\n";

          for (var i = 0; i < json.length; i++) {
            var object = json[i];
            csvContent += object.prioridade + "," +
              object.idDemanda + "," +
              object.nomeCliente + "," +
              object.nomeSolicitante + "," +
              object.tituloDemanda + "," +
              object.nomeAtendente + "," +
              object.dataAbertura + "," +
              object.nomeTipoStatus + "," +
              object.nomeTipoOcorrencia + "," +
              object.tamanho + "," +
              object.horasPrevisao + "\n";
          }

          var encodedUri = encodeURI(csvContent);
          var link = document.createElement("a");
          link.setAttribute("href", encodedUri);
          link.setAttribute("download", "demandas.csv");
          document.body.appendChild(link);

          link.click();

          document.body.removeChild(link);
        },
        error: function (e) {
          alert('Erro: ' + JSON.stringify(e));
        }
      });
    }

    //**************exporta PDF
    function exportToPDF() {
      var idAtendenteValue = <?php echo $_SESSION['idCliente'] === NULL ? '$("#FiltroUsuario").val()' : 'null' ?>;
      var tamanhoValue = <?php echo $_SESSION['idCliente'] === NULL ? '$("#FiltroTamanho").val()' : 'null' ?>;
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '../services/database/demanda.php?operacao=filtrar',
        data: {
          idCliente: $("#FiltroClientes").val(),
          idSolicitante: $("#FiltroSolicitante").val(),
          idAtendente: idAtendenteValue,
          idTipoStatus: $("#FiltroTipoStatus").val(),
          idTipoOcorrencia: $("#FiltroOcorrencia").val(),
          statusDemanda: $("#FiltroStatusDemanda").val(),
          buscaDemanda: $("#buscaDemanda").val(),
          tamanho: tamanhoValue,
          urlContratoTipo: urlContratoTipo
        },
        success: function (json) {
          var tableContent =
            "<table>" +
            "<tr><th>Prioridade</th><th>ID</th><th>Cliente</th><th>Solicitante</th><th>Demanda</th><th>Responsavel</th><th>Abertura</th><th>Status</th><th>Ocorrencia</th><th>Tamanho</th></tr>";

          for (var i = 0; i < json.length; i++) {
            var object = json[i];
            tableContent += "<tr><td>" + object.prioridade + "</td>" +
              "<td>" + object.idDemanda + "</td>" +
              "<td>" + object.nomeCliente + "</td>" +
              "<td>" + object.nomeSolicitante + "</td>" +
              "<td>" + object.tituloDemanda + "</td>" +
              "<td>" + object.nomeAtendente + "</td>" +
              "<td>" + object.dataAbertura + "</td>" +
              "<td>" + object.nomeTipoStatus + "</td>" +
              "<td>" + object.nomeTipoOcorrencia + "</td>" +
              "<td>" + object.tamanho + "</td></tr>";
          }

          tableContent += "</table>";

          var printWindow = window.open('', '', 'width=800,height=600');
          printWindow.document.open();
          printWindow.document.write('<html><head><title>Demandas</title></head><body>');
          printWindow.document.write(tableContent);
          printWindow.document.write('</body></html>');
          printWindow.document.close();

          printWindow.onload = function () {
            printWindow.print();
            printWindow.onafterprint = function () {
              printWindow.close();
            };
          };

          printWindow.onload();
        },
        error: function (e) {
          alert('Erro: ' + JSON.stringify(e));
        }
      });
    }





    $("#export").click(function () {
      var selectedOption = $("#exportoptions").val();
      if (selectedOption === "excel") {
        exportToExcel();
      } else if (selectedOption === "pdf") {
        exportToPDF();
      } else if (selectedOption === "csv") {
        exportToCSV();
      }
    });
  </script>

  <script>
    var demandaContrato = new Quill('.quill-demandainserir', {
      theme: 'snow',
      modules: {
        toolbar: [
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote'],
          [{
            'list': 'ordered'
          }, {
            'list': 'bullet'
          }],
          [{
            'indent': '-1'
          }, {
            'indent': '+1'
          }],
          [{
            'direction': 'rtl'
          }],
          [{
            'size': ['small', false, 'large', 'huge']
          }],
          /*  [{
             'header': [1, 2, 3, 4, 5, 6, false]
           }], */
          ['link', 'image'],
          [{
            'color': []
          }, {
            'background': []
          }],
          [{
            'font': []
          }],
          [{
            'align': []
          }],
        ]
      }
    });

    demandaContrato.on('text-change', function (delta, oldDelta, source) {
      $('#quill-demandainserir').val(demandaContrato.container.firstChild.innerHTML);
    });


// Cards com Botões acionamento individual
    $('.cardColor').click(function () {
      $('.cardColor').addClass('cardColor-active'); 
      $('.cardColor').removeClass('shadowOff');
      $('.cardColor1').removeClass('cardColor-active');
      $('.cardColor2').removeClass('cardColor-active');
      $('.cardColor3').removeClass('cardColor-active');
      $('.cardColor0').removeClass('cardColor-active');
    });
    $('.cardColor1').click(function () {
      $('.cardColor1').addClass('cardColor-active');
      $('.cardColor1').removeClass('shadowOff');
      $('.cardColor').removeClass('cardColor-active');
      $('.cardColor2').removeClass('cardColor-active');
      $('.cardColor3').removeClass('cardColor-active');
      $('.cardColor0').removeClass('cardColor-active');
    });
    $('.cardColor2').click(function () {
      $('.cardColor2').addClass('cardColor-active');
      $('.cardColor2').removeClass('shadowOff');
      $('.cardColor').removeClass('cardColor-active');
      $('.cardColor1').removeClass('cardColor-active');
      $('.cardColor3').removeClass('cardColor-active');
      $('.cardColor0').removeClass('cardColor-active');
    });
    $('.cardColor3').click(function () {
      $('.cardColor3').addClass('cardColor-active');
      $('.cardColor3').removeClass('shadowOff');
      $('.cardColor').removeClass('cardColor-active');
      $('.cardColor1').removeClass('cardColor-active');
      $('.cardColor2').removeClass('cardColor-active');
      $('.cardColor0').removeClass('cardColor-active');
    });
    $('.cardColor0').click(function () {
      $('.cardColor0').addClass('cardColor-active');
      $('.cardColor0').removeClass('shadowOff');
      $('.cardColor').removeClass('cardColor-active');
      $('.cardColor1').removeClass('cardColor-active');
      $('.cardColor2').removeClass('cardColor-active');
      $('.cardColor3').removeClass('cardColor-active');
    }); 
    
// Cards com Botões acionamento ligado ao Select de StatusDemanda
let btn = document.querySelectorAll('button');
let select = document.querySelector('select');

function troca(e) {
    select.value = e.currentTarget.id;
}

btn.forEach( (el) => {
    el.addEventListener('click', troca);
}) 

function mudarSelect(valor){
  $('.cardColor').removeClass('cardColor-active');
  $('.cardColor1').removeClass('cardColor-active');
  $('.cardColor2').removeClass('cardColor-active');
  $('.cardColor3').removeClass('cardColor-active');
  $('.cardColor0').removeClass('cardColor-active');
  $('.cardColor' + valor).addClass('cardColor-active');
  $('.cardColor' + valor).removeClass('shadowOff');
  
}

  </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
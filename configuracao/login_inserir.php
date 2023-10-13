<?php
// Lucas 06102023 padrao novo
// helio 01022023 criado option null para empresa
// helio 01022023 altereado para include_once
// helio 26012023 16:16
include_once('../header.php');
include_once '../database/empresa.php';
$empresas = buscaEmpresas();
?>
<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <BR> <!-- MENSAGENS/ALERTAS -->
        </div>
        <div class="row">
            <BR> <!-- BOTOES AUXILIARES -->
        </div>
        <div class="row"> <!-- LINHA SUPERIOR A TABLE -->
            <div class="col-3">
                <!-- TITULO -->
                <h2 class="ts-tituloPrincipal">Cadastrar Usuário</h2>
            </div>
            <div class="col-7">
                <!-- FILTROS -->
            </div>

            <div class="col-2 text-end">
                <a href="/sistema/configuracao/login.php" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

        <form action="../database/login.php?operacao=inserir" method="post">
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal'>Nome do
                            Usuário</label>
                        <input type="text" name="loginNome" class="form-control" required autocomplete="off">
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal'>E-mail</label>
                        <input type="email" name="email" class="form-control" autocomplete="off">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal'>Senha do
                            Usuário</label>
                        <input id="txtSenha" type="password" name="password" class="form-control" required autocomplete="off">
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal'>Repetir
                            Senha</label>
                        <input type="password" name="senhausuario2" class="form-control" required autocomplete="off" oninput="validaSenha(this)">
                        <small>Precisa ser igual a senha digitada acima.</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal'>Cpf/Cnpj</label>
                        <input type="text" name="cpfCnpj" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="col-12 col-sm-3 col-md-3">
                    <div class="form-group-select" style="width: 150px;">
                        <label class="labelForm">Utiliza Token</label>
                        <select class="select form-control" name="pedeToken">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-3 col-md-3">
                    <div class="form-group-select" style="width: 150px;">
                        <label class="labelForm">Empresa</label>
                        <select class="select form-control" name="idEmpresa" required>
                            <option value=""></option>
                            <?php
                            foreach ($empresas as $empresa) {
                                $idEmpresa = $empresa['nomeEmpresa'] === "TradeSis" ? "null" : $empresa['idEmpresa'];
                            ?>
                                <option value="<?php echo $idEmpresa ?>"><?php echo $empresa['nomeEmpresa'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="text-end mt-4">
                <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Cadastrar</button>
            </div>
        </form>

    </div>

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script>
        function validaSenha(input) {
            if (input.value != document.getElementById('txtSenha').value) {
                input.setCustomValidity('Repita a senha corretamente');
            } else {
                input.setCustomValidity('');
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('input[name="loginNome"]').bind('input', function() {
                var c = this.selectionStart,
                    r = /[^a-z0-9 .]/gi,
                    v = $(this).val();
                if (r.test(v)) {
                    $(this).val(v.replace(r, ''));
                    c--;
                }
                this.setSelectionRange(c, c);
            });
        });
    </script>
    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
<?php
// helio 01022023 criado option null para empresa
// helio 01022023 altereado para include_once
// helio 26012023 16:16
include_once('../head.php');
include_once '../database/empresa.php';

$empresas = buscaEmpresas();

?>

<body class="bg-transparent">

    <div class="container formContainer">

        <div class="row">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Cadastrar Usuário</h2>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="../configuracao/?tab=configuracao&stab=login" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

        <form action="../database/login.php?operacao=inserir" method="post">
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome do Usuário</label>
                        <input type="text" name="loginNome" class="form-control" required autocomplete="off">
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -20px;">E-mail</label>
                        <input type="email" name="email" class="form-control" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm" style="margin-top: 10px">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -20px;">Senha do Usuário</label>
                        <input id="txtSenha" type="password" name="password" class="form-control" required autocomplete="off">
                    </div>
                </div>
                <div class="col-sm" style="margin-top: 10px">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -20px;">Repetir Senha</label>
                        <input type="password" name="senhausuario2" class="form-control" required autocomplete="off" oninput="validaSenha(this)">
                        <small>Precisa ser igual a senha digitada acima.</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -20px;">Cpf/Cnpj</label>
                        <input type="text" name="cpfCnpj" class="form-control" required autocomplete="off">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -20px;">Telefone</label>
                        <input type="text" name="telefone" class="form-control" required autocomplete="off">
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group-select">
                        <label class="labelForm">Empresa / Cliente</label>
                        <select class="select form-control" style="padding-right: 100px;" name="idEmpresa">
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

            <div style="text-align:right;margin-top:20px">
                <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Cadastrar</button>
            </div>

        </form>

    </div>

    </div>



    <script>
        function validaSenha(input) {
            if (input.value != document.getElementById('txtSenha').value) {
                input.setCustomValidity('Repita a senha corretamente');
            } else {
                input.setCustomValidity('');
            }
        }
    </script>


</body>

</html>
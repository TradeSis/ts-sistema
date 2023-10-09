<?php
// Lucas 06102023 padrao novo
// Lucas 29032023 - alterado link do botão voltar, para redirecionar para o index.php
// helio 01022023 altereado para include_once
// helio 26012023 16:16

include_once('../header.php');
include_once('../database/login.php');
include_once('../database/aplicativo.php');
include_once('../database/loginAplicativo.php');

$idLogin = $_GET['idLogin'];
$aplicativos = buscaAplicativos();
$usuario = buscaLogins($idLogin);
$loginAplicativos = buscaLoginAplicativo($idLogin);
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
            <div class="col-3" style="text-align:left">
                <!-- TITULO -->
                <h2 class="tituloTabela">Alterar Usuário</h2>
            </div>
            <div class="col-7">
                <!-- FILTROS -->
            </div>

            <div class="col-2" style="text-align: end;">
                <a href="#" onclick="history.back()" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>


        <form action="../database/login.php?operacao=alterar" method="post">
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label class="labelForm">Nome</label>
                        <input type="text" class="form-control" name="loginNome" value="<?php echo $usuario['loginNome'] ?>" readonly>
                        <input type="text" class="form-control" name="idLogin" value="<?php echo $usuario['idLogin'] ?>" style="display: none">
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label class="labelForm">E-mail</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $usuario['email'] ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label class="labelForm">Cpf/Cnpj</label>
                        <input type="text" class="form-control" name="cpfCnpj" value="<?php echo $usuario['cpfCnpj'] ?>">
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label class="labelForm">Pede Token</label>
                        <select class="form-control" name="pedeToken">
                            <option <?php if ($usuario['pedeToken'] == "1") {
                                        echo "selected";
                                    } ?> value="1">Sim</option>
                            <option <?php if ($usuario['pedeToken'] == "0") {
                                        echo "selected";
                                    } ?> value="0">Não</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row" id="conteudo">
                <div class="col-sm col-md-2" style="margin-top: 10px">
                    <div class="form-group">
                        <label class="labelForm">Nova Senha</label>
                        <input id="txtSenha" type="password" name="password" class="form-control" autocomplete="off" onfocus="this.value='';" placeholder="Senha" required value="<?php echo $usuario['password'] ?>" disabled>
                    </div>
                </div>
                <div class="col-sm col-md-2" style="margin-top: 10px">
                    <div class="form-group">
                        <label class="labelForm">Repetir Senha</label>
                        <input type="password" name="senhausuario2" class="form-control" autocomplete="off" onfocus="this.value='';" placeholder="Repetir Senha" value="<?php echo $usuario['password'] ?>" required oninput="validaSenha(this)">
                        <small>Precisa ser igual a senha digitada.</small>
                    </div>
                </div>
            </div>


            <div class="text-end">
                <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Salvar</button>
            </div>
        </form>
        <button data-classe="classe1" id="btn1" class="btn btn-sm btn-danger mb-3">Alterar Senha</button>

        <div class="table mt-2 divtabela">
            <table class="table table-hover table-sm align-middle">
                <thead class="cabecalhoTabela">
                    <tr id="titulodetabelafixo">
                        <th>Usuário</th>
                        <th>Aplicativo</th>
                        <th>Nível</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <?php if (isset($loginAplicativos['idLogin'])) {; ?>
                    <tr>
                        <td><?php echo $loginAplicativos['loginNome'] ?></td>
                        <td><?php echo $loginAplicativos['nomeAplicativo'] ?></td>
                        <td><?php echo $loginAplicativos['nivelMenu'] ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="loginAplicativo_alterar.php?idLogin=<?php echo $idLogin ?>&idAplicativo=<?php echo $loginAplicativos['idAplicativo'] ?>&nomeAplicativo=<?php echo $loginAplicativos['nomeAplicativo'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger btn-sm" href="loginAplicativo_excluir.php?idLogin=<?php echo $idLogin ?>&idAplicativo=<?php echo $loginAplicativos['idAplicativo'] ?>&nomeAplicativo=<?php echo $loginAplicativos['nomeAplicativo'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                    <?php } else {
                    foreach ($loginAplicativos as $loginAaplicativo) { ?>
                        <tr>
                            <td><?php echo $loginAaplicativo['loginNome'] ?></td>
                            <td><?php echo $loginAaplicativo['nomeAplicativo'] ?></td>
                            <td><?php echo $loginAaplicativo['nivelMenu'] ?></td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="loginAplicativo_alterar.php?idLogin=<?php echo $idLogin ?>&idAplicativo=<?php echo $loginAaplicativo['idAplicativo'] ?>&nomeAplicativo=<?php echo $loginAaplicativo['nomeAplicativo'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger btn-sm" href="loginAplicativo_excluir.php?idLogin=<?php echo $idLogin ?>&idAplicativo=<?php echo $loginAaplicativo['idAplicativo'] ?>&nomeAplicativo=<?php echo $loginAaplicativo['nomeAplicativo'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                <?php }
                } ?>

            </table>
            <div class="py-3 px-3" style="text-align:right">
                <a href="loginAplicativo_inserir.php?idLogin=<?php echo $idLogin ?>" role="button" class="btn btn-success"><i class="bi bi-plus-square"></i>&nbsp
                    Novo</a>
            </div>
        </div>

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


        $('#btn1').click(function() {
            $('#conteudo').toggleClass('mostra');
            $('#txtSenha').removeAttr('disabled');
        });
    </script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->
    
</body>

</html>
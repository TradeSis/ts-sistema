<?php
// Lucas 06102023 padrao novo
// Lucas 29032023 - alterado link do botão voltar, para redirecionar para o index.php
// helio 01022023 altereado para include_once
// helio 26012023 16:16

include_once('../header.php');
include_once('../database/login.php');

$idLogin = $_GET['idLogin'];
$usuario = buscaLogins($idLogin);

$_SESSION['ultimaulr'] = $_SERVER['HTTP_REFERER'];
?>
<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>

<body>

    <div class="container">
        <div class="row">
            <BR> <!-- MENSAGENS/ALERTAS -->
        </div>
        <div class="row">
            <BR> <!-- BOTOES AUXILIARES -->
        </div>
        <div class="row"> <!-- LINHA SUPERIOR A TABLE -->
            <div class="col-3">
                <!-- TITULO -->
                <h2 class="ts-tituloPrincipal">Alterar Usuário</h2>
            </div>
            <div class="col-7">
                <!-- FILTROS -->
            </div>

            <div class="col-2 text-end">
                <a href="#" onclick="history.back()" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

        <form action="../database/login.php?operacao=loginalterar" method="post">
            <div class="row mt-3">
                <div class="col-sm">
                        <label class="form-label ts-label">Nome</label>
                        <input type="text" class="form-control ts-input" name="loginNome" value="<?php echo $usuario['loginNome'] ?>">
                        <input type="hidden" class="form-control ts-input" name="idLogin" value="<?php echo $usuario['idLogin'] ?>">
                        <input type="hidden" class="form-control ts-input" name="pedeToken" value="<?php echo $usuario['pedeToken'] ?>">
                        <input type="hidden" class="form-control ts-input" name="ultimaulr" value="<?php echo $_SESSION['ultimaulr'] ?>">
                </div>
                <div class="col-sm">
                        <label class="form-label ts-label">E-mail</label>
                        <input type="text" class="form-control ts-input" name="email" value="<?php echo $usuario['email'] ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-6">
                        <label class="form-label ts-label">Cpf/Cnpj</label>
                        <input type="text" class="form-control ts-input" name="cpfCnpj" value="<?php echo $usuario['cpfCnpj'] ?>">
                </div>
            </div>

            <div class="container" id="conteudo">
                <div class="row mt-3">
                    <div class="col-sm mt-2">
                            <label class="form-label ts-label">Nova Senha</label>
                            <input id="txtSenha" type="password" name="password" class="form-control ts-input" autocomplete="off" onfocus="this.value='';" placeholder="Senha" required value="<?php echo $usuario['password'] ?>" disabled>
                    </div>
                    <div class="col-sm mt-2">
                            <label class="form-label ts-label">Repetir Senha</label>
                            <input type="password" name="senhausuario2" class="form-control ts-input" autocomplete="off" onfocus="this.value='';" placeholder="Repetir Senha" value="<?php echo $usuario['password'] ?>" required oninput="validaSenha(this)">
                            <small>Precisa ser igual a senha digitada.</small>
                    </div>
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Salvar</button>
            </div>
        </form>
        <button data-classe="classe1" id="btn1" class="btn btn-sm btn-danger mb-3">Alterar Senha</button>

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
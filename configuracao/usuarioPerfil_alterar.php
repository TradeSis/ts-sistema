<?php
// Lucas 29032023 - alterado link do botão voltar, para redirecionar para o index.php
// helio 01022023 altereado para include_once
// helio 26012023 16:16

include_once('../head.php');
include_once('../database/usuario.php');

$idUsuario = $_GET['idUsuario'];
$usuario = buscaUsuarios($idUsuario);

echo $_SERVER['HTTP_REFERER'];
$_SESSION['ultimaulr'] = $_SERVER['HTTP_REFERER'];
echo 'session -> ' . ($_SESSION['ultimaulr']);
?>

<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="col-sm mt-4" style="text-align:right">
            <a href="#" onclick="history.back()" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
        </div>
        <div class="col-sm">
            <spam class="col titulo">Alterar Usuário</spam>
        </div>

        <div class="container" style="margin-top: 30px">
            <form action="../database/usuario.php?operacao=usuarioalterar" method="post">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label class="labelForm">Nome</label>
                            <input type="text" class="form-control" name="nomeUsuario" value="<?php echo $usuario['nomeUsuario'] ?>">
                            <input type="text" class="form-control" name="idUsuario" value="<?php echo $usuario['idUsuario'] ?>" style="display: none">
                            <input type="text" class="form-control" name="ultimaulr" value="<?php echo $_SESSION['ultimaulr'] ?>" style="display: none">
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
                            <label class="labelForm">Telefone</label>
                            <input type="text" class="form-control" name="telefone" value="<?php echo $usuario['telefone'] ?>">
                        </div>
                    </div>
                </div>

                <div class="container" id="conteudo">
                    <div class="row">
                        <div class="col-sm" style="margin-top: 10px">
                            <div class="form-group">
                                <label class="labelForm">Nova Senha</label>
                                <input id="txtSenha" type="password" name="password" class="form-control" autocomplete="off" onfocus="this.value='';" placeholder="Senha" required value="<?php echo $usuario['password'] ?>">
                            </div>
                        </div>
                        <div class="col-sm" style="margin-top: 10px">
                            <div class="form-group">
                                <label class="labelForm">Repetir Senha</label>
                                <input type="password" name="senhausuario2" class="form-control" autocomplete="off" onfocus="this.value='';" placeholder="Repetir Senha" value="<?php echo $usuario['password'] ?>" required oninput="validaSenha(this)">
                                <small>Precisa ser igual a senha digitada.</small>
                            </div>
                        </div>
                    </div>
                </div>




                <div  style="text-align:right">


                <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Salvar</button>
                </div>
            </form>
            <button data-classe="classe1" id="btn1" class="btn btn-sm btn-danger mb-3">Alterar Senha</button>

            
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


        $('#btn1').click(function() {
            $('#conteudo').toggleClass('mostra');
        });
    </script>
</body>

</html>
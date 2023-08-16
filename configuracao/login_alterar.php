<?php
// Lucas 29032023 - alterado link do botão voltar, para redirecionar para o index.php
// helio 01022023 altereado para include_once
// helio 26012023 16:16

include_once('../head.php');
include_once('../database/login.php');
include_once('../database/aplicativo.php');
include_once('../database/loginAplicativo.php');

$idLogin = $_GET['idLogin'];
$aplicativos = buscaAplicativos();
$usuario = buscaLogins($idLogin);
$loginAplicativos = buscaLoginAplicativo($idLogin);

?>

<body class="bg-transparent">

    <div class="container formContainer">

        <div class="row">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Alterar Usuário</h2>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="#" onclick="history.back()" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>
     
            <form action="../database/login.php?operacao=alterar" method="post">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label class="labelForm">Nome</label>
                            <input type="text" class="form-control" name="loginNome" value="<?php echo $usuario['loginNome'] ?>">
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




                <div style="text-align:right; margin-top:20px">
                    <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Salvar</button>
                </div>
            </form>
            <button data-classe="classe1" id="btn1" class="btn btn-sm btn-danger mb-3">Alterar Senha</button>


            <div class="card mt-2 text-center">
                <table class="table">
                    <thead class="cabecalhoTabela">
                        <tr>
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
                                <a class="btn btn-primary btn-sm" href="loginAplicativo_alterar.php?idLogin=<?php echo $idLogin ?>&idAplicativo=<?php echo $loginAplicativos['idAplicativo'] ?>" role="button">Editar</a>
                                <a class="btn btn-danger btn-sm" href="loginAplicativo_excluir.php?idLogin=<?php echo $idLogin ?>&idAplicativo=<?php echo $loginAplicativos['idAplicativo'] ?>" role="button">Excluir</a>
                            </td>
                        </tr>
                        <?php } else {
                        foreach ($loginAplicativos as $loginAaplicativo) { ?>
                            <tr>
                                <td><?php echo $loginAaplicativo['loginNome'] ?></td>
                                <td><?php echo $loginAaplicativo['nomeAplicativo'] ?></td>
                                <td><?php echo $loginAaplicativo['nivelMenu'] ?></td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="loginAplicativo_alterar.php?idLogin=<?php echo $idLogin ?>&idAplicativo=<?php echo $loginAaplicativo['idAplicativo'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                                    <a class="btn btn-danger btn-sm" href="loginAplicativo_excluir.php?idLogin=<?php echo $idLogin ?>&idAplicativo=<?php echo $loginAaplicativo['idAplicativo'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                                </td>
                            </tr>
                    <?php }
                    } ?>

                </table>
                <div class="py-3 px-3" style="text-align:right">
                    <a href="loginAplicativo_inserir.php?idLogin=<?php echo $idLogin ?>" role="button" class="btn btn-success"><i class="bi bi-plus-square"></i>&nbsp Novo</a>
                </div>
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
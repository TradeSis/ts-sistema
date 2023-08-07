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
echo json_encode($usuario);
$loginAplicativos = buscaLoginAplicativo($idLogin);

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




                <div  style="text-align:right">


                <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Salvar</button>
                </div>
            </form>
            <button data-classe="classe1" id="btn1" class="btn btn-sm btn-danger mb-3">Alterar Senha</button>

            
            <div class="card shadow mt-2">   
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Usuário</th>
                            <th class="text-center">Aplicativo</th>
                            <th class="text-center">Nível</th>
                            <th class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <?php if (isset($loginAplicativos['idLogin'])) {;?>
                            <tr>
                            <td class="text-center"><?php echo $loginAplicativos['loginNome'] ?></td>
                            <td class="text-center"><?php echo $loginAplicativos['nomeAplicativo'] ?></td>
                            <td class="text-center"><?php echo $loginAplicativos['nivelMenu'] ?></td>
                            <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="loginAplicativo_alterar.php?idLogin=<?php echo $idLogin ?>&idAplicativo=<?php echo $loginAplicativos['idAplicativo'] ?>" role="button">Editar</a>
                            <a class="btn btn-danger btn-sm" href="loginAplicativo_excluir.php?idLogin=<?php echo $idLogin ?>&idAplicativo=<?php echo $loginAplicativos['idAplicativo'] ?>" role="button">Excluir</a>
                            </td>
                        </tr>
                        <?php } else {
                            foreach ($loginAplicativos as $loginAaplicativo) { ?>
                        <tr>
                            <td class="text-center"><?php echo $loginAaplicativo['loginNome'] ?></td>
                            <td class="text-center"><?php echo $loginAaplicativo['nomeAplicativo'] ?></td>
                            <td class="text-center"><?php echo $loginAaplicativo['nivelMenu'] ?></td>
                            <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="loginAplicativo_alterar.php?idLogin=<?php echo $idLogin ?>&idAplicativo=<?php echo $loginAaplicativo['idAplicativo'] ?>" role="button">Editar</a>
                            <a class="btn btn-danger btn-sm" href="loginAplicativo_excluir.php?idLogin=<?php echo $idLogin ?>&idAplicativo=<?php echo $loginAaplicativo['idAplicativo'] ?>" role="button">Excluir</a>
                            </td>
                        </tr>
                    <?php }} ?>

                </table>
                <div class="py-3 px-3" style="text-align:right">
                    <a href="loginAplicativo_inserir.php?idLogin=<?php echo $idLogin ?>" role="button" class="btn btn-primary">Adicionar</a>
                </div>
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
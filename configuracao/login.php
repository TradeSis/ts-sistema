<?php
//Lucas 09032023 - adicionado um segundo parametro no buscaUsuario 
// helio 01022023 altereado para include_once
// helio 26012023 16:16
include_once(__DIR__ . '/../head.php');
include_once(__DIR__ . '/../database/login.php');
include_once(__DIR__ . '/../database/empresa.php');
$logins = buscaLogins();
?>

<body class="bg-transparent">
    <div class="container" style="margin-bottom:30px">


        <div class="row mt-4">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Login</h2>
            </div>

            <div class="col-sm-4" style="text-align:right">
                <a href="login_inserir.php" role="button" class="btn btn-success"><i class="bi bi-plus-square"></i>&nbsp
                    Novo</a>
            </div>

        </div>

        <div class="card mt-2 text-center">
            <table class="table">
                <thead class="cabecalhoTabela">
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Empresa</th>
                        <th>Cpf/Cnpj</th>
                        <th>Token</th>
                        <th ">Ação</th>
                    </tr>
                </thead>

                <?php
                foreach ($logins as $login) {
                    ?>
                        <tr>
                            <td><?php echo $login['loginNome'] ?></td>
                            <td><?php echo $login['email'] ?></td>
                            <td><?php echo $login['nomeEmpresa'] ?></td>
                            <td><?php echo $login['cpfCnpj'] ?></td>
                            <td><?php echo $login['pedeToken'] == 1 ? 'Sim' : 'Não'; ?></td>
                            <td>
                                    <a class=" btn btn-warning btn-sm"
                                href="login_alterar.php?idLogin=<?php echo $login['idLogin'] ?>" role="button"><i
                                    class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger btn-sm"
                                    href="login_excluir.php?idLogin=<?php echo $login['idLogin'] ?>" role="button"><i
                                        class="bi bi-trash3"></i></a>

                                </td>
                        </tr>
                    <?php } ?>


            </table>
        </div>
    </div>
    </div>

</body>

</html>
<?php
//Lucas 09032023 - adicionado um segundo parametro no buscaUsuario 
// helio 01022023 altereado para include_once
// helio 26012023 16:16
include_once(__DIR__ . '/../head.php');
include_once(__DIR__ . '/../database/login.php');
include_once(__DIR__ . '/../database/empresa.php');


$usuarios = buscaLogins();

?>

<body class="bg-transparent">
    <div class="container" style="margin-top:10px">


            <div class="row mt-4">
                <div class="col-sm-8">
                        <p class="tituloTabela">Usuários login</p>
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="login_inserir.php" role="button" class="btn btn-primary">Cadastrar Novo Usuário</a>
                    </div>
          
            </div>

        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">E-mail</th>
                        <th class="text-center">Empresa/Cliente</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>

                <?php
                foreach ($usuarios as $usuario) {

                    $nomeEmpresa = "Interno";
                    if ($usuario["idEmpresa"]) {
                        $empresa = buscaEmpresas ($usuario["idEmpresa"]);
                        $nomeEmpresa = $empresa ["nomeEmpresa"];
                    }
                ?>
                    <tr>
                        <td class="text-center"><?php echo $usuario['loginNome'] ?></td>
                        <td class="text-center"><?php echo $usuario['email'] ?></td>
                        <td class="text-center"><?php echo $nomeEmpresa ?></td>
                        <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="login_alterar.php?idLogin=<?php echo $usuario['idLogin'] ?>" role="button">Alterar</a>
                            <a class="btn btn-danger btn-sm" href="login_excluir.php?idLogin=<?php echo $usuario['idLogin'] ?>" role="button">Excluir</a>
                            
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>

</body>

</html>
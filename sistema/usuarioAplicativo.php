<?php
//Lucas 04042023 criado

include_once('../head.php');
include_once ('../database/usuarioaplicativo.php');

$usuarioaplicativos = buscaUsuarioAplicativo();
?>

<body class="bg-transparent" >
    <div class="container" style="margin-top:30px">

            
            <div class="row mt-4">
                <div class="col-sm-8">
                        <p class="tituloTabela">Usuario/Aplicativo</p>
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="usuarioaplicativo_inserir.php" role="button" class="btn btn-primary">Adicionar</a>
                    </div>
          
            </div>

        <div class="card shadow mt-2">   
            <table class="table">
                <thead>
                    <tr>
                        <th>Usuário</th>
                        <th>Aplicativo</th>
                        <th>Nível</th>
                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($usuarioaplicativos as $usuarioaplicativo) {
                ?>
                    <tr>
                        <td><?php echo $usuarioaplicativo['nomeUsuario'] ?></td>
                        <td><?php echo $usuarioaplicativo['aplicativo'] ?></td>
                        <td><?php echo $usuarioaplicativo['nivelMenu'] ?></td>

                        <td>
                        <a class="btn btn-primary btn-sm" href="usuarioaplicativo_alterar.php?idUsuario=<?php echo $usuarioaplicativo['idUsuario'] ?>&aplicativo=<?php echo $usuarioaplicativo['aplicativo'] ?>" role="button">Editar</a>
                        <a class="btn btn-danger btn-sm" href="usuarioaplicativo_excluir.php?idUsuario=<?php echo $usuarioaplicativo['idUsuario'] ?>&aplicativo=<?php echo $usuarioaplicativo['aplicativo'] ?>" role="button">Excluir</a>

                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
        
    </div>

</body>

</html>

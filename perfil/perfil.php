<?php
// helio 01022023 altereado para include_once
// helio 26012023 16:16

include_once('../head.php');
include_once('../database/perfil.php');

$perfis = buscaPerfil();
//echo json_encode($perfis);

?>

<body class="bg-transparent">
    <div class="container text-center" style="margin-top:30px"> 
        
            <div class="row mt-4">
                <div class="col-sm-8">
                        <h4 class="tituloTabela">Perfis</h4>
                        
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <!-- <a href="perfil_inserir.php" role="button" class="btn btn-primary">Adicionar</a> -->
                    </div>
          
            </div>
        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>foto</th>
                        <th>nome</th>

                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($perfis as $perfil) {
                ?>
                    <tr>
                        <td><img class="img-profile rounded-circle" src="admin/imgPerfil/<?php echo $perfil["foto"] ?>" height="40px" width="40"></td>
                        <td><?php echo $perfil['nome'] ?></td>

                        <td>
                            <a class="btn btn-primary btn-sm" href="perfil_alterar.php?idPerfil=<?php echo $perfil['idPerfil'] ?>" role="button">Editar</a>
                            <!-- <a class="btn btn-danger btn-sm" href="perfil_excluir.php?idPerfil=<?php echo $perfil['idPerfil'] ?>" role="button">Excluir</a> -->
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
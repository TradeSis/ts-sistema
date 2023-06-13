<?php
// helio 01022023 altereado para include_once
// helio 26012023 16:16

include_once('../head.php');
include_once('../database/perfil.php');

$perfil = buscaPerfil();

?>

<body class="bg-transparent">
    <div class="container text-center" style="margin-top:30px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h4 class="tituloTabela">Perfis</h4>
            </div>

            <div class="col-sm-4" style="text-align:right"></div>

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

                <tr>
                    <td><img class="img-profile rounded-circle" src="<?php echo URLROOT ?>/img/imgPerfil/<?php echo $perfil["foto"] ?>" height="40px" width="40"></td>
                    <td><?php echo $perfil['nome'] ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="perfil_alterar.php?idPerfil=<?php echo $perfil['idPerfil'] ?>" role="button">Editar</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>


</body>

</html>
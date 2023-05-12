<?php
// helio 01022023 altereado para include_once
// helio 26012023 16:16

include_once('../head.php');
include_once('../database/perfil.php');

$perfis = buscaPerfil();
//echo json_encode($perfis);

?>

<body class="bg-transparent">
    <div class="container-fluid text-center" style="margin-top:30px"> 
        
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
                        <th>nome</th>
                        <th>foto</th>
                        <th>endereco</th>
                        <th>numero</th>
                        <th>bairro</th>
                        <th>cep</th>
                        <th>cidade</th>
                        <th>estado</th>
                        <th>email</th>
                        <th>telefone</th>
                        <th>Whatsapp</th>
                        <th>logo</th>
                        <th>twitter</th>
                        <th>facebook</th>
                        <th>instagram</th>


                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($perfis as $perfil) {
                ?>
                    <tr>
                        <td><?php echo $perfil['nome'] ?></td>
                        <td><img class="img-profile rounded-circle" src="admin/imgPerfil/<?php echo $perfil["foto"] ?>" height="40px" width="40"></td>
                        <td><?php echo $perfil['endereco'] ?></td>
                        <td><?php echo $perfil['numero'] ?></td>
                        <td><?php echo $perfil['bairro'] ?></td>
                        <td><?php echo $perfil['cep'] ?></td>
                        <td><?php echo $perfil['cidade'] ?></td>
                        <td><?php echo $perfil['estado'] ?></td>
                        <td><?php echo $perfil['email'] ?></td>
                        <td><?php echo $perfil['telefone'] ?></td>
                        <td><?php echo $perfil['whatsapp'] ?></td>
                        <!-- <td><?php echo $perfil['logo'] ?></td> -->
                        <td><img src="admin/imgPerfil/<?php echo $perfil['logo'] ?>" height="40px" width="60px"></td>
                        <td><?php echo $perfil['twitter'] ?></td>
                        <td><?php echo $perfil['facebook'] ?></td>
                        <td><?php echo $perfil['instagram'] ?></td>

                        
                        <td>
                            <a class="btn btn-primary btn-sm" href="perfil_editar.php?idPerfil=<?php echo $perfil['idPerfil'] ?>" role="button">Editar</a>
                            <!-- <a class="btn btn-danger btn-sm" href="perfil_excluir.php?idPerfil=<?php echo $perfil['idPerfil'] ?>" role="button">Excluir</a> -->
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
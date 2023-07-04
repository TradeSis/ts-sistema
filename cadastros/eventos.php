<?php
include_once('../head.php');
include_once('../database/eventos.php');
$eventos = buscaEventos();
?>

<body class="bg-transparent">
    <div class="container text-center" style="margin-top:30px"> 
        
            <div class="row mt-4">
                <div class="col-sm-8">
                        <h4 class="tituloTabela">Eventos</h4>
                        
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="eventos_inserir.php" role="button" class="btn btn-primary">Adicionar</a>
                    </div>
          
            </div>
        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Titulo</th>
                        <th>Data</th>
                        <th>Local</th>
                        <th>Tipo</th>
                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($eventos as $evento) {
                ?>
                    <tr>
                        <td><img src="<?php echo URLROOT ?>/img/<?php echo $evento['capaEvento'] ?>" width="60px" height="60px" alt=""></td>
                        <td><?php echo $evento['nomeEvento'] ?></td>
                        <td><?php echo date('d/m/Y', strtotime($evento['dataEvento']))?></td>
                        <td><?php echo $evento['localEvento'] ?></td>
                        <td><?php echo $evento['tipoEvento'] ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="eventos_alterar.php?idEvento=<?php echo $evento['idEvento'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger btn-sm" href="eventos_excluir.php?idEvento=<?php echo $evento['idEvento'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
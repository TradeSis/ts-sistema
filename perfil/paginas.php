<?php
// helio 01022023 altereado para include_once
// helio 26012023 16:16

include_once('../head.php');
include_once('../database/paginas.php');

$paginas = buscaPaginas();
/* echo json_encode($paginas); */

?>

<body class="bg-transparent">
    <div class="container text-center" style="margin-top:30px"> 
        
            <div class="row mt-4">
                <div class="col-sm-8">
                        <h4 class="tituloTabela">Paginas</h4>
                        
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="paginas_inserir.php" role="button" class="btn btn-primary">Adicionar</a>
                    </div>
          
            </div>
        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>Slug</th>
                        <th>Titulo</th>
                        <th>Conteudo</th>
                        <th>Arquivo Fonte</th>

                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($paginas as $pagina) {
                ?>
                    <tr>
                    
                        <td><?php echo $pagina['slug'] ?></td>
                        <td><?php echo $pagina['tituloPagina'] ?></td>
                        <td><?php echo $pagina['conteudoHTML'] ?></td>
                        <td><?php echo $pagina['arquivoFonte'] ?></td>
                        
                        <td>
                            <a class="btn btn-primary btn-sm" href="paginas_editar.php?idPagina=<?php echo $pagina['idPagina'] ?>" role="button">Editar</a>
                            <a class="btn btn-danger btn-sm" href="paginas_excluir.php?idPagina=<?php echo $pagina['idPagina'] ?>" role="button">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
<?php

include_once '../head.php';
include_once '../database/ncm.php';

$ncms = buscaNCM();
/* echo json_encode($ncms); */
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<body class="bg-transparent">


    <div class="container-flex text-center pt-2 mt-3 justify-content-center" >

        <div class="row justify-content-center">
          <div class="col-sm-3">
              <form  action="../database/ncm_nivel.php?operacao=filtrar" id="form" method="post">
                
                    <div class="input-group">
                        <input type="text" class="form-control" id="Descricao" name="Descricao" placeholder="Descricao">
                    </div>

                    <div class="input-group">
                        <input type="text" class="form-control" id="Codigo" name="Codigo" placeholder="Codigo">
                    </div>

                    <div class="col-sm">

                        <button class="btn btn-primary w-50 mt-3" id="buscar" type="submit">Pesquisar</button>

                    </div>
                
              </form>
          </div>
        </div>
        <div class="mt-4">
            <label class="tituloTabela pl-4">NCM</label>
        </div>
        <section id="principal" class="h-75 container-sm mx-auto bg-light " style="max-width: 800px;">


                <div class="accordion" id="accordionExample">

                  <?php foreach ($ncms as $ncm) { ?>
                    <div class="accordion-item my-4">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                          <span class="px-3 text-info"><?php echo $ncm['Descricao'] ?></span> nivel: <?php echo $ncm['nivel'] ?>

                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body"><!-- 1 -->

                          <div class="my-2"><?php echo $ncm['nivel'] ?></div>



                        </div> <!-- 1 -->
                      </div>

                    </div>

                  <?php } ?>

                </div>

        </section>

    </div>
    <script>
    $(document).ready(function() {
            $("#form").submit(function() {
                var formData = new FormData(this);

                $.ajax({
                    url: "../database/ncm_nivel.php?operacao=filtrar",
                    type: 'POST',
                    data: formData,
                    success: refreshPage(),
                    cache: false,
                    contentType: false,
                    processData: false,
                    
                });

            });

            function refreshPage() {
            
                window.location.reload();
            }
        });
        </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>
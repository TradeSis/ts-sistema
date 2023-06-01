<?php


include_once '../database/ncm_nivel.php';

/* $Codigo = null;
$Descricao = "Carnes e miudezas"; */
$ncms = buscaNcmNivel();
echo json_encode($ncms);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Accordion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>


  <main class="vh-100 bg-light d-flex align-items-center">

    <!-- El contenedor de la categorias -->
    <section id="principal" class="h-75 container-sm mx-auto bg-light" style="max-width: 800px;">

      <h1 class="fs-5 text-primary text-center py-3">NCM</h1>


      <!-- La primera categoria -->
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

  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>
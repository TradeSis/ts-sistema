<?php
include_once('../head.php');
include_once('../database/receitas.php');
$idReceita = $_GET['idReceita'];
$receita = buscaReceitas($idReceita);
?>


<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h3 class="col">Editar Receita</h3>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="receitas.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>
        </div>
        <div class="container" style="margin-top: 10px">

            <form action="../database/receitas.php?operacao=excluir" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Receita*</label>
                            <input type="text" name="nomeReceita" class="form-control" value="<?php echo $receita['nomeReceita'] ?>" disabled>
                            <input type="text" class="form-control" name="idReceita" value="<?php echo $receita['idReceita'] ?>" style="display: none">
                            <input type="text" class="form-control" name="imgReceita" value="<?php echo $receita['imgReceita'] ?>" style="display: none">
                        </div>
                    </div>
                </div>

        </div>

        <div style="text-align:right; margin-right:-20px; margin-top:20px">
            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
        </div>
        </form>
    </div>

    </div>

    <script>
        //Carregar a FOTO na tela
        const inputFile = document.querySelector("#foto");
        const pictureImage = document.querySelector(".picture__image");
        const pictureImageTxt = "Carregar imagem";
        pictureImage.innerHTML = pictureImageTxt;

        inputFile.addEventListener("change", function(e) {
            const inputTarget = e.target;
            const file = inputTarget.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function(e) {
                    const readerTarget = e.target;

                    const img = document.createElement("img");
                    img.src = readerTarget.result;
                    img.classList.add("picture__img");

                    pictureImage.innerHTML = "";
                    pictureImage.appendChild(img);
                });

                reader.readAsDataURL(file);
            } else {
                pictureImage.innerHTML = pictureImageTxt;
            }
        });
    </script>

</body>

</html>
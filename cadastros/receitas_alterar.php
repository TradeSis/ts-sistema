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

            <form action="../database/receitas.php?operacao=alterar" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Receita*</label>
                            <input type="text" name="nomeReceita" class="form-control" value="<?php echo $receita['nomeReceita'] ?>">
                            <input type="text" class="form-control" name="idReceita" value="<?php echo $receita['idReceita'] ?>" style="display: none">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -43px;">Conteudo</label>
                            <textarea name="conteudoReceita" id="" cols="135" rows="10"><?php echo $receita['conteudoReceita'] ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Autor</label>
                            <input type="text" name="autorReceita" class="form-control" value="<?php echo $receita['autorReceita'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-6" style="margin-top: 50px">
                        <div class="col-sm-6" style="margin-top: -20px">
                            <label class='control-label' for='inputNormal' style="margin-top: -50px;">Imagem</label>
                            <label class="picture" for="foto" tabIndex="0">
                                <img src="<?php echo URLROOT ?>/img/<?php echo $receita["imgReceita"] ?>" width="100%" height="100%" alt="">
                            </label>
                            <input type="file" name="imgReceita" id="foto">
                        </div>
                    </div>
                </div>


        </div>

        <div style="text-align:right; margin-right:-20px; margin-top:20px">
            <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
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
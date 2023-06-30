<?php
include_once('../head.php');
include_once('../database/marcas.php');
include_once('../database/catalogo.php');
$marcas = buscaMarcas();
$idProduto = $_GET['idProduto']; 
$produto = buscaCatalogo($idProduto);
?>


<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h3 class="col">Editar Produto</h3>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="catalogo.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>
        </div>
        <div class="container" style="margin-top: 10px">

            <form action="../database/catalogo.php?operacao=alterar" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome do Produto*</label>
                            <input type="text" name="nomeProduto" class="form-control" value="<?php echo $produto['nomeProduto'] ?>">
                            <input type="text" class="form-control" name="idProduto" value="<?php echo $produto['idProduto'] ?>" style="display: none">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6" style="margin-top: 50px">
                        <div class="col-sm-6" style="margin-top: -20px">
                            <label class='control-label' for='inputNormal' style="margin-top: -50px;">Imagem do Produto*</label>
                            <label class="picture" for="foto" tabIndex="0">
                                <img src="<?php echo URLROOT ?>/img/<?php echo $produto["imgProduto"] ?>" width="100%" height="100%" alt="">
                            </label>
                            <input type="file" name="imgProduto" id="foto">
                        </div>
                    </div>
                </div>

                <div class="row">

                        <div class="col-sm-6" style="margin-top: 10px">
                            <div class="select-form-group">

                                <label class="labelForm">Marcas*</label>
                                <select class="select form-control" name="idMarca">
                                <option value="<?php echo $produto['idMarca'] ?>"><?php echo $produto['nomeMarca']  ?></option>
                                    <?php
                                    foreach ($marcas as $marca) {
                                    ?>
                                        <option value="<?php echo $marca['idMarca'] ?>"><?php echo $marca['nomeMarca']  ?></option>
                                    <?php  } ?>
                                </select>

                            </div>
                        </div>
                
                    <div class="col-sm-6" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Preço*</label>
                            <input type="number" name="precoProduto" class="form-control" value="<?php echo $produto['precoProduto'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 ml-4" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -45px;">Ativo</label>
                            <div class="row">
                                <input type="radio" name="ativoProduto" value="1" checked style="margin-right: 10px;">Produto
                            </div>
                            <div class="row">
                                <input type="radio" name="ativoProduto" value="0" style="margin-right: 10px;">inativo
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -45px;">Propaganda</label>
                            <div class="row">
                                <input type="radio" name="propagandaProduto" value="1" style="margin-right: 10px;">Sim
                            </div>
                            <div class="row">
                                <input type="radio" name="propagandaProduto" value="0" style="margin-right: 10px;">Não
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -43px;">Descrição</label>
                            <textarea name="descricaoProduto" id="" cols="135" rows="10"><?php echo $produto['descricaoProduto'] ?></textarea>
                        </div>
                    </div>
                </div>

        </div>

        <div style="text-align:right; margin-right:-20px; margin-top:20px">
            <button type="submit" class="btn btn-sm btn-success">Salvar</button>
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
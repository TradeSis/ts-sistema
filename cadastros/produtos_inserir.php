
<?php
//Lucas 04042023 criado

include_once('../head.php');
?>



<body class="bg-transparent">

    <div class="container" style="margin-top:10px">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row">
                    <div class="col-sm">
                        <h3 class="col">Adicionar Produto</h3>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="produtos.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="database/produtos.php?operacao=inserir" method="post" enctype="multipart/form-data">
             
   

                    <div class="row">
                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome</label>
                                <input type="text" name="nomeProduto" class="form-control" required autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Valor</label>
                                <input type="text" name="valorProduto" class="form-control" required autocomplete="off" >
                            </div>
                        </div>
                   

                        <div class="col-sm-3" style="margin-top: 10px">
                            <div class="select-form-group">
                               

                                    <label class="labelForm">Destaque</label>
                                    <select class="select form-control" name="destaque">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                       
                                    </select>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-3" style="margin-top: 10px">
                           <!--  <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">foto</label>
                                <input type="text" name="fotoProduto" class="form-control"  autocomplete="off" >
                            </div> -->

                            <div class="col-sm-6" style="margin-top: -20px">
                            <label>Foto</label>
                            <label class="picture" for="foto" tabIndex="0">
                                <span class="picture__image"></span>
                            </label>

                            <input type="file" name="fotoProduto" id="foto">
                            </div>

                        </div>
                        
                    </div>



                    <div class="card-footer bg-transparent" style="text-align:right">

                        <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>


//Carregar a imagem na tela
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
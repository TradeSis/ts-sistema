
<?php

include_once('../head.php');
?>



<body class="bg-transparent">

    <div class="container" style="margin-top:10px">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row">
                    <div class="col-sm">
                        <h3 class="col">Marcas</h3>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="marcas.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/marcas.php?operacao=inserir" method="post" enctype="multipart/form-data">

                    <div class="form-group" style="margin-top:10px">

                        <label>Nome</label>
                        <input type="text" name="nomeMarca" class="form-control" autocomplete="off">



                    <div class="row">
                        <div class="col-sm-2" style="margin-top: 10px; margin-right:50px ">
                            <div class="form-group">
                            
                                <label class="picture" for="imgMarca" tabIndex="0">
                                    <span class="picture__image"></span>
                                </label>
                                <label>imagem da marca</label>
                                <input type="file" name="imgMarca" id="imgMarca">
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
        const inputFile = document.querySelector("#imgMarca");
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
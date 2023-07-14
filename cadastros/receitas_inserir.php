<?php
include_once('../head.php');
?>


<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h3 class="col">Adicionar Receita</h3>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="receitas.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>
        </div>
        <div class="container" style="margin-top: 10px">

            <form action="../database/receitas.php?operacao=inserir" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Slug*</label>
                            <input type="text" name="slug" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-9" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Receita*</label>
                            <input type="text" name="nomeReceita" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="row">
                   <!--  <div class="col-sm-3" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -43px;">Conteudo</label>
                            <textarea name="conteudoReceita" id="" cols="135" rows="10"></textarea>
                        </div>
                    </div> -->

                    <textarea name="conteudoReceita">
     Welcome to TinyMCE!
  </textarea>
                </div>

                <div class="row">
                    <div class="col-sm-6" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Autor</label>
                            <input type="text" name="autorReceita" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-6" style="margin-top: 50px">
                        <div class="col-sm-6" style="margin-top: -20px">
                            <label class='control-label' for='inputNormal' style="margin-top: -50px;">Imagem</label>
                            <label class="picture" for="foto" tabIndex="0">
                                <span class="picture__image"></span>
                            </label>
                            <input type="file" name="imgReceita" id="foto" >
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

    <script src="https://cdn.tiny.cloud/1/n1fodpdv330yan6bcequ4fsjzhnu6b0cmdf7a8t92j39u02i/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: 'textarea',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags  | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      menubar: false,
      entity_encoding: 'raw',
      
    });
  </script>
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